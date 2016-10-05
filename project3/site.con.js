/*! DO NOT EDIT steampunked 2016-05-01 */
/**
 * Created by Vincent on 4/30/16.
 */

function parse_json(json) {
    try {
        var data = $.parseJSON(json);
    } catch(err) {
        throw "JSON parse error: " + json;
    }

    return data;
}
/**
 * Created by Vincent on 4/30/16.
 */

function Steampunked() {

    $('.add-pipe').click(function () {
        event.preventDefault();
        var addPipe = $(this).find(":input")[0].value;
        var pipe = $(this).find(":input")[1].value;

        var data = {'addPipe' : addPipe, 'pipe' : pipe};

        $.ajax({
            url: "steampunked-post.php",
            data: data,
            method: "POST",
            success: function (data) {
                var json = parse_json(data);
                if (json.ok) {
                    console.log('addPipe success');
                    $("#game").html(json.present);
                    new Steampunked();
                }
                else {
                    console.log('addPipe failed');
                }
            },
            error: function (xhr, status, error) {
                console.log(error);
            }
        });
    });

    $(".radio-buttons").click(function () {
        event.preventDefault();
        var index = this.value;
        var data = {'select' : index};

        $.ajax({
            url: "steampunked-post.php",
            data: data,
            method: "POST",
            success: function (data) {
                var json = parse_json(data);
                if (json.ok) {
                    console.log('radio success');
                    $("#game").html(json.present);
                    new Steampunked();
                }
                else {
                    console.log('radio failed');
                }
            },
            error: function (xhr, status, error) {
                console.log(error);
            }
        });
    });

    $(".control-buttons").click(function () {
        event.preventDefault();
        console.log('control-buttons');
        var val = $(this).val();
        var data = {};
        if(val === 'Rotate') {
            data['rotate'] = 'Rotate';
            data['pipe'] = $("#pipe-id").val();
        }
        else if (val === 'Discard') {
            data['discard'] = 'Discard';
            data['pipe'] = $("#pipe-id").val();
        }
        else if (val === 'Open Valve') {
            data['open'] = 'Open Valve';
        }

        $.ajax({
            url: "steampunked-post.php",
            data: data,
            method: "POST",
            success: function (data) {
                var json = parse_json(data);
                if (json.ok) {
                    console.log('control-buttons success');
                    $("#game").html(json.present);
                    new Steampunked();
                }
                else {
                    console.log('control-buttons failed');
                }
            },
            error: function (xhr, status, error) {
                console.log(error);
            }
        });
    });
}
