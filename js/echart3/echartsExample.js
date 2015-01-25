var myChart,myChart2;
var domMain = document.getElementById('housingtypes');
var domMain2 = document.getElementById('AGEDISTRIBUTION');
var hash = 'red';
var curTheme;
function requireCallback(ec, defaultTheme) {
  echarts = ec;
  refresh();
  refresh2();
  window.onresize = myChart.resize;
}

function refresh() {
  myChart = echarts.init(domMain, curTheme);
  window.onresize = myChart.resize; 
  myChart.setOption(housingtypes_option, true)
}
function refresh2() {
  myChart2 = echarts.init(domMain2, curTheme);
  window.onresize = myChart2.resize; 
  myChart2.setOption(AGEDISTRIBUTION_option, true)
}

var echarts;
// for echarts online home page
var fileLocation = './js/echart/echarts';
require.config({
  paths: {
    echarts: fileLocation,
    'echarts/chart/line': fileLocation,
    'echarts/chart/bar': fileLocation,
    'echarts/chart/scatter': fileLocation,
    'echarts/chart/k': fileLocation,
    'echarts/chart/pie': fileLocation,
    'echarts/chart/radar': fileLocation,
    'echarts/chart/map': fileLocation,
    'echarts/chart/chord': fileLocation,
    'echarts/chart/force': fileLocation,
    'echarts/chart/gauge': fileLocation,
    'echarts/chart/funnel': fileLocation
  }
});

// 按需加载
require(['echarts', 'js/echart/theme/' + hash, 'echarts/chart/line', 'echarts/chart/bar', 'echarts/chart/scatter', 'echarts/chart/k', 'echarts/chart/pie', 'echarts/chart/radar', 'echarts/chart/force', 'echarts/chart/chord', 'echarts/chart/gauge', 'echarts/chart/funnel', 'echarts'], requireCallback);