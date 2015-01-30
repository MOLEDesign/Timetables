<?php
require("OpenLDBWS.php");

$OpenLDBWS = new OpenLDBWS("f37ace7b-1a82-4833-9908-48a3749dc17a");

if (!isset($_REQUEST['service'])) {
    echo 'Please supply a service';
    return;
}


$service = $_REQUEST['service'];

$departureBoard = $OpenLDBWS->GetServiceDetails($service);

header("Content-Type: text/plain");

// JSONify the string and return it
$returnedJSON = json_encode($departureBoard);
echo $returnedJSON;

?>