<?php
include "../db.php"; // your connection

$start_date  = $_POST['from'] ?? '';
$end_date    = $_POST['too'] ?? '';   // 👈 match "too" from frontend
$columns     = $_POST['columns'] ?? [];

if($start_date!=''){
    $tt=" AND date BETWEEN '$start_date' AND '$end_date'";
}

if (empty($columns)) {
    echo json_encode(["data" => []]);
    exit;
}

$cols_sql = implode(",", $columns);

$sql = "SELECT $cols_sql FROM client WHERE subdomain='meraqui' $tt ORDER BY name ASC";

$s = mysqli_query($host, $sql);

$data = [];
while ($row = mysqli_fetch_array($s)) {
    $item = [];
    foreach ($columns as $col) {
        if ($col == 'date') {
            $item[$col] = date("d/m/Y", strtotime($row[$col]));
        } elseif ($col == 'pterms' || $col == 'about') {
            $plain = strip_tags($row[$col]);
            $char_limit = 50;
            $item[$col] = strlen($plain) > $char_limit 
                ? substr($plain, 0, $char_limit) . '...' 
                : $plain;
        } else {
          $item[$col] = isset($row[$col]) ? $row[$col] : '';
        }
    }
    $data[] = $item;
}

// ✅ Return JSON for DataTable
echo json_encode(["data" => $data]);
?>
