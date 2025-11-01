<?php
include("../cpanel/db.php");

$username = $_POST['username'];
$subdomain = $_POST['domain'];
$token = $_POST['token'];
$file = $_FILES['photo'];

if ($username) {
    $k = mysqli_query($host, "SELECT * FROM apk_token WHERE token='$token' AND user='$username' AND sub_domain='$subdomain'");
    if (mysqli_num_rows($k) > 0) {
        
        if ($file['tmp_name']) {
            $tmp = $file['tmp_name'];
            $extension = pathinfo($file['name'], PATHINFO_EXTENSION);
            $fileName = uniqid() . time() . "." . $extension;
            $destination = "../cpanel/img/" . $fileName;
            if (resizeImage($tmp, $destination, "200","200")) { // Adjusted quality for better compression
                mysqli_query($host, "UPDATE user SET photo='$fileName' WHERE mobile='$username'");
                $ar1 = array('status' => true, 'message' => "Successfully uploaded");
            } else {
                $ar1 = array('status' => false, 'message' => "Image compression failed");
            }
        } else {
            $ar1 = array('status' => false, 'message' => "No File!");
        }
    } else {
        $ar1 = array('status' => false, 'message' => "Token Expired");
    }

    echo json_encode($ar1);
} else {
    echo '<script>window.location="http://wschool.online";</script>';
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

// Check if an image was uploaded
if (isset($_FILES['myform'])) {
    // Define the maximum dimensions for the resized image
    $maxWidth = 200;
    $maxHeight = 200;

    // Get the uploaded image details
    $image = $_FILES['myform'];
    $imagePath = $image['tmp_name'];
    $path=$_FILES['myform']['name'];
$ext=pathinfo($path, PATHINFO_EXTENSION);

    // Generate a unique filename for the resized image
    $imgname=time().uniqid().$sid.".".$ext;
      $newImagePath='../upload/'.$imgname;

    // Resize the image
    if (resizeImage($imagePath, $newImagePath, $maxWidth, $maxHeight)){
        mysqli_query($host,"delete from docs where sid='$sid' and cid='$user'");
          $q="insert into docs set name='photo',filename='$imgname',sid='$sid',date='$date',cid='$user'";
        mysqli_query($host,$q);
       ?>
       <script>
          $("#photo<?php echo $sid; ?>").attr('src','upload/<?php echo $imgname; ?>'); 
       </script>
       <?php
    } else {
        alert("Something Went Wrong Please Try Again Latter"); 
    }
} else {
  ?>
  <script>
     alert("Something Went Wrong Please Try Again Latter"); 
  </script>
  <?php
}
?>
