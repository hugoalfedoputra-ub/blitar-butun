<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\ProdukModel;
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
        return view('pages.produk.index', ['records' => ProdukModel::paginate(10)]);
    }    /**
     * Display the specified resource.
     *
     * @param  Request  $request
     * @param  ProdukModel  $produkmodel
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, ProdukModel $produkmodel)
    {
        return view('pages.produk.show', [
                'record' =>$produkmodel,
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
            'model' => new ProdukModel,
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
        $model=new ProdukModel;
        $model->fill($request->all());

        if ($model->save()) {
            
            session()->flash('app_message', 'ProdukModel saved successfully');
            return redirect()->route('produk.index');
            } else {
                session()->flash('app_message', 'Something is wrong while saving ProdukModel');
            }
        return redirect()->back();
    } /**
     * Show the form for editing the specified resource.
     *
     * @param  Request  $request
     * @param  ProdukModel  $produkmodel
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, ProdukModel $produkmodel)
    {
		$pelapak = Pelapak::all(['id']);
		$produk_kategori = ProdukKategori::all(['id']);

        return view('pages.produk.edit', [
            'model' => $produkmodel,
			"pelapak" => $pelapak,
			"produk_kategori" => $produk_kategori,

            ]);
    }    /**
     * Update a existing resource in storage.
     *
     * @param  Request  $request
     * @param  ProdukModel  $produkmodel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,ProdukModel $produkmodel)
    {
        $produkmodel->fill($request->all());

        if ($produkmodel->save()) {
            
            session()->flash('app_message', 'ProdukModel successfully updated');
            return redirect()->route('produk.index');
            } else {
                session()->flash('app_error', 'Something is wrong while updating ProdukModel');
            }
        return redirect()->back();
    }    /**
     * Delete a  resource from  storage.
     *
     * @param  Request  $request
     * @param  ProdukModel  $produkmodel
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Request $request, ProdukModel $produkmodel)
    {
        if ($produkmodel->delete()) {
                session()->flash('app_message', 'ProdukModel successfully deleted');
            } else {
                session()->flash('app_error', 'Error occurred while deleting ProdukModel');
            }

        return redirect()->back();
    }
}
