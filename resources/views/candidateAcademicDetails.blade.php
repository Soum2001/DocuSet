@include('layouts.header')

<body class="hold-transition layout-top-nav">
    <div class="wrapper">
        @include('layouts.navbar')
        <section class="content">
            <div class="container-fluid">
                <form id="academic_details" method="POST" enctype="multipart/form-data">
                    <input type="hidden" id="_token" name="_token" value="{{ csrf_token() }}" />
                    <input type="hidden" name="hid_row_count" id="hid_row_count">
                    <div class="row" id="qualification_details">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <div class="col-sm-2">
                                        <button type="button" class="btn btn-block btn-outline-primary" id="add_more_qualification">Add More Qualification <span><i class="fas fa-plus"></i></span></button>
                                    </div>
                                </div>
                                @if ($count>0)
                                @foreach($candidate_academic_details as $row)
                                <div class="col-md-12" id="col">
                                    <div class="card card-primary">
                                        <div class="card-header">
                                            <h3 class="card-title">Add Qualification Details</h3>
                                        </div>
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label>Select Qualification</label>
                                                        <select class="form-control" name="class[]" id="sel_qual" value="{{$row->academic_type}}">
                                                            @if($row->academic_type == '10th')
                                                            <option value="">--select--</option>
                                                            <option value="10th" selected>10th</option>
                                                            @endif
                                                            @if($row->academic_type == '12th')
                                                            <option value="12th" selected>12th</option>
                                                            @endif
                                                            @if($row->academic_type == 'graduation')
                                                            <option value="graduation" selected>Graduation</option>
                                                            @endif
                                                            @if($row->academic_type == 'post graduation')
                                                            <option value="post graduation" selected>Post Graduation</option>
                                                            @endif
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label>Select Board</label>
                                                        <select class="form-control" id="sel_board" name="board[]">
                                                            <option value="">--select--</option>
                                                            @if($row->board == 'CBSE/ICSE')
                                                            <option value="CBSE/ICSE" selected>CBSE/ICSE</option>
                                                            @endif
                                                            @if($row->board == 'Andhra Pradesh')
                                                            <option value="Andhra Pradesh" selected>Andhra Pradesh</option>
                                                            @endif
                                                            @if($row->board == 'delhi')
                                                            <option value="delhi" selected>Delhi</option>
                                                            @endif
                                                            @if($row->board == 'karnataka')
                                                            <option value="karnataka" selected>Karnataka</option>
                                                            @endif
                                                            @if($row->board == 'odisha')
                                                            <option value="odisha" selected>Odisha</option>
                                                            @endif
                                                            @if($row->board == 'Uttar Pradesh')
                                                            <option value="Uttar Pradesh" selected>Uttar Pradesh</option>
                                                            @endif
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-6">

                                                    <div class="form-group">
                                                        <label>Score</label>
                                                        <input type="text" class="form-control" id="percentage" value="{{$row->percentage}}" name="percentage[]" placeholder="Enter ...">
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label>Passout Year</label>
                                                        <input type="text" class="form-control" id="passout_year" name="passout_year[]" value="{{$row->passout_year}}" placeholder="Enter ...">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <div class="input-group control-group increment">
                                                        <div id="selected_10th_certificate"></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="input-group control-group increment">
                                                    <div id="selected_10th_certificate"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                                <div class="col-md-12" id="col">
                                    <div class="card card-primary">
                                        <div class="card-header">
                                            <h3 class="card-title">Documents</h3>
                                        </div>
                                        <div class="card-body">
                                            <div class="row">
                                                @foreach($document as $candidate_document)
                                                @if($candidate_document->asset_type == 'marksheet')
                                                <div class="col-sm-6">
                                                    <label>{{$candidate_document->academic_type}} Marksheet</label>
                                                    <div class="input-group control-group increment">
                                                        <a href="{{ url('download/'.$candidate_document->asset_path.'/'.$candidate_document->user_id) }}" download>{{$candidate_document->asset_path}}</a>
                                                    </div>
                                                </div>
                                                @endif
                                                @if($candidate_document->asset_type == 'certificate')
                                                <div class="col-sm-6">
                                                    <label>{{$candidate_document->academic_type}} Certificate</label>
                                                    <div class="input-group control-group increment">
                                                        <a href="{{ url('download', $candidate_document->asset_path) }}" download>{{$candidate_document->asset_path}}</a>
                                                    </div>
                                                </div>
                                                @endif
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                @else
                                <div class="col-md-12" id="col">
                                    <div class="card card-primary">
                                        <div class="card-header">
                                            <h3 class="card-title">Add Qualification Details</h3>
                                        </div>
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label>Select Qualification</label>
                                                        <select class="form-control" name="class[]" id="sel_qual">

                                                            <option value="">--select--</option>
                                                            <option value="10th">10th</option>
                                                            <option value="12th">12th</option>
                                                            <option value="graduation">Graduation</option>
                                                            <option value="post graduation">Post Graduation</option>

                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label>Select Board</label>
                                                        <select class="form-control" id="sel_board" name="board[]">
                                                            <option value="">--select--</option>
                                                            <option value="CBSE/ICSE">CBSE/ICSE</option>
                                                            <option value="Andhra Pradesh">Andhra Pradesh</option>
                                                            <option value="delhi">Delhi</option>
                                                            <option value="karnataka">Karnataka</option>
                                                            <option value="odisha">Odisha</option>
                                                            <option value="Uttar Pradesh">Uttar Pradesh</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-6">

                                                    <div class="form-group">
                                                        <label>Score</label>
                                                        <input type="text" class="form-control" id="percentage" name="percentage[]" placeholder="Enter ...">
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label>Passout Year</label>
                                                        <input type="text" class="form-control" id="passout_year" name="passout_year[]" placeholder="Enter ...">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <label>Marksheet</label>
                                                    <div class="input-group control-group increment">
                                                        <input type="file" id="marksheet_1" name="marksheet[]" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <label>Certificate</label>
                                                    <div class="input-group control-group increment">
                                                        <input type="file" id="certificate_1" name="certificate[]" class="form-control" multiple="multiple">
                                                    </div>
                                                </div>
                                            </div>
                                            @endif

                                        </div>
                                        <div id="div_append">
                                        </div>
                                    </div>
                                </div>
                                <h4>Upload Resume</h4>
                                <div class="upload-field">
                                    <div class="btn_upload">
                                        <button class="btn btn-primary"><input type="file" id="resume_upload" name="resume_upload" onchange="loadresume(this)"></button>
                                    </div>
                                </div>
                                <h4>Upload Pan</h4>
                                <div class="upload-field">
                                    <div class="btn_upload">
                                        <button class="btn btn-primary"><input type="file" id="pan_upload" name="pan_upload" onchange="loadpan(this)"></button>
                                    </div>
                                </div>
                                <h4>Upload Adhar</h4>
                                <div class="upload-field">
                                    <div class="btn_upload">
                                        <button class="btn btn-primary"><input type="file" id="adhar_upload" name="adhar_upload" onchange="loadadhar(this)"></button>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <button type="button" class="btn btn-primary" style="margin-left:751px" onclick="submit_academics_details()">Submit</button>
                </form>
            </div>
        </section>
    </div>
    @include('layouts.footer')
    <script src="{{asset('assets/js/academicDetails.js')}}"></script>
</body>

</html>