<?php

namespace App\Http\Controllers\backsite;

use App\Models\Asset;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LaporanAssets extends Controller
{
    public function index(){
        return view('pages.backsite.laporan.lapasset', [
            'assets' => Asset::all()
        ]);
    }
}
