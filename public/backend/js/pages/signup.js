/**
 * Created by GA on 6/13/2016.
 */
$(document).ready(function () {
    var baseurl = $("[name='url']").val();

    $("#register").click(function (e) {
        e.preventDefault();

        $.ajax({
            url     : baseurl + "/doRegister",
            type    : "POST",
            data    :{
                username    :   $("#username").val().trim(),
                email       :   $("#email").val().trim(),
                password    :   $("#password").val().trim(),
                _token      :   $("input[name=_token]").val(),
            },
            success :function(data){
                console.log(data);

                //window.location = baseurl + '/index';

            }
        });
    });
});
