    

    <div class="container">
        <div class="row">
            <div class="col-lg-4"></div>
            <div class="col-lg-4">
                <div class="jumbotron" style="margin-top:40px;">
                  <form id="form" action="<?php echo base_url('grading/regStudent')?>" method="post" enctype="multipart/form-data">
                 
                        <h4>Add Student</h4>

                        <div id="uploaded_file"></div>
                        <div>
                      <img id="mypic" src="<?php echo base_url('assets/images/student.jpg')?>" alt="Avatar" style="width:50%; margin-left:25%; margin-top:2px; margin-bottom:3px;">
                         <div class="form-group">
                           
                            <label for="picpath">Select Picture</label>
                            <input type="file" class="form-control-file"  onchange="readURL(this)" id="userfile" name="userfile" class="form-control"; >
                        </div>
                         <div class="alert alert-danger" id="upload" style="display: none"></div>
                         <div class="alert alert-danger" id="passwordCheck" style="display: none"></div>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="First Name"; id="fname" name="fname">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Middle Name"; id="mname" name="mname" >
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Last Name"; id="lname" name="lname" >
                        </div>
                         <div class="form-group">
                            <input type="text" class="form-control" placeholder="Section ID"; id="sc_id" name="sc_id" readonly>
                            <button style="margin-top: 10px" class="btn btn-default form-control" type="button" id=sc_id2>Press to choose section</button>
                        </div>

                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Username" id="username" name="username">
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control" placeholder="Enter Password"; id="password" name="password">
                        </div>
                         <div class="form-group">
                            <input type="password" class="form-control" placeholder="R-enter Password"; id="r_password" name="r_password">
                        </div>
                       
                        <input type="submit" class="btn btn-dark form-control" id="regStudent" name="sube="Add Student">
                         <div class="alert alert-success" id="success" style="display:none; margin-top:20px"></div>
                   </form>
                   <a href="<?php echo base_url('grading/v_aHome')?>">Back</a>
                </div>
            </div>
            <div class="col-lg-4"></div>
        </div>
       
    </div>
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <table class="table">
  <thead class="thead-dark">
    <tr>
      <th>ID</th>
      <th>Name</th>
      <th>Action</th>
    </tr>
  </thead>
  <tbody  id="showdata">
  
  </tbody>
</table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
    <script >
        $(document).ready(function(){
            $('#form').on('submit',function(e){
                e.preventDefault();
                var fname= $('input[name=fname]');
                var mname= $('input[name=mname]');
                var lname= $('input[name=lname]');
                var sc_id= $('input[name=sc_id]');
                var username= $('input[name=username]');
                var password=$('input[name=password]');
                var r_password=$('input[name=r_password]');
                var userfile=$('input[name=userfile]');
                var result=0;

                 if(userfile.val()==''){
                     $('#upload').text('Please upload a photo');
                    $( "#upload" ).fadeIn( 300 );
                   
                }else{
                     $( "#upload" ).fadeOut( 300 );
                    result++;
                }
                if(fname.val()==''){
                    fname.addClass('is-invalid');
                     $('#fname').attr('placeholder', "First name is required").focus();
                }else{
                    fname.removeClass('is-invalid');
                    result++;
                }
                if(mname.val()==''){
                     $('#mname').attr('placeholder', "Middle name is required").focus();
                    mname.addClass('is-invalid');
                }else{
                    mname.removeClass('is-invalid');
                    result++;
                }
                if(lname.val()==''){
                     $('#lname').attr('placeholder', "Last name is required").focus();
                    lname.addClass('is-invalid');
                }else{
                    lname.removeClass('is-invalid');
                    result++;
                }
                if(sc_id.val()==''){
                     $('#sc_id').attr('placeholder', "Section ID is required").focus();
                    sc_id.addClass('is-invalid');
                }else{
                    sc_id.removeClass('is-invalid');
                    result++;
                }
                  if($.isNumeric(sc_id.val())==false){
                     sc_id.val('');
                     $('#sc_id').attr('placeholder', "Section ID should be numeric").focus();
                    sc_id.addClass('is-invalid');
                }else{
                    sc_id.removeClass('is-invalid');
                    result++;
                }
                if(username.val()==''){
                      $('#username').attr('placeholder', "Username is required").focus();
                    username.addClass('is-invalid');
                }else{
                    username.removeClass('is-invalid');
                    result++;
                }
                if(password.val()==''){
                      $('#password').attr('placeholder', "Password is required").focus();
                    password.addClass('is-invalid');
                }else{
                     password.removeClass('is-invalid');
                    result++;
                }
                if(r_password.val()==''){
                      $('#r_password').attr('placeholder', "Re-enter your password").focus();
                    r_password.addClass('is-invalid');
                }else{
                     r_password.removeClass('is-invalid');
                    result++;
                }
                if(r_password.val()!==password.val()){
                     r_password.addClass('is-invalid');
                      password.addClass('is-invalid');
                        $('#passwordCheck').text('Password mismatch');
                    $( "#passwordCheck" ).fadeIn( 300 );
                }else{
                      $( "#passwordCheck" ).fadeOut( 300 );
                    result++;
                }

                if(result==10){
                    $.ajax({
                        url:'<?php echo base_url('grading/regStudent')?>',
                        type:'post',
                        data: new FormData(this),
                        contentType:false,
                        cache:false,
                        processData:false,
                        success:function(data){
                            fname.val('');
                            mname.val('');
                            lname.val('');
                            sc_id.val('');
                            username.val('');
                            password.val('');
                            r_password.val('');
                            userfile.val('');
                           alert('Success');
                            window.location.reload();
                        },
                        error:function(){}    
                    });
                }
            });
        });
      $('#showdata').on('click', '.item-select1', function(){
                var sc_id=$(this).attr('data');
                $('input[name=sc_id').val(sc_id);
                $('#myModal').modal('hide');
            });


     $('#sc_id2').click(function(){
                var url='<?php echo base_url('grading/getSections')?>';
                $('#myModal').modal('show');
                $.ajax({
                method:'post',
                type:'ajax',
                url:url,
                async: false,
                dataType: 'json',
                success: function(data){
                    var html='';
                    var i;
                    
                    for(i=0; i < data.length; i++){
                        html+='<tr>'+
                                '<td>'+data[i].sc_id+'</td>'+
                                '<td>'+data[i].sc_name+'</td>'+
                               
                                '<td>'+
                                    '<a href="javascript:;" class="btn btn-outline-dark item-select1" data="'+data[i].sc_id+'">Select</a>'+
                                '</td>'+
                            '</tr>';
                    }
                    $('#showdata').html(html);
                },
                error: function(){
                    alert('Could not load');
                }
            });
           });
                function readURL(input){
        if(input.files && input.files[0]){
            var reader= new FileReader();
            reader.onload=function(e){
                $('#mypic').attr('src', e.target.result)
            };
            reader.readAsDataURL(input.files[0]);
        }
      }
      $('#userfile').change(function(){
        readURL(this);
      })
    </script>
