$(document).ready(function(){
    $('ul.sidebar__tabs li a:first').addClass('sidebar__active');
    $('.sidebar__section div').hide();
    $('.sidebar__section div:first').show();

    $('ul.sidebar__tabs li a').click(function(){
        $('ul.sidebar__tabs li a').removeClass('sidebar__active');
        $(this).addClass('sidebar__active');
        $('.sidebar__section div').hide();

        var activeTab = $(this).attr('href');
        $(activeTab).show();
        return false;
    });
});