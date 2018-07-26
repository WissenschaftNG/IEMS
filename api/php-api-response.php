<?php
/**************************
@Title: iEMS PHP API Call
@Author: Ezeasor Ekene
@Contact: ezeasorekene@unizik.edu.ng
***************************/


//Assigning the values. NOTE: These values are dynamic and can change within your script
$api_key = "API-KEY"; //Contact @Author to get an api key
$api_url = "API-URL"; //The url of the api
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
  function iems_api_response($data_type,$api_listing=FALSE,$row='',$response='',$fetch_type='all',$call_type='get'){
	  //Calls sent to the api are get calls requesting all listed data by default
	  $api_url = iems_api_url().$call_type.'/'.$data_type.'/'.$fetch_type;
	  $json = file_get_contents($api_url);
	  $data = json_decode($json, TRUE);
    if ($api_listing===FALSE):
      $api_response = $data;//Lists all the data in an array
    elseif ($api_listing===TRUE):
  	  $api_response = $data[$row][$response];//Gets a single data in an array
    endif;
    // Return the response
  	return $api_response;
  }
}


?>
