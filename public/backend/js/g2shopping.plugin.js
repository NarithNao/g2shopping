/**
 * Created by Narith on 7/28/2016.
 * file name 'g2shopping.popup.js'
 */

var plugin = {};
plugin.popup = {};

plugin.popup.success = function (title, content){
    $.toaster({ priority : 'success', title : title, message : content});
};

plugin.popup.fail = function (title, content){
    $.toaster({ priority : 'danger', title : 'Title', message : 'Your message here'});
};

plugin.startLoading = function (element) {
    $(document).ajaxStart(function(){
        $("#loading_page").hasClass('hidden')?$("#loading_page").removeClass('hidden'):'';
        $(element+" > a").click();
    });
};

plugin.endLoading = function (element) {
    $(document).ajaxStop(function(){
        $("#loading_page").hasClass('hidden')?'':$("#loading_page").addClass('hidden');
        $(element+" > a").click();
    });
};
