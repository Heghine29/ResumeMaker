$("#createResume").click(function (event) {
    event.preventDefault();

    let _token = $('meta[name="csrf-token"]').attr('content');

    var form_data = new FormData();
    form_data.append('first_name', $("input[name=first_name]").val());
    form_data.append('last_name', $("input[name=last_name]").val());
    form_data.append('thumbnail',$("#thumbnail").prop('files')[0]);
    form_data.append('profession', $("input[name=profession]").val());
    form_data.append('education', $("textarea[name=education]").val());
    form_data.append('work_history', $("textarea[name=work_history]").val());
    form_data.append('email', $("input[name=email]").val());
    form_data.append('address', $("input[name=address]").val());
    form_data.append('phone', $("input[name=phone]").val());
    form_data.append('slug', $("input[name=slug]").val());
    form_data.append('_token', _token);

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': _token
        }
    });
    $.ajax({
        url: "/resume",
        type: "post",
        data: form_data,
        cache: false,
        contentType: false,
        processData: false,
        success: function (response) {
            if (response) {
                $("#createResumeForm")[0].reset();
                $('#message').removeClass('d-none').append(
                    "<div class='session-success'>" +
                    "<p class='text-bold'>" + response.success + "</p>" +
                    "</div>");
                setTimeout(function () {
                    $("#message").addClass('d-none');
                }, 6000);
            }
            if(response['success']){
                $(".errors").addClass('d-none');

            }
        },
        error: function (response) {
            $('.errors').addClass('d-none');

            if (response.status === 422) {

                var errors = $.parseJSON(response.responseText).errors;
                var error_spans = ['first_name','last_name','thumbnail','profession','education','work_history','email','address','phone','slug'];

                $.each(errors, function (key, val) {
                    if ($.inArray(key, error_spans)!== -1) {
                            $("#error_" + key).removeClass('d-none').text(val[0]);
                        }
                });
            }
        }
    });
});

