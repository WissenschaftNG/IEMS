<?php
/**************************
iEMS PHP Response
@Author: Ezeasor Ekene
@Contact: ezeasor.ekene@unizik.edu.ng
***************************/


//Assigning the values. NOTE: These values are dynamic and can change within your script
$api_key = "API-KEY"; //Contact @Author to get an api key
$api_url = "https://iems.unizik.edu.ng/api";
$data_type = "API-DATA-TYPE"; //Available are staff,faculties,departments
$call_type = "API-CALL-TYPE"; //Default is 'get'
$fetch_type = "API-FETCH-TYPE"; //Default is 'all'. Available are all and {Staff iEMS ID}


//Get the iEMS API URL
if (!function_exists('iems_api_url'){
  function iems_api_url($api_url){
	if(substr($api_url,-1)!=='/'){
	  // add ending '/' if not exists
	  $api_url = $api_url.'/'.iems_api_auth();
	}
	// returns the url with an ending single slash '/'
	return $api_url.'/';
  }
}

    
//Get the iEMS API authentication key
if (!function_exists('iems_api_auth'){
  function iems_api_auth($api_key){
	return iems_api_url().$api_key.'/';
  }
}


//Set the api call, data and fetch types to get a successful response
if (!function_exists('iems_api_response'){
  function iems_api_response($row,$response,$data_type,$call_type='get',$fetch_type='all'){
	//Calls sent to the api are get calls requesting all listed data by default
	$api_url = iems_api_url().$call_type.'/'.$data_type.'/'.$fetch_type;
	$json = file_get_contents($api_url);
	$data = json_decode($json, TRUE);
	$api_response = $data[$row][$response];
	return $api_response;
  }
}

?>
