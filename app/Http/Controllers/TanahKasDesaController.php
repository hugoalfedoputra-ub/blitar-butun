<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\TanahKasDesa;


/**
 * Description of TanahKasDesaController
 *
 * @author Tuhin Bepari <digitaldreams40@gmail.com>
 */

class TanahKasDesaController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return TanahKasDesa::paginate(10);
    }    /**
     * Display the specified resource.
     *
     * @param  Request  $request
     * @param  TanahKasDesa  $tanahkasdesa
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, TanahKasDesa $tanahkasdesa)
    {
        return view('pages.tanah_kas_desa.show', [
                'record' =>$tanahkasdesa,
        ]);

    }    /**
     * Show the form for creating a new resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

        return view('pages.tanah_kas_desa.create', [
            'model' => new TanahKasDesa,

        ]);
    }    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $model=new TanahKasDesa;
        $model->fill($request->all());

        if ($model->save()) {
            
            session()->flash('app_message', 'TanahKasDesa saved successfully');
            return redirect()->route('tanah_kas_desa.index');
            } else {
                session()->flash('app_message', 'Something is wrong while saving TanahKasDesa');
            }
        return redirect()->back();
    } /**
     * Show the form for editing the specified resource.
     *
     * @param  Request  $request
     * @param  TanahKasDesa  $tanahkasdesa
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, TanahKasDesa $tanahkasdesa)
    {

        return view('pages.tanah_kas_desa.edit', [
            'model' => $tanahkasdesa,

            ]);
    }    /**
     * Update a existing resource in storage.
     *
     * @param  Request  $request
     * @param  TanahKasDesa  $tanahkasdesa
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,TanahKasDesa $tanahkasdesa)
    {
        $tanahkasdesa->fill($request->all());

        if ($tanahkasdesa->save()) {
            
            session()->flash('app_message', 'TanahKasDesa successfully updated');
            return redirect()->route('tanah_kas_desa.index');
            } else {
                session()->flash('app_error', 'Something is wrong while updating TanahKasDesa');
            }
        return redirect()->back();
    }    /**
     * Delete a  resource from  storage.
     *
     * @param  Request  $request
     * @param  TanahKasDesa  $tanahkasdesa
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Request $request, TanahKasDesa $tanahkasdesa)
    {
        if ($tanahkasdesa->delete()) {
                session()->flash('app_message', 'TanahKasDesa successfully deleted');
            } else {
                session()->flash('app_error', 'Error occurred while deleting TanahKasDesa');
            }

        return redirect()->back();
    }
}
