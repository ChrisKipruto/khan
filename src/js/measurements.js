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
        
        // datatable for heelToToeTable
        $("#heelToToeTable").DataTable();

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

    /**
     * Add mens shoes
    */  

        // mensShoesTable data table
        $("#mensShoesTable").DataTable();

        // set mens shoe details
        let mensShoeCountry = $("#mensShoeCountry");
        let mensShoeSize = $("#mensShoeSize");
        let addmensShoeBtn = $("#addmensShoeBtn");

        // on keyup mens country
        mensShoeCountry.on('keyup', function(e) {

            // check keyCode
            if(e.keyCode === 13) {
                addmensShoeBtn.click();
            } else {
                // check if val is empty
                if(mensShoeCountry.val() == "") {
                    $("p.mensShoeCountry-help").html("Enter the country relating to the shoe sizes.");
                } else {
                    $("p.mensShoeCountry-help").html("");
                }
            }

        });

        // on keyup mens sizes
        mensShoeSize.on('keyup', function(e) {

            // check if val is empty
            if(mensShoeSize.val() == "") {
                $("p.mensShoeSize-help").html("Enter the shoe sizes.");
            } else {
                $("p.mensShoeSize-help").html("");
            }

        });

        // on click enter add mens shoe btn
        addmensShoeBtn.on('click', function() {

            let menCountry = mensShoeCountry.val();
            let menSize = mensShoeSize.val();

            // check country
            if(menCountry == "") {
                $("p.mensShoeCountry-help").html("Enter the country relating to the shoe sizes.");
                mensShoeCountry.focus();
                return false;
            }

            // check size
            if(menSize == "") {
                $("p.mensShoeSize-help").html("Enter the shoe sizes.");
                mensShoeSize.focus();
                return false;
            }

            overlay.show();

            let url = "../includes/addMeasurements.php";

            $(".warning-msg-p").html('');
            $(".warning-msg").fadeOut("fast");

            $(".success-msg-p").html('');
            $(".success-msg").fadeOut("fast");

            $.post(url, { addMensShoes: 1, menSize: menSize, menCountry: menCountry }, function(data) {

                overlay.hide();

                let result = $.trim(data);

                // country exist
                if(result === "country exist") {
                    $(".warning-msg-p").html("The Country Already exists.");
                    $(".warning-msg").fadeIn("fast");
                    return false;
                }

                // success
                if(result === "success") {
                    $(".success-msg-p").html("The shoe sizes as per the country: "+menCountry+" has been added.");
                    $(".success-msg").fadeIn("fast");
                    return false;
                }

                // failed
                if(result === "failed") {
                    $(".warning-msg-p").html("Insertion has failed.");
                    $(".warning-msg").fadeIn("fast");
                    return false;
                }

            });

        });

    /**End add mens shoes*/ /////////////////////////////////////





    /**
     * Add dresses
    */ 

        // dressesTable data table
        $("#dressesTable").DataTable();

        // dress details
        let dressSize = $("#dressSize");
        let dressChest = $("#dressChest");
        let dressWaist = $("#dressWaist");
        let dressHip = $("#dressHip");
        let addDressBtn = $("#addDressBtn");

        // on key up dress size
        dressSize.on('keyup', function(e) {

            // check keyCode
            if(e.keyCode === 13) {
                addDressBtn.click();
            } else {
                // check if val is empty
                if(dressSize.val() == "") {
                    $("p.dressSize-help").html("Dress size is required. e.g. XXL, XL");
                } else {
                    $("p.dressSize-help").html("");
                }
            }

        });

        // on key up dressChest
        dressChest.on('keyup', function(e) {

            // check keyCode
            if(e.keyCode === 13) {
                addDressBtn.click();
            } else {
                // check if val is empty
                if(dressChest.val() == "") {
                    $("p.dressChest-help").html("Dress Chest measurement is required. e.g. 31-33 range.");
                } else {
                    $("p.dressChest-help").html("");
                }
            }

        });

        // on key up dressWaist
        dressWaist.on('keyup', function(e) {

            // check keyCode
            if(e.keyCode === 13) {
                addDressBtn.click();
            } else {
                // check if val is empty
                if(dressWaist.val() == "") {
                    $("p.dressWaist-help").html("Dress Waist measurement is required. e.g. 31-33 range.");
                } else {
                    $("p.dressWaist-help").html("");
                }
            }

        });

        // on key up dressHip
        dressHip.on('keyup', function(e) {

            // check keyCode
            if(e.keyCode === 13) {
                addDressBtn.click();
            } else {
                // check if val is empty
                if(dressHip.val() == "") {
                    $("p.dressHip-help").html("Dress Hip measurement is required. e.g. 31-33 range.");
                } else {
                    $("p.dressHip-help").html("");
                }
            }

        });

        // on click addDressBtn
        addDressBtn.on('click', function(e) {

            // check if val is empty
            if(dressSize.val() == "") {
                $("p.dressSize-help").html("Dress size is required. e.g. XXL, XL");
                dressSize.focus();
                return false;
            } 

            // check if val is empty
            if(dressChest.val() == "") {
                $("p.dressChest-help").html("Dress Chest measurement is required. e.g. 31-33 range.");
                dressChest.focus();
                return false;
            } 

            // check if val is empty
            if(dressWaist.val() == "") {
                $("p.dressWaist-help").html("Dress Waist measurement is required. e.g. 31-33 range.");
                dressWaist.focus();
                return false;
            }

            // check if val is empty
            if(dressHip.val() == "") {
                $("p.dressHip-help").html("Dress Hip measurement is required. e.g. 31-33 range.");
                dressHip.focus();
                return false;
            }

            let dSize = dressSize.val();
            let dChest = dressChest.val();
            let dWaist = dressWaist.val();
            let dHip = dressHip.val();

            overlay.show();

            let url = "../includes/addMeasurements.php";

            $(".warning-msg-p").html('');
            $(".warning-msg").fadeOut("fast");

            $(".success-msg-p").html('');
            $(".success-msg").fadeOut("fast");

            $.post(url, { 
                addDress: 1,
                dSize: dSize,
                dChest: dChest,
                dWaist: dWaist,
                dHip: dHip
            }, function(data) {

                overlay.hide();

                let result = $.trim(data);

                // size exist
                if(result === "size exist") {
                    $(".warning-msg-p").html("The Size <strong> "+ dSize +" </strong> Already exists.");
                    $(".warning-msg").fadeIn("fast");
                    return false;
                }

                // success
                if(result === "success") {
                    $(".success-msg-p").html("The Dress Size: <strong> "+ dSize +" </strong> has been added.");
                    $(".success-msg").fadeIn("fast");
                    return false;
                }

                // failed
                if(result === "failed") {
                    $(".warning-msg-p").html("Insertion has failed.");
                    $(".warning-msg").fadeIn("fast");
                    return false;
                }

            });

        });

    /**End add dresses*/ /////////////////////////////////////


    /**
     * Add womens pants
    */ 

        // womenPantsTable data table
        $("#womenPantsTable").DataTable();

        // dress details
        let womenPantsSize = $("#womenPantsSize");
        let womenPantsBust = $("#womenPantsBust");
        let womenPantsWaist = $("#womenPantsWaist");
        let womenPantsHip = $("#womenPantsHip");
        let addWomensPantsBtn = $("#addWomensPantsBtn");

        // on key up womenPantsSize
        womenPantsSize.on('keyup', function(e) {

            // check keyCode
            if(e.keyCode === 13) {
                addWomensPantsBtn.click();
            } else {
                // check if val is empty
                if(womenPantsSize.val() == "") {
                    $("p.womenPantsSize-help").html("Women's Pants size is required. e.g. XXL, XL");
                } else {
                    $("p.womenPantsSize-help").html("");
                }
            }

        });

        // on key up womenPantsBust
        womenPantsBust.on('keyup', function(e) {

            // check keyCode
            if(e.keyCode === 13) {
                addWomensPantsBtn.click();
            } else {
                // check if val is empty
                if(womenPantsBust.val() == "") {
                    $("p.womenPantsBust-help").html("Women's Pants Bust measurement is required. e.g. 31-33 range.");
                } else {
                    $("p.womenPantsBust-help").html("");
                }
            }

        });

        // on key up womenPantsWaist
        womenPantsWaist.on('keyup', function(e) {

            // check keyCode
            if(e.keyCode === 13) {
                addWomensPantsBtn.click();
            } else {
                // check if val is empty
                if(womenPantsWaist.val() == "") {
                    $("p.womenPantsWaist-help").html("Women's Pants Waist measurement is required. e.g. 31-33 range.");
                } else {
                    $("p.womenPantsWaist-help").html("");
                }
            }

        });

        // on key up womenPantsHip
        womenPantsHip.on('keyup', function(e) {

            // check keyCode
            if(e.keyCode === 13) {
                addWomensPantsBtn.click();
            } else {
                // check if val is empty
                if(womenPantsHip.val() == "") {
                    $("p.womenPantsHip-help").html("Women's Pants Hip measurement is required. e.g. 31-33 range.");
                } else {
                    $("p.womenPantsHip-help").html("");
                }
            }

        });

        // on click addWomensPantsBtn
        addWomensPantsBtn.on('click', function(e) {

            // check if val is empty
            if(womenPantsSize.val() == "") {
                $("p.womenPantsSize-help").html("Women's Pants size is required. e.g. XXL, XL");
                womenPantsSize.focus();
                return false;
            } 

            // check if val is empty
            if(womenPantsBust.val() == "") {
                $("p.womenPantsBust-help").html("Women's Pants Bust measurement is required. e.g. 31-33 range.");
                womenPantsBust.focus();
                return false;
            } 

            // check if val is empty
            if(womenPantsWaist.val() == "") {
                $("p.womenPantsWaist-help").html("Women's Pants Waist measurement is required. e.g. 31-33 range.");
                womenPantsWaist.focus();
                return false;
            }

            // check if val is empty
            if(womenPantsHip.val() == "") {
                $("p.womenPantsHip-help").html("Women's Pants Hip measurement is required. e.g. 31-33 range.");
                dressHip.focus();
                return false;
            }

            let dSize = womenPantsSize.val();
            let dBust = womenPantsBust.val();
            let dWaist = womenPantsWaist.val();
            let dHip = womenPantsHip.val();

            overlay.show();

            let url = "../includes/addMeasurements.php";

            $(".warning-msg-p").html('');
            $(".warning-msg").fadeOut("fast");

            $(".success-msg-p").html('');
            $(".success-msg").fadeOut("fast");

            $.post(url, { 
                addWomenPants: 1,
                dSize: dSize,
                dBust: dBust,
                dWaist: dWaist,
                dHip: dHip
            }, function(data) {

                overlay.hide();

                let result = $.trim(data);

                // size exist
                if(result === "size exist") {
                    $(".warning-msg-p").html("The Size <strong> "+ dSize +" </strong> Already exists.");
                    $(".warning-msg").fadeIn("fast");
                    return false;
                }

                // success
                if(result === "success") {
                    $(".success-msg-p").html("The Women's pants Size: <strong> "+ dSize +" </strong> has been added.");
                    $(".success-msg").fadeIn("fast");
                    return false;
                }

                // failed
                if(result === "failed") {
                    $(".warning-msg-p").html("Insertion has failed.");
                    $(".warning-msg").fadeIn("fast");
                    return false;
                }

            });

        });

    /**End add womens pants*/ /////////////////////////////////////



    /**
     * Add womens pants
    */ 

        // menPantsTable data table
        $("#menPantsTable").DataTable();

        // dress details
        let menPantsSize = $("#menPantsSize");
        let menPantsWaist = $("#menPantsWaist");
        let addMensPantsBtn = $("#addMensPantsBtn");

        // on key up menPantsSize
        menPantsSize.on('keyup', function(e) {

            // check keyCode
            if(e.keyCode === 13) {
                addmensPantsBtn.click();
            } else {
                // check if val is empty
                if(menPantsSize.val() == "") {
                    $("p.menPantsSize-help").html("Men's Pants size is required. e.g. XXL, XL");
                } else {
                    $("p.menPantsSize-help").html("");
                }
            }

        });

        // on key up menPantsWaist
        menPantsWaist.on('keyup', function(e) {

            // check keyCode
            if(e.keyCode === 13) {
                addMensPantsBtn.click();
            } else {
                // check if val is empty
                if(menPantsWaist.val() == "") {
                    $("p.menPantsWaist-help").html("Men's Pants Waist measurement is required. e.g. 31-33 range.");
                } else {
                    $("p.menPantsWaist-help").html("");
                }
            }

        });

        // on click addmensPantsBtn
        addMensPantsBtn.on('click', function(e) {

            // check if val is empty
            if(menPantsSize.val() == "") {
                $("p.menPantsSize-help").html("Men's Pants size is required. e.g. XXL, XL");
                menPantsSize.focus();
                return false;
            } 

            // check if val is empty
            if(menPantsWaist.val() == "") {
                $("p.menPantsWaist-help").html("Men's Pants Waist measurement is required. e.g. 31-33 range.");
                menPantsWaist.focus();
                return false;
            } 

            let dSize = menPantsSize.val();
            let dWaist = menPantsWaist.val();

            overlay.show();

            let url = "../includes/addMeasurements.php";

            $(".warning-msg-p").html('');
            $(".warning-msg").fadeOut("fast");

            $(".success-msg-p").html('');
            $(".success-msg").fadeOut("fast");

            $.post(url, { 
                addMenPants: 1,
                dSize: dSize,
                dWaist: dWaist,
            }, function(data) {

                overlay.hide();

                let result = $.trim(data);

                // size exist
                if(result === "size exist") {
                    $(".warning-msg-p").html("The Size <strong> "+ dSize +" </strong> Already exists.");
                    $(".warning-msg").fadeIn("fast");
                    return false;
                }

                // success
                if(result === "success") {
                    $(".success-msg-p").html("The Men's pants Size: <strong> "+ dSize +" </strong> has been added.");
                    $(".success-msg").fadeIn("fast");
                    return false;
                }

                // failed
                if(result === "failed") {
                    $(".warning-msg-p").html("Insertion has failed.");
                    $(".warning-msg").fadeIn("fast");
                    return false;
                }

            });

        });

    /**End add womens pants*/ /////////////////////////////////////

});