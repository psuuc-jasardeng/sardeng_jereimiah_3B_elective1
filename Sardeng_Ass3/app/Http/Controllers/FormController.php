<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PhpParser\Node\Expr\Print_;

class FormController extends Controller
{
    public function showForm(){
        return view('Form');
    }

    public function handleForm(Request $request){
        $validated = $request->validate([
            'firstname' => 'required|string|max:50',
            'lastname' => 'required|string|max:50',
            'Sex' => 'required',
            'Mobilephone' => 'required|numeric',
            'Telephone-Number' => 'required|numeric',
            'Birthdate' => 'required|date|date_format:Y-m-d',
            'Address' => 'required|string|max:100',
            'Website' => 'required|url',
            
        ]);

        return back() -> with('success', 'Form submitted successfully!');
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
   

    /**
     * Store a newly created resource in storage.
     */
   
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
