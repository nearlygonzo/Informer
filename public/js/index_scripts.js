/**
 * Created with JetBrains PhpStorm.
 * User: nearlygonzo
 * Date: 22.07.13
 * Time: 20:42
 * To change this template use File | Settings | File Templates.
 */

$(document).ready(function() {
    $.getJSON('application/identify', function(json) {
        if (json.url == null) {
            $('#user-header-panel').append(
                '<img src="' + json.image_path + '"> </img>' +
                '<a href="#" id="username">' + json.username + '</a>' +
                '<br/> <a href="#" id="logout">Выйти</a>'
            );
        } else {
            $('#user-header-panel').append(
                '<a href="' + json.url + '">' + 'Войти через vk.com</a>'
            );
        }
        $('html').css("display", "block");
    })
    .error(function() { alert("Ошибка выполнения."); })

});