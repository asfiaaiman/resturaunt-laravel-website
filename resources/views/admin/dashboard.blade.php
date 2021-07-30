@extends('layouts.admin.main')
<style>
    .dashboard-icon{
    font-size: 40px;
    margin: 30px;
  }
</style>
@section('content')
    <div class="col-md-12">
        <div class="row">
            <div class="col-md-12 " >
                <div class="row">
                    <div class="col-md-6">
                        <div class="card bg-success">
                            <i class="dashboard-icon fas fa-balance-scale"></i>
                            <span style="font-size: 40px;padding:40px">{{$order}}</span>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card bg-info">
                            <i class=" dashboard-icon fas fa-envelope"></i>
                            <span style="font-size: 40px;padding:40px">{{$message}}</span>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
    

@endsection
