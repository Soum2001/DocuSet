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
                                                                        <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">Action</th>
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
                <div class="search">

                </div>
            </div>
        </section>
    </div>
    <!-- /.content -->
    @include('layouts.footer')