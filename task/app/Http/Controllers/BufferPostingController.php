<?php

namespace Bulkly\Http\Controllers;

use Illuminate\Http\Request;
use Bulkly\BufferPosting;

class BufferPostingController extends Controller
{
    public function index()
    {
        $buffer_posts = BufferPosting::all();
        $buffer_posts = BufferPosting::paginate(10);
        return view('pages.bufferPosting',['buffer_posts'=>$buffer_posts]);
    }

    
}
