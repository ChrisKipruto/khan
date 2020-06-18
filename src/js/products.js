$(function() {

    const overlay = $("#overlay");
    const addProductForm = $("form#addProductForm");
    let preload = $("span#preload");

    /**
     * product details
    */

    let proTitle = $("#proTitle");
    let proCategory = $("#proCategory");
    let proSubCategory = $("#proSubCategory");
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

});