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

        $(".table-section tr td").parent("tr").hide();

        $(".table-section tr td").eq(0).parent("tr").show();

        $(".table-section tr ." + target).each(function() {

            $(this).parent("tr").show();

        });




        return false;


    });

    $(".pager-section li .all").click(function() {


        $(".table-section tr td").parent("tr").show();


        return false;

    });


    // Add Multi Price For Service 

    var num = $("#numberprice").attr("value");
    num = parseInt(num);


    $("#addnewprice").click(function() {

        $("#numberprice").attr("value", ++num);



        var append = '<div class="form-group">';
        append += ' <label for="name" class="col-sm-2 control-label">Price ' + num + '</label>';
        append += ' <div class="col-sm-10">';
        append += ' <input type="text" name="name' + num + '" class="form-control" id="name" placeholder="name">';
        append += ' </div></div>';
        append += ' <div class="form-group">';
        append += ' <label for="fees" class="col-sm-2 control-label">Fees ' + num + '</label>';
        append += ' <div class="col-sm-10"> ';
        append += ' <input type="text" name="fees' + num + '" class="form-control" id="fees" placeholder="fees">';
        append += ' </div></div>';









        $(".formpricefees").append(append);


    });

});