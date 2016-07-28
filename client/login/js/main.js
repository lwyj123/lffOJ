function fuck() {
    $.post("http://localhost/lffOJ/server/index.php", { "function": "Login", "Email": $("#Email").val(), "userPass": $("#Password").val()},
        function(data){
            var parsedJson = jQuery.parseJSON(data); 
            
            if(parsedJson.status == "error") {
                alert("账户名或密码错误请重新输入");
            }
            else {
                setCookie('lwtoken', parsedJson.content);
                setCookie('Email', $("#Email").val());
                alert(getCookie('Email'));
                location.href = "http://localhost/lffOJ/client/";
            }
        }
    );
}