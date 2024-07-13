<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\TwebPendudukPendidikanKkModel;


/**
 * Description of TwebPendudukPendidikanKkController
 *
 * @author Tuhin Bepari <digitaldreams40@gmail.com>
 */

class TwebPendudukPendidikanKkController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('pages.tweb_penduduk_pendidikan_kk.index', ['records' => TwebPendudukPendidikanKkModel::paginate(10)]);
    }    /**
     * Display the specified resource.
     *
     * @param  Request  $request
     * @param  TwebPendudukPendidikanKkModel  $twebpendudukpendidikankkmodel
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, TwebPendudukPendidikanKkModel $twebpendudukpendidikankkmodel)
    {
        return view('pages.tweb_penduduk_pendidikan_kk.show', [
                'record' =>$twebpendudukpendidikankkmodel,
        ]);

    }    /**
     * Show the form for creating a new resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

        return view('pages.tweb_penduduk_pendidikan_kk.create', [
            'model' => new TwebPendudukPendidikanKkModel,

        ]);
    }    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $model=new TwebPendudukPendidikanKkModel;
        $model->fill($request->all());

        if ($model->save()) {
            
            session()->flash('app_message', 'TwebPendudukPendidikanKkModel saved successfully');
            return redirect()->route('tweb_penduduk_pendidikan_kk.index');
            } else {
                session()->flash('app_message', 'Something is wrong while saving TwebPendudukPendidikanKkModel');
            }
        return redirect()->back();
    } /**
     * Show the form for editing the specified resource.
     *
     * @param  Request  $request
     * @param  TwebPendudukPendidikanKkModel  $twebpendudukpendidikankkmodel
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, TwebPendudukPendidikanKkModel $twebpendudukpendidikankkmodel)
    {

        return view('pages.tweb_penduduk_pendidikan_kk.edit', [
            'model' => $twebpendudukpendidikankkmodel,

            ]);
    }    /**
     * Update a existing resource in storage.
     *
     * @param  Request  $request
     * @param  TwebPendudukPendidikanKkModel  $twebpendudukpendidikankkmodel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,TwebPendudukPendidikanKkModel $twebpendudukpendidikankkmodel)
    {
        $twebpendudukpendidikankkmodel->fill($request->all());

        if ($twebpendudukpendidikankkmodel->save()) {
            
            session()->flash('app_message', 'TwebPendudukPendidikanKkModel successfully updated');
            return redirect()->route('tweb_penduduk_pendidikan_kk.index');
            } else {
                session()->flash('app_error', 'Something is wrong while updating TwebPendudukPendidikanKkModel');
            }
        return redirect()->back();
    }    /**
     * Delete a  resource from  storage.
     *
     * @param  Request  $request
     * @param  TwebPendudukPendidikanKkModel  $twebpendudukpendidikankkmodel
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Request $request, TwebPendudukPendidikanKkModel $twebpendudukpendidikankkmodel)
    {
        if ($twebpendudukpendidikankkmodel->delete()) {
                session()->flash('app_message', 'TwebPendudukPendidikanKkModel successfully deleted');
            } else {
                session()->flash('app_error', 'Error occurred while deleting TwebPendudukPendidikanKkModel');
            }

        return redirect()->back();
    }
}
