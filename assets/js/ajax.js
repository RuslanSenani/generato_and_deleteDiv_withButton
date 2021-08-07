

$(document).ready(function () {
    $(".sil").click(function () {
        var id = $(this).attr("id");
        var ajax_load = "<img src='../assets/loading_gif/loading.gif' style='position:absolute;z-index:1;text-align: center;left:574px;top:235px;' alt='loading...' />";
        var loadUrl = "http://localhost/div/create/";
        $.ajax({
            type: 'POST',
            url: 'process.php',
            data: {
                'deletedID': id
            },
            success: function (params) {
                $(".content-container").html(ajax_load).load(loadUrl);
            }
        });
    });

});

function makeDiv() {
    //rengler randomolduguna gore bezi rengler transparan olur ve gormek olmur onun ucun bazada qalan div olarsa onnan olacaq
    var divsize = ((Math.random() * 200) + 50).toFixed();
    var color = '#' + Math.round(0xffffff * Math.random()).toString(16);
    var posx = (Math.random() * ($(document).width() - divsize)).toFixed();
    var posy = (Math.random() * ($(document).height() - 150 - divsize)).toFixed();
    var d = new Date();
    var classid = d.getTime();
    $newdiv = $('<div id="' + classid + '" class="sil"/>').css({
        'width': divsize + 'px',
        'height': divsize + 'px',
        'background-color': color,
        'position': 'absolute',
        'left': posx + 'px',
        'top': posy + 'px',
        'display': 'none'
    }).appendTo('body').fadeIn(100);
    var ajax_load = "<img src='../assets/loading_gif/loading.gif' style='position:absolute;z-index:1;text-align: center;left:574px;top:235px;' alt='loading...' />";
    var div = 'id="' + classid + '" class="sil" style="position:absolute;left:' + posx + 'px;top:' + posy + 'px;width:' + divsize + 'px;height:' + divsize + 'px;background-color:' + color + ';"';
    var loadUrl = "http://localhost/div/create/";
    $.ajax({
        type: 'POST',
        url: 'process.php',
        data: {
            'id': classid,
            'content': div
        },
        success: function (params) {
            $(".content-container").html(ajax_load).load(loadUrl);
        }
    });
};
