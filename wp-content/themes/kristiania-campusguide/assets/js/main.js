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



// The campus 3d model floor selector handling

// Toggle active-class on button/floor hover, toggle selected-class on hovered target element
$('#floor-buttons > button').hover(function() {

  // No hover on building
  if($(this).val() === 'building') {
    // do nothing
  }
  // Hover on everything else
  else {

    $('#floor-container').toggleClass('floor-active');

    var hoveredFloor = $(this).val();

    $('#' + hoveredFloor).toggleClass('selected').siblings().toggleClass('selected');

  }
});


$('#floor-container > a > img').hover(function() {

  $('#floor-container').toggleClass('floor-active');

  $(this).toggleClass('selected').siblings().toggleClass('selected');

})

// On floor- or button-click, fade out the 3d model and fade in the correct floor plan
$('.embed-responsive-item').click(function() {

  var floorContainer = document.getElementById('floor-container');

  $('#floor-container').fadeOut('slow');

  $('#floorplan-container').fadeIn('slow');

});

// On floor- or button-click, fade out the 3d model and fade in the correct floor plan
$('#floor-buttons button').click(function() {

  var clickedButton = $(this).val();

  $(this).addClass('btn-dark').removeClass('btn-secondary');
  $(this).siblings().addClass('btn-secondary').removeClass('btn-dark');

  var floorContainer = document.getElementById('floor-container');

  $('#floor-container').fadeOut('slow');

  $('#floorplan-container').fadeIn('slow');

  if(clickedButton === 'building') {

    $('#floor-container').fadeIn('slow');

    $('#floorplan-container').fadeOut('slow');

    $('#floorplan-container div').addClass('d-none');

  }
  else {

    $('#floor-'+clickedButton+'-svg').removeClass('d-none');
    $('#floor-'+clickedButton+'-svg').siblings().addClass('d-none');

  }


});
