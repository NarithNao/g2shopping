$(document).ready(function () {

    $("#btn_user_update_info").click(function (e) {
        e.preventDefault();
        $("#frm_user_update_info").submit();
    });

    $("#newsletter").change(function () {
        if ($("#newsletter").prop("checked")) {
            $("#newsletter").val('1');
        }else{
            $("#newsletter").val('0');
        }
    });

});