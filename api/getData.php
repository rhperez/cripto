<?php
  header("Access-Control-Allow-Origin: *");
  header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
  include_once "../connections/conn.php";

  $conn = connect();
  $book = isset($_POST['book']) ? $conn->real_escape_string($_POST['book']) : 'btc_mxn';
  $interval = isset($_POST['interval']) ? $conn->real_escape_string($_POST['interval']) : '1 DAY';

  getData($conn, $book, $interval);

  $conn->close();

  function getData($conn, $book, $interval) {
    $conn->query("SET lc_time_names = 'es_MX';");
    $str_query = "SELECT id_tick, DATE_FORMAT(created_at, '%H:%i') AS hora, DATE_FORMAT(created_at, '%d de %M de %Y, %h:%i %p') AS tick_date, bitso_last, bitso_volume, bitso_vwap, bitso_ask, bitso_bid, status FROM Ticks WHERE status > 0 AND bitso_book = '".$book."' AND created_at >= now() - INTERVAL ".$interval." ORDER BY id_tick";
    $result = $conn->query($str_query);
    $ret_array = array();

    while ($row = $result->fetch_assoc()) {
      $ret_array[] = $row;
    }
    echo json_encode($ret_array);
  }
?>
