<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\KontakGrupModel;


/**
 * Description of KontakGrupController
 *
 * @author Tuhin Bepari <digitaldreams40@gmail.com>
 */

class KontakGrupController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('pages.kontak_grup.index', ['records' => KontakGrupModel::paginate(10)]);
    }    /**
     * Display the specified resource.
     *
     * @param  Request  $request
     * @param  KontakGrupModel  $kontakgrupmodel
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, KontakGrupModel $kontakgrupmodel)
    {
        return view('pages.kontak_grup.show', [
                'record' =>$kontakgrupmodel,
        ]);

    }    /**
     * Show the form for creating a new resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

        return view('pages.kontak_grup.create', [
            'model' => new KontakGrupModel,

        ]);
    }    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $model=new KontakGrupModel;
        $model->fill($request->all());

        if ($model->save()) {
            
            session()->flash('app_message', 'KontakGrupModel saved successfully');
            return redirect()->route('kontak_grup.index');
            } else {
                session()->flash('app_message', 'Something is wrong while saving KontakGrupModel');
            }
        return redirect()->back();
    } /**
     * Show the form for editing the specified resource.
     *
     * @param  Request  $request
     * @param  KontakGrupModel  $kontakgrupmodel
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, KontakGrupModel $kontakgrupmodel)
    {

        return view('pages.kontak_grup.edit', [
            'model' => $kontakgrupmodel,

            ]);
    }    /**
     * Update a existing resource in storage.
     *
     * @param  Request  $request
     * @param  KontakGrupModel  $kontakgrupmodel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,KontakGrupModel $kontakgrupmodel)
    {
        $kontakgrupmodel->fill($request->all());

        if ($kontakgrupmodel->save()) {
            
            session()->flash('app_message', 'KontakGrupModel successfully updated');
            return redirect()->route('kontak_grup.index');
            } else {
                session()->flash('app_error', 'Something is wrong while updating KontakGrupModel');
            }
        return redirect()->back();
    }    /**
     * Delete a  resource from  storage.
     *
     * @param  Request  $request
     * @param  KontakGrupModel  $kontakgrupmodel
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Request $request, KontakGrupModel $kontakgrupmodel)
    {
        if ($kontakgrupmodel->delete()) {
                session()->flash('app_message', 'KontakGrupModel successfully deleted');
            } else {
                session()->flash('app_error', 'Error occurred while deleting KontakGrupModel');
            }

        return redirect()->back();
    }
}
