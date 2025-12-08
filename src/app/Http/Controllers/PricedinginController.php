<?php

namespace App\Http\Controllers;
use App\Models\Pricedingin;
use Illuminate\Http\Request;
use DataTables;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class PricedinginController extends Controller
{
    public function index()
    {
        return view('priceDingin.priceDingin');
    }
}
