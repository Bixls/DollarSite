<?php
/*
country code
county name
currency value
currency full name
currency short name
flag
*/
class Country_Adapter
{


public function Create()
{
  $country = new Country();

  array $country_array = array();
  $country_array["name"] =  $_POST["name"];
  $country_array["code"] = $_POST["code"];
  $country_array["curr_value"] = $_POST["curr_value"];
  $country_array["curr_full"] = $_POST["curr_full"];
  $country_array["curr_short"] = $_POST["curr_short"];
  $country_array["flag"] = $_POST["flag"];

  $country->setCountry($country_array);
  update($country);
}


}

?>
