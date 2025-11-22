<?php

namespace App\Http\Controllers;

use App\Models\Mcustomer;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Validator;

class CustomerController extends Controller
{
    public function index_customer(){
        return view('customer.customer');
    }

    public function customer_get_data(){
        $customers = Mcustomer::select(['id', 'kode', 'nama', 'jenis_usaha', 'telepon', 'email', 'created_at']);

        return DataTables::of($customers)
            ->addIndexColumn()
            ->addColumn('action', function($customer) {
                return '
                    <div class="btn-group">
                        <button class="btn btn-sm btn-info view-btn-customer" data-id="'.$customer->id.'" data-bs-toggle="tooltip" title="View">
                            <i class="bx bx-show"></i>
                        </button>
                        <button class="btn btn-sm btn-warning edit-btn-customer" data-id="'.$customer->id.'" data-bs-toggle="tooltip" title="Edit">
                            <i class="bx bx-edit"></i>
                        </button>
                        <button class="btn btn-sm btn-danger delete-btn-customer" data-id="'.$customer->id.'" data-bs-toggle="tooltip" title="Delete">
                            <i class="bx bx-trash"></i>
                        </button>
                    </div>
                ';
            })
            ->rawColumns(['action'])
            ->make(true);
    }

    public function customer_store(Request $request){
        $validator = Validator::make($request->all(), [
            'kode' => 'required|unique:Mcustomer,kode',
            'nama' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'message' => 'Validasi gagal',
                'errors' => $validator->errors()
            ], 422);
        }

        try {
            $customer = Mcustomer::create($request->all());

            return response()->json([
                'status' => 'success',
                'message' => 'Data customer berhasil disimpan',
                'data' => $customer
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Terjadi kesalahan: ' . $e->getMessage()
            ], 500);
        }
    }

    public function customer_show($id){
        $customer = Mcustomer::find($id);
        $customer->pemilik_tgl_lahir = $customer->pemilik_tgl_lahir?->format('Y-m-d');

        if (!$customer) {
            return response()->json([
                'status' => 'error',
                'message' => 'Data tidak ditemukan'
            ], 404);
        }

        return response()->json([
            'status' => 'success',
            'data' => $customer
        ]);
    }

    public function customer_update(Request $request, $id){
        // dd($request->all());
        $customer = Mcustomer::find($id);

        if (!$customer) {
            return response()->json([
                'status' => 'error',
                'message' => 'Data tidak ditemukan'
            ], 404);
        }

        $validator = Validator::make($request->all(), [
            'kode' => 'required|unique:Mcustomer,kode,'.$id,
            'nama' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'message' => 'Validasi gagal',
                'errors' => $validator->errors()
            ], 422);
        }

        try {
            $customer->update($request->all());

            return response()->json([
                'status' => 'success',
                'message' => 'Data customer berhasil diupdate',
                'data' => $customer
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Terjadi kesalahan: ' . $e->getMessage()
            ], 500);
        }
    }

    public function customer_destroy($id){
        $customer = Mcustomer::find($id);

        if (!$customer) {
            return response()->json([
                'status' => 'error',
                'message' => 'Data tidak ditemukan'
            ], 404);
        }

        try {
            $customer->delete();

            return response()->json([
                'status' => 'success',
                'message' => 'Data customer berhasil dihapus'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Terjadi kesalahan: ' . $e->getMessage()
            ], 500);
        }
    }
}
