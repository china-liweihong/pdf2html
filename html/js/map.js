var point = new google.maps.LatLng(49.17162533324087, -123.09657096862793);
var markers = [];
var iterator = 0;
var infowindow;
var map;

function initialize() {
  var mapOptions = {
    zoom: 8,
    center: point,
    panControl: false,
    streetViewControl: false,
    mapTypeControl: false,
    zoomControl: true,
    zoomControlOptions: {
        style: google.maps.ZoomControlStyle.SMALL,
        position: google.maps.ControlPosition.RIGHT_BOTTOM
    },
  };
  map = new google.maps.Map(document.getElementById('container'), mapOptions);
  
  
  //加载地图图表div
  var homeControlDiv = document.createElement('div');
  var homeControl = new HomeControl(homeControlDiv, map, point,1);

  homeControlDiv.index = 1;
  map.controls[google.maps.ControlPosition.BOTTOM_RIGHT].push(homeControlDiv);
  
 
  
  //加载右侧控制器
  drawcontroller(map);  
  
 

  
  drawmarks();
  
   //缓加载图表数据
  setTimeout(function(){
  	initPieChart();
  	drawpie();
  },1000);
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
     //  alert(map.getCenter());
    }, 1000);
  });
},100);



HomeControl.prototype.home_ = null;

// Define setters and getters for this property
HomeControl.prototype.getHome = function() {
  return this.home_;
}

HomeControl.prototype.setHome = function(home) {
  this.home_ = home;
}

/** @constructor */
function HomeControl(controlDiv, map, home,op) {

  // We set up a variable for this since we're adding
  // event listeners later.
  var control = this;

  // Set the home property upon construction
  control.home_ = home;

  // Set CSS styles for the DIV containing the control
  // Setting padding to 5 px will offset the control
  // from the edge of the map
  controlDiv.style.padding = '5px';

if(op == 1)
{
	// Set CSS for the control border
  var goHomeUI = document.createElement('div');
  goHomeUI.style.backgroundColor = 'white';
  goHomeUI.style.borderStyle = 'solid';
  goHomeUI.style.borderWidth = '2px';
  goHomeUI.style.cursor = 'pointer';
  goHomeUI.style.top = '10px';
  goHomeUI.style.textAlign = 'center';
  goHomeUI.title = 'Click to set the map to Home';
  controlDiv.appendChild(goHomeUI);

  // Set CSS for the control interior
  var goHomeText = document.createElement('div');
  goHomeText.style.fontFamily = 'Arial,sans-serif';
  goHomeText.style.fontSize = '12px';
  goHomeText.style.paddingLeft = '4px';
  goHomeText.style.paddingRight = '4px';
  goHomeText.innerHTML = '<div class="container">'+
  					 '<div class="dark"><div class="chart"><div id="chart1" class="jqplot-target" ></div></div>'+
                '<div class="chart">'+
                '<div style="width: 110px; height: 110px; line-height: 110px;" class="percentage-light easyPieChart" data-percent="95"><span>95</span>%<canvas width="110" height="110"></canvas></div>'+
                '</div><div class="chart">'+
				    '<div style="width: 110px; height: 110px; line-height: 110px;" class="percentage-light easyPieChart" data-percent="45"><span>45</span>%<canvas width="110" height="110"></canvas></div>'+
                '</div><div style="clear:both;"></div></div></div>';
  goHomeUI.appendChild(goHomeText);
  
   // Setup the click event listener for Home:
  // simply set the map to the control's current home property.
  google.maps.event.addDomListener(goHomeUI, 'click', function() {
    var currentHome = control.getHome();
    map.setCenter(currentHome);
  });
}else if(op == 2)
{
  // Set CSS for the setHome control border
  var setHomeUI = document.createElement('div');
  setHomeUI.style.backgroundColor = 'white';
  setHomeUI.style.borderStyle = 'solid';
  setHomeUI.style.borderWidth = '2px';
  setHomeUI.style.cursor = 'pointer';
  setHomeUI.style.textAlign = '<div class="label">控制器</div>';
  setHomeUI.title = 'Click to set Home to the current center';
  controlDiv.appendChild(setHomeUI);

  // Set CSS for the control interior
  var setHomeText = document.createElement('div');
  setHomeText.style.fontFamily = 'Arial,sans-serif';
  setHomeText.style.fontSize = '12px';
  setHomeText.style.paddingLeft = '4px';
  setHomeText.style.paddingRight = '4px';
  setHomeText.innerHTML = '<div class="label">控制器</div>';
  setHomeUI.appendChild(setHomeText);

 

  // Setup the click event listener for Set Home:
  // Set the control's home to the current Map center.
  google.maps.event.addDomListener(setHomeUI, 'click', function() {
    var newHome = map.getCenter();
    control.setHome(newHome);
  });
  }
}


/**
*	加载图表方法
*/

var initPieChart = function() {
		$('.percentage-light').easyPieChart({
			barColor: function(percent) {
				percent /= 100;
				return "rgb(" + Math.round(255 * (1-percent)) + ", " + Math.round(255 * percent) + ", 0)";
			},
			trackColor: '#666',
			scaleColor: false,
			lineCap: 'butt',
			lineWidth: 15,
			animate: 1000,
			easing: 'easeOutBounce'
		});	
};
	
/**
*	加载图表方法
*/
var drawpie = function() {
	 var data = [
    ['Heavy Industry', 12],['Retail', 9], ['Light Industry', 14]
  ];
  var plot1 = jQuery.jqplot ('chart1', [data], 
    { 
      seriesDefaults: {
        // Make this a pie chart.
        renderer: jQuery.jqplot.PieRenderer, 
        rendererOptions: {
          // Put data labels on the pie slices.
          // By default, labels show the percentage of the slice.
          showDataLabels: true,
		  diameter:100,
        }
      }, 
      legend: { show:false, location: 'e',  xoffset: 120 },
	  borderWidth: 2.0,  
	 grid: {  
	 		background: '#fff' ,
			shadowAlpha: 0.07,
			borderWidth: 0,
			shadow: false,
		} ,
	shadowAlpha:0.01,
	gridPadding: {top:0, bottom:0, left:0, right:0},      
    }
  );
}
var drawingManager;
var drawcontroller = function(map)
{
	 drawingManager = new google.maps.drawing.DrawingManager({
    drawingMode: google.maps.drawing.OverlayType.POLYLINE,
    drawingControl: true,
    drawingControlOptions: {
      position: google.maps.ControlPosition.RIGHT_CENTER,
      drawingModes: [
        google.maps.drawing.OverlayType.POLYGON,
        google.maps.drawing.OverlayType.POLYLINE,
        google.maps.drawing.OverlayType.RECTANGLE
      ]
    },
    circleOptions: {
      fillColor: '#ffff00',
      fillOpacity: 1,
      strokeWeight: 5,
      clickable: false,
      editable: true,
      zIndex: 1
    }
  });
drawingManager.setMap(map);
}
