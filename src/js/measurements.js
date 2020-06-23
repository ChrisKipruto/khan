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

});