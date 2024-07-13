<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Komentar;


/**
 * Description of KomentarController
 *
 * @author Tuhin Bepari <digitaldreams40@gmail.com>
 */

class KomentarController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('pages.komentar.index', ['records' => Komentar::paginate(10)]);
    }    /**
     * Display the specified resource.
     *
     * @param  Request  $request
     * @param  Komentar  $komentar
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Komentar $komentar)
    {
        return view('pages.komentar.show', [
                'record' =>$komentar,
        ]);

    }    /**
     * Show the form for creating a new resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

        return view('pages.komentar.create', [
            'model' => new Komentar,

        ]);
    }    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $model=new Komentar;
        $model->fill($request->all());

        if ($model->save()) {
            
            session()->flash('app_message', 'Komentar saved successfully');
            return redirect()->route('komentar.index');
            } else {
                session()->flash('app_message', 'Something is wrong while saving Komentar');
            }
        return redirect()->back();
    } /**
     * Show the form for editing the specified resource.
     *
     * @param  Request  $request
     * @param  Komentar  $komentar
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Komentar $komentar)
    {

        return view('pages.komentar.edit', [
            'model' => $komentar,

            ]);
    }    /**
     * Update a existing resource in storage.
     *
     * @param  Request  $request
     * @param  Komentar  $komentar
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Komentar $komentar)
    {
        $komentar->fill($request->all());

        if ($komentar->save()) {
            
            session()->flash('app_message', 'Komentar successfully updated');
            return redirect()->route('komentar.index');
            } else {
                session()->flash('app_error', 'Something is wrong while updating Komentar');
            }
        return redirect()->back();
    }    /**
     * Delete a  resource from  storage.
     *
     * @param  Request  $request
     * @param  Komentar  $komentar
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Request $request, Komentar $komentar)
    {
        if ($komentar->delete()) {
                session()->flash('app_message', 'Komentar successfully deleted');
            } else {
                session()->flash('app_error', 'Error occurred while deleting Komentar');
            }

        return redirect()->back();
    }
}
