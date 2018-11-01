

    <div class="container">
        <div class="row">
            <div class="col-lg-4"></div>
            <div class="col-lg-4">
                <div class="jumbotron" style="margin-top:120px;">
                <div class="alert alert-danger" style="display: none"></div>
                <div class="alert alert-success" style="display: none"></div>


                     <form action="<?php echo base_url('grading/addClass')?>" method="post" id="form">
                        <h4>Add Class</h4>
                        <div>
                        <img src="<?php echo base_url('assets/images/admin.png')?>" alt="Avatar" style="width:50%; margin-left:25%; margin-top:2px; margin-bottom:3px;">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" id="t_id" placeholder="Teacher ID" name="t_id">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" id="sc_id" placeholder="Section ID" name="sc_id">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" id="sb_id" placeholder="Subject ID" name="sb_id" >
                        </div>
                        <button type="button" id="save" class="btn btn-outline-dark form-control">Save</button>
                        <a href="<?php echo base_url('grading/v_aHome')?>">Back</a>
                    </form> 
                </div> 
            </div>
            <div class="col-lg-4"></div>
        </div>
    </div>  
   

<!-- Modal -->
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
       
      </div>
    </div>
  </div>
</div>
    <script>
        $(document).ready(function(){

            $('#showdata').on('click', '.item-select1', function(){
                var id=$(this).attr('data');
                $('input[name=t_id').val(id);
                $('#myModal').modal('hide');
            });

             $('#showdata').on('click', '.item-select2', function(){
                var id=$(this).attr('data');
                $('input[name=sc_id').val(id);
                 $('#myModal').modal('hide');
            });

            $('#showdata').on('click', '.item-select3', function(){
                var id=$(this).attr('data');
                $('input[name=sb_id').val(id);
                 $('#myModal').modal('hide');
            });

            $('#t_id').click(function(){
                var url='<?php echo base_url('grading/getTeachers')?>';
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
                                '<td>'+data[i].id+'</td>'+
                                '<td>'+data[i].fname+' '+data[i].mname+' '+data[i].lname+'</td>'+
                               
                                '<td>'+
                                    '<a href="javascript:;" class="btn btn-outline-dark item-select1" data="'+data[i].id+'">Select</a>'+
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

            $('#sc_id').click(function(){
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
                                    '<a href="javascript:;" class="btn btn-outline-dark item-select2" data="'+data[i].sc_id+'">Select</a>'+
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

            $('#sb_id').click(function(){
                var url='<?php echo base_url('grading/getSubjects')?>';
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
                                '<td>'+data[i].sb_id+'</td>'+
                                '<td>'+data[i].sb_name+'</td>'+
                               
                                '<td>'+
                                    '<a href="javascript:;" class="btn btn-outline-dark item-select3" data="'+data[i].sb_id+'">Select</a>'+
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

            $('#save').click(function(){
                var data=$('#form').serialize();
                var t_id= $('input[name=t_id]');
                var sc_id=$('input[name=sc_id]');
                var sb_id=$('input[name=sb_id]');
                var result=0;
                if(t_id.val()==""){
                    t_id.addClass('is-invalid');
                }else{
                      t_id.removeClass('is-invalid');
                      result++;
                } 
                if(sc_id.val()==""){
                    sc_id.addClass('is-invalid');
                }else{
                      sc_id.removeClass('is-invalid');
                      result++;
                }
                if(sb_id.val()==""){
                    sb_id.addClass('is-invalid');
                }else{
                      sb_id.removeClass('is-invalid');
                      result++;
                }
                if(result==3){
                    $.ajax({
                        type:'ajax',
                        method:'post',
                        url:'<?php echo base_url('grading/addClass')?>',
                        data:data,
                        async:false,
                        dataType:'json',
                        success:function(data){
                            if(data[1].success){
                                $('div.alert-success').text("Success");
                                $( "div.alert-success" ).fadeIn( 300 ).delay( 1500 ).fadeOut( 400 );  
                                t_id.val('');
                                sc_id.val('');
                                sb_id.val('');    
                            }else{
                                $('div.alert-danger').text(data[1].message);
                                $( "div.alert-danger" ).fadeIn( 300 ).delay( 1500 ).fadeOut( 400 );  
                            }
                        },
                        error:function(){
                            
                        }
                    });
                }
            });
          
        });
    </script>

