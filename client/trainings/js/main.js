var trainingId;
function GetRequest() {  
    var url = location.search; //获取url中"?"符后的字串   
    var theRequest = new Object();  
    if (url.indexOf("?") != -1) {  
        var str = url.substr(1);  
        strs = str.split("&");  
        for (var i = 0; i < strs.length; i++) {  
            theRequest[strs[i].split("=")[0]] = unescape(strs[i].split("=")[1]);  
        }  
    }  
    return theRequest;  
}  
$(document).ready(function () {  
    var Request = new Object();  
    Request = GetRequest();  
    trainingId = Request["Id"];    


    $.post("http://localhost/lffOJ/server/index.php", { "function": "GetTraining", "Id": trainingId},
        function(data) {
            var parsedJson = jQuery.parseJSON(data);
            var c1 = $('<div></div>');
            c1.attr('class', 'c1');
            var h2 = $('<h2>'+ parsedJson['content'][0].Title +'</h2>');

            var c2 = $('<div></div>');
            c2.attr('class', 'c2');

            var h3 = $('<h3>题目表述</h3>');
            var p = $('<p>'+ parsedJson['content'][0].Description +'</p>');

            h2.appendTo(c1);
            h3.appendTo(c2);
            p.appendTo(c2);

            $('.c').prepend(c2);
            $('.c').prepend(c1);

        }
    )

});  


function fileSelected() {
  var file = document.getElementById('fileToUpload').files[0];
  if (file) {

  }
}

function uploadFile() {
  var xhr = new XMLHttpRequest();
  var fdo = document.getElementById('form1');
  var fd = new FormData(fdo);
  fd.append("function", "Submit");
  fd.append("token", getCookie('lwtoken'));
  fd.append("trainingId", trainingId);
  /* event listners */
  xhr.upload.addEventListener("progress", uploadProgress, false);
  xhr.addEventListener("load", uploadComplete, false);
  xhr.addEventListener("error", uploadFailed, false);
  xhr.addEventListener("abort", uploadCanceled, false);
  /* Be sure to change the url below to the url of your upload server side script */
  xhr.open("POST", "http://localhost/lffOJ/server/index.php");
  xhr.send(fd);
}

function uploadProgress(evt) {
  if (evt.lengthComputable) {
    var percentComplete = Math.round(evt.loaded * 100 / evt.total);
    document.getElementById('progressNumber').innerHTML = percentComplete.toString() + '%';
  }
  else {
    document.getElementById('progressNumber').innerHTML = 'unable to compute';
  }
}

function uploadComplete(evt) {
  /* This event is raised when the server send back a response */
  var parsedJson = jQuery.parseJSON(evt.target.responseText);
  alert(parsedJson.submitStatus);
}

function uploadFailed(evt) {
  alert("There was an error attempting to upload the file.");
}

function uploadCanceled(evt) {
  alert("The upload has been canceled by the user or the browser dropped the connection.");
}