<?php

namespace App\Http\Controllers;

use App\Models\FoodDetail;
use App\Models\Foodtype;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class FoodDetailController extends Controller
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
        return view('admin.food.food')->with('foodtype', $foodtype);
    }


    public function create() {
        $foodtypes = Foodtype::with('foods')->where('status', '1')->get();
        return view('admin.food.create')->with('foodtypes', $foodtypes);
    }

    public function store(Request $request)
{
    $this->validate(request(), [
        'name' => 'required',
        'price' => 'required',
        'slug' => 'required',
        'foodtype_id' => 'required',
        'image' => 'required',
    ]);

    $foodtype_id = $request->id;

    if($request->hasfile('image'))
    {
        $file = $request->file('image');
        $recordingfile=time().$file->getClientOriginalName();
         Storage::disk('local')->put('/public/foods/images/'.$recordingfile, File::get($file));
//        Storage::cloud()->put('/public/opcmembermeetingassets/videos/'.$recordingfile, File::get($file));
    }else{
        $recordingfile="";
    }



    $food   =   new FoodDetail();
    $food->name = $request->name;
    $food->price = $request->price;
    $food->slug = $request->slug;
    $food->foodtype_id = $request->foodtype_id;
    $food->image = $recordingfile;

    $food->save();

     return redirect('/foods')->with('success', 'Food Item  has been added successfully.');
    }

    public function show($id) {
        $food = FoodDetail::where('id',$id)->first();
        return view('admin.food.show')->with(['id' => $id, 'food' => $food]);
    }
    public function storeStatus(Request $request)
{
    $this->validate(request(), [
        'status' => 'required'
    ]);
    $id = $request->requestid;
    $process=  FoodDetail::where('id',$id)->first();
    $process->status=$request->get('status');
    $process->updated_at = date('Y-m-d H:i:s');
    $process->save();
    return back();
}

public function edit($id)
{
    $where = array('id' => $id);
    $food  = FoodDetail::where($where)->first();
    $foodtypes = Foodtype::where('status', '1')->get();

    return view('admin.food.edit')->with(['food' => $food, 'foodtypes' => $foodtypes]);
}

public function update(Request $request, $id)
    {
        //
        //dd($request->all());
        $this->validate(request(), [
            'name' => 'required',
            'price' => 'required',
            'slug' => 'required',
            'foodtype_id' => 'required',
            'image' => ['mimes:jpg,jpeg,png']
        ]);

        if($request->hasfile('image'))
        {
            $file = $request->file('image');
            $recordingfile=time().$file->getClientOriginalName();
            Storage::disk('local')->put('/public/foods/images/'.$recordingfile, File::get($file));
//        Storage::cloud()->put('/public/opcmembermeetingassets/videos/'.$recordingfile, File::get($file));
        }else{
            $recordingfile="";
        }

        $food=  FoodDetail::where('id',$id)->first();
        $food->name=$request->get('name');
        $food->price=$request->get('price');
        $food->foodtype_id=$request->get('foodtype_id');
        $food->image=$recordingfile;
        $food->updated_at = date('Y-m-d H:i:s');
        $food->save();

        $foodId=$food->id;

        return redirect('foods/');

    }

    public function destroy($id)
    {
        //
        $foods = FoodDetail::where('id',$id)->delete();
        return redirect('foods/');
    }




}
