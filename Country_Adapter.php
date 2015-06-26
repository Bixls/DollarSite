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
  $country->name =  $_POST["name"];
  $country->code = $_POST["code"];
  $country->curr_value = $_POST["curr_value"];
  $country->curr_full = $_POST["curr_full"];
  $country->curr_short = $_POST["curr_short"];
  $country->flag = $_POST["flag"];
  update($country);
}


}

?>
