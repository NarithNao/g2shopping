/**
 * Created by Narith on 7/28/2016.
 * file name 'category.js'
 */

$(document).ready(function () {
    var fname_add = 'no_image.gif';
    var fname_update = '';

    $(document).on('change', 'input[type=file]#a_brand_image', function (e) {
        var file = $("#a_brand_image").val();
        var path = URL.createObjectURL(event.target.files[0]);
        $("#brand_image_a").attr('src', path);
        var arr = file.split("\\");
        fname_add = arr[arr.length-1];
        //alert(fname_add);
    });

    $(document).on('change', 'input[type=file]#u_brand_image', function (e) {
        var file = $("#u_brand_image").val();
        var path = URL.createObjectURL(event.target.files[0]);
        $("#brand_image_u").attr('src', path);
        var arr = file.split("\\");
        fname_update = arr[arr.length-1];
    });


    $(document).on('click', '#b-add_brand', function (e) {
        e.preventDefault();
        $("#brand").hide();
        $("#b-add_brand").hide();
        $("#b-cancel").removeClass('hidden');
        $("#l-add_brand").show();
        $("#a_brand_name").focus();
    });

    $(document).on('click', '#btn-add_brand', function (e) {
        e.preventDefault();
        var url = '/admin/add_brand';
        var input = {
            '_token'              : $("input[name=_token]").val(),
            'brand_name'          : $("#a_brand_name").val(),
            'brand_description'   : $("#a_brand_description").val(),
            'position'            : $("#a_position").val(),
            'brand_image'          : fname_add,
        };
        g2shopping.jsPostReq(url, input, function (result) {
            $("#frm_upload_image").submit();
        });
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
        $("#l-add_brand").hide();
        $("#l-update_brand").hide();
        $('#b-cancel').addClass('hidden');
        $("#b-add_brand").show();
        $("#brand").show();
    });

    $(document).on('click', '#brand table tbody tr td a.btn_update_brand', function (e) {
        e.preventDefault();
        $("#brand").hide();
        $("#b-add_brand").hide();
        $("#b-cancel").removeClass('hidden');
        $("#l-update_brand").show();
        $("#u_brand_name").focus();

        var id = g2shopping.getLinkID(this.href);
        var url = 'brand/'+id+'/search';
        g2shopping.jsGetReq(url, function (result) {
            console.log(result.data);
            fname_update = result.data.brand_image;
            $("#brand_id").val(id);
            $("#u_brand_name").val(result.data.brand_name);
            $("#u_brand_description").val(result.data.brand_description);
            if(result.data.status == 1){
                $("#u_status").prop('checked', true);
                $("#u_status").val('1');
            }else{
                $("#u_status").val('0');
            }
            $("#u_position").val(result.data.position);
            $("#brand_image_u").attr('src', result.image);
        });
    });

    $(document).on('click', '#btn-update_brand', function (e) {
        var url = '/admin/update_brand/';
        var input = {
            '_token'                : $("input[name=_token]").val(),
            'brand_id'               : $("#brand_id").val(),
            'brand_name'             : $("#u_brand_name").val(),
            'brand_description'      : $("#u_brand_description").val(),
            'status'                : $("#u_status").val(),
            'position'              : $("#u_position").val(),
            'brand_image'            : fname_update
        };
        g2shopping.jsPostReq(url, input, function (result) {
            $("#u_frm_upload_image").submit();
        });
    });

});