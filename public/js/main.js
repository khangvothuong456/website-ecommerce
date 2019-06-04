$('.app-cart .toggle-cart').click(function(){
    $('.cart-box').toggle();
});

/*===== sidebar__nav =====*/
$('.app-toggle-nav').click(function(){
    $('#overlay').toggle();
    $('.app-sidebar').addClass('app-sidebar__show');
});
$('#overlay').click(function(){
    $(this).toggle();
    $('.app-sidebar').removeClass('app-sidebar__show');
});
$('.app-sidebar__close').click(function(){
    $('#overlay').toggle();
    $('.app-sidebar').removeClass('app-sidebar__show');
});


$('#id_pro_attr').change(function(){
    $.get('../thuoc-tinh-san-pham/'+$('#id_pro_attr option:selected').val(),function(res){
        $("#price_pro").html(res.price);
        $("#qty_pro").html(res.qty+' sản phẩm ');
        $('#qty_buy').val(0);
        $('#qty_buy').attr('max',res.qty);
    });
})