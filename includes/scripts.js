$(document).ready(function () {

    $('#user-logo').click(function () {
        $('#logout_modal').modal('show')
    });


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


    $('#make_order').on('submit', function (e) {
        let fromStat = $('.from_class').val();
        let fromNum = fromStat.substr(fromStat.length - 5);
        $('#fromID').val(fromNum);
        let destStat = $('.dest_class').val();
        let destNum = destStat.substr(destStat.length - 5);
        $('#destID').val(destNum);
        e.preventDefault();
        $.ajax({
            type: 'get',
            url: 'order.php',
            data: $('form').serialize(),
            success: function (response) {
                $('.modal-content').html(response);
                
            }
        });
    });


    //edit station button, enables all inputs and change buttons
    $('.editStation').click(function () {
        $('input').each(function () {
            if ($(this).attr('disabled')) {
                $(this).removeAttr('disabled');
            }
        });
        $(".card-body").css("background-color", "white");
        $(".editStation").remove();
        var saveButton = '<button type="submit" class="btn btn-primary btn-block btn-lg">Save Station</button>';
        $(".col_of_button").append(saveButton);
    });

    //live search for stations
    $('.search-box input[type="text"]').on("keyup input", function () {
        /* Get input value on change */
        var inputVal = $(this).val();
        var resultDropdown = $(this).siblings(".result");
        if (inputVal.length) {
            $.get("search.php", {
                term: inputVal
            }).done(function (data) {
                // Display the returned data in browser
                resultDropdown.html(data);
            });
        } else {
            resultDropdown.empty();
        }
    });

    // Set search input value on click of result item
    $(document).on("click", ".result p", function () {
        $(this).parents(".search-box").find('input[type="text"]').val($(this).text());
        $(this).parent(".result").empty();
    });

    //live search in table
    $('#table-search').keyup(function () {
        var searchTerm = $('#table-search').val();
        var listItem = $('#table tbody').children('tr');
        var searchSplit = searchTerm.replace(/ /g, "'):containsi('")

        $.extend($.expr[':'], {
            'containsi': function (elem, i, match, array) {
                return (elem.textContent || elem.innerText || '').toLowerCase().indexOf((match[3] || "").toLowerCase()) >= 0;
            }
        });

        $("#table tbody tr").not(":containsi('" + searchSplit + "')").each(function (e) {
            $(this).attr('visible', 'false');
        });

        $("#table tbody tr:containsi('" + searchSplit + "')").each(function (e) {
            $(this).attr('visible', 'true');
        });

    });
});

//deleting station from DB by sending id to delete.php
function deleteStation(id) {
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function (id) {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("response").innerHTML = this.responseText;
            setTimeout(function () {}, 1500);
            window.location.replace("/driver_stations.php");
        }
    };
    xhttp.open("GET", "delete.php?id=" + id, true);
    xhttp.send();
}

//catching submit form of update of station    
$(function () {
    $('#edit_station').on('submit', function (e) {
        e.preventDefault();
        $.ajax({
            type: 'get',
            url: 'update.php',
            data: $('form').serialize(),
            success: function (response) {
                $('.col_of_button').html(response);
                location.reload();
            }
        });
    });
});