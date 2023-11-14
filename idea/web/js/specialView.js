"use strict";

function makeNormal() {
    $('html').removeClass('blackAndWhite blackAndWhiteInvert');
    $.removeCookie('specialView', {path: '/'});
}

function makeBlackAndWhite() {
    makeNormal();
    $('html').addClass('blackAndWhite');
    $.cookie("specialView", 'blackAndWhite', {path: '/'});
}

function makeBlackAndWhiteDark() {
    makeNormal();
    $('html').addClass('blackAndWhiteInvert');
    $.cookie("specialView", 'blackAndWhiteInvert', {path: '/'});
}

function resetFontSize() {
    $('html').removeClass('biggerFont');
    $.removeCookie("largeFont", {path: '/'});
}

function changeFontSize() {
    $('html').addClass('biggerFont');
    $.cookie("largeFont", true, {path: '/'});
}

$(document).ready(function () {
    var appearance = $.cookie("specialView");
    switch (appearance) {
        case 'blackAndWhite':
            makeBlackAndWhite();
            break;
        case 'blackAndWhiteInvert':
            makeBlackAndWhiteDark();
            break;
    }

    if (typeof $.cookie("largeFont") !== 'undefined')
        changeFontSize();

    $('.no-propagation').click(function (e) {
        e.stopPropagation()
    });

    $('.appearance .spcNormal').click(function () {
        makeNormal()
    });

    $('.appearance .spcWhiteAndBlack').click(function () {
        makeBlackAndWhite()
    });

    $('.appearance .spcDark').click(function () {
        makeBlackAndWhiteDark()
    });

    $('.appearance .middleFont').click(function () {
        resetFontSize()
    });

    $('.appearance .largeFont').click(function () {
        changeFontSize()
    });

    $('#_resetAllSettings').click(function () {
       makeNormal();
       resetFontSize();
    });
});
