$(document).ready(function () {


  var marksheet_10th_file;
  $("#marksheet_10th").change(function () {
    var marksheet_10th_file = $('#marksheet_10th').prop('files')[0];
  });


  var marksheet_12th_file;
  $("#marksheet_12th").change(function () {
    selDiv = document.querySelector("#selected_12th_marksheet");
    var marksheet_12th_file = $('#marksheet_12th').prop('files')[0];
    selDiv.innerHTML += this.files[0].name + "</br>";

  });


  var marksheet_graduation_file;
  $("#graduation_marksheet").change(function () {
    selDiv = document.querySelector("#selected_graduation_marksheet");

    var marksheet_graduation_file = $('#graduation_marksheet').prop('files')[0];
    selDiv.innerHTML += this.files[0].name + "</br>";

  });

  var marksheet_pg_file;
  $("#pg_marksheet").change(function () {
    selDiv = document.querySelector("#selected_pg_marksheet");
    var marksheet_pg_file = $('#pg_marksheet').prop('files')[0];
    selDiv.innerHTML += this.files[i].name + "</br>";

  });

  var files = [];
  var certificate_10th = [];
  var certificate_10th_file = [];
  $("#certificate_1").change(function () {
    alert('hi');
    selDiv = document.querySelector("#selected_10th_certificate");
    for (var i = 0; i < this.files.length; i++) {
      if (certificate_10th.indexOf(this.files[i].name) == -1) {
        certificate_10th.push(this.files[i].name);
        certificate_10th_file.push(this.files[i]);
        selDiv.innerHTML += this.files[i].name + "</br>";
      }
    }
    console.log(certificate_10th_file);
  });

  var files = [];
  var certificate_12th = [];
  var certificate_12th_file = [];
  $("#certificate_12th").change(function () {
    selDiv = document.querySelector("#selected_12th_certificate");
    for (var i = 0; i < this.files.length; i++) {
      if (certificate_12th.indexOf(this.files[i].name) == -1) {
        certificate_12th.push(this.files[i].name);
        certificate_12th_file.push(this.files[i]);
        selDiv.innerHTML += this.files[i].name + "</br>";
      }
    }
  });

  var files = [];
  var graduation_certificate = [];
  var certificate_graduation_file = [];
  $("#graduation_certificate").change(function () {
    selDiv = document.querySelector("#selected_graduation_certificate");
    for (var i = 0; i < this.files.length; i++) {
      if (graduation_certificate.indexOf(this.files[i].name) == -1) {
        graduation_certificate.push(this.files[i].name);
        certificate_graduation_file.push(this.files[i]);
        selDiv.innerHTML += this.files[i].name + "</br>";
      }
    }
  });

  var files = [];
  var pg_certificate = [];
  var certificate_pg_file = [];
  $("#pg_certificate").change(function () {
    selDiv = document.querySelector("#selected_pg_certificate");
    for (var i = 0; i < this.files.length; i++) {
      if (pg_certificate.indexOf(this.files[i].name) == -1) {
        pg_certificate.push(this.files[i].name);
        certificate_pg_file.push(this.files[i]);
        selDiv.innerHTML += this.files[i].name + "</br>";
      }
    }
  });
  $("#open_modal_to_upload").click(function () {
    $("#exampleModalLong").modal("show");
  })

  $("#upload").click(function () {
    $("#exampleModalLong").modal("hide");
  })
  var count = 1;
  $("#add_more_qualification").click(function () {
    let row = ++count;
    $("#hid_row_count").val(row);
    $("#div_append").append(`<div class="col-md-12" id="div_{${row}}">
      <div class="card card-primary">
          <div class="card-header">
              <h3 class="card-title">Add Qualification Details</h3>
              <h3 class="card-title" style="float:right" id="dismiss_div"><i class="fas fa-times"></i></h3>
          </div>
          <div class="card-body">
                  <div class="row">
                      <div class="col-sm-6">
  
                          <div class="form-group">
                              <label>Select Qualification</label>
                              <select class="form-control" name="class[]" id="sel_qual_${row}">
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
                              <select class="form-control" id="sel_board_${row}" name="board[]">
                                  <option value="">--select--</option>
                                  <option value="CBSE/ICSE">CBSE/ICSE</option>
                                  <option value="Andhra Pradesh">Andhra Pradesh</option>
                                  <option value="delhi">Delhi</option>
                                  <option value="karnataka">Karnataka</option>
                                  <option value="odisha">Odisha</option>
                                  <option value="up">Uttar Pradesh</option>
                              </select>
                          </div>
                      </div>
                  </div>
                  <div class="row">
                      <div class="col-sm-6">
  
                          <div class="form-group">
                              <label>Score</label>
                              <input type="text" class="form-control" id="percentage_${row}" name="percentage[]" placeholder="Enter ...">
                          </div>
                      </div>
                      <div class="col-sm-6">
                          <div class="form-group">
                              <label>Passout Year</label>
                              <input type="text" class="form-control" id="passout_year_${row}" name="passout_year[]" placeholder="Enter ...">
                          </div>
                      </div>
                  </div>
                  <div class="row">
                      <div class="col-sm-6">
                      <label>Marksheet</label>
                          <div class="input-group control-group increment">
                              <input type="file" id="marksheet_${row}" name="marksheet[]" class="form-control">
                          </div>
                      </div>
                      <div class="col-sm-6">
                      <label>Certificate</label>
                          <div class="input-group control-group increment">
                              <input type="file" id="certificate_${row}" name="certificate[]" class="form-control" multiple="multiple">
                          </div>
                      </div>
                  </div>
          </div>
      </div>
  </div>`);
  })
  // $("#dismiss_div").click(function(){
  //   alert("hi");
  // })
  // $("#upload_document").submit(function (e) {
  //   e.preventDefault();
  //   var formData = new FormData(upload_document);
  //   formData.append('marksheet_10th_file', marksheet_10th_file);
  //   formData.append('marksheet_12th_file', marksheet_12th_file);
  //   formData.append('marksheet_graduation_file', marksheet_graduation_file);
  //   formData.append('marksheet_pg_file', marksheet_pg_file);
  //   formData.append('certificate_10th_file', certificate_10th_file);
  //   formData.append('certificate_12th_file', certificate_12th_file);
  //   formData.append('certificate_graduation_file', certificate_graduation_file);
  //   formData.append('certificate_pg_file', certificate_pg_file);
  //   formData.append('resume', document.getElementById('resume_upload').value);
  //   formData.append('pan', document.getElementById('pan_upload').value);
  //   formData.append('adhar', document.getElementById('adhar_upload').value);

  //   $.ajax({
  //     headers: {
  //       'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  //     },
  //     url: "upload_document",
  //     type: "post",
  //     data: formData,
  //     processData: false,
  //     contentType: false,
  //     success: function (response) {
  //       var jsonData = JSON.parse(JSON.stringify(response));
  //       console.log(response);
  //       if (response.dbStatus == 'SUCCESS') {
  //         $('#exampleModalCenter').modal('hide');
  //         toastr.success(jsonData.dbMessage);
  //         $('#dtblUser').DataTable().ajax.reload();

  //       } else if (response.dbStatus == 'FAILURE') {
  //         toastr.error(response.dbMessage);
  //       }
  //     },
  //   });
  // })
});
function submit_academics_details() {
  var academic_details = document.getElementById("academic_details");
  var formData = new FormData(academic_details);
  $.ajax({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    },
    url: "upload_academics_details",
    type: "post",
    data: formData,
    processData: false,
    contentType: false,
    success: function (response) {
      var jsonData = JSON.parse(JSON.stringify(response));
      console.log(response);
      if (response.dbStatus == 'SUCCESS') {
        toastr.success(jsonData.dbMessage);

      } else if (response.dbStatus == 'FAILURE') {
        toastr.error(response.dbMessage);
      }
    },
  });
}
// function submit_academics_details() {
//   var board_10th =  $("#board_10th").val();
//   var board_12th =  $("#board_12th").val();
//   var graduation =  $("#graduation").val();
//   var post_graduation =  $("#post_graduation").val();
//   var percentage_10th =  $("#percentage_10th").val();
//   var percentage_12th =  $("#percentage_12th").val();
//   var graduation_percentage =  $("#graduation_percentage").val();
//   var pg_percentage =  $("#pg_percentage").val();
//   var passout_year_10th =  $("#passout_year_10th").val();
//   var passout_year_12th =  $("#passout_year_12th").val();
//   var graduation_passout_year =  $("#graduation_passout_year").val();
//   var pg_passout_year =  $("#pg_passout_year").val();

//   $.ajax({
//     headers: {
//       'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
//     },
//     url: "upload_academics_details",
//     type: "post",
//     data: {board_10th:board_10th,board_12th:board_12th,graduation:graduation,post_graduation:post_graduation,
//       percentage_10th:percentage_10th,percentage_12th:percentage_12th,graduation_percentage:graduation_percentage,
//       pg_percentage:pg_percentage,passout_year_10th:passout_year_10th,passout_year_12th:passout_year_12th,
//       graduation_passout_year:graduation_passout_year,pg_passout_year:pg_passout_year},
//     processData: false,
//     contentType: false,
//     success: function (response) {
//       var jsonData = JSON.parse(JSON.stringify(response));
//       console.log(response);
//       if (response.dbStatus == 'SUCCESS') {
//         $('#exampleModalCenter').modal('hide');
//         toastr.success(jsonData.dbMessage);
//         $('#dtblUser').DataTable().ajax.reload();

//       } else if (response.dbStatus == 'FAILURE') {
//         toastr.error(response.dbMessage);
//       }
//     },
//   });
// }
