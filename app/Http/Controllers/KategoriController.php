<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\KategoriModel;


/**
 * Description of KategoriController
 *
 * @author Tuhin Bepari <digitaldreams40@gmail.com>
 */

class KategoriController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('pages.kategori.index', ['records' => KategoriModel::paginate(10)]);
    }    /**
     * Display the specified resource.
     *
     * @param  Request  $request
     * @param  KategoriModel  $kategorimodel
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, KategoriModel $kategorimodel)
    {
        return view('pages.kategori.show', [
                'record' =>$kategorimodel,
        ]);

    }    /**
     * Show the form for creating a new resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

        return view('pages.kategori.create', [
            'model' => new KategoriModel,

        ]);
    }    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $model=new KategoriModel;
        $model->fill($request->all());

        if ($model->save()) {
            
            session()->flash('app_message', 'KategoriModel saved successfully');
            return redirect()->route('kategori.index');
            } else {
                session()->flash('app_message', 'Something is wrong while saving KategoriModel');
            }
        return redirect()->back();
    } /**
     * Show the form for editing the specified resource.
     *
     * @param  Request  $request
     * @param  KategoriModel  $kategorimodel
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, KategoriModel $kategorimodel)
    {

        return view('pages.kategori.edit', [
            'model' => $kategorimodel,

            ]);
    }    /**
     * Update a existing resource in storage.
     *
     * @param  Request  $request
     * @param  KategoriModel  $kategorimodel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,KategoriModel $kategorimodel)
    {
        $kategorimodel->fill($request->all());

        if ($kategorimodel->save()) {
            
            session()->flash('app_message', 'KategoriModel successfully updated');
            return redirect()->route('kategori.index');
            } else {
                session()->flash('app_error', 'Something is wrong while updating KategoriModel');
            }
        return redirect()->back();
    }    /**
     * Delete a  resource from  storage.
     *
     * @param  Request  $request
     * @param  KategoriModel  $kategorimodel
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Request $request, KategoriModel $kategorimodel)
    {
        if ($kategorimodel->delete()) {
                session()->flash('app_message', 'KategoriModel successfully deleted');
            } else {
                session()->flash('app_error', 'Error occurred while deleting KategoriModel');
            }

        return redirect()->back();
    }
}
