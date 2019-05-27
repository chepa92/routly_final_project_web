$(document).ready(function () {



    var json_data = []
    $.getJSON("data/MOCK_DATA.json", function (data) {
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
                '<td>' + '<input type="submit" name="stationID" class="edit_button" value=' + row.StationId + "></input></td>" +
                '</tr>'
            )
            var optionDist = $(
                '<option>' + row.District + '</option>'
            )
            $('#District').append(optionDist)
            $('tbody').append(table_row)


            var optionCity = $(
                '<option>' + row.City + '</option>'
            )
            $('#City').append(optionCity)
            $('tbody').append(table_row)
        }

    });



    $('#District').on('change', function (e) {
        var value = e.target.value
        var match = ''
        console.log(value)
        for (var row of json_data) {
            if (row.District == value || value == "all")
                match +=
                    '<tr>' +
                    '<td scope="row">' + row.StationId + '</td>' +
                    '<td>' + row.StationName + '</td>' +
                    '<td>' + row.District + '</td>' +
                    '<td>' + row.City + '</td>' +
                    '<td>' + row.Street + '</td>' +
                    '<td>' + row.Smart.Wifi + '</td>' +
                    '<td>' + row.Comment + '</td>' +
                    '<td>' + '<input type="submit" name="stationID" class="edit_button" value=' + row.StationId + "></input></td>" +
                    '</tr>'
        }
        $('tbody').html(match)
    })

    $('#City').on('change', function (e) {
        var value = e.target.value
        var match = ''
        console.log(value)
        for (var row of json_data) {
            if (row.City == value || value == "all")
                match +=
                    '<tr>' +
                    '<td scope="row">' + row.StationId + '</td>' +
                    '<td>' + row.StationName + '</td>' +
                    '<td>' + row.District + '</td>' +
                    '<td>' + row.City + '</td>' +
                    '<td>' + row.Street + '</td>' +
                    '<td>' + row.Smart.Wifi + '</td>' +
                    '<td>' + row.Comment + '</td>' +
                    '<td>' + '<input type="submit" name="stationID" class="edit_button" value=' + row.StationId + "></input></td>" +
                    '</tr>'
        }
        $('tbody').html(match)
    })

    $('#Smart').on('change', function (e) {
        var value = e.target.value
        var match = ''
        console.log(value)
        for (var row of json_data) {
            if (row.Smart.Wifi == value || value == "all")
                match +=
                    '<tr>' +
                    '<td scope="row">' + row.StationId + '</td>' +
                    '<td>' + row.StationName + '</td>' +
                    '<td>' + row.District + '</td>' +
                    '<td>' + row.City + '</td>' +
                    '<td>' + row.Street + '</td>' +
                    '<td>' + row.Smart.Wifi + '</td>' +
                    '<td>' + row.Comment + '</td>' +
                    '<td>' + '<input type="submit" name="stationID" class="edit_button" value=' + row.StationId + "></input></td>" +
                    '</tr>'
        }
        $('tbody').html(match)
    })

    var optionBool = $(
        '<option>' + 'True' + '</option>' +
        '<option>' + 'False' + '</option>'
    )
    $('#Smart').append(optionBool)
    $('tbody').append(table_row)

});
