$(document).ready(function () {
    $.post("http://localhost/lffOJ/server/index.php", { "function": "GetTrainingList", "Limit": 50},
        function(data){
            var parsedJson = jQuery.parseJSON(data); 

            $.each(parsedJson['content'],function(n,value) {   
                var li = $('<li></li>');

                var a = $('<a></a>');
                a.attr({ href: 'http://localhost/lffOJ/client/trainings?Id=' + value['Id'], class: 'inner'});

                var li_img=$('<div></div>');
                li_img.attr('class', 'li-img');

                var img = $('<img></img>');
                img.attr('src', "http://bradfrost.github.com/this-is-responsive/patterns/images/fpo_square.png");

                var li_text=$('<div></div>');
                li_text.attr('class', 'li-text');

                var h4 = $('<h4>' + value['Title'] + '</h4>');
                var p = $('<p>' + value['Description'] + '</p>');

                h4.appendTo(li_text);
                p.appendTo(li_text);
                img.appendTo(li_img);

                li_img.appendTo(a);
                li_text.appendTo(a);

                a.appendTo(li);

                $('.list').append(li);
            });  
        }
    );
}); 
