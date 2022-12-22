$(document).ready(function () {
    let dtblUser = $('#dtblUser').DataTable({
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
        "bDestroy": false,
        "ajax": {

            "url": "user_details",
            "type": "get",
            dataSrc: 'aaData'
        },
        "sDom": "<'row'<'col-xs-4 col-sm-3 'l><'col-lg-1 col-md-12 col-sm-12'><'col-md-4 col-sm-4'>f>t<'row'<'col-lg-6 col-md-12 col-sm-12' <'row' <'col-lg-6 col-md-12 col-sm-12' i>>><'col-lg-6 col-md-12 col-sm-12'p>>",
        "aoColumns": [
            { "data": 'id', "name": "id", "className": "text-center", "sWidth": "5%" },
            { "data": "name", "name": "name", "sWidth": "15%" },
            { "data": "email", "name": "email", "sWidth": "20%" },
            { "data": "Phone_no", "name": "Phone_no", "sWidth": "20%" },
            { "data": "address", "name": "address", "sWidth": "20%" },
            { "data": "user_type", "name": "user_type", "sWidth": "10%" },
            {
                "sName": "action",
                "data": null,
                "className": "text-center",
                "defaultContent": "<button id='edit_user' action ='edit_user'  class='btn btn-info btn-sm'>Add User</button>"
            }
        ],

    });
})