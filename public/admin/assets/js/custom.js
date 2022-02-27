(function($){
$(document).ready(function(){


$('a#logout').click(function(e){

	e.preventDefault();

	$('form#logout_form').submit();



});

 //CK-editor

 CKEDITOR.replace( 'ckeditor' );

  //image-preview

  $(document).on('change','input#fimg',function(e){
    e.preventDefault();
    let post_img_url =URL.createObjectURL(e.target.files[0]);
    $('img#feather_img').attr('src',post_img_url);
    $('#first').hide();
    $('#second').show();
});

 /**
         *  Category Update Model Show
         */

  $('.update_cat').click(function(e){
    e.preventDefault();

   $id = $(this).attr('edit_id');
   $.ajax({
    url:'postCategory/'+ $id+'/edit' ,
    success:function(data){

        $('#edit_cat_modal form input[name="cat_name"]').val(data.name);
        $('#edit_cat_modal form input[name="cat_id"]').val(data.id);
        $('#edit_cat_modal').modal('show');

    }


      });

});


 /**
         *  Tag Update Model Show
         */

  $('.update_tag').click(function(e){
    e.preventDefault();

   $id = $(this).attr('edit_id');
   $.ajax({
    url:'postTag/'+ $id+'/edit' ,
    success:function(data){

        $('#edit_tag_modal form input[name="tag_name"]').val(data.name);
        $('#edit_tag_modal form input[name="tag_id"]').val(data.id);
        $('#edit_tag_modal').modal('show');

    }


      });

});

        // Data table set Up
        $(document).ready( function () {
            $('#post_table').DataTable();
        } );


        //  Category delete fix
        $('.del_button').click(function(){
            let conf= confirm('Ary you sure');
            if(conf==true)
            {
                return true;
            }
            else{
                return false;
            }

         });

// PAge seo title setup

var title_max = 60;

$('#titlearea').keyup(function() {
    $('#titlearea_feedback').html(title_max + ' characters remaining');
    var text_length = $('#titlearea').val().length;
    var text_remaining = title_max - text_length;

    $('#titlearea_feedback').html(text_remaining + ' characters remaining');
});

// PAge seo charecter setup
var text_max = 160;

$('#textarea').keyup(function() {
    $('#textarea_feedback').html(text_max + ' characters remaining');
    var text_length = $('#textarea').val().length;
    var text_remaining = text_max - text_length;

    $('#textarea_feedback').html(text_remaining + ' characters remaining');
});



//Key Up Event for Meta Description

$('#textarea').on('keyup',function(){

    function timer(){
    var name = $('#textarea').val();
    $('#metades').text(name);
      }

   //setTimeout(myFunc,5000);
    setTimeout(timer,100);

  });


  //Key Up Event for Title

$('#titlearea').on('keyup',function(){

    function timer(){
    var name = $('#titlearea').val();
    $('#titledes').text(name);
      }

   //setTimeout(myFunc,5000);
    setTimeout(timer,100);

  });

   //Key Up Event for separator

$('#separator').on('click',function(){

    var name = $('#separator').val();
    $('#sep').text(name);

  });


     //Key Up Event for Page slug

$('#pages').on('click',function(){

    var name = $('#pages').val();
    $('#page').text(name);

  });

   //Key Up Event for Sub Title

$('#subtitlearea').on('keyup',function(){

    function timer(){
    var name = $('#subtitlearea').val();
    $('#subtitle').text(name);
      }

   //setTimeout(myFunc,5000);
    setTimeout(timer,100);

  });





// Menu Fix
         $('#sidebar-menu ul li ul li.ok').parent('ul').slideDown();
         $('#sidebar-menu ul li ul li.ok').parent('ul').parent('li').children('a').addClass('subdrop');
         $('#sidebar-menu ul li ul li.ok a').css('color','#5ae8ff');
         $('#sidebar-menu ul li ul li.ok').parent('ul').parent('li'). children('a') .css('background-color','#19c1dc');


});
})(jQuery)



