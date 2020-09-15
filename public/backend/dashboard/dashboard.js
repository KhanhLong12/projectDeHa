$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

function callApi(url, data = {}, method = 'get') {
    return $.ajax({
        url: url,
        data: data,
        method: method,
    })
}

function callApiWithFile(url, data = {}, method = 'get') {
    return $.ajax({
        url: url,
        data: data,
        method: method,
        processData: false,
        contentType: false,
    })
}

function printErrorMsg(msg) {
    $(".print-error-msg").find("ul").html('');
    $(".print-error-msg").css('display', 'block').fadeOut(5000);
    $.each(msg, function (key, value) {
        $(".print-error-msg").find("ul").append('<li>' + value + '</li>');
    });
}

$(document).on('click', '.pagination a', function (event) {
    event.preventDefault();
    let url = $(this).attr('href');
    callApiWithFile(url)
        .then((res) => {
            $('#list').replaceWith(res);
        })
});

setTimeout(
    function () {
        $('#alertLogin').hide();
    },
    2000
);
