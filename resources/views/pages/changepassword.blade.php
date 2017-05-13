@extends('pages.layout')
@section('main')
	
	<div class="container page-content edit-profile">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <!-- NAV TABS -->
            
       
           <div class="tab-pane settings" id="settings-tab">
              <form class="form-horizontal" method="post" action="changepassword" id="form_changepassword">
              {{csrf_field()}}
                <fieldset>
                  <h3><i class="fa fa-square "></i> Change Password for {{$email}}</h3>
                
                  <hr>
                  <input type="hidden" name="email" value="{{$email}}">
                  <div class="form-group">
                    <label for="password" class="col-sm-3 control-label">New Password</label>
                    <div class="col-sm-4">

                      <input type="password" id="password" required maxlength="50" minlength="6" name="password" class="form-control">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="password2" class="col-sm-3 control-label">Repeat Password</label>
                    <div class="col-sm-4">
                      <input type="password" id="password2" required maxlength="50" minlength="6" name="password2" class="form-control">
                    </div>
                  </div>
                </fieldset>
                
                
              </form>
             <p class="text-center"><a id="submit" class="btn btn-custom-primary"><i class="fa fa-floppy-o"></i> Save Password</a></p>
            </div>
        </div> 


     
    </div>
    </div>

   <script type="text/javascript">
  $(document).ready(function() {
    $(window).on('keydown', function(e) {
      if (e.which == 13) {
        return false;
      }
    });
    $("#submit").click(function(event) {
      if($("#password").val()==$("#password2").val())
      {
        if($("#password").val()=='')
        {
          $("#password").css({
            'border-color': 'red',
         });
        }
        else
        {
          if(($("#password").val().length>=6&&$("#password").val().length<50))
          {
            $('#form_changepassword').submit();
          }
          else
          {
            $("#password").css({
              'border-color': 'red',
             });
          }
        }
        
      }
      else
      {
        $("#password").css({
        'border-color': 'red',
      });
      $("#password2").css({
        'border-color': 'red',
      });
      }
    });

  });
</script>
@stop