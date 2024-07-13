<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\ProdukKategori;


/**
 * Description of ProdukKategoriController
 *
 * @author Tuhin Bepari <digitaldreams40@gmail.com>
 */

class ProdukKategoriController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('pages.produk_kategori.index', ['records' => ProdukKategori::paginate(10)]);
    }    /**
     * Display the specified resource.
     *
     * @param  Request  $request
     * @param  ProdukKategori  $produkkategori
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, ProdukKategori $produkkategori)
    {
        return view('pages.produk_kategori.show', [
                'record' =>$produkkategori,
        ]);

    }    /**
     * Show the form for creating a new resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

        return view('pages.produk_kategori.create', [
            'model' => new ProdukKategori,

        ]);
    }    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $model=new ProdukKategori;
        $model->fill($request->all());

        if ($model->save()) {
            
            session()->flash('app_message', 'ProdukKategori saved successfully');
            return redirect()->route('produk_kategori.index');
            } else {
                session()->flash('app_message', 'Something is wrong while saving ProdukKategori');
            }
        return redirect()->back();
    } /**
     * Show the form for editing the specified resource.
     *
     * @param  Request  $request
     * @param  ProdukKategori  $produkkategori
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, ProdukKategori $produkkategori)
    {

        return view('pages.produk_kategori.edit', [
            'model' => $produkkategori,

            ]);
    }    /**
     * Update a existing resource in storage.
     *
     * @param  Request  $request
     * @param  ProdukKategori  $produkkategori
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,ProdukKategori $produkkategori)
    {
        $produkkategori->fill($request->all());

        if ($produkkategori->save()) {
            
            session()->flash('app_message', 'ProdukKategori successfully updated');
            return redirect()->route('produk_kategori.index');
            } else {
                session()->flash('app_error', 'Something is wrong while updating ProdukKategori');
            }
        return redirect()->back();
    }    /**
     * Delete a  resource from  storage.
     *
     * @param  Request  $request
     * @param  ProdukKategori  $produkkategori
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Request $request, ProdukKategori $produkkategori)
    {
        if ($produkkategori->delete()) {
                session()->flash('app_message', 'ProdukKategori successfully deleted');
            } else {
                session()->flash('app_error', 'Error occurred while deleting ProdukKategori');
            }

        return redirect()->back();
    }
}
