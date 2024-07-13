<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\AnalisisPeriode;


/**
 * Description of AnalisisPeriodeController
 *
 * @author Tuhin Bepari <digitaldreams40@gmail.com>
 */

class AnalisisPeriodeController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return AnalisisPeriode::paginate(10);
    }    /**
     * Display the specified resource.
     *
     * @param  Request  $request
     * @param  AnalisisPeriode  $analisisperiode
     * @return \Illuminate\Http\Response
     */
    public function show(string $id)
    {
        $analisisperiode = AnalisisPeriode::find($id);
        if ($analisisperiode) {
            return response()->json($analisisperiode);
        }
        return response()->json(['message' => 'AnalisisPeriode not found'], 404);
    }    /**
     * Show the form for creating a new resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

        return view('pages.analisis_periode.create', [
            'model' => new AnalisisPeriode,

        ]);
    }    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $model=new AnalisisPeriode;
        $model->fill($request->all());

        if ($model->save()) {
            
            session()->flash('app_message', 'AnalisisPeriode saved successfully');
            return redirect()->route('analisis_periode.index');
            } else {
                session()->flash('app_message', 'Something is wrong while saving AnalisisPeriode');
            }
        return redirect()->back();
    } /**
     * Show the form for editing the specified resource.
     *
     * @param  Request  $request
     * @param  AnalisisPeriode  $analisisperiode
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, AnalisisPeriode $analisisperiode)
    {

        return view('pages.analisis_periode.edit', [
            'model' => $analisisperiode,

            ]);
    }    /**
     * Update a existing resource in storage.
     *
     * @param  Request  $request
     * @param  AnalisisPeriode  $analisisperiode
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,AnalisisPeriode $analisisperiode)
    {
        $analisisperiode->fill($request->all());

        if ($analisisperiode->save()) {
            
            session()->flash('app_message', 'AnalisisPeriode successfully updated');
            return redirect()->route('analisis_periode.index');
            } else {
                session()->flash('app_error', 'Something is wrong while updating AnalisisPeriode');
            }
        return redirect()->back();
    }    /**
     * Delete a  resource from  storage.
     *
     * @param  Request  $request
     * @param  AnalisisPeriode  $analisisperiode
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Request $request, AnalisisPeriode $analisisperiode)
    {
        if ($analisisperiode->delete()) {
                session()->flash('app_message', 'AnalisisPeriode successfully deleted');
            } else {
                session()->flash('app_error', 'Error occurred while deleting AnalisisPeriode');
            }

        return redirect()->back();
    }
}
