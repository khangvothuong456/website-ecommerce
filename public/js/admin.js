$('#app-header .app-header__toggle').click(function(){ $('#sidebar').toggleClass('app-sidebar-show'); });
//$.ajaxSetup({ headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')} });

var clickSubMenuBtn = false;
document.querySelector('.dropdown-submenu').addEventListener('click',function(){
    if(clickSubMenuBtn === false)
    {
        clickSubMenuBtn = true;
        $(this).parent().find('ul').css('display','block');
        $(this).find('.fa-caret-left').css('transform','rotate(-90deg)');
    }
    else
    {
        clickSubMenuBtn = false;
        $(this).parent().find('ul').css('display','none');
        $(this).find('.fa-caret-left').css('transform','rotate(0deg)');
    }
});