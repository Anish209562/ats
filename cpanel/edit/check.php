<?php
include("../db.php");
$conn=$host;
$sql = "SELECT client FROM job WHERE cid IS NULL GROUP BY client";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $jobClient = trim($row['client']); // remove extra spaces

        $sqlClient = "SELECT id FROM client WHERE TRIM(name) LIKE '%".mysqli_real_escape_string($conn, $jobClient)."%' LIMIT 1";
        $resClient = mysqli_query($conn, $sqlClient);

        if (mysqli_num_rows($resClient) > 0) {
            $clientRow = mysqli_fetch_assoc($resClient);
            $clientId = $clientRow['id'];

            $sqlUpdate = "UPDATE job SET cid = $clientId WHERE TRIM(client) LIKE '%".mysqli_real_escape_string($conn, $jobClient)."%' AND cid IS NULL";
            mysqli_query($conn, $sqlUpdate);
        }
    }
}

mysqli_close($conn);
?>