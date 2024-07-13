<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Covid19PemudikModel;
use App\Models\TwebPenduduk;


/**
 * Description of Covid19PemudikController
 *
 * @author Tuhin Bepari <digitaldreams40@gmail.com>
 */

class Covid19PemudikController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('pages.covid19_pemudik.index', ['records' => Covid19PemudikModel::paginate(10)]);
    }    /**
     * Display the specified resource.
     *
     * @param  Request  $request
     * @param  Covid19PemudikModel  $covid19pemudikmodel
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Covid19PemudikModel $covid19pemudikmodel)
    {
        return view('pages.covid19_pemudik.show', [
                'record' =>$covid19pemudikmodel,
        ]);

    }    /**
     * Show the form for creating a new resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
		$tweb_penduduk = TwebPenduduk::all(['id']);

        return view('pages.covid19_pemudik.create', [
            'model' => new Covid19PemudikModel,
			"tweb_penduduk" => $tweb_penduduk,

        ]);
    }    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $model=new Covid19PemudikModel;
        $model->fill($request->all());

        if ($model->save()) {
            
            session()->flash('app_message', 'Covid19PemudikModel saved successfully');
            return redirect()->route('covid19_pemudik.index');
            } else {
                session()->flash('app_message', 'Something is wrong while saving Covid19PemudikModel');
            }
        return redirect()->back();
    } /**
     * Show the form for editing the specified resource.
     *
     * @param  Request  $request
     * @param  Covid19PemudikModel  $covid19pemudikmodel
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Covid19PemudikModel $covid19pemudikmodel)
    {
		$tweb_penduduk = TwebPenduduk::all(['id']);

        return view('pages.covid19_pemudik.edit', [
            'model' => $covid19pemudikmodel,
			"tweb_penduduk" => $tweb_penduduk,

            ]);
    }    /**
     * Update a existing resource in storage.
     *
     * @param  Request  $request
     * @param  Covid19PemudikModel  $covid19pemudikmodel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Covid19PemudikModel $covid19pemudikmodel)
    {
        $covid19pemudikmodel->fill($request->all());

        if ($covid19pemudikmodel->save()) {
            
            session()->flash('app_message', 'Covid19PemudikModel successfully updated');
            return redirect()->route('covid19_pemudik.index');
            } else {
                session()->flash('app_error', 'Something is wrong while updating Covid19PemudikModel');
            }
        return redirect()->back();
    }    /**
     * Delete a  resource from  storage.
     *
     * @param  Request  $request
     * @param  Covid19PemudikModel  $covid19pemudikmodel
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Request $request, Covid19PemudikModel $covid19pemudikmodel)
    {
        if ($covid19pemudikmodel->delete()) {
                session()->flash('app_message', 'Covid19PemudikModel successfully deleted');
            } else {
                session()->flash('app_error', 'Error occurred while deleting Covid19PemudikModel');
            }

        return redirect()->back();
    }
}
