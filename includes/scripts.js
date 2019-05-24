$(document).ready(function () {
    var json_data = []
    $.getJSON("data/MOCK_DATA.json", function (data) {
        console.log(data)
        json_data = data
        for (var row of data) {
            var table_row = $(
                '<tr>' +
                '<td>' + row.id + '</td>' +
                '<td>' + row.date + '</td>' +
                '<td>' + row.country + '</td>' +
                '<td>' + row.city + '</td>' +
                '<td>' + row.temp_c + '</td>' +
                '<td>' + row.temp_f + '</td>' +
                '</tr>'
            )
            var option = $(
                '<option>' + row.country + '</option>'
            )
            $('#country').append(option)
            $('tbody').append(table_row)
        }
    });
    $('#country').on('change', function (e) {
        var value = e.target.value
        var match = ''
        console.log(value)
        for (var row of json_data) {
            if (row.country == value)
                match +=
                '<tr>' +
                '<td scope="row">' + row.id + '</td>' +
                '<td>' + row.date + '</td>' +
                '<td>' + row.country + '</td>' +
                '<td>' + row.city + '</td>' +
                '<td>' + row.temp_c + '</td>' +
                '<td>' + row.temp_f + '</td>' +
                '</tr>'
        }
        $('tbody').html(match)
    })
});