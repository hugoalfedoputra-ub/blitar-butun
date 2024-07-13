<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\DataPersilPeruntukan;


/**
 * Description of DataPersilPeruntukanController
 *
 * @author Tuhin Bepari <digitaldreams40@gmail.com>
 */

class DataPersilPeruntukanController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('pages.data_persil_peruntukan.index', ['records' => DataPersilPeruntukan::paginate(10)]);
    }    /**
     * Display the specified resource.
     *
     * @param  Request  $request
     * @param  DataPersilPeruntukan  $datapersilperuntukan
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, DataPersilPeruntukan $datapersilperuntukan)
    {
        return view('pages.data_persil_peruntukan.show', [
                'record' =>$datapersilperuntukan,
        ]);

    }    /**
     * Show the form for creating a new resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

        return view('pages.data_persil_peruntukan.create', [
            'model' => new DataPersilPeruntukan,

        ]);
    }    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $model=new DataPersilPeruntukan;
        $model->fill($request->all());

        if ($model->save()) {
            
            session()->flash('app_message', 'DataPersilPeruntukan saved successfully');
            return redirect()->route('data_persil_peruntukan.index');
            } else {
                session()->flash('app_message', 'Something is wrong while saving DataPersilPeruntukan');
            }
        return redirect()->back();
    } /**
     * Show the form for editing the specified resource.
     *
     * @param  Request  $request
     * @param  DataPersilPeruntukan  $datapersilperuntukan
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, DataPersilPeruntukan $datapersilperuntukan)
    {

        return view('pages.data_persil_peruntukan.edit', [
            'model' => $datapersilperuntukan,

            ]);
    }    /**
     * Update a existing resource in storage.
     *
     * @param  Request  $request
     * @param  DataPersilPeruntukan  $datapersilperuntukan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,DataPersilPeruntukan $datapersilperuntukan)
    {
        $datapersilperuntukan->fill($request->all());

        if ($datapersilperuntukan->save()) {
            
            session()->flash('app_message', 'DataPersilPeruntukan successfully updated');
            return redirect()->route('data_persil_peruntukan.index');
            } else {
                session()->flash('app_error', 'Something is wrong while updating DataPersilPeruntukan');
            }
        return redirect()->back();
    }    /**
     * Delete a  resource from  storage.
     *
     * @param  Request  $request
     * @param  DataPersilPeruntukan  $datapersilperuntukan
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Request $request, DataPersilPeruntukan $datapersilperuntukan)
    {
        if ($datapersilperuntukan->delete()) {
                session()->flash('app_message', 'DataPersilPeruntukan successfully deleted');
            } else {
                session()->flash('app_error', 'Error occurred while deleting DataPersilPeruntukan');
            }

        return redirect()->back();
    }
}
