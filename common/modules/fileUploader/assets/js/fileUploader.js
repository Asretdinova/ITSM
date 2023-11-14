/**
 * Created by Azamat Mirvosiqov on 06.08.2015.
 */

var fileUploader = {
    escapeTags: function (str) {
        return String(str)
            .replace(/&/g, '&amp;')
            .replace(/"/g, '&quot;')
            .replace(/'/g, '&#39;')
            .replace(/</g, '&lt;')
            .replace(/>/g, '&gt;');
    },
    setDeleteFileBtn: function (obj, text, modelName, field) {
        var del = confirm(text);
        if (del == true) {
            var url = obj.getAttribute("href");
            var xhr = new XMLHttpRequest();
            xhr.onreadystatechange = function () {
                if (xhr.readyState == 4) {
                    var response = JSON.parse(xhr.responseText);
                    if (response.success) {
                        obj.parentNode.parentNode.removeChild(obj.parentNode);
                        if (typeof($('input[name="'+modelName+'['+field+']"]')) != 'undefined'){
                            if (typeof(response.guid) != 'undefined')
                                $('input[name="'+modelName+'['+field+']"]').val(response.guid);
                            else
                                $('input[name="'+modelName+'['+field+']"]').val('');
                        }
                    }
                }
            };
            xhr.open('GET', url);
            xhr.send();
        }
    },
    deletePill: function (obj) {
        obj.parentNode.parentNode.removeChild(obj.parentNode);
    }
};


$(document).ready(function () {
    var body = $('body');
    var fileUploaderBox = $('.fileUploaderBox');

    body.on("dragover", function () {
        fileUploaderBox.css({'min-height': '120px'});
        fileUploaderBox.find('.dropArea').stop().slideDown(100);
    });

    body.on("dragleave drop", function () {
        fileUploaderBox.find('.dropArea').stop().slideUp(100);
    });
});