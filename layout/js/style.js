$(document).ready(function() {

    $('.niceselect').niceSelect();

    $('#chooseFile').bind('change', function() {
        var filename = $(this).val();
        if (/^\s*$/.test(filename)) {
            $(this).parents(".file-upload").removeClass('active');
            $(this).siblings("#noFile").text("No file chosen...");
        } else {
            $(this).parents(".file-upload").addClass('active');
            $(this).siblings("#noFile").text(filename.replace("C:\\fakepath\\", ""));
        }
    });
    //===================================
    // start pager nav section 
    //===================================


    $(".pager-section li a").click(function() {

        var target = $(this).data("target");


        $(this).parent("li").siblings("li").removeClass("active");
        $(this).parent("li").addClass("active");

        $(".table-student tr td").parent("tr").hide();

        $(".table-student tr td").eq(0).parent("tr").show();

        $(".table-student tr ." + target).each(function() {

            $(this).parent("tr").show();

        });




        return false;


    });

    $(".pager-section li .all-student").click(function() {


        $(".table-student tr td").parent("tr").show();


        return false;

    });

});