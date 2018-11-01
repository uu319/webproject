

    <div class="container">
        <div class="row">
            <div class="col-lg-2"></div>
            <div class="col-lg-8">
                <div class="jumbotron" style="margin-top:120px; background-color:white">
                    
                        <h4>All Classes</h4>
                        <table class="table table-striped border">
                    
                    <thead style="background-color: grey">
                            <th>Class ID</th>
                            <th>Teacher</th>
                            <th>Section</th>
                            <th>Subject</th>
                            <th>Action</th>
                           

                    </thead>
                    <tbody  id="showdata">
                           
                    </tbody>
                </table>
                        <a href="<?php echo base_url('grading/v_aHome')?>">Back</a>
                  
                </div> 
            </div>
            <div class="col-lg-2"></div>
        </div>
    </div>  
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Students </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
     
      <div class="modal-body">
                  <table class="table">
                    
                    <thead>
                             <th>ID</th>
                            <th>First Name</th>
                            <th>Middle Name</th>
                            <th>Last Name</th>
                           

                    </thead>
                    <tbody  id="showdata2">
                           
                    </tbody>
                </table>

      </div>

      
    </div>
  </div>
</div>

 <script>


        
      $('#showdata').on('click', '.item-select', function(){
               $('#myModal').modal('show');
               var sc_id=$(this).attr('data');
              
              

            $.ajax({
                data:{'sc_id':sc_id.charAt(0),'c_id':sc_id.charAt(1)},
                method:'post',
                type:'ajax',
                url:'<?php echo base_url('grading/getStudentsBySection')?>',
                async: false,
                dataType: 'json',
                success: function(data){
                    var html='';
                    var i;
                    
                    for(i=0; i < data.length; i++){
                        html+='<tr>'+
                                '<td>'+data[i].id+'</td>'+
                                '<td>'+data[i].fname+'</td>'+
                                '<td>'+data[i].mname+'</td>'+
                                '<td>'+data[i].lname+'</td>'+
                               
                               '<td>'+
                                    /*'<a href="javascript:;" class="btn btn-outline-dark item-select2" data="'+data[i].sc_id+'">S</a>'+*/
                               
                            '</tr>';
                    }
                    $('#showdata2').html(html);
                },
                error: function(){
                    alert('Could not load');
                }
            });

            });

    

      $.ajax({
                method:'post',
                type:'ajax',
                url:'<?php echo base_url('grading/allClasses')?>',
                async: false,
                dataType: 'json',
                success: function(data){
                    var html='';
                    var i;
                    
                    for(i=0; i < data.length; i++){
                        html+='<tr>'+
                                '<td>'+data[i].c_id+'</td>'+
                                '<td>'+data[i].fname+' '+data[i].mname+' '+data[i].lname+'</td>'+
                                '<td>'+data[i].sc_name+'</td>'+

                                '<td>'+data[i].sb_name+'</td>'+
                               '<td>'+
                                    '<a href="javascript:;" class="btn btn-outline-dark item-select" data="'+data[i].sc_id+data[i].c_id+'">View Student</a>'+
                               
                            '</tr>';
                    }
                    $('#showdata').html(html);
                },
                error: function(){
                    alert('Could not load');
                }
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
