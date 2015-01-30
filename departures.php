<?php
  require("OpenLDBWS.php");

  $OpenLDBWS = new OpenLDBWS("f37ace7b-1a82-4833-9908-48a3749dc17a");

if (!isset($_REQUEST['crs'])) {
    echo 'Please supply a station';
    return;
}


    $crs = $_REQUEST['crs'];
    $crs = strtoupper($crs);

    $departureBoard = $OpenLDBWS->GetDepartureBoard(10,$crs);

    header("Content-Type: text/plain");

    // JSONify the string and return it
    $returnedJSON = json_encode($departureBoard);
    echo $returnedJSON;

?>
