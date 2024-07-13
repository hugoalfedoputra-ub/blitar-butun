<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\KaderPemberdayaanMasyarakat;


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
        return view('pages.kader_pemberdayaan_masyarakat.index', ['records' => KaderPemberdayaanMasyarakat::paginate(10)]);
    }    /**
     * Display the specified resource.
     *
     * @param  Request  $request
     * @param  KaderPemberdayaanMasyarakat  $kaderpemberdayaanmasyarakat
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, KaderPemberdayaanMasyarakat $kaderpemberdayaanmasyarakat)
    {
        return view('pages.kader_pemberdayaan_masyarakat.show', [
                'record' =>$kaderpemberdayaanmasyarakat,
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
            'model' => new KaderPemberdayaanMasyarakat,

        ]);
    }    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $model=new KaderPemberdayaanMasyarakat;
        $model->fill($request->all());

        if ($model->save()) {
            
            session()->flash('app_message', 'KaderPemberdayaanMasyarakat saved successfully');
            return redirect()->route('kader_pemberdayaan_masyarakat.index');
            } else {
                session()->flash('app_message', 'Something is wrong while saving KaderPemberdayaanMasyarakat');
            }
        return redirect()->back();
    } /**
     * Show the form for editing the specified resource.
     *
     * @param  Request  $request
     * @param  KaderPemberdayaanMasyarakat  $kaderpemberdayaanmasyarakat
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, KaderPemberdayaanMasyarakat $kaderpemberdayaanmasyarakat)
    {

        return view('pages.kader_pemberdayaan_masyarakat.edit', [
            'model' => $kaderpemberdayaanmasyarakat,

            ]);
    }    /**
     * Update a existing resource in storage.
     *
     * @param  Request  $request
     * @param  KaderPemberdayaanMasyarakat  $kaderpemberdayaanmasyarakat
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,KaderPemberdayaanMasyarakat $kaderpemberdayaanmasyarakat)
    {
        $kaderpemberdayaanmasyarakat->fill($request->all());

        if ($kaderpemberdayaanmasyarakat->save()) {
            
            session()->flash('app_message', 'KaderPemberdayaanMasyarakat successfully updated');
            return redirect()->route('kader_pemberdayaan_masyarakat.index');
            } else {
                session()->flash('app_error', 'Something is wrong while updating KaderPemberdayaanMasyarakat');
            }
        return redirect()->back();
    }    /**
     * Delete a  resource from  storage.
     *
     * @param  Request  $request
     * @param  KaderPemberdayaanMasyarakat  $kaderpemberdayaanmasyarakat
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Request $request, KaderPemberdayaanMasyarakat $kaderpemberdayaanmasyarakat)
    {
        if ($kaderpemberdayaanmasyarakat->delete()) {
                session()->flash('app_message', 'KaderPemberdayaanMasyarakat successfully deleted');
            } else {
                session()->flash('app_error', 'Error occurred while deleting KaderPemberdayaanMasyarakat');
            }

        return redirect()->back();
    }
}
