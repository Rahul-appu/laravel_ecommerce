<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class ProductImageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $userId = session('user_data.id');
        if($userId){
            // if($request->ajax()){
            //     return $this->getGrid();
            // }
            return view('admin.product_image');
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
        //
        $err=0;
        $msg="";
        $status_flag=1;
        // Use database transaction
        DB::beginTransaction();
        try {
            // Retrieve validated data
            if ($request->hasFile('files')) {
                $image = $request->file('files')[0]; // Access the first file
                $imageName = time() . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('uploads'), $imageName); // Store the image in the 'uploads' folder
                // Save image path to the database
                $imagePath = 'public/uploads/' . $imageName;
                $data=[
                    'product_name' =>$request->product_name,
                    'product_desc' =>$request->product_desc,
                    'image_path' =>$imagePath,
                ];
                $rules = [
                    'product_name' => 'required',
                    'product_desc' => 'required',
                    'image_path' => 'required', // Validate MIME type and size
     
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
                    $saved=DB::table('public.product')->insert($data);
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
            }else{
                $err=1;
                $msg="please upload  the image";
            }
    
    
        } catch (\Exception  $e) {
            // Rollback transaction on model not found exception
            DB::rollback();
            return response()->json(['error' => $e->getMessage()]);
        }
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
