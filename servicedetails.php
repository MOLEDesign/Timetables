<?php
require("OpenLDBWS.php");

$OpenLDBWS = new OpenLDBWS("f37ace7b-1a82-4833-9908-48a3749dc17a");

if (!isset($_REQUEST['service'])) {
    echo 'Please supply a service';
    return;
}


$service = $_REQUEST['service'];

$service = preg_replace("/\+/","%2B",$service);

$departureBoard = $OpenLDBWS->GetServiceDetails($cleanstring);

header("Content-Type: text/plain");

// JSONify the string and return it
$returnedJSON = json_encode($departureBoard);
echo $returnedJSON;

?>