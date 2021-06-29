<?php

namespace App\Http\Controllers;

use App\Models\FoodDetail;
use App\Models\Foodtype;
use Illuminate\Http\Request;
use DataTables;
Use Redirect;
use Symfony\Component\HttpFoundation\Response;

class FoodtypeController extends Controller
{
    public function index()
    {
        $data = Foodtype::all();
        if(request()->ajax()) {
            return datatables()::of($data)
            ->addColumn('id',function($data){
                return $data->id;
            })
            ->addColumn('name',function($data){
                return $data->name;
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
                    $action .= '<a href="'.url("/foodtypes/show/".$data->id).'" class="btn btn-primary" title="View Detail"><i class="fa fa-eye"></i> </a>';

                //edit

                    $action .= '<a href="'.url("/foodtypes/".$data->id."/edit").'" class="btn btn-success" title="Edit"><i class="fa fa-edit"></i> </a>';

                //delete

                    $action .= '<a href="'.url("/foodtypes/".$data->id."/delete").'" class="btn btn-danger btnDelete"><i class="fa fa-trash"></i></a>';

                    $action .= '&nbsp;&nbsp;';


                $action .= '</span>';
                return $action;

            })
            ->rawColumns(['options','id','name','status','created_at'])
            ->make(true);
    }
        return view('admin.foodtype.foodtype');
    }

    public function create() {
        return view('admin.foodtype.create');
    }

    public function store(Request $request)
{
    $this->validate(request(), [
        'name' => 'required' ,
        'slug' => 'required'
    ]);

    $foodtype_id = $request->id;

    $foodtype   =   new Foodtype();
    $foodtype->name = $request->name;
    $foodtype->slug = $request->slug;
    $foodtype->save();

     return redirect('/foodtypes')->with('success', 'Food Category has been added successfully.');

}

public function show($id) {
    $foodtype = Foodtype::where('id',$id)->first();
    return view('admin.foodtype.show')->with(['id' => $id, 'foodtype' => $foodtype]);
}

public function edit($id)
{
    $where = array('id' => $id);
    $foodtype  = Foodtype::where($where)->first();

    return view('admin.foodtype.edit')->with(['foodtype' => $foodtype]);
}

public function update(Request $request, $id)
    {
        //
        //dd($request->all());
        $this->validate(request(), [
            'name' => 'required',
        ]);

        $foodtype=  Foodtype::where('id',$id)->first();
        $foodtype->name=$request->get('name');
        $foodtype->updated_at = date('Y-m-d H:i:s');
        $foodtype->save();

        $foodtypeId=$foodtype->id;

        return redirect('foodtypes/');

    }


public function destroy($id)
    {
        //
        $student = Foodtype::where('id',$id)->delete();
        return redirect('foodtypes/');
    }
public function storeStatus(Request $request)
{
    $this->validate(request(), [
        'status' => 'required'
    ]);
    $id = $request->requestid;
    $process=  Foodtype::where('id',$id)->first();
    $process->status=$request->get('status');
    $process->updated_at = date('Y-m-d H:i:s');
    $process->save();
    return back();
}
}
