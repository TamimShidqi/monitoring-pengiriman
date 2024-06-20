<?php

namespace App\Http\Controllers;

use App\Models\History;
use App\Models\pengiriman;
use Illuminate\Http\Request;

class HistoryController extends Controller
{
    public function index()
    {
        $history = History::all();
        $history = pengiriman::where('status', 'arrived')->get();
        return view('history.index', compact('history'));
    }
}
