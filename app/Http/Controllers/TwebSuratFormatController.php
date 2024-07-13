<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\TwebSuratFormatModel;


/**
 * Description of TwebSuratFormatController
 *
 * @author Tuhin Bepari <digitaldreams40@gmail.com>
 */

class TwebSuratFormatController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('pages.tweb_surat_format.index', ['records' => TwebSuratFormatModel::paginate(10)]);
    }    /**
     * Display the specified resource.
     *
     * @param  Request  $request
     * @param  TwebSuratFormatModel  $twebsuratformatmodel
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, TwebSuratFormatModel $twebsuratformatmodel)
    {
        return view('pages.tweb_surat_format.show', [
                'record' =>$twebsuratformatmodel,
        ]);

    }    /**
     * Show the form for creating a new resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

        return view('pages.tweb_surat_format.create', [
            'model' => new TwebSuratFormatModel,

        ]);
    }    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $model=new TwebSuratFormatModel;
        $model->fill($request->all());

        if ($model->save()) {
            
            session()->flash('app_message', 'TwebSuratFormatModel saved successfully');
            return redirect()->route('tweb_surat_format.index');
            } else {
                session()->flash('app_message', 'Something is wrong while saving TwebSuratFormatModel');
            }
        return redirect()->back();
    } /**
     * Show the form for editing the specified resource.
     *
     * @param  Request  $request
     * @param  TwebSuratFormatModel  $twebsuratformatmodel
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, TwebSuratFormatModel $twebsuratformatmodel)
    {

        return view('pages.tweb_surat_format.edit', [
            'model' => $twebsuratformatmodel,

            ]);
    }    /**
     * Update a existing resource in storage.
     *
     * @param  Request  $request
     * @param  TwebSuratFormatModel  $twebsuratformatmodel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,TwebSuratFormatModel $twebsuratformatmodel)
    {
        $twebsuratformatmodel->fill($request->all());

        if ($twebsuratformatmodel->save()) {
            
            session()->flash('app_message', 'TwebSuratFormatModel successfully updated');
            return redirect()->route('tweb_surat_format.index');
            } else {
                session()->flash('app_error', 'Something is wrong while updating TwebSuratFormatModel');
            }
        return redirect()->back();
    }    /**
     * Delete a  resource from  storage.
     *
     * @param  Request  $request
     * @param  TwebSuratFormatModel  $twebsuratformatmodel
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Request $request, TwebSuratFormatModel $twebsuratformatmodel)
    {
        if ($twebsuratformatmodel->delete()) {
                session()->flash('app_message', 'TwebSuratFormatModel successfully deleted');
            } else {
                session()->flash('app_error', 'Error occurred while deleting TwebSuratFormatModel');
            }

        return redirect()->back();
    }
}
