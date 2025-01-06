<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

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
    $err = 0;
    $msg = "";
    $status_flag = 1;

    // Use database transaction
    DB::beginTransaction();
    try {
        // Validate the request
        $validated = $request->validate([
            'product_name' => 'required',
            'product_desc' => 'required',
            'file' => 'required|mimes:jpeg,png,jpg,gif,svg|max:2048', // Image validation
        ]);

        // Check if file exists in the request
        if ($request->hasFile('file')) {
            $image = $request->file('file');  // Use the correct input name here
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            
            // Move image to 'uploads' folder
            $image->move(public_path('uploads'), $imageName);

            // Image path relative to 'public' directory
            $imagePath = 'uploads/' . $imageName;

            // Prepare data for database insertion
            $data = [
                'product_name' => $request->product_name,
                'product_desc' => $request->product_desc,
                'image_path' => $imagePath,  // Store the image path
            ];
    dd($data);


            // Insert the data into the 'product' table
            $saved = DB::table('public.product')->insert($data);

            if ($saved) {
                $err = 0;
                $msg = "Saved successfully";
            } else {
                $err = 1;
                $msg = "Error in saving records";
            }

            // Commit transaction if everything is fine
            if ($err == 0) {
                DB::commit();
                return response()->json([
                    'err' => $err,
                    'msg' => $msg,
                ]);
            } else {
                // Rollback if there is an error
                DB::rollback();
                return response()->json([
                    'err' => $err,
                    'msg' => $msg,
                ]);
            }
        } else {
            // Handle case where no image was uploaded
            $err = 1;
            $msg = "Please upload the image";
            return response()->json([
                'err' => $err,
                'msg' => $msg,
            ]);
        }

    } catch (\Exception $e) {
        // Rollback transaction on exception
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
