/**
 * Created by user on 03/11/2017.
 */
$(document).ready(function () {
    /*------------------------nice scroll----------------------------*/
    $(function () {
        $("aside").niceScroll({cursorcolor: "rgba(40,86,182,.7)"});
    });
    /*-------------------------------------------------------------*/

    /*----------------------init Modal-----------------------------*/
    $('.modal').modal();
    /*-------------------------------------------------------------*/

    /*---------------------------aside setting-----------------------*/
    function hideShowMenu(btn, menu) {
        btn.click(function () {
            menu.slideToggle();
        });
    }

    hideShowMenu($('#item-header1'), $('#item-body1'));
    hideShowMenu($('#item-header2'), $('#item-body2'));
    hideShowMenu($('#item-header3'), $('#item-body3'));
    hideShowMenu($('#item-header4'), $('#item-body4'));
    /*------------------------------------------------------------------*/

    /*------------------------init Jquery editable----------------------*/
    function initTabledit() {

        $doctorsTable = $("#doctors-table");
        if ($doctorsTable.length) {
            $doctorsTable.Tabledit({
                url: 'secretaire.php?user=medecin',
                deleteButton: true,
                saveButton: true,
                autoFocus: true,
                buttons: {
                    edit: {
                        class: 'waves-effect btn-flat',
                        html: '<span class="blue-text text-darken-4"><i class="fa fa-edit"></i></span>',
                        action: 'edit'
                    },
                    delete: {
                        class: 'waves-effect waves-red btn-flat',
                        html: '<span class="red-text text-darken-1"><i class="fa fa-trash"></i></span>',
                        action: 'delete'
                    },
                    save: {
                        class: 'waves-effect waves-green btn-flat',
                        html: '<span class="green-text text-darken-2"><i class="fa fa-save"></i></span>'
                    },
                    confirm: {
                        class: 'waves-effect waves-green btn-flat',
                        html: '<span class="green-text text-darken-2"><i class="fa fa-check"></i></span>'
                    }
                },
                columns: {
                    identifier: [0, 'id'],
                    editable: [[1, 'nom'], [2, 'prenom'], [3, 'numTel'], [4, 'specialite', specialites], [5, 'grade', grades]]
                },
                onDraw: function () {
                    $('.tabledit-toolbar .btn-group').css('display', 'inline');
                }
            });
        }

        $patientsTable = $("#patients-table");
        if ($patientsTable.length) {
            $patientsTable.Tabledit({
                url: 'secretaire.php?user=patient',
                deleteButton: true,
                saveButton: true,
                autoFocus: true,
                buttons: {
                    edit: {
                        class: 'waves-effect btn-flat',
                        html: '<span class="blue-text text-darken-4"><i class="fa fa-edit"></i></span>',
                        action: 'edit'
                    },
                    delete: {
                        class: 'waves-effect waves-red btn-flat',
                        html: '<span class="red-text text-darken-1"><i class="fa fa-trash"></i></span>',
                        action: 'delete'
                    },
                    save: {
                        class: 'waves-effect waves-green btn-flat',
                        html: '<span class="green-text text-darken-2"><i class="fa fa-save"></i></span>'
                    },
                    confirm: {
                        class: 'waves-effect waves-green btn-flat',
                        html: '<span class="green-text text-darken-2"><i class="fa fa-check"></i></span>'
                    }
                },
                columns: {
                    identifier: [0, 'id'],
                    editable: [[1, 'nom'], [2, 'prenom'], [3, 'dateDeNaissance'], [4, 'numTel'], [5, 'nss'], [6, 'medecin', medecins]]
                },
                onDraw: function () {
                    $('.tabledit-toolbar .btn-group').css('display', 'inline');
                }
            });
        }

        $infirmiersTable = $("#infirmiers-table");
        if ($infirmiersTable.length) {
            $infirmiersTable.Tabledit({
                url: 'secretaire.php?user=infirmier',
                deleteButton: true,
                saveButton: true,
                autoFocus: true,
                buttons: {
                    edit: {
                        class: 'waves-effect btn-flat',
                        html: '<span class="blue-text text-darken-4"><i class="fa fa-edit"></i></span>',
                        action: 'edit'
                    },
                    delete: {
                        class: 'waves-effect waves-red btn-flat',
                        html: '<span class="red-text text-darken-1"><i class="fa fa-trash"></i></span>',
                        action: 'delete'
                    },
                    save: {
                        class: 'waves-effect waves-green btn-flat',
                        html: '<span class="green-text text-darken-2"><i class="fa fa-save"></i></span>'
                    },
                    confirm: {
                        class: 'waves-effect waves-green btn-flat',
                        html: '<span class="green-text text-darken-2"><i class="fa fa-check"></i></span>'
                    }
                },
                columns: {
                    identifier: [0, 'id'],
                    editable: [[1, 'nom'], [2, 'prenom'], [3, 'numTel'], [4, 'specialite', specialites], [5, 'grade', grades]]
                },
                onDraw: function () {
                    $('.tabledit-toolbar .btn-group').css('display', 'inline');
                }
            });
        }
    }

    $(document).ready(function() {
        initTabledit();
    });

    /*-----------------------------------------------------------------*/

    /*-----------previous and next page ajax function-------------*/

    $(document).on('click', '.previousPage, .nextPage', function (event) {
        event.preventDefault();
        url = $(this).attr("href");
        $.ajax(url).done(function (data) {
            $('.doctors-control').replaceWith(data);
            initTabledit();
        }).fail(function () {

        });
    });

    /*-----------------------------------------------------------*/

    /*---------------------send ajax query-----------------------*/
    function sendAjaxQuery(query) {
        $.ajax(query).done(function (data) {
        });
    }

    /*-----------------------------------------------------------*/

    /*-----------------------Search bar with ajax------------------------*/
    function ajaxSearch(name) {
        $searchSuggestions = $('.search-suggestions');
        if (name !== '') {
            url = '?ajax=searchSugesstions&name=' + name;

            loadingSVG = "<div class='loader loader--style3' title='2'>" +
                "  <svg version='1.1' id='loader-1' xmlns='http://www.w3.org/2000/svg' xmlns:xlink='http://www.w3.org/1999/xlink' " +
                " x='0px' y='0px' width='70px' height='70px' viewBox='0 0 50 50' style='enable-background:new 0 0 50 50;'" +
                " xml:space='preserve'> <path fill='#000' d='M43.935,25.145c0-10.318-8.364-18.683-18.683-18.683c-10.318,0-18.683,8.365-18.683,18.683h4.068c0-8.071,6.543-14.615,14.615-14.615c8.072,0,14.615,6.543,14.615,14.615H43.935z'>" +
                " <animateTransform attributeType='xml' attributeName='transform' type='rotate' from='0 25 25'" +
                " to='360 25 25' dur='0.6s' repeatCount='indefinite'/></path></svg></div>";

            $searchSuggestions.html(loadingSVG);

            $.ajax(url).done(function (data) {
                $searchSuggestions.html(data);
            })
        } else {
            $searchSuggestions.html('');
        }
    }

    //when user start typing in search bar
    $(document).on('input', '#search-bar', function () {
        ajaxSearch($(this).val())
    });
    //when user make the cursor on the search bar
    $(document).on('focusin', '#search-bar', function () {
        ajaxSearch($(this).val())

    });
    //when user remove the cursor from the search bar
    $(document).on('focusout', '.search-form', function () {
         //$('.search-suggestions').html('');
    });
    /*----------------------------------------------------------*/

    /*-----------init tooltip-------------------*/

    function initTooltip() {
        $(document).ready(function(){
            $('.tooltipped').tooltip({delay: 50});
        });
    }
    /*------------------------------------------*/

    /*----------------------------------------------------------------*/
    //ajax for stats div
    $(document).on('click', '.stat a, .buttonDetailsChambre, .search-suggestions a, .link', function (event) {
        event.preventDefault();
        url = $(this).attr('href');
        jsonData = $(this).data('info');
        $.ajax(url).done(function (data) {
            $ordonnanceForm = $('#ordonnanceForm');
            if ($ordonnanceForm.length){
                $('#idPatient').val(jsonData.idPatient);
                $('#nomPatient').val(jsonData.nom);
                $('#prenomPatient').val(jsonData.prenom);
                $('#dateNaissancePatient').val(jsonData.dateDeNaissance);
                $('#nss').val(jsonData.nss);

                Materialize.updateTextFields();
                consultationSubmitState();
            }
            $('#main-wrapper').html(data);
            initTabledit();
            $('.modal').modal();
            initTooltip();
            $('.search-suggestions').html('');

        });

    });
    /*----------------------------------------------------------------*/

    /*-------------------ajouter ligne ordonnance--------------------*/
    $(document).on('click', '#ajouterLigneOrdonnance', function (event) {
        event.preventDefault();
        ligneOrdonnance = "<div class='col s12 ligne'><div class='input-field col s5'><input required type='text'" +
            " id='medicament' name='medicament[]'><label for='medicament'>Médicament</label></div> " +
            "<div class='input-field col s2'><input required type='number' id='quantite' name='quantite[]' " +
            "value='1'><label for='quantite'>Quantité</label></div><div class='input-field col s4'> " +
            "<input type='text' id='remarqueMedicament' name='remarqueMedicament[]'>" +
            "<label for='remarqueMedicament'>Remarque</label></div><div class='col s1'>" +
            "<i class='small material-icons deleteLigneOrdonnance'>delete_sweep</i></div></div>";
        $('.lignesOrdonnance').append(ligneOrdonnance);

        Materialize.updateTextFields();


    });
    /*----------------------------------------------------------------*/

    /*-----------------submit consultation ----------------------------*/
    
    function consultationSubmitState () {
        idPatient = $('#ordonnanceForm #nomPatient').val();
        console.log( $('#ordonnanceForm #nomPatient'));
        $submit = $('#ordonnanceForm button[type="submit"]');
        console.log($submit)
        if (idPatient === '')
            $submit.attr('disabled', true);
        else
            $submit.attr('disabled', false);

    };
    /*-----------------------------------------------------------------*/

    /*-------------------ajouter ligne examen------------------------*/
    $(document).on('click', '#ajouterExamen', function (event) {
        event.preventDefault();
        ligneExamen = "<div class='col s12 ligne'><div class='input-field col s10'><input required type='text' " +
            "id='examen' name='examen[]'><label for='examen'>Examen</label></div><div class='col s1'>" +
            "<i class='small material-icons deleteLigneOrdonnance'>delete_sweep</i></div></div>";
        $(".lignesExamen").append(ligneExamen);

    });

    /*---------------------------------------------------------------*/

    /*--------------------supprimer ligne ordonnance-----------------*/
    $(document).on('click', '.deleteLigneOrdonnance', function () {
        $ligne = $(this).parent().parent();
        $ligne.animate({"margin-left":"100%"}, 700, function () {
            $(this).fadeOut(function () {
                $(this).remove();
            });
        });
    })

    /*---------------------------------------------------------------*/

});//end of the document ready
