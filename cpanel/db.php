<?php $host=mysqli_connect("localhost","root","","ATS");
$date=date('Y-m-d');
date_default_timezone_set('Asia/Kolkata');

$date=date('Y-m-d');
$time=date('H:i:s'); 
$subdomain="meraqui";

if (!function_exists('ats_normalize_email')) {
    function ats_normalize_email($email) {
        return strtolower(trim((string)$email));
    }
}

if (!function_exists('ats_normalize_mobile')) {
    function ats_normalize_mobile($mobile) {
        $mobile = preg_replace('/\D+/', '', trim((string)$mobile));

        if ($mobile === '') {
            return '';
        }

        $mobile = ltrim($mobile, '0');
        if (strlen($mobile) > 10) {
            $mobile = substr($mobile, -10);
        }

        return $mobile;
    }
}

if (!function_exists('ats_applicant_mobile_sql')) {
    function ats_applicant_mobile_sql($column = 'mobile') {
        $cleaned = "REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(TRIM($column), ' ', ''), '-', ''), '(', ''), ')', ''), '+', ''), '.', '')";
        return "CASE WHEN CHAR_LENGTH(TRIM(LEADING '0' FROM $cleaned)) > 10 THEN RIGHT(TRIM(LEADING '0' FROM $cleaned), 10) ELSE TRIM(LEADING '0' FROM $cleaned) END";
    }
}

if (!function_exists('ats_find_duplicate_applicant')) {
    function ats_find_duplicate_applicant($host, $subdomain, $email, $mobile, $excludeId = 0) {
        $normalizedEmail = ats_normalize_email($email);
        $normalizedMobile = ats_normalize_mobile($mobile);

        $conditions = [];
        $selectEmailMatch = "0 AS email_match";
        $selectMobileMatch = "0 AS mobile_match";

        if ($normalizedEmail !== '') {
            $safeEmail = mysqli_real_escape_string($host, $normalizedEmail);
            $conditions[] = "LOWER(TRIM(email))='$safeEmail'";
            $selectEmailMatch = "LOWER(TRIM(email))='$safeEmail' AS email_match";
        }

        if ($normalizedMobile !== '') {
            $safeMobile = mysqli_real_escape_string($host, $normalizedMobile);
            $mobileSql = ats_applicant_mobile_sql('mobile');
            $conditions[] = "$mobileSql='$safeMobile'";
            $selectMobileMatch = "$mobileSql='$safeMobile' AS mobile_match";
        }

        if (empty($conditions)) {
            return null;
        }

        $where = "subdomain='" . mysqli_real_escape_string($host, $subdomain) . "' AND (" . implode(' OR ', $conditions) . ")";
        if ((int)$excludeId > 0) {
            $where .= " AND id!='" . (int)$excludeId . "'";
        }

        $query = "SELECT id, name, email, mobile, $selectEmailMatch, $selectMobileMatch
                  FROM applicant
                  WHERE $where
                  ORDER BY id DESC
                  LIMIT 1";
        $result = mysqli_query($host, $query);

        if (!$result || mysqli_num_rows($result) === 0) {
            return null;
        }

        return mysqli_fetch_assoc($result);
    }
}
?>
