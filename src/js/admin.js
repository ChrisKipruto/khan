$(function() {

    // data tables
    $("table#productsTable").DataTable();
    $('.dataTables_length').addClass('bs-select');

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

            }

            // success
            if(JSON.parse(data).brand_title === productBrand){

                $("p.brandSuccessP").html('Brand added successfully!');
                brandSuccess.fadeIn("slow", function(){
                    setTimeout(function(){
                        brandSuccess.fadeOut("slow");
                    }, 3000);
                });

                if(tableCount > 0){
                    let toAppend = $("table#brandsTable >tbody >tr:last");

                    toAppend.after('<tr class="border-b" id="brand-'+JSON.parse(data).id+'"> ' + 
                        '<td class="pl-3 cursor-pointer">' +
                            '<input type="text" id="brandTitle" value="' + JSON.parse(data).brand_title + '" class="w-56 grey lighten-2 font-semibold black-text px-2 py-2 shadow-sm" disabled />'+
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

    ////////////////////////////////////////////////////////////////////////

});