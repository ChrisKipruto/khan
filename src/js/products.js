$(function() {

    const overlay = $("#overlay");
    const addProductForm = $("form#addProductForm");

    /**
     * product details
    */

    let proTitle = $("#proTitle");
    let proCategory = $("#proCategory");
    let proBrand = $("#proBrand");
    let proPrice = $("#proPrice");
    let proImage = $("#proImage");
    let proDesc = $("#proDesc");
    let addProBtn = $("#addProBtn");
    let feedbackMsg = $("#feedbackMsg");

    ///////////////////////////////////////////////////////////////

    /**
     * get categories
    */

    function categories() {
        $.ajax({
            url: '../includes/post.php',
            method: 'POST',
            data: { cat: 1 },
            success: function(data) {
                $("select#proCategory").html(data);
            }
        });
    }

    categories();

    /////////////////////////////////////////////////////////////////

    /**
     * get brands
    */

    function brands() {
        $.ajax({
            url: '../includes/post.php',
            method: 'POST',
            data: { bra: 1 },
            success: function(data) {
                $("select#proBrand").html(data);
            }
        });
    }

    brands();

    /////////////////////////////////////////////////////////////////


    /**
     * add product details
    */

    var pricePattern = /^[0-9]*$/;

    // click add btn
    addProductForm.on('submit', function(e) {

        e.preventDefault();

        // validate title
        if(proTitle.val() == '') {
            $("p.title-help").html("Title is required.");
            proTitle.focus();
            return false;
        } else {
            $("p.title-help").html("");
        }

        // validate category
        if(proCategory.val() === "") {
            $("p.cat-help").html("Select the product category");
            return false;
        } else {
            $("p.cat-help").html("");
        }

        // validate price
        if(proPrice.val() == '') {
            $("p.price-help").html("Price is required.");
            proPrice.focus();
            return false;
        } else {
            $("p.price-help").html("");
            if(!pricePattern.test(proPrice.val())){
                $("p.price-help").html("Enter a valid Price. Only numbers with no white space");
                proPrice.focus();
                return false;
            } else {
                $("p.price-help").html("")
            }
        }

        // validate image
        if(!proImage.val()) {
            $("p.img-help").html("Image is required.");
            return false;
        } else {
            $("p.img-help").html("");
        }

        // validate desc
        if($.trim(proDesc.val()) == ""){
            $("p.desc-help").html("Product Description is required.").addClass("mb-2");
            return false;
        } else {
            $("p.desc-help").html("").removeClass("mb-2");
        }

        let url = "../includes/add.php";

        overlay.show();

        $.ajax({
            type: "POST",
            url: url,
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData:false,
            success: function (response) {

                console.log(response);

                let result = $.trim(response);

                overlay.hide();

                // invalid
                if(result === "Extension Invalid") {

                    $('.warning-msg-p').html('Invalid image Extension. ');
                    $(".warning-msg").fadeIn('fast');

                    return false;

                }
                
                // 2MB
                if(result === "Size not 2MB") {

                    $('.danger-msg-p').html('File size must be excately 2 MB or less');
                    $(".danger-msg").fadeIn('fast');

                    return false;

                }

                // not uploaded
                if(result === "File not Uploaded") {

                    $('.warning-msg-p').html('Image was not uploaded');
                    $(".warning-msg").fadeIn('fast');

                    return false;

                }

                // success
                if(result === "success") {

                    $('.success-msg-p').html('Product has been added successfuly added and image uploaded.');
                    $(".success-msg").fadeIn('fast');

                    return false;

                }

                // failed
                if(result === "failed") {

                    $('.danger-msg-p').html('Image was not saved to the DB.');
                    $(".danger-msg").fadeIn('fast');

                    return false;

                }

            }
        });

        // overlay.show();

    });

    // on keyup title
    proTitle.on('keyup', function(event) {

        // check return key
        if(event.keyCode === 13){
            addProBtn.click();
        } else {

            if(proTitle.val() == '') {
                $("p.title-help").html("Title is required.");
            } else {
                $("p.title-help").html("");
            }

        }

    });

    // on keyup price
    proPrice.on('keyup', function(event) {

        // check return key
        if(event.keyCode === 13){
            addProBtn.click();
        } else {

            if(proPrice.val() == '') {
                $("p.price-help").html("Price is required.");
            } else {
                $("p.price-help").html("");
                if(!pricePattern.test(proPrice.val())){
                    $("p.price-help").html("Enter a valid Price. Only numbers with no white space");
                } else {
                    $("p.price-help").html("")
                }
            }

        }

    });

    // on key up description
    proDesc.on('keyup', function() {

        if($.trim(proDesc.val()) == ""){
            $("p.desc-help").html("Product Description is required.").addClass("mb-2");
        } else {
            $("p.desc-help").html("").removeClass("mb-2");
        }

    });

    // on change category
    proCategory.on('change', function(event) {

        if(proCategory.val() === "") {
            $("p.cat-help").html("Select product category");
        } else {
            $("p.cat-help").html("");
        }

    });

    // on change brand
    proBrand.on('change', function(event) {

        if(proBrand.val() === "") {
            $("p.bra-help").html("Select product brand");
        } else {
            $("p.bra-help").html("");
        }

    });



    /////////////////////////////////////////////////////////////////

});