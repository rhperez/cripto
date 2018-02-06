<?php
  header("Access-Control-Allow-Origin: *");
  header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
  include_once "../connections/conn.php";

  $conn = connect();
  $book = isset($_GET['book']) ? $conn->real_escape_string($_GET['book']) : 'btc_mxn';
  $conn->close();

  $URL_PRUEBAS = "https://api-dev.bitso.com/v3/";
  $URL_PRODUCCION = "https://api.bitso.com/v3/";

  $status = 1; // 1 para produccion, 2 para pruebas
  $URL_BASE = $status==1 ? $URL_PRODUCCION : $URL_PRUEBAS;
  getTick($URL_BASE, $book, $status);

  function getTick($url_base, $book, $status) {
    $conn = connect();
    $str_query = "SELECT bitso_book, bitso_volume, bitso_last, bitso_high, bitso_low, bitso_vwap, bitso_ask, bitso_bid, created_at FROM Requested_Ticks WHERE bitso_book = '".$book."' AND status = ".$status." AND created_at >= now() - INTERVAL 10 SECOND";
    $result = $conn->query($str_query);
    if ($result->num_rows > 0) {
      $ret_array = array();
      while ($row = $result->fetch_assoc()) {
        $ret_array[] = $row;
      }
      echo json_encode($ret_array);
      $conn->close();
      return;
    }
    updateTick($url_base, $book, $status);
    $result = $conn->query($str_query);
    $ret_array = array();
    while ($row = $result->fetch_assoc()) {
      $ret_array[] = $row;
    }
    echo json_encode($ret_array);
    $conn->close();

  }

  function updateTick($url_base, $book, $status) {
    $url = $url_base."ticker/?book=".$book;
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_HEADER, 0);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $response = curl_exec($ch);
    if (!$response) {
      $status = 4;
      $str_insert = "INSERT INTO Requested_Ticks (bitso_book, bitso_volume, bitso_last, bitso_high, bitso_low, bitso_vwap, bitso_ask, bitso_bid, bitso_created_at, server_error_code, server_error_message, status)
      VALUES ('".$book."', '0', '0', '0', '0', '0', '0', '0', CURRENT_TIMESTAMP(), '0', 'No hay respuesta del servidor', '".$status."')";
    }
    $json = json_decode($response);
    if ($json->success) {
      $str_insert = "INSERT INTO Requested_Ticks (bitso_book, bitso_volume, bitso_last, bitso_high, bitso_low, bitso_vwap, bitso_ask, bitso_bid, bitso_created_at, status)
      VALUES ('".$json->payload->book."', '".$json->payload->volume."', '".$json->payload->last."', '".$json->payload->high."', '".$json->payload->low."', '".$json->payload->vwap."', '".$json->payload->ask."', '".$json->payload->bid."', '".$json->payload->created_at."', '".$status."')";
    } else {
      $status = 3;
      $str_insert = "INSERT INTO Requested_Ticks (bitso_book, bitso_volume, bitso_last, bitso_high, bitso_low, bitso_vwap, bitso_ask, bitso_bid, bitso_created_at, bitso_error_code, bitso_error_message, status)
      VALUES ('".$book."', '0', '0', '0', '0', '0', '0', '0', CURRENT_TIMESTAMP(), '".$json->error->code."', '".$json->error->message."', '".$status."')";
    }
    $conn = connect();
    mysqli_query($conn, $str_insert);
    $conn->close();
    curl_close($ch);
  }

?>
