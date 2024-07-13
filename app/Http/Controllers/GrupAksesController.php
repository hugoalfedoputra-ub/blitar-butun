<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\GrupAkses;
use App\Models\UserGrup;
use App\Models\SettingModul;


/**
 * Description of GrupAksesController
 *
 * @author Tuhin Bepari <digitaldreams40@gmail.com>
 */

class GrupAksesController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return GrupAkses::paginate(10);
    }    /**
     * Display the specified resource.
     *
     * @param  Request  $request
     * @param  GrupAkses  $grupakses
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, GrupAkses $grupakses)
    {
        return view('pages.grup_akses.show', [
                'record' =>$grupakses,
        ]);

    }    /**
     * Show the form for creating a new resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
		$user_grup = UserGrup::all(['id']);
		$setting_modul = SettingModul::all(['id']);

        return view('pages.grup_akses.create', [
            'model' => new GrupAkses,
			"user_grup" => $user_grup,
			"setting_modul" => $setting_modul,

        ]);
    }    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $model=new GrupAkses;
        $model->fill($request->all());

        if ($model->save()) {
            
            session()->flash('app_message', 'GrupAkses saved successfully');
            return redirect()->route('grup_akses.index');
            } else {
                session()->flash('app_message', 'Something is wrong while saving GrupAkses');
            }
        return redirect()->back();
    } /**
     * Show the form for editing the specified resource.
     *
     * @param  Request  $request
     * @param  GrupAkses  $grupakses
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, GrupAkses $grupakses)
    {
		$user_grup = UserGrup::all(['id']);
		$setting_modul = SettingModul::all(['id']);

        return view('pages.grup_akses.edit', [
            'model' => $grupakses,
			"user_grup" => $user_grup,
			"setting_modul" => $setting_modul,

            ]);
    }    /**
     * Update a existing resource in storage.
     *
     * @param  Request  $request
     * @param  GrupAkses  $grupakses
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,GrupAkses $grupakses)
    {
        $grupakses->fill($request->all());

        if ($grupakses->save()) {
            
            session()->flash('app_message', 'GrupAkses successfully updated');
            return redirect()->route('grup_akses.index');
            } else {
                session()->flash('app_error', 'Something is wrong while updating GrupAkses');
            }
        return redirect()->back();
    }    /**
     * Delete a  resource from  storage.
     *
     * @param  Request  $request
     * @param  GrupAkses  $grupakses
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Request $request, GrupAkses $grupakses)
    {
        if ($grupakses->delete()) {
                session()->flash('app_message', 'GrupAkses successfully deleted');
            } else {
                session()->flash('app_error', 'Error occurred while deleting GrupAkses');
            }

        return redirect()->back();
    }
}
