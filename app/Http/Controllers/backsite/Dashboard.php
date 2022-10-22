<?php

namespace App\Http\Controllers\backsite;

use App\Http\Controllers\Controller;
use App\Models\Asset;
use Illuminate\Http\Request;

class Dashboard extends Controller
{
    public function index(){
        return view('pages.backsite.dashboard.index',[
            'totalAsset' => Asset::count(),
            'totalAssetBaik' => Asset::where('kondisi', 'baik')->count(),
            'totalAssetRusak' => Asset::where('kondisi', 'rusak')->count(),
        ]);
    }
}
