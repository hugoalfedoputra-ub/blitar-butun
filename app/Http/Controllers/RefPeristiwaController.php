<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\RefPeristiwa;


/**
 * Description of RefPeristiwaController
 *
 * @author Tuhin Bepari <digitaldreams40@gmail.com>
 */

class RefPeristiwaController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return RefPeristiwa::paginate(10);
    }    /**
     * Display the specified resource.
     *
     * @param  Request  $request
     * @param  RefPeristiwa  $refperistiwa
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, RefPeristiwa $refperistiwa)
    {
        return view('pages.ref_peristiwa.show', [
                'record' =>$refperistiwa,
        ]);

    }    /**
     * Show the form for creating a new resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

        return view('pages.ref_peristiwa.create', [
            'model' => new RefPeristiwa,

        ]);
    }    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $model=new RefPeristiwa;
        $model->fill($request->all());

        if ($model->save()) {
            
            session()->flash('app_message', 'RefPeristiwa saved successfully');
            return redirect()->route('ref_peristiwa.index');
            } else {
                session()->flash('app_message', 'Something is wrong while saving RefPeristiwa');
            }
        return redirect()->back();
    } /**
     * Show the form for editing the specified resource.
     *
     * @param  Request  $request
     * @param  RefPeristiwa  $refperistiwa
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, RefPeristiwa $refperistiwa)
    {

        return view('pages.ref_peristiwa.edit', [
            'model' => $refperistiwa,

            ]);
    }    /**
     * Update a existing resource in storage.
     *
     * @param  Request  $request
     * @param  RefPeristiwa  $refperistiwa
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,RefPeristiwa $refperistiwa)
    {
        $refperistiwa->fill($request->all());

        if ($refperistiwa->save()) {
            
            session()->flash('app_message', 'RefPeristiwa successfully updated');
            return redirect()->route('ref_peristiwa.index');
            } else {
                session()->flash('app_error', 'Something is wrong while updating RefPeristiwa');
            }
        return redirect()->back();
    }    /**
     * Delete a  resource from  storage.
     *
     * @param  Request  $request
     * @param  RefPeristiwa  $refperistiwa
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Request $request, RefPeristiwa $refperistiwa)
    {
        if ($refperistiwa->delete()) {
                session()->flash('app_message', 'RefPeristiwa successfully deleted');
            } else {
                session()->flash('app_error', 'Error occurred while deleting RefPeristiwa');
            }

        return redirect()->back();
    }
}
