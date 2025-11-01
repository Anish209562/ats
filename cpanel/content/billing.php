<?php
include("../session.php");
$tt="";
if($_POST['onboard_type']!=''){
$value=$_POST['onboard_type'];
$tt.=" and type='$value'";
$url.="&project=$value";
}

if($_POST['fromdate'] && $_POST['todate']==""){
$from=$_POST['fromdate'];
$tt.=" and inv_date='$from'";
$url.="&from=$from";
}

// to date
if($_POST['todate'] && $_POST['fromdate']==""){
$to=$_POST['todate'];
$tt.=" and inv_date='$to'";
$url.="&to=$to";
}

// from date to todate
if($_POST['fromdate'] && $_POST['todate']){
$from=$_POST['fromdate'];
$to=$_POST['todate'];
$tt.=" and inv_date>='$from' and inv_date<='$to'";
$url.="&from=$from&to=$to";
}

$pay_total = 0;
$bill_total = 0;
$margin_total = 0;

$ss=mysqli_query($host,"select * from billing_import where sub_domain='$subdomain' $tt order by inv_date desc");
echo " <tbody>";
while($sd=mysqli_fetch_array($ss)){
       $pay_total   += $sd['pay_rate'];
    $bill_total  += $sd['bill_rate'];
    $margin_total += $sd['margin'];
                        ?>
                        <tr id="table<?php echo $sd['id'];?>">
                             <td><?php echo date('M Y',strtotime($sd['month']));?></td>
                             <td><?php echo $sd['applicant'];?></td>
                             <td><?php echo $sd['candidate'];?></td>
                             <td><?php echo $sd['type'];?></td>
                             <td><?php echo $sd['client'];?></td>
                             <td><?php echo $sd['inv_no'];?></td>
                             <td><?php echo date('d M, Y',strtotime($sd['inv_date']));?></td>
                             <td>₹ <?php echo $fmt->format($sd['pay_rate']);?></td>
                             <td>₹ <?php echo $fmt->format($sd['bill_rate']);?></td>
                             <td>₹ <?php echo $fmt->format($sd['margin']);?></td>
                             <td><?php echo date('d M, Y',strtotime($sd['date']))."<br>".date('H:i:s A',strtotime($sd['time']));?></td>
                        </tr>
                        <?php } 
echo "</tbody>";
if(mysqli_num_rows($ss)>0){
echo "<tfoot style='background: var(--primary02);'>
<tr style='font-weight:bold;'>
    <td colspan='7' style='text-align:right;'>TOTAL</td>
    <td> ₹".$fmt->format($pay_total)."</td>
    <td> ₹".$fmt->format($bill_total)."</td>
    <td> ₹".$fmt->format($margin_total)."</td>
    <td></td>
</tr>
</tfoot>";
}
?>