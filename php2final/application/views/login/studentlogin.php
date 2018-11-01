
    <div class="container">
        <div class="row">
            <div class="col-lg-4"></div>
            <div class="col-lg-4">
                <div class="jumbotron" style="margin-top:120px;">
                    <form id="loginForm" method="post">
                     <div class="alert alert-danger" style="display: none">
                            <strong>Success!</strong> Indicates a successful or positive action.
                     </div>


                        <h4>Login as Student</h4>
                        <div>
                       <!-- <img src="assets/images/student.jpg" alt="Avatar" style="width:50%; margin-left:25%; margin-top:2px; margin-bottom:3px;">-->
                        </div>
                        <div class="form-group">
                            <input type="hidden" id="type" name="type" value="student">
                            <input type="email" class="form-control" placeholder="Enter Username" name="username"; >
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control" placeholder="Enter Password" name="password"; >
                        </div>
                        <a type="button" id="login" class="btn btn-dark form-control">Login</a>
                        <a href="<?php echo base_url('grading/')?>">Back</a>
                    </form>
                </div>
            </div>
            <div class="col-lg-4"></div>
        </div>
    </div>  

    <script>
    $(document).ready(function(){
        $('#login').click(function(e){
            e.preventDefault();
            var url='<?php echo base_url('grading/validateAccount')?>'
            var data=$('#loginForm').serialize();
            var username= $('input[name=username]');
            var password=$('input[name=password]');
            var result=0;
            if(username.val()==''){
                username.addClass('is-invalid');
            }else{
                username.removeClass('is-invalid');
                result++;
            }
            if(password.val()==''){
                 password.removeClass('is-invalid');
                password.addClass('is-invalid');
            }else{
                password.removeClass('is-invalid');
                result++;
            }
            if(result==2){
                $.ajax({
                    type:'ajax',
                    method:'post',
                    url:url,
                    data:data,
                    async:false,
                    dataType:'json',
                    success:function(data){
                        if(data.success==true){
                          window.location.href="<?php echo base_url('grading/v_sHome')?>"
                        }else{
                             $('div.alert-danger').text('Invalid Account!');
                    $( "div.alert-danger" ).fadeIn( 300 ).delay( 1500 ).fadeOut( 400 );
                        }
                       
                    },
                    error:function(){}
                });
          }
        });
    })
</script>
