<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\PesanModel;


/**
 * Description of PesanController
 *
 * @author Tuhin Bepari <digitaldreams40@gmail.com>
 */

class PesanController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('pages.pesan.index', ['records' => PesanModel::paginate(10)]);
    }    /**
     * Display the specified resource.
     *
     * @param  Request  $request
     * @param  PesanModel  $pesanmodel
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, PesanModel $pesanmodel)
    {
        return view('pages.pesan.show', [
                'record' =>$pesanmodel,
        ]);

    }    /**
     * Show the form for creating a new resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

        return view('pages.pesan.create', [
            'model' => new PesanModel,

        ]);
    }    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $model=new PesanModel;
        $model->fill($request->all());

        if ($model->save()) {
            
            session()->flash('app_message', 'PesanModel saved successfully');
            return redirect()->route('pesan.index');
            } else {
                session()->flash('app_message', 'Something is wrong while saving PesanModel');
            }
        return redirect()->back();
    } /**
     * Show the form for editing the specified resource.
     *
     * @param  Request  $request
     * @param  PesanModel  $pesanmodel
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, PesanModel $pesanmodel)
    {

        return view('pages.pesan.edit', [
            'model' => $pesanmodel,

            ]);
    }    /**
     * Update a existing resource in storage.
     *
     * @param  Request  $request
     * @param  PesanModel  $pesanmodel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,PesanModel $pesanmodel)
    {
        $pesanmodel->fill($request->all());

        if ($pesanmodel->save()) {
            
            session()->flash('app_message', 'PesanModel successfully updated');
            return redirect()->route('pesan.index');
            } else {
                session()->flash('app_error', 'Something is wrong while updating PesanModel');
            }
        return redirect()->back();
    }    /**
     * Delete a  resource from  storage.
     *
     * @param  Request  $request
     * @param  PesanModel  $pesanmodel
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Request $request, PesanModel $pesanmodel)
    {
        if ($pesanmodel->delete()) {
                session()->flash('app_message', 'PesanModel successfully deleted');
            } else {
                session()->flash('app_error', 'Error occurred while deleting PesanModel');
            }

        return redirect()->back();
    }
}
