$(document).ready(function () {

    var current_fs, next_fs, previous_fs; //fieldsets
    var opacity;
    var page = 1;

    $(".next").click(function () {

        current_fs = $(this).parent();
        next_fs = $(this).parent().next();

        // validate entry
        switch (page) {
            // entreprise infos
            case 1:
                if ($("input[name=name]").val() == '' &&
                    $("input[name=address]").val() == '' &&
                    $("input[name=phone]").val() == '' &&
                    $("input[name=city]").val() == '') {
                    break;
                } else if ($("input[name=name]").val() == '' ||
                    $("input[name=address]").val() == '' ||
                    $("input[name=phone]").val() == '' ||
                    $("input[name=city]").val() == '') {
                    alert("Veuillez soit entrer toutes les informations sur l'entreprise, \nsoit veuillez laissez ses champs vide jusqu'à que vous aurez toutes les information sur l'entreprise")
                    return;
                }
                break;
            // encadrant infos
            case 2:
                if ($("input[name=nom_encadrant]").val() == '' &&
                    $("input[name=prenom_encadrant]").val() == '') {
                    break;
                } else if ($("input[name=nom_encadrant]").val() == '' ||
                    $("input[name=prenom_encadrant]").val() == '') {
                    alert("Veuillez soit entrer le nom et le prenom, \nsoit veuillez laissez ses champs vide jusqu'à que vous aurez toutes les information sur votre encadrant")
                    return;
                }
                break;
            // sujet infos    
            case 3:
                if ($("input[name=intitule_sujet]").val() == '' &&
                    $("input[name=description_sujet]").val() == '' &&
                    $("input[name=duree]").val() == '' &&
                    $("textarea[name=techno_utilisees]").val() == '') {
                    alert("L'intitulé et la description du sujet sont obligatoire");
                    return;
                } else if (($("input[name=intitule_sujet]").val() == '' ||
                    $("input[name=description_sujet]").val() == '') &&
                    ($("input[name=duree]").val() != '' ||
                        $("textarea[name=techno_utilisees]").val() != '')) {
                    alert("Veuillez soit entrer l'intitulé et la description, \nsoit veuillez laissez les champs de cette page vide jusqu'à que vous aurez toutes les information sur votre sujet")
                    return;
                }
                break;
            // binome infos    
            case 4:
                if ($("input[name=nom_binome]").val() == '' &&
                    $("input[name=prenom_binome]").val() == '') {
                    break;
                } else if ($("input[name=nom_binome]").val() == '' ||
                    $("input[name=prenom_binome]").val() == '') {
                    alert("Veuillez soit entrer le nom et le prenom, \nsoit veuillez laissez ses champs vide jusqu'à que vous aurez toutes les information sur votre binome")
                    return;
                }
                break;
            default:
                break;
        }

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

        page++;
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

        page--;
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

    // disable submitting form with enter button
    $('.popup').bind('keypress', function (e) {
        if (e.keyCode == 13) { e.preventDefault(); }
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