var point = new google.maps.LatLng(49.17162533324087, -123.09657096862793);
var markers = [];
var iterator = 0;
var infowindow;
var map;

function initialize() {
  var mapOptions = {
    zoom: 8,
    center: point,
    mapTypeControl: true,
    panControl: true,
    panControlOptions: {
        position: google.maps.ControlPosition.BOTTOM_RIGHT
    },
    
    
  };
  map = new google.maps.Map(document.getElementById('container'), mapOptions);
  drawmarks();
}

function drawmarks() {
  var jl = json.listings.length;

  for (var i = 0; i < jl; i++) {

    var position = new google.maps.LatLng(json.listings[i].coordinates.lat, json.listings[i].coordinates.lon);
    var title = json.listings[i].office;
    var content = getContent(json.listings[i]);
    addMarker(position, title, content);
  }

}

function addMarker(position, title, content) {
  var marker = new google.maps.Marker({
    position: position,
    map: map,
    title: title,
    draggable: false,
    animation: google.maps.Animation.DROP,
    icon:'./images/icon.png'
  });
  	google.maps.event.addListener(marker, 'click', function() {
    		content.open(map,marker);
  	});  	
  markers.push(marker);

}

function getContent(obj) {
  var contentString1 = '<div class="dropdown theme-dropdown clearfix">'+
        '<a data-toggle="dropdown" class="sr-only dropdown-toggle" role="button" href="#" id="dropdownMenu1">Dropdown <span class="caret"></span></a>'+
        '<ul aria-labelledby="dropdownMenu1" role="menu" class="dropdown-menu map-dropdown-menu">'+
         ' <li role="presentation" class="active"><a href="#" tabindex="-1" role="menuitem">Action</a></li>'+
          '<li role="presentation"><a href="#" tabindex="-1" role="menuitem">Another action</a></li>'+
          '<li role="presentation"><a href="#" tabindex="-1" role="menuitem">Something else here</a></li>'+
          '<li class="divider" role="presentation"></li>'+
         ' <li role="presentation"><a href="#" tabindex="-1" role="menuitem">Separated link</a></li>'+
        '</ul>'+
     '</div>';
  var contentString2 = '<div class="dropdown theme-dropdown clearfix">'+
        '<ul aria-labelledby="dropdownMenu1" role="menu" class="dropdown-menu map-dropdown-menu">'+
         ' <li role="presentation" class="active"><a href="#" tabindex="-1" role="menuitem"><img src="'+obj.photo+'" witdh="100%" height="100%"></a></li>'+
          '<li role="presentation"><a href="#">'+obj.office+'</a></li>'+
          '<li role="presentation"><span>'+obj.address+'</span></li>'+
          '<li role="presentation"><span>'+obj.floor_area+' sqt</span></li>'+
         ' <li role="presentation"><span><strong>'+obj.price+'</strong></span></li>'+
        '</ul>'+
     '</div>';
  infowindow = new google.maps.InfoWindow({
    content: contentString2,
   // maxWidth: 200,
    disableAutoPan:true
  });
  return infowindow;
}
google.maps.event.addDomListener(window, 'load', initialize);
var t;
window.setTimeout(function(){
	google.maps.event.addListener(map, 'center_changed', function() {
   clearTimeout(t);
   t= window.setTimeout(function() {
       alert(map.getCenter());
    }, 1000);
  });
	},100);
 
