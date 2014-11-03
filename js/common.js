/**
*	css js 懒加载
*/
function loadCssAndJs(e, d) {
  var fun=arguments[2]?arguments[2]:null; 
  var controller=arguments[3]?arguments[3]:null; 
  var f = "";
  if (d == "js") {
    f = document.createElement("script");
    f.setAttribute("type", "text/javascript");
    f.setAttribute("src", e)
  } else {
    if (d == "css") {
      f = document.createElement("link");
      f.setAttribute("rel", "stylesheet");
      f.setAttribute("type", "text/css");
      f.setAttribute("href", e)
    }
  }
  if (typeof f != "undefined") {
    document.getElementsByTagName("head")[0].appendChild(f);
  }
};

/**
*   ajax function
*/
var ajaxdata = "";
function ajaxCity(url,dataType,data,fun)
{
	
	var url = httpUrl+"/ajax/"+url;
	$.ajax({
		   url:url,
		   data:data,
		   dataType:'json',
		   type: "POST",
		   success:function(obj){
			    if(obj)
				{
					reloadselectdata(obj,'select_Community');
				}
			}
	});
}

/**
*	重新加载数据
*/

function reloadselectdata(result,id)
{
	$("#"+id +" li").remove();
	$.each(result,function(i,v){
		$("#"+id).append('<li data="'+v.code+'" data-name="'+v.data_name+'"><a href="javascript:void(0);">'+v.data_name+'</a></li>');
	});	
	funall('bindCommunity');
}
function bindCommunity()
{
	$("#select_Community li").live("click",function(){
		var select_city_code = $(this).attr("data");
		var select_city_name = $(this).attr("data-name");
		$("#Community_label").text(select_city_name);
		$("#community").val(select_city_code);
		var data = "code="+select_city_code;
		
	});
}
function bindSearch()
{
	
}
function funall(name)
{
	if(name == 'ajaxCommunity')
		ajaxCommunity();
	else if(name == 'bindCommunity')
		bindCommunity();
	else if(name == 'bindsearch')
		bindSearch();
}
