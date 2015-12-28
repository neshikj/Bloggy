$('input[type="submit"]').click(function (e) {
    e.preventDefault();
    $.ajaxSetup({headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}});

    var successNotification = $('p.success');
    var errorNotification = $('#errors');
    var title = $('input[name=title]').val();
    var description = $('textarea[name=description]').val();

    successNotification.addClass('hidden');
    errorNotification.addClass('hidden');

    $.ajax({
        url: "/post/create",
        method: "POST",
        data: {
            title: title,
            description: description
        },
        context: document.body
    }).done(function (data) {
        successNotification.removeClass('hidden');
    }).fail(function (data) {
        if(data.responseText) {
            var msg = "";
            var obj = JSON.parse(data.responseText);

            (obj.title) ? msg += obj.title[0]+'<br />' : '';
            (obj.description) ? msg += obj.description[0] : '';

            errorNotification.html(msg);
        }
        errorNotification.removeClass('hidden');
    });
});