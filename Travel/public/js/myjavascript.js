window.onscroll = function() {scrollFunction()};

function scrollFunction() {
    if (document.body.scrollTop > 58 || document.documentElement.scrollTop > 58) {
        $("#backtotop").attr("style", "display:block");
    } else {
        $("#backtotop").attr("style", "display:none");
    }
    

}

$(document).ready(function(){
  // Add smooth scrolling to all links
  $("a").on('click', function(event) {

    // Make sure this.hash has a value before overriding default behavior
    if (this.hash !== "") {
      // Prevent default anchor click behavior
      event.preventDefault();

      // Store hash
      var hash = this.hash;

      // Using jQuery's animate() method to add smooth page scroll
      // The optional number (800) specifies the number of milliseconds it takes to scroll to the specified area
      $('html, body').animate({
        scrollTop: $(hash).offset().top
      }, 1000, function(){
   
        // Add hash (#) to URL when done scrolling (default click behavior)
        window.location.hash = hash;
      });
    } // End if
  });
  $(".loginpopup").click(function(e){
      $(".login_register_popup").addClass('opened');
      $("#login").toggle('800');
      $(".fa-times").show();
      $(".loginpopup").hide();
      if($(".login_register_popup").hasClass('opened')){
         $(".loginpopup").removeClass('fa-user-plus');
      }

  });
  $(".fa-times").click(function(){
      $("#login").hide('800');
      $(".fa-times").hide();
      $(".login_register_popup").removeClass('opened');
      $(".loginpopup").show();
      $("#register").hide('800');
      $("#forgot").hide('800');
  });
    $('body').click(function(evt){    
         if(evt.target.id == "body_close")
            return;
         //For descendants of menu_content being clicked, remove this check if you do not want to put constraint on descendants.
         if($(evt.target).closest('#body_close').length)
            return;             

        //Do processing of click event here for every element except with id menu_content
        $("#login").hide('800');
        $(".fa-times").hide();
        $(".login_register_popup").removeClass('opened');
        $(".loginpopup").show();
         $("#register").hide('800');
          $("#forgot").hide('800');
    });
    $('#register_button').click(function(e){  
    e.preventDefault();  
         $("#login").hide();
         $("#register").show();

    });
    $('.forgot_password').click(function(e){  
    e.preventDefault();  
         $("#login").hide();
         $("#forgot").show();
    });
    $('#footer_nav').click(function(e){
        $("html, body").animate({ scrollTop: $("#contact").offset().top }, 800);
        return true;
    });
});
