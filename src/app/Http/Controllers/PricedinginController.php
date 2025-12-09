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

    public function getData(Request $request){
        if ($request->ajax()) {

            $data = DB::table('pricedingin')
                ->select(
                    'pricedingin.id',
                    'pricedingin.KODE',
                    'pricedingin.PERIODE',
                    'pricedingin.PLAT',
                    'pricedingin.JENIS',
                    'pricedingin.ITEM',
                    'pricedingin.HARGA',
                    'pricedingin.KUNCI',
                    'pricedingin.created_at'
                );
            $data->orderBy('pricedingin.created_at', 'desc');
            return DataTables::of($data)
                ->addIndexColumn()

                ->editColumn('HARGA', function ($row) {
                    return number_format($row->HARGA, 0, ',', '.');
                })

                ->addColumn('action', function ($row) {
                    if (!Auth::check() || Auth::user()->roles != 'admin') {
                        return '-';
                    }

                    return '
                        <div class="btn-group">
                            <button onclick="editDataDingin('.$row->id.')" class="btn btn-sm btn-warning">
                                <i class="bx bx-edit"></i>
                            </button>
                            <button onclick="deleteDataDingin('.$row->id.')" class="btn btn-sm btn-danger">
                                <i class="bx bx-trash"></i>
                            </button>
                        </div>
                    ';
                })

                ->rawColumns(['action'])
                ->make(true);
        }
    }
}
