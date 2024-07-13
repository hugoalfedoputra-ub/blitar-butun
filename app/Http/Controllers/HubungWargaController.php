<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\HubungWarga;
use App\Models\KontakGrup;


/**
 * Description of HubungWargaController
 *
 * @author Tuhin Bepari <digitaldreams40@gmail.com>
 */

class HubungWargaController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('pages.hubung_warga.index', ['records' => HubungWarga::paginate(10)]);
    }    /**
     * Display the specified resource.
     *
     * @param  Request  $request
     * @param  HubungWarga  $hubungwarga
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, HubungWarga $hubungwarga)
    {
        return view('pages.hubung_warga.show', [
                'record' =>$hubungwarga,
        ]);

    }    /**
     * Show the form for creating a new resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
		$kontak_grup = KontakGrup::all(['id']);

        return view('pages.hubung_warga.create', [
            'model' => new HubungWarga,
			"kontak_grup" => $kontak_grup,

        ]);
    }    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $model=new HubungWarga;
        $model->fill($request->all());

        if ($model->save()) {
            
            session()->flash('app_message', 'HubungWarga saved successfully');
            return redirect()->route('hubung_warga.index');
            } else {
                session()->flash('app_message', 'Something is wrong while saving HubungWarga');
            }
        return redirect()->back();
    } /**
     * Show the form for editing the specified resource.
     *
     * @param  Request  $request
     * @param  HubungWarga  $hubungwarga
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, HubungWarga $hubungwarga)
    {
		$kontak_grup = KontakGrup::all(['id']);

        return view('pages.hubung_warga.edit', [
            'model' => $hubungwarga,
			"kontak_grup" => $kontak_grup,

            ]);
    }    /**
     * Update a existing resource in storage.
     *
     * @param  Request  $request
     * @param  HubungWarga  $hubungwarga
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,HubungWarga $hubungwarga)
    {
        $hubungwarga->fill($request->all());

        if ($hubungwarga->save()) {
            
            session()->flash('app_message', 'HubungWarga successfully updated');
            return redirect()->route('hubung_warga.index');
            } else {
                session()->flash('app_error', 'Something is wrong while updating HubungWarga');
            }
        return redirect()->back();
    }    /**
     * Delete a  resource from  storage.
     *
     * @param  Request  $request
     * @param  HubungWarga  $hubungwarga
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Request $request, HubungWarga $hubungwarga)
    {
        if ($hubungwarga->delete()) {
                session()->flash('app_message', 'HubungWarga successfully deleted');
            } else {
                session()->flash('app_error', 'Error occurred while deleting HubungWarga');
            }

        return redirect()->back();
    }
}
