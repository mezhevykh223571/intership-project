$(document).ready(function(){
    $('.menu-toggle').click(function(){
        $(this).toggleClass('open');
    });
    var currentIndex = 0;// store current pane index displayed
    var ePanes = $('#slider .panel'), // store panes collection
        time   = 5000,
        bar = $('.progress-bar');

    function showPane(index){// generic showPane
        // hide current pane
        ePanes.eq(currentIndex).stop(true, true).fadeOut();
        // set current index : check in panes collection length
        currentIndex = index;
        if(currentIndex < 0) currentIndex = ePanes.length-1;
        else if(currentIndex >= ePanes.length) currentIndex = 0;
        // display pane
        ePanes.eq(currentIndex).stop(true, true).fadeIn();
        // menu selection
        $('.nav li').removeClass('current').eq(currentIndex).addClass('current');
    }

    // bind ul links
    $('.nav li').click(function(ev){    showPane($(this).index());});
// bind previous & next links
    $('.previous').click(function(){    showPane(currentIndex-1);});
    $('.next').click(function(){    showPane(currentIndex+1);});
// apply start pane
    showPane(0);

    function run(){
        bar.width(0);
        showPane(currentIndex+1);
        bar.animate({'width': "+=100%"}, time, run);
    }

    run();

});