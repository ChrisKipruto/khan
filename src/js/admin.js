$(function() {

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

    const overlay = $('#overlay');

    // data tables
    $("table#productsTable").DataTable();
    $('.dataTables_length').addClass('bs-select');

    $("table#brandsTable").DataTable();
    $("table#catsTable").DataTable();
    $("table#subCatTable").DataTable();

    /**
     * add brand
    */

    let brandSuccess = $("#brandSuccess");
    let brandDanger = $("#brandDanger");
    let brand = $("#brand");
    let brandBtn = $("a.addBrandLink");
    let preload = $("span#preload");

    // brand key up
    brand.on('keyup', function(e) {

        if(e.keyCode === 13) {
            // click brandBtn
            brandBtn.click();
        } else {

            if(!/^[a-zA-Z ]*$/gi.test(brand.val())){
                $('p.brand-help').html('Enter a valid product brand (no numbers and special chars).');
            } else {
                $('p.brand-help').html('');
            }

        }

    });

    // on click brandBtn
    brandBtn.on('click', function(event) {

        // prevent normal action
        event.preventDefault();

        if(brand.val() == ""){

            $('p.brand-help').html('Enter a product brand!');
                return false;

        } else {

            if(!/^[a-zA-Z ]*$/gi.test(brand.val())){
                $('p.brand-help').html('Enter a valid product brand (no numbers and special chars).');
                return false;
            }

        }

        preload.show();

        let url = "../includes/post.php";

        let productBrand = brand.val();
        let brandTable = $("table#brandsTable tbody");
        let brandTableBody = $("table#brandsTable >tbody >tr");


        $.post(url, {addBrand: 1, productBrand: productBrand}, function(data) {

            let result = $.trim(data);

            preload.hide();

            let tableCount = brandTableBody.length;

            // exist
            if(result === "Brand title exists"){

                // $('p.brand-help').html();
                $("p.brandDangerP").html(result);
                brandDanger.fadeIn("slow", function(){
                    setTimeout(function(){
                        brandDanger.fadeOut("slow");
                    }, 3000);
                });

                return false;

            }

            // success
            console.log(JSON.parse(data).brand_title);
            if(JSON.parse(data).brand_title === productBrand){

                $("p.brandSuccessP").html('Brand added successfully!');
                brandSuccess.fadeIn("slow", function(){
                    setTimeout(function(){
                        brandSuccess.fadeOut("slow");
                    }, 3000);
                });

                if(tableCount > 1){
                    let toAppend = $("table#brandsTable >tbody >tr:last");

                    toAppend.after('<tr class="border-b" id="brand-'+JSON.parse(data).id+'"> ' + 
                        '<td class="pl-3 cursor-pointer">' +
                            '<span class="font-bold tracking-wide black-text" bid="'+ JSON.parse(data).id +'"> ' + 
                            '<a href="brand.php?id=' + JSON.parse(data).id + '"> ' + JSON.parse(data).brand_title + ' </a>' +
                            '</span>' +
                        ' </td>' +
                        '<td class="text-center">' +
                            '<a href="" class="pr-2 outline-none red-text deleteBrand" bid="'+ JSON.parse(data).id +'">' +
                                '<i class="fas fa-trash"></i>' +
                            '</a>' +
                        '</td>' +
                    '</tr>');

                } else {

                    location.reload();

                }

            }

            // failed
            if(result === "Failed"){
                $("p.brandDangerP").html('Insert has failed!');
                brandDanger.fadeIn("slow", function(){
                    setTimeout(function(){
                        brandDanger.fadeOut("slow");
                    }, 3000);
                });
            }

        });

    });

    // on click deleteBrand
    $('body').on('click', 'a.deleteBrand', function(e) {

        e.preventDefault();

        let deleteId = $(this).attr('bid');

        swal({
            title: "Are you sure?",
            text: "Once deleted, you will not be able to recover the brand!",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
        .then((willDelete) => {

            if(willDelete) {

                let url = "../includes/post.php";

                overlay.show();

                $.post(url, { deleteBrand: 1, deleteId: deleteId }, function(data) {

                    let brandTableBodyToDelete = $("table#brandsTable >tbody >tr");
                    let tableCountToDelete = brandTableBodyToDelete.length;

                    let result = $.trim(data);

                    overlay.hide();

                    if(tableCountToDelete === 1) {

                        location.reload();

                    } else {

                        // successful deletion
                        if(result === "Delete Successful"){

                            // get table row
                            let rowToRemove = $("table#brandsTable >tbody >tr#brand-"+deleteId+"");

                            // remove row
                            rowToRemove.remove();

                            $("p.brandSuccessP").html('Brand deleted successfully!');
                            brandSuccess.fadeIn('slow', function() {
                                setTimeout(function(){
                                    brandSuccess.fadeOut('slow')
                                }, 3000);
                            });

                        }

                    }

                    // brand does not exist
                    if(result === "That brand does not exist"){

                        // $('p.brand-help').html();
                        $("p.brandDangerP").html(result);
                        brandDanger.fadeIn("slow", function(){
                            setTimeout(function(){
                                brandDanger.fadeOut("slow");
                            }, 3000);
                        });
        
                    }

                    // failed deletion
                    if(result === "Delete failed"){

                        // $('p.brand-help').html();
                        $("p.brandDangerP").html(result);
                        brandDanger.fadeIn("slow", function(){
                            setTimeout(function(){
                                brandDanger.fadeOut("slow");
                            }, 3000);
                        });
        
                    }

                });

            }

        });

    });

    // brand counter
    function countBrand() {
        setInterval(function() {

            let url = "../includes/post.php";

            $.post(url, { countBra: 1 }, function(data) {
                $('div#brandTile h2 span').html(data);
            });

        }, 500)
    }

    countBrand();

    ////////////////////////////////////////////////////////////////////////

    /**
     * add category
    */

   let catSuccess = $("#catSuccess");
   let catDanger = $("#catDanger");
   let category = $("#category");
   let catBtn = $("a.addCatLink");

    // category key up
    category.on('keyup', function(e) {

        if(e.keyCode === 13) {
            // click catBtn
            catBtn.click();
        } else {

            if(!/^[a-zA-Z ]*$/gi.test(category.val())){
                $('p.cat-help').html('Enter a valid product category (no numbers and special chars).');
            } else {
                $('p.cat-help').html('');
            }

        }

    });

    // on click catBtn
    catBtn.on('click', function(event) {

        // prevent normal action
        event.preventDefault();

        if(category.val() == ""){

            $('p.cat-help').html('Enter a product category!');
                return false;

        } else {

            if(!/^[a-zA-Z ]*$/gi.test(category.val())){
                $('p.cat-help').html('Enter a valid product category (no numbers and special chars).');
                return false;
            }

        }

        preload.show();

        let url = "../includes/post.php";

        let productCat = category.val();
        let catTable = $("table#catsTable tbody");
        let catTableBody = $("table#catsTable >tbody >tr");


        $.post(url, {addCat: 1, productCat: productCat}, function(data) {

            let result = $.trim(data);

            preload.hide();

            let tableCount = catTableBody.length;

            $("p.catDangerP").html('');
            $("p.catSuccessP").html('');

            console.log(result);

            // exist
            if(result === "Category title exists"){

                // $('p.brand-help').html();
                $("p.catDangerP").html(result);
                catDanger.fadeIn("slow", function(){
                    setTimeout(function(){
                        catDanger.fadeOut("slow");
                    }, 3000);
                });

                return false;

            }

            let proCat = JSON.parse(data).category_title;

            // console.log(JSON.parse(data).category_title);

            // success
            if(proCat === productCat){

                $("p.catSuccessP").html('Category added successfully!');
                catSuccess.fadeIn("slow", function(){
                    setTimeout(function(){
                        catSuccess.fadeOut("slow");
                    }, 3000);
                    $("p.catSuccessrP").html('');
                });

                if(tableCount > 1){
                    let toAppend = $("table#catsTable >tbody >tr:last");

                    toAppend.after('<tr class="border-b" id="category-'+JSON.parse(data).id+'"> ' + 
                        '<td class="pl-3 cursor-pointer">' +
                        '<span class="font-bold tracking-wide black-text" cid="'+ JSON.parse(data).id +'"> ' + 
                            '<a href="category.php?id=' + JSON.parse(data).id + '"> ' + JSON.parse(data).category_title + ' </a>' +
                        '</span>' +
                        ' </td>' +
                        '<td class="text-center">' +
                            '<a href="" class="pr-2 outline-none red-text deleteCat" cid="'+ JSON.parse(data).id +'">' +
                                '<i class="fas fa-trash"></i>' +
                            '</a>' +
                        '</td>' +
                    '</tr>');

                } else {

                    location.reload();

                }

            }

            // failed
            if(result === "Failed"){
                $("p.catDangerP").html('Insert has failed!');
                catDanger.fadeIn("slow", function(){
                    setTimeout(function(){
                        catDanger.fadeOut("slow");
                    }, 3000);
                });
            }

        });

    });

    // on click deleteCat
    $('body').on('click', 'a.deleteCat', function(e) {

        e.preventDefault();

        let deleteId = $(this).attr('cid');

        swal({
            title: "Are you sure?",
            text: "Once deleted, you will not be able to recover the category!",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
        .then((willDelete) => {

            if(willDelete) {

                let url = "../includes/post.php";

                overlay.show();

                $.post(url, { deleteCat: 1, deleteId: deleteId }, function(data) {

                    let result = $.trim(data);
                    let catTableBodyToDelete = $("table#catsTable >tbody >tr");
                    let tableCountCatToDelete = catTableBodyToDelete.length;

                    overlay.hide();

                    if(tableCountCatToDelete === 1){

                        location.reload();

                    } else {

                        // successful deletion
                        if(result === "Delete Successful"){

                            // get table row
                            let rowToRemove = $("table#catsTable >tbody >tr#category-"+deleteId+"");

                            // remove row
                            rowToRemove.remove();

                            $("p.catSuccessP").html('Category deleted successfully!');
                            catSuccess.fadeIn('slow', function() {
                                setTimeout(function(){
                                    catSuccess.fadeOut('slow')
                                }, 3000);
                            });

                        }

                    }

                    // brand does not exist
                    if(result === "category does not exist"){

                        // $('p.brand-help').html();
                        $("p.catDangerP").html(result);
                        catDanger.fadeIn("slow", function(){
                            setTimeout(function(){
                                catDanger.fadeOut("slow");
                            }, 3000);
                        });
        
                    }

                    // failed deletion
                    if(result === "Delete failed"){

                        // $('p.brand-help').html();
                        $("p.catDangerP").html(result);
                        catDanger.fadeIn("slow", function(){
                            setTimeout(function(){
                                catDanger.fadeOut("slow");
                            }, 3000);
                        });
        
                    }

                });

            }

        });

    });

    // categories counter
    countCategory();
    function countCategory() {
        setInterval(function() {

            let url = "../includes/post.php";

            $.post(url, { countCat: 1 }, function(data) {
                $('div#catTile h2 span').html(data);
            });

        }, 500)
    }

    ////////////////////////////////////////////////////////////////////////



    /**
     * Products section
    */

    // count product
    countProducts();
    function countProducts() {
        setInterval(function() {

            let url = "../includes/post.php";

            $.post(url, { countPro: 1 }, function(data) {
                $('div#productTile h2 span').html(data);
                $("span#product-count").html(data);
            });

        }, 500)
    }
    // End count product

    ////////////////////////////////////////////////////////////////////////



    /**
     * Customers section
    */

    // count Customers
    countCustomerss();
    function countCustomerss() {
        setInterval(function() {

            let url = "../includes/post.php";

            $.post(url, { countCust: 1 }, function(data) {
                $('div#customerTile h2 span').html(data);
                $("span#customer-count").html(data);
            });

        }, 500)
    }
    // End count customers

    ////////////////////////////////////////////////////////////////////////

});