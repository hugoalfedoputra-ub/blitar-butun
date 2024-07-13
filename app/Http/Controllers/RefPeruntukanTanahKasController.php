<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\RefPeruntukanTanahKas;


/**
 * Description of RefPeruntukanTanahKasController
 *
 * @author Tuhin Bepari <digitaldreams40@gmail.com>
 */

class RefPeruntukanTanahKasController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return RefPeruntukanTanahKas::paginate(10);
    }    /**
     * Display the specified resource.
     *
     * @param  Request  $request
     * @param  RefPeruntukanTanahKas  $refperuntukantanahkas
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, RefPeruntukanTanahKas $refperuntukantanahkas)
    {
        return view('pages.ref_peruntukan_tanah_kas.show', [
                'record' =>$refperuntukantanahkas,
        ]);

    }    /**
     * Show the form for creating a new resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

        return view('pages.ref_peruntukan_tanah_kas.create', [
            'model' => new RefPeruntukanTanahKas,

        ]);
    }    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $model=new RefPeruntukanTanahKas;
        $model->fill($request->all());

        if ($model->save()) {
            
            session()->flash('app_message', 'RefPeruntukanTanahKas saved successfully');
            return redirect()->route('ref_peruntukan_tanah_kas.index');
            } else {
                session()->flash('app_message', 'Something is wrong while saving RefPeruntukanTanahKas');
            }
        return redirect()->back();
    } /**
     * Show the form for editing the specified resource.
     *
     * @param  Request  $request
     * @param  RefPeruntukanTanahKas  $refperuntukantanahkas
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, RefPeruntukanTanahKas $refperuntukantanahkas)
    {

        return view('pages.ref_peruntukan_tanah_kas.edit', [
            'model' => $refperuntukantanahkas,

            ]);
    }    /**
     * Update a existing resource in storage.
     *
     * @param  Request  $request
     * @param  RefPeruntukanTanahKas  $refperuntukantanahkas
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,RefPeruntukanTanahKas $refperuntukantanahkas)
    {
        $refperuntukantanahkas->fill($request->all());

        if ($refperuntukantanahkas->save()) {
            
            session()->flash('app_message', 'RefPeruntukanTanahKas successfully updated');
            return redirect()->route('ref_peruntukan_tanah_kas.index');
            } else {
                session()->flash('app_error', 'Something is wrong while updating RefPeruntukanTanahKas');
            }
        return redirect()->back();
    }    /**
     * Delete a  resource from  storage.
     *
     * @param  Request  $request
     * @param  RefPeruntukanTanahKas  $refperuntukantanahkas
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Request $request, RefPeruntukanTanahKas $refperuntukantanahkas)
    {
        if ($refperuntukantanahkas->delete()) {
                session()->flash('app_message', 'RefPeruntukanTanahKas successfully deleted');
            } else {
                session()->flash('app_error', 'Error occurred while deleting RefPeruntukanTanahKas');
            }

        return redirect()->back();
    }
}
