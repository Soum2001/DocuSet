$(document).ready(function () {
    var dtblUser = $('#dtblUser').DataTable({
        "lengthMenu": [
            [10, 15, 45, 75, -1],
            [10, 15, 45, 75, 'all']
        ],
        "pageLength": 10,
        "bProcessing": true,
        "bServerSide": true,
        "bStateSave": false,
        "bPaginate": true,
        "bLengthChange": false,
        "bFilter": true,
        "bSort": false,
        "bInfo": true,
        "bAutoWidth": false,
        "bDestroy": true,
        "ajax": {
            "headers": {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                'Accept': 'application/json',
            },
            "url": "user_details",
            "type": "post",
            "data": function (d) {
                d.user_type = $("#user_type").val();
            },

        },
        "sDom": "<'row'<'col-lg-1 col-md-1 col-sm-1 dtblfilter'>'row'<'col-lg-5 col-md-4 col-sm-4 dtblPtm'>'row'<'col-xs-4 col-sm-3 'l><'col-lg-1 col-md-12 col-sm-12'><'col-md-4 col-sm-4'>f>t<'row'<'col-lg-6 col-md-12 col-sm-12' <'row' <'col-lg-6 col-md-12 col-sm-12' i>>><'col-lg-6 col-md-12 col-sm-12'p>>",
        "aoColumns": [
            { "data": 'id', "name": "id", "className": "text-center", "sWidth": "5%" },
            { "data": "name", "name": "name", "sWidth": "15%" },
            { "data": "email", "name": "email", "sWidth": "20%" },
            { "data": "phone_no1", "name": "phone_no1", "sWidth": "10%" },
            { "data": "address1", "name": "address1", "sWidth": "20%" },
            { "data": "user_type", "name": "user_type", "sWidth": "10%" },
            {
                "sName": "action",
                "data": null,
                "className": "text-center",
                "defaultContent": "<button id='edit_user' action ='edit_user' class='btn btn-info btn-sm'><i class='fa fa-edit' ></i></button>"
            }
        ],
    });
    var dtblCandidate = $('#dtblCandidate').DataTable({
        "lengthMenu": [
            [10, 15, 45, 75, -1],
            [10, 15, 45, 75, 'all']
        ],
        "pageLength": 10,
        "bProcessing": true,
        "bServerSide": true,
        "bStateSave": false,
        "bPaginate": true,
        "bLengthChange": false,
        "bFilter": true,
        "bSort": false,
        "bInfo": true,
        "bAutoWidth": false,
        "bDestroy": true,
        "ajax": {
            "headers": {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                'Accept': 'application/json',
            },
            "url": "candidate_details",
            "type": "post",
            "data": function (d) {
                d.user_type = $("#user_type").val();
            },

        },
        "sDom": "<'row'<'col-lg-1 col-md-1 col-sm-1 dtblfilter'>'row'<'col-lg-5 col-md-4 col-sm-4 dtblPtm'>'row'<'col-xs-4 col-sm-3 'l><'col-lg-1 col-md-12 col-sm-12'><'col-md-4 col-sm-4'>f>t<'row'<'col-lg-6 col-md-12 col-sm-12' <'row' <'col-lg-6 col-md-12 col-sm-12' i>>><'col-lg-6 col-md-12 col-sm-12'p>>",
        "aoColumns": [
            { "data": 'id', "name": "id", "className": "text-center", "sWidth": "5%" },
            { "data": "name", "name": "name", "sWidth": "15%" },
            { "data": "email", "name": "email", "sWidth": "20%" },
            { "data": "Phone_no", "name": "Phone_no", "sWidth": "10%" },
            { "data": "address", "name": "address", "sWidth": "20%" },
            { "data": "user_type", "name": "user_type", "sWidth": "10%" },

        ],
    });
    $('#dtblUser tbody').on('click', 'button[action=edit_user]', function (event) {
        var data = dtblUser.row($(this).parents('tr')).data();
        var oTable = $('#dtblUser').dataTable();
        var row;
        if (event.target.tagName == "BUTTON")
            row = event.target.parentNode.parentNode;
        else if (event.target.tagName == "I")
            row = event.target.parentNode.parentNode.parentNode;
        $(row).addClass('success');

        $("#exampleModalLabel").html('Edit Group');
        $("#edit_user_details").html('<i class="fa fa-edit"></i> Update');
        document.getElementById("password_div").style.display = "none";

        //$("#edit_user").removeAttr('disabled');

        var user_name = oTable.fnGetData(row).name;
        var email = oTable.fnGetData(row).email;
        var address1 = oTable.fnGetData(row).address1;
        var address2 = oTable.fnGetData(row).address2;
        var phn_no1 = oTable.fnGetData(row).phone_no1;
        var phn_no2 = oTable.fnGetData(row).phone_no2;
        var city = oTable.fnGetData(row).city;
        var state = oTable.fnGetData(row).state;
        var zip = oTable.fnGetData(row).zip;
        //console.log(oTable.fnGetData(row).username);
        
        $('#user_id').val(oTable.fnGetData(row).id);

        $('#name').val(user_name);
        $('#email').val(email);
        $('#address1').val(address1);
        $('#address2').val(address2);
        $('#phone_no1').val(phn_no1);
        $('#phone_no2').val(phn_no2);
        $('#city').val(city);
        $('#state').val(state);
        $('#zip').val(zip);
      
        $('#exampleModalCenter').modal('show');
    });

    $("#user_type").change(function () {
        alert($("#user_type").val());
        dtblUser.ajax.reload();
    });

})

function add_hr() {
    $('#exampleModalCenter').modal('show');
}
function invite_candidate() {
    $('#invite_candidate_modal').modal('show');
}
function submit_hr_details() {
    var hr_details = document.getElementById("hr_details");
    var formData = new FormData(hr_details);
    formData.append('user_type_id',2);
    var id = $('#user_id').val();
    if (id != "") {
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: "edit_user",
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
    } else {
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                'Accept': 'application/json',
            },
            type: 'POST',
            url: 'submit_hr_details',
            data: formData,
            processData: false,
            contentType: false,
            success: function (response) {
                console.log(response);
                var jsonData = JSON.parse(JSON.stringify(response));
                console
                if (jsonData.dbStatus) {
                    $('#exampleModalCenter').modal('hide');
                    toastr.success(jsonData.dbMessage);
                    $('#dtblUser').DataTable().ajax.reload();
                } else {
                    toastr.error(jsonData.dbMessage);
                }
            }
        });
    }

}
function Send_candidate_mail(){
    var name = document.getElementById('user_name').value;
    var email  = document.getElementById('mail_id').value;
    var position  = document.getElementById('position').value;
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
            'Accept': 'application/json', 
        },
        type:'POST',
        url:'mail_invitation',
        data:{user_name:name,email:email,position:position},
        
        success:function(response){
           console.log(response);
            var jsonData=JSON.parse(JSON.stringify(response));
            console.log(jsonData);
            if(jsonData.dbStatus)
            {
                $('#invite_candidate_modal').modal('hide');
               toastr.success(jsonData.dbMessage);
            }else{
                toastr.error(jsonData.dbMessage);
            }
        }
    });
}
function register_candidate()
{
    var form = document.getElementById("form");
    var formData = new FormData(form);
    formData.append('user_type_id',3);
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: "register",
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
function load_10th_marksheet(input) {
    console.log(input.files[0].name);
    // if (input.files && input.files[0]) {
    //     var reader = new FileReader();
    //     reader.onload = function (e) {
    //         $('#upload_field')
    //             .attr('value', e.target.result);
    //     };
    // }
}

