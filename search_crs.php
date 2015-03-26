<?php
  require("OpenLDBWS.php");

  $OpenLDBWS = new OpenLDBWS("f37ace7b-1a82-4833-9908-48a3749dc17a");

if (!isset($_REQUEST['crs'])) {
    echo 'Please supply a station';
    return;
}

if (!isset($_REQUEST['total'])) {
    echo 'Please supply total number of results';
    return;
}

    $crs = $_REQUEST['crs'];
    $crs = strtoupper($crs);
    $total = $_REQUEST['total'];

    $departureBoard = $OpenLDBWS->GetDepartureBoard($total,$crs);

    header("Content-Type: text/plain");

    // JSONify the string and return it
    $returnedJSON = json_encode($departureBoard);
    echo $returnedJSON;

?>
