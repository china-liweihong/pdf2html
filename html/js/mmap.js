var map_type = "0";
var map_price = "0";
var map_room = "0";
var map_year = "0";
var map_list = "0";
var map_groundft = "0";
var searchHeight = 30;
var mapEventId = null;
var mapBlocks = null;
var mapCenter;
var mapisInit = true;
var mapzoom;
var _fullF = 0;
var _h = 0; //地图高度
var map = null;

$(function() {
//  var _width = $(window).width() - 190;
//  var _height = $(window).height() - _h;
  var _width = '100%';
  var _height = '100%';
  ﻿function getId(a) {
    return document.getElementById(a);
  };
  function defSize() {
    $("#map_content").parent("td").attr({
      "width": _width,
      "height": _height
    });
    $("#map_content").css({
      "width": _width,
      "height": _height
    });
    $("#map_loading").css({
      "width": _width,
      "height": _height,
      "paddingLeft": 190
    });
    $("#map_loading div:eq(0)").css({
      "marginTop": _height / 2 - 25
    });
  }
  //defSize();
  map = new Microsoft.Maps.Map(getId("map_content"), {
    credentials: "AmTWzEqQLzpRoJDEk1baCcxwZf-zfYJPgUAulfOEgL6t_Yr2eoow1NY3wbc0JE_a",
    enableClickableLogo: false,
    enableSearchLogo: false,
    mapTypeId: Microsoft.Maps.MapTypeId.road,
    center: new Microsoft.Maps.Location(49.2248, -123.0144),
    zoom: 13,
    width: _width,
    height: _height,
    showMapTypeSelector: false
  });
  mapCenter = map.getCenter();
  mapzoom = map.getZoom();
  mapEventId = Microsoft.Maps.Events.addHandler(map, "viewchangeend", mapChanged);

  $('.map_swi .icon1').click(function() {
    map.setMapType(Microsoft.Maps.MapTypeId.birdseye);
  });

  $('.map_swi .icon2').click(function() {
    map.setMapType(Microsoft.Maps.MapTypeId.road);
  });

  function sizeChange() {
    _width = $(window).width() - 190;
    _height = $(window).height() - _h;
    defSize();
    map.setOptions({
      width: document.body.offsetWidth,
      height: _height
    });
  }

  $(window).resize(function() {
    sizeChange();
  })

  $("#fullScreen").click(function() {
    if (!_fullF) {
      _fullF = 1;
      $(this).text("退出全屏");
      _h = 40;
      $(".header .top_main, .header .navigate ").slideUp(200);
      sizeChange();
      $('.map_swi').css('top', 41);
    } else {
      _fullF = 0;
      $(this).text("全屏显示");
      h = 190;
      $(".header .top_main, .header .navigate ").slideDown(200);
      sizeChange();
      $('.map_swi').css('top', 189);
    }
  })

  $("#sideChooseWrap").delegate("dd span", "click",
  function() {
    var _index = $(this).parents("dl").index();
    var _iNum = $(this).index();
    $(this).addClass("current").siblings().removeClass("current");
    switch (_index) {
    case 1:
      map_type = _iNum;
      break;
    case 2:
      map_price = _iNum;
      break;
    case 3:
      map_room = _iNum;
      break;
    case 4:
      map_year = _iNum;
      break;
    case 5:
      map_list = _iNum;
      break;
    case 6:
      map_groundft = _iNum;
    }
    mapisInit = true;
    mapChanged();
    $(this).siblings("p").find("input").val("");
  })

  $("#sideChooseWrap").delegate(".onTitle dd span", "click",
  function() {
    if ($(this).index() != 0) {
      $(this).parent("dd").siblings("dt").find("b").text($(this).text());
    } else {
      var t = $(this).parent("dd").siblings("dt").attr("title");
      $(this).parent("dd").siblings("dt").find("b").text(t);
    }
  })

  $("#priceBtn").click(function() {
    map_price = toInt($('#map_priceFrom').val()) + ',' + toInt($('#map_priceTo').val());
    $(this).parent("p").siblings().removeClass("current");
    mapisInit = true;
    mapChanged();
  });
   $("#yearBtn").click(function() {
    map_year = toInt($('#map_yearFrom').val()) + ',' + toInt($('#map_yearTo').val());
    var y = $('#map_yearFrom').val() + '-' + $('#map_yearTo').val();
    $(this).parent("p").siblings().removeClass("current").parent("dd").siblings("dt").find("b").text(y);
    mapisInit = true;
    mapChanged();
  })
});

