<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\KontakModel;


/**
 * Description of KontakController
 *
 * @author Tuhin Bepari <digitaldreams40@gmail.com>
 */

class KontakController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('pages.kontak.index', ['records' => KontakModel::paginate(10)]);
    }    /**
     * Display the specified resource.
     *
     * @param  Request  $request
     * @param  KontakModel  $kontakmodel
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, KontakModel $kontakmodel)
    {
        return view('pages.kontak.show', [
                'record' =>$kontakmodel,
        ]);

    }    /**
     * Show the form for creating a new resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

        return view('pages.kontak.create', [
            'model' => new KontakModel,

        ]);
    }    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $model=new KontakModel;
        $model->fill($request->all());

        if ($model->save()) {
            
            session()->flash('app_message', 'KontakModel saved successfully');
            return redirect()->route('kontak.index');
            } else {
                session()->flash('app_message', 'Something is wrong while saving KontakModel');
            }
        return redirect()->back();
    } /**
     * Show the form for editing the specified resource.
     *
     * @param  Request  $request
     * @param  KontakModel  $kontakmodel
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, KontakModel $kontakmodel)
    {

        return view('pages.kontak.edit', [
            'model' => $kontakmodel,

            ]);
    }    /**
     * Update a existing resource in storage.
     *
     * @param  Request  $request
     * @param  KontakModel  $kontakmodel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,KontakModel $kontakmodel)
    {
        $kontakmodel->fill($request->all());

        if ($kontakmodel->save()) {
            
            session()->flash('app_message', 'KontakModel successfully updated');
            return redirect()->route('kontak.index');
            } else {
                session()->flash('app_error', 'Something is wrong while updating KontakModel');
            }
        return redirect()->back();
    }    /**
     * Delete a  resource from  storage.
     *
     * @param  Request  $request
     * @param  KontakModel  $kontakmodel
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Request $request, KontakModel $kontakmodel)
    {
        if ($kontakmodel->delete()) {
                session()->flash('app_message', 'KontakModel successfully deleted');
            } else {
                session()->flash('app_error', 'Error occurred while deleting KontakModel');
            }

        return redirect()->back();
    }
}
