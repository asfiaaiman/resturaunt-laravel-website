@extends('layouts.admin.main')
@section('content')
    <div class="container py-5" style="    background-color: goldenrod;">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Manage Received Messages</h3>

                </div>
                <div class="box-body">
                    <table id="userTable" class="display responsive nowrap" style="width:100%">
                        <thead>
                        <tr>
                            <th>Id</th>
                            <th>Name</th>
                            <th>Email Address</th>
                            <th>Subject</th>
                            <th>Message</th>
                            <th>Status</th>
                            <th>Received at</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>

                        </tbody>
                        <tfoot>
                        <tr>
                            <th>Id</th>
                            <th>Name</th>
                            <th>Email Address</th>
                            <th>Subject</th>
                            <th>Message</th>
                            <th>Status</th>
                            <th>Received at</th>
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
                "ajax":"{{ route('messages') }}",
                "columns":[
                    {"data":"id"},
                    {"data":"name"},
                    {"data" : "email"},
                    {"data" : "subject"},
                    {"data": "message"},
                    {"data":"status"},
                    {"data":"created_at"},
                    {"data":"options",orderable:true,searchable:true},
                ]
            });

            $('body').on('click', '.btnDelete', function () {
                var foodtype_id = $(this).attr('data-id'); console.log(foodtype_id);
                $.get('foodtype/' + foodtype_id +'/delete', function (data) {
                    $('#userTable tbody #'+ foodtype_id).remove();
                })
            });






        });
    </script>

@endsection
