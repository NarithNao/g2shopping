/**
 * Created by Narith on 7/28/2016.
 * file name 'user.js'
 */

var administration = {};
var role_id = '';

administration.fillUserData = function () {
    plugin.startLoading('#tab-loading');
    g2shopping.jsGetReq('/admin/list_user', function (result) {
        $("#tb_user > thead tr").remove();
        $("#tb_user > tbody tr").remove();
        var thead = $('<tr>').append(
            $('<th class="text-center">').text('#'),
            $('<th class="text-center">').text('Name'),
            $('<th class="text-center">').text('Email'),
            $('<th class="text-center">').text('Role'),
            $('<th class="text-center">').text('Country'),
            $('<th class="text-center">').text('City'),
            $('<th class="text-center">').text('Status'),
            $('<th class="text-center">').text('Action')
        );
        $("#tb_user > thead").append(thead);
        if(result.length > 0){
            var i=1;
            $.each(result, function(index, val){
                var url = '/admin/user_role/'+val.user_type_id+'/search';
                //g2shopping.jsGetReq(url, function (res) {});
                g2shopping.jsGetReq(url, function (res) {
                    var tblRow = val.status==1 ? $('<tr>').append(
                        $('<td class="col-xs-1 col-sm-1 text-center">').text(i++),
                        $('<td>').text(val.username),
                        $('<td>').text(val.email),
                        $('<td>').text(res.role),
                        $('<td>').text(val.country),
                        $('<td>').text(val.city),
                        $('<td class="col-xs-1 col-sm-1">').append($('<a href="#" class="btn btn-xs center-block" data-toggle="tooltip" title="Active">').append('<span class="glyphicon glyphicon-ok-circle">')),
                        $('<td class="col-xs-1 col-sm-1">').append(
                            $('<a href="'+val.id+'" class="btn btn-warning btn-xs col-xs-12 btn_update_user" data-toggle="tooltip" title="Update">').append($('<i class="fa fa-pencil">'))
                        )
                    ):$('<tr>').append(
                        $('<td class="col-xs-1 col-sm-1 text-center">').text(index+1),
                        $('<td>').text(val.username),
                        $('<td>').text(val.email),
                        $('<td>').text(val.user_type_id),
                        $('<td>').text(val.country),
                        $('<td>').text(val.city),
                        $('<td class="col-xs-1 col-sm-1">').append($('<a href="#" class="btn btn-xs center-block" data-toggle="tooltip" title="Inactive">').append('<span class="glyphicon glyphicon-remove-circle">')),
                        $('<td class="col-xs-1 col-sm-1">').append(
                            $('<a href="'+val.id+'" class="btn btn-warning btn-xs col-xs-12 btn_update_user" data-toggle="tooltip" title="Update">').append($('<i class="fa fa-pencil">'))
                        )
                    );
                    $('#tb_user > tbody').append(tblRow);
                });
            });
        }else{
            var tblRow = $('<tr>').append(
                $('<td colspan="8" class="text-center">').text('No Record found')
            );
            $('#tb_user > tbody').append(tblRow);
        }
        $('[data-toggle="tooltip"]').tooltip();
    });
    plugin.endLoading('#tab-user');
};

administration.cleanUser = function () {
    $("#u_user_user_role").empty();
    $("#u_user_user_role_list").empty();
    $("#a_user_username").val('');
    $("#a_user_email").val('');
    $("#a_user_firstname").val('');
    $("#a_user_lastname").val('');
    $("#a_user_country").val('');
    $("#a_user_city").val('');
    $("#a_user_address").val('');
    $("#a_user_phone").val('');
    $("#a_user_newsletter").val('0');
};

