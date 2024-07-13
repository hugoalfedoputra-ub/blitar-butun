<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\DtksPengaturanProgram;
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
        return DtksPengaturanProgram::paginate(10);
    }    /**
     * Display the specified resource.
     *
     * @param  Request  $request
     * @param  DtksPengaturanProgram  $dtkspengaturanprogram
     * @return \Illuminate\Http\Response
     */
    public function show(string $id)
    {
        $dtkspengaturanprogram = DtksPengaturanProgram::find($id);
        if ($dtkspengaturanprogram) {
            return response()->json($dtkspengaturanprogram);
        }
        return response()->json(['message' => 'DtksPengaturanProgram not found'], 404);
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
            'model' => new DtksPengaturanProgram,
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
        $model=new DtksPengaturanProgram;
        $model->fill($request->all());

        if ($model->save()) {
            
            session()->flash('app_message', 'DtksPengaturanProgram saved successfully');
            return redirect()->route('dtks_pengaturan_program.index');
            } else {
                session()->flash('app_message', 'Something is wrong while saving DtksPengaturanProgram');
            }
        return redirect()->back();
    } /**
     * Show the form for editing the specified resource.
     *
     * @param  Request  $request
     * @param  DtksPengaturanProgram  $dtkspengaturanprogram
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, DtksPengaturanProgram $dtkspengaturanprogram)
    {
		$program = Program::all(['id']);

        return view('pages.dtks_pengaturan_program.edit', [
            'model' => $dtkspengaturanprogram,
			"program" => $program,

            ]);
    }    /**
     * Update a existing resource in storage.
     *
     * @param  Request  $request
     * @param  DtksPengaturanProgram  $dtkspengaturanprogram
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,DtksPengaturanProgram $dtkspengaturanprogram)
    {
        $dtkspengaturanprogram->fill($request->all());

        if ($dtkspengaturanprogram->save()) {
            
            session()->flash('app_message', 'DtksPengaturanProgram successfully updated');
            return redirect()->route('dtks_pengaturan_program.index');
            } else {
                session()->flash('app_error', 'Something is wrong while updating DtksPengaturanProgram');
            }
        return redirect()->back();
    }    /**
     * Delete a  resource from  storage.
     *
     * @param  Request  $request
     * @param  DtksPengaturanProgram  $dtkspengaturanprogram
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Request $request, DtksPengaturanProgram $dtkspengaturanprogram)
    {
        if ($dtkspengaturanprogram->delete()) {
                session()->flash('app_message', 'DtksPengaturanProgram successfully deleted');
            } else {
                session()->flash('app_error', 'Error occurred while deleting DtksPengaturanProgram');
            }

        return redirect()->back();
    }
}
