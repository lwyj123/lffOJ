function fuck() {
    $.post("http://localhost/lffOJ/server/index.php", { "function": "Register", "Email": $("#Email").val(), "userPass": $("#Password").val(), "nickName": $("#NickName").val()},
        function(data){
            var parsedJson = jQuery.parseJSON(data); 
            
            if(parsedJson.status == "error") {
                alert("注册失败 请更换邮箱或昵称");
            }
            else {
                location.href = "http://localhost/lffOJ/client/login";
            }
        }
    );
}