<?php

class CurrencyConverter {

public function Convert ($c1,$c2,$amount) {

$sql1 = mysql_query("SELECT * FROM Countries WHERE code LIKE '%".$c1."%'");

if (!$sql1) {
	return false;
}
else {

$sql2 = mysql_query("SELECT * FROM Countries WHERE code LIKE '%".$c2."%'");

if (!$sql2) {

return false;

}
else {

$row = mysql_fetch_assoc($sql1);

$result = mysql_fetch_assoc($sql2);

$value = floatval($amount)*(floatval($result['value'])/floatval($row['value']));

$value= round($value, 4);

return $value;

}

}

}

}
?>