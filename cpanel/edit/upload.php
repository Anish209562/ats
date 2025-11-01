<?php
include("../session.php");

$table = $_GET['dd'];
$tt = $_GET['tt'];
$comments = [];
$columnKeys = [];

$current_url = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http");
$current_url .= "://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
$cc="img/";
$tablename=$table;

if($table=="appmeter" or $table=="appometer" or $table=="survey"){
    $cc="uploads/";
    if($table=="appmeter"){
        $tablename="New Meter";
    }
    if($table=="appometer"){
        $tablename="Old Meter";
    }
    if($table=="survey"){
        $tablename="Field Survey";
    }
}

$new_url = str_replace("edit/upload.php?dd=$table", $cc, $current_url);

$result = mysqli_query($host, "SHOW FULL COLUMNS FROM `$table`");

while ($row = mysqli_fetch_assoc($result)) {
    $columnKeys[] = $row['Field'];
    $comments[$row['Field']] = $row['Comment'] !== '' ? $row['Comment'] : $row['Field'];
}



// Get data rows
$data = [];
$result = mysqli_query($host, "SELECT * FROM `$table` order by name asc");

while ($row = mysqli_fetch_assoc($result)) {
    $data[] = $row;
}

$fileExtensions = ['jpg', 'jpeg', 'png', 'gif', 'bmp', 'pdf', 'doc', 'docx', 'xls', 'xlsx','csv'];
$fileColumns = [];

if (!empty($data)) {
    $firstRow = $data[0];
    foreach ($firstRow as $key => $value) {
        $ext = strtolower(pathinfo($value, PATHINFO_EXTENSION));
        if (in_array($ext, $fileExtensions)) {
            $fileColumns[] = $key;
        }
    }
}

    header("Content-Type: text/csv; charset=UTF-8");
    header("Content-Disposition: attachment; filename={$tablename}.csv");

    $output = fopen("php://output", "w");
    fwrite($output, "\xEF\xBB\xBF"); // UTF-8 BOM for Excel
    
    // remove index 0
    array_shift($columnKeys);
    if($table=="team"){
         array_shift($columnKeys); array_shift($columnKeys);
    }

    // Write headers
    $headers = [];
    foreach ($columnKeys as $key) {
        $headers[] = $comments[$key];
    }
    fputcsv($output, $headers);

    // Write data rows in order
foreach ($data as $row) {
    $orderedRow = [];

    foreach ($columnKeys as $key) {
        $value = $row[$key] ?? '';

        // Custom logic for partner table and Payback_Days column
        if ($table === 'partner' && $comments[$key] === 'Payback_Days') {
            $doj = $row['DOJ'] ?? '';
            $dol = $row['DOL'] ?? '';
            if ($doj && $dol) {
                $value = (strtotime($dol) - strtotime($doj)) / (60 * 60 * 24);
              /// $value = round($days);
            } else {
                $value = 0;
            }
        }

        if (in_array($key, $fileColumns) && $value !== '') {
            $orderedRow[] = "$new_url$value";
        } else {
            $orderedRow[] = $value;
        }
    }

    fputcsv($output, $orderedRow);
}
    fclose($output);
  
mysqli_close($host);

?>
