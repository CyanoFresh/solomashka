// Main site javascript
var form = $('#subscribe-form');
form.submit(function() {
    $.post(form.attr('action'), form.serialize(), function(data) {
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