function getId(a) {
    return document.getElementById(a)
}

function getCookie(a) {
    var d, e, b = document.cookie,
	c = b.split("; ");
    for (d = 0; d < c.length; d++) if (e = c[d].split("="), e[0] == a) return e[1];
    return ""
}
function delCookie(a) {
    var b = new Date;
    b.setTime(b.getTime() - 1e4),
	document.cookie = a + "=a; expires=" + b.toGMTString()
}
function DropShow(obj, callback) {
    function hideCont() {
        obj.btn.removeClass("current"),
		obj.cont.hide(0)
    }
    if (obj.showWay = obj.showWay || "fadeIn", !obj.btn || !obj.cont) return !1;
    var delayF, delayA = null;
    obj.btn.bind(obj.way || "click",
	function () {
	    clearTimeout(delayF),
		delayA = setTimeout(function () {
		    obj.btn.addClass("current"),
			eval("obj.cont." + obj.showWay + "(obj.dtime||300)")
		},
		obj.delay || 0)
	}),
	obj.btn.mouseout(function () {
	    clearTimeout(delayA),
		delayF = setTimeout(function () {
		    hideCont()
		},
		obj.delay || 0)
	}),
	obj.cont.mouseover(function () {
	    clearTimeout(delayF)
	}),
	obj.cont.mouseout(function () {
	    delayF = setTimeout(function () {
	        hideCont()
	    },
		obj.delay || 0)
	}),
	callback && callback.call(obj)
}
function SwitchTab(obj, callback) {
    return obj.showWay = obj.showWay || "fadeIn",
	obj.menus && obj.conts ? (obj.menus.each(function (index, domEle) {
	    $(domEle).bind(obj.way || "click",
		function () {
		    $(this).addClass("current").siblings().removeClass("current"),
			obj.conts.hide(0),
			eval("obj.conts.eq(index)." + obj.showWay + "(obj.dtime||0)")
		}),
		callback && callback.call(obj)
	}), void 0) : !1
}
function getData(a, b, c, d) {
	
    $.ajax({
        type: "POST",
        url: "http://www.vanfun.net/_.aspx?" + b,
        data: a,
        success: function (a) {
            c.call(a)
        },
        error: function () {
            return d ? (d(), void 0) : !1
        }
    })
}
function vanPop(a) {
    function d() {
        "animate" == a.way && a.domObj.stop().animate({
            top: -1e3,
            left: -1e3
        },
		300,
		function () {
		    a.domObj.hide(0)
		}),
		"fade" == a.way && a.domObj.fadeOut(100),
		$("#maskShadow").fadeOut(100)
    }
    var b = -a.domObj.outerWidth() / 2 || 0,
	c = -a.domObj.outerHeight() / 2 || 0;
    a.domObj.css({
        position: "fixed",
        "z-index": 11
    }),
	a.mask && !$("#maskShadow").length ? $("body").append("<div id='maskShadow' class='maskShadow'></div>") : $("#maskShadow").fadeIn(100),
	"animate" == a.way && a.domObj.stop().show(0).css({
	    marginLeft: b,
	    marginTop: c
	}).animate({
	    top: "50%",
	    left: "50%"
	},
	300,
	function () {
	    a.callback && a.callback.call(a)
	}),
	"fade" == a.way && a.domObj.stop().hide(0).css({
	    marginLeft: b,
	    marginTop: c
	}).animate({
	    top: "50%",
	    left: "50%"
	},
	0,
	function () {
	    $(this).fadeIn(200),
		a.callback && a.callback.call(a)
	}),
	a.domObj.find(".close").click(function () {
	    d()
	}),
	$("body").delegate("#maskShadow", "click",
	function () {
	    d()
	})
}
function showMsgCommon(a, b) {
    function f() {
        d = setTimeout(function () {
            c.fadeOut(500)
        },
		e)
    }
    function g() {
        c.html(a),
		c.slideDown(300,
		function () {
		    f()
		})
    }
    var c = $("#commonMsg"),
	d = null,
	e = b || 5e3;
    a = a,
	$("html").delegate("#commonMsg", "mouseenter",
	function () {
	    clearTimeout(d)
	}),
	$("html").delegate("#commonMsg", "mouseleave",
	function () {
	    f()
	}),
	c.length ? g() : ($("body").append("<div id='commonMsg' class='commonMsg'></div>"), c = $("#commonMsg"), g())
}
var checkForm, ua = navigator.userAgent,
browserTest = {
    version: (ua.match(/.+(?:rv|it|ra|ie|me)[\/: ]([\d.]+)/i) || [])[1],
    ie: /msie/i.test(ua) && !/opera/i.test(ua),
    op: /opera/i.test(ua),
    sa: /version.*safari/i.test(ua),
    ch: /chrome/.test(ua),
    ff: /gecko/i.test(ua) && !/webkit/i.test(ua),
    wk: /webkit/i.test(ua),
    mz: /mozilla/i.test(ua) && !/(compatible|webkit)/i.test(ua),
    ipad: /ipad/i.test(ua),
    iphone: /iphone/i.test(ua)
},
lastPageUrl = document.referrer;
$(function () {
    $("#searchText").focus(function () {
        if ($(this).val() == '输入MLS编号或门牌号和街道名称，用空格隔开') {
            $(this).addClass("current").val("");
        }
    }).blur(function () {
        "" == $(this).val() ? $(this).val("输入MLS编号或门牌号和街道名称，用空格隔开") : $(this).val(),
		$(this).removeClass("current")
    }),
	$("#searchType").mouseover(function () {
	    $(this).addClass("current")
	}),
	$("#searchType").click(function () {
	    $(this).addClass("current")
	}).mouseleave(function () {
	    $(this).removeClass("current")
	}),
	$("#searchType").delegate("dd:eq(1)", "click",
	function () {
	    return $("#searchType").prepend($(this)),
		$("#searchType").removeClass("current"),
		!1
	}),
	$("#searchBtn").click(function () {
	    var txtReg = /^[a-zA-Z0-9]+$/;
	    var c, a = $("#searchText").val(),
		b = $("#searchType dd").eq(0).attr("class");
	    if (b == "s2" && !txtReg.test(a)) {
	        return showMsgCommon("地址查询只能输入字母和数字，不能包含特殊符号！，需要更详细信息请联系我们客服！", 2e3)
	    }
	    return "输入MLS编号或门牌号和街道名称，用空格隔开" == a ? (showMsgCommon("请输入查询内容", 2e3), !1) : ("s1" == b ? getData("no=" + a, "search.mls",
		function () {
		    if ("1" == this.substr(0, 1)) {
		        window.location.href = "/house-" + encodeURIComponent(this.substr(2)) + ".aspx";
		    } else {
		        showMsgCommon("找不到该房源，可能已经卖掉了，请联系客服邮箱cs@vanfun.com");
		    }
		},
		function () {
		    showMsgCommon("服务器压力大有木有！请重试。", 5e3)
		}) : "s2" == b && (-1 == a.indexOf(",") ? window.location.href = "/house-0-0-0-0-0-0-0-" + a + "-0-0-1-0-0-0-0-0-0-0-0.aspx" : (c = a.split(","), window.location.href = "/house-0-0-0-0-0-0-0-" + c[0] + "," + c[1] + "-0-0-1-0-0-0-0-0-0-0-0.aspx")), void 0)
	})
}),

