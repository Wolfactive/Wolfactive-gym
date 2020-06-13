jQuery(document).ready(function() {
  gandul();
  jQuery('#navBtn').click(function(){
    jQuery('#headerNavBar').toggleClass('active');
  });
})
/*Slick*/
$(document).ready(function(){
  $('.responsive').slick({
  infinite: false,
  speed: 300,
  slidesToShow: 4,
  slidesToScroll: 4,
  autoplay: true,
  autoplaySpeed: 3000,
  responsive: [
    {
      breakpoint: 1024,
      settings: {
        slidesToShow: 3,
        slidesToScroll: 3,
        infinite: true,
        dots: true
      }
    },
    {
      breakpoint: 600,
      settings: {
        slidesToShow: 2,
        slidesToScroll: 2
      }
    },
    {
      breakpoint: 480,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1
      }
    }
    // You can unslick at a given breakpoint now by adding:
    // settings: "unslick"
    // instead of a settings object
  ]
});
  $('.single-item').slick({
    autoplay: true,
    autoplaySpeed: 3000,
  });
})

$(window).scroll(function() {
    var scroll = $(window).scrollTop();
    if (scroll >= 50) {
        $(".main--background").addClass("scrolling");
    } else {
        $(".main--background").removeClass("scrolling");

    }
});

var menuContain = document.getElementById('menu-main-menu');
var menuItem = menuContain.getElementByClassName('menu-item');

for (var i = 0; i < menuItem.length; i++) {
  menuItem[i].addEventListener("click", function() {
  var current = document.getElementsByClassName("active");
  current[0].className = current[0].className.replace(" active", "");
  this.className += " active";
  });
}
