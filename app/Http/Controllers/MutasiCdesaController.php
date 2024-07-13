<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\MutasiCdesa;
use App\Models\Cdesa;


/**
 * Description of MutasiCdesaController
 *
 * @author Tuhin Bepari <digitaldreams40@gmail.com>
 */

class MutasiCdesaController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('pages.mutasi_cdesa.index', ['records' => MutasiCdesa::paginate(10)]);
    }    /**
     * Display the specified resource.
     *
     * @param  Request  $request
     * @param  MutasiCdesa  $mutasicdesa
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, MutasiCdesa $mutasicdesa)
    {
        return view('pages.mutasi_cdesa.show', [
                'record' =>$mutasicdesa,
        ]);

    }    /**
     * Show the form for creating a new resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
		$cdesa = Cdesa::all(['id']);

        return view('pages.mutasi_cdesa.create', [
            'model' => new MutasiCdesa,
			"cdesa" => $cdesa,

        ]);
    }    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $model=new MutasiCdesa;
        $model->fill($request->all());

        if ($model->save()) {
            
            session()->flash('app_message', 'MutasiCdesa saved successfully');
            return redirect()->route('mutasi_cdesa.index');
            } else {
                session()->flash('app_message', 'Something is wrong while saving MutasiCdesa');
            }
        return redirect()->back();
    } /**
     * Show the form for editing the specified resource.
     *
     * @param  Request  $request
     * @param  MutasiCdesa  $mutasicdesa
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, MutasiCdesa $mutasicdesa)
    {
		$cdesa = Cdesa::all(['id']);

        return view('pages.mutasi_cdesa.edit', [
            'model' => $mutasicdesa,
			"cdesa" => $cdesa,

            ]);
    }    /**
     * Update a existing resource in storage.
     *
     * @param  Request  $request
     * @param  MutasiCdesa  $mutasicdesa
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,MutasiCdesa $mutasicdesa)
    {
        $mutasicdesa->fill($request->all());

        if ($mutasicdesa->save()) {
            
            session()->flash('app_message', 'MutasiCdesa successfully updated');
            return redirect()->route('mutasi_cdesa.index');
            } else {
                session()->flash('app_error', 'Something is wrong while updating MutasiCdesa');
            }
        return redirect()->back();
    }    /**
     * Delete a  resource from  storage.
     *
     * @param  Request  $request
     * @param  MutasiCdesa  $mutasicdesa
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Request $request, MutasiCdesa $mutasicdesa)
    {
        if ($mutasicdesa->delete()) {
                session()->flash('app_message', 'MutasiCdesa successfully deleted');
            } else {
                session()->flash('app_error', 'Error occurred while deleting MutasiCdesa');
            }

        return redirect()->back();
    }
}
