
  


       <div class="row">
<div class="col-md-4">
    </div>
<div class="col-md-4"><center>
   <img style="border-radius:100px; margin-left: 10px;" src="<?php echo base_url('assets/uploads/').$this->session->userdata['picname']?>" height="100px" width="100px"><br/>
   <h2 id="profile" href="" style="color:black; padding-left: 30px" >Welcome <?php echo $this->session->userdata['name']?></h2>
   <a id="changePass" type="button" href="#" class="btn btn-dark form-control">Change Password</a></center>
</div>
    <div class="col-md-4">
    </div>
    </div>


        <div class="row">
            <div class="col-lg-2"></div>
            <div class="col-lg-8">
                <div class="jumbotron" style="margin-top:120px; background-color:white">
                     <form>
                        <h4>Your Grades</h4>
                        <table class="table table-striped border">
                            <thead class="thead-dark">
                                <tr>
                                <th scope="col">Subject</th>
                                <th scope="col">Grade</th>
                                 <th scope="col">Remarks</th>
                               
                                </tr>
                            </thead>
                            <tbody id="showdata">
                              
                            </tbody>
                            </table>
                    </form> 
                </div> 
            </div>
            <div class="col-lg-2"></div>
        </div>
    </div>  

    <script>
      $('#changePass').on('click', function(){
        $('#changePass').attr('href', '<?php echo base_url('grading/v_studentChange')?>')
      })
    

      $.ajax({
                method:'post',
                type:'ajax',
                url:'<?php echo base_url('grading/myGrades')?>',
                async: false,
                dataType: 'json',
                success: function(data){
                    var html='';
                    var i;
                   
                    for(i=0; i < data.length; i++){
                       if(data[i].remarks==='Passed'){
                        html+='<tr>'+
                                '<td>'+data[i].sb_name+'</td>'+
                                
                                '<td>'+data[i].grade+'</td>'+
                      
                            '<td style="color:green">'+data[i].remarks+'</td>'+
                       
                          
                                     
                               
                               
                            '</tr>';
                        }else{
                             html+='<tr>'+
                                '<td>'+data[i].sb_name+'</td>'+
                                
                                '<td>'+data[i].grade+'</td>'+
                      
                            '<td style="color:red">'+data[i].remarks+'</td>'+
                       
                          
                                     
                               
                               
                            '</tr>';
                        }
                    }




                    $('#showdata').html(html);
                },
                error: function(){
                    alert('Could not load');
                }
            });
    </script>