function mapChanged() {
  if (Math.abs(map.getCenter().latitude - mapCenter.latitude) > 0.004 || Math.abs(map.getCenter().longitude - mapCenter.longitude) > 0.002 || mapisInit || mapzoom != map.getZoom()) {

    while (map.entities.getLength(0) > 0) {
      map.entities.removeAt(0);
    }
    Microsoft.Maps.Events.removeHandler(mapEventId);
    var _nw = map.getBounds().getNorthwest();
    var _se = map.getBounds().getSoutheast();
    var _bounds = _nw.latitude + "," + _nw.longitude + "," + _se.latitude + "," + _se.longitude;
    //getId("map_loading").style.display = "";

    // getData({ "bounds": _bounds, "type": map_type, "price": map_price, "room": map_room, "year": map_year, "list": map_list, "groundft": map_groundft }, "map.search", function () {
    //     mapChanged_CB(this);
    // })
    mapisInit = false;
    mapzoom = map.getZoom();
  }
}
function mapChanged_CB(s) {

  mapEventId = Microsoft.Maps.Events.addHandler(map, 'viewchangeend', mapChanged);
  mapCenter = map.getCenter();
  getId("map_loading").style.display = "none";

  var ss = s.split(",");
  if (parseInt(ss[0]) == -1) {
    var _infoBox = new Microsoft.Maps.Infobox(map.getCenter(), {
      showPointer: false,
      title: "房源数据获取完成",
      description: ss[1],
      width: 240,
      height: 120
    });
    map.entities.push(_infoBox);
  } else if (parseInt(ss[0]) > 50) {
    mapBlocks = new Array();
    for (i = 1; i < ss.length; i++) {
      var sss = ss[i].split(":");

      var _lat = parseFloat(sss[0]) + (parseFloat(sss[2]) - parseFloat(sss[0])) / 2;
      var _lng = parseFloat(sss[1]) + (parseFloat(sss[3]) - parseFloat(sss[1])) / 2;
      var _infoBox = new Microsoft.Maps.Infobox(new Microsoft.Maps.Location(_lat, _lng), {
        showCloseButton: false,
        title: ("<a href=\"#\" onclick=\"onMapBlockClick(" + _lat + "," + _lng + ");return false;\">此区域有房源 " + sss[4] + " 套</a>"),
        width: 200,
        height: 35
      });
      mapBlocks.push([new Microsoft.Maps.Location(parseFloat(sss[0]), parseFloat(sss[1])), new Microsoft.Maps.Location(parseFloat(sss[0]), parseFloat(sss[3])), new Microsoft.Maps.Location(parseFloat(sss[2]), parseFloat(sss[3])), new Microsoft.Maps.Location(parseFloat(sss[2]), parseFloat(sss[1])), new Microsoft.Maps.Location(parseFloat(sss[0]), parseFloat(sss[1]))]);

      Microsoft.Maps.Events.addHandler(_infoBox, "mouseenter", onMapBlockEnter);
      Microsoft.Maps.Events.addHandler(_infoBox, "mouseleave", onMapBlockLeave);
      map.entities.push(_infoBox);
    }
  } else if (parseInt(ss[0]) == 0) {
    var _infoBox = new Microsoft.Maps.Infobox(map.getCenter(), {
      showPointer: false,
      title: "地图提示",
      description: "此区域没找到房源，请拖移或缩放地图查看！<a href=\"#\" onclick=\"map.setView({zoom:(map.getZoom()-1)});return false;\">点击这里直接缩小</a>",
      width: 240,
      height: 120
    });
    map.entities.push(_infoBox);
  } else {
    for (var i = 1; i < ss.length; i++) {
      var sss = ss[i].split(':');
      var options = {
        icon: '',
        width: 0,
        height: 0,
        title: ''
      };
      switch (sss[2]) {
      case 'house':
        options.icon = '/_images/map_house.png';
        options.width = 36;
        options.height = 24;
        options.title = '别墅';
        break;
      case 'aptu':
        options.icon = '/_images/map_aptu.png';
        options.width = 38;
        options.height = 36;
        options.title = '公寓';
        break;
      case 'twn':
        options.icon = '/_images/map_twn.png';
        options.width = 43;
        options.height = 32;
        options.title = '联排';
        break;
      }
      var sssp = new Microsoft.Maps.Pushpin(new Microsoft.Maps.Location(parseFloat(sss[0]), parseFloat(sss[1])), options);
      Microsoft.Maps.Events.addHandler(sssp, "click", onMapHouseClick);
      map.entities.push(sssp);
    }
  }
}
function onMapBlockEnter(e) {
  for (var i = 0; i < map.entities.getLength(0); i++) {
    if (map.entities.get(i) == e.target) {
      var _polygon = new Microsoft.Maps.Polygon(mapBlocks[i], {
        fillColor: new Microsoft.Maps.Color(50, 200, 215, 185),
        strokeColor: new Microsoft.Maps.Color(200, 200, 215, 185)
      });
      map.entities.push(_polygon);
      break;
    }
  }
}
function onMapBlockLeave(e) {
  for (var i = map.entities.getLength(0) - 1; i >= 0; i--) {
    if (map.entities.get(i).toString() == "[Polygon]") {
      map.entities.removeAt(i);
    }
  }
}
function onMapBlockClick(_lat, _lng) {
  mapisInit = true;
  map.setView({
    zoom: (map.getZoom() + 1),
    center: new Microsoft.Maps.Location(_lat, _lng)
  });
}
function onMapHouseClick(e) {
  var iconT = e.target._icon.toString().match(/_(\w+)\./)[1];
  if (map.entities.get(map.entities.getLength(0) - 1).toString() == "[Infobox]") {
    map.entities.removeAt(map.entities.getLength(0) - 1);
  }
  var loc = e.target.getLocation();
  var _infoBox = new Microsoft.Maps.Infobox(loc, {
    zIndex: 5,
    visible: true,
    showCloseButton: false,
    width: 250,
    height: 35,
    zIndex: 10000,
    title: "正在加载房源数据，请稍候..."
  });
  _infoBox.setLocation(loc);
  var buffer = 50;
  var _infoBoxOffset = _infoBox.getOffset();
  var _infoBoxAnchor = _infoBox.getAnchor();
  var _infoBoxLocation = map.tryLocationToPixel(loc, Microsoft.Maps.PixelReference.control);
  var dx = _infoBoxLocation.x + _infoBoxOffset.x - _infoBoxAnchor.x;
  var dy = _infoBoxLocation.y - 50 - _infoBoxAnchor.y;
  if (dy < buffer) {
    dy *= -1;
    dy += buffer;
  } else {
    dy = 0;
  }
  if (dx < buffer) {
    dx *= -1;
    dx += buffer;
  } else {
    dx = map.getWidth() - _infoBoxLocation.x + _infoBoxLocation.x - _infoBox.getWidth();
    if (dx > buffer) {
      dx = 0;
    } else {
      dx -= buffer;
    }
  }
  if (dx != 0 || dy != 0) {
    map.setView({
      centerOffset: new Microsoft.Maps.Point(dx, dy),
      center: map.getCenter()
    });
  }

  map.entities.push(_infoBox);

  getData({
    "lat": loc.latitude,
    "lng": loc.longitude,
    icon: iconT,
    "type": map_type,
    "price": map_price,
    "room": map_room,
    "year": map_year,
    "list": map_list,
    "groundft": map_groundft
  },
  "map.detail",
  function() {
    onMapHouseClick_CB(this);
  },
  function() {
    showMsgCommon("服务器压力大，请稍后重试！", 3000);
  });
}
function onMapHouseClick_CB(s) {
  var ss = s.split(',');
  var _infoBox;

  if (map.entities.getLength(0) > 0 && map.entities.get(map.entities.getLength(0) - 1).toString() == "[Infobox]") {
    _infoBox = map.entities.get(map.entities.getLength(0) - 1);

    _infoBox.setOptions({
      zIndex: 5,
      visible: true,
      showCloseButton: true,
      width: 380,
      height: 150,
      title: unescape(ss[0]).replace(/\+/g, " "),
      description: unescape(ss[1]).replace(/\+/g, " ")
    });
  }
}
function map_house_prev(total) {
  var $dom = $('#mapcrt');
  var page = parseInt($dom.text()) - 1;
  if (page < 1) page = total;
  for (var i = 1; i <= total; i++) {
    getId('tableHouse' + i).style.display = i == page ? 'block': 'none';
  }
  $dom.text(page);
}
function map_house_next(total) {
  var $dom = $('#mapcrt');
  var page = parseInt($dom.text()) + 1;
  if (page > total) page = 1;
  for (var i = 1; i <= total; i++) {
    getId('tableHouse' + i).style.display = i == page ? 'block': 'none';
  }
  $dom.text(page);
}

