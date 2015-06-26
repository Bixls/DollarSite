<?php

class Country {
    private $code;
    private $name;
    private $value;
    private $curr_full;
    private $curr_short;
    private $flag;

    public function __construct() {
    $this->value=1;
    }

    public function __construct($country_name) {
    	$sql = mysql_query("SELECT * FROM Countries WHERE country_name LIKE '%".$country_name."%'") or die (mysql_error());
    	$query = mysql_query($sql);
    	$this->name=$country_name;
    	if ($query){
    		$row = mysql_fetch_array($query);
    		$this->code=$row['code'];
    		$this->value=$row['value'];
    		$this->curr_full=$row['curr_full'];
    		$this->curr_short=$row['curr_short'];
    		$this->flag=$row['flag'];
    	}
    	else {
    		$this->value=1;
    	}
    }

    public function setCountry (array $data = array()) {
    	$this->name=$data['name'];
    	$this->code=$data['code'];
    	$this->value=$data['value'];
    	$this->curr_full=$data['curr_full'];
    	$this->curr_short=$data['curr_short'];
    	$this->flag=$data['flag'];
    }

}

?>