<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\PesanDetailModel;


/**
 * Description of PesanDetailController
 *
 * @author Tuhin Bepari <digitaldreams40@gmail.com>
 */

class PesanDetailController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('pages.pesan_detail.index', ['records' => PesanDetailModel::paginate(10)]);
    }    /**
     * Display the specified resource.
     *
     * @param  Request  $request
     * @param  PesanDetailModel  $pesandetailmodel
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, PesanDetailModel $pesandetailmodel)
    {
        return view('pages.pesan_detail.show', [
                'record' =>$pesandetailmodel,
        ]);

    }    /**
     * Show the form for creating a new resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

        return view('pages.pesan_detail.create', [
            'model' => new PesanDetailModel,

        ]);
    }    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $model=new PesanDetailModel;
        $model->fill($request->all());

        if ($model->save()) {
            
            session()->flash('app_message', 'PesanDetailModel saved successfully');
            return redirect()->route('pesan_detail.index');
            } else {
                session()->flash('app_message', 'Something is wrong while saving PesanDetailModel');
            }
        return redirect()->back();
    } /**
     * Show the form for editing the specified resource.
     *
     * @param  Request  $request
     * @param  PesanDetailModel  $pesandetailmodel
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, PesanDetailModel $pesandetailmodel)
    {

        return view('pages.pesan_detail.edit', [
            'model' => $pesandetailmodel,

            ]);
    }    /**
     * Update a existing resource in storage.
     *
     * @param  Request  $request
     * @param  PesanDetailModel  $pesandetailmodel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,PesanDetailModel $pesandetailmodel)
    {
        $pesandetailmodel->fill($request->all());

        if ($pesandetailmodel->save()) {
            
            session()->flash('app_message', 'PesanDetailModel successfully updated');
            return redirect()->route('pesan_detail.index');
            } else {
                session()->flash('app_error', 'Something is wrong while updating PesanDetailModel');
            }
        return redirect()->back();
    }    /**
     * Delete a  resource from  storage.
     *
     * @param  Request  $request
     * @param  PesanDetailModel  $pesandetailmodel
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Request $request, PesanDetailModel $pesandetailmodel)
    {
        if ($pesandetailmodel->delete()) {
                session()->flash('app_message', 'PesanDetailModel successfully deleted');
            } else {
                session()->flash('app_error', 'Error occurred while deleting PesanDetailModel');
            }

        return redirect()->back();
    }
}
