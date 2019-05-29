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
                $('#StationName').attr('value', json_data[i].StationName)
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

    var json_data = []
    $.getJSON("data/MOCK_DATA.json", function (data) {
        var flag = 0;
        json_data = data
        for (var row of data) {
            var table_row = $(
                '<tr>' +
                '<td>' + row.StationId + '</td>' +
                '<td>' + row.StationName + '</td>' +
                '<td>' + row.District + '</td>' +
                '<td>' + row.City + '</td>' +
                '<td>' + row.Street + '</td>' +
                '<td>' + row.Smart.Wifi + '</td>' +
                '<td>' + row.Comment + '</td>' +
                '<td>' + '<input type="submit" name="stationID" class="btn btn-success btn-circle" value=' + row.StationId + "></input></td>" +
                '</tr>'
            )

            children = District.childNodes;
            for (var i = 3; i < children.length; i++) {
                var option = children[i]
                var district = option.textContent;
                if (district == row.District)
                    flag = 1;
            }

            if (flag == 0) {
                var optionDist = $('<option>' + row.District + '</option>')
            }

            $('#District').append(optionDist)
            $('tbody').append(table_row)
            flag = 0;

            children = City.childNodes
            for (var i = 3; i < children.length; i++) {
                var option = children[i]
                var city = option.textContent;
                if (city == row.City)
                    flag = 1;
            }

            if (flag == 0) {
                var optionCity = $(
                    '<option>' + row.City + '</option>')
            }
            $('#City').append(optionCity)
            $('tbody').append(table_row)
            flag = 0;
        }

    });

    function UpdateTable(value, match, parameter = '', parameter2 = '') {
        for (var row of json_data) {
            let tmp
            if (parameter2 == '') {
                tmp = row[parameter]
            } else {
                tmp = row[parameter][parameter2]
            }
            if (tmp == value || value == "all")
                match +=
                '<tr>' +
                '<td scope="row">' + row.StationId + '</td>' +
                '<td>' + row.StationName + '</td>' +
                '<td>' + row.District + '</td>' +
                '<td>' + row.City + '</td>' +
                '<td>' + row.Street + '</td>' +
                '<td>' + row.Smart.Wifi + '</td>' +
                '<td>' + row.Comment + '</td>' +
                '<td>' + '<input type="submit" name="stationID" class="btn btn-success btn-circle" value=' + row.StationId + "></input></td>" +
                '</tr>'
        }
        $('tbody').html(match)
    }

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