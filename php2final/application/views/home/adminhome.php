
                <h2 id="profile" style="color:black; padding-left: 30px" >Welcome <?php echo $this->session->userdata['name']?>

    <div class="container">
        <div class="row">
            <div class="col-lg-4"></div>
            <div class="col-lg-4">
                <div class="jumbotron" style="margin-top:120px;">
                     <form>
                        <h3 style="color: #708090">Actions</h3>
                        <a href="<?php echo base_url('grading/v_addTeacher')?>" type="submit" class="btn btn-outline-dark form-control">Add Teacher</a><br>
                     <a href="<?php echo base_url('grading/v_addStudent')?>" type="submit" class="btn btn-outline-dark form-control">Add Student</a>
                     <a href="<?php echo base_url('grading/v_addSubject')?>" type="submit" class="btn btn-outline-dark form-control">Add Subject</a>
                     <a href="<?php echo base_url('grading/v_addSection')?>" type="submit" class="btn btn-outline-dark form-control">Add section</a>
                       
                     <a href="<?php echo base_url('grading/v_addClass')?>" type="submit" class="btn btn-outline-dark form-control">Add Class</a>
                     <a href="<?php echo base_url('grading/v_adminView')?>" type="submit" class="btn btn-outline-dark form-control">View Classes</a>

                      <a href="<?php echo base_url('grading/v_Sections')?>" type="submit" class="btn btn-outline-dark form-control">View Sections</a>
                       <a href="<?php echo base_url('grading/v_logview')?>" type="submit" class="btn btn-outline-dark form-control">View Logs</a>
                    </form> 
                </div> 
            </div>
            <div class="col-lg-4"></div>
        </div>
    </div>  
    <script>
      $('#profile').on('click', function(){
        $('#profile').attr('href', '<?php echo base_url('grading/adminProfile')?>')
      })
    </script>>
