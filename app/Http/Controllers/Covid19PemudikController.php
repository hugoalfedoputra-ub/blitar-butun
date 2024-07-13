<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Covid19Pemudik;
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
        return view('pages.covid19_pemudik.index', ['records' => Covid19Pemudik::paginate(10)]);
    }    /**
     * Display the specified resource.
     *
     * @param  Request  $request
     * @param  Covid19Pemudik  $covid19pemudik
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Covid19Pemudik $covid19pemudik)
    {
        return view('pages.covid19_pemudik.show', [
                'record' =>$covid19pemudik,
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
            'model' => new Covid19Pemudik,
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
        $model=new Covid19Pemudik;
        $model->fill($request->all());

        if ($model->save()) {
            
            session()->flash('app_message', 'Covid19Pemudik saved successfully');
            return redirect()->route('covid19_pemudik.index');
            } else {
                session()->flash('app_message', 'Something is wrong while saving Covid19Pemudik');
            }
        return redirect()->back();
    } /**
     * Show the form for editing the specified resource.
     *
     * @param  Request  $request
     * @param  Covid19Pemudik  $covid19pemudik
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Covid19Pemudik $covid19pemudik)
    {
		$tweb_penduduk = TwebPenduduk::all(['id']);

        return view('pages.covid19_pemudik.edit', [
            'model' => $covid19pemudik,
			"tweb_penduduk" => $tweb_penduduk,

            ]);
    }    /**
     * Update a existing resource in storage.
     *
     * @param  Request  $request
     * @param  Covid19Pemudik  $covid19pemudik
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Covid19Pemudik $covid19pemudik)
    {
        $covid19pemudik->fill($request->all());

        if ($covid19pemudik->save()) {
            
            session()->flash('app_message', 'Covid19Pemudik successfully updated');
            return redirect()->route('covid19_pemudik.index');
            } else {
                session()->flash('app_error', 'Something is wrong while updating Covid19Pemudik');
            }
        return redirect()->back();
    }    /**
     * Delete a  resource from  storage.
     *
     * @param  Request  $request
     * @param  Covid19Pemudik  $covid19pemudik
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Request $request, Covid19Pemudik $covid19pemudik)
    {
        if ($covid19pemudik->delete()) {
                session()->flash('app_message', 'Covid19Pemudik successfully deleted');
            } else {
                session()->flash('app_error', 'Error occurred while deleting Covid19Pemudik');
            }

        return redirect()->back();
    }
}
