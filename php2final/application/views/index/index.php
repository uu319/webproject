

    <div class="container">
        <div class="row">
            <div class="col-lg-4"></div>
            <div class="col-lg-4">
                <div class="jumbotron" style="margin-top:120px;">
                     <form>
                        <h4>Select Account</h4>
                        <a href="" type="submit" class="btn btn-outline-dark form-control" id="admin">Admin</a><br/><br/>
                        <a href="" type="submit" class="btn btn-outline-dark form-control" id="student">Student</a><br/><br/>
                        <a href="" type="submit" class="btn btn-outline-dark form-control" id="teacher">Teacher</a>
                    </form> 
                </div> 
            </div>
            <div class="col-lg-4"></div>
        </div>
    </div>  
<script>
    $( document ).ready(function(e) {
       $('#admin').prop('href', '<?php echo base_url('grading/v_alogin')?>');
       $('#student').prop('href', '<?php echo base_url('grading/v_slogin')?>');
       $('#teacher').prop('href', '<?php echo base_url('grading/v_tlogin')?>');
})
</script>