var chat = {

    coon: null,
    send: function(mess){
        console.log(mess);
        this.coon.send(mess)
    }
}
$(document).ready(function(){

    chat.coon = new WebSocket('ws://194.87.99.109:8123');
    chat.coon.onopen=function(e){
        console.log('open connectioni');
    }
    chat.coon.onmessage = function(e){
        let msg = JSON.parse(e.data);
        var $el = $('li.messages-menu ul.menu li:first').clone();
        $el.find('p').text(msg.date+' '+msg.msg);
        $el.find('h4').text('User'+msg.from);
        $el.prependTo($('.menu'));
        // $el.prependTo('li.messages-menu ul-menu');

        var cnt = $('li.messages-menu ul-menu').length;
        $('li.messages-menu span.label-success').text(cnt);
        $('li.messages-menu li.header').text('You have '+cnt+ 'messages');
    }
})