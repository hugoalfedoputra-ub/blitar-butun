<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\ArtikelModel;


/**
 * Description of ArtikelController
 *
 * @author Tuhin Bepari <digitaldreams40@gmail.com>
 */

class ArtikelController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('pages.artikel.index', ['records' => ArtikelModel::paginate(10)]);
    }    /**
     * Display the specified resource.
     *
     * @param  Request  $request
     * @param  ArtikelModel  $artikelmodel
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, ArtikelModel $artikelmodel)
    {
        return view('pages.artikel.show', [
                'record' =>$artikelmodel,
        ]);

    }    /**
     * Show the form for creating a new resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

        return view('pages.artikel.create', [
            'model' => new ArtikelModel,

        ]);
    }    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $model=new ArtikelModel;
        $model->fill($request->all());

        if ($model->save()) {
            
            session()->flash('app_message', 'ArtikelModel saved successfully');
            return redirect()->route('artikel.index');
            } else {
                session()->flash('app_message', 'Something is wrong while saving ArtikelModel');
            }
        return redirect()->back();
    } /**
     * Show the form for editing the specified resource.
     *
     * @param  Request  $request
     * @param  ArtikelModel  $artikelmodel
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, ArtikelModel $artikelmodel)
    {

        return view('pages.artikel.edit', [
            'model' => $artikelmodel,

            ]);
    }    /**
     * Update a existing resource in storage.
     *
     * @param  Request  $request
     * @param  ArtikelModel  $artikelmodel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,ArtikelModel $artikelmodel)
    {
        $artikelmodel->fill($request->all());

        if ($artikelmodel->save()) {
            
            session()->flash('app_message', 'ArtikelModel successfully updated');
            return redirect()->route('artikel.index');
            } else {
                session()->flash('app_error', 'Something is wrong while updating ArtikelModel');
            }
        return redirect()->back();
    }    /**
     * Delete a  resource from  storage.
     *
     * @param  Request  $request
     * @param  ArtikelModel  $artikelmodel
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Request $request, ArtikelModel $artikelmodel)
    {
        if ($artikelmodel->delete()) {
                session()->flash('app_message', 'ArtikelModel successfully deleted');
            } else {
                session()->flash('app_error', 'Error occurred while deleting ArtikelModel');
            }

        return redirect()->back();
    }
}
