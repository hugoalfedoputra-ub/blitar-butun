<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\KaderPemberdayaanMasyarakatModel;


/**
 * Description of KaderPemberdayaanMasyarakatController
 *
 * @author Tuhin Bepari <digitaldreams40@gmail.com>
 */

class KaderPemberdayaanMasyarakatController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('pages.kader_pemberdayaan_masyarakat.index', ['records' => KaderPemberdayaanMasyarakatModel::paginate(10)]);
    }    /**
     * Display the specified resource.
     *
     * @param  Request  $request
     * @param  KaderPemberdayaanMasyarakatModel  $kaderpemberdayaanmasyarakatmodel
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, KaderPemberdayaanMasyarakatModel $kaderpemberdayaanmasyarakatmodel)
    {
        return view('pages.kader_pemberdayaan_masyarakat.show', [
                'record' =>$kaderpemberdayaanmasyarakatmodel,
        ]);

    }    /**
     * Show the form for creating a new resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

        return view('pages.kader_pemberdayaan_masyarakat.create', [
            'model' => new KaderPemberdayaanMasyarakatModel,

        ]);
    }    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $model=new KaderPemberdayaanMasyarakatModel;
        $model->fill($request->all());

        if ($model->save()) {
            
            session()->flash('app_message', 'KaderPemberdayaanMasyarakatModel saved successfully');
            return redirect()->route('kader_pemberdayaan_masyarakat.index');
            } else {
                session()->flash('app_message', 'Something is wrong while saving KaderPemberdayaanMasyarakatModel');
            }
        return redirect()->back();
    } /**
     * Show the form for editing the specified resource.
     *
     * @param  Request  $request
     * @param  KaderPemberdayaanMasyarakatModel  $kaderpemberdayaanmasyarakatmodel
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, KaderPemberdayaanMasyarakatModel $kaderpemberdayaanmasyarakatmodel)
    {

        return view('pages.kader_pemberdayaan_masyarakat.edit', [
            'model' => $kaderpemberdayaanmasyarakatmodel,

            ]);
    }    /**
     * Update a existing resource in storage.
     *
     * @param  Request  $request
     * @param  KaderPemberdayaanMasyarakatModel  $kaderpemberdayaanmasyarakatmodel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,KaderPemberdayaanMasyarakatModel $kaderpemberdayaanmasyarakatmodel)
    {
        $kaderpemberdayaanmasyarakatmodel->fill($request->all());

        if ($kaderpemberdayaanmasyarakatmodel->save()) {
            
            session()->flash('app_message', 'KaderPemberdayaanMasyarakatModel successfully updated');
            return redirect()->route('kader_pemberdayaan_masyarakat.index');
            } else {
                session()->flash('app_error', 'Something is wrong while updating KaderPemberdayaanMasyarakatModel');
            }
        return redirect()->back();
    }    /**
     * Delete a  resource from  storage.
     *
     * @param  Request  $request
     * @param  KaderPemberdayaanMasyarakatModel  $kaderpemberdayaanmasyarakatmodel
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Request $request, KaderPemberdayaanMasyarakatModel $kaderpemberdayaanmasyarakatmodel)
    {
        if ($kaderpemberdayaanmasyarakatmodel->delete()) {
                session()->flash('app_message', 'KaderPemberdayaanMasyarakatModel successfully deleted');
            } else {
                session()->flash('app_error', 'Error occurred while deleting KaderPemberdayaanMasyarakatModel');
            }

        return redirect()->back();
    }
}
