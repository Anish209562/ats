<?php include("../db.php"); 

function generateAccessToken() {
    $serviceAccount = json_decode(file_get_contents('account.json'), true);
    
    $header = base64UrlEncode(json_encode([
        'alg' => 'RS256',
        'typ' => 'JWT'
    ]));

    $now = time();
    $expires = $now + 3600;

    $claimSet = base64UrlEncode(json_encode([
        'iss' => $serviceAccount['client_email'],
        'scope' => 'https://www.googleapis.com/auth/firebase.messaging',
        'aud' => 'https://oauth2.googleapis.com/token',
        'exp' => $expires,
        'iat' => $now
    ]));

    $signatureInput = $header . '.' . $claimSet;
    $signature = base64UrlEncode(signJwt($signatureInput, $serviceAccount['private_key']));

    $jwt = $signatureInput . '.' . $signature;

    // Get the access token from Google OAuth2
    $token = getGoogleAccessToken($jwt);
    return $token;
}

function signJwt($data, $privateKey) {
    $signature = '';
    openssl_sign($data, $signature, $privateKey, 'sha256');
    return $signature;
}

function base64UrlEncode($data) {
    return rtrim(strtr(base64_encode($data), '+/', '-_'), '=');
}

function getGoogleAccessToken($jwt) {
    $url = 'https://oauth2.googleapis.com/token';
    
    $postFields = http_build_query([
        'grant_type' => 'urn:ietf:params:oauth:grant-type:jwt-bearer',
        'assertion' => $jwt
    ]);

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, [
        'Content-Type: application/x-www-form-urlencoded'
    ]);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $postFields);
    
    $result = curl_exec($ch);
    if ($result === false) {
        throw new Exception('Curl error: ' . curl_error($ch));
    }

    curl_close($ch);
    $responseData = json_decode($result, true);

    return $responseData['access_token'];
}


 $x=$_POST['total_push'];
$title=$_POST['title'];
$desc=$_POST['message'];
$type=$_POST['push_type'];

$desc = str_replace('<br>', "\n", $desc);

if($_POST['break']=='1'){
$desc=  substr($desc,0,150)."....read more !";
}


$token=array();
$k=0;
for($i=1;$i<=$x;$i++){
    $mobile=$_POST['mobile'.$i];
   $ta=mysqli_query($host,"select * from user where mobile='$mobile' ");
   $rr=mysqli_fetch_array($ta);
   $token[$k]=$rr['deviceid']; 
   
   ++$k;
}



if(count($token)>0)
{
    
    mysqli_query($host,"insert into notifications set title='$title',description='$desc',date='$date',time='$time'");

    $accessToken = generateAccessToken();
    $url = 'https://fcm.googleapis.com/v1/projects/kaizencoo-8877c/messages:send';
           
    try {
 
    foreach ($token as $deviceToken) {
        
     
            $fields = [
                "message" => [
                    "token" => $deviceToken,
                    "notification" => [
                        "title" => $title,
                        "body" => $desc
                    ]
                ]
            ];

            $headers = [
                'Authorization: Bearer ' . $accessToken,
                'Content-Type: application/json'
            ];

            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));

            $result = curl_exec($ch);
            if ($result === FALSE) {
                die('Curl failed: ' . curl_error($ch));
            }

            curl_close($ch);
        }
    
        
    } catch (Exception $e) {
        echo 'Error: ' . $e->getMessage();
     }

   
?>
       
       <script>
                 
          
        preloader.hide();
        Swal.fire({
            position: "top-center",
            icon: "success",
            title: "Successfully sent",
            showConfirmButton: false,
            timer:2000
        });
         setTimeout(function() { 
             window.location.reload();
      } ,1200); 
     
       </script>
       <?php
}
else
{
    ?> <script> 
    
    
        preloader.hide();
        Swal.fire({
            position: "top-center",
            icon: "info",
            title: "No Device ID Found",
            showConfirmButton: false,
            timer: 3000
        });
        /*
        setTimeout(function() { 
             location.reload();
        },3200);*/
        
        
    </script> <?php
}
?>
