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

    public function create($c) {
    	$sql = mysql_query("SELECT * FROM Countries WHERE code LIKE '%".$c."%'") or die (mysql_error());
    	$query = mysql_query($sql);
    	$this->code=$c;
    	if ($query){
    		$row = mysql_fetch_array($query);
    		$this->name=$row['country_name'];
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

    public function getCountry() {
        $data = array();
        $data['name']=$this->name;
        $data['code']=$this->code;
        $data['value']=$this->value;
        $data['curr_full']=$this->curr_full;
        $data['curr_short']=$this->curr_short;
        $data['flag']=$this->flag;
        return $data;
    }

}

?>