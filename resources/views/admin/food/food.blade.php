@extends('layouts.admin.main')
@section('content')
<div class="container py-5" style="    background-color: goldenrod;">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Manage Food Details</h3>

                        <span class="pull-right">
              <a href="{{route('foods.create')}}" class="btn btn-primary"><span class="fa fa-plus"></span> Add New Category</a>
              </span>

                </div>
                <div class="box-body">
                    <table id="userTable" class="display responsive nowrap" style="width:100%">
                        <thead>
                        <tr>
                            <th>Id</th>
                            <th>Image</th>
                            <th>Name</th>
                            <th>Price</th>
                            <th>Food Category</th>
                            <th>Status</th>
                            <th>Created at</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>

                        </tbody>
                        <tfoot>
                        <tr>
                            <th>Id</th>
                            <th>Image</th>
                            <th>Name</th>
                            <th>Price</th>
                            <th>Food Category</th>
                            <th>Status</th>
                            <th>Created at</th>
                            <th>Action</th>
                        </tr>
                        </tfoot>
                    </table>
                </div>


                <!-- /.box-header -->

            <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->

    <script src="{{asset('admin-assets/js/core/jquery.min.js')}}"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>

    <script type="text/javascript">
        $(document).ready(function(){
            $('#userTable').DataTable({
                "bDestroy": true,
                "processing":true,
                "serverSide":true,
                "order" :[ 0, "desc" ],
                "ajax":"{{ route('foods') }}",
                "columns":[
                    {"data":"id"},
                    {"data":"image"},
                    {"data":"name"},
                    {"data":"price"},
                    {"data":"foodtype_id"},
                    {"data":"status"},
                    {"data":"created_at"},
                    {"data":"options",orderable:true,searchable:true},
                ]
            });








            $('body').on('click', '.btnDelete', function () {
      var food_id = $(this).attr('data-id'); console.log(food_id);
      $.get('food/' + food_id +'/delete', function (data) {
          $('#userTable tbody #'+ food_id).remove();
      })
   });






        });
    </script>

@endsection
