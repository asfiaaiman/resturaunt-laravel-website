@extends('layouts.admin.main')
<style>
    @import url('https://fonts.googleapis.com/css?family=Muli&display=swap');

* {
	box-sizing: border-box;
}

.course {
	background-color: #fff;
	border-radius: 10px;
	box-shadow: 0 10px 10px rgba(0, 0, 0, 0.2);
	display: flex;
	max-width: 100%;
	margin: 20px;
	overflow: hidden;
	width: 1000px;
}

.course h6 {
	opacity: 0.6;
	margin: 0;
	letter-spacing: 1px;
	text-transform: uppercase;
}

.course h2 {
	letter-spacing: 1px;
	margin: 10px 0;
}

.course-preview {
	background-color: #2A265F;
	color: #fff;
	padding: 30px;
	max-width: 250px;
}

.course-preview a {
	color: #fff;
	display: inline-block;
	font-size: 12px;
	opacity: 0.6;
	margin-top: 30px;
	text-decoration: none;
}

.course-info {
	padding: 30px;
	position: relative;
	width: 100%;
}

.progress-container {
	position: absolute;
	top: 30px;
	right: 30px;
	text-align: right;
	width: 150px;
}

.progress {
	background-color: #ddd;
	border-radius: 3px;
	height: 5px;
	width: 100%;
}

.progress::after {
	border-radius: 3px;
	background-color: #2A265F;
	content: '';
	position: absolute;
	top: 0;
	left: 0;
	height: 5px;
	width: 66%;
}

.progress-text {
	font-size: 10px;
	opacity: 0.6;
	letter-spacing: 1px;
}

.btn {
	background-color: #2A265F;
	border: 0;
	border-radius: 50px;
	box-shadow: 0 10px 10px rgba(0, 0, 0, 0.2);
	color: #fff;
	font-size: 16px;
	padding: 12px 25px;
	
	letter-spacing: 1px;
}

/* SOCIAL PANEL CSS */
.social-panel-container {
	position: fixed;
	right: 0;
	bottom: 80px;
	transform: translateX(100%);
	transition: transform 0.4s ease-in-out;
}

.social-panel-container.visible {
	transform: translateX(-10px);
}

.social-panel {	
	background-color: #fff;
	border-radius: 16px;
	box-shadow: 0 16px 31px -17px rgba(0,31,97,0.6);
	border: 5px solid #001F61;
	display: flex;
	flex-direction: column;
	justify-content: center;
	align-items: center;
	font-family: 'Muli';
	position: relative;
	height: 169px;	
	width: 370px;
	max-width: calc(100% - 10px);
}

.social-panel button.close-btn {
	border: 0;
	color: #97A5CE;
	cursor: pointer;
	font-size: 20px;
	position: absolute;
	top: 5px;
	right: 5px;
}

.social-panel button.close-btn:focus {
	outline: none;
}

.social-panel p {
	background-color: #001F61;
	border-radius: 0 0 10px 10px;
	color: #fff;
	font-size: 14px;
	line-height: 18px;
	padding: 2px 17px 6px;
	position: absolute;
	top: 0;
	left: 50%;
	margin: 0;
	transform: translateX(-50%);
	text-align: center;
	width: 235px;
}

.social-panel p i {
	margin: 0 5px;
}

.social-panel p a {
	color: #FF7500;
	text-decoration: none;
}

.social-panel h4 {
	margin: 20px 0;
	color: #97A5CE;	
	font-family: 'Muli';	
	font-size: 14px;	
	line-height: 18px;
	text-transform: uppercase;
}

.social-panel ul {
	display: flex;
	list-style-type: none;
	padding: 0;
	margin: 0;
}

.social-panel ul li {
	margin: 0 10px;
}

.social-panel ul li a {
	border: 1px solid #DCE1F2;
	border-radius: 50%;
	color: #001F61;
	font-size: 20px;
	display: flex;
	justify-content: center;
	align-items: center;
	height: 50px;
	width: 50px;
	text-decoration: none;
}

