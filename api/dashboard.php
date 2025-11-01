<?php include("../cpanel/db.php");
$json = file_get_contents('php://input');
$obj = json_decode($json,true);

$username=$obj['number'];
$user=$username;
$subdomain=$obj['domain'];;
$token=$obj['token'];
$date=date('Y-m-d');

if($username)
{
    
 $k=mysqli_query($host,"select * from  apk_token where token='$token' and user='$username' and sub_domain='$subdomain'");
 if(mysqli_num_rows($k)==1)
    {
        
        $s=mysqli_query($host,"select * from user where mobile='$username'");
        
          $ar1 = array();
          $ar1['status']=true;
	      $ar1['message']="success"; 

    	  $d=mysqli_fetch_array($s);
    	  
    	  $ll=mysqli_query($host,"select ltime from user where mobile='$username' and date(ltime)='$date' ");
    	  if(mysqli_num_rows($ll)==0){
    	      $datetime=date('Y-m-d H:i:s');
    	      mysqli_query($host,"update user set ltime='$datetime' where mobile='$username' ");
    	  }
    	   
    	  $basic=mysqli_query($host,"select * from basic_setting where sub_domain='$subdomain' order by id desc limit 1");
    	  $bas=mysqli_fetch_array($basic);
    	  
    	  $ar1['banner']="https://kaizencommunity.in/admin/cpanel/img/basic_photo/".$bas['ads_banner'];
	      $ar1['url']=$bas['ads_banner_link'];
    	  
    	  $ar1['fmember']=$d['F_member'];
    	  $ar1['vehicle']=$d['vehicle'];
    	  
    	  $ar1['fmember2']=$d['family2'];
    	  $ar1['fmember3']=$d['family3'];
    	  $ar1['vehicle2']=$d['vehicle2'];
    	  $ar1['vehicle3']=$d['vehicle3'];
    	  $ar1['address']=$d['address'];
    	  $ar1['state']=$d['state'];
    	  $ar1['city']=$d['city'];
    	  $ar1['pincode']=$d['pincode'];
    	  $ar1['versions']='2.1';
    	  $ar1['website']='https://play.google.com/store/apps/details?id=com.kaizen.community&pcampaignid=web_share';

    	  
		  
		  $ar1['terms']=$bas['terms_text'];  
		  $ar1['aboutus']=$bas['aboutus_text'];
		  $ar1['privacy']=$bas['privacy_text']; 
		  $ar1['faq']=$bas['faq_text'];
		  $ar1['todaydate']=strtoupper(date('D d M',strtotime($date)));
		 
		  
		  if($d['photo']){
		      $ar1['photo']="https://kaizencommunity.in/admin/cpanel/img/".$d['photo']; 
		  }else{
		      $ar1['photo']=""; 
		  }
		  $ar1['usekcc']=$bas['card_benefit'];  
		  $ar1['cardtype']=$d['plan']; 
		  $ar1['kccid']=$d['id']; 
		  $ar1['cardtype']=$d['plan']; 
		  
		 	     	  
		  if(strtolower($d['plan'])=="basic"){  $ar1['benifit']="<h6>Basic Card Benifits</h6> <p style='padding:0px;margin:0px;'>1. Discounts on daily use services for a lifetime <br></br> 2. Discounts on daily-use products for a lifetime</p>"; }
		  if(strtolower($d['plan'])=="vip"){  $ar1['benifit']="<h5>VIP Card Benifits</h5> <p>1. Discounts on daily use services for a lifetime <br></br> 2. Discounts on daily-use products for a lifetime <br></br> 3. Emergency Funds <br></br> 4. VIP Access</p>";  }
		  if(strtolower($d['plan'])=="premium"){ 
		      $ar1['benifit']="<h5>Premium Card Benifits</h5> <p>1. Discounts on daily use services for a lifetime <br></br> 2. Discounts on daily-use products for a lifetime <br></br> 3. Emergency Funds</p> ";
		      
		  }
    	  
		  $ar1['wallet']="";
		  $ar1['vstatus']=$d['vstatus'];
		  $ar1['statuss']=$d['status'];
		  $ar1['vcategory']=$d['category'];
   		  $ar1['vproduct']=$d['product'];
   		  
   		  $stt1=mysqli_query($host,"select sname from survey_name where status='Active' order by id desc limit 1");
          $vtt1 = mysqli_fetch_array($stt1); 
          
          $tt=$vtt1[0];
   		  
   		  $stt2=mysqli_query($host,"select id from survey_upload where sid='$tt' and username='$username'");
          if(mysqli_num_rows($stt2)==0 && $tt) 
          {
   		  $ar1['survey']="1";
          }else
          {
          $ar1['survey']="11";    
          }
   		  if($d['kcc']=="complete")
   		  {
   		   $ar1['kccstatus']="yes"; 
   		  }
   		  else
   		  {
   		   $ar1['kccstatus']=$d['kcc']; 
   		  
   		  
   		  }
   		  $ar1['reason']="Now you are a registered KCC creator on the KAiZEN Community platform. 

           Date or Time - ".date('d M Y',strtotime($d['kdate']))." , ".date('H:i',strtotime($d['ktime']));
        
   		   
          $s3=mysqli_query($host,"select * from kccupdate where user='$username' order by id desc limit 1");
          $d3=mysqli_fetch_array($s3);
   		  if($d3['status']=="pending")
   		  {
   		   
   		   $ar1['cardstatus']="Your KCC update request of ".strtoupper($d3['card'])." card has been submited on ".date('d M Y',strtotime($d3['date']))." , ".date('H:i',strtotime($d3['time']));
           $ar1['cardvalue']="PENDING";
   		  }
   		  else
   		  {
   		    if($d3['status']=="cancel")
   		    {
   		      $ar1['cardstatus']="Your KCC update request of ".strtoupper($d3['card'])." card has been Reject on ".date('d M Y',strtotime($d3['rdate']))." , ".date('H:i',strtotime($d3['rtime']));
     $ar1['cardvalue']="REJECTED";
   		    }else
   		    {
   		    $ar1['cardstatus']="";  $ar1['cardvalue']="";
   		    }
   		  }
   		  
   		   $ar1['document1']="https://kaizencommunity.in/admin/cpanel/img/basic_photo/".$bas['terms'];
   		   $ar1['document2']="https://kaizencommunity.in/admin/cpanel/img/basic_photo/".$bas['auth1'];
   		   $ar1['document3']="https://kaizencommunity.in/admin/cpanel/img/basic_photo/".$bas['auth2'];

   		   
   		   $stt=mysqli_query($host,"select * from feedback where user='$username'");
        
           $vtt = mysqli_fetch_array($stt); 
   		   
		   $ar1['rating']=$vtt['rating'];
		   $ar1['fmessage']=$vtt['message'];
 		   $ar1['vdate']=date('d M Y',strtotime($d['ddate']));
           $ar1['vtime']=date('H:i',strtotime($d['ttime']));

		   $ar1['category']=array(); 
		   
		   
		  $svv=mysqli_query($host,"select * from  category where type='cate' group by name");
           while($ctt = mysqli_fetch_array($svv))
           { 
            $cates=$ctt['name'];    
		    $svv1=mysqli_query($host,"select * from  product where category='$cates'");
                   
                   $row['name']=$ctt['name'];
                   $row['products']=array();
                   while($ctt1 = mysqli_fetch_array($svv1))
                   {  
                       $row1['name']=$ctt1['name'];
                       $row['products'][]=$row1;
                   }
                   if(mysqli_num_rows($svv1)>0)
                   {
                       $ar1['category'][]=$row; 
                   }
            		   
            		    
           }
           
           $ar1['occapution']=array();
           $svv1=mysqli_query($host,"select * from  category where type='occa' group by name");
           while($ctt = mysqli_fetch_array($svv1))
           {
               $row11['name']=$ctt['name'];
    		   $ar1['occapution'][]=$row11; 
           }
		   
		   $ar1['product']=array();  
		   
		   
		   $svv1=mysqli_query($host,"select * from product");
        
           while($ctt1 = mysqli_fetch_array($svv1))
           { 
              $row1['name']=$ctt1['name'];
    		   $ar1['product'][]=$row1;  
           }
           
           
$ar1['statee'] = array();

$svv2 = mysqli_query($host, "select state from state order BY state ASC");
while ($ctt1 = mysqli_fetch_array($svv2)) {
    $row = $ctt1[0];
    $state = array();
    $state['state_name'] = $row;
    $state['district'] = array();

    $s1 = mysqli_query($host, "select name from district WHERE category='$row' order by name asc");
    while ($d1 = mysqli_fetch_array($s1)) {
        $row1 = $d1[0];
        $district = array();
        $district['district_name'] = $row1;
        $district['panchayat'] = array();

        $s2 = mysqli_query($host, "select name2 from district_sub WHERE name='$row1' and status='Rural' order by name2 asc");
        while ($d2 = mysqli_fetch_array($s2)) {
            $row2 = $d2[0];
            $panch = array();
            $panch['panchayat_name'] = $row2;
            $panch['gram'] = array();

            $s3 = mysqli_query($host, "select name3 from district_sub2 WHERE name2='$row2' order by name3 asc");
            while ($d3 = mysqli_fetch_array($s3)) {
                $row3 = $d3[0];
                $gram = array();
                $gram['gram_name'] = $row3;
                $gram['village'] = array();

                $s4 = mysqli_query($host, "select status from district_sub3 WHERE name3='$row3' order by status asc");
                while ($d4 = mysqli_fetch_array($s4)) {
                    $row4 = $d4[0];
                    $village = array();
                    $village['village_name'] = $row4;
                    $gram['village'][] = $village;
                }

                $panch['gram'][] = $gram;
            }

            $district['panchayat'][] = $panch;
        }

        $state['district'][] = $district;
    }

    $ar1['statee'][] = $state; 
}


$ar1['statee2'] = array();

$svv2 = mysqli_query($host, "select state from state order BY state ASC");
while ($ctt1 = mysqli_fetch_array($svv2)) {
    $row = $ctt1[0];
    $state = array();
    $state['state_name'] = $row;
    $state['district'] = array();

    $s1 = mysqli_query($host, "select name from district WHERE category='$row' order by name asc");
    while ($d1 = mysqli_fetch_array($s1)) {
        $row1 = $d1[0];
        $district = array();
        $district['district_name'] = $row1;
        $district['panchayat'] = array();

        $s2 = mysqli_query($host, "select name2 from district_sub WHERE name='$row1' and status='Urban' order by name2 asc");
        while ($d2 = mysqli_fetch_array($s2)) {
            $row2 = $d2[0];
            $panch = array();
            $panch['panchayat_name'] = $row2;
            
            $district['panchayat'][] = $panch;
        }

        $state['district'][] = $district;
    }

    $ar1['statee2'][] = $state; 
}


    }
    else
    {
          $ar1 = array();
          $ar1['status']=false;
		  $ar1['message']="Token Expire";
    }
     echo $json = json_encode($ar1); 





}
else
{
    ?>
    <script>
        window.location="http://wschool.online";
    </script>
    <?php
}



?>