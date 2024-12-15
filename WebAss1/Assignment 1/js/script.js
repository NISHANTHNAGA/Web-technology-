// script.js
$(document).ready(function() {
    $("nav ul li a").on("click", function(e) {
        $("nav ul li a").removeClass("active");
        $(this).addClass("active");
    });
});
