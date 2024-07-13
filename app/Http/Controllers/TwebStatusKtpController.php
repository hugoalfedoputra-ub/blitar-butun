<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\TwebStatusKtpModel;


/**
 * Description of TwebStatusKtpController
 *
 * @author Tuhin Bepari <digitaldreams40@gmail.com>
 */

class TwebStatusKtpController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('pages.tweb_status_ktp.index', ['records' => TwebStatusKtpModel::paginate(10)]);
    }    /**
     * Display the specified resource.
     *
     * @param  Request  $request
     * @param  TwebStatusKtpModel  $twebstatusktpmodel
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, TwebStatusKtpModel $twebstatusktpmodel)
    {
        return view('pages.tweb_status_ktp.show', [
                'record' =>$twebstatusktpmodel,
        ]);

    }    /**
     * Show the form for creating a new resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

        return view('pages.tweb_status_ktp.create', [
            'model' => new TwebStatusKtpModel,

        ]);
    }    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $model=new TwebStatusKtpModel;
        $model->fill($request->all());

        if ($model->save()) {
            
            session()->flash('app_message', 'TwebStatusKtpModel saved successfully');
            return redirect()->route('tweb_status_ktp.index');
            } else {
                session()->flash('app_message', 'Something is wrong while saving TwebStatusKtpModel');
            }
        return redirect()->back();
    } /**
     * Show the form for editing the specified resource.
     *
     * @param  Request  $request
     * @param  TwebStatusKtpModel  $twebstatusktpmodel
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, TwebStatusKtpModel $twebstatusktpmodel)
    {

        return view('pages.tweb_status_ktp.edit', [
            'model' => $twebstatusktpmodel,

            ]);
    }    /**
     * Update a existing resource in storage.
     *
     * @param  Request  $request
     * @param  TwebStatusKtpModel  $twebstatusktpmodel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,TwebStatusKtpModel $twebstatusktpmodel)
    {
        $twebstatusktpmodel->fill($request->all());

        if ($twebstatusktpmodel->save()) {
            
            session()->flash('app_message', 'TwebStatusKtpModel successfully updated');
            return redirect()->route('tweb_status_ktp.index');
            } else {
                session()->flash('app_error', 'Something is wrong while updating TwebStatusKtpModel');
            }
        return redirect()->back();
    }    /**
     * Delete a  resource from  storage.
     *
     * @param  Request  $request
     * @param  TwebStatusKtpModel  $twebstatusktpmodel
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Request $request, TwebStatusKtpModel $twebstatusktpmodel)
    {
        if ($twebstatusktpmodel->delete()) {
                session()->flash('app_message', 'TwebStatusKtpModel successfully deleted');
            } else {
                session()->flash('app_error', 'Error occurred while deleting TwebStatusKtpModel');
            }

        return redirect()->back();
    }
}
