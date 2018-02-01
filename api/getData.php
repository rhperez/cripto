<?php
  header("Access-Control-Allow-Origin: *");
  header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
  include_once "../connections/conn.php";

  $conn = connect();
  $book = isset($_GET['book']) ? $conn->real_escape_string($_GET['book']) : 'btc_mxn';
  $interval = isset($_GET['interval']) ? $conn->real_escape_string($_GET['interval']) : '1 DAY';

  getData($conn, $book, $interval);

  $conn->close();

  function getData($conn, $book, $interval) {
    $conn->query("SET lc_time_names = 'es_MX';");
    $str_query = "SELECT id_tick, DATE_FORMAT(created_at, '%H:%i') AS hora, created_at AS tick_date, bitso_last, bitso_volume, bitso_vwap, bitso_ask, bitso_bid, status FROM Ticks WHERE status > 0 AND bitso_book = '".$book."' AND created_at >= now() - INTERVAL ".$interval." ORDER BY id_tick";
    $result = $conn->query($str_query);
    $ret_array = array();

    while ($row = $result->fetch_assoc()) {
      $ret_array[] = $row;
    }
    echo json_encode($ret_array);
  }
?>
