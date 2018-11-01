

    <div class="container">
        <div class="row">
            <div class="col-lg-2"></div>
            <div class="col-lg-8">
                <div class="jumbotron" style="margin-top:120px;">
                     <form>
                        <h4>Student List</h4>
                        <button type="button" class="btn btn-dark form-control" data-toggle="modal" data-target="#addstudent">Add Student</button><br/> <br/>
                        
                        <table class="table table-striped">
                            <thead class="thead-dark">
                                <tr>
                                <th scope="col">Student ID</th>
                                <th scope="col">Fullname</th>
                                <th scope="col">Add Grade</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                <th scope="row">1231231</th>
                                <td>Jorey Pascual</td>
                                <td><button type="button" class="btn btn-dark form-control" data-toggle="modal" data-target="#addgrade">+</button></td>
                                </tr>
                                <tr>
                                <th scope="row">1231231</th>
                                <td>Nino Reid</td>
                                <td><button type="button" class="btn btn-dark form-control" data-toggle="modal" data-target="#addgrade">+</button></td>
                                </tr>
                            </tbody>
                            </table>
                    </form> 
                </div> 
                <!-- Modal for Add Student -->
                <div class="modal fade" id="addstudent" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Add Student</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                    <div class="form-group">
                            <input type="text" class="form-control" placeholder="Student ID"; >
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Save changes</button>
                    </div>
                    </div>
                </div>
                </div>
                <!--end of Modal-->

                <!-- Modal for Add Grade -->
                <div class="modal fade" id="addgrade" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Add Student</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                    <div class="form-group">
                            <input type="text" class="form-control" placeholder="Grade"; >
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Save changes</button>
                    </div>
                    </div>
                </div>
                </div>
                <!--end of Modal-->
            </div>
            <div class="col-lg-2"></div>
        </div>
    </div>  
</body>
</html>