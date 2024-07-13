<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\AnalisisRespon;


/**
 * Description of AnalisisResponController
 *
 * @author Tuhin Bepari <digitaldreams40@gmail.com>
 */

class AnalisisResponController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('pages.analisis_respon.index', ['records' => AnalisisRespon::paginate(10)]);
    }    /**
     * Display the specified resource.
     *
     * @param  Request  $request
     * @param  AnalisisRespon  $analisisrespon
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, AnalisisRespon $analisisrespon)
    {
        return view('pages.analisis_respon.show', [
                'record' =>$analisisrespon,
        ]);

    }    /**
     * Show the form for creating a new resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

        return view('pages.analisis_respon.create', [
            'model' => new AnalisisRespon,

        ]);
    }    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $model=new AnalisisRespon;
        $model->fill($request->all());

        if ($model->save()) {
            
            session()->flash('app_message', 'AnalisisRespon saved successfully');
            return redirect()->route('analisis_respon.index');
            } else {
                session()->flash('app_message', 'Something is wrong while saving AnalisisRespon');
            }
        return redirect()->back();
    } /**
     * Show the form for editing the specified resource.
     *
     * @param  Request  $request
     * @param  AnalisisRespon  $analisisrespon
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, AnalisisRespon $analisisrespon)
    {

        return view('pages.analisis_respon.edit', [
            'model' => $analisisrespon,

            ]);
    }    /**
     * Update a existing resource in storage.
     *
     * @param  Request  $request
     * @param  AnalisisRespon  $analisisrespon
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,AnalisisRespon $analisisrespon)
    {
        $analisisrespon->fill($request->all());

        if ($analisisrespon->save()) {
            
            session()->flash('app_message', 'AnalisisRespon successfully updated');
            return redirect()->route('analisis_respon.index');
            } else {
                session()->flash('app_error', 'Something is wrong while updating AnalisisRespon');
            }
        return redirect()->back();
    }    /**
     * Delete a  resource from  storage.
     *
     * @param  Request  $request
     * @param  AnalisisRespon  $analisisrespon
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Request $request, AnalisisRespon $analisisrespon)
    {
        if ($analisisrespon->delete()) {
                session()->flash('app_message', 'AnalisisRespon successfully deleted');
            } else {
                session()->flash('app_error', 'Error occurred while deleting AnalisisRespon');
            }

        return redirect()->back();
    }
}
