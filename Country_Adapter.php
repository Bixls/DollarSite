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

private function GetCurrency ($c)
{
  $json = file_get_contents('http://devel.farebookings.com/api/curconversor/USD/'+$c+'/1/json');

  $data = json_decode($json,true);

  $val = $data[$c];

  return $val;
}

public function UpdateCurrency ($c) {

  $val = $this->GetCurrency($c);

  $sql = mysql_query("INSERT INTO Countries (Value) Values ('"+$val+"') WHERE code LIKE '%".$c."%'") or die (mysql_error());

  $query = mysql_query($sql);

  if (!$query)
  {
    return false;
  }
}
}

?>
