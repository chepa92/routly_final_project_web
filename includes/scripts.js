$(document).ready(function () {
    
    // getting stationID to parameter
    function findGetParameter(parameterName) {
        var result = null,
            tmp = [];
        location.search
            .substr(1)
            .split("&")
            .forEach(function (item) {
                tmp = item.split("=");
                if (tmp[0] === parameterName) result = decodeURIComponent(tmp[1]);
            });
        return result;
    }

    let stationID = findGetParameter('stationID');

});

//deleting station from DB by sending id to delete.php
function deleteStation(id) {
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function(id) {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("response").innerHTML = this.responseText;
            setTimeout(function(){ }, 1500);
            window.location.replace("/driver_stations.php");
        }
    };
    xhttp.open("GET", "delete.php?id=" + id, true);
    xhttp.send();
}