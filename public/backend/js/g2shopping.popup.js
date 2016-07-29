/**
 * Created by Narith on 7/28/2016.
 * file name 'g2shopping.popup.js'
 */

var popup = {};

popup.success = function (title, content){
    return  d1_2 = $.dialog({
                title : '<h4 class="text-center">'+title+'</h4>',
                content : '<p class="text-center text-success" style="padding-bottom: 30px; font-size: medium;"><i class="fa fa-check fa-2x"></i> '+content+' Successful</p><a id="btn_close_popup" class="btn btn-info btn-xs center-block" style="max-width: 100px;"  href="javascript:;" onClick="d1_2.close()">Close</a>',
                hasMask : false,
                hotKeys : true,
                drag : false
            });
}

popup.fail = function (title, content){
    return  d1_2 = $.dialog({
        title : '<h4 class="text-center">'+title+'</h4>',
        content : '<p class="text-center text-danger" style="padding-bottom: 30px; font-size: medium;"><i class="fa fa-times fa-2x"></i> '+content+' Failure</p><a class="btn btn-info btn-sm center-block" style="max-width: 100px;"  href="javascript:;" onClick="d1_2.close()">Close</a>',
        hasMask : false,
        hotKeys : true,
        drag : false
    });
}

