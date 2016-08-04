/**
 * Created by Narith on 7/28/2016.
 * file name 'user_role.js'
 */

var administration = {};

administration.fillUserRoleData = function(){
    plugin.startLoading('#tab-loading');

    g2shopping.jsGetReq('/admin/list_user_role', function (result) {
        $("#tb_user_role > thead tr").remove();
        $("#tb_user_role > tbody tr").remove();
        var thead = $('<tr>').append(
            $('<th class="text-center">').text('#'),
            $('<th class="text-center">').text('Role'),
            $('<th class="text-center">').text('Description'),
            $('<th class="text-center">').text('Status'),
            $('<th class="text-center">').text('Action')
        );
        $("#tb_user_role > thead").append(thead);
        var i=1;
        if(result.length > 0){
            $.each(result, function(index, val){
                var tblRow = val.status == 1? $('<tr>').append(
                    $('<td class="col-xs-2 col-sm-1 text-center">').text(i++),
                    $('<td class="col-xs-3 col-sm-4">').text(val.role),
                    $('<td class="col-xs-3 col-sm-4">').text(val.description),
                    $('<td class="col-xs-2 col-sm-2">').append($('<a href="#" class="btn btn-xs center-block" data-toggle="tooltip" title="Active">').append('<span class="glyphicon glyphicon-ok-circle">')),
                    $('<td class="col-xs-2 col-sm-1">').append(
                        $('<a href="'+val.id+'" class="btn btn-warning btn-xs col-xs-12 btn_update_user_role" data-toggle="tooltip" title="Update">').append($('<i class="fa fa-pencil">'))
                    )
                ):$('<tr>').append(
                    $('<td class="col-xs-2 col-sm-1 text-center">').text(index+1),
                    $('<td class="col-xs-3 col-sm-4">').text(val.role),
                    $('<td class="col-xs-3 col-sm-4">').text(val.role),
                    $('<td class="col-xs-2 col-sm-2">').append($('<a href="#" class="btn btn-xs center-block" data-toggle="tooltip" title="Inactive">').append('<span class="glyphicon glyphicon-remove-circle">')),
                    $('<td class="col-xs-2 col-sm-1">').append(
                        $('<a href="'+val.id+'" onclick="" class="btn btn-warning btn-xs col-xs-12 btn_update_user_role" data-toggle="tooltip" title="Update">').append($('<i class="fa fa-pencil">'))
                    )
                );
                $('#tb_user_role > tbody').append(tblRow);
            });
        }else{
            var tblRow = $('<tr>').append(
                $('<td colspan="4" class="text-center">').text('No Record found')
            );
            $('#tb_user_role > tbody').append(tblRow);
        }
        $('[data-toggle="tooltip"]').tooltip();
    });
    plugin.endLoading('#tab-user_role');
};

administration.cleanUserRole = function () {
    $("#a_user_role_id").val('');
    $("#a_user_role").val('');
    $("#a_description").val('');
};

$(document).ready(function () {

    administration.fillUserRoleData();

    $("#b-add_user_role").click(function (e) {
        e.preventDefault();
        $("#administration").hide();
        $("#b-add_user_role").hide();
        $("#b-add_user").hide();
        $("#b-cancel").removeClass("hidden");
        $("#l-add_user_role").show();
        $("#a_user_role").focus();
    });

    $(document).on('click','#tb_user_role > tbody tr td a.btn_update_user_role', function(e){
        e.preventDefault();
        var id = g2shopping.getLinkID(this.href);
        var url = '/admin/user_role/'+id+'/search';

        g2shopping.jsGetReq(url, function (result) {
            $("#u_user_role_id").val(result.id);
            $("#u_user_role").val(result.role);
            $("#u_description").val(result.description);
            if(result.status == 1){
                $("#u_status").prop('checked', true);
                $("#u_status").val('1');
            }
            $("#administration").hide();
            $("#b-add_user_role").hide();
            $("#b-add_user").hide();
            $("#b-cancel").removeClass("hidden");
            $("#l-edit_user_role").show();
            $("#u_user_role").focus();
        });

    });

    $(document).on('click','#tb_user_role > tbody tr td a.btn_delete_user_role', function(e){
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

    $("#b-cancel").click(function (e) {
        e.preventDefault();
        administration.cleanUserRole();
        $("#b-cancel").addClass("hidden");
        $("#b-add_user_role").show();
        $("#administration").show();
        $("#l-add_user_role").hide();
        $("#l-edit_user_role").hide();
        $("#l-delete_user_role").hide();
    });

    $("#btn_add_user_role").click(function (e) {
        e.preventDefault();
        var title = 'User Role';
        var content = 'Add Successful';
        var url = '/admin/add_user_role';
        var input = {
            '_token'        : $("input[name=_token]").val(),
            'user_role'     : $("#a_user_role").val(),
            'description'   : $("#a_description").val()
        };
        g2shopping.jsPostReq(url, input, function (result) {
            if(!result){
                content = 'Add Failure';
                plugin.popup.fail(title, content);
            }
            plugin.popup.success(title, content);
        });
        administration.fillUserRoleData();
        $("#b-cancel").click();
    });

    $("#btn_update_user_role").click(function (e) {
        e.preventDefault();
        var title = 'User Role';
        var content = 'Update Successful';
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
                content = 'Update Failure';
                plugin.popup.fail(title, content);
            }
            plugin.popup.success(title, content);
        });
        administration.fillUserRoleData();
        $("#b-cancel").click();
    });

    $("#btn_delete_user_role").click(function (e) {
        e.preventDefault();
        var title = 'User Role';
        var content = 'Delete Successful';
        var url = '/admin/delete_user_role';
        var input = {
            '_token'        : $("input[name=_token]").val(),
            'user_role_id'  : $("#d_user_role_id").val()
        };
        g2shopping.jsPostReq(url, input, function (result) {
            if(!result){
                content = 'Delete Failure';
                plugin.popup.fail(title, content);
            }
            plugin.popup.success(title, content);
        });
        administration.fillUserRoleData();
        $("#b-cancel").click();
    });

});
