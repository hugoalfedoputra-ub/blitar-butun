<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Artikel;


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
        return view('pages.artikel.index', ['records' => Artikel::paginate(10)]);
    }    /**
     * Display the specified resource.
     *
     * @param  Request  $request
     * @param  Artikel  $artikel
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Artikel $artikel)
    {
        return view('pages.artikel.show', [
                'record' =>$artikel,
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
            'model' => new Artikel,

        ]);
    }    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $model=new Artikel;
        $model->fill($request->all());

        if ($model->save()) {
            
            session()->flash('app_message', 'Artikel saved successfully');
            return redirect()->route('artikel.index');
            } else {
                session()->flash('app_message', 'Something is wrong while saving Artikel');
            }
        return redirect()->back();
    } /**
     * Show the form for editing the specified resource.
     *
     * @param  Request  $request
     * @param  Artikel  $artikel
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Artikel $artikel)
    {

        return view('pages.artikel.edit', [
            'model' => $artikel,

            ]);
    }    /**
     * Update a existing resource in storage.
     *
     * @param  Request  $request
     * @param  Artikel  $artikel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Artikel $artikel)
    {
        $artikel->fill($request->all());

        if ($artikel->save()) {
            
            session()->flash('app_message', 'Artikel successfully updated');
            return redirect()->route('artikel.index');
            } else {
                session()->flash('app_error', 'Something is wrong while updating Artikel');
            }
        return redirect()->back();
    }    /**
     * Delete a  resource from  storage.
     *
     * @param  Request  $request
     * @param  Artikel  $artikel
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Request $request, Artikel $artikel)
    {
        if ($artikel->delete()) {
                session()->flash('app_message', 'Artikel successfully deleted');
            } else {
                session()->flash('app_error', 'Error occurred while deleting Artikel');
            }

        return redirect()->back();
    }
}
