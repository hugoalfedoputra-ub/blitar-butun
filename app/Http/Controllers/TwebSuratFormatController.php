<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\TwebSuratFormat;


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
        return view('pages.tweb_surat_format.index', ['records' => TwebSuratFormat::paginate(10)]);
    }    /**
     * Display the specified resource.
     *
     * @param  Request  $request
     * @param  TwebSuratFormat  $twebsuratformat
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, TwebSuratFormat $twebsuratformat)
    {
        return view('pages.tweb_surat_format.show', [
                'record' =>$twebsuratformat,
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
            'model' => new TwebSuratFormat,

        ]);
    }    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $model=new TwebSuratFormat;
        $model->fill($request->all());

        if ($model->save()) {
            
            session()->flash('app_message', 'TwebSuratFormat saved successfully');
            return redirect()->route('tweb_surat_format.index');
            } else {
                session()->flash('app_message', 'Something is wrong while saving TwebSuratFormat');
            }
        return redirect()->back();
    } /**
     * Show the form for editing the specified resource.
     *
     * @param  Request  $request
     * @param  TwebSuratFormat  $twebsuratformat
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, TwebSuratFormat $twebsuratformat)
    {

        return view('pages.tweb_surat_format.edit', [
            'model' => $twebsuratformat,

            ]);
    }    /**
     * Update a existing resource in storage.
     *
     * @param  Request  $request
     * @param  TwebSuratFormat  $twebsuratformat
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,TwebSuratFormat $twebsuratformat)
    {
        $twebsuratformat->fill($request->all());

        if ($twebsuratformat->save()) {
            
            session()->flash('app_message', 'TwebSuratFormat successfully updated');
            return redirect()->route('tweb_surat_format.index');
            } else {
                session()->flash('app_error', 'Something is wrong while updating TwebSuratFormat');
            }
        return redirect()->back();
    }    /**
     * Delete a  resource from  storage.
     *
     * @param  Request  $request
     * @param  TwebSuratFormat  $twebsuratformat
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Request $request, TwebSuratFormat $twebsuratformat)
    {
        if ($twebsuratformat->delete()) {
                session()->flash('app_message', 'TwebSuratFormat successfully deleted');
            } else {
                session()->flash('app_error', 'Error occurred while deleting TwebSuratFormat');
            }

        return redirect()->back();
    }
}
