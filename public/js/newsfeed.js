 $(document).ready(function() {

         

    function escapeHtml(unsafe) {
    return unsafe
         .replace(/&/g, "&amp;")
         .replace(/</g, "&lt;")
         .replace(/>/g, "&gt;")
         .replace(/"/g, "&quot;")
         .replace(/'/g, "&#039;");
    }
      //ấn like
      $('#newsfeed').on('click', '#like', function(event) {

          var id;
          id=$(this).data('post_id');

          $(this).html('Đã Thích').css({
                'border-color': 'blue',
                'color':'blue'
              }).attr('id', 'dislike');

               
              $('#'+id+'_like_count').html( parseInt($('#'+id+'_like_count').html())+1);

          $.post('ajax/like', {post_id: id}, function(data, textStatus, xhr) {
           
          });
      });


      //ấn dislike
      $('#newsfeed').on('click', '#dislike', function(event) {

        $(this).html('<i class="fa fa-thumbs-o-up"></i> Thích').css({
          'border-color': '#ddd',
          'color':'#444'
        }).attr('id', 'like');
        var id=$(this).data('post_id');
          $('#'+id+'_like_count').html( parseInt($('#'+id+'_like_count').html())-1);
           $.post('ajax/post', {post_id: id}, function(data, textStatus, xhr) {
           
          });
      });

      //khi comment

      $('#newsfeed').on('submit', '#comment_form', function(event) {
           var id;
          id=$(this).data('post_id');
          var comment=$('#'+id+'_content_comment').val();
          var image=$(this).find('img').attr('src');
          var name=$(this).find('img').attr('name');

          var d = new Date();
          var time=d.getHours()+':'+d.getMinutes()
          if(comment==='')
          {
            
          }
          else
          {

           

             $.post('ajax/comment', {post_id: id,content:comment}, function(data, textStatus, xhr) {
              
                    $('#'+id+'_box_comment').append('<div class=\"box-comment\"><img class=\"img-circle img-sm\" src=\"'+image+'\" alt=\"User Image\"> <div class=\"comment-text\"><span class=\"username\"> <a href=\"#\"> '+name+'</a><span class=\"text-muted pull-right\">'+time+'</span> </span>'+escapeHtml(comment)+'</div></div>');
                    $('#'+id+'_content_comment').val('');

                    $('#'+id+'_comment_count').html( parseInt($('#'+id+'_comment_count').html())+1);
              

             });

          }

       event.preventDefault();

      });
      
       
     
     



       $.ajaxSetup({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
      });


       $('#get_place').click(function(event) {
          if (navigator.geolocation) {
         navigator.geolocation.getCurrentPosition(showLocation);
         } else { 
          alert('ban phai cho phap lay vi tri');
        }      

       });
        

        $('#post_form').click(function(event) {
          $("#fm_post").submit();
        });
      $("#fm_post").validate();
 
function showLocation(position) {

    var latitude = position.coords.latitude;
    var longitude = position.coords.longitude;

      $('#latitude').val(latitude);
      $('#longtitude').val(longitude);
    $.ajax({
        type:'POST',
        url:'ajax/getposition',
        data:'latitude='+latitude+'&longitude='+longitude,
        success:function(msg){
            if(msg){
             
              $("#place").show();
               $("#place").val(msg);
            }else{
               $("#get_place").hide();
                $("#place").val('Not Available');
            }
        }
    });
      }
});


     