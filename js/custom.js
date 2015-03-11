function GetURLParameter(sParam)
{
    var sPageURL = window.location.search.substring(1);
    var sURLVariables = sPageURL.split('&');

    for (var i = 0; i < sURLVariables.length; i++)
    {
        var sParameterName = sURLVariables[i].split('=');
        if (sParameterName[0] == sParam)
        {
            return sParameterName[1];
        }
    }
}

function getPoints($service){

    $.getJSON('example2.php?crs='+ $service, function (data) {
        var template = $service;

        return template;
    });

}

function getServices ($crs) {

    $.getJSON('departures.php?crs='+$crs, function (data) {

        var returnedServices = '';

        for (var i in data.GetStationBoardResult.trainServices.service) {

            returnedServices += data.GetStationBoardResult.trainServices.service[i].serviceID;
            returnedServices += ',';

        }

        console.log('Function returned');
        console.log(returnedServices);

        return returnedServices;

    });
}


function getServiceDetails($serviceID) {
    returnedData =
        $.getJSON('servicedetails.php?service='+$serviceID, function (data2) {
        var serviceTemplate = '';
        for (var j in data2.GetServiceDetailsResult.subsequentCallingPoints.callingPointList.callingPoint) {
            serviceTemplate += data2.GetServiceDetailsResult.subsequentCallingPoints.callingPointList.callingPoint[j].locationName;
            serviceTemplate += '(' + data2.GetServiceDetailsResult.subsequentCallingPoints.callingPointList.callingPoint[j].st + ')';
            serviceTemplate += ', ';
        }
        return serviceTemplate;
    });
    console.log(returnedData);
    return returnedData;
};