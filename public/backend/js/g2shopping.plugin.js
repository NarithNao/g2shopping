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

plugin.loadingStart = function (element) {
    // none, bounce, rotateplane, stretch, orbit,
    // roundBounce, win8, win8_linear or ios

    $(element).waitMe({
        effect: 'bounce',
        text: 'Please wait...',
        bg: 'rgba(255,255,255,0.7)',
        color: '#000',
        maxSize: '',
        source: 'img.svg',
        onClose: function() {}
    });
};

plugin.loadingStop = function (element) {
    $(element).waitMe('hide');
};

