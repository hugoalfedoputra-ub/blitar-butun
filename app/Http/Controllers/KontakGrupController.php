<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\KontakGrup;


/**
 * Description of KontakGrupController
 *
 * @author Tuhin Bepari <digitaldreams40@gmail.com>
 */

class KontakGrupController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('pages.kontak_grup.index', ['records' => KontakGrup::paginate(10)]);
    }    /**
     * Display the specified resource.
     *
     * @param  Request  $request
     * @param  KontakGrup  $kontakgrup
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, KontakGrup $kontakgrup)
    {
        return view('pages.kontak_grup.show', [
                'record' =>$kontakgrup,
        ]);

    }    /**
     * Show the form for creating a new resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

        return view('pages.kontak_grup.create', [
            'model' => new KontakGrup,

        ]);
    }    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $model=new KontakGrup;
        $model->fill($request->all());

        if ($model->save()) {
            
            session()->flash('app_message', 'KontakGrup saved successfully');
            return redirect()->route('kontak_grup.index');
            } else {
                session()->flash('app_message', 'Something is wrong while saving KontakGrup');
            }
        return redirect()->back();
    } /**
     * Show the form for editing the specified resource.
     *
     * @param  Request  $request
     * @param  KontakGrup  $kontakgrup
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, KontakGrup $kontakgrup)
    {

        return view('pages.kontak_grup.edit', [
            'model' => $kontakgrup,

            ]);
    }    /**
     * Update a existing resource in storage.
     *
     * @param  Request  $request
     * @param  KontakGrup  $kontakgrup
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,KontakGrup $kontakgrup)
    {
        $kontakgrup->fill($request->all());

        if ($kontakgrup->save()) {
            
            session()->flash('app_message', 'KontakGrup successfully updated');
            return redirect()->route('kontak_grup.index');
            } else {
                session()->flash('app_error', 'Something is wrong while updating KontakGrup');
            }
        return redirect()->back();
    }    /**
     * Delete a  resource from  storage.
     *
     * @param  Request  $request
     * @param  KontakGrup  $kontakgrup
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Request $request, KontakGrup $kontakgrup)
    {
        if ($kontakgrup->delete()) {
                session()->flash('app_message', 'KontakGrup successfully deleted');
            } else {
                session()->flash('app_error', 'Error occurred while deleting KontakGrup');
            }

        return redirect()->back();
    }
}
