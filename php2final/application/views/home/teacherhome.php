<div class="row">
<div class="col-md-4">
    </div>
<div class="col-md-4"><center>
   <img style="border-radius:100px; margin-left: 10px;" src="<?php echo base_url('assets/uploads/').$this->session->userdata['picname']?>" height="100px" width="100px"><br/>
   <a id="profile" href="" style="color:black; padding-left: 30px" >Welcome <?php echo $this->session->userdata['name']?></a>
   <h2 id="changePass" type="button" href="#" class="btn btn-dark form-control">Change Password</h2></center>
</div>
    <div class="col-md-4">
    </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-lg-2"></div>
            <div class="col-lg-8">
                <div class="jumbotron" style="margin-top:120px; background-color:white">
                <table class="table table-striped border">
                    <p class="h3">Teacher Load</p>
                    <thead style="background-color: grey">
                         <th>Class ID</th>
                        <th>Section Name</th>
                        <th>Subject Name</th>
                         <th>Action</th>

                    </thead>
                    <tbody  id="showdata">
                           
                    </tbody>
                </table>
                    
                </div> 
            </div>
            <div class="col-lg-2"></div>
        </div>
    </div>

  <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Students</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="loginForm" method="post"> 
          <div class="alert alert-danger" style="display: none"></div>
          <div class="alert alert-success" style="display: none"></div>
         
          <input type="hidden" name="sc_id" id="sc_id">
          <table class="table">          
            <thead>
                            
              <th>First</th>
              <th>Middle</th>
              <th>Last  </th>
              <th>Action</th>
                             

            </thead>
            <tbody  id="showdata2">                 
            </tbody>
        </table>  
                         
        </form>
      </div>
      
    </div>
  </div>
</div>

 <div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Add grade</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form id="" method="post"> 
                      
                       
                        <input type="hidden" name="c_id" id="c_id">
                        <input type="hidden" name="st_id" id="st_id">
                        <input type="text"  class="form-control" name="grade" id="grade">             
       </form>
        <button type="button" style="margin-top: 20px" class="btn btn-dark form-control" id="confirm">Confirm</button>
      </div>
      
    </div>
  </div>
</div>
     <script>

       $('#changePass').on('click', function(){
        $('#changePass').attr('href', '<?php echo base_url('grading/v_teacherChange')?>')
      })



    
     var c_id=0;
     
      $('#showdata').on('click', '.item-select', function(){
               $('#myModal').modal('show');
               c_id=$(this).attr('data');

               
              
               
                $.ajax({
                data:{'c_id':c_id},
                method:'post',
                type:'ajax',
                url:'<?php echo base_url('grading/classStudents')?>',
                async: false,
                dataType: 'json',
                success: function(data){
                    var html='';
                    var i;
                    
                    for(i=0; i < data.length; i++){
                        html+='<tr>'+
                                '<td>'+data[i].fname+'</td>'+
                                '<td>'+data[i].mname+'</td>'+

                                '<td>'+data[i].lname+'</td>'+
                               
                                '<td>'+
                                    '<a href="javascript:;" class="btn btn-outline-dark item-select2" data="'+data[i].id+'">Add Grade</a>'+
                                '</td>'+
                            '</tr>';
                    }
                    $('#showdata2').html(html);
                },
                error: function(){
                    alert('Could not load');
                }
            });

            });
      $('#showdata2').on('click','.item-select2',function(){
        $('input[name=c_id]').val(c_id);
        var st_id=$(this).attr('data');
        $('input[name=st_id]').val(st_id);
        var grade=$('input[name=grade]').val();

        $('#myModal2').modal('show');
        // $("#myModal").css({ opacity: 0.0 });
      });

      $('#confirm').click(function(){
            var grade=$('input[name=grade]');
            var st_id=$('input[name=st_id]');
            var c_id=$('input[name=c_id]');
            var result=0;


            if($.isNumeric(grade.val())==false){
                     grade.val('');
                     $('#grade').attr('placeholder', "Grade should be numeric").focus();
                    grade.addClass('is-invalid');
            }else{
                    grade.removeClass('is-invalid');
                    result++;
              }
            if(result==1){
            $.ajax({
                    type:'ajax',
                    method:'post',
                    url:'<?php echo base_url('grading/addGrade')?>',
                    data:{'c_id':c_id.val(),'st_id':st_id.val(),'grade':grade.val()},
                    async:false,
                    dataType:'json',
                    success:function(data){

                       $('#myModal2').modal('hide');
                      //  $("#myModal").css({ opacity: 1 });
                        if(data.success){
                                $('div.alert-success').text("Success");
                                $( "div.alert-success" ).fadeIn( 300 ).delay( 1500 ).fadeOut( 400 );  
                                grade.val('');
                                 
                            }else{
                                $('div.alert-danger').text(data.message);
                                $( "div.alert-danger" ).fadeIn( 300 ).delay( 1500 ).fadeOut( 400 );  
                                grade.val('');  
                            }
                    },
                    error:function(){}

               });
          }

      });

      $.ajax({
                method:'post',
                type:'ajax',
                url:'<?php echo base_url('grading/teacherClasses')?>',
                async: false,
                dataType: 'json',
                success: function(data){
                    var html='';
                    var i;
                    
                    for(i=0; i < data.length; i++){
                        html+='<tr>'+
                                '<td>'+data[i].c_id+'</td>'+
                                '<td>'+data[i].sc_name+'</td>'+

                                '<td>'+data[i].sb_name+'</td>'+
                               
                                '<td>'+
                                    '<a href="javascript:;" class="btn btn-outline-dark item-select" data="'+data[i].c_id+'">View Student</a>'+
                                '</td>'+
                            '</tr>';
                    }
                    $('#showdata').html(html);
                },
                error: function(){
                    alert('Could not load');
                }
            });
    </script>  
