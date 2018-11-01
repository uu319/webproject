

    <div class="container">
        <div class="row">
            <div class="col-lg-4"></div>
            <div class="col-lg-4">
                <div class="jumbotron" style="margin-top:120px;">
                    <form id="loginForm" method="post"> 
                        <div class="alert alert-danger" style="display: none"></div>
                         <div class="alert alert-success" style="display: none">
                          
                     </div>



                        <h4>Change your password</h4>

                        <div>
                       <!-- <img src=" alt="Avatar" style="width:50%; margin-left:25%; margin-top:2px; margin-bottom:3px;">-->
                        </div>
                        <input type="hidden" id="type" name="type" value="">
                        <div class="form-group">
                              <input type="password" class="form-control" placeholder="Enter old password" name="oldpass"; id="oldpass">
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control" placeholder="Enter new password" name="newpass"; password="newpass" >
                        </div>
                         <div class="form-group">
                            <input type="password" class="form-control" placeholder="Re-enter new password" name="r_newpass"; password="r_newpass" >
                        </div>
                        <a href="" type="submit" class="btn btn-dark form-control" id="confirm">Confirm</a>
                        <a href="<?php echo base_url('grading/')?>">Back</a>
                    </form>
                </div>
            </div>
            <div class="col-lg-4"></div>
        </div>
    </div>  

<script>
    $(document).ready(function(){
        $('#confirm').click(function(e){
            e.preventDefault();
            var url='<?php echo base_url('grading/teacherChangePass')?>'
            var data=$('#loginForm').serialize();
            var oldpass= $('input[name=oldpass]');
            var newpass=$('input[name=newpass]');
            var r_newpass=$('input[name=r_newpass]');
            var result=0;
            if(oldpass.val()==''){
                oldpass.addClass('is-invalid');
                  oldpass.attr('placeholder','Old password required');
               
            }else{
                oldpass.removeClass('is-invalid');
                result++;
            }
            if(newpass.val()==''){
                newpass.addClass('is-invalid');
                newpass.attr('placeholder','new password required');
            }else{
                 newpass.removeClass('is-invalid');
                result++;
            }
            if(newpass.val()!=r_newpass.val()){
                 r_newpass.addClass('is-invalid');
                newpass.addClass('is-invalid');
                 $('div.alert-danger').text('Password not matched!');
                  $( "div.alert-danger" ).fadeIn( 300 ).delay( 1500 ).fadeOut( 400 );
            }else{
                 newpass.removeClass('is-invalid');
                  r_newpass.removeClass('is-invalid');
                result++;
            }
            
            if(result==3){
                $.ajax({
                    type:'ajax',
                    method:'post',
                    url:url,
                    data:{'newpass':newpass.val(),'oldpass':oldpass.val()},
                    async:false,
                    dataType:'json',
                    success:function(data){
                        if(data.success==true){
                             $('div.alert-success').text('Success!');
                    $( "div.alert-success" ).fadeIn( 300 ).delay( 500 ).fadeOut( 300 );
                    oldpass.val('');
                    newpass.val('');
                    r_newpass.val('');
                          //window.location.href="<?php echo base_url('grading/v_sHome')?>"
                        }else{
                        $('div.alert-danger').text(data.message);
                    $( "div.alert-danger" ).fadeIn( 300 ).delay( 1500 ).fadeOut( 400 );
                        }
                       
                    },
                    error:function(){}
                });
           }
        });
    })
</script>
