<?php
include("../db.php");

$meetingId = $_GET['id'] ?? 1;


$result = mysqli_query($host, "SELECT * FROM meeting WHERE id = '$meetingId'");
if (mysqli_num_rows($result) === 0) {
    die("Meeting not found.");
}

$row = mysqli_fetch_array($result);
$name=$row['sid'];
$ss = mysqli_query($host, "SELECT name FROM applicant WHERE id = '$name'");
$ssd = mysqli_fetch_array($ss);
$eds=$ssd[0];

// Prepare guest emails
$guestsArray = array_filter(array_map('trim', explode(',', $row['guest'] ?? '')));
if (empty($guestsArray)) {
    die("No guest emails found.");
}

// Prepare meeting details
$meetingDetails = [
    'meetingTitle' => $row['title'] ?? 'Meeting Scheduled',
    'duration' => $row['duration'] ?? 'N/A',
    'date' => $row['dates'] ?? 'N/A',
    'meetingMode' => $row['mode'] ?? 'N/A',
    'time' => $row['times'] ?? 'N/A',
    'attendees' => $row['adname'] ?? 'N/A',
    'guests' => $guestsArray,
    'venue' => $row['venue'] ?? 'N/A',
    'description' => $row['description'] ?? 'N/A',
    'candidateName' => $eds
];

$htmlContent = '
<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Meeting Confirmation</title>
  <style>/* your CSS here unchanged */</style>
</head>
<body>
  <div class="email-container">
    <h1>Meeting with ' . htmlspecialchars($meetingDetails['candidateName']) . ' Scheduled</h1>
    <p>Dear <span class="email-address">' . htmlspecialchars($to) . '</span></p>
    <p>We\'re pleased to confirm that your meeting has been set up as follows:</p>

    <div class="meeting-details-box">
      <h2>Meeting Details:</h2>
      <ul>
        <li><span>Meeting Title:</span> ' . htmlspecialchars($meetingDetails['meetingTitle']) . '</li>
        <li><span>Duration:</span> ' . htmlspecialchars($meetingDetails['duration']) . '</li>
        <li><span>Date:</span> ' . htmlspecialchars($meetingDetails['date']) . '</li>
        <li><span>Meeting Mode:</span> ' . htmlspecialchars($meetingDetails['meetingMode']) . '</li>
        <li><span>Time:</span> ' . htmlspecialchars($meetingDetails['time']) . '</li>
        <li><span>Attendees:</span> ' . htmlspecialchars($meetingDetails['attendees']) . '</li>
        <li><span>Guests:</span> <span class="guest-email">' . htmlspecialchars($guestList) . '</span></li>
        <li><span>Meeting Venue:</span> ' . htmlspecialchars($meetingDetails['venue']) . '</li>
        <li><span>Description:</span> ' . htmlspecialchars($meetingDetails['description']) . '</li>
      </ul>
    </div>

    <p>Please be sure to join the meeting at the scheduled time.</p>
    <p>We look forward to our discussion!</p>

    <div class="footer">
      <img src="https://meraqui.com/wp-content/uploads/2024/09/White-LOGO_High_Meraqui_Tag-line_Hire-Manage-Tech-Services-White-1-2048x512.png" alt="Company Logo" style="width: 128px;filter: invert(1);"/>
      <p>Powered by Meraqui</p>
    </div>
  </div>
</body>
</html>
';


// Prepare attachment files
$attachmentFiles = [];
$attachmentQuery = mysqli_query($host, "SELECT file FROM survey_upload WHERE idd = '$meetingId'");
while ($fileRow = mysqli_fetch_assoc($attachmentQuery)) {
    $filePath = '../img/' . $fileRow['file'];
    if (file_exists($filePath)) {
        $attachmentFiles[] = $filePath;
    }
}

// Email addresses
$to = array_shift($guestsArray);  // First guest as main receiver
$bccList = $guestsArray;               // Rest as CC

$subject = "Meeting with ".$row['adname']." Scheduled";
$from = "contact@meraqui.com";
$fromName = "Meeting Scheduler";

$separator = md5(time());
$eol = PHP_EOL;

// Headers
$headers = "From: $fromName <$from>" . $eol;
$headers .= "Reply-To: ".$row['ademail'] . $eol;
$headers .= "BCC: $bccList" . $eol;
$headers .= "MIME-Version: 1.0" . $eol;
$headers .= "Content-Type: multipart/mixed; boundary=\"$separator\"" . $eol;
$headers .= "X-Mailer: PHP/" . phpversion() . $eol;

// Message Body
$body = "--$separator" . $eol;
$body .= "Content-Type: text/html; charset=\"UTF-8\"" . $eol;
$body .= "Content-Transfer-Encoding: 8bit" . $eol . $eol;
$body .= $htmlContent . $eol;

// Attach each file
foreach ($attachmentFiles as $filePath) {
    if (file_exists($filePath)) {
        $fileName = basename($filePath);
        $attachment = chunk_split(base64_encode(file_get_contents($filePath)));
        $body .= "--$separator" . $eol;
        $body .= "Content-Type: application/octet-stream; name=\"$fileName\"" . $eol;
        $body .= "Content-Transfer-Encoding: base64" . $eol;
        $body .= "Content-Disposition: attachment; filename=\"$fileName\"" . $eol . $eol;
        $body .= $attachment . $eol;
    }
}

$body .= "--$separator--";

if (mail($to, $subject, $body, $headers)) {
    echo "Mail sent successfully!";
} else {
    echo "Mail sending failed.";
}
?>
