<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\ModulesModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\DataTables;

class AddMenuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $userId = session('user_data.id');
        if($userId){
            if($request->ajax()){
                return $this->getGrid();
            }
            $modules_detals=ModulesModel::orderBy('module_id')
            ->get();
            return view('admin.add_menu',compact('modules_detals'));
        }else{
            return view('auth.login');
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       $err=0;
       $msg="";
       $status_flag=1;
       // Use database transaction
       DB::beginTransaction();
       try {
           // Retrieve validated data
           $data=[
               'module_id' =>$request->module,
               'controller' =>$request->controller_id,
               'path' =>$request->path,
               'status_flag' => $status_flag,
           ];
           $rules = [
               'module_id' => 'required',
               'controller' => 'required',
               'path' => 'required',

           ];
           // Create a validator instance
           $validator = Validator::make($data, $rules);
       
           // Check if validation fails
           if ($validator->fails()) {
               // Return validation errors as JSON response
               return response()->json([
                   'err' => 1,
                   'message' => $validator->errors()->first(),
               ]);
           }else{
               // $serializedData = serialize($data);
               $saved=DB::table('public.add_menu')->insert($data);
               if($saved){
                   $err=0;
                   $msg="saved successfully";
               }else{
                   $err=1;
                   $msg="Error in saving Records";
               }
   
           }
       
           if ($err == 0) {
               // Commit transaction
               DB::commit();
               return response()->json([
                   'err' => $err,
                   'msg' =>$msg,
               ]);          
           } else {
               // Rollback transaction if operation fails
               DB::rollback();
               return response()->json([
                   'err' => $err,
                   'msg' =>$msg,
               ]);
           }
   
   
       } catch (\Exception  $e) {
           // Rollback transaction on model not found exception
           DB::rollback();
           return response()->json(['error' => $e->getMessage()]);
       }
    }

    public function getGrid()
    {
        $modules = DB::table('public.add_menu')->select('*')->get();

        return DataTables::of($modules)
            ->addColumn('actions', function($row) {
                return '<button class="btn btn-sm btn-primary">Edit</button>
                        <button class="btn btn-sm btn-danger">Delete</button>';
            })
            ->addColumn('status', function($row) {
                if($row->status_flag == 1){
                    return '<span class="badge bg-success">Saved</span>';
                }else if($row->status_flag == 2){
                    return '<span class="badge bg-warning">Updated</span>';

                }
            })

            ->rawColumns(['actions','status'])
            ->make(true);
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
