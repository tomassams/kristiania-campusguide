// The carousel slider
$(document).ready(function(){
  $('.slide-container').slick({
  slidesToShow: 1,
  slidesToScroll: 1,
  autoplay: true,
  autoplaySpeed: 3000,
  arrows: false,
  infinite: true,
  fade: true,
  speed: 500,
});
});

// Makes sure the campus we are on is selected in the dropdown by default
  $('#end option').filter(function() { 
    return ($(this).text() == campusName);
}).prop('selected', true);