/**
 * Created by NARITH on 8/11/2016.
 */

var product = {};

product.fillData = function(){
    g2shopping.jsGetReq('/admin/product/list', function(result){
        $("#product > tbody tr").remove();
        if(result.length>0){
            var i = 1;
            $.each(result, function(index, val){
                var tblRow = $('<tr>').append(
                    $('<td class="text-center">').text(i++),
                    $('<td class="text-center">').text('image'),
                    $('<td>').text(val.sku),
                    $('<td>').text(val.cost),
                    $('<td>').text(val.price),
                    $('<td>').text(val.instock),
                    $('<td>').text( val.status),
                    $('<td>').text(
                        $('<a href="'+val.id+'" class="btn btn-warning btn-xs col-xs-12 btn_update_product" data-toggle="tooltip" title="Update">').append($('<i class="fa fa-pencil">'))
                    )
                );
                $("#product > tbody tr").append(tblRow);
            });
        }else{
            var tblRow = $('<tr>').append(
                $('<td colspan="8" class="text-center">').text('No Record found')
            );
            $("#product > tbody tr").append(tblRow);
        }
        $('[data-toggle="tooltip"]').tooltip();
    });
};

product.cleanProduct = function(){
    $("#a_pro_sku").val('');
    $("#a_pro_short_description").val('');
    $("#a_pro_full_description").val('');
    $("#a_pro_cost").val('');
    $("#a_pro_price").val('');
    $("#a_pro_qty").val('');
    $("#a_pro_qty_min").val('');
};



$(document).ready(function () {
    var fname_add = 'no_image.gif';
    var fname_update = '';
    var parent_cate = '';

    /*$(document).on('change', 'input[type=file]#a_cate_image', function (e) {
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
    });*/


    $(document).on('click', '#b-add_product', function (e) {
        e.preventDefault();

        g2shopping.jsGetReq('/admin/category/list', function (result) {
            $("#a_pro_category").empty();
            if(result.length < 1){
                alert('Cannot create product without category');
                location.reload();
            }else{
                for(var key in result){
                    $("#a_pro_category").append($('<option>').val(result[key].id).text(result[key].cate_name));
                }
            }
        });
        g2shopping.jsGetReq('/admin/brand/list', function (result) {
            $("#a_pro_brand").empty();
            if(result.length < 1){
                alert('Cannot create product without brand');
                location.reload();
            }else{
                for(var key in result){
                    $("#a_pro_brand").append($('<option>').val(result[key].id).text(result[key].brand_name));
                }
            }
        });

        $("#product").hide();
        $("#b-add_product").hide();
        $("#b-cancel").removeClass('hidden');
        $("#l-add_product").show();
        $("#a_pro_sku").focus();
    });

    $(document).on('click', '#btn-add_product', function (e) {
        e.preventDefault();
        var url = '/admin/add_product';
        var input = {
            'sku'               : $("#a_pro_sku").val(),
            'short_description' : $("#a_pro_short_description").val(),
            'full_description'  : $("#a_pro_full_description").val(),
            'cate_id'           : $("#a_pro_category").val(),
            'brand_id'          : $("#a_pro_brand").val(),
            'cost'              : $("#a_pro_cost").val(),
            'price'             : $("#a_pro_price").val(),
            'instock'           : $("#a_pro_qty").val(),
            'instock_min'       : $("#a_pro_qty_min").val(),
        };
        g2shopping.jsPostReq(url, input, function (result) {
            product.fillData();
            $("#b-cancel").click();
        });
    });

    /*$(document).on('change', '#a_show_on_homepage', function (e) {
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
    });*/

    $(document).on('click', '#b-cancel', function (e) {
        e.preventDefault();
        $("#l-add_product").hide();
        $("#l-update_product").hide();
        $('#b-cancel').addClass('hidden');
        $("#b-add_product").show();
        $("#product").show();
        product.cleanProduct();
    });

    $(document).on('click', '#u_parent_category', function(){
        $('#u_parent_category').hasClass('hidden')?'':$('#u_parent_category').addClass('hidden');
        $('#u_parent_category_list').hasClass('hidden')?$('#u_parent_category_list').removeClass('hidden'):'';
    });

    $(document).on('change', '#u_pro_status', function (e) {
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

    $(document).on('click', '#product table tbody tr td a.btn_update_product', function (e) {
        e.preventDefault();
        $("#product").hide();
        $("#b-add_product").hide();
        $("#b-cancel").removeClass('hidden');
        $("#l-update_product").show();
        $("#u_pro_sku").focus();
        $("#u_pro_category").empty();
        var id = g2shopping.getLinkID(this.href);
        var url = 'product/'+id+'/search';
        g2shopping.jsGetReq(url, function (result) {

            $("#u_pro_sku").val(result.sku);
            $("#u_pro_short_description").val(result.short_description);
            $("#u_pro_full_description").val(result.full_description);
            $("#u_pro_cost").val(result.cost);
            $("#u_pro_price").val(result.price);
            $("#u_pro_qty").val(result.instock);
            $("#u_pro_qty_min").val(result.instock_min);

            g2shopping.jsGetReq('/admin/category/list', function (res) {
                for(var key in res){
                    $("#u_pro_category").append($('<option>').val(res[key].id).text(res[key].cate_name));
                }
                $("#u_pro_category option[value="+result.cate_id+"]").attr('selected', 'selected');
            });

            if(result.status == 1){
                $("#u_pro_status").prop('checked', true);
                $("#u_pro_status").val('1');
            }else{
                $("#u_pro_status").val('0');
            }

            /*g2shopping.jsPostReq('/admin/category/list_update', {'cate_id': id}, function (res) {
                $("#u_parent_category").empty();
                $("#u_parent_category_list").empty();
                if(res.length < 1){
                    $("#u_parent_category").append($('<option>').val('0').text('Choose parent category'));
                    $("#u_parent_category_list").append($('<option>').val('0').text('Choose parent category'));
                }else{
                    $("#u_parent_category_list").append($('<option>').val('0').text('Choose parent category'));
                    for(var key in res){
                        if(result.data.parent_category == res[key].id)
                            $("#u_parent_category").append($('<option>').val(res[key].id).text(res[key].cate_name)).prop('selected', true);
                        else{
                            $("#u_parent_category").append($('<option>').val('0').text('Choose parent category'));
                        }
                        $("#u_parent_category_list").append($('<option>').val(res[key].id).text(res[key].cate_name));
                    }
                }
                $("#cate_image_u").attr('src', result.image);
            });*/
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