$(document).ready(function () {

    administration.fillUserData();

    $("#b-add_user").click(function (e) {
        e.preventDefault();
        $("#a_user_user_role").empty();
        g2shopping.jsGetReq('/admin/list_user_role_active', function (result) {
            $.each(result, function(index, val){
                $("#a_user_user_role").append($('<option>').val(val.id).text(val.role));
            });
        });

        $("#administration").hide();
        $("#b-add_user_role").hide();
        $("#b-add_user").hide();
        $("#b-cancel").removeClass("hidden");
        $("#l-add_user").show();
        $("#a_user_username").focus();
        $("#a_user_newsletter").val('0');
    });

    $("#btn_add_user").click(function (e) {
        e.preventDefault();
        var title = 'User';
        var content = 'Add Successful';
        var url = '/admin/add_user';
        var input = {
            '_token'        : $("input[name=_token]").val(),
            'user_role_id'  : $("#a_user_user_role").val(),
            'username'      : $("#a_user_username").val(),
            'email'         : $("#a_user_email").val(),
            'password'      : $("#a_user_pwd").val(),
            'firstname'     : $("#a_user_firstname").val(),
            'lastname'      : $("#a_user_lastname").val(),
            'country'       : $("#a_user_country").val(),
            'city'          : $("#a_user_city").val(),
            'address'       : $("#a_user_address").val(),
            'phone'         : $("#a_user_phone").val(),
            'newsletter'    : $("#a_user_newsletter").val()
        };
        g2shopping.jsPostReq(url, input, function (result) {
            if(!result){
                content = 'Add Failure';
                plugin.popup.fail(title, content);
            }
            plugin.popup.success(title, content);
        });
        administration.fillUserData();
        $("#b-cancel").click();
    });

    $(document).on('click','#tb_user > tbody tr td a.btn_update_user', function(e){
        e.preventDefault();
        var id = g2shopping.getLinkID(this.href);
        var url = '/admin/user/'+id+'/search';
        $("#u_user_user_role").empty();
        $('#u_user_user_role_list').hasClass('hidden')?'':$('#u_user_user_role_list').addClass('hidden');
        $('#u_user_user_role').hasClass('hidden')?$('#u_user_user_role').removeClass('hidden'):'';
        g2shopping.jsGetReq(url, function (result) {
            $("#u_user_id").val(result.id);
            g2shopping.jsGetReq('/admin/list_user_role_active', function (res) {
                $.each(res, function(index, val){
                    if(result.user_type_id == val.id){
                        $("#u_user_user_role").append($('<option>').val(val.id).text(val.role)).attr('selected', 'selected');
                    }
                    $("#u_user_user_role_list").append($('<option>').val(val.id).text(val.role));
                });
            });
            $("select#u_user_user_role :selected").val(result.user_type_id);
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

            $("#administration").hide();
            $("#b-add_user").hide();
            $("#b-cancel").removeClass("hidden");
            $("#l-edit_user").show();
            $("#u_user_username").focus();
        });
    });

    $(document).on('click', '#u_user_user_role', function(){
        $('#u_user_user_role').hasClass('hidden')?'':$('#u_user_user_role').addClass('hidden');
        $('#u_user_user_role_list').hasClass('hidden')?$('#u_user_user_role_list').removeClass('hidden'):'';
        role_id= 1;
    });

    $("#u_user_user_role_list").change(function () {
        role_id = $("#u_user_user_role_list").val();
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
        administration.cleanUser();
        $("#b-cancel").addClass("hidden");
        $("#b-add_user").show();
        $("#administration").show();
        $("#l-add_user").hide();
        $("#l-edit_user").hide();
        role_id ='';
    });

    $("#btn_update_user").click(function (e) {
        e.preventDefault();

        var title = 'User';
        var content = 'Update Successful';
        var url = '/admin/update_user';
        if(role_id == null || role_id == ''){
            id = $("#u_user_user_role").val();
        }else{
            id = role_id;
        }

        var input = {
            '_token'        : $("input[name=_token]").val(),
            'user_id'       : $("#u_user_id").val(),
            'user_role_id'  : id,
            'username'      : $("#u_user_username").val(),
            'firstname'     : $("#u_user_firstname").val(),
            'lastname'      : $("#u_user_lastname").val(),
            'country'       : $("#u_user_country").val(),
            'city'          : $("#u_user_city").val(),
            'address'       : $("#u_user_address").val(),
            'phone'         : $("#u_user_phone").val(),
            'newsletter'    : $("#u_user_newsletter").val(),
            'status'        : $("#u_user_status").val()
        };
        g2shopping.jsPostReq(url, input, function (result) {
            if(!result){
                content = 'Update Failure';
                plugin.popup.fail(title, content);
            }
            plugin.popup.success(title, content);
        });
        administration.fillUserData();
        $("#b-cancel").click();
        //console.log(input);

    });

});
