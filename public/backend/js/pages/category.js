/**
 * Created by Narith on 7/28/2016.
 * file name 'category.js'
 */

$(document).ready(function () {
    var fname_add = 'no_image.gif';
    var fname_update = '';
    var parent_cate = '';

    $(document).on('change', 'input[type=file]#a_cate_image', function (e) {
        var file = $("#a_cate_image").val();
        var path = URL.createObjectURL(event.target.files[0]);
        $("#cate_image_a").attr('src', path);
        var arr = file.split("\\");
        fname_add = arr[arr.length-1];
    });

    $(document).on('change', 'input[type=file]#u_cate_image', function (e) {
        var file = $("#u_cate_image").val();
        var path = URL.createObjectURL(event.target.files[0]);
        $("#cate_image_u").attr('src', path);
        var arr = file.split("\\");
        fname_update = arr[arr.length-1];
    });


    $(document).on('click', '#b-add_category', function (e) {
        e.preventDefault();
        var url = '/admin/category/list';

        g2shopping.jsGetReq(url, function (result) {
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

    $(document).on('click', '#btn-add_category', function (e) {
        e.preventDefault();
        var url = '/admin/add_category';
        var input = {
            '_token'              : $("input[name=_token]").val(),
            'cate_name'           : $("#a_cate_name").val(),
            'description'         : $("#a_cate_description").val(),
            'position'            : $("#a_position").val(),
            'parent_category'     : $("#a_parent_category").val(),
            'cate_image'          : fname_add,
            'show_on_homepage'    : $("#a_show_on_homepage").val(),
            'include_on_main_menu': $("#a_include_on_main_menu").val(),
            'status'              : $("#a_status").val(),
        };
        g2shopping.jsPostReq(url, input, function (result) {
            $("#frm_upload_image").submit();
        });
    });

    $(document).on('change', '#a_show_on_homepage', function (e) {
        if ($('#a_show_on_homepage').prop("checked")) {
            $('#a_show_on_homepage').val('1');
        }else{
            $('#a_show_on_homepage').val('0');
        }
    });

    $(document).on('change', '#a_include_on_main_menu', function (e) {
        if ($('#a_include_on_main_menu').prop("checked")) {
            $('#a_include_on_main_menu').val('1');
        }else{
            $('#a_include_on_main_menu').val('0');
        }
    });

    $("#u_status").change(function () {
        if ($(this).prop("checked")) {
            $(this).val('1');
        }else{
            $(this).val('0');
        }
    });

    $(document).on('click', '#b-cancel', function (e) {
        e.preventDefault();
        $("#l-add_category").hide();
        $("#l-update_category").hide();
        $('#b-cancel').addClass('hidden');
        $("#b-add_category").show();
        $("#category").show();
    });

    /*$(document).on('click', '#u_parent_category', function(){
        $('#u_parent_category').hasClass('hidden')?'':$('#u_parent_category').addClass('hidden');
        $('#u_parent_category_list').hasClass('hidden')?$('#u_parent_category_list').removeClass('hidden'):'';
    });*/

    $(document).on('change', '#u_show_on_homepage', function (e) {
        if ($(this).prop("checked")) {
            $(this).val('1');
        }else{
            $(this).val('0');
        }
    });

    $(document).on('change', '#u_include_on_main_menu', function (e) {
        if ($(this).prop("checked")) {
            $(this).val('1');
        }else{
            $(this).val('0');
        }
    });

    $(document).on('change', '#u_parent_category_list', function(){
        parent_cate = $(this).val();
        //alert(parent_cate);
    });

    $(document).on('click', '#category table tbody tr td a.btn_update_category', function (e) {
        e.preventDefault();
        /*$('#u_parent_category').hasClass('hidden')?$('#u_parent_category').removeClass('hidden'):'';
        $('#u_parent_category_list').hasClass('hidden')?'':$('#u_parent_category_list').addClass('hidden');*/
        $("#u_parent_category").empty();
        var id = g2shopping.getLinkID(this.href);
        var url = 'category/'+id+'/search';
        g2shopping.jsGetReq(url, function (result) {
            console.log(result.data.cate_name);
            fname_update = result.data.cate_image;
            parent_cate = result.data.parent_category;
            $("#cate_id").val(id);
            $("#u_cate_name").val(result.data.cate_name);
            $("#u_cate_description").val(result.data.cate_description);
            if(result.data.show_on_homepage == 1){
                $("#u_show_on_homepage").prop('checked', true);
                $("#u_show_on_homepage").val('1');
            }else{
                $("#u_show_on_homepage").val('0');
            }
            if(result.data.include_on_main_menu == 1){
                $("#u_include_on_main_menu").prop('checked', true);
                $("#u_include_on_main_menu").val('1');
            }else{
                $("#u_include_on_main_menu").val('0');
            }
            if(result.data.status == 1){
                $("#u_status").prop('checked', true);
                $("#u_status").val('1');
            }else{
                $("#u_status").val('0');
            }
            $("#u_position").val(result.data.position);
            $("#cate_image_u").attr('src', result.image);
            g2shopping.jsPostReq('/admin/category/list_update', {'cate_id': id}, function (res) {
                //$("#u_parent_category").empty();
               // $("#u_parent_category_list").empty();

                for(var key in res){
                    $("#u_parent_category").append($('<option>').val(res[key].id).text(res[key].cate_name));
                }
                $("#u_parent_category option[value="+parent_cate+"]").attr('selected', 'selected');
                console.log(parent_cate);
                /*if(res.length < 1){
                    $("#u_parent_category").append($('<option>').val('0').text('Choose parent category'));
                    $("#u_parent_category_list").append($('<option>').val('0').text('Choose parent category'));
                }else{
                    $("#u_parent_category_list").append($('<option>').val('0').text('Choose parent category'));
                    for(var key in res){
                        /!*if(result.data.parent_category == res[key].id)
                            $("#u_parent_category").append($('<option>').val(res[key].id).text(res[key].cate_name)).prop('selected', true);
                        else{*!/
                            //$("#u_parent_category").append($('<option>').val('0').text('Choose parent category'));
                        //}
                        //$("#u_parent_category_list").append($('<option>').val(res[key].id).text(res[key].cate_name));
                        $("#u_parent_category").append($('<option>').val(res[key].id).text(res[key].cate_name));
                    }
                    //$("#u_parent_category option[value="+result.cate_id+"]").attr('selected', 'selected');
                }
                $("#u_parent_category option[value="+result.cate_id+"]").attr('selected', 'selected');*/
            });

            $("#category").hide();
            $("#b-add_category").hide();
            $("#b-cancel").removeClass('hidden');
            $("#l-update_category").show();
            $("#u_cate_name").focus();
        });
    });

    $(document).on('click', '#btn-update_category', function (e) {
        var url = '/admin/update_category/';
        var input = {
            /*'_token'                : $("input[name=_token]").val(),*/
            'cate_id'               : $("#cate_id").val(),
            'cate_name'             : $("#u_cate_name").val(),
            'cate_description'      : $("#u_cate_description").val(),
            'show_on_homepage'      : $("#u_show_on_homepage").val(),
            'include_on_main_menu'  : $("#u_include_on_main_menu").val(),
            'status'                : $("#u_status").val(),
            'position'              : $("#u_position").val(),
            'parent_category'       : parent_cate,
            'cate_image'            : fname_update
        };
        g2shopping.jsPostReq(url, input, function (result) {
            $("#u_frm_upload_image").submit();
        });
    });

});