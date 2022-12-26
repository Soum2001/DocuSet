@include('layouts.header')

<body class="hold-transition layout-top-nav">
    <div class="wrapper">
        @include('layouts.navbar')
        <section class="content">
            <div class="container-fluid">
                <div id="home">
                    <div class="row">
                        <div class="col-md-8 offset-md-2">

                        </div>
                    </div>
                    <br>
                    <div class="container-fluid">
                        <section class="content-header">
                            <div class="container-fluid">
                                <div class="row mb-2">
                                    <div class="col-sm-6">
                                        <!-- <h1>User Details Table</h1> -->
                                    </div>
                                </div>
                            </div><!-- /.container-fluid -->
                        </section>

                        <section class="content">
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-md-2">
                                        <select class="form-control" id="select_user">
                                            <option value="">Select User</option>
                                            <option value="Admin">Admin</option>
                                            <option value="Human Resource">Human Resource</option>
                                            <option value="Candidate">Candidate</option>
                                        </select>
                                    </div>
                                    <div class="col-md-2">
                                        <select class="form-control" id="action">
                                            <option value="">Action</option>
                                            <option value="add_hr">Add HR</option>
                                            <option value="add_candidate">Add Candidate</option>
                                        </select>
                                    </div>
                                    <div class="col-md-2">
                                        <button type="button" class="btn btn-primary" onclick= "add_hr()">Add HR</button>
                                    </div>
                                </div>


                                </br>
                                <div class="row">
                                    <div class="col-12">
                                        <div class="card">
                                            <div class="card-header">
                                                <h3 class="card-title">User Table</h3>
                                            </div>
                                            <div class="card-body">
                                                <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">

                                                    <div class="row">
                                                        <div class="col-sm-12">
                                                            <table id="dtblUser" class="table table-bordered table-striped dataTable dtr-inline" aria-describedby="example1_info">
                                                                <thead>
                                                                    <tr>
                                                                        <th class="sorting sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending">Id</th>
                                                                        <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">Name</th>
                                                                        <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending">Email</th>
                                                                        <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending">Phone No</th>
                                                                        <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">Address</th>
                                                                        <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">User Type</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>

                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                    </div>
                </div>
                <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Add HR Details</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>

                            <form id="hr_details">
                                <div class="modal-body" id="user_details">
                                    <meta name="csrf-token" content="{{ csrf_token() }}">
                                    <input type="hidden" id="_token" name="_token" value="{{ csrf_token() }}" />
                                    <input type="hidden" id="user_id" name="user_id">
                                    <div class="input-group mb-3">
                                        <input type="text" class="form-control" placeholder="Full name" id="user_name" name="user_name" style="text-align:center">
                                        <div class="input-group-append">
                                            <div class="input-group-text">
                                                <span class="fas fa-user"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="input-group mb-3">
                                        <input type="email" class="form-control" placeholder="Email" id="mail_id" name="mail_id" style="text-align:center">
                                        <div class="input-group-append">
                                            <div class="input-group-text">
                                                <span class="fas fa-envelope"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="input-group mb-3">
                                        <input class="form-control" placeholder="address" id="address" name="address" style="text-align:center">
                                    </div>
                                    <div class="input-group mb-3">
                                        <input type="tel" class="form-control" placeholder="Mobile no" id="mob" name="mob" style="text-align:center">
                                        <div class="input-group-append">
                                            <div class="input-group-text">
                                                <span class="fas fa-phone"></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                            <div class="modal-footer">
                                <input type="submit" class="btn btn-primary" id="edit_user_details" value="Add HR" onclick="submit_hr_details()">
                            </div>



                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <!-- /.content -->
    @include('layouts.footer')