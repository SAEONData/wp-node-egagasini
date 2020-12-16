
/*
 Author:       SAEON
 Author URI:   http://ulwazi.saeon.ac.za
 License:      GNU General Public License v2 or later
 License URI:  http://www.gnu.org/licenses/gpl-2.0.html
  */
jQuery(document).ready(function($) {
    /* Scroll */
    $(window).scroll(function(){
        if($(this).scrollTop() > 150) {
            $('*[class*="saeon-header"]').removeClass('sn-noscroll');
            $('*[class*="saeon-header"]').addClass('sn-scrollnav');
            $('#saeon-more-scroll').fadeOut(300);
        }
        else{
            $('*[class*="saeon-header"]').addClass('sn-noscroll');
            $('*[class*="saeon-header"]').removeClass('sn-scrollnav');
            $('#saeon-more-scroll').fadeIn(300); 
        }
    });

    $.fn.saeonmenumaker = function(options) {
      var sncssmenu = $(this),
        settings = $.extend({
          format: "dropdown",
          sticky: false
        }, options);
      return this.each(function() {
        $(this).find(".sn-button").on('click', function() {
          $(this).toggleClass('sn-menu-opened');
          var mainmenu = $(this).next('ul');
          if (mainmenu.hasClass('sn-open')) {
            mainmenu.slideToggle().removeClass('sn-open');
          } else {
            mainmenu.slideToggle().addClass('sn-open');
            if (settings.format === "dropdown") {
              mainmenu.find('ul').show();
            }
          }
        });
        sncssmenu.find('li ul').parent().addClass('sn-has-sub');
        multiTg = function() {
          sncssmenu.find(".sn-has-sub").prepend('<span class="sn-submenu-button"></span>');
          sncssmenu.find('.sn-submenu-button').on('click', function() {
            $(this).toggleClass('sn-submenu-opened');
            if ($(this).siblings('ul').hasClass('sn-open')) {
              $(this).siblings('ul').removeClass('sn-open').slideToggle();
            } else {
              $(this).siblings('ul').addClass('sn-open').slideToggle();
            }
          });
        };
        if (settings.format === 'multitoggle') multiTg();
        else sncssmenu.addClass('dropdown');
        if (settings.sticky === true) sncssmenu.css('position', 'fixed');
        resizeFix = function() {
          var mediasize = 700;
          if ($(window).width() > mediasize) {
            sncssmenu.find('ul').show();
          }
          if ($(window).width() <= mediasize) {
            sncssmenu.find('ul').hide().removeClass('sn-open');
          }
        };
        resizeFix();
        return $(window).on('resize', resizeFix);
      });
    };


      $("#sn-cssmenu").saeonmenumaker({
        format: "multitoggle"
      });

});
