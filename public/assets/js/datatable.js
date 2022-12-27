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
    
                "url": "user_details",
                "type": "get",
                "data": function(d){
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
    
                "url": "candidate_details",
                "type": "get",
                "data": function(d){
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
            var address = oTable.fnGetData(row).address;
            var phn_no = oTable.fnGetData(row).Phone_no;
            //console.log(oTable.fnGetData(row).username);
            $('#user_id').val(oTable.fnGetData(row).id);
    
            $('#user_name').val(user_name);
            $('#mail_id').val(email);
            $('#address').val(address);
            $('#mob').val(phn_no);
            $('#exampleModalCenter').modal('show');
        });

$("#user_type").change(function(){
    alert($("#user_type").val());
    dtblUser.ajax.reload();
});

})

function add_hr()
{
    $('#exampleModalCenter').modal('show');
}
function invite_candidate()
{
    $('#invite_candidate_modal').modal('show');
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
            console
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

function submit_hr_details()
{
    var id = $('#user_id').val();
    var user_name =  document.getElementById('user_name').value;
        var email  = document.getElementById('mail_id').value;
        var phn_no = document.getElementById('mob').value;
        var address = document.getElementById('address').value;
        var password = document.getElementById('password').value;
    if(id!="")
    {
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: "edit_user",
            type: "post",
            data: { id: id ,user_name:user_name,email:email,phn_no:phn_no,address:address,password:password},
            success: function (response) {
               console.log(response);
                if (response.dbStatus == 'SUCCESS') {
                    $('#exampleModalCenter').modal('hide');
                    dtblUser.ajax.reload();
                    // Loadcriteriatbl();
                    toastr.success(response.dbMessage);
                    
                } else if (response.dbStatus == 'FAILURE') {
                    toastr.error(response.dbMessage);
                }
            },
        });
    }else{
    
         $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                    'Accept': 'application/json', 
                },
                type:'POST',
                url:'submit_hr_details',
                data:{user_name:user_name,email:email,phn_no:phn_no,address:address,password:password},
                
                success:function(response){
                   console.log(response);
                    var jsonData=JSON.parse(JSON.stringify(response));
                    console
                    if(jsonData.dbStatus)
                    {
                        $('#exampleModalCenter').modal('hide');
                       toastr.success(jsonData.dbMessage);
                       $('#dtblUser').DataTable().ajax.reload();
                    }else{
                        toastr.error(jsonData.dbMessage);
                    }
                }
            });
    }
       
}
