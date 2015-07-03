<?php
foreach (glob("Classes/*.php") as $filename)
{
    include $filename;
}
$connect = new DatabaseConnect();
$adapter = new CountryAdapter();
$converter = new CurrencyConverter();
$value=$converter->Convert("EUR","EGP","3");
echo $value;
?>