/**
 * Created by user on 03/11/2017.
 */
$(document).ready(function () {
    /*------------------------selected row script------------*/
    //get the doctors table
    var docTab=$("#doctors-table");
    //function to select a row when clicked
    function selectRow(table) {
        var allRows=$("table tbody tr ");
        allRows.each(function () {
            $(this).click(function clickId() {
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






});//end of the document ready
