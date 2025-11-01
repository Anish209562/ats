<?php

include("../session.php");

$table=$_POST['ttype'];
$fromdate=$_POST['fromdate'];
$todate=$_POST['todate'];
switch ($table){
     case "1":
     $q="select * from user where (plan IS NULL or plan='' ) and date>='$fromdate' and date<='$todate' order by date desc";
     $headers = ['Sr.no', 'Name', 'Mobile', 'Email', 'Register Date', 'KCC ID','Vendor'];
     $file="user.csv";
     break;
     
     case "2":
     $q="select * FROM user where (plan='Basic' or plan='premium' or plan='vip' ) and date>='$fromdate' and date<='$todate' ";
     $headers = ['Sr.no', 'Name', 'Mobile', 'Email', 'Register Date', 'KCC ID', 'Card Type','Vendor'];
     $file="approvedUsers.csv";
     break;
     
     case "3":
     $q="select complaint.*, user.name,user.id as kccid FROM complaint inner join user on complaint.user=user.mobile where complaint.date>='$fromdate' and complaint.date<='$todate' order by complaint.id desc";
     $headers = ['Sr.no', 'Name', 'Mobile', 'Date', 'Time', 'KCC ID', 'Message','Remark','status'];
     $file="complaint.csv";
     break;
     
     case "4":
     $q="select support.*, user.id as kccid FROM support inner join user on support.user=user.mobile where support.date>='$fromdate' and support.date<='$todate' order by support.id desc";
     $headers = ['Sr.no', 'Name', 'Mobile', 'Email', 'By User', 'KCC ID', 'Message','Address','status','Remark','Date','Time'];
     $file="support.csv";
     break;
     
     case "5":
     $q="select survey_upload.*, survey.question as mera , user.id as kccid FROM survey_upload inner join survey on survey_upload.answer=survey.id INNER JOIN user ON survey_upload.username = user.mobile where survey_upload.date>='$fromdate' and survey_upload.date<='$todate' order by survey_upload.id desc";
     $headers = ['Sr.no', 'Survey Name', 'question', 'Answer', 'Date', 'Type', 'Mobile','KCC ID'];
     $file="survey.csv";
     break;
    
     case "6":
     $q="select * FROM user where vstatus='completed' and date>='$fromdate' and date<='$todate'";
     $headers = ['Sr.no', 'Name', 'Mobile', 'Email', 'Register Date', 'KCC ID', 'Category','Service','Description','card'];
     $file="vendors.csv";
     break;
}

$s1 = mysqli_query($host,$q);

header('Content-Type: text/csv; charset=UTF-8');
header("Content-Disposition: attachment; filename=$file");

$output = fopen('php://output', 'w');
fwrite($output, "\xEF\xBB\xBF");

fputcsv($output, $headers);

$x = 0;
$x = 0;
while ($d1 = mysqli_fetch_assoc($s1)) {
    $row = [];
    $x++;

    switch ($table) {
        case "1":
            $row = [$x, $d1['name'], $d1['mobile'], $d1['email'], $d1['date'], $d1['id'], $d1['vstatus']];
            break;

        case "2":
            $row = [$x, $d1['name'], $d1['mobile'], $d1['email'], $d1['date'], $d1['id'], $d1['plan'], $d1['vstatus']];
            break;

        case "3":
            $row = [$x, $d1['name'], $d1['user'], $d1['date'], $d1['time'], $d1['kccid'], $d1['message'], $d1['label'], $d1['status']];
            break;

        case "4":
            $row = [$x, $d1['name'], $d1['mobile'], $d1['email'], $d1['user'], $d1['kccid'], $d1['message'], $d1['address'], $d1['status'], $d1['label'], $d1['date'], $d1['time']];
            break;

        case "5":
            $row = [$x, $d1['sid'], $d1['mera'], $d1['question'], $d1['date'], $d1['time'], $d1['username'], $d1['kccid']];
            break;
    
       case "6":
            $row = [$x, $d1['name'], $d1['mobile'], $d1['email'], $d1['date'], $d1['id'], $d1['category'], $d1['product'],$d1['description'],$d1['plan']];
            break;
    }
   
    fputcsv($output, $row);
}

fclose($output);
exit();
?>