@include('layouts.header')
<body class="hold-transition layout-top-nav">
    @include('layouts.navbar')
    <div class="wrapper">
        <section class="content">
            <div class="container-fluid">
                <input type="hidden" id="user_id" value="{{Session::get('user_id')}}">
                <div class="row">
                    <meta name="csrf-token" content="{{ csrf_token() }}">
                    <input type="hidden" id="_token" name="_token" value="{{ csrf_token() }}" />
                    <input type="hidden" id="user_id" value="{{Session::get('user_id')}}">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header p-2">
                                <ul class="nav nav-pills">
                                    <li class="nav-item"><a class="nav-link active" href="#activity" data-toggle="tab">Candidate Details</a></li>
                                    <li class="nav-item"><a class="nav-link" id="candidate_document" href="#timeline" data-toggle="tab">Documents</a></li>
                                </ul>
                            </div>
                            <div class="card-body">
                                <div class="tab-content">
                                    <div class="tab-pane active" id="activity">
                                        <form class="form-horizontal">              
                                            @foreach($user_details as $user)
                                            <div class="form-group row">
                                                <label for="inputName" class="col-sm-2 col-form-label">Name</label>
                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control" id="name" placeholder="Name" value="{{$user->name}}">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
                                                <div class="col-sm-10">
                                                    <input type="email" class="form-control" id="email" placeholder="Email" value="{{$user->email}}">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label">Address</label>
                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control" id="address" placeholder="Address" value="{{$user->address1}}">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="inputSkills" class="col-sm-2 col-form-label">Phone No</label>
                                                <div class="col-sm-10">
                                                    <input type="tel" class="form-control" id="phone_no" placeholder="Phone no" value="{{$user->phone_no1}}">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="inputSkills" class="col-sm-2 col-form-label">City</label>
                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control" id="city" placeholder="City" value="{{$user->city}}">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="inputSkills" class="col-sm-2 col-form-label">State</label>
                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control" id="state" placeholder="State" value="{{$user->state}}">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="inputSkills" class="col-sm-2 col-form-label">Zip</label>
                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control" id="zip" placeholder="Zip" value="{{$user->zip}}">
                                                </div>
                                            </div>
                                            @endforeach
                                            <div class="form-group row">
                                                <div class="offset-sm-2 col-sm-10">
                                                    <div class="checkbox">
                                                        <label>
                                                            <input type="checkbox"> I agree to the <a href="#">terms and conditions</a>
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="offset-sm-2 col-sm-10">
                                                    <button type="submit" class="btn btn-danger">Edit</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>

                                    <div class="tab-pane" id="timeline">
                                        <div class="card-body table-responsive p-0" style="height: 300px;">
                                            <table id="dtblCandidateDocument" class="table table-bordered table-striped dataTable dtr-inline" aria-describedby="example1_info">
                                                <thead>
                                                    <tr>
                                                        <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">Qualification</th>
                                                        <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending">Board</th>
                                                        <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending">Score</th>
                                                        <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">Passout Year</th>
                                                        <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">Marksheet</th>
                                                        <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">Certificate</th>
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
        <div class="modal fade" id="document_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Document</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div id="document">

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /.content -->
    @include('layouts.footer')
    <script src="{{asset('assets/js/datatable.js')}}"></script>
</body>

</html>