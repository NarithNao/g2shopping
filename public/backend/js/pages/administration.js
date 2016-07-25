/**
 * Created by GA on 6/10/2016.
 */
$(document).ready(function () {
    var t_user_role = '';

    $("#b-add_user_role").click(function () {
        $("#administration").hide();
        $("#b-add_user_role").hide();
        $("#b-add_user").addClass("pull-right");
        $("#b-add_user").text("Cancel");
        $("#l-add_user_role").show();
        t_user_role = $("#b-add_user").text();
        $("#user_role").focus();
    });

    $("#b-add_user").click(function () {
        if(t_user_role == "Cancel"){
            $("#l-delete_user_role").hide();
            $("#l-edit_user_role").hide();
            $("#l-add_user_role").hide();
            $("#b-add_user").text("Add User");
            $("#b-add_user").removeClass("pull-right");
            $("#administration").show();
            $("#b-add_user_role").show();
        }
    });

    $("#btn_update_user_role").click(function () {
        url = $("#url").val()+'/user_role/'+$("#user_role_id").val()+'/search';
        //alert(url);
        $.ajax({
            url: url,
            type: 'GET',
            dataType: 'json',
            success: function(result){
                console.log(result);
                $("#administration").hide();
                $("#b-add_user_role").hide();
                $("#b-add_user").addClass("pull-right");
                $("#b-add_user").text("Cancel");
                $("#l-edit_user_role").show();
                t_user_role = $("#b-add_user").text();
                $("#user_role").focus();

                $("#u_user_role_id").val(result.id);
                $("#u_user_role").val(result.role);
                $("#u_description").val(result.description);
                if(result.status == 1){
                    $("#u_status").prop('checked', true);
                    $("#u_status").val('1');
                }
            }});
    });

    $("#u_status").change(function () {
        if ($("#u_status").prop("checked")) {
            $("#u_status").val('1');
        }else{
            $("#u_status").val('0');
        }
    });

    $("#btn_delete_user_role").click(function () {
        url = $("#url").val()+'/user_role/'+$("#user_role_id").val()+'/search';

        $.ajax({
            url: url,
            type: 'GET',
            dataType: 'json',
            success: function(result){
                console.log(result);
                $("#administration").hide();
                $("#b-add_user_role").hide();
                $("#b-add_user").addClass("pull-right");
                $("#b-add_user").text("Cancel");
                $("#l-delete_user_role").show();
                t_user_role = $("#b-add_user").text();
                $("#d_user_role_id").val(result.id);
            }});
    });
});
