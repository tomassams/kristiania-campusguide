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

  $('#floor-container > a > img').hover(function() {

    $('#floor-container').toggleClass('floor-active');

    $(this).toggleClass('selected').siblings().toggleClass('selected');
})

$('#floor-buttons > button').hover(function() {

        $('#floor-container').toggleClass('floor-active');

        var hoveredFloor = $(this).val();

        $('#' + hoveredFloor).toggleClass('selected').siblings().toggleClass('selected');

    });




  $('.embed-responsive-item').click(function() {

    console.log('floor clicked');

    var floorContainer = document.getElementById('floor-container');

    $('#floor-container').fadeOut('slow');

    $('#floorplan-container').fadeIn('slow');

  });
