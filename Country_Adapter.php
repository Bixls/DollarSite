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

public function update ($country){
  $country_array = $country->getCountry();
  $code = $country_array["code"];
  $result = mysql_query("SELECT * FROM Countries WHERE code = $code ");
  $is_found = mysql_num_rows($result) > 0 ? true : false ;
  if (is_found == true) {
    //throw an error (country already exists)
  }else {
    $sql = "INSERT INTO MyGuests (code , name , value , curr_full , curr_short , flag)
    VALUES ($country_array["code"], $country_array["name"], $country_array["value"],$country_array["curr_full"],$country_array["curr_short"],$country_array["flag"])";
  }
}

}

?>
