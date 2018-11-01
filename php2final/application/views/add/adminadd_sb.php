

    <div class="container">
        <div class="row">
            <div class="col-lg-4"></div>
            <div class="col-lg-4">
                <div class="jumbotron" style="margin-top:40px;">
                   <div class="alert alert-danger" style="display: none"></div>
                <div class="alert alert-success" style="display: none"></div>
                  <form id="form" action="<?php echo base_url('grading/regStudent')?>" method="post" enctype="multipart/form-data">
                        <h4>Add Subject</h4>
                        <div>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Subject Name"; id="sb_name" name="sb_name">
                        </div>
                      
                       
                        <input type="submit" class="btn btn-dark form-control" id="addSubject" name="submit" value="Add Subject">
                        
                   </form>
                   <a href="<?php echo base_url('grading/v_aHome')?>">Back</a>
                </div>
            </div>
            <div class="col-lg-4"></div>
        </div>
       
    </div>
    <script >
        $(document).ready(function(){
            $('#form').on('submit',function(e){
                e.preventDefault();
                 var data=$('#form').serialize();
                var sb_name= $('input[name=sb_name]');
                
                var result=0;

                 
                if(sb_name.val()==''){
                    sb_name.addClass('is-invalid');
                     $('#sb_name').attr('placeholder', "Subject name is required").focus();
                }else{
                    sb_name.removeClass('is-invalid');
                    result++;
                }
               
                  if($.isNumeric(sb_name.val())==true){
                     sb_name.val('');
                     $('#sb_name').attr('placeholder', "Subject name should not be numeric").focus();
                    sb_name.addClass('is-invalid');
                }else{
                    sb_name.removeClass('is-invalid');
                    result++;
                }
                
                if(result==2){
                    $.ajax({
                        type:'ajax',
                        method:'post',
                        url:'<?php echo base_url('grading/addSubject')?>',
                        data:data,
                        async:false,
                        dataType:'json',
                        success:function(data){
                       
                         if(data.success){
                                $('div.alert-success').text("Success");
                                $( "div.alert-success" ).fadeIn( 300 ).delay( 1500 ).fadeOut( 400 );  
                                sb_name.val('');    
                            }else{
                                $('div.alert-danger').text(data.message);
                                $( "div.alert-danger" ).fadeIn( 300 ).delay( 1500 ).fadeOut( 400 );  
                            }
                        },
                        error:function(){}    
                    });
                }
            });
        });
    </script>
