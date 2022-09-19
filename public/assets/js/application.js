$(document).ready(function(){
    $('#message_table').DataTable();
});

// Initialize and add the map
function initMap() {
    // The location of Uluru
    const shop = { lat: 43.579543, lng: 7.120698 };
    // The map, centered at Uluru
    const map = new google.maps.Map(document.getElementById("map"), {
      zoom: 17,
      center: shop,
    });
    // The marker, positioned at Uluru
    const marker = new google.maps.Marker({
      position: shop,
      map: map,
    });
  }
  
  window.initMap = initMap;