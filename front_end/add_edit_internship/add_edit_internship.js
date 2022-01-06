$(document).ready(function () {

    var current_fs, next_fs, previous_fs; //fieldsets
    var opacity;

    $(".next").click(function () {

        current_fs = $(this).parent();
        next_fs = $(this).parent().next();

        //Add Class Active
        $(".form-text-wrapper").eq($("fieldset").index(next_fs)).addClass("active-text-wrapper");
        $(".form-circle").eq($("fieldset").index(next_fs)).addClass("circle-active");
        $(".form-circle img").eq($("fieldset").index(next_fs)).addClass("form-circle-active-img");
        $(".check-symbol").eq($("fieldset").index(next_fs)).addClass("form-active");

        //show the next fieldset
        next_fs.show();
        //hide the current fieldset with style
        current_fs.animate({ opacity: 0 }, {
            step: function (now) {
                // for making fielset appear animation
                opacity = 1 - now;

                current_fs.css({
                    'display': 'none',
                    'position': 'relative'
                });
                next_fs.css({ 'opacity': opacity });
            },
            duration: 500
        });
    });

    $(".previous").click(function () {

        current_fs = $(this).parent();
        previous_fs = $(this).parent().prev();

        //Remove class active
        $(".form-text-wrapper").eq($("fieldset").index(current_fs)).removeClass("active-text-wrapper");
        $(".form-circle").eq($("fieldset").index(current_fs)).removeClass("circle-active");
        $(".form-circle img").eq($("fieldset").index(current_fs)).removeClass("form-circle-active-img");
        $(".check-symbol").eq($("fieldset").index(current_fs)).removeClass("form-active");

        //show the previous fieldset
        previous_fs.show();

        //hide the current fieldset with style
        current_fs.animate({ opacity: 0 }, {
            step: function (now) {
                // for making fielset appear animation
                opacity = 1 - now;

                current_fs.css({
                    'display': 'none',
                    'position': 'relative'
                });
                previous_fs.css({ 'opacity': opacity });
            },
            duration: 500
        });
    });

    $(".submit").click(function () {
        return false;
    });

    $("form").on("change", ".input_upload", function () {
        $(this).parent(".input_upload_container").css("background-color", "var(--color-grey-medium)");

        $(this).parent(".input_upload_container").attr("data-text",
            $(this).val().replace(/.*(\/|\\)/, ''));

        // $(this).parent(".input_upload_container:after").css({'color': 'red'});
    });

    // for entreprise auto complete
    $(function () {
        $("#nom_entreprise").autocomplete({
            source: "input_search.php",
            select: function (event, ui) {
                $('#nom_entreprise').val(ui.item.label);
                $('#adresse_entreprise').val(ui.item.adresse);
                $("#tel_entreprise").val(ui.item.tel);
                $("#ville_entreprise").val(ui.item.ville);
                return false;
            }
        });
    });

});