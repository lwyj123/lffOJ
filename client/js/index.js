$(document).ready(function() {
  $('body').addClass('js');
  var $menu = $('#menu'),
    $menulink = $('.menu-link');
  
    $menulink.click(function() {
      $menulink.toggleClass('active');
      $menu.toggleClass('active');
      return false;

    });
    
    if(getCookie('Email') != null) {
        $('#register').addClass('hide');
        $('#login').addClass('hide');
        $('#logout').removeClass('hide');
    }
    else {
        $('#register').removeClass('hide');
        $('#login').removeClass('hide');
        $('#logout').addClass('hide');
    }
    $('#logout').click(function() {
        delCookie('Email');
        delCookie('lwtoken');
        alert('注销成功');
        window.location.reload();   
    })
});