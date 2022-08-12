<?php

namespace App\Http\Controllers;

use App\Models\m_customer;
use App\Http\Requests\Storem_customerRequest;
use App\Http\Requests\Updatem_customerRequest;
use Illuminate\Http\Request;

class MCustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $m_customer = m_customer::all();
        return view('pages.customer.index', compact('m_customer'));
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
     * @param  \App\Http\Requests\Storem_customerRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $validatedData = $request->validate([
            'val-kode' => 'required|unique:m_customer,kode',
            'val-nama' => 'required|min:1',
            'val-telepon' => 'required|numeric|unique:m_customer,telp',
        ]);

        $m_customer = new m_customer();
        $m_customer->kode = $request->get('val-kode');
        $m_customer->nama = $request->get('val-nama');
        $m_customer->telp = $request->get('val-telepon');

        $m_customer->save();


        //toast('Data Order Berhasil Disimpan','success');
        return redirect('/customer')->with('success','Insert Customer successfully');
    }

    public function update(Request $request)
    {
        $m_customer = m_customer::find($request->id);

        $validatedData = $request->validate([
            'kode' => 'required|unique:m_customer,kode,'.$m_customer->id,
            'nama' => 'required|min:1',
            'telp' => 'required|numeric|min:9|unique:m_customer,telp,'.$m_customer->id,
        ]);

        $m_customer->update($request->all());

        return redirect('/customer')->with('success','Customer Berhasil Diubah/Update');
    }

    public function delete(Request $request)
    {
        $m_customer = m_customer::find($request->id);
        $m_customer->delete();
        return redirect('/customer')->with('success','Customer Berhasil Dihapus');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\m_customer  $m_customer
     * @return \Illuminate\Http\Response
     */
    public function show(m_customer $m_customer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\m_customer  $m_customer
     * @return \Illuminate\Http\Response
     */
    public function edit(m_customer $m_customer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Updatem_customerRequest  $request
     * @param  \App\Models\m_customer  $m_customer
     * @return \Illuminate\Http\Response
     */
    // public function update(Updatem_customerRequest $request, m_customer $m_customer)
    // {
    //     //
    // }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\m_customer  $m_customer
     * @return \Illuminate\Http\Response
     */
    public function destroy(m_customer $m_customer)
    {
        //
    }
}
