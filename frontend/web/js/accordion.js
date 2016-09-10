//--------------------------------------------------------This is for accordion
$(document).on('click','.maincategorylst',function(){
    if($(this).parent().next('div').is(':visible')){
        $('.icon_plus_minus').removeClass('fa-minus');
        $('.icon_plus_minus').addClass('fa-plus');
        $(this).children('em').addClass('fa-minus');
    }else{
        $('.category_list').slideUp();
        $(this).parent().next('div').slideDown();
        $('.icon_plus_minus').removeClass('fa-minus');
        $('.icon_plus_minus').addClass('fa-plus');
        $(this).children('em').addClass('fa-minus');
    }
});
//-----------------------------Category checkbox check
var arr=[];
function array_check(id){
    if($.inArray(id,arr)>-1){
        arr.pop(id);
    }else{
        arr.push(id);
    }
    var arr_send=arr.toString();
    $.ajax({
        url: "call_subcategory",
        dataType: "json",
        data : {array_val:arr_send},
        type: "POST",
        beforeSend:function(){
            $('.loading').css("display","block");  
        },
        success: function(data) {
            $('.loading').hide();
        },
        error :function(data){
            $('.loading').hide();

        }
    });
}
$(document).on('click','.category_check',function(){
    if($(this).hasClass('selected')){
        $(this).removeClass('selected');
        var id=$(this).attr('id');
        array_check(id);
    }else{
        $(this).addClass('selected');
        var id=$(this).attr('id');
        array_check(id);
        
    }
})