//--------------------------------------------------------This is for accordion

$(document).on('click','.network',function(){
    if($(this).parent().next('div').is(':visible')){
        $(this).parent().next('div').slideUp();
        $(this).children('em').addClass('fa-plus');
        $(this).children('em').removeClass('fa-minus');
    }else{
        $(this).parent().next('div').slideDown();
        $(this).children('em').removeClass('fa-plus');
        $(this).children('em').addClass('fa-minus');
    }
});