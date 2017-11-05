/**
 * Created by user on 03/11/2017.
 */
$(document).ready(function () {

    //get the doctors table
    var docTab=$("#doctors-table");
    /*------------------------selected row -------------------------*/

    //function to select a row when clicked
    function selectRow(table) {
        var allRows=$("table tbody tr ");
        allRows.each(function () {
            $(this).dblclick(function clickId() {
                $(this).toggleClass('selectedRow');
                //edit button toggle
                if($('.pencil-btn').attr('disabled')) {
                    $('.pencil-btn').removeAttr('disabled');
                }
                else{
                    $('.pencil-btn').attr('disabled','disabled');
                }
                //delete button toggle
                if($('.trash-btn').attr('disabled')) {
                    $('.trash-btn').removeAttr('disabled');
                }
                else{
                    $('.trash-btn').attr('disabled','disabled');
                }
            });//end of the click
        });//end of the loop

    }
    //call the function selectedRow()
    selectRow(docTab);

    /*-------------------------------------------------------------*/
    /*-------------------------delete User-------------------------*/

    function deleteUser(table) {
        var allRows=$("table tbody tr "),
                    deleteBtn=$('.trash-btn');
        //click btn
        deleteBtn.click(function () {
            //loop all the rows
           allRows.each(function () {
               if($(this).hasClass("selectedRow")){
                   //delete the row that has the 'selectedRow' class
                   $(this).remove();
                   //delete the class from the row
                   $(this).toggleClass('selectedRow');
                   //init the buttons
                   if($('.trash-btn').attr('disabled')) {
                       $('.trash-btn').removeAttr('disabled');
                   }
                   else{
                       $('.trash-btn').attr('disabled','disabled');
                   }
                   if($('.pencil-btn').attr('disabled')) {
                       $('.pencil-btn').removeAttr('disabled');
                   }
                   else{
                       $('.pencil-btn').attr('disabled','disabled');
                   }

               }
           });
        });

    }
    deleteUser(docTab);

    /*-------------------------------------------------------------*/
    /*-------------------------edit User---------------------------*/
    function editUser(table) {
        var allRows=$("table tbody tr "),
            editBtn=$('.pencil-btn');
        editBtn.click(function () {
            //loop all row
            allRows.each(function () {
                //test if the current row is selected
                if($(this).hasClass("selectedRow")){
                    //make array of the row's tds
                 var rowTd=$(this).children('td');
                 rowTd.each(function () {
                     //make all the td editablble
                     $(this).attr("contentEditable","true");
                 });

                }//if
            });//loop
            //hide the edit btn
           $(this).addClass("hidden");
           //show the confrim btn
            $('.confirm-btn').removeClass('hidden');

        });//click
        //confirm click
        $('.confirm-btn').click(function () {
            //hide the confirm btn
            $(this).addClass("hidden");
            //show the edit btn
            $('.pencil-btn').removeClass('hidden');
            //init button
            if($('.trash-btn').attr('disabled')) {
                $('.trash-btn').removeAttr('disabled');
            }
            else{
                $('.trash-btn').attr('disabled','disabled');
            }
            if($('.pencil-btn').attr('disabled')) {
                $('.pencil-btn').removeAttr('disabled');
            }
            else{
                $('.pencil-btn').attr('disabled','disabled');
            }
            //loop all the row to deselect row
            allRows.each(function () {
                if($(this).hasClass("selectedRow")){
                    $(this).removeClass("selectedRow");
                    //make array of the row's tds
                    var rowTd=$(this).children('td');
                    rowTd.each(function () {
                        //make all the td editablble
                        $(this).attr("contentEditable","false");
                    });
                }
            });
            //TODO ajax call goes here
        });//confirm-btn click
    }//end of editUser
    editUser(docTab);

    /*-------------------------------------------------------------*/
    /*-----------previous and next page ajax function-------------*/

    $(document).on('click', '.previousPage, .nextPage', function (event) {
        event.preventDefault();
        url = $(this).attr("href");
        $.ajax(url).done(function (data) {
            $('.doctors-control').replaceWith(data);
        });
        
    })

    /*-----------------------------------------------------------*/




});//end of the document ready
