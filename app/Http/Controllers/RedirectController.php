<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Link;

class RedirectController extends Controller
{
     public function index (Link $link) {
        
        $link->increment('views');
        return redirect($link->original);
    }
}
