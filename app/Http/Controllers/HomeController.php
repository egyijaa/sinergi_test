<?php

namespace App\Http\Controllers;

use App\Models\t_sales;
use App\Models\m_barang;
use App\Models\m_customer;
use App\Models\t_sales_det;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $t_sales = t_sales::latest('created_at')->with('m_customer')->get();
        return view('pages.dashboard', compact('t_sales'));
    }
    public function formInput()
    {
        //
        $m_barang = m_barang::where('kuantiti', '!=', 0)->orderBy('nama', 'ASC')->get();
        $m_customer = m_customer::all();
        $last_row = t_sales::select('id')->latest('created_at')->first();
        return view('pages.formInput', compact('m_barang', 'm_customer', 'last_row'));
    }
    public function getBarang(Request $request)
    {
        //
        $product = m_barang::where('id', $request->search)->first(['id', 'kode', 'nama', 'kuantiti', 'harga']) ?? '';
        $kuantiti = $product->kuantiti;
        $sisa = $kuantiti-$request->qty;
        m_barang::where('id',$request->search)->update(['kuantiti'=> $sisa]);
        return response()->json([
            'message' => 'success',
            'data' => $product
        ]);
    }
    public function getBarangUbah(Request $request)
    {
        //
        $product = m_barang::where('id', $request->search)->first(['id', 'kode', 'nama', 'kuantiti', 'harga']) ?? '';
        $kuantiti = $product->kuantiti;
        $sisa = $kuantiti+$request->qty;
        m_barang::where('id',$request->search)->update(['kuantiti'=> $sisa]);
        $product2 = m_barang::where('id', $request->search)->first(['id', 'kode', 'nama', 'kuantiti', 'harga']) ?? '';
        $kuantiti2 = $product2->kuantiti;
        $sisa2 = $kuantiti2-$request->qtyUbah;
        m_barang::where('id',$request->search)->update(['kuantiti'=> $sisa2]);
        return response()->json([
            'message' => 'success',
            'data' => $product
        ]);
    }
    public function hapusBarang(Request $request)
    {
        //
        $product = m_barang::where('id', $request->search)->first(['id', 'kode', 'nama', 'kuantiti', 'harga']) ?? '';
        $kuantiti = $product->kuantiti;
        $tambah = $kuantiti+$request->qty;
        m_barang::where('id',$request->search)->update(['kuantiti'=> $tambah]);
        return response()->json([
            'message' => 'success'
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function add(Request $request)
    {
        //

    }
    public function store(Request $request)
    {
        //
        $data = $request->data;
        $pesan = "Terjadi Kesalahan, Harap lihat kembali list anda!";
        $t_sales = t_sales::where('kode', $request->kode)->first();
        $kode = null;
        $i = 1;
        foreach ($data as $item) {
            $m_barang = m_barang::where('id', $item['barang_id'])->first();;
            $nama = $m_barang->nama;
            $kuantiti = $m_barang->kuantiti;
            if ($item['qty'] > $kuantiti) {
                $pesan = 'Kuantiti barang yang anda masukkan('.$item['qty'].') melebihi stock('.$kuantiti.') yang ada';
                
            }
            else if ($kode == null) {
                $validatedData = $request->validate([
                    'kode' => 'required|unique:t_sales,kode',
                    'cust_id' => 'required',
                    'tgl' => 'required',
                    'subtotal' => 'required|numeric',
                    'diskon' => 'numeric',
                    'ongkir' => 'numeric',
                    'total_bayar' => 'required|numeric',
                ]);
                $t_sales = new t_sales();
                $t_sales->kode =  $request->kode;
                $t_sales->tgl = $request->tgl;
                $t_sales->jumlah_barang = $i;
                $t_sales->cust_id = $request->cust_id;
                $t_sales->subtotal = $request->subtotal;
                $t_sales->diskon = $request->diskon;
                $t_sales->ongkir = $request->ongkir;
                $t_sales->total_bayar = $request->total_bayar;
                $t_sales->save();

                $t_sales_det = new t_sales_det();
                $t_sales_det->sales_id = $t_sales->id;
                $t_sales_det->barang_id = $item['barang_id'];
                $t_sales_det->harga_bandrol = $item['harga_bandrol'];
                $t_sales_det->qty = $item['qty'];
                $t_sales_det->diskon_pct = $item['diskon_pct'];
                $t_sales_det->diskon_nilai = $item['diskon_nilai'];
                $t_sales_det->harga_diskon = $item['harga_diskon'];
                $t_sales_det->total = $item['total'];
                $t_sales_det->save();
                $kode = 1;
            }
            else {

                $t_sales_det = new t_sales_det();
                $t_sales_det->sales_id = $t_sales->id;
                $t_sales_det->barang_id = $item['barang_id'];
                $t_sales_det->harga_bandrol = $item['harga_bandrol'];
                $t_sales_det->qty = $item['qty'];
                $t_sales_det->diskon_pct = $item['diskon_pct'];
                $t_sales_det->diskon_nilai = $item['diskon_nilai'];
                $t_sales_det->harga_diskon = $item['harga_diskon'];
                $t_sales_det->total = $item['total'];
                $t_sales_det->save();

                $page = DB::table('t_sales')->where('kode', $request->kode)->update(['jumlah_barang' => $i]);
            }
            $i++;
        }
        return response()->json([
            'success' => 'success',
            'error' => $pesan
        ]);
    //     foreach($request->example as $input)
    //     {
    //         $prescription->create($input);
    //     }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
