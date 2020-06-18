$(function() {

    const overlay = $('#overlay');

    let catSuccess = $("#catSuccess");
    let catDanger = $("#catDanger");

    let subtypeTitle = $("input#subtypeTitle");
    let subcategory = $("#subcategory");
    let proBrand = $("#proBrand");
    let addSubTypeBtn = $("button#addSubTypeBtn");
    let subCatTableTbodyTr = $("table#subCatTable >tbody >tr");

    $("table#subTypeTable").DataTable();

    /**
     * Add sub type
    */

    // click add sub type button
    addSubTypeBtn.on('click', function(e) {

        e.preventDefault();

        // check if value is not empty
        if(subtypeTitle.val() === "") {
            $("p.subtype-help").html("Sub-type title cannot be empty.");
            return false;
        } else {
            $("p.subtype-help").html("");
        }

        let subtype = subtypeTitle.val();
        let brand = proBrand.val();
        let sid = subcategory.val();

        let url = "../includes/addSubType.php";

        $.post(url, { addSubType : 1, subtype : subtype, brand : brand, sid : sid }, function(data) {

            let result = $.trim(data);

            // exits
            if(result === "sub type exists") {

                $("p.catDangerP").html("That Sub Type title already exists.");
                catDanger.fadeIn("slow", function(){
                    setTimeout(function(){
                        catDanger.fadeOut("slow");
                    }, 3000);
                });

                return false;

            }

            // exits
            if(result === "success") {

                location.reload();

            }

        });

    });

    // keyup sub type title
    subtypeTitle.on('keyup', function(e) {

        // check key code
        if(e.keyCode === 13) {

            addSubTypeBtn.click();

        } else {

            // check if value is not empty
            if(subtypeTitle.val() === "") {
                $("p.subtype-help").html("Sub-type title cannot be empty.");
            } else {
                $("p.subtype-help").html("");
            }

        }

    });

    // on change product brand
    proBrand.on('change', function(e) {

        // check value of select
        if(proBrand.val() !== "") {
            $("p.bra-help").html("");
        } else {
            $("p.bra-help").html("Please select a valid product brand.");
        }

    });

    // on click deleteCat
    $('body').on('click', 'a.deleteSubType', function(e) {

        e.preventDefault();

        let deleteId = $(this).attr('sid');

        swal({
            title: "Are you sure?",
            text: "Once deleted, you will not be able to recover the sub-type!",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
        .then((willDelete) => {

            if(willDelete) {

                let url = "../includes/addSubType.php";

                overlay.show();

                $.post(url, { deleteCat: 1, deleteId: deleteId }, function(data) {

                    let result = $.trim(data);
                    let catTableBodyToDelete = $("table#subTypeTable >tbody >tr");
                    let tableCountCatToDelete = catTableBodyToDelete.length;

                    overlay.hide();

                    if(tableCountCatToDelete === 1){

                        location.reload();

                    } else {

                        // successful deletion
                        if(result === "Delete Successful"){

                            // get table row
                            let rowToRemove = $("table#subTypeTable >tbody >tr#subtype-"+deleteId+"");

                            // remove row
                            rowToRemove.remove();

                            $("p.catSuccessP").html('Sub-Type deleted successfully!');
                            catSuccess.fadeIn('slow', function() {
                                setTimeout(function(){
                                    catSuccess.fadeOut('slow')
                                }, 3000);
                            });

                        }

                    }

                    // sub type does not exist
                    if(result === "sub type does not exist"){

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

    ///////////////////////////////////////////////////////////////

});