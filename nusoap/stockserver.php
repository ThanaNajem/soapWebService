<?php
function getStockQuote($symbol) {
$conn=mysqli_connect('localhost','root','','soap');
$query = "SELECT stock_price FROM stockprices "
. "WHERE stock_symbol = '$symbol'";
$result = mysqli_query($conn,$query);
$row = mysqli_fetch_assoc($result); 
return $row['stock_price'];
}
require('lib/nusoap.php');
$server = new soap_server();
$server->configureWSDL('stockserver', 'urn:stockquote');
$server->register("getStockQuote",
array('symbol' => 'xsd:string'),
array('return' => 'xsd:decimal'),
'urn:stockquote',
'urn:stockquote#getStockQuote');
$HTTP_RAW_POST_DATA = isset($HTTP_RAW_POST_DATA)
? $HTTP_RAW_POST_DATA : '';
$server->service($HTTP_RAW_POST_DATA);
 
?>
