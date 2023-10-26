<?php

namespace App\Http\Controllers;

use App\Models\Electricity;
use Illuminate\Http\Request;

class ElectricityController extends Controller
{
   
    public function __construct()
    {
        $this->middleware(['auth','verified']);
    } 
    
    public function index()
    {
        return view("vas.electricity.index");
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
    }

    /**
     * Display the specified resource.
     */
    public function show(Electricity $electricity)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Electricity $electricity)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Electricity $electricity)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Electricity $electricity)
    {
        //
    }
}
