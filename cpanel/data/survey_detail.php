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



$id=$_POST['id'];
if($id){
   mysqli_query($host,"delete from survey where id='$id'");
   $m="successfully deleted";

}else{
$snameAndId = $_POST['sname'];
$snameAndIdParts = explode(',', $snameAndId);

$sname = $snameAndIdParts[0]; // Survey Name
$sidd = $snameAndIdParts[1]; // Survey ID

$question=$_POST['question'];
$type=$_POST['type'];
$photo_hidden=$_POST['photo_hidden'];


if($_POST['cid']){
    $photoData = base64_decode($photo_hidden);
   $fileName="survey".time().uniqid().".jpg";
   file_put_contents("../img/".$fileName,$photoData); 
}else{
    if(isset($update)) { 
        $fileName=$photo_hidden;
        
    }
}


$option1=$_POST['answer1'];
$option2=$_POST['answer2'];
$option3=$_POST['answer3'];
$option4=$_POST['answer4'];
$option5=$_POST['answer5'];

$update=$_POST['hidden'];


if($update>0){
     mysqli_query($host,"update survey set sid='$sidd', sname='$sname', question='$question', photo='$fileName', type='$type', option1='$option1', option2='$option2', option3='$option3', option4='$option4', option5='$option5' where id='$update'");
    $m="successfully updated";
}else{
    mysqli_query($host,"insert into survey set sid='$sidd', sname='$sname',  question='$question', photo='$fileName', type='$type', option1='$option1', option2='$option2', option3='$option3', option4='$option4', option5='$option5' ");
    $m="successfully inserted";
}



$accessToken = generateAccessToken();
$url = 'https://fcm.googleapis.com/v1/projects/kaizencoo-8877c/messages:send';

$fields = [
    "message" => [
        "topic" => "update", 
        "notification" => [
            "title" => $sname,
            "body" => $question
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

if ($result == FALSE) {
    die('Curl failed: ' . curl_error($ch));
}

curl_close($ch); 


}
?>
<script>
	  Swal.fire({
        position: "top-center",
        icon: "success",
        title: "<?php echo $m;  ?>",
        showConfirmButton: false,
        timer: 2000
    });
    
    $("#formtemplate")[0].reset();
    $("#edit_image").attr('src','');
    $("#edit_image").css("display","none");
    $("#photo_hidden").val("");
    
      
</script>
<?php include("../content/survey_detail.php");?>
