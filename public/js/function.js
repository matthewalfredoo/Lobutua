//upload file
$(".custom-file-input").on("change", function () {
    var fileName = $(this).val().split("\\").pop();
    $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
});

//tabs
$(document).ready(function () {
    $("#tabs").tabs();
});

$(window).on("load", function () {
    $(window).scroll(function () {
        var windowBottom = $(this).scrollTop() + $(this).innerHeight();
        $(".garis").each(function (){
            var objectBottom = $(this).offset().top + $(this).outerHeight();
            
            if (objectBottom < windowBottom) { //object comes into view (scrolling down)
                $(this).animate({
                    width:'100%',
                }, 1500);
                // console.log(this);
            }
        });

        $(".fade").each(function () {
            /* Check the location of each desired element */
            var objectBottom = $(this).offset().top + $(this).outerHeight();

            /* If the element is completely within bounds of the window, fade it in */
            if (objectBottom < windowBottom) { //object comes into view (scrolling down)
                if ($(this).css("opacity") == 0) { $(this).fadeTo(500, 1); }
            }
            // else { //object goes out of view (scrolling up)
            //   if ($(this).css("opacity") == 1) { $(this).fadeTo(500, 0); }
            // }
        });
    }).scroll(); //invoke scroll-handler on page-load
});
