<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="http://netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css"> 
    <script src="http://code.jquery.com/jquery.js"></script>
    <script src="//cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <title>Document</title>
</head>
<body>
 
<div class="container">
    <div class="panel panel-primary">

     <div class="panel-heading">Server Side Datatable in Laravel 5</div>

      <div class="panel-body">

          <table class="table table-bordered" id="product-table">
            <thead>
                <tr>
                    <th>SNo.</th>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Price</th>
                    <th>Action</th>
                </tr>
            </thead>
          </table>

     </div>  
    </div>   
</div>   
<script>



$(function() {
    $('#product-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: '{!! Url('listdata') !!}',
        columns: [
            { data: 'id' },
            { data: 'judul'},
            { data: 'gambar'},
            { data: 'tanggal'},
            {data:"action",orderable:false,searchable:false}
        ]
    });
});
</script>

</body>
</html> 