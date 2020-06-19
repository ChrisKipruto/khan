$(function() {

    /**
     * Measurements
    */

    const preload = $("span#preload");
    let gender = $("select#gender");
    let measurementCategory = $("select#measurementCategory");
    let measurementSubCategory = $("select#measurementSubCategory");
    let measurementSubType = $("select#measurementSubType");
    let measurementSize = $("#measurementSize");
    let measurementWaist = $("#measurementWaist");
    let measurementLength = $("#measurementLength");
    let measurementChest = $("#measurementChest");
    let measurementHip = $("#measurementHip");
    let measurementShoeSize = $("#measurementShoeSize");
    let addMeasurementBtn = $("#addMeasurementBtn");
    let addMeasurementForm = $("#addMeasurementForm");

    // on change gender
    gender.on('change', function() {

        // check gender
        if(gender.val() === "") {
            $("p.gender-help").html('Please Select Gender');
        } else {
            $("p.gender-help").html('');
        }

    });

    // on change get sub cat
    measurementCategory.on('change', function(e) {

        let catId = measurementCategory.val();

        if(catId == ""){
            $("p.measureCat-help").html("Please select valid category");
            measurementSubCategory.html('');
            measurementSubType.html('');
        } else {

            $("p.measureCat-help").html("");

            let url = "../includes/addMeasurement.php";

            preload.show();

            $.post(url, { getSubCategory: 1, catId: catId }, function(data) {

                var result = $.trim(data);

                preload.hide();

                measurementSubType.html('');

                // no category
                if(result === "No such Category") {
                    $("p.measureCat-help").html("No such Category");
                    measurementSubCategory.html(data);
                    measurementSubType.html('');
                    return false;
                }

                // no sub category
                if(result === "No subcategory") {
                    $("p.measureCat-help").html("No subcategory");
                    measurementSubCategory.html(data);
                    measurementSubType.html('');
                    return false;
                }

                measurementSubCategory.html(data);

            });

        }

    });

    // on change get sub cat
    measurementSubCategory.on('change', function(e) {

        let subcatId = measurementSubCategory.val();

        if(subcatId == ""){
            $("p.measureSubCat-help").html("Please select valid sub-category");
            measurementSubType.html('');
        } else {

            $("p.measureSubCat-help").html("");

            let url = "../includes/addMeasurement.php";

            preload.show();

            $.post(url, { getSubType: 1, subcatId: subcatId }, function(data) {

                var result = $.trim(data)

                preload.hide();

                // no sub type
                if(result === "No sub type") {
                    $("p.measureSubCat-help").html("No sub type");
                    measurementSubType.html(data);
                    return false;
                }

                measurementSubType.html(data);

            });

        }

    });

    //  on change sub type
    measurementSubType.on('change', function() {

        // check gender
        if(measurementSubType.val() === "") {
            $("p.measureSubType-help").html('Please Select the product sub type');
        } else {
            $("p.measureSubType-help").html('');
        }

    });

    // on key up
    measurementSize.on('keyup', function(e) {

        // check key code
        if(e.keyCode === 13) {
            addMeasurementBtn.click();
        }

    });

    // on key up
    measurementWaist.on('keyup', function(e) {

        // check key code
        if(e.keyCode === 13) {
            addMeasurementBtn.click();
        }

    });

    // on key up
    measurementLength.on('keyup', function(e) {

        // check key code
        if(e.keyCode === 13) {
            addMeasurementBtn.click();
        }

    });

    // on key up
    measurementChest.on('keyup', function(e) {

        // check key code
        if(e.keyCode === 13) {
            addMeasurementBtn.click();
        }

    });

    // on key up
    measurementHip.on('keyup', function(e) {

        // check key code
        if(e.keyCode === 13) {
            addMeasurementBtn.click();
        }

    });

    // on key up
    measurementShoeSize.on('keyup', function(e) {

        // check key code
        if(e.keyCode === 13) {
            addMeasurementBtn.click();
        }

    });

    // on submit measurement info
    addMeasurementForm.on('submit', function(e) {

        e.preventDefault();

        // check gender
        if(gender.val() === "") {
            $("p.gender-help").html('Please Select Gender');
            return false;
        } else {
            $("p.gender-help").html('');
        }

        // check measurement
        if(measurementCategory.val() === "") {
            $("p.measureCat-help").html('Please Select the product category');
            return false;
        } else {
            $("p.measureCat-help").html('');
        }

        // check measureSubCat
        if(measurementSubCategory.val() === "") {
            $("p.measureSubCat-help").html('Please Select the product sub category');
            return false;
        } else {
            $("p.measureSubCat-help").html('');
        }

        // check gender
        if(measurementSubType.val() === "") {
            $("p.measureSubType-help").html('Please Select the product sub type');
            return false;
        } else {
            $("p.measureSubType-help").html('');
        }

    });

    //////////////////////////////////////////////////////////////////////////

});