<?php
include("../session.php");

if (isset($_POST['ids'])) {
    $ids = $_POST['ids'];

    if (!is_array($ids) && strpos($ids, ",") === false) {
        $id = intval($ids);
        $sql = "UPDATE applicant SET favorite = '1' WHERE id = $id";
    } else {
        if (!is_array($ids)) {
            $ids = explode(",", $ids);
        }
        $ids = array_map('intval', $ids);

        if (count($ids) > 0) {
            $idList = implode(",", $ids);
            $sql = "UPDATE applicant SET favorite = '1' WHERE id IN ($idList)";
        } else {
            echo json_encode(["status" => "error", "message" => "No valid IDs provided"]);
            exit;
        }
    }

    if (mysqli_query($host,$sql)) {
        echo json_encode(["status" => "success", "message" => "Marked as favorite"]);
    } else {
        echo json_encode(["status" => "error", "message" => $conn->error]);
    }
} else {
    echo json_encode(["status" => "error", "message" => "No IDs received"]);
}

mysqli_close($host);
?>
