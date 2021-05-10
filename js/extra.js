(function ($) {


  $(document).ready(function() {
    $('.numbers--header span').each(function() {
      let attrNum = $(this).attr('data-num-raw');
      let initialNumPercent = attrNum*0.95;
      $(this).html(parseInt(initialNumPercent * 100) / 100);
    });
    $('.numbers--header .ton').each(function() {
      $(this).html('tons');
    });
  });

  function tonText() {
    $('.numbers--header .ton').addClass('ton-visible');
  }


  $(document).ready(function() {

    let ribblaLink = '<a class="ribbla-link" title="Ribbla" href="https://ribbla.com/"></a>'
    $('.footer_ribbla .block-block').append(ribblaLink);



    var a = 0;
    $(window).scroll(function() {
      if($("body").hasClass("front")){
    
      var oTop = $('.numbers').offset().top - window.innerHeight;
      if (a == 0 && $(window).scrollTop() > oTop) {
        setTimeout(tonText, 7000);
        $('.numbers--header span').each(function() {
          var $this = $(this),
            countTo = $this.attr('data-num-raw');
          $({
            countNum: $this.text()
          }).animate({
              countNum: countTo
            },
    
            {
    
              duration: 7000,
              easing: 'swing',
              step: function() {
                $this.text(parseInt(this.countNum * 100) / 100);
              },
              complete: function() {
                $this.text(this.countNum);
              }
    
            });
        });
        a = 1;
      }
    };
    });

  });

})(jQuery);
