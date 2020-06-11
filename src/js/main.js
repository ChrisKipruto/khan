$(function(){

    $('#rateMe1').mdbRate();

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


    const notification = $("#notification");

    let loginMsg = notification.attr("login-success");

    /**
     * Show login notification
     */
    function showNotification(){
        if(loginMsg === "success") {
            notification.fadeIn("slow", function(){
                setTimeout(function(){
                    notification.fadeOut("slow");
                }, 3000);
            });
        }
    }

    showNotification();

    //////////////////////////////////////////////////

    /**
     * Magnific
    */

    $('.test-popup-link').magnificPopup({
        type: 'image',
        gallery:{enabled:true}
    });

    //////////////////////////////////////////////////

    /**
     * get brands
    */

    function getBrands() {
        setInterval(function() {

            let url = "../includes/shop.php";

            $.post(url, { bra: 1 }, function(data) {

                $("div#shopBrands").html(data);

            });

        }, 500);
    }
    
    getBrands();

    ///////////////////////////////////////////////////////////////////////

    /**
     * getd categories
    */

    function getCategories() {
        setInterval(function() {

            let url = "../includes/shop.php";

            $.post(url, { cat: 1 }, function(data) {

                // console.log(data);

                $("div#shopCategories").html(data);

            });

        }, 500);
    }

    getCategories();

    ///////////////////////////////////////////////////////////////////////

});