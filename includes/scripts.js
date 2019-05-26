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
            var option = $(
                '<option>' + row.District + '</option>'
            )
            $('#District').append(option)
            $('tbody').append(table_row)
        }

        $("select option").val(function(idx, val) {
            $(this).siblings('[value="' + val + '"]').remove();
        })

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

});
