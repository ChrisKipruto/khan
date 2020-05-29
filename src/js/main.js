$(function(){

    /**
     * Alert Message
    */

    var dangerMsgBtn = $("div.danger-msg i.close");
    var warningMsgBtn = $("div.warning-msg i.close");
    var successMsgBtn = $("div.success-msg i.close");

    dangerMsgBtn.on('click', function(e){
        $("div.danger-msg").fadeOut('fast');
    });

    warningMsgBtn.on('click', function(e){
        $("div.warning-msg").fadeOut('fast');
    });

    successMsgBtn.on('click', function(e){
        $("div.success-msg").fadeOut('fast');
    });

    //////////////////////////////////////////////////

});