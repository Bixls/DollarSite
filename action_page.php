<?php
foreach (glob("Classes/*.php") as $filename)
{
    include $filename;
}
$connect = new DatabaseConnect();
$adapter = new CountryAdapter();
$names = $adapter->GetNames();
$arr=$adapter->RelateCurrencies("Egp");
$currencies=$adapter->GetCurrencies();
print_r($names);
print_r($arr);
print_r($currencies);
?>
<table>
	<?php foreach ($currencies as &$currency) {  ?>
<tr>
<td><?php echo $names[$currency]; ?></td>
<td><?php echo $arr[$currency]; ?></td>
<?php } ?>
</tr>
</table>
