// Hide navbar-top when scrolling
$(function () {
    var scroll = 0;
    $(window).scroll(function () {
        var ts = $(this).scrollTop();
        if (ts > scroll) {
            $('.navbar').addClass('stuck');
        } else {
            $('.navbar').removeClass('stuck');
        }
        if (ts < 600) {
            $('.navbar').removeClass('stuck');
        }
        scroll = ts;
    });
});

// Subscribe form handling
$(function () {
    var form = $('#subscribe-form');
    form.submit(function () {
        $.post(form.attr('action'), form.serialize(), function (data) {
            console.log(data);
            if (data.type == 'success') {
                form.html(data.body);
                $('#result').html(null);
            } else {
                $('#result').html(data.body);
            }
        }, 'json');

        return false;
    });
});
