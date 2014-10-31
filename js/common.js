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
		   data:"{"+data+"}",
		   dataType:dataType,
		   type: "POST",
		   success:function(obj){
			    if(obj)
				{
					$("#select_Community").remove();
					$.each(obj,function(k,v){
									alert(k+" "+v);
						});
					
				}
			}
	});
}

/**
*	重新加载数据
*/
function reloadselectdata()
{
	alert(ajaxdata);
}