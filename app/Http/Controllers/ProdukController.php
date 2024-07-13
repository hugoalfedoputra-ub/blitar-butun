<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Produk;
use App\Models\Pelapak;
use App\Models\ProdukKategori;


/**
 * Description of ProdukController
 *
 * @author Tuhin Bepari <digitaldreams40@gmail.com>
 */

class ProdukController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return Produk::paginate(10);
    }    /**
     * Display the specified resource.
     *
     * @param  Request  $request
     * @param  Produk  $produk
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Produk $produk)
    {
        return view('pages.produk.show', [
                'record' =>$produk,
        ]);

    }    /**
     * Show the form for creating a new resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
		$pelapak = Pelapak::all(['id']);
		$produk_kategori = ProdukKategori::all(['id']);

        return view('pages.produk.create', [
            'model' => new Produk,
			"pelapak" => $pelapak,
			"produk_kategori" => $produk_kategori,

        ]);
    }    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $model=new Produk;
        $model->fill($request->all());

        if ($model->save()) {
            
            session()->flash('app_message', 'Produk saved successfully');
            return redirect()->route('produk.index');
            } else {
                session()->flash('app_message', 'Something is wrong while saving Produk');
            }
        return redirect()->back();
    } /**
     * Show the form for editing the specified resource.
     *
     * @param  Request  $request
     * @param  Produk  $produk
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Produk $produk)
    {
		$pelapak = Pelapak::all(['id']);
		$produk_kategori = ProdukKategori::all(['id']);

        return view('pages.produk.edit', [
            'model' => $produk,
			"pelapak" => $pelapak,
			"produk_kategori" => $produk_kategori,

            ]);
    }    /**
     * Update a existing resource in storage.
     *
     * @param  Request  $request
     * @param  Produk  $produk
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Produk $produk)
    {
        $produk->fill($request->all());

        if ($produk->save()) {
            
            session()->flash('app_message', 'Produk successfully updated');
            return redirect()->route('produk.index');
            } else {
                session()->flash('app_error', 'Something is wrong while updating Produk');
            }
        return redirect()->back();
    }    /**
     * Delete a  resource from  storage.
     *
     * @param  Request  $request
     * @param  Produk  $produk
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Request $request, Produk $produk)
    {
        if ($produk->delete()) {
                session()->flash('app_message', 'Produk successfully deleted');
            } else {
                session()->flash('app_error', 'Error occurred while deleting Produk');
            }

        return redirect()->back();
    }
}
