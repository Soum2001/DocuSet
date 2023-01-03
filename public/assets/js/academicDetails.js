$(document).ready(function () {

  // $(".btn-success").click(function(){ 
  //     var html = $(".clone").html();
  //     $(".increment").after(html);
  // });

  // $("body").on("click",".btn-danger",function(){ 
  //     $(this).parents(".control-group").remove();
  // });

  var files = [];
  var marksheet_10th = [];
  var marksheet_10th_file = [];
  $("#marksheet_10th").change(function () {
    selDiv = document.querySelector("#selected_10th_marksheet");
    for (var i = 0; i < this.files.length; i++) {
      if (marksheet_10th.indexOf(this.files[i].name) == -1) {
        marksheet_10th.push(this.files[i].name);
        marksheet_10th_file.push(this.files[i]);
        selDiv.innerHTML += this.files[i].name + "</br>";
      }
    }
    console.log(marksheet_10th_file);
  });

  var files = [];
  var marksheet_12th = [];
  $("#marksheet_12th").change(function () {
    selDiv = document.querySelector("#selected_12th_marksheet");
    for (var i = 0; i < this.files.length; i++) {
      if (marksheet_12th.indexOf(this.files[i].name) == -1) {
        marksheet_12th.push(this.files[i].name);

        selDiv.innerHTML += this.files[i].name + "</br>";
      }
    }
  });

  var files = [];
  var graduation_marksheet = [];
  $("#graduation_marksheet").change(function () {
    selDiv = document.querySelector("#selected_graduation_marksheet");
    for (var i = 0; i < this.files.length; i++) {
      if (graduation_marksheet.indexOf(this.files[i].name) == -1) {
        graduation_marksheet.push(this.files[i].name);

        selDiv.innerHTML += this.files[i].name + "</br>";
      }
    }
  });
  var files = [];
  var pg_marksheet = [];
  $("#pg_marksheet").change(function () {
    selDiv = document.querySelector("#selected_pg_marksheet");
    for (var i = 0; i < this.files.length; i++) {
      if (pg_marksheet.indexOf(this.files[i].name) == -1) {
        pg_marksheet.push(this.files[i].name);

        selDiv.innerHTML += this.files[i].name + "</br>";
      }
    }
  });

  var files = [];
  var certificate_10th = [];
  $("#certificate_10th").change(function () {
    selDiv = document.querySelector("#selected_10th_certificate");
    for (var i = 0; i < this.files.length; i++) {
      if (certificate_10th.indexOf(this.files[i].name) == -1) {
        certificate_10th.push(this.files[i].name);

        selDiv.innerHTML += this.files[i].name + "</br>";
      }
    }
  });

  var files = [];
  var certificate_12th = [];
  $("#certificate_12th").change(function () {
    selDiv = document.querySelector("#selected_12th_certificate");
    for (var i = 0; i < this.files.length; i++) {
      if (certificate_12th.indexOf(this.files[i].name) == -1) {
        certificate_12th.push(this.files[i].name);

        selDiv.innerHTML += this.files[i].name + "</br>";
      }
    }
  });

  var files = [];
  var graduation_certificate = [];
  $("#graduation_certificate").change(function () {
    selDiv = document.querySelector("#selected_graduation_certificate");
    for (var i = 0; i < this.files.length; i++) {
      if (graduation_certificate.indexOf(this.files[i].name) == -1) {
        graduation_certificate.push(this.files[i].name);

        selDiv.innerHTML += this.files[i].name + "</br>";
      }
    }
  });

  var files = [];
  var pg_certificate = [];
  $("#pg_certificate").change(function () {
    selDiv = document.querySelector("#selected_pg_certificate");
    for (var i = 0; i < this.files.length; i++) {
      if (pg_certificate.indexOf(this.files[i].name) == -1) {
        pg_certificate.push(this.files[i].name);
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

  $("#upload_document").submit(function (e) {
  
    e.preventDefault();
 
    var formData = new FormData(upload_document);
    formData.append(document.getElementById(upload_document));
    //console.log(formData);
  var count=0;
  var arr=[];
  var arr2=[];
    $.each($("input[type=file]"), function (i, obj) {
      
      $.each(obj.files, function (j, file) {
        console.log(file);
        count++;
      })
      
    });

    console.log(arr);

    $.ajax({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      },
      url: "upload_document",
      type: "post",
      data: formData,
      processData: false,
      contentType: false,
      success: function (response) {
        var jsonData = JSON.parse(JSON.stringify(response));
        console.log(response);
        if (response.dbStatus == 'SUCCESS') {
          $('#exampleModalCenter').modal('hide');
          toastr.success(jsonData.dbMessage);
          $('#dtblUser').DataTable().ajax.reload();

        } else if (response.dbStatus == 'FAILURE') {
          toastr.error(response.dbMessage);
        }
      },
    });
  })

});
function submit_academics_details() {
  var academic_details = document.getElementById("academic_details");
  var formData = new FormData(academic_details);
  formData.append('upload_document',document.getElementById('upload_document'));

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
        $('#exampleModalCenter').modal('hide');
        toastr.success(jsonData.dbMessage);
        $('#dtblUser').DataTable().ajax.reload();

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