.social-panel ul li a:hover {
	border-color: #FF6A00;
	box-shadow: 0 9px 12px -9px #FF6A00;
}

.floating-btn {
	border-radius: 26.5px;
	background-color: #001F61;
	border: 1px solid #001F61;
	box-shadow: 0 16px 22px -17px #03153B;
	color: #fff;
	cursor: pointer;
	font-size: 16px;
	line-height: 20px;
	padding: 12px 20px;
	position: fixed;
	bottom: 20px;
	right: 20px;
	z-index: 999;
}

.floating-btn:hover {
	background-color: #ffffff;
	color: #001F61;
}

.floating-btn:focus {
	outline: none;
}

.floating-text {
	background-color: #001F61;
	border-radius: 10px 10px 0 0;
	color: #fff;
	font-family: 'Muli';
	padding: 7px 15px;
	position: fixed;
	bottom: 0;
	left: 50%;
	transform: translateX(-50%);
	text-align: center;
	z-index: 998;
}

.floating-text a {
	color: #FF7500;
	text-decoration: none;
}

@media screen and (max-width: 480px) {

	.social-panel-container.visible {
		transform: translateX(0px);
	}
	
	.floating-btn {
		right: 10px;
	}
}
</style>
@section('content')
<div class="container">
<div class="courses-container">
    
	<div class="course">
		<div class="course-preview">
			<h6>Food Category</h6>
			<h2>{{$foodtype->name}}</h2>
            <button type="button" class="btn btn-primary"  data-toggle="modal" data-target="#exampleModal">
       Update Status
</button>
<a href="{{route('foodtypes')}}" class="btn btn-secondary">Back <i class="fas fa-chevron-left"></i></a>
			
		</div>
		<div class="course-info">
			<!-- <div class="progress-container"> -->
				<!-- <div class="progress"></div> -->
				<!-- <span class="progress-text"> -->
					<!-- 6/9 Challenges -->
				<!-- </span> -->
			<!-- </div> -->
            <table class="table table-striped table-responsive">
                    <tr>
            <td><b>Status:</b> </td>
            <td>
            @switch($foodtype->status)
                @case(1)
                <span class="badge badge-success"><b>Available</b></span>
                @break
                @case(0)
                <span class="badge badge-danger"><b>Unavailable</b></span>
                @break
                @default
                <span class="label label-success"><b>Public</b></span>
            @endswitch
            </td>
            </tr>
            <tr>
                <td><b>Created At:</b></td>
                <td>{{$foodtype->created_at->format('d-M-Y h:i A')}}</td>
            </tr>
            </table>
            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">

                                <div class="modal-header">
                                <h3 class="box-title">Update Status</h3>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span></button>
                                    
                                </div>
                                <div class="modal-body">

                                    <form id="" method="POST" action="{{route('foodtypes.storeStatus')}}">
                                        @csrf
                                        <input type="hidden" name="requestid" value="{{$foodtype['id']}}">
                                        <div class="box-body">
                                            <div class="form-group col-md-12">
                                                <label>Select status</label>
                                                <select class="form-control" name="status" id="status" required >
                                                    <option value="">Select</option>
                                                    <option value="0">Unavailable</option>
                                                    <option value="1">Available</option>
                                                </select>
                                            </div>
                                        </div >                                                                                                                                                                                                                                     
                                        <!-- /.box-body -->
                                        <div class="modal-footer">
     <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
     <button data-loading-text="<i class='fa fa-circle-o-notch fa-spin'></i> Processing..." type="submit" class="btn btn-primary pull-right">
         Submit
     </button>
 </div>
                                    </form>
                                </div>

                            </div>
                            <!-- /.modal-content -->
                        </div>
                        <!-- /.modal-dialog -->
                    </div>

                </div>
                
                  
                   
                   
                <!-- </div> -->


			<!-- <button class="btn">Update Status</button> -->
		</div>
	</div>
    
</div>

<!-- SOCIAL PANEL HTML -->
</div>
</div>
<script>
    // INSERT JS HERE


// SOCIAL PANEL JS





</script>
@endsection