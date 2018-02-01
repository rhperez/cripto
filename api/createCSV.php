<?php
  include_once "../connections/conn.php";

  $conn = connect();
  $book = isset($_POST['book']) ? $conn->real_escape_string($_POST['book']) : 'btc_mxn';

  createCSV($conn, $book);

  $conn->close();

  function createCSV($conn, $book) {
    $conn->query("SET lc_time_names = 'es_MX';");
    $str_query = "SELECT bitso_last as precio, bitso_volume as volumen, bitso_vwap as vwap, bitso_ask as ask, bitso_bid as bid, created_at FROM Ticks WHERE status > 0 AND bitso_book = '".$book."' ORDER BY id_tick DESC";
    $result = $conn->query($str_query);

    $headers = array($book, "vol", "vwap", "ask", "bid", "time");

    // Escribiendo el archivo CSV
    $fp = fopen('php://output', 'w');
    if ($fp && $result) {
      header('Content-Type: text/csv');
      header('Content-Disposition: attachment; filename="'.$book.'.csv"');
      header('Pragma: no-cache');
      header('Expires: 0');
      fputcsv($fp, array_values($headers));
      while ($row = $result->fetch_assoc()) {
        fputcsv($fp, array_values($row));
      }
      return;
    }
  }
?>
