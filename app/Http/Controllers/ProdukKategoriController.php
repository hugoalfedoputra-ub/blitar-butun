<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\ProdukKategoriModel;


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
        return view('pages.produk_kategori.index', ['records' => ProdukKategoriModel::paginate(10)]);
    }    /**
     * Display the specified resource.
     *
     * @param  Request  $request
     * @param  ProdukKategoriModel  $produkkategorimodel
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, ProdukKategoriModel $produkkategorimodel)
    {
        return view('pages.produk_kategori.show', [
                'record' =>$produkkategorimodel,
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
            'model' => new ProdukKategoriModel,

        ]);
    }    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $model=new ProdukKategoriModel;
        $model->fill($request->all());

        if ($model->save()) {
            
            session()->flash('app_message', 'ProdukKategoriModel saved successfully');
            return redirect()->route('produk_kategori.index');
            } else {
                session()->flash('app_message', 'Something is wrong while saving ProdukKategoriModel');
            }
        return redirect()->back();
    } /**
     * Show the form for editing the specified resource.
     *
     * @param  Request  $request
     * @param  ProdukKategoriModel  $produkkategorimodel
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, ProdukKategoriModel $produkkategorimodel)
    {

        return view('pages.produk_kategori.edit', [
            'model' => $produkkategorimodel,

            ]);
    }    /**
     * Update a existing resource in storage.
     *
     * @param  Request  $request
     * @param  ProdukKategoriModel  $produkkategorimodel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,ProdukKategoriModel $produkkategorimodel)
    {
        $produkkategorimodel->fill($request->all());

        if ($produkkategorimodel->save()) {
            
            session()->flash('app_message', 'ProdukKategoriModel successfully updated');
            return redirect()->route('produk_kategori.index');
            } else {
                session()->flash('app_error', 'Something is wrong while updating ProdukKategoriModel');
            }
        return redirect()->back();
    }    /**
     * Delete a  resource from  storage.
     *
     * @param  Request  $request
     * @param  ProdukKategoriModel  $produkkategorimodel
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Request $request, ProdukKategoriModel $produkkategorimodel)
    {
        if ($produkkategorimodel->delete()) {
                session()->flash('app_message', 'ProdukKategoriModel successfully deleted');
            } else {
                session()->flash('app_error', 'Error occurred while deleting ProdukKategoriModel');
            }

        return redirect()->back();
    }
}
