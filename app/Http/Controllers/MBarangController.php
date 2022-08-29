<?php

namespace App\Http\Controllers;

use App\Models\m_barang;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Storem_barangRequest;
use App\Http\Requests\Updatem_barangRequest;

class MBarangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $m_barang = m_barang::all();
        return view('pages.barang.index', compact('m_barang'));
    }
    public function index2()
    {
        return m_barang::orderBy('id', 'ASC')->get();
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
     * @param  \App\Http\Requests\Storem_barangRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $validatedData = $request->validate([
            'val-kode' => 'required|unique:m_barang,kode',
            'val-nama' => 'required|min:1',
            'val-harga' => 'required|numeric',
            'val-kuantiti' => 'required|numeric',
        ]);

        $m_barang = new m_barang();
        $m_barang->kode = $request->get('val-kode');
        $m_barang->nama = $request->get('val-nama');
        $m_barang->harga = $request->get('val-harga');
        $m_barang->kuantiti = $request->get('val-kuantiti');

        $m_barang->save();


        //toast('Data Order Berhasil Disimpan','success');
        return redirect('/barang')->with('success','Insert Barang successfully');
    }
    public function update(Request $request)
    {
        $m_barang = m_barang::find($request->id);

        $validatedData = $request->validate([
            'kode' => 'required|unique:m_barang,kode,'.$m_barang->id,
            'nama' => 'required|min:1',
            'harga' => 'required|numeric',
            'kuantiti' => 'required|numeric',
        ]);

        $m_barang->update($request->all());

        return redirect('/barang')->with('success','Barang Berhasil Diubah/Update');
    }

    public function delete(Request $request)
    {
        $m_barang = m_barang::find($request->id);
        $m_barang->delete();
        return redirect('/barang')->with('success','Barang Berhasil Dihapus');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\m_barang  $m_barang
     * @return \Illuminate\Http\Response
     */
    public function show(m_barang $m_barang)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\m_barang  $m_barang
     * @return \Illuminate\Http\Response
     */
    public function edit(m_barang $m_barang)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Updatem_barangRequest  $request
     * @param  \App\Models\m_barang  $m_barang
     * @return \Illuminate\Http\Response
     */
    // public function update(Updatem_barangRequest $request, m_barang $m_barang)
    // {
    //     //
    // }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\m_barang  $m_barang
     * @return \Illuminate\Http\Response
     */
    public function destroy(m_barang $m_barang)
    {
        //
    }
}
