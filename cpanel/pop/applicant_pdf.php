<?php
include("../db.php");
require __DIR__ . '/../vendor/autoload.php';  // Load Composer

use Smalot\PdfParser\Parser;
$qq="";
$parser = new Parser();
$pdf = $parser->parseFile('sample.pdf'); // PDF in same folder
$text = $pdf->getText();
$lines = explode("\n", $text);
$headingLine = array_shift($lines);
foreach ($lines as $line) {
    $parts = preg_split('/\s+/', trim($line));
    $nameParts = [];
    $mobile = '';
    foreach ($parts as $index => $part) {
        if (preg_match('/^\d{10,}$/', $part)) {
            $mobile = $part;
            break;
        }
        $nameParts[] = $part;
    }

    if (!$mobile) continue; // skip if no mobile found

    $name = implode(' ', $nameParts);

    // Now slice rest of the parts after mobile
    $mobileIndex = array_search($mobile, $parts);
    $email = $parts[$mobileIndex + 1] ?? '';
    $status = $parts[$mobileIndex + 2] ?? '';
    $dob = $parts[$mobileIndex + 3] ?? '';
    $gender = $parts[$mobileIndex + 4] ?? '';
    $industry = $parts[$mobileIndex + 5] ?? '';
    
    $qq.=" ('$name','$mobile','$email','$status','$dob','$gender','$industry','$date','$time','meraqui') ,";
}

if($qq!=''){
    $qq=rtrim($qq,",");
       echo "insert into applicant (name,mobile,email,status,dob,gender,industry,date,time,subdomain) values $qq";

   if(mysqli_query($host,"insert into applicant (name,mobile,email,status,dob,gender,industry,date,time,subdomain) values $qq")){
        echo "done";
    }
    else{
        echo "not";
    }
}

?>