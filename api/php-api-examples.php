<?php
require 'php-api-response.php';

//To print all departments
print iems_api_response('departments');

//To print all faculties
print iems_api_response('faculties');

//To print all staff list
print iems_api_response('staff');

//To print the surname of the second staff in the staff list
print iems_api_response('staff',TRUE,1,'Surname');

//To print the surname of a particular staff using the iEMS ID-2018001
print iems_api_response('staff',TRUE,0,'Surname','2018001');

?>
