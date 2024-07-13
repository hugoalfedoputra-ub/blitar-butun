<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\AnalisisTipeIndikator;


/**
 * Description of AnalisisTipeIndikatorController
 *
 * @author Tuhin Bepari <digitaldreams40@gmail.com>
 */

class AnalisisTipeIndikatorController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return AnalisisTipeIndikator::paginate(10);
    }    /**
     * Display the specified resource.
     *
     * @param  Request  $request
     * @param  AnalisisTipeIndikator  $analisistipeindikator
     * @return \Illuminate\Http\Response
     */
    public function show(string $id)
    {
        $analisistipeindikator = AnalisisTipeIndikator::find($id);
        if ($analisistipeindikator) {
            return response()->json($analisistipeindikator);
        }
        return response()->json(['message' => 'AnalisisTipeIndikator not found'], 404);
    }    /**
     * Show the form for creating a new resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

        return view('pages.analisis_tipe_indikator.create', [
            'model' => new AnalisisTipeIndikator,

        ]);
    }    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $model=new AnalisisTipeIndikator;
        $model->fill($request->all());

        if ($model->save()) {
            
            session()->flash('app_message', 'AnalisisTipeIndikator saved successfully');
            return redirect()->route('analisis_tipe_indikator.index');
            } else {
                session()->flash('app_message', 'Something is wrong while saving AnalisisTipeIndikator');
            }
        return redirect()->back();
    } /**
     * Show the form for editing the specified resource.
     *
     * @param  Request  $request
     * @param  AnalisisTipeIndikator  $analisistipeindikator
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, AnalisisTipeIndikator $analisistipeindikator)
    {

        return view('pages.analisis_tipe_indikator.edit', [
            'model' => $analisistipeindikator,

            ]);
    }    /**
     * Update a existing resource in storage.
     *
     * @param  Request  $request
     * @param  AnalisisTipeIndikator  $analisistipeindikator
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,AnalisisTipeIndikator $analisistipeindikator)
    {
        $analisistipeindikator->fill($request->all());

        if ($analisistipeindikator->save()) {
            
            session()->flash('app_message', 'AnalisisTipeIndikator successfully updated');
            return redirect()->route('analisis_tipe_indikator.index');
            } else {
                session()->flash('app_error', 'Something is wrong while updating AnalisisTipeIndikator');
            }
        return redirect()->back();
    }    /**
     * Delete a  resource from  storage.
     *
     * @param  Request  $request
     * @param  AnalisisTipeIndikator  $analisistipeindikator
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Request $request, AnalisisTipeIndikator $analisistipeindikator)
    {
        if ($analisistipeindikator->delete()) {
                session()->flash('app_message', 'AnalisisTipeIndikator successfully deleted');
            } else {
                session()->flash('app_error', 'Error occurred while deleting AnalisisTipeIndikator');
            }

        return redirect()->back();
    }
}
