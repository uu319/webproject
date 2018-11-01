
  





        <div class="row">
            <div class="col-lg-2"></div>
            <div class="col-lg-8">

                <div class="jumbotron" style="margin-top:120px; background-color:white">
                 <a href="<?php echo base_url('grading/v_aHome')?>">Back</a>
                     <form>
                        <h4>Logs</h4>
                        <table class="table table-striped border">
                            <thead class="thead-dark">
                                <tr>
                                <th scope="col">Log ID</th>
                                <th scope="col">Account ID</th>
                                 <th scope="col">Type</th>
                                 <th scope="col">Action</th>
                               
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
     
    

      $.ajax({
                method:'post',
                type:'ajax',
                url:'<?php echo base_url('grading/viewLogs')?>',
                async: false,
                dataType: 'json',
                success: function(data){
                    var html='';
                    var i;
                   
                    for(i=0; i < data.length; i++){
                      
                        html+='<tr>'+
                                '<td>'+data[i].log_id+'</td>'+
                                
                                '<td>'+data[i].acc_id+'</td>'+
                                 '<td>'+data[i].type+'</td>'+
                                  '<td>'+data[i].action+'</td>'+
                      
                          
                       
                          
                                     
                               
                               
                            '</tr>';
                       
                    }




                    $('#showdata').html(html);
                },
                error: function(){
                    alert('Could not load');
                }
            });
    </script>
