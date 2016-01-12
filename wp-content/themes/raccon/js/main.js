(function($) {
  $(function() {
    
    var bodyclassname = $('body').attr('class');
        if ($('html').width()>789) {
      if (bodyclassname=='index') {
        $(window).scrollTop('0');
      }else{
        $(window).scrollTop('520');
      };
    }else{
      if (bodyclassname=='index') {
        $(window).scrollTop('0');
      }else{
        $(window).scrollTop('260');
      };
    };
    
    // navigation

    $(window).scroll(function (){
      if($(window).scrollTop() > 0){
        $('header').addClass('fix');
      }else{
        $('header').removeClass('fix');
      }
    });

    // mobile show nav
    if ($('html').width()<789) {
      var d = parseInt($('header .topnav').css('left'))-123+'px';
        $('header .topnav, .sidebar li span').css('left',d);
        $('.topnav .close').hide();
        $('header .open').on('click',function(){
        $(this).hide();
        $('header .close').show();
        $('header').css('overflow','visible')
        $('header .topnav').css('left','-83px');
        $('.sidebar').css('top','255px');
        $('body').css('overflow','hidden');
      });

      $('header .close, .sidebar li span').on('click',function(){
        $(this).hide();
        $('header .open').show();
        $('header .topnav').css('left',d);
        $('.sidebar').css('top','100%');
        $('header').css('overflow','hidden')
        $('body').css('overflow','visible');
      });
    };
  });
})(jQuery);