<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class NoteController extends Controller
{
    //
    public function index(){
        return view('dashboard.notes.index',[
            'notes' => Auth::user()->notes
        ]);
    }
}
