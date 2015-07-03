<?php
/*
country code
county name
currency value
currency full name
currency short name
flag
*/
class CountryAdapter
{


public function Create()
{
  $country = new Country();
  $country_array = array();
  $country_array['name'] =  $_POST['name'];
  $country_array['code'] = $_POST['code'];
  $country_array['value'] = $_POST['value'];
  $country_array['curr_full'] = $_POST['curr_full'];
  $country_array['curr_short'] = $_POST['curr_short'];
  $country_array['flag'] = $_POST['flag'];

  $country->setCountry($country_array);
  $this->update($country);
}

public function remove($code) {
  $query = mysql_query("DELETE FROM Countries WHERE code = ".$code);

  if ($query) {
    //sucess
  }else {
    //throw an error (failed to delete)
  }
}


public function Edit()
{

  $query = mysql_query("UPDATE Countries SET name='".$_POST['name']."', code='".$_POST['code']."' , value='".$_POST['value']."' , curr_full='".$_POST['curr_full']."' , curr_short='".$_POST['curr_short']."' , flag='".$_POST['flag']."' WHERE code='".$_POST['code']."'") or die (mysql_error());

  if (!$query)
  {
    return false;
  }

}


public function update ($country){
  $country_array = $country->getCountry();
  $code = $country_array['code'];
  $result = mysql_query("SELECT * FROM Countries WHERE code = $code ");
  if ($result) {
    //throw an error (country already exists)
  }else {
    $sql = "INSERT INTO countries VALUES ('".$country_array['code']."', '".$country_array['name']."', '".$country_array['value']."','".$country_array['curr_full']."','".$country_array['curr_short']."','".$country_array['flag']."')";
    $query = mysql_query($sql);
    if(!$query)
    {
      echo"fail";
    }
  }
}

private function GetCurrency ($c)
{
  $json = file_get_contents('http://devel.farebookings.com/api/curconversor/USD/'.$c.'/1/json');

  $data = json_decode($json,true);

  $val = $data[$c];

  return $val;

}

public function UpdateCurrency ($c) {

  $val = $this->GetCurrency($c);

  $sql = mysql_query("UPDATE Countries SET  value='".$val."' WHERE code LIKE '%".$c."%'") or die (mysql_error());

  $query = mysql_query($sql);

  if (!$query)
  {
    return false;
  }
}

public function GetCurrencies () {

  $query = mysql_query("SELECT * FROM Countries");

  $i=0;

  while ($row = mysql_fetch_assoc($query)) {

    $countries = array();

    $countries[$i]=$row['code'];

    $i++;

  }

  return $countries;
}

public function UpdateCurrencies () {

  $countries = $this->GetCurrencies();

  foreach ($countries as &$country) { 

    $this->UpdateCurrency($country);

  }
}

public function RelateCurrencies ($c) {

  $sql = mysql_query("SELECT * FROM Countries WHERE code LIKE '%".$c."%'");

  $result = mysql_fetch_assoc($sql);

  $query = mysql_query("SELECT * FROM Countries");

  $countries = array();

  $i=0;

  $ref_val = floatval($result['value']);

  while ($row = mysql_fetch_assoc($query)) {

    $val = floatval($row['value']);

    $operation=$val/$ref_val;

    $countries[$row['code']]= round($operation, 4);

    $i++;

  }

  return $countries;

}
}

?>
