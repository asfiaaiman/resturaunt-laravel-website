<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Message::all();
        if(request()->ajax()) {
            return datatables()::of($data)
                ->addColumn('id',function($data){
                    return $data->id;
                })
                ->addColumn('name',function($data){
                    return $data->name;
                })
                ->addColumn('email',function($data){
                    return $data->email;
                })
                ->addColumn('subject',function($data){
                    return $data->subject;
                })
                ->addColumn('message', function ($data){
                    return $data->message;
                })
                ->addColumn('status', function ($data){
                    if($data->status==1){
                        return $status = "<span class='badge badge-success'>Opened</span>";

                    }else{
                        return $status = "<span class='badge badge-danger'>New</span>";
                    }
                })
                ->addColumn('created_at',function($data){
                    return $data->created_at->format('d-M-Y h:i A');
                })
                ->addColumn('options',function($data){
                    $action = '<span class="action_btn">';
                    //show
                    $action .= '<a href="'.url("/messages/show/".$data->id).'" class="btn btn-primary" title="View Detail"><i class="fa fa-eye"></i> </a>';

                    //delete

                    $action .= '<a href="'.url("/messages/".$data->id."/delete").'" class="btn btn-danger btnDelete"><i class="fa fa-trash"></i></a>';

                    $action .= '&nbsp;&nbsp;';


                    $action .= '</span>';
                    return $action;

                })
                ->rawColumns(['options','id','name','email','subject','message','status','created_at'])
                ->make(true);
        }
        return view('admin.messages.messages');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $message = Message::where('id',$id)->first();
        return view('admin.messages.show')->with(['id' => $id, 'message' => $message]);
    }

    public function storeStatus(Request $request)
    {
        $this->validate(request(), [
            'status' => 'required'
        ]);
        $id = $request->requestid;
        $process=  Message::where('id',$id)->first();
        $process->status=$request->get('status');
        $process->updated_at = date('Y-m-d H:i:s');
        $process->save();
        return back();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
