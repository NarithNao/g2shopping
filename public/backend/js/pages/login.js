/**
 * Created by GA on 6/10/2016.
 */
$(document).ready(function () {
    var baseurl = $("[name='url']").val();

    function validateEmail($email) {
        var regex = /^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
        return regex.test( $email );
    }

    $("#login").click(function (e) {
        e.preventDefault();

        $.ajax({
            url     : baseurl + "/dologin",
            type    : "POST",
            data    :{
                email       :   $("#email").val().trim(),
                password    :   $("#password").val().trim(),
                _token      :   $("[name='_token']").val(),
            },
            success :function(data){
                console.log(data);
                if(data < 1){
                    alert('Incorrect Email/Password');
                    $("#password").val('');
                    $("#email").focus();
                }else{
                    //window.location = baseurl + '/index';
                }
            }
        });
    });

});
