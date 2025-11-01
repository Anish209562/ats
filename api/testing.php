<?php include("../cpanel/db.php");

$ar1['main'] = array();

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

echo json_encode($ar1);
?>