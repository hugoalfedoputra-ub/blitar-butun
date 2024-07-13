<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\AnalisisIndikator;


/**
 * Description of AnalisisIndikatorController
 *
 * @author Tuhin Bepari <digitaldreams40@gmail.com>
 */

class AnalisisIndikatorController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return AnalisisIndikator::paginate(10);
    }    /**
     * Display the specified resource.
     *
     * @param  Request  $request
     * @param  AnalisisIndikator  $analisisindikator
     * @return \Illuminate\Http\Response
     */
    public function show(string $id)
    {
        $analisisindikator = AnalisisIndikator::find($id);
        if ($analisisindikator) {
            return response()->json($analisisindikator);
        }
        return response()->json(['message' => 'AnalisisIndikator not found'], 404);
    }    /**
     * Show the form for creating a new resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

        return view('pages.analisis_indikator.create', [
            'model' => new AnalisisIndikator,

        ]);
    }    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $model=new AnalisisIndikator;
        $model->fill($request->all());

        if ($model->save()) {
            
            session()->flash('app_message', 'AnalisisIndikator saved successfully');
            return redirect()->route('analisis_indikator.index');
            } else {
                session()->flash('app_message', 'Something is wrong while saving AnalisisIndikator');
            }
        return redirect()->back();
    } /**
     * Show the form for editing the specified resource.
     *
     * @param  Request  $request
     * @param  AnalisisIndikator  $analisisindikator
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, AnalisisIndikator $analisisindikator)
    {

        return view('pages.analisis_indikator.edit', [
            'model' => $analisisindikator,

            ]);
    }    /**
     * Update a existing resource in storage.
     *
     * @param  Request  $request
     * @param  AnalisisIndikator  $analisisindikator
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,AnalisisIndikator $analisisindikator)
    {
        $analisisindikator->fill($request->all());

        if ($analisisindikator->save()) {
            
            session()->flash('app_message', 'AnalisisIndikator successfully updated');
            return redirect()->route('analisis_indikator.index');
            } else {
                session()->flash('app_error', 'Something is wrong while updating AnalisisIndikator');
            }
        return redirect()->back();
    }    /**
     * Delete a  resource from  storage.
     *
     * @param  Request  $request
     * @param  AnalisisIndikator  $analisisindikator
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Request $request, AnalisisIndikator $analisisindikator)
    {
        if ($analisisindikator->delete()) {
                session()->flash('app_message', 'AnalisisIndikator successfully deleted');
            } else {
                session()->flash('app_error', 'Error occurred while deleting AnalisisIndikator');
            }

        return redirect()->back();
    }
}
