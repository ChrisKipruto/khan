$(function() {

    const overlay = $('#overlay');

    /**
     * Sub categories
    */

    let subCatInput = $("input#subCatInput");
    let catId = $("input#catId");
    let addSubCatBtn = $("button#addSubCatBtn");
    let subCatTableTbodyTr = $("table#subCatTable >tbody >tr");

    let catSuccess = $("#catSuccess");
    let catDanger = $("#catDanger");

    // sub cat input on keyup
    subCatInput.on('keyup', function(event) {

        // check key code
        if(event.keyCode === 13) {
            addSubCatBtn.click();
        } else {
            
            if(subCatInput.val() == "") {
                $("p.subcat-help").html("Sub Category is required.");
            } else {
                $("p.subcat-help").html("");
            }

        }

    });

    // on click add sub cat button
    addSubCatBtn.on('click', function(event) {

        // check sub cat input
        if(subCatInput.val() == "") {
            $("p.subcat-help").html("Sub Category is required.");
            subCatInput.focus();
            return false
        } else {
            $("p.subcat-help").html("");
        }

        let url = "../includes/addSubCategory.php";
        let subCategory = subCatInput.val();
        let categoryId = catId.val();

        // modal add sub cat
        if(subCatTableTbodyTr.length === 0) {

            $.post(url, { addSubCat: 1, subCategory: subCategory, categoryId: categoryId }, function(data) {

                console.log(data);

                // success
                let result = $.trim(data);

                // no category
                if(result === "No such Category"){

                    $("p.catDangerP").html(result);
                    catDanger.fadeIn("slow", function(){
                        setTimeout(function(){
                            catDanger.fadeOut("slow");
                        }, 3000);
                    });

                    return false;

                }

                // no category
                if(result === "Sub title exists"){

                    $("p.catDangerP").html(result);
                    catDanger.fadeIn("slow", function(){
                        setTimeout(function(){
                            catDanger.fadeOut("slow");
                        }, 3000);
                    });

                    return false;

                }

                // success insertion
                if(JSON.parse(data).subcategory_title === subCategory){

                    location.reload();

                }

                // failed insertion
                if(result === "failed"){

                    $("p.catDangerP").html(result);
                    catDanger.fadeIn("slow", function(){
                        setTimeout(function(){
                            catDanger.fadeOut("slow");
                        }, 3000);
                    });

                    return false;

                }

            });
            
        } else {

            $.post(url, { addSubCat: 1, subCategory: subCategory, categoryId: categoryId }, function(data) {

                // success
                let result = $.trim(data);

                // no category
                if(result === "No such Category"){

                    $("p.catDangerP").html(result);
                    catDanger.fadeIn("slow", function(){
                        setTimeout(function(){
                            catDanger.fadeOut("slow");
                        }, 3000);
                    });

                    return false;

                }

                // no category
                if(result === "Sub title exists"){

                    $("p.catDangerP").html(result);
                    catDanger.fadeIn("slow", function(){
                        setTimeout(function(){
                            catDanger.fadeOut("slow");
                        }, 3000);
                    });

                    return false;

                }

                // success insertion
                if(JSON.parse(data).subcategory_title === subCategory){

                    if(subCatTableTbodyTr.length >= 1){

                        $("p.catSuccessP").html('Sub Category added successfully!');
                        catSuccess.fadeIn("slow", function(){
                            setTimeout(function(){
                                catSuccess.fadeOut("slow");
                            }, 3000);
                        });

                        let toAppend = $("table#subCatTable >tbody >tr:last");

                        toAppend.after('<tr class="border-b" id="subcategory-'+JSON.parse(data).id+'"> ' + 
                        '<td class="pl-3 cursor-pointer">' +
                        '<span class="font-bold tracking-wide black-text" sid="'+ JSON.parse(data).id +'"> ' + 
                            '<a href="subcategory.php?id=' + JSON.parse(data).id + '"> ' + JSON.parse(data).subcategory_title + ' </a>' +
                        '</span>' +
                        ' </td>' +
                        '<td class="text-center">' +
                            '<a href="" class="pr-2 outline-none red-text deleteSubCat" sid="'+ JSON.parse(data).id +'">' +
                                '<i class="fas fa-trash"></i>' +
                            '</a>' +
                        '</td>' +
                    '</tr>');

                    } else {

                        location.reload();

                    }

                }

                // failed insertion
                if(result === "failed"){

                    $("p.catDangerP").html(result);
                    catDanger.fadeIn("slow", function(){
                        setTimeout(function(){
                            catDanger.fadeOut("slow");
                        }, 3000);
                    });

                    return false;

                }

            });

        }

    });

    // on click deleteCat
    $('body').on('click', 'a.deleteSubCat', function(e) {

        e.preventDefault();

        let deleteId = $(this).attr('sid');

        swal({
            title: "Are you sure?",
            text: "Once deleted, you will not be able to recover the sub category!",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
        .then((willDelete) => {

            if(willDelete) {

                let url = "../includes/addSubCategory.php";

                overlay.show();

                $.post(url, { deleteCat: 1, deleteId: deleteId }, function(data) {

                    let result = $.trim(data);
                    let catTableBodyToDelete = $("table#subCatTable >tbody >tr");
                    let tableCountCatToDelete = catTableBodyToDelete.length;

                    overlay.hide();

                    if(tableCountCatToDelete === 1){

                        location.reload();

                    } else {

                        // successful deletion
                        if(result === "Delete Successful"){

                            // get table row
                            let rowToRemove = $("table#subCatTable >tbody >tr#subcategory-"+deleteId+"");

                            // remove row
                            rowToRemove.remove();

                            $("p.catSuccessP").html('Sub Category deleted successfully!');
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

    /////////////////////////////////////////////////////////////////////////////


});