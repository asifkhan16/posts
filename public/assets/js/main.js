$(document).ready(function() {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $(this).on('submit', '#likeform', function(e) {
        e.preventDefault();
        var formdata = new FormData(this);
        // var post = $('#post_id').attr("data-post");
        var post = $('#post_id').data("post");

        alert('hello ' + post);
        var _url = `/posts/${post}/likes`;

        $.ajax({
            type: "POST",
            url: _url,
            data: formdata,
            cache: false,
            contentType: false,
            processData: false,

            success: function(r) {
                if (r == 'ok') {
                    $("#likeform")[0].reset();
                    allert('like done successfuly');
                }
            },
            error: function(error) {
                console.log(error);
            }
        });

    });
});