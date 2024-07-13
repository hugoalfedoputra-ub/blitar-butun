<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\DtksPengaturanProgramModel;
use App\Models\Program;


/**
 * Description of DtksPengaturanProgramController
 *
 * @author Tuhin Bepari <digitaldreams40@gmail.com>
 */

class DtksPengaturanProgramController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('pages.dtks_pengaturan_program.index', ['records' => DtksPengaturanProgramModel::paginate(10)]);
    }    /**
     * Display the specified resource.
     *
     * @param  Request  $request
     * @param  DtksPengaturanProgramModel  $dtkspengaturanprogrammodel
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, DtksPengaturanProgramModel $dtkspengaturanprogrammodel)
    {
        return view('pages.dtks_pengaturan_program.show', [
                'record' =>$dtkspengaturanprogrammodel,
        ]);

    }    /**
     * Show the form for creating a new resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
		$program = Program::all(['id']);

        return view('pages.dtks_pengaturan_program.create', [
            'model' => new DtksPengaturanProgramModel,
			"program" => $program,

        ]);
    }    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $model=new DtksPengaturanProgramModel;
        $model->fill($request->all());

        if ($model->save()) {
            
            session()->flash('app_message', 'DtksPengaturanProgramModel saved successfully');
            return redirect()->route('dtks_pengaturan_program.index');
            } else {
                session()->flash('app_message', 'Something is wrong while saving DtksPengaturanProgramModel');
            }
        return redirect()->back();
    } /**
     * Show the form for editing the specified resource.
     *
     * @param  Request  $request
     * @param  DtksPengaturanProgramModel  $dtkspengaturanprogrammodel
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, DtksPengaturanProgramModel $dtkspengaturanprogrammodel)
    {
		$program = Program::all(['id']);

        return view('pages.dtks_pengaturan_program.edit', [
            'model' => $dtkspengaturanprogrammodel,
			"program" => $program,

            ]);
    }    /**
     * Update a existing resource in storage.
     *
     * @param  Request  $request
     * @param  DtksPengaturanProgramModel  $dtkspengaturanprogrammodel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,DtksPengaturanProgramModel $dtkspengaturanprogrammodel)
    {
        $dtkspengaturanprogrammodel->fill($request->all());

        if ($dtkspengaturanprogrammodel->save()) {
            
            session()->flash('app_message', 'DtksPengaturanProgramModel successfully updated');
            return redirect()->route('dtks_pengaturan_program.index');
            } else {
                session()->flash('app_error', 'Something is wrong while updating DtksPengaturanProgramModel');
            }
        return redirect()->back();
    }    /**
     * Delete a  resource from  storage.
     *
     * @param  Request  $request
     * @param  DtksPengaturanProgramModel  $dtkspengaturanprogrammodel
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Request $request, DtksPengaturanProgramModel $dtkspengaturanprogrammodel)
    {
        if ($dtkspengaturanprogrammodel->delete()) {
                session()->flash('app_message', 'DtksPengaturanProgramModel successfully deleted');
            } else {
                session()->flash('app_error', 'Error occurred while deleting DtksPengaturanProgramModel');
            }

        return redirect()->back();
    }
}
