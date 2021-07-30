<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Charts\OrderChart;
use App\Models\Order;

class OrderController extends Controller
{
        public function index()
    {
        $data = FoodDetail::with('foodtype')->get();
        $foodtype = Foodtype::where('status', '1')->get();
        if(request()->ajax()) {
            return datatables()::of($data)
            ->addColumn('id',function($data){
                return $data->id;
            })
            ->addColumn('name',function($data){
                return $data->name;
            })
            ->addColumn('price',function($data){
                return $data->price;
            })
            ->addColumn('foodtype_id',function($data){
                return $data->foodtype['name'];
            })
            ->addColumn('image', function ($data){
                $url= asset('storage/foods/images/'.$data->image);
                return '<img src="'.$url.'" border="0" height="100" width="100" class="img-rounded img-fluid" align="center" />';
            })
            ->addColumn('status', function ($data){
                if($data->status==1){
                    return $status = "<span class='badge badge-success'>Available</span>";

                }else{
                    return $status = "<span class='badge badge-danger'>Unavailable</span>";
                }
            })
            ->addColumn('created_at',function($data){
                return $data->created_at->format('d-M-Y h:i A');
            })
            ->addColumn('options',function($data){
                $action = '<span class="action_btn">';
                //show
                    $action .= '<a href="'.url("/foods/show/".$data->id).'" class="btn btn-primary" title="View Detail"><i class="fa fa-eye"></i> </a>';

                //edit

                    $action .= '<a href="'.url("/foods/".$data->id."/edit").'" class="btn btn-success" title="Edit"><i class="fa fa-edit"></i> </a>';

                //delete

                    $action .= '<a href="'.url("/foods/".$data->id."/delete").'" class="btn btn-danger btnDelete"><i class="fa fa-trash"></i></a>';

                    $action .= '&nbsp;&nbsp;';


                $action .= '</span>';
                return $action;

            })
            ->rawColumns(['options','id','name','price','foodtype_id','image','status','created_at'])
            ->make(true);
    }
        return view('admin.orders.index');
    }


    }
