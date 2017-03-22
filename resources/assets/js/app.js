var navbar = $('#main-navbar');
var widthBreakpointXS = 768;

$(window).scroll(function (e) {
    var top = window.pageYOffset || document.documentElement.scrollTop;

    if (top > 1) {
        navbar.addClass('white');
    } else {
        if ($(window).width() >= widthBreakpointXS)
            navbar.removeClass('white');
    }
});

var ifBreakpoint = function () {
    var w = $(window).width();
    if ($(window).width() < widthBreakpointXS)
        navbar.addClass('white');
    else {
        var top = window.pageYOffset || document.documentElement.scrollTop;
        if (top == 0) {
            navbar.removeClass('white');
        }
    }
};

var initMembers = function () {
    $('#members-filters').find('button').click(function(){
        var group = $(this).data('group');
        $('#members-list').removeClass().addClass('row').addClass(group);
    });
};

$(window).resize(ifBreakpoint);
$(function(){ifBreakpoint();initMembers();});

