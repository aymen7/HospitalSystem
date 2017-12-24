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
                    editable: [[1, 'nom'], [2, 'prenom'], [3, 'numTel'], [4, 'specialite', specilites], [5, 'grade', grades]]
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
        if (name !== '') {
            url = '?ajax=searchSugesstions&name=' + name;
            $.ajax(url).done(function (data) {
                $('.search-suggestions').html(data);
            })
        } else {
            $('.search-suggestions').html('');
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
    $(document).on('focusout', '#search-bar', function () {
        $('.search-suggestions').html('');
    });
    /*----------------------------------------------------------*/

    /*----------------------------------------------------------------*/
    //ajax for stats div
    $(document).on('click', '.stat a', function (event) {
        event.preventDefault();
        url = $(this).attr('href');

        $.ajax(url).done(function (data) {
            $('.doctors-control').html(data);
            initTabledit();
            $('.modal').modal();
        });

    });
    /*----------------------------------------------------------------*/


});//end of the document ready
