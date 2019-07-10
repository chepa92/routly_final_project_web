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

    var json_data = []
    $.getJSON("data/MOCK_DATA.json", function (data) {
        json_data = data

        var i;
        for (i = 0; i < json_data.length; ++i) {
            if (json_data[i].StationId == stationID) {
                $('#StationID').attr('value', json_data[i].StationId)
                $('#StationName').attr('value', name)
                $('#District').attr('value', json_data[i].District)
                $('#City').attr('value', json_data[i].City)
                $('#Street').attr('value', json_data[i].Street)
                $('#Latitude').attr('value', json_data[i].Latitude)
                $('#Longitude').attr('value', json_data[i].Longitude)
                $('#Comment').attr('value', json_data[i].Comment)

                if (json_data[i].Smart.SmartScreen == 'True')
                    $('input[name=Smart1').prop('checked', true)
                if (json_data[i].Smart.Conditioner == 'True')
                    $('input[name=Smart2').prop('checked', true)
                if (json_data[i].Smart.Light == 'True')
                    $('input[name=Smart3').prop('checked', true)
                if (json_data[i].Smart.Wifi == 'True')
                    $('input[name=Smart4').prop('checked', true)
                break;
            }
        }
    });

    $('#District').on('change', function (e) {
        UpdateTable(e.target.value, '', 'District');
    })

    $('#City').on('change', function (e) {
        UpdateTable(e.target.value, '', 'City');
    })

    $('#Smart').on('change', function (e) {
        UpdateTable(e.target.value, '', 'Smart', 'Wifi');
    })

    var optionBool = $(
        '<option>' + 'True' + '</option>' +
        '<option>' + 'False' + '</option>'
    )
    $('#Smart').append(optionBool)

});