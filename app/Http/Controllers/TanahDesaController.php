<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\TanahDesa;


/**
 * Description of TanahDesaController
 *
 * @author Tuhin Bepari <digitaldreams40@gmail.com>
 */

class TanahDesaController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return TanahDesa::paginate(10);
    }    /**
     * Display the specified resource.
     *
     * @param  Request  $request
     * @param  TanahDesa  $tanahdesa
     * @return \Illuminate\Http\Response
     */
    public function show(string $id)
    {
        $tanahdesa = TanahDesa::find($id);
        if ($tanahdesa) {
            return response()->json($tanahdesa);
        }
        return response()->json(['message' => 'TanahDesa not found'], 404);
    }    /**
     * Show the form for creating a new resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

        return view('pages.tanah_desa.create', [
            'model' => new TanahDesa,

        ]);
    }    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $model=new TanahDesa;
        $model->fill($request->all());

        if ($model->save()) {
            
            session()->flash('app_message', 'TanahDesa saved successfully');
            return redirect()->route('tanah_desa.index');
            } else {
                session()->flash('app_message', 'Something is wrong while saving TanahDesa');
            }
        return redirect()->back();
    } /**
     * Show the form for editing the specified resource.
     *
     * @param  Request  $request
     * @param  TanahDesa  $tanahdesa
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, TanahDesa $tanahdesa)
    {

        return view('pages.tanah_desa.edit', [
            'model' => $tanahdesa,

            ]);
    }    /**
     * Update a existing resource in storage.
     *
     * @param  Request  $request
     * @param  TanahDesa  $tanahdesa
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,TanahDesa $tanahdesa)
    {
        $tanahdesa->fill($request->all());

        if ($tanahdesa->save()) {
            
            session()->flash('app_message', 'TanahDesa successfully updated');
            return redirect()->route('tanah_desa.index');
            } else {
                session()->flash('app_error', 'Something is wrong while updating TanahDesa');
            }
        return redirect()->back();
    }    /**
     * Delete a  resource from  storage.
     *
     * @param  Request  $request
     * @param  TanahDesa  $tanahdesa
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Request $request, TanahDesa $tanahdesa)
    {
        if ($tanahdesa->delete()) {
                session()->flash('app_message', 'TanahDesa successfully deleted');
            } else {
                session()->flash('app_error', 'Error occurred while deleting TanahDesa');
            }

        return redirect()->back();
    }
}
