$(document).ready(function() {

    $(this).on('click', '#editbtn', function() {
        // alert('working');
        var userid = $('#editbtn').data('id');
        alert('working.... ' + userid);
    });



    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $(this).on("submit", "#userform", function(e) {
        e.preventDefault();
        var formdata = new FormData(this);
        var _url = `/ajax`;
        var resp = $("#resp");
        resp.html('record adding...');
        $.ajax({
            type: 'POST',
            url: _url,
            data: formdata,
            cache: false,
            contentType: false,
            processData: false,

            success: function(response) {
                if (response == "ok") {
                    $("#userform")[0].reset();
                    resp.html('record Added succussfuly');
                    setTimeout(function() {
                        resp.html("");
                    }, 1000);
                    loadRecord();
                } else {
                    resp.html(response);
                }
            },
            error: function(error) {
                alert(error.responseText);
                console.log(error);
            }


        });

    });

    $(this).on("submit", "#updateform", function(e) {
        e.preventDefault();
        var data = new FormData(this);
        var id = $('#user_id').val();
        var _url = `/ajax/${id}`;
        var resp = $('#resp');
        $.ajax({
            type: "post",
            url: _url,
            data: data,
            dataType: "json",
            cache: false,
            contentType: false,
            processData: false,
            success: function(response) {
                if (response == "ok") {
                    resp.html('Record updated..');
                    setTimeout(function() {
                        resp.html("");
                    }, 1000);
                    $('#updateform').attr('id', "userform");
                    $('#userform')[0].reset();
                    $('#submit-btn').val('Submit');
                    loadRecord();
                }

            },
            error: function(error) {
                alert("error occur" + error.responseText);
            }
        });

    });
});


function editRecord(event) {
    var id = $(event).data('id');
    var _url = `/ajax/${id}`;
    let _token = $('meta[name="csrf-token"]').attr('content');
    $.ajax({
        url: _url,
        type: 'GET',
        data: {
            _token: _token,
        },
        success: function(response) {
            // alert('working' + response);
            if (response) {
                $('#user_id').val(response.id);
                $('#user_name').val(response.name);
                $('#user_email').val(response.email);
                $('#submit-btn').val('Update');
                $("#userform").attr("id", "updateform");

            }
        }
    });
}

function deleteRecord(event) {
    var resp = $('#resp');
    var id = $(event).data('id');
    var _url = `/ajax/${id}`;
    let _token = $('meta[name="csrf-token"]').attr('content');
    $.ajax({
        url: _url,
        type: 'DELETE',
        data: {
            _token: _token,
        },
        success: function(response) {
            if (response) {
                resp.html('record Deleted succussfuly');
                setTimeout(function() {
                    resp.html("");
                }, 1000);
                loadRecord();
            }
        }
    });

}

function loadRecord() {
    var _url = `/fromajax`;
    $.ajax({
        type: "GET",
        url: _url,
        success: function(response) {
            console.log('working ' + response.users.length);
            var html = "";
            for (let i = 0; i < response.users.length; i++) {
                html += '<tr><td>' + (i + 1) + '</td><td>' +
                    response.users[i].name + '</td><td>' + response.users[i].email +
                    '</td><td><button onclick="editRecord(event.target)" data-id="' +
                    response.users[i].id + '" class = "btn btn-info" > Edit </button></td >' +
                    '<td> <a href = "javascript:void(0)" data-id="' +
                    response.users[i].id + '" class = "btn btn-danger"' +
                    'onclick = "deleteRecord(event.target)" > Delete </a></td > '
            }
            $('#users-tbody').html(html);
        }
    });
}