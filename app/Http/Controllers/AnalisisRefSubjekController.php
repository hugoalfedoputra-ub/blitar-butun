<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\AnalisisRefSubjek;


/**
 * Description of AnalisisRefSubjekController
 *
 * @author Tuhin Bepari <digitaldreams40@gmail.com>
 */

class AnalisisRefSubjekController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return AnalisisRefSubjek::paginate(10);
    }    /**
     * Display the specified resource.
     *
     * @param  Request  $request
     * @param  AnalisisRefSubjek  $analisisrefsubjek
     * @return \Illuminate\Http\Response
     */
    public function show(string $id)
    {
        $analisisrefsubjek = AnalisisRefSubjek::find($id);
        if ($analisisrefsubjek) {
            return response()->json($analisisrefsubjek);
        }
        return response()->json(['message' => 'AnalisisRefSubjek not found'], 404);
    }    /**
     * Show the form for creating a new resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

        return view('pages.analisis_ref_subjek.create', [
            'model' => new AnalisisRefSubjek,

        ]);
    }    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $model=new AnalisisRefSubjek;
        $model->fill($request->all());

        if ($model->save()) {
            
            session()->flash('app_message', 'AnalisisRefSubjek saved successfully');
            return redirect()->route('analisis_ref_subjek.index');
            } else {
                session()->flash('app_message', 'Something is wrong while saving AnalisisRefSubjek');
            }
        return redirect()->back();
    } /**
     * Show the form for editing the specified resource.
     *
     * @param  Request  $request
     * @param  AnalisisRefSubjek  $analisisrefsubjek
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, AnalisisRefSubjek $analisisrefsubjek)
    {

        return view('pages.analisis_ref_subjek.edit', [
            'model' => $analisisrefsubjek,

            ]);
    }    /**
     * Update a existing resource in storage.
     *
     * @param  Request  $request
     * @param  AnalisisRefSubjek  $analisisrefsubjek
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,AnalisisRefSubjek $analisisrefsubjek)
    {
        $analisisrefsubjek->fill($request->all());

        if ($analisisrefsubjek->save()) {
            
            session()->flash('app_message', 'AnalisisRefSubjek successfully updated');
            return redirect()->route('analisis_ref_subjek.index');
            } else {
                session()->flash('app_error', 'Something is wrong while updating AnalisisRefSubjek');
            }
        return redirect()->back();
    }    /**
     * Delete a  resource from  storage.
     *
     * @param  Request  $request
     * @param  AnalisisRefSubjek  $analisisrefsubjek
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Request $request, AnalisisRefSubjek $analisisrefsubjek)
    {
        if ($analisisrefsubjek->delete()) {
                session()->flash('app_message', 'AnalisisRefSubjek successfully deleted');
            } else {
                session()->flash('app_error', 'Error occurred while deleting AnalisisRefSubjek');
            }

        return redirect()->back();
    }
}
