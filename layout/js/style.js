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

});