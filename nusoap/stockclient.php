<?php
require_once('lib/nusoap.php');
$c = new soapclient('http://localhost/webservices/nusoap/stockserver.php');
$stockprice = $c->call('getStockQuote',
array('symbol' => 'ABC'));
echo "The stock price for 'ABC' is $stockprice.";
?>