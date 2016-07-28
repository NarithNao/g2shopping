var category = {};

category.jsPostReq = function (url, input, callback) {
    $.ajax({
        url: '' + url,
        type: 'POST',
        data: input,
        dataType: 'json',
        error: function(xhr, textStatus, errorThrown){
            alert(xhr.statusText);
        },
        success: function(result){
            try{
                console.log(result);
                callback(result);
            }catch(e){
                alert('error');
            }
        }
    });
};

category.jsGetReq = function (url, callback) {
    $.ajax({
        url: url,
        type: 'Get',
        dataType: 'json',
        error: function(xhr, textStatus, errorThrown){
            alert(xhr.statusText);
        },
        success: function(result){
            try{
                console.log(result);
                callback(result);
            }catch(e){
                alert('error');
            }
        }
    });
};

category.getLinkID = function (url) {
    var s_url = url.split('/');
    var id = s_url[s_url.length - 1];
    return id;
};

$(document).ready(function () {
    var fname = 'profile.png';

    $('input[type=file]').change(function(e){
        var file = $("#a_cate_image").val();
        var path = URL.createObjectURL(event.target.files[0]);
        $("#cate_image").attr('src', path);
        var arr = file.split("\\");
        fname = arr[arr.length-1];
    });

    $("#b-add_category").click(function (e) {
        e.preventDefault();
        var url = '/admin/category/list';

        category.jsGetReq(url, function (result) {
            $("#a_parent_category").empty();
            if(result.length < 1){
                $("#a_parent_category").append($('<option>').val('0').text('Choose parent category'));
            }else{
                $("#a_parent_category").append($('<option>').val('0').text('Choose parent category'));
                for(var key in result){
                    $("#a_parent_category").append($('<option>').val(result[key].id).text(result[key].cate_name));
                }
            }
            $("#category").hide();
            $("#b-add_category").hide();
            $("#b-cancel").removeClass('hidden');
            $("#l-add_category").show();
            $("#a_show_on_homepage").val('0');
            $("#a_include_on_main_menu").val('0');
            $("#a_cate_name").focus();
        });

    });

    $("#btn-add_category").click(function () {
        //e.preventDefault();
        var url = '/admin/add_category';
        var input = {
            '_token'              : $("input[name=_token]").val(),
            'cate_name'           : $("#a_cate_name").val(),
            'description'         : $("#a_cate_description").val(),
            'position'            : $("#a_position").val(),
            'parent_category'     : $("#a_parent_category").val(),
            'cate_image'          : fname,
            'show_on_homepage'    : $("#a_show_on_homepage").val(),
            'include_on_main_menu': $("#a_include_on_main_menu").val(),
            'status'              : $("#a_status").val(),
        };
        category.jsPostReq(url, input, function (result) {
            $("#frm_upload_image").submit();
        });

    });

    $("#a_show_on_homepage").change(function () {
        if ($(this).prop("checked")) {
            $(this).val('1');
        }else{
            $(this).val('0');
        }
    });

    $("#a_include_on_main_menu").change(function () {
        if ($(this).prop("checked")) {
            $(this).val('1');
        }else{
            $(this).val('0');
        }
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
        //alert(fname);
        $("#l-add_category").hide();
        $("#l-update_category").hide();
        $("#l-delete_category").hide();
        $(this).addClass('hidden');
        $("#b-add_category").show();
        $("#category").show();
    });

    $(".btn_delete_category").click(function (e) {
        e.preventDefault();

        var id = category.getLinkID(this.href)
        var url = '/admin/category/'+id+'/search';
        
        category.jsGetReq(url, function (result) {
            $("#category").hide();
            $("#b-add_category").hide();
            $("#b-cancel").removeClass('hidden');
            $("#l-delete_category").show();
            $("#d_cate_id").val(result.id);
        });

    });

    $(".btn_update_category").click(function (e) {
        e.preventDefault();
        var id = category.getLinkID(this.href)
        var url = '/admin/category/'+id+'/search';

        category.jsGetReq(url, function(result){
            $("#category").hide();
            $("#b-add_category").hide();
            $("#b-cancel").removeClass('hidden');
            $("#l-update_category").show();
            $("#u_cate_name").focus();

            $("#u_cate_name").val(result.cate_name);
            $("#u_cate_description").val(result.cate_description);
            if(result.show_on_homepage == 1){
                $("#u_show_on_homepage").prop('checked', true);
                $("#u_show_on_homepage").val('1');
            }else
                $("#u_show_on_homepage").val('0');
            if(result.include_on_main_menu == 1){
                $("#u_include_on_main_menu").prop('checked', true);
                $("#u_include_on_main_menu").val('1');
            }else
                $("#u_include_on_main_menu").val('0');
            if(result.status == 1){
                $("#u_status").prop('checked', true);
                $("#u_status").val('1');
            }else
                $("#u_status").val('0');
            $("#u_position").val(result.position);
        });

    });

});