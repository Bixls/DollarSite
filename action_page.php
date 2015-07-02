<?php
foreach (glob("Classes/*.php") as $filename)
{
    include $filename;
}
$connect = new DatabaseConnect();
$adapter = new CountryAdapter();
$adapter->UpdateCurrencies();
?>