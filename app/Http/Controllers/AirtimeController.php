<?php

namespace App\Http\Controllers;

use App\Models\Airtime;
use Illuminate\Http\Request;

class AirtimeController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth','verified']);
    } 
    
    public function index()
    {
        return view("vas.airtime.index");
    }

    
    public function create()
    {
        //
    }

   
    public function store(Request $request)
    {
        //
    }

    
    public function show(Airtime $airtime)
    {
        //
    }

   
    public function edit(Airtime $airtime)
    {
        //
    }
 
    public function update(Request $request, Airtime $airtime)
    {
        //
    }

  
    public function destroy(Airtime $airtime)
    {
        //
    }
}