$(function () {
    function a() {
        vanPop({
            domObj: $("#houseLook"),
            way: "animate",
            mask: !0
        })
    }
    $(".saleHouseBtn .btn1").click(function () {
        a()
    })
}),
$(function () {
    var c, a = $("#goTop"),
	b = $(window).height();
    $(window).scroll(function () {
        clearTimeout(c),
		c = setTimeout(function () {
		    $(window).scrollTop() > b ? a.fadeIn(100) : a.hide(0)
		},
		200)
    }),
	a.click(function () {
	    $("html,body").animate({
	        scrollTop: 0
	    },
		200)
	})
}),
$(function () {
    var a = window.location.href,
	b = $(".navigate dd"),
	c = {
	    h1: /\/house\-1-/i.test(a),
	    h2: /\/house\-2-/i.test(a),
	    h3: /\/house\-3-/i.test(a),
	    school: /\/school/i.test(a),
	    map: /\/map/i.test(a),
	    news: /\/news/i.test(a),
	    zhuanti: /\/news\-11-/i.test(a),
	    projects: /\/projects/i.test(a),
	    newhouse: /\/newhouse/i.test(a),
	    rent: /\/rent/i.test(a)
	};
    c.h1 ? b.eq(1).find("a").addClass("current").end().siblings().find("a").removeClass("current") :
        c.h2 ? b.eq(2).find("a").addClass("current").end().siblings().find("a").removeClass("current") :
        c.h3 ? b.eq(3).find("a").addClass("current").end().siblings().find("a").removeClass("current") :
        c.newhouse ? b.eq(4).find("a").addClass("current").end().siblings().find("a").removeClass("current") :
        c.school ? b.eq(5).find("a").addClass("current").end().siblings().find("a").removeClass("current") :
        c.map ? b.eq(6).find("a").addClass("current").end().siblings().find("a").removeClass("current") :
        c.rent ? b.eq(7).find("a").addClass("current").end().siblings().find("a").removeClass("current") :
    //c.zhuanti ? b.eq(7).find("a").addClass("current").end().siblings().find("a").removeClass("current") :
    //c.news ? b.eq(6).find("a").addClass("current").end().siblings().find("a").removeClass("current") :
        c.projects ? b.eq(4).find("a").addClass("current").end().siblings().find("a").removeClass("current") :
        "undefined" != typeof _houseTypeCode ? "HOUSE" == _houseTypeCode ? b.eq(1).find("a").addClass("current").end().siblings().find("a").removeClass("current") :
        "TWN" == _houseTypeCode ? b.eq(2).find("a").addClass("current").end().siblings().find("a").removeClass("current") :
        "APTU" == _houseTypeCode && b.eq(3).find("a").addClass("current").end().siblings().find("a").removeClass("current") :
        b.eq(0).find("a").addClass("current").end().siblings().find("a").removeClass("current");
}),
checkForm = {
    email: function (a) {
        return a.match(/^\w+([-+.]\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*/gi) == a
    },
    text: function (a, b, c) {
        var f, d = 0,
		e = a.replace(/(^\s*)|(\s*$)/g, "").length;
        for (f = 0; e > f; f++) a.charCodeAt(f) > 255 ? d += 2 : d++;
        return b > 0 && b > d ? !1 : c > 0 && d > c ? !1 : !0
    },
    "int": function (a) {
        return a.match(/^\-?\d+/gi) == a
    },
    uint: function (a) {
        return a.match(/^\d+/gi) == a
    },
    "float": function (a) {
        return a.match(/^(0(.\d+)?|1(\.0+)?)/gi) == a
    }
},

$(function () {
    $("#user_top_login").delegate("#validate_status", "click",
	function () {
	    getData("", "member.email.validate",
		function () {
		    var a = unescape(this);
		    "1" == a.substr(0, 1) ? showMsgCommon("验证邮件已发送到您的注册邮箱中，请注意查阅！", 3e3) : showMsgCommon(this.substr(1), 2e3)
		},
		function () {
		    showMsgCommon("服务器忙，请稍后重试！", 2e3)
		})
	})
}),

$(function () {
    var a = window.screen.width; (1366 >= a || browserTest.ipad || browserTest.iphone) && ($("#QQ").hide(0), $("#miniQQ").show(0))
});
function DelayShow() { var a = $(window).scrollTop(), b = $(window).height(); $(".asyncload").each(function () { var c = $(this).offset().top, d = $(this).attr("data-url"); (b >= c || b > c - a) && $(this).attr("src", d).removeClass("asyncload") }) } $(function () { DelayShow(), $(window).scroll(function () { DelayShow() }) });
function commonAlert(msg, fn, timeout) {
    var $dom = $('#comalert');
    $dom.text(msg).show();
    var tm = timeout || 3000;
    var obj = setTimeout(atuohide, tm);
    $dom.hover(function () {
        clearTimeout(obj);
    }, function () {
        obj = setTimeout(atuohide, tm);
    });
    function atuohide() {
        $dom.hide();
        if (fn) {
            fn.call(this);
        }
    }
}
String.prototype.Trim = function () {
    return this.replace(/(^\s+)|(\s+$)/g, '');
};
String.prototype.ToLower = function () {
    return this.toLocaleLowerCase();
};
String.prototype.ToUpper = function () {
    return this.toLocaleUpperCase();
};
String.prototype.Length = function () {
    return this.replace(/[^\x00-\xff]/g, '**').length;
};
String.prototype.Escape = function () {
    return escape(this);
};
String.prototype.UnEscape = function () {
    return unescape(this);
};
String.prototype.UriEncode = function () {
    return encodeURIComponent(this);
};
String.prototype.UriDecode = function () {
    return decodeURIComponent(this);
};
String.prototype.Split = function (str, index) {
    var spltArr = this.split(str);
    return spltArr[index > spltArr.length - 1 ? 0 : index];
};
function StringBuilder() {
    this.temp = new Array;
    if (arguments.length > 0) {
        this.temp.push(arguments[0]);
    }
};
StringBuilder.prototype.Append = function (str) {
    this.temp.push(str);
};
StringBuilder.prototype.ToString = function () {
    return this.temp.join("");
};
Array.prototype.foreach = function (fun) {
    for (var i = 0; i < this.length; i++) {
        fun.call(this[i], this[i]);
    }
};
Array.prototype.TotalSum = function () {
    var r = 0;
    this.foreach(function () {
        r += toInt(this);
    });
    return r || 0;
};
String.prototype.format = function () {
    if (arguments.length == 0) return null;
    var str = this;
    for (var i = 0; i < arguments.length; i++) {
        var regExp = new RegExp('\\{' + i + '\\}', 'gm');
        str = str.replace(regExp, arguments[i]);
    }
    return str;
};
var toInt = function (a) { var b = parseInt(a); return isNaN(b) ? 2 == arguments.length ? arguments[1] : 0 : b }
var toFloat = function (o, d, p) {
    if (arguments.length < 1) return 0;
    return isNaN(parseFloat(arguments[0])) ? (arguments[1] | 0) : parseFloat(arguments[0]).toFixed(arguments[2] | 0);
};
Date.prototype.Format = function (fmt) {
    var o = {
        "M+": this.getMonth() + 1, "d+": this.getDate(), "h+": this.getHours() % 12 == 0 ? 12 : this.getHours() % 12, "H+": this.getHours(), "m+": this.getMinutes(), "s+": this.getSeconds(), "q+": Math.floor((this.getMonth() + 3) / 3), "S": this.getMilliseconds()
    };
    var week = { "0": "\u65e5", "1": "\u4e00", "2": "\u4e8c", "3": "\u4e09", "4": "\u56db", "5": "\u4e94", "6": "\u516d" };
    if (/(y+)/.test(fmt)) {
        fmt = fmt.replace(RegExp.$1, (this.getFullYear() + "").substr(4 - RegExp.$1.length));
    }
    if (/(E+)/.test(fmt)) {
        fmt = fmt.replace(RegExp.$1, ((RegExp.$1.length > 1) ? (RegExp.$1.length > 2 ? "\u661f\u671f" : "\u5468") : "") + week[this.getDay() + ""]);
    }
    for (var k in o) {
        if (new RegExp("(" + k + ")").test(fmt)) {
            fmt = fmt.replace(RegExp.$1, (RegExp.$1.length == 1) ? (o[k]) : (("00" + o[k]).substr(("" + o[k]).length)));
        }
    }
    return fmt;
};
function isDate(d) {
    return Object.prototype.toString.call(d) == '[object Date]';
}
var utils = {
    addEvent: function (dom, type, fun) {
        if (window.addEventListener) {
            dom.addEventListener(type, fun, false);
        } else {
            dom.attachEvent('on' + type, fun);
        }
    },
    removeEvent: function (dom, type, fun) {
        if (window.addEventListener) {
            dom.removeEventListener(type, fun, false);
        } else {
            dom.detachEvent('on' + type, fun);
        }
    },
    getParms: function (name, reg, def) {
        var regUrl = new RegExp("(^|&)" + name + "=([^&]*)(&|$)", "i");
        var temp = window.location.search.substr(1).match(regUrl);
        if (temp != null) {
            var str = decodeURIComponent(temp[2]);
            if (reg != null) {
                var regStr = new RegExp(reg);
                return regStr.test(str) ? str : def;
            } else {
                return str;
            }
        } else {
            return def;
        }
    },
    cookie: function (name, value, options) {
    if (typeof value != 'undefined') {
        options = options || {};
        if (value === null) {
            value = '';
            options.expires = -1;
        }
        var expires = '';
        if (options.expires && (typeof options.expires == 'number' || options.expires.toUTCString)) {
            var date;
            if (typeof options.expires == 'number') {
                date = new Date();
                date.setTime(date.getTime() + (options.expires * 24 * 60 * 60 * 1000));
            } else {
                date = options.expires;
            }
            expires = '; expires=' + date.toUTCString();
        }
        var path = options.path ? '; path=' + options.path : '';
        var domain = options.domain ? '; domain=' + options.domain : '';
        var secure = options.secure ? '; secure' : '';
        document.cookie = [name, '=', encodeURIComponent(value), expires, path, domain, secure].join('');
        return this;
    } else {
        var cookieValue = null;
        if (document.cookie && document.cookie != '') {
            var cookies = document.cookie.split(';');
            for (var i = 0; i < cookies.length; i++) {
                var cookie = cookies[i].Trim();
                if (!cookie.length) return '';
                if (cookie.substring(0, name.length + 1) == (name + '=')) {
                    cookieValue = decodeURIComponent(cookie.substring(name.length + 1));
                    break;
                }
            }
        }
        return cookieValue || '';
    }
}
};
(function($) {
    jQuery.fn.inputIFloat = function () {
        return this.each(function () {
            jQuery(this).css("ime-mode", "disabled").on('keydown', function (e) {
                try {
                    if (!e) e = window.event;
                    var k = e.keyCode;
                    if ((k == 13) //enter
                        || (k == 9) //tab
                        || (k == 46) //Delete
                        || (k == 8) //BackSpace
                        || ((k >= 48 && k <= 57) && !e.shiftKey) //0-9
                        || (k >= 96 && k <= 105 || k == 110) //0-9 小键
                        || (k >= 37 && k <= 40) //上下左右
                        //|| ((k == 67 || k == 86 || k == 88) && e.ctrlKey) //C,V,X
                        || (k == 190 && !e.shiftKey)
                       )
                    { }
                    else {
                        if (!e.preventDefault) { e.result = false; } else { e.preventDefault(); }
                    }
                } catch (ex) { }
            });
        });
    };
    jQuery.fn.inputINum = function () {
        return this.each(function () {
            jQuery(this).css("ime-mode", "disabled").on('keydown', function (e) {
                try {
                    if (!e) e = window.event;
                    var k = e.keyCode;
                    if ((k == 13) //enter
                        || (k == 9) //tab
                        || (k == 46) //Delete
                        || (k == 8) //BackSpace
                        || ((k >= 48 && k <= 57) && !e.shiftKey) //0-9
                        || (k >= 96 && k <= 105) //0-9 小键
                        || (k >= 37 && k <= 40) //上下左右
                        //|| ((k == 67 || k == 86 || k == 88) && e.ctrlKey) //C,V,X
                       )
                    { }
                    else {
                        if (!e.preventDefault) { e.returnValue = false; } else { e.preventDefault(); }
                    }
                } catch (ex) { }
            });
        });
    };
    $.fn.serializeObject = function () {
        var o = {};
        var a = this.serializeArray();
        $.each(a, function () {
            if (o[this.name] !== undefined) {
                if (!o[this.name].push) {
                    o[this.name] = [o[this.name]];
                }
                o[this.name].push(this.value || '');
            } else {
                o[this.name] = this.value || '';
            }
        });
        return o;
    };
})(jQuery);