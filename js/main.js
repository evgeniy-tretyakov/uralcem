(function ($) {

  oneHeightElements = function(element) {
     var maxheight = 0;
    element.height('auto');
    element.each(function () {
        var height = $(this).height();
        if (height > maxheight) {
            maxheight = height;
        }
    });
    element.height(maxheight);
  }

  elementHtmlFix = function(element, newHtml) {
    element.each(function(){
      $(this).html(newHtml);
    })
  }

  elementPlaceholderClear = function(element) {
    element.each(function(){
      $(this).attr('placeholder', '');
      if ($(this).val().length) {
        $(this).addClass('input-filled');
      } else {
        $(this).removeClass('input-filled');
      }
    })
  }

  emptyLineFixer = function(element) {
    $(element).each(function(){
      if (!$(this).text().trim().length && $(this).children().length < 1 ) {
        $(this).remove();
      };
    });
  }

  sliderImgDivWrap = function(imgItem){
    imgItem.each(function(){
      let thisWidth = $(this).find('img').width();
      let thisHeight = $(this).find('img').height();
      $(this).find('img').wrap("<div class='imgWrapper'></div>");
      $(this).find('.imgWrapper').height(thisHeight);
      $(this).find('.imgWrapper').width(thisWidth);
    })
  }

  burgerDecoration = function(parentBlock, trigger, decorationClass){
    parentBlock.find(trigger).on('click', function(){
      $(this).toggleClass(decorationClass);
    })
  }

  lineBrRemoval = function(element){
    element.find('br').remove();
  }

  addAttr = function(link){
    link.each(function(){
      $(this).attr('target', '_blank');
    })
  }

  clearAttr = function(link){
    link.each(function(){
      $(this).attr('placeholder', '');
    })
  }

  focusParent = function(element){
    element.on('focus', function(){
      $(this).parent().addClass('inputFocus');
    });
    element.on('blur', function(){
      if($(this).val().length < 1) {
        $(this).parent().removeClass('inputFocus');
      }
    })
  }
  
  parentAddClass = function(element){
    let value = element.val();
    if(value.length > 0) {
      element.parent().addClass('inputFilled');
    } else {
      element.parent().removeClass('inputFilled');
    }
  }

  inputClear = function(element){
    element.val('');
  }
  
  fileInputStyling = function(element){
    element.append('<div class="input-label">Review</div>')
  }

  customDocumentSelect = function(element, input){
    element.on('click', function(){
      input.click();
    });
  }

  screenScroller = function(){
    $('body').append('<a href="#" title="To the top" class="scrollup"></a>')
    $(window).scroll(function(){
      if ($(this).scrollTop() > 100) {
          $('.scrollup').fadeIn();
      } else {
          $('.scrollup').fadeOut();
      }
    });
        
      $('.scrollup').click(function(){
      $("html, body").animate({ scrollTop: 0 }, 600);
      return false;
    });
  }

  scrollToSection = function(trigger){
    trigger.on( 'click', function(e){ 
      e.preventDefault();
      var el = $(this);
      var dest = el.attr('href'); 
      if(dest !== undefined && dest !== '') { 
          $('html').animate({ 
            scrollTop: $(dest).offset().top 
          }, 1100 
          );
      }
      return false;
    });
  };

  menuClose = function(target, button){
    if ($(window).width() < 800) {
      target.on('click', function(){
        button.click();
      });
    };
  };

  sectionWrap = function(element, wrapper){
    element.wrap(wrapper);
  }

  appendMap = function(element, markup){
    element.append(markup);
  };

  sectionStyling = function(element, parent, className){
    element.closest(parent).addClass(className);
  };

  catalogStyling = function(element, wrapper, button){
    element.each(function(){
      $(this).children().wrapAll(wrapper);
      $(this).find('.catalog-card').append(button);
    });
  };

  setPlaceholder = function(element, placeholder){
    element.each(function(){
      $(this).attr('placeholder', placeholder);
    });
  };

  sidebarItemOpener = function(element, className){
    element.each(function(){
      let menu = $(this).next();
      $(this).on('click', function(){
        menu.stop().slideToggle();
        $(this).stop().toggleClass(className);
      })
    });
    let menuFields = $('.page-catalog .services .content_left .views-exposed-form').find('.views-exposed-widget');
    menuFields.first().find('.panel-body').css('display', 'block');
    menuFields.first().find('.panel-heading').addClass(className);
  };

  clickableButton = function(element){
    element.each(function(){
      let button = $(this).find('.cata-card-button');
      button.on('click', function(){
        let link = $(this).parent().find('a');
        $(link)[0].click();
      });
    });
  };

  colorboxStyling = function(){
    $('#colorbox').addClass('cBoxModal');
  };  

  listHeadingStyling = function(element, className){
    element.each(function(){
      $(this).prev().addClass(className);
    });
  };

  mediaContainer = function(element){
    element.each(function() {
      if ($(this).find('img').length) {
        $(this).addClass('image-container');
      } else if($(this).find('iframe').length){
        $(this).addClass('iframe-container');
      };
  });

  leftVoidFixer = function(element, className){
    element.each(function(){
      let textHolder = $(this).find('.field-item');
      if(textHolder.children().length < 1){
        $(this).addClass(className);
      }
    });
  };

  clickableBlock = function(element){
    element.each(function(){
      $(this).on('click', function(){
        let link = $(this).find('a');
        $(link)[0].click();
      });
    });
  };

  classToggler = function(element, className){
    element.each(function(){
      let link = $(this).find('.accordion-toggle');
      link.on('click', function(){
        let panelItem = $(this).closest('.panel');
        panelItem.toggleClass(className);

        panelItem.siblings('.panel--active').each(function(){
          $(this).toggleClass(className);
        });
      });
    })
  };

  selectStyling = function(element){
    element.each(function(){
      $(this).on('click', function(){
        $(this).toggleClass('select--active');
      });
    }); 
  };

  modalCLoser = function(element, buttonMarkup){
    element.each(function(){
      $(this).append(buttonMarkup);
      let button = $(this).find('.jsModalCloser');
      button.on('click', function(){
        $(this).closest('.modal').css('display', 'none');
        $('.modal-backdrop').remove();
        $('body').toggleClass('modal-open');
      });
    });
  };

  langSwitcher = function(element, className){
    let list = element.find('ul');
    let ru = list.find('li:first');
    let en = list.find('li:last');
    if (window.location.href.indexOf("en") > -1){
      ru.removeClass(className);
      en.addClass(className);
    } else {
      en.removeClass(className);
      ru.addClass(className);
    };
  };

  listAdd = function(element){
    element.each(function(){
      $(this).attr("download", 'http://uralcem.rbbl.ru/sites/default/files/opr-list-uralcem.docx');
      $(this).attr('href', 'http://uralcem.rbbl.ru/sites/default/files/opr-list-uralcem.docx')
    });
  };

  catalogPopupTemporary = function(){
    let closer = function(){
      $('.catalog-notice').hide();
      $('body').removeClass('jsModalOpen');
      $('body').find('.jsModalOverlay').remove();
      $.cookie("popup-1", 1, { expires : 10 });
    };
    if(!$.cookie('popup-1')){
      if (window.location.href.indexOf("/catalog") > -1 && window.location.href.indexOf("/catalog?") < 1 && window.location.href.indexOf("/catalog/") < 1) {
        $('body').append('<div class="jsModalOverlay"><div>');
        $('.page-catalog').append('<div id="catalog-notice" class="catalog-notice"><div class="notice-closer"></div><div class="notice-item"><h2>Site is under construction</h2><p>You can find a complete list of products in the catalog</p><a class="btn btn-primary" href="/sites/default/files/pdfdocs/uralcem_catalog_en_compressed.pdf" target="_blank">Learn more</a></div></div>');
        $('body').addClass('jsModalOpen');

        $('.notice-closer').on('click', function(){
          closer();
        });
        $('.jsModalOverlay').on('click', function(){
          closer();
        });
      };
    };
  };

  galleryFormatterSwipe = function(){
    console.log('swipe?')
    function slider() {
      // Свайп слайдера
      var initialPoint;
      var finalPoint;
      var swipeSlide = document.querySelectorAll(".galleryformatter .gallery-slides li");
      for (let n = 0; n < swipeSlide.length; n++) {
        swipeSlide[n].addEventListener( "touchstart", function (event) {
            event.preventDefault();
            event.stopPropagation();
            initialPoint = event.changedTouches[0];
          },
          false
        );
        swipeSlide[n].addEventListener(
          "touchend",
          function (event) {
            event.preventDefault();
            event.stopPropagation();
            finalPoint = event.changedTouches[0];
            var xAbs = Math.abs(initialPoint.pageX - finalPoint.pageX);
            var yAbs = Math.abs(initialPoint.pageY - finalPoint.pageY);
            if (xAbs > 20 || yAbs > 20) {
              if (xAbs > yAbs) {
                if (finalPoint.pageX < initialPoint.pageX) {
                  /*СВАЙП ВЛЕВО*/
                  $(
                    ".gallery-slides a.prev-slide"
                  ).click();
                } else {
                  /*СВАЙП ВПРАВО*/
                  $(
                    ".gallery-slides a.next-slide"
                  ).click();
                }
              } else {
                if (finalPoint.pageY < initialPoint.pageY) {
                  /*СВАЙП ВВЕРХ*/
                } else {
                  /*СВАЙП ВНИЗ*/
                }
              }
            }
          },
          false
        );
      }
    }
    slider();
  };

  classGenerator = function(item, className){
    let newClassName = className;
    item.each(function(i){
      let generatedClassName = newClassName + [i];
      $(this).addClass(generatedClassName.toString());
    });
  };

  serviceLinks = function(element){
    element.each(function(i){
      $(this).append('<a class="link-invisible" href="/all-services?heading1-'+ i +'"></a>');
    });
  };

  serviceFocus = function(element){
    let locationData = window.location.href;
    element.each(function(){
      let $this = $(this);
      let dataId = $(this).attr('id');
      if(locationData.indexOf(dataId) > -1) {
        let thisId = '#'+dataId;
        $('html,body').animate({
          scrollTop: $(thisId).offset().top
        }, 4000);
        $this.click();
      }
    });
  };

  certsOpener = function(element, className){
    element.on('click', function(){
      $(this).stop().toggleClass(className);
      $(this).stop().next().slideToggle();
    });
  };

  oddFiltersHide = function(element){
    element.each(function(){
      $(this).children(':not(:first)').hide();
    });
  };

  anyFilter = function(element){
    let anyRu = '- Любой - ';
    element.each(function(){
      if ($(this).text().indexOf(anyRu) > -1) {
        $(this).text('ANY');
      };
    });
  };

  helpBlockEng = function(element){
    element.each(function(){
      $(this).html('More details');
    });
  };

  
  }

  $(document).ready(function() {
    sectionStyling($('.contact-page__form-text'), '.why_us', 'contact-page__form');

    oneHeightElements($('.services .view-services .view-content .views-row'));
    oneHeightElements($('.numbers .container .row'));
    oneHeightElements($('.page-catalog .owl-item'));

    elementHtmlFix($('.flexslider .flex-direction-nav .flex-nav-prev a'), '');
    elementHtmlFix($('.flexslider .flex-direction-nav .flex-nav-next a'), '');
    elementHtmlFix($('.owl-prev'), '');
    elementHtmlFix($('.owl-next'), '');
    elementHtmlFix($('.delimiter'), '>');
 
    emptyLineFixer($('p'));
    emptyLineFixer($('h2'));
    emptyLineFixer($('.numbers--right .row'));
    emptyLineFixer($('.numbers--left .row'));

    elementPlaceholderClear($('.form-item input'));
    sliderImgDivWrap($('.trush_n_rep .owl-item'));
    burgerDecoration($('.header--header_menu .header--navigation-button'), '.navbar-toggle', 'burger-decoration');

    lineBrRemoval($('.about_company--text p'));

    addAttr($('.ribbla-link'));
    focusParent($('#edit-submitted-kommentariy'));
    elementHtmlFix($('#edit-submitted-kommentariy'), "");
    clearAttr($('#edit-submitted-kommentariy'));
    /* parentAddClass($('form input')); */
    inputClear($('#edit-submitted-kommentariy'));

    fileInputStyling($('.form-managed-file'));
    customDocumentSelect($('.input-label'), $('.form-managed-file input'));
    
    screenScroller();
    /*
    scrollToSection($('.highlighted--left_button .btn'));
    */

    /*   Временно. Нужно поменять в админке.   */
    elementHtmlFix($('.competence .view-competence .flexslider .competence--left .views-field-field-file-link a'), "View the document");
    elementHtmlFix($('#edit-webform-ajax-submit-6'), 'Order a callback');
    addAttr($('.competence .view-competence .flexslider .competence--left .views-field-field-file-link a'))
    menuClose($('.navbar-collapse .leaf a'), $('.navbar-toggle'));

    sectionWrap($('.page-node-215 .services'), '<div class="bg-dark"></div>');
    appendMap($('.page-node-215 .services .node-page'), '<div class="contact-right"><div id="contacts-map" class="contacts-map"></div></div>');

    catalogStyling($('.page-catalog .services .content_right .view-catalog-all .view-content .views-row'), '<div class="catalog-card"></div>', '<div class="cata-card-button">More detailed</div>');
    elementHtmlFix($('.text-center .pagination .next a'), '');
    elementHtmlFix($('.text-center .pagination .prev a'), '');
    setPlaceholder($('.page-catalog .services .content_left .views-exposed-form .views-exposed-widget .form-type-textfield input'), 'What are you looking for?');
    sidebarItemOpener($('.page-catalog .services .content_left .views-exposed-form .views-exposed-widget .panel .panel-heading'), 'side-menu--expanded');
    clickableButton($('.page-catalog .services .content_right .view-catalog-all .view-content .views-row'));
    colorboxStyling();
    setPlaceholder($('.node-type-product form input'), '');
    listHeadingStyling($('.node-type-news ul'), 'list-heading');
    listHeadingStyling($('.node-type-news ol'), 'list-heading');
    mediaContainer($('p'));
    leftVoidFixer($('.node-type-news .ds-2col-stacked > .group-left'), 'news-desc-empty');
    clickableBlock($('.page-all-services .view-content .panel-group .panel-heading'));
    classToggler($('.page-all-services .view-content .panel-group .panel-heading'), 'panel--active');
    selectStyling($('.modal-content .form-type-select'));

    modalCLoser($('.modal-content'), '<div class="jsModalCloser"></div>');

    langSwitcher($('.header--language_switch'), 'lang--current');

    /*
    listAdd($('.node-type-product .group-right section.block-block a'));
    */

    catalogPopupTemporary();

    serviceLinks($('.services .view-services .view-content .views-row'));
    serviceFocus($('.page-all-services .view-content .panel-group .panel .panel-heading'));

    certsOpener($('.page-node-326 .quote_block-corrections .content-right h3'), 'certsOpened');
    oddFiltersHide($('.node-type-product .group-right .group-test .field .field-items'));

    anyFilter($('.page-catalog .services .content_left .views-exposed-form .views-exposed-widget .form-item label'));
    /* helpBlockEng($('form .help-block a')); */


    /* ENG ONLY */
    elementHtmlFix($('.page-catalog-search .page-header'), 'Search results');
    elementHtmlFix($('.node-type-product .group-right section.block-block a'), 'Download the questionnaire');
    elementHtmlFix($('.node-type-product .call-order-form a'), 'Order');

  });

})(jQuery);
