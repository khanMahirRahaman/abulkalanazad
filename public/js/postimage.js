$(document).ready( function () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });


    // fetch data
    $('#dataList').DataTable({
        processing: true,
        serverSide: true,
        ajax: "/admin/post/gallery",
        columns: [
            { data: 'DT_RowIndex', name: 'id' },
            { data: 'image', name: 'image' },
            { data: 'action', name: 'action' },
        ],
        responsive: true,
        sorting: true,
        lengthMenu: [[10, 25, 50, -1], [10, 25, 50, "All"]],
        dom: 'lfBrtip'
    });
});


// delete data
function deleteData(id){
    if (confirm("Delete Record?") == true) {
        var id = id;
        $.ajax({
            type:"POST",
            url: base+"/contents/offers/delete",
            data: { id: id },
            dataType: 'json',
            success: function(res){
                toastr.success("What we offer Deleted Successfully");
                var oTable = $('#dataList').dataTable();
                oTable.fnDraw(false);
            },
            error: function (){
                toastr.error("Operation Failed");
            }
        });
    }
}

