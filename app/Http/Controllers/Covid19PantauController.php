<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Covid19Pantau;
use App\Models\Covid19Pemudik;


/**
 * Description of Covid19PantauController
 *
 * @author Tuhin Bepari <digitaldreams40@gmail.com>
 */

class Covid19PantauController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('pages.covid19_pantau.index', ['records' => Covid19Pantau::paginate(10)]);
    }    /**
     * Display the specified resource.
     *
     * @param  Request  $request
     * @param  Covid19Pantau  $covid19pantau
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Covid19Pantau $covid19pantau)
    {
        return view('pages.covid19_pantau.show', [
                'record' =>$covid19pantau,
        ]);

    }    /**
     * Show the form for creating a new resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
		$covid19_pemudik = Covid19Pemudik::all(['id']);

        return view('pages.covid19_pantau.create', [
            'model' => new Covid19Pantau,
			"covid19_pemudik" => $covid19_pemudik,

        ]);
    }    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $model=new Covid19Pantau;
        $model->fill($request->all());

        if ($model->save()) {
            
            session()->flash('app_message', 'Covid19Pantau saved successfully');
            return redirect()->route('covid19_pantau.index');
            } else {
                session()->flash('app_message', 'Something is wrong while saving Covid19Pantau');
            }
        return redirect()->back();
    } /**
     * Show the form for editing the specified resource.
     *
     * @param  Request  $request
     * @param  Covid19Pantau  $covid19pantau
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Covid19Pantau $covid19pantau)
    {
		$covid19_pemudik = Covid19Pemudik::all(['id']);

        return view('pages.covid19_pantau.edit', [
            'model' => $covid19pantau,
			"covid19_pemudik" => $covid19_pemudik,

            ]);
    }    /**
     * Update a existing resource in storage.
     *
     * @param  Request  $request
     * @param  Covid19Pantau  $covid19pantau
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Covid19Pantau $covid19pantau)
    {
        $covid19pantau->fill($request->all());

        if ($covid19pantau->save()) {
            
            session()->flash('app_message', 'Covid19Pantau successfully updated');
            return redirect()->route('covid19_pantau.index');
            } else {
                session()->flash('app_error', 'Something is wrong while updating Covid19Pantau');
            }
        return redirect()->back();
    }    /**
     * Delete a  resource from  storage.
     *
     * @param  Request  $request
     * @param  Covid19Pantau  $covid19pantau
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Request $request, Covid19Pantau $covid19pantau)
    {
        if ($covid19pantau->delete()) {
                session()->flash('app_message', 'Covid19Pantau successfully deleted');
            } else {
                session()->flash('app_error', 'Error occurred while deleting Covid19Pantau');
            }

        return redirect()->back();
    }
}
