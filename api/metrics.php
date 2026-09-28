<?php
header('Content-Type: text/plain; version=0.0.4');
$path = '/metrics';
echo "# HELP ats_app_info Static application information\n";
echo "# TYPE ats_app_info gauge\n";
echo "ats_app_info{service=\"ats\",runtime=\"php\"} 1\n";
echo "ats_endpoint_info{path=\"" . $path . "\"} 1\n";
