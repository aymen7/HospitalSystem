/**
 * Created by user on 03/11/2017.
 */
$(document).ready(function () {
    /*------------------------nice scroll----------------------------*/
    $(function() {
        $("aside").niceScroll({cursorcolor:"rgba(40,86,182,.7)"});
    });
    /*-------------------------------------------------------------*/
   /*---------------------------aside setting-----------------------*/
   function hideShowMenu(btn,menu) {
       btn.click(function () {
           menu.slideToggle();
       });
   }

   hideShowMenu($('#item-header1'),$('#item-body1'));
   hideShowMenu($('#item-header2'),$('#item-body2'));
   hideShowMenu($('#item-header3'),$('#item-body3'));
   hideShowMenu($('#item-header4'),$('#item-body4'));

/*------------------------------------------------------------------*/
    //get the doctors table
    var docTab=$("#doctors-table");
    /*------------------------selected row -------------------------*/

    //function to select a row when clicked
    function selectRow(table) {
        var allRows=$("table tbody tr ");
        var flag=false;
        allRows.each(function () {
            $(this).dblclick(function clickId() {
                for(var i=0;i<allRows.length;i++){
                    if ($(allRows[i]).hasClass('selectedRow')){
                        //var flag is to decide whatever we mark the row selected after the db click
                        flag=true;
                        break;
                    }//if
                }//for

                if($(this).hasClass('selectedRow')) flag=false;

                if(!flag ){

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
                }//there is no row selected previously

            });//end of the dbclick
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
                   var id = $(this).children(":first-child").text();
                   var query = '?do=delete&id=' + id;
                   sendAjaxQuery(query);
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

               }//if has selectedRow class
           });//loop
        });//click

    }
    deleteUser(docTab);

    /*-------------------------------------------------------------*/
    /*-------------------------edit User---------------------------*/
    function editUser(table) {
        var allRows=$("table tbody tr "),
            editBtn=$('.pencil-btn');
        var rowTd;
        editBtn.click(function () {
            //loop all row
            allRows.each(function () {
                //test if the current row is selected
                if($(this).hasClass("selectedRow")){
                    //make array of the row's tds
                    rowTd=$(this).children('td');
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
            var query = '?do=update&id='+rowTd[0].innerText+'&nom='+rowTd[1].innerText+'&prenom='+rowTd[2].innerText
                +'&numTel='+rowTd[3].innerText+'&specialite='+rowTd[4].innerText+'&grade='+rowTd[5].innerText;
            sendAjaxQuery(query);
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
    /*------------------------search function----------------------*/
    function search(word,tag) {
        //stock the original search word without manipulation to display later
        var wordOriginal=word;
        //get the tag val
        var tagVal=tag.val();
        //alert('called the search function with word :'+word +' and tag :'+tagVal);
        //turn the search word into all lowercase for easy manipulation
        //and replace all the white spaces with empty character (delete them)
        word=word.toString().toLocaleLowerCase().replace(/ /g,'');
        //result var is for testing is there any result for the search
        var result=false;
        switch (tagVal){
            case "nom":
                var allNomTd=$('.doctor-nom');
                //loop through all of them
                allNomTd.each(function () {
                    if($(this).text().toString().toLocaleLowerCase().replace(/ /g,'')===word){
                        var rowId=$(this).parent('tr').children('.doctor-id').text();
                        result=true;
                        alert('the found user id is :'+rowId);
                    }//end of the if
                });//end of the loop
                break;
            case "prenom":
                var allPreNomTd=$('.doctor-prenom');
                //loop through all of them
                allPreNomTd.each(function () {
                    if($(this).text().toString().toLocaleLowerCase().replace(/ /g,'')===word){
                        var rowId=$(this).parent('tr').children('.doctor-id').text();
                        result=true;
                        alert('the found user id is :'+rowId);
                    }//end of the if
                });//end of the loop
                break;
            case "tel":
                var allTelTd=$('.doctor-tel');
                //loop through all of them
                allTelTd.each(function () {
                    if($(this).text().toString().toLocaleLowerCase().replace(/ /g,'')===word){
                        var rowId=$(this).parent('tr').children('.doctor-id').text();
                        result=true;
                        alert('the found user id is :'+rowId);
                    }//end of the if
                });//end of the loop
                break;
            case "specialite":
                var allSpeTd=$('.doctor-specialite');
                //loop through all of them
                allSpeTd.each(function () {
                    if($(this).text().toString().toLocaleLowerCase().replace(/ /g,'')===word){
                        var rowId=$(this).parent('tr').children('.doctor-id').text();
                        result=true;
                        alert('the found user id is :'+rowId);
                    }//end of the if
                });//end of the loop
                break;
            case "grade":
                var allGraTd=$('.doctor-grade');
                //loop through all of them
                allGraTd.each(function () {
                    if($(this).text().toString().toLocaleLowerCase().replace(/ /g,'')===word){
                        var rowId=$(this).parent('tr').children('.doctor-id').text();
                        result=true;
                        alert('the found user id is :'+rowId);
                    }//end of the if
                });//end of the loop
                break;

        }//end of the switch
        //if there is no result for the search
        if(!result){
            alert('there is no result for your search');
        }

    }//end of the search function
    //call the function
    function submitSearchForm(form) {
        $(form).submit(function( event ) {
            var wordSearched=$('#search-field').val();
            var formTag=$('select[name=search-option]');
            //console.log('word :'+wordSearched);
            search(wordSearched,formTag);
            event.preventDefault()
        });
    }
    submitSearchForm("#search-form");
    /*-------------------------------------------------------------*/
    /*-----------previous and next page ajax function-------------*/

    $(document).on('click', '.previousPage, .nextPage', function (event) {
        event.preventDefault();
        url = $(this).attr("href");
        $.ajax(url).done(function (data) {
            $('.doctors-control').replaceWith(data);
            selectRow(docTab);
            deleteUser(docTab);
            editUser(docTab);
        });
        
    })

    /*-----------------------------------------------------------*/
    /*---------------------send ajax query-----------------------*/
    function sendAjaxQuery(query){
        $.ajax(query).done(function (data) {
            console.log(data);
        });
    }


    /*-----------------------------------------------------------*/




});//end of the document ready
