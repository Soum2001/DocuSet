@include('layouts.header')

<body class="hold-transition layout-top-nav">
    <div class="wrapper">
        @include('layouts.navbar')
        <section class="content">
            <div class="container-fluid">
                <form id="academic_details" method="post">
                    <input type="hidden" id="_token" name="_token" value="{{ csrf_token() }}" />
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
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>10th</td>
                                                <td>
                                                    <select id="board_10th" name="board[]">
                                                        <option value="">--select--</option>
                                                        <option value="CBSE/ICSE">CBSE/ICSE</option>
                                                        <option value="Andhra Pradesh">Andhra Pradesh</option>
                                                        <option value="delhi">Delhi</option>
                                                        <option value="karnataka">Karnataka</option>
                                                        <option value="odisha">Odisha</option>
                                                        <option value="up">Uttar Pradesh</option>
                                                    </select>
                                                </td>
                                                <td><input type="text" id="percentage_10th" name="percentage[]" placeholder="xx.xx%" style="width:70px"></td>
                                                <td><input type="text" id="passout_year_10th" name="passout_year[]" placeholder="YYYY" style="width:70px"></td>

                                            </tr>
                                            <tr>
                                                <td>12th</td>
                                                <td>
                                                    <select id="board_12th" name="board[]">
                                                        <option value="">--select--</option>
                                                        <option value="CBSE/ICSE">CBSE/ICSE</option>
                                                        <option value="Andhra Pradesh">Andhra Pradesh</option>
                                                        <option value="delhi">Delhi</option>
                                                        <option value="karnataka">Karnataka</option>
                                                        <option value="odisha">Odisha</option>
                                                        <option value="up">Uttar Pradesh</option>
                                                    </select>
                                                </td>
                                                <td><input type="text" id="percentage_12th" name="percentage[]" placeholder="xx.xx%" style="width:70px"></td>
                                                <td><input type="text" id="passout_year_12th" name="passout_year[]" placeholder="YYYY" style="width:70px"></td>
                                            <tr>
                                                <td>Graduation (BE/B.Tech)</td>
                                                <td>
                                                    <select id="graduation" name="board[]" style="width:20%">
                                                        <option value="">--select--</option>
                                                        <option value="BITS - Birla Institute of Technology and Science">BITS - Birla Institute of Technology and Science</option>
                                                        <option value="BPUT - Biju Patnaik University of Technology, Odisha">BPUT - Biju Patnaik University of Technology, Odisha</option>
                                                        <option value="RTU - Rajasthan Technical University">RTU - Rajasthan Technical University</option>
                                                        <option value="VTU - Visvesvaraya Technological University, Karnataka">VTU - Visvesvaraya Technological University, Karnataka</option>
                                                        <option value="UPTU - Uttar Pradesh Technical University">UPTU - Uttar Pradesh Technical University</option>
                                                    </select>
                                                </td>
                                                <td><input type="text" id="graduation_percentage" name="percentage[]" placeholder="xx.xx%" style="width:70px"></td>
                                                <td><input type="text" id="graduation_passout_year" name="passout_year[]" placeholder="YYYY" style="width:70px"></td>

                                            </tr>
                                            <tr>
                                                <td>Post Graduation (MCA/ M.Tech)</td>
                                                <td>
                                                    <select id="post_graduation" name="board[]" style="width:20%">
                                                        <option value="">--select--</option>
                                                        <option value="BITS - Birla Institute of Technology and Science">BITS - Birla Institute of Technology and Science</option>
                                                        <option value="BPUT - Biju Patnaik University of Technology, Odisha">BPUT - Biju Patnaik University of Technology, Odisha</option>
                                                        <option value="RTU - Rajasthan Technical University">RTU - Rajasthan Technical University</option>
                                                        <option value="VTU - Visvesvaraya Technological University, Karnataka">VTU - Visvesvaraya Technological University, Karnataka</option>
                                                        <option value="UPTU - Uttar Pradesh Technical University">UPTU - Uttar Pradesh Technical University</option>
                                                    </select>
                                                </td>
                                                <td><input type="text" id="pg_percentage" name="percentage[]" placeholder="xx.xx%" style="width:70px"></td>
                                                <td><input type="text" id="pg_passout_year" name="passout_year[]" placeholder="YYYY" style="width:70px"></td>

                                            </tr>
                                        </tbody>
                                    </table>

                                </div>


                            </div>

                        </div>
                    </div>
                    <div class="upload_documents">
                        <button type="button" class="btn btn-primary" id="open_modal_to_upload">Upload Supporting Details</button>
                    </div>
                    <input type="button" class="btn btn-primary" style="margin-left:751px" onclick="submit_academics_details()" value="Submit">
                </form>


            </div>
        </section>
    </div>



    <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" id="exampleModalLong">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <form id="upload_document" name="upload_document" enctype="multipart/form-data">
                    <input type="hidden" id="_token" name="_token" value="{{ csrf_token() }}" />
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">Upload Academics Details</h3>
                                </div>

                                <div class="card-body table-responsive p-0" style="height: 300px;">
                                    <table class="table table-head-fixed text-nowrap">
                                        <thead>
                                            <tr>
                                                <th style="width:40%">Document To Upload</th>
                                                <th style="text-align:center">Shared Files</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>10th-Marksheet <div class="input-group control-group increment">
                                                        <input type="file" id="marksheet_10th" name="marksheet[]" class="form-control">
                                                    </div>
                                                </td>
                                                <td style="text-align:center">
                                                    <div id="selected_10th_marksheet"></div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>10th-Certificate <div class="input-group control-group increment">
                                                        <input type="file" id="certificate_10th" name="certificate_10th" class="form-control" multiple="multiple">
                                                    </div>
                                                </td>
                                                <td style="text-align:center">
                                                    <div id="selected_10th_certificate"></div>
                                                </td>
                                            <tr>
                                                <td>12th-Marksheet <div class="input-group control-group increment">
                                                        <input type="file" id="marksheet_12th" name="marksheet[]" class="form-control">
                                                    </div>
                                                </td>
                                                <td style="text-align:center">
                                                    <div id="selected_12th_marksheet"></div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>12th-Certificate
                                                    <div class="input-group control-group increment">
                                                        <input type="file"  id="certificate_12th" name="certificate_12th" class="form-control">
                                                    </div>
                                                </td>
                                                <td style="text-align:center">
                                                    <div id="selected_12th_certificate"></div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Graduation Marksheet
                                                    <div class="input-group control-group increment">
                                                        <input type="file"  id="graduation_marksheet" name="marksheet[]" class="form-control">
                                                    </div>
                                                </td>
                                                <td style="text-align:center">
                                                    <div id="selected_graduation_marksheet"></div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Graduation Certificate
                                                    <div class="input-group control-group increment">
                                                        <input type="file" id="graduation_certificate" name="graduation_certificate" class="form-control">
                                                    </div>
                                                <td style="text-align:center">
                                                    <div id="selected_graduation_certificate"></div>
                                                </td>
                                            </tr>


                                            <tr>
                                                <td>PostGraduation MarkSheet
                                                    <div class="input-group control-group increment">
                                                        <input type="file"  id="pg_marksheet" name="marksheet[]" class="form-control">
                                                    </div>

                                                </td>
                                                <td style="text-align:center">
                                                    <div id="selected_pg_marksheet"></div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>PostGraduation Certificate
                                                    <div class="input-group control-group increment">
                                                        <input type="file" id="pg_certificate" name="pg_certificate" class="form-control">
                                                    </div>
                                                </td>
                                                <td style="text-align:center">
                                                    <div id="selected_pg_certificate"></div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Upload Resume
                                                    <div class="input-group control-group increment">
                                                        <input type="file" name="filename" id="resume_upload" name="resume_upload" class="form-control" >
                                                    </div>

                                                </td>
                                                <td style="text-align:center"></td>
                                            </tr>
                                            <tr>
                                                <td>Upload Pan
                                                    <div class="input-group control-group increment">
                                                        <input type="file" name="filename" class="form-control" id="pan_upload" name="pan_upload" >
                                                    </div>

                                                </td>
                                                <td style="text-align:center"></td>
                                            </tr>
                                            <tr>
                                                <td>Upload Adhar
                                                    <div class="input-group control-group increment col-xs-4">
                                                        <input type="file" name="filename" class="form-control " id="adhar_upload" name="adhar_upload" >
                                                    </div>
                                                </td>
                                                <td style="text-align:center"></td>
                                            </tr>

                                        </tbody>
                                    </table>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="modal-footer">
                        <input type="submit" class="btn btn-primary" id="upload" style="margin-left:751px" value="Upload">
                    </div>
                </form>
            </div>
        </div>
    </div>

    @include('layouts.footer')
    <script src="{{asset('assets/js/academicDetails.js')}}"></script>
</body>

</html>