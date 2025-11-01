<?php include("../cpanel/db.php");

$username=$_POST['username'];
$user=$username;
$subdomain=$_POST['domain'];;
$token=$_POST['token'];
$category=addslashes($_POST['category']);
$product=addslashes($_POST['product']);
$oname=addslashes($_POST['oname']);
$bname=addslashes($_POST['bname']);
$description=addslashes($_POST['description']);
$phone=$_POST['mobile'];
$address2=addslashes($_POST['address']);
$pincode2=$_POST['pincode'];

$file=$_FILES['photo'];

function condate($d)
{
 return $newDate = date("d M Y", strtotime(d));    
}
if($username)
{
    
 $k=mysqli_query($host,"select * from  apk_token where token='$token' and user='$username' and sub_domain='$subdomain'");
 if(mysqli_num_rows($k)>0)
    {


        if ($file['tmp_name']) {
            $tmp = $file['tmp_name'];
            $extension = pathinfo($file['name'], PATHINFO_EXTENSION);
            $fileName = uniqid() . time() . "." . $extension;
            $destination = "../cpanel/img/" . $fileName;
            if (resizeImage($tmp, $destination, "200","200")) { // Adjusted quality for better compression
                mysqli_query($host, "UPDATE user SET vendor_photo='$fileName' WHERE mobile='$username'");
                $ar1 = array('status' => true, 'message' => "Successfully uploaded");
            } else {
                $ar1 = array('status' => false, 'message' => "Image compression failed");
            }
        }
	
		$s=mysqli_query($host,"update user SET category ='$category',product='$product',ddate='$date',vstatus='pending',ttime='$time', oname='$oname', bname='$bname', description='$description', phone='$phone', address2='$address2',vendor_photo='$fileName',pincode2='$pincode2' where mobile='$username'");
		  $ar1 = array();
          $ar1['status']=true;
		  $ar1['message']="Successfully Updated";
		  
		 
	
		   
    }
    else
    {
          $ar1 = array();
          $ar1['status']=false;
		  $ar1['message']="$username"."".$token;
    }
     echo $json = json_encode($ar1); 





}else{
    
    ?>
    <script>
        window.location="http://wschool.online";
        
    </script>
    <?php
    
    
}


function resizeImage($imagePath, $newImagePath, $maxWidth, $maxHeight)
{
    // Get the original image dimensions
    list($originalWidth, $originalHeight, $imageType) = getimagesize($imagePath);

    // Calculate the aspect ratio
    $ratio = $originalWidth / $originalHeight;

    // Calculate the new dimensions
    if ($maxWidth / $maxHeight > $ratio) {
        $newWidth = $maxHeight * $ratio;
        $newHeight = $maxHeight;
    } else {
        $newWidth = $maxWidth;
        $newHeight = $maxWidth / $ratio;
    }

    // Create a new image resource with the desired dimensions
    $newImage = imagecreatetruecolor($newWidth, $newHeight);

    // Load the original image based on its type
    switch ($imageType) {
        case IMAGETYPE_JPEG:
            $originalImage = imagecreatefromjpeg($imagePath);
            break;
        case IMAGETYPE_PNG:
            $originalImage = imagecreatefrompng($imagePath);
            break;
        case IMAGETYPE_GIF:
            $originalImage = imagecreatefromgif($imagePath);
            break;
        // Add support for other image formats if needed

        default:
            // Unsupported image type
            return false;
    }

    // Resize the image
    imagecopyresampled($newImage, $originalImage, 0, 0, 0, 0, $newWidth, $newHeight, $originalWidth, $originalHeight);

    // Save the resized image as JPEG
    imagejpeg($newImage, $newImagePath);

    // Free up memory
    imagedestroy($originalImage);
    imagedestroy($newImage);

    return true;
}




?>