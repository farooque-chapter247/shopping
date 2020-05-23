<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Session;
use App\Enums\AlertStatusClass;

class DashBoardController extends Controller
{
    function index(){
        
        if(Auth::user()->hasRole('super-admin')){
            return view('dashboard');
        }

        return $this->customer();
    }

    function customer(){
        return redirect()->route('front');
    }


}