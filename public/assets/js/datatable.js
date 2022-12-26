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
                    d.select_user = $('#select_user').val();
                },
                
            },
            "sDom": "<'row'<'col-lg-1 col-md-1 col-sm-1 dtblfilter'>'row'<'col-lg-5 col-md-4 col-sm-4 dtblPtm'>'row'<'col-xs-4 col-sm-3 'l><'col-lg-1 col-md-12 col-sm-12'><'col-md-4 col-sm-4'>f>t<'row'<'col-lg-6 col-md-12 col-sm-12' <'row' <'col-lg-6 col-md-12 col-sm-12' i>>><'col-lg-6 col-md-12 col-sm-12'p>>",
            "aoColumns": [
                { "data": 'id', "name": "id", "className": "text-center", "sWidth": "5%" },
                { "data": "name", "name": "name", "sWidth": "15%" },
                { "data": "email", "name": "email", "sWidth": "20%" },
                { "data": "Phone_no", "name": "Phone_no", "sWidth": "20%" },
                { "data": "address", "name": "address", "sWidth": "20%" },
                { "data": "user_type", "name": "user_type", "sWidth": "10%" },   
            ],
        });
    

$("#select_user").change(function(){
    dtblUser.ajax.reload();
});
})
function add_hr()
{
    $('#exampleModalCenter').modal('show');
}
function submit_hr_details()
{
        var user_name =  document.getElementById('user_name').value;
        var email  = document.getElementById('mail_id').value;
        var phn_no = document.getElementById('mob').value;
        var address = document.getElementById('address').value;
    
         $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                    'Accept': 'application/json', 
                },
                type:'POST',
                url:'submit_hr_details',
                data:{user_name:user_name,email:email,phn_no:phn_no,address:address},
                
                success:function(response){
                   console.log(response);
                    var jsonData=JSON.parse(JSON.stringify(response));
                    console
                    if(jsonData.dbStatus)
                    {
                        $('#exampleModalCenter').modal('hide');
                       toastr.success(jsonData.dbMessage);
                       dtblUser.ajax.reload();
                    }else{
                        toastr.error(jsonData.dbMessage);
                    }
                }
            });
}
