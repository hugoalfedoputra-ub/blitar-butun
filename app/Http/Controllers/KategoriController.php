<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Kategori;


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
        return Kategori::paginate(10);
    }    /**
     * Display the specified resource.
     *
     * @param  Request  $request
     * @param  Kategori  $kategori
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Kategori $kategori)
    {
        return view('pages.kategori.show', [
                'record' =>$kategori,
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
            'model' => new Kategori,

        ]);
    }    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $model=new Kategori;
        $model->fill($request->all());

        if ($model->save()) {
            
            session()->flash('app_message', 'Kategori saved successfully');
            return redirect()->route('kategori.index');
            } else {
                session()->flash('app_message', 'Something is wrong while saving Kategori');
            }
        return redirect()->back();
    } /**
     * Show the form for editing the specified resource.
     *
     * @param  Request  $request
     * @param  Kategori  $kategori
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Kategori $kategori)
    {

        return view('pages.kategori.edit', [
            'model' => $kategori,

            ]);
    }    /**
     * Update a existing resource in storage.
     *
     * @param  Request  $request
     * @param  Kategori  $kategori
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Kategori $kategori)
    {
        $kategori->fill($request->all());

        if ($kategori->save()) {
            
            session()->flash('app_message', 'Kategori successfully updated');
            return redirect()->route('kategori.index');
            } else {
                session()->flash('app_error', 'Something is wrong while updating Kategori');
            }
        return redirect()->back();
    }    /**
     * Delete a  resource from  storage.
     *
     * @param  Request  $request
     * @param  Kategori  $kategori
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Request $request, Kategori $kategori)
    {
        if ($kategori->delete()) {
                session()->flash('app_message', 'Kategori successfully deleted');
            } else {
                session()->flash('app_error', 'Error occurred while deleting Kategori');
            }

        return redirect()->back();
    }
}
