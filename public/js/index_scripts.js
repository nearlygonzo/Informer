/**
 * Created with JetBrains PhpStorm.
 * User: nearlygonzo
 * Date: 22.07.13
 * Time: 20:42
 * To change this template use File | Settings | File Templates.
 */

$(document).ready(function() {

    $.getJSON('application/selectHeader', function(json) {
        $('#header').append('<a href="#" id="username">' + json.username + '</a> <br/>')
    })
    .error(function() { alert("Ошибка выполнения"); })

});