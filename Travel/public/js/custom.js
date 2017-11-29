/* HTML document is loaded. DOM is ready.
-------------------------------------------*/
$(function(){

    /* start typed element */
    //http://stackoverflow.com/questions/24874797/select-div-title-text-and-make-array-with-jquery
    var subElementArray = $.map($('.sub-element'), function(el) { return $(el).text(); });    
    $(".element").typed({
        strings: subElementArray,
        typeSpeed: 20,
        contentType: 'html',
        showCursor: false,
        loop: 0,
        loopCount: 1,
    });
      var typedMainContent = $.map($('.main-content-element'), function(el) { return $(el).text(); });    
    $(".main-content").typed({
        strings: subElementArray,
        typeSpeed: 100,
        contentType: 'html',
        showCursor: false,
        loop: true,
        loopCount: true,
    });
    /* end typed element */

    /* Smooth scroll and Scroll spy (https://github.com/ChrisWojcik/single-page-nav)    
    ---------------------------------------------------------------------------------*/ 
    $('.templatemo-nav').singlePageNav({
        offset: $(".templatemo-nav").height(),
        filter: ':not(.external)',
        updateHash: false,
        speed:800
    });

    /* start navigation top js*/
    // $(window).scroll(function(){
    //     if($(this).scrollTop()>58){
    //        $(".templatemo-nav").addClass("sticky animated slideInDown");
    //     }
    //     else{
    //         $(".templatemo-nav").removeClass("animated slideInDown");
    //     }
    // });

    
    /* Hide mobile menu after clicking on a link
    -----------------------------------------------*/
    $('.navbar-collapse a').click(function(){
        $(".navbar-collapse").collapse('hide');
    });
    /* end navigation top js */

    $('body').bind('touchstart', function() {});

    /* wow
    -----------------*/
    new WOW().init();
});

/* start preloader */
$(window).load(function(){
	$('.preloader').fadeOut(1000); // set duration in brackets    
});
/* end preloader */

/*check if the device is mobile*/
var isMobile = {
    Android: function() {
        return navigator.userAgent.match(/Android/i);
    },
    BlackBerry: function() {
        return navigator.userAgent.match(/BlackBerry/i);
    },
    iOS: function() {
        return navigator.userAgent.match(/iPhone|iPad|iPod/i);
    },
    Opera: function() {
        return navigator.userAgent.match(/Opera Mini/i);
    },
    Windows: function() {
        return navigator.userAgent.match(/IEMobile/i) || navigator.userAgent.match(/WPDesktop/i);
    },
    any: function() {
        return (isMobile.Android() || isMobile.BlackBerry() || isMobile.iOS() || isMobile.Opera() || isMobile.Windows());
    }
};
/*end isMobile*/

/*Show/Hide nav on scroll if isMobile is set on false*/
if(!isMobile.any()){
    var didScroll;
    var lastScrollTop = 0;
    var delta = 5;
    var navbarHeight = $('.templatemo-nav').outerHeight();

    $(window).scroll(function(event){
        didScroll = true;
    });

    setInterval(function() {
        if (didScroll) {
            hasScrolled();
            didScroll = false;
        }
    }, 250);

    function hasScrolled() {
        var st = $(this).scrollTop();
        
        // Make sure they scroll more than delta
        if(Math.abs(lastScrollTop - st) <= delta)
            return;
        
        // If they scrolled down and are past the navbar, add class .nav-up.
        // This is necessary so you never see what is "behind" the navbar.
        if (st > lastScrollTop && st > navbarHeight){
            // Scroll Down
            $('.templatemo-nav').removeClass('sticky animated slideInDown');
        } else {
            // Scroll Up
            if(st + $(window).height() < $(document).height()) {
                $('.templatemo-nav').addClass('sticky animated slideInDown');
                
            }
        }
        
        lastScrollTop = st;
    }
}
/*end show/hide nav on scroll*/