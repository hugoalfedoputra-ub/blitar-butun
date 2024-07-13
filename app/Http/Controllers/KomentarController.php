<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\KomentarModel;


/**
 * Description of KomentarController
 *
 * @author Tuhin Bepari <digitaldreams40@gmail.com>
 */

class KomentarController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('pages.komentar.index', ['records' => KomentarModel::paginate(10)]);
    }    /**
     * Display the specified resource.
     *
     * @param  Request  $request
     * @param  KomentarModel  $komentarmodel
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, KomentarModel $komentarmodel)
    {
        return view('pages.komentar.show', [
                'record' =>$komentarmodel,
        ]);

    }    /**
     * Show the form for creating a new resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

        return view('pages.komentar.create', [
            'model' => new KomentarModel,

        ]);
    }    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $model=new KomentarModel;
        $model->fill($request->all());

        if ($model->save()) {
            
            session()->flash('app_message', 'KomentarModel saved successfully');
            return redirect()->route('komentar.index');
            } else {
                session()->flash('app_message', 'Something is wrong while saving KomentarModel');
            }
        return redirect()->back();
    } /**
     * Show the form for editing the specified resource.
     *
     * @param  Request  $request
     * @param  KomentarModel  $komentarmodel
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, KomentarModel $komentarmodel)
    {

        return view('pages.komentar.edit', [
            'model' => $komentarmodel,

            ]);
    }    /**
     * Update a existing resource in storage.
     *
     * @param  Request  $request
     * @param  KomentarModel  $komentarmodel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,KomentarModel $komentarmodel)
    {
        $komentarmodel->fill($request->all());

        if ($komentarmodel->save()) {
            
            session()->flash('app_message', 'KomentarModel successfully updated');
            return redirect()->route('komentar.index');
            } else {
                session()->flash('app_error', 'Something is wrong while updating KomentarModel');
            }
        return redirect()->back();
    }    /**
     * Delete a  resource from  storage.
     *
     * @param  Request  $request
     * @param  KomentarModel  $komentarmodel
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Request $request, KomentarModel $komentarmodel)
    {
        if ($komentarmodel->delete()) {
                session()->flash('app_message', 'KomentarModel successfully deleted');
            } else {
                session()->flash('app_error', 'Error occurred while deleting KomentarModel');
            }

        return redirect()->back();
    }
}
