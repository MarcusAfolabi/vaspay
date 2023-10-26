<?php

namespace App\Http\Controllers;

use App\Models\Cable;
use Illuminate\Http\Request;

class CableController extends Controller
{
    
    public function index()
    {
        return view("vas.cable.index");
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
    public function show(Cable $cable)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Cable $cable)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Cable $cable)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Cable $cable)
    {
        //
    }
}
