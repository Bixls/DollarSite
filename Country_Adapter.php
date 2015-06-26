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
  private $name = $_POST["name"];
  private $code = $_POST["code"];
  private $curr_value = $_POST["curr_value"];
  private $curr_full = $_POST["curr_full"];
  private $curr_short = $_POST["curr_short"];
  private $flag = $_POST["flag"];

public function Create()
{
  $country = new Country();
  $country->name = $this->name;
  $country->code = $this->code;
  $country->curr_value = $this->curr_value;
  $country->curr_full = $this->curr_full;
  $country->curr_short = $this->curr_short;
  $country->flag = $this->flag;
  update($country);
}


}

?>
