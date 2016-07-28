function setCookie(name,value){
    var exp  = new Date();  
    exp.setTime(exp.getTime() + 3600000);
    document.cookie = name + "="+ escape (value) + ";expires=" + exp.toGMTString() + ";path=/lffOJ/client/";
}
function getCookie(name){
    var arr = document.cookie.match(new RegExp("(^| )"+name+"=([^;]*)(;|$)"));
     if(arr != null) return unescape(arr[2]); return null;
}
function delCookie(name){
    var exp = new Date();
    exp.setTime(exp.getTime() - 1);
    var cval=getCookie(name);
    if(cval!=null) document.cookie= name + "="+cval+";expires="+exp.toGMTString() + ";path=/lffOJ/client/";
}