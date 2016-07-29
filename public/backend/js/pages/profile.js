$(document).ready(function () {

    $("#btn_user_update_info").click(function (e) {
        e.preventDefault();
        $("#frm_user_update_info").submit();
    });

    $("#newsletter").change(function () {
        if ($(this).prop("checked")) {
            $(this).val('1');
        }else{
            $(this).val('0');
        }
    });

});