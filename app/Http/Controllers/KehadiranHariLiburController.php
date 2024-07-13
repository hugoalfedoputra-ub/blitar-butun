<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\KehadiranHariLiburModel;


/**
 * Description of KehadiranHariLiburController
 *
 * @author Tuhin Bepari <digitaldreams40@gmail.com>
 */

class KehadiranHariLiburController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('pages.kehadiran_hari_libur.index', ['records' => KehadiranHariLiburModel::paginate(10)]);
    }    /**
     * Display the specified resource.
     *
     * @param  Request  $request
     * @param  KehadiranHariLiburModel  $kehadiranhariliburmodel
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, KehadiranHariLiburModel $kehadiranhariliburmodel)
    {
        return view('pages.kehadiran_hari_libur.show', [
                'record' =>$kehadiranhariliburmodel,
        ]);

    }    /**
     * Show the form for creating a new resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

        return view('pages.kehadiran_hari_libur.create', [
            'model' => new KehadiranHariLiburModel,

        ]);
    }    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $model=new KehadiranHariLiburModel;
        $model->fill($request->all());

        if ($model->save()) {
            
            session()->flash('app_message', 'KehadiranHariLiburModel saved successfully');
            return redirect()->route('kehadiran_hari_libur.index');
            } else {
                session()->flash('app_message', 'Something is wrong while saving KehadiranHariLiburModel');
            }
        return redirect()->back();
    } /**
     * Show the form for editing the specified resource.
     *
     * @param  Request  $request
     * @param  KehadiranHariLiburModel  $kehadiranhariliburmodel
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, KehadiranHariLiburModel $kehadiranhariliburmodel)
    {

        return view('pages.kehadiran_hari_libur.edit', [
            'model' => $kehadiranhariliburmodel,

            ]);
    }    /**
     * Update a existing resource in storage.
     *
     * @param  Request  $request
     * @param  KehadiranHariLiburModel  $kehadiranhariliburmodel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,KehadiranHariLiburModel $kehadiranhariliburmodel)
    {
        $kehadiranhariliburmodel->fill($request->all());

        if ($kehadiranhariliburmodel->save()) {
            
            session()->flash('app_message', 'KehadiranHariLiburModel successfully updated');
            return redirect()->route('kehadiran_hari_libur.index');
            } else {
                session()->flash('app_error', 'Something is wrong while updating KehadiranHariLiburModel');
            }
        return redirect()->back();
    }    /**
     * Delete a  resource from  storage.
     *
     * @param  Request  $request
     * @param  KehadiranHariLiburModel  $kehadiranhariliburmodel
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Request $request, KehadiranHariLiburModel $kehadiranhariliburmodel)
    {
        if ($kehadiranhariliburmodel->delete()) {
                session()->flash('app_message', 'KehadiranHariLiburModel successfully deleted');
            } else {
                session()->flash('app_error', 'Error occurred while deleting KehadiranHariLiburModel');
            }

        return redirect()->back();
    }
}
