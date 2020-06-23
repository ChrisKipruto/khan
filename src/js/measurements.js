$(function() {

    // constants
    const overlay = $("#overlay");

    // add data table
    $("table#babyShoesTable").DataTable();

    /**
     * Add Baby shoes
    */
   
        // declare baby shoes details
        let babyShoeCountry = $("#babyShoeCountry");
        let babyShoeSizes = $("#babyShoeSizes");

        // add button baby shoes
        let addBabyShoeBtn = $("#addBabyShoeBtn");

        // on keyup baby shoe country
        babyShoeCountry.on('keyup', function(e) {

            // check key code
            if(e.keyCode === 13) {
                addBabyShoeBtn.click();
                console.log('event');
            } else {

                // check if empty
                if(babyShoeCountry.val() == "") {
                    $("p.babyShoeCountry-help").html('Country is Required.');
                } else {
                    $("p.babyShoeCountry-help").html('');
                }

            }

        });

        // on keyup baby shoe sizes
        babyShoeSizes.on('keyup', function(event) {

            // check if empty
            if(babyShoeSizes.val() == "") {
                $("p.babyShoeSizes-help").html('Shoe Sizes are Required.');
            } else {
                $("p.babyShoeSizes-help").html('');
            }

        });

        // on click add baby shoe btn
        addBabyShoeBtn.on('click', function (e) {

            let country = babyShoeCountry.val();
            let shoeSize = babyShoeSizes.val();

            // check fields empty
            if(country == "" || shoeSize == "") {
                $("p.danger-msg-p").html('Please fill the fields below. All are required.');
                $(".danger-msg").fadeIn();
                return false;
            }

            // shoe sizes
            if(!/^\d+(,\d+)*$/.test(shoeSize)) {
                $("p.babyShoeSizes-help").html('Shoe Sizes must be separated with a comma.');
                return false;
            }

            let url = "../includes/addMeasurements.php";

            overlay.show();

            $.post(url, { addBabyShoe: 1, country: country, shoeSize: shoeSize }, function(data) {

                overlay.hide();

                let result = $.trim(data);

                // country exist
                if(result === "Country exist"){
                    $("p.danger-msg-p").html('Country already exists.');
                    $(".danger-msg").fadeIn();
                    return false;
                }

                // success
                if(result === "success") {
                    $("p.success-msg-p").html('Success! Baby shoe details has been added.');
                    $(".success-msg").fadeIn();
                    return false;
                }

                // failed
                if( result === "failed") {
                    $("p.danger-msg-p").html('Failed to insert.');
                    $(".danger-msg").fadeIn();
                    return false;
                }

            });

        });

    /**End add baby shoes*/ /////////////////////////////////////


    /**
     * Add women shoes
    */
        
        // datatable for womenShoesTable
        $("#womenShoesTable").DataTable();

        // decalre women shoe details
        let womenShoeCountry = $("#womenShoeCountry");
        let heel = $("#heel");
        let womenShoeSize = $("#womenShoeSize");
        let addwomenShoeBtn = $("#addwomenShoeBtn");
        let chooseCountryOrHeel = $("#chooseCountryOrHeel");

        // select
        let countryColumn = $("#countryColumn");
        let heelColumn = $("#heelColumn");

        // on change chooseCountryOrHeel
        chooseCountryOrHeel.on('change', function(e) {

            // declare val
            let v = chooseCountryOrHeel.val();

            // check if v is empty
            if(v == "") {
                $("p.chooseCountryOrHeel-help").html('Select the option given: either Country or Heel')
                countryColumn.slideUp("fast");
                heelColumn.slideUp('fast');
                heel.val('');
                womenShoeCountry.val('');
            } else {
                $("p.chooseCountryOrHeel-help").html('');
            }

            // forCountry
            if(v === "forCountry") {
                countryColumn.slideDown("fast");
                heelColumn.slideUp('fast');
                heel.val('');
            }

            // forHeel
            if(v === "forHeel") {
                heelColumn.slideDown('fast');
                countryColumn.slideUp("fast");
                womenShoeCountry.val('');
            }

        });

        // on key up country
        womenShoeCountry.on('keyup', function(e) {

            // check key code
            if(e.keyCode === 13) {
                addwomenShoeBtn.click();
            } else {

                // check if empty
                if(womenShoeCountry.val() == "") {
                    $("p.womenShoeCountry-help").html('This field is requred!');
                } else {
                    $("p.womenShoeCountry-help").html('');
                }

            }

        });

        // on key up heel
        heel.on('keyup', function(e) {

            // check if empty
            if(heel.val() == "") {
                $("p.heel-help").html('This field is requred!');
            } else {
                $("p.heel-help").html('');
            }

        });

        // on key up country
        womenShoeSize.on('keyup', function(e) {

            // check if empty
            if(womenShoeSize.val() == "") {
                $("p.womenShoeSize-help").html('This field is requred!');
            } else {
                $("p.womenShoeSize-help").html('');
            }

        });

        // on click add btn
        addwomenShoeBtn.on('click', function(e) {

            // for details init
            let selectOpt = chooseCountryOrHeel.val();
            let country = womenShoeCountry.val();
            let heelDim = heel.val();
            let size = womenShoeSize.val();

            // check if v is empty
            if(selectOpt == "") {
                $("p.danger-msg-p").html('Select the option given: either Country or Heel');
                $(".danger-msg").fadeIn();
                $("p.chooseCountryOrHeel-help").html('This field is required')
                return false;
            }

            // check if country empty
            if(country == "" && heelDim == "") {
                $("p.danger-msg-p").html('Country or Heel dimension must filled.');
                $(".danger-msg").fadeIn();
                return false;
            }

            // check if size empty
            if(size == "") {
                $("p.womenShoeSize-help").html('This field is requred!');
                return false;
            } 

            let url = "../includes/addMeasurements.php";

            overlay.show();

            $.post(url, { addWomenShoe: 1, country: country, size: size, heelDim: heelDim }, function(data) {

                overlay.hide();

                let result = $.trim(data);

                // country exist
                if(result === "country exist"){
                    $("p.danger-msg-p").html('Country already exists.');
                    $(".success-msg").fadeOut();
                    $(".danger-msg").fadeIn();
                    return false;
                }

                // heel to to exist
                if(result === "heel to to exist"){
                    $("p.danger-msg-p").html('Heel to Toe field already exist.');
                    $(".success-msg").fadeOut();
                    $(".danger-msg").fadeIn();
                    return false;
                }

                // success
                if(result === "success") {
                    $("p.success-msg-p").html('Success! Women Shoes details has been added.');
                    $(".success-msg").fadeIn();
                    $(".danger-msg").fadeOut();
                    return false;
                }

                // failed
                if( result === "failed") {
                    $("p.danger-msg-p").html('Failed to insert.');
                    $(".success-msg").fadeOut();
                    $(".danger-msg").fadeIn();
                    return false;
                }

            });

        })

    /**End add women shoes*/ /////////////////////////////////////

});