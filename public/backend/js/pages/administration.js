/**
 * Created by Narith on 7/28/2016.
 * file name 'administration.js'
 */
$(document).ready(function () {

    $("#b-add_user_role").click(function (e) {
        e.preventDefault();
        $("#administration").hide();
        $("#b-add_user_role").hide();
        $("#b-add_user").hide();
        $("#b-cancel").removeClass("hidden");
        $("#l-add_user_role").show();
        $("#a_user_role").focus();
    });

    $(".btn_update_user_role").click(function (e) {
        e.preventDefault();
        var id = g2shopping.getLinkID(this.href);
        var url = '/admin/user_role/'+id+'/search';

        g2shopping.jsGetReq(url, function (result) {
            $("#administration").hide();
            $("#b-add_user_role").hide();
            $("#b-add_user").hide();
            $("#b-cancel").removeClass("hidden");
            $("#l-edit_user_role").show();
            $("#u_user_role").focus();

            $("#u_user_role_id").val(result.id);
            $("#u_user_role").val(result.role);
            $("#u_description").val(result.description);
            if(result.status == 1){
                $("#u_status").prop('checked', true);
                $("#u_status").val('1');
            }
        });

    });

    $(".btn_delete_user_role").click(function (e) {
        e.preventDefault();
        var id = g2shopping.getLinkID(this.href);
        var url = '/admin/user_role/'+id+'/search';

        g2shopping.jsGetReq(url, function (result) {
            $("#administration").hide();
            $("#b-add_user_role").hide();
            $("#b-add_user").hide();
            $("#b-cancel").removeClass("hidden");
            $("#l-delete_user_role").show();
            $("#d_user_role_id").val(result.id);
        });

    });

    $("#u_status").change(function () {
        if ($(this).prop("checked")) {
            $(this).val('1');
        }else{
            $(this).val('0');
        }
    });

    $("#b-add_user").click(function (e) {
        e.preventDefault();
        $("#administration").hide();
        $("#b-add_user_role").hide();
        $("#b-add_user").hide();
        $("#b-cancel").removeClass("hidden");
        $("#l-add_user").show();
        $("#a_user_user_role").focus();
        $("#a_user_newsletter").val('0');
    });

    $(".btn_update_user").click(function (e) {
        e.preventDefault();
        var id = g2shopping.getLinkID(this.href);
        var url = '/admin/user/'+id+'/search';

        g2shopping.jsGetReq(url, function (result) {
            $("#administration").hide();
            $("#b-add_user_role").hide();
            $("#b-add_user").hide();
            $("#b-cancel").removeClass("hidden");
            $("#l-edit_user").show();
            $("#u_user_user_role").focus();

            $("#u_user_id").val(result.id);
            if (result.user_type_id == 1)
                $("#u_user_user_role").val('Admin');
            else
                $("#u_user_user_role").val('Guest');
            $("#u_user_username").val(result.username);
            $("#u_user_email").val(result.email);
            $("#u_user_firstname").val(result.firstname);
            $("#u_user_lastname").val(result.lastname);
            $("#u_user_country").val(result.country);
            $("#u_user_city").val(result.city);
            $("#u_user_address").val(result.address);
            $("#u_user_phone").val(result.phone);
            if (result.newsletter == 1) {
                $("#u_user_newsletter").prop('checked', true);
                $("#u_user_newsletter").val('1');
            } else
                $("#u_user_newsletter").val('1');
            if (result.status == 1) {
                $("#u_user_status").prop('checked', true);
                $("#u_user_status").val('1');
            } else
                $("#u_user_status").val('1');
        });

    });

    $("#a_user_newsletter").change(function () {
        if ($(this).prop("checked")) {
            $(this).val('1');
        }else{
            $(this).val('0');
        }
    });

    $("#u_user_newsletter").change(function () {
        if ($(this).prop("checked")) {
            $(this).val('1');
        }else{
            $(this).val('0');
        }
    });

    $("#u_user_status").change(function () {
        if ($("#u_user_status").prop("checked")) {
            $("#u_user_status").val('1');
        }else{
            $("#u_user_status").val('0');
        }
    });

    $("#b-cancel").click(function (e) {
        e.preventDefault();
        $("#b-cancel").addClass("hidden");
        $("#b-add_user_role").show();
        $("#b-add_user").show();
        $("#administration").show();
        $("#l-add_user_role").hide();
        $("#l-edit_user_role").hide();
        $("#l-delete_user_role").hide();
        $("#l-add_user").hide();
        $("#l-edit_user").hide();
    });

    $("#btn_update_user_role").click(function (e) {
        e.preventDefault();
        var title = 'Update User Role';
        var content = 'Update';
        var url = '/admin/update_user_role';
        var input = {
            '_token'        : $("input[name=_token]").val(),
            'user_role_id'  : $("#u_user_role_id").val(),
            'user_role'     : $("#u_user_role").val(),
            'description'   : $("#u_description").val(),
            'status'        : $("#u_status").val(),
        };
        g2shopping.jsPostReq(url, input, function (result) {
            if(!result){
                popup.fail(title, content).open();
            }
            popup.success(title, content).open();
        });
    })

});
