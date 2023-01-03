@include('layouts.header')
<body class="hold-transition layout-top-nav">
    <div class="wrapper">
        @include('layouts.navbar')
        <section class="content">
            <div class="container-fluid">
                <form  id="academic_details" method="POST" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">Academics Details Table</h3>
                                </div>

                                <div class="card-body table-responsive p-0" style="height: 300px;">
                                    <table class="table table-head-fixed text-nowrap">
                                        <thead>
                                            <tr>
                                                <th>Class</th>
                                                <th>Board</th>
                                                <th>Score</th>
                                                <th>Passout Year</th>
                                                <th>Upload Marksheet</th>
                                                <th>Upload Certificate</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>10th</td>
                                                <td>
                                                    <select id="10th_board">
                                                        <option value="">--select--</option>
                                                        <option value="cbse_icse">CBSE/ICSE</option>
                                                        <option value="ap">Andhra Pradesh</option>
                                                        <option value="delhi">Delhi</option>
                                                        <option value="karnataka">Karnataka</option>
                                                        <option value="odisha">Odisha</option>
                                                        <option value="up">Uttar Pradesh</option>
                                                    </select>
                                                </td>
                                                <td><input type="text" id="10th_percentage" placeholder="xx.xx%" style="width:70px"></td>
                                                <td><input type="text" id="10th_passout_year" placeholder="YYYY" style="width:70px"></td>
                                                <td>
                                                    <div class="input-group control-group increment">
                                                        <input type="file" name="filename[]" id="marksheet_10th" class="form-control" multiple="multiple">
                                                    </div>

                                                    <div id="selected_10th_marksheet"></div>
                                                </td>
                                                <td>
                                                    <div class="input-group control-group increment">
                                                        <input type="file" name="filename[]" id="certificate_10th"  class="form-control" multiple="multiple">
                                                    </div>
                                                    <div id="selected_10th_certificate"></div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>12th</td>
                                                <td>
                                                    <select id="12th_board">
                                                        <option value="">--select--</option>
                                                        <option value="cbse_icse">CBSE/ICSE</option>
                                                        <option value="ap">Andhra Pradesh</option>
                                                        <option value="delhi">Delhi</option>
                                                        <option value="karnataka">Karnataka</option>
                                                        <option value="odisha">Odisha</option>
                                                        <option value="up">Uttar Pradesh</option>
                                                    </select>
                                                </td>
                                                <td><input type="text" id="12th_percentage" placeholder="xx.xx%" style="width:70px"></td>
                                                <td><input type="text"id="12th_passout_year"  placeholder="YYYY" style="width:70px"></td>
                                                <td>
                                                    <div class="input-group control-group increment">
                                                        <input type="file" name="filename[]" id="marksheet_12th" class="form-control">
                                                      
                                                    </div>
                                                    <div id="selected_12th_marksheet"></div>
                                                </td>
                                                <td>
                                                    <div class="input-group control-group increment">
                                                        <input type="file" name="filename[]" id="certificate_12th" class="form-control">
                                                        
                                                    </div>
                                                    <div id="selected_12th_certificate"></div>

                                                </td>
                                            <tr>
                                                <td>Graduation (BE/B.Tech)</td>
                                                <td>
                                                    <select id="graduation" style="width:30%">
                                                        <option value="">--select--</option>
                                                        <option value="BITS - Birla Institute of Technology and Science">BITS - Birla Institute of Technology and Science</option>
                                                        <option value="BPUT - Biju Patnaik University of Technology, Odisha">BPUT - Biju Patnaik University of Technology, Odisha</option>
                                                        <option value="RTU - Rajasthan Technical University">RTU - Rajasthan Technical University</option>
                                                        <option value="VTU - Visvesvaraya Technological University, Karnataka">VTU - Visvesvaraya Technological University, Karnataka</option>
                                                        <option value="UPTU - Uttar Pradesh Technical University">UPTU - Uttar Pradesh Technical University</option>
                                                    </select>
                                                </td>
                                                <td><input type="text" id="graduation_percentage" placeholder="xx.xx%" style="width:70px"></td>
                                                <td><input type="text" id="graduation_passout_year" placeholder="YYYY" style="width:70px"></td>
                                                <td>
                                                    <div class="input-group control-group increment">
                                                        <input type="file" name="filename[]" id="graduation_marksheet" class="form-control"> 
                                                    </div>
                                                    <div id="selected_graduation_marksheet"></div>
                                                </td>
                                                <td>
                                                    <div class="input-group control-group increment">
                                                        <input type="file" name="filename[]"id="graduation_certificate" class="form-control">
                                                        
                                                    </div>
                                                    <div id="selected_graduation_certificate"></div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Post Graduation (MCA/ M.Tech)</td>
                                                <td>
                                                    <select id="post_graduation" style="width:30%">
                                                        <option value="">--select--</option>
                                                        <option value="BITS - Birla Institute of Technology and Science">BITS - Birla Institute of Technology and Science</option>
                                                        <option value="BPUT - Biju Patnaik University of Technology, Odisha">BPUT - Biju Patnaik University of Technology, Odisha</option>
                                                        <option value="RTU - Rajasthan Technical University">RTU - Rajasthan Technical University</option>
                                                        <option value="VTU - Visvesvaraya Technological University, Karnataka">VTU - Visvesvaraya Technological University, Karnataka</option>
                                                        <option value="UPTU - Uttar Pradesh Technical University">UPTU - Uttar Pradesh Technical University</option>
                                                    </select>
                                                </td>
                                                <td><input type="text" id="pg_percentage" placeholder="xx.xx%" style="width:70px"></td>
                                                <td><input type="text" id="pg_passout_year" placeholder="YYYY" style="width:70px"></td>
                                                <td>
                                                    <div class="input-group control-group increment">
                                                        <input type="file" name="filename[]" id="pg_marksheet" class="form-control">                                                    
                                                    </div>
                                                    <div id="selected_pg_marksheet"></div>
                                                </td>
                                                <td>
                                                    <div class="input-group control-group increment">
                                                        <input type="file" name="filename[]" id="pg_certificate" class="form-control">
                                                    </div>
                                                    <div id="selected_pg_certificate"></div>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>

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
                    <h4>Upload Adhar<h4>
                            <div class="upload-field">
                                <div class="btn_upload">
                                    <button class="btn btn-primary"><input type="file" id="adhar_upload" name="adhar_upload" onchange="loadadhar(this)"></button>
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