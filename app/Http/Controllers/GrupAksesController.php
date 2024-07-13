<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\GrupAksesModel;
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
        return view('pages.grup_akses.index', ['records' => GrupAksesModel::paginate(10)]);
    }    /**
     * Display the specified resource.
     *
     * @param  Request  $request
     * @param  GrupAksesModel  $grupaksesmodel
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, GrupAksesModel $grupaksesmodel)
    {
        return view('pages.grup_akses.show', [
                'record' =>$grupaksesmodel,
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
            'model' => new GrupAksesModel,
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
        $model=new GrupAksesModel;
        $model->fill($request->all());

        if ($model->save()) {
            
            session()->flash('app_message', 'GrupAksesModel saved successfully');
            return redirect()->route('grup_akses.index');
            } else {
                session()->flash('app_message', 'Something is wrong while saving GrupAksesModel');
            }
        return redirect()->back();
    } /**
     * Show the form for editing the specified resource.
     *
     * @param  Request  $request
     * @param  GrupAksesModel  $grupaksesmodel
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, GrupAksesModel $grupaksesmodel)
    {
		$user_grup = UserGrup::all(['id']);
		$setting_modul = SettingModul::all(['id']);

        return view('pages.grup_akses.edit', [
            'model' => $grupaksesmodel,
			"user_grup" => $user_grup,
			"setting_modul" => $setting_modul,

            ]);
    }    /**
     * Update a existing resource in storage.
     *
     * @param  Request  $request
     * @param  GrupAksesModel  $grupaksesmodel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,GrupAksesModel $grupaksesmodel)
    {
        $grupaksesmodel->fill($request->all());

        if ($grupaksesmodel->save()) {
            
            session()->flash('app_message', 'GrupAksesModel successfully updated');
            return redirect()->route('grup_akses.index');
            } else {
                session()->flash('app_error', 'Something is wrong while updating GrupAksesModel');
            }
        return redirect()->back();
    }    /**
     * Delete a  resource from  storage.
     *
     * @param  Request  $request
     * @param  GrupAksesModel  $grupaksesmodel
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Request $request, GrupAksesModel $grupaksesmodel)
    {
        if ($grupaksesmodel->delete()) {
                session()->flash('app_message', 'GrupAksesModel successfully deleted');
            } else {
                session()->flash('app_error', 'Error occurred while deleting GrupAksesModel');
            }

        return redirect()->back();
    }
}
