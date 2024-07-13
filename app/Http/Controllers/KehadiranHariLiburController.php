<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\KehadiranHariLibur;


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
        return view('pages.kehadiran_hari_libur.index', ['records' => KehadiranHariLibur::paginate(10)]);
    }    /**
     * Display the specified resource.
     *
     * @param  Request  $request
     * @param  KehadiranHariLibur  $kehadiranharilibur
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, KehadiranHariLibur $kehadiranharilibur)
    {
        return view('pages.kehadiran_hari_libur.show', [
                'record' =>$kehadiranharilibur,
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
            'model' => new KehadiranHariLibur,

        ]);
    }    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $model=new KehadiranHariLibur;
        $model->fill($request->all());

        if ($model->save()) {
            
            session()->flash('app_message', 'KehadiranHariLibur saved successfully');
            return redirect()->route('kehadiran_hari_libur.index');
            } else {
                session()->flash('app_message', 'Something is wrong while saving KehadiranHariLibur');
            }
        return redirect()->back();
    } /**
     * Show the form for editing the specified resource.
     *
     * @param  Request  $request
     * @param  KehadiranHariLibur  $kehadiranharilibur
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, KehadiranHariLibur $kehadiranharilibur)
    {

        return view('pages.kehadiran_hari_libur.edit', [
            'model' => $kehadiranharilibur,

            ]);
    }    /**
     * Update a existing resource in storage.
     *
     * @param  Request  $request
     * @param  KehadiranHariLibur  $kehadiranharilibur
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,KehadiranHariLibur $kehadiranharilibur)
    {
        $kehadiranharilibur->fill($request->all());

        if ($kehadiranharilibur->save()) {
            
            session()->flash('app_message', 'KehadiranHariLibur successfully updated');
            return redirect()->route('kehadiran_hari_libur.index');
            } else {
                session()->flash('app_error', 'Something is wrong while updating KehadiranHariLibur');
            }
        return redirect()->back();
    }    /**
     * Delete a  resource from  storage.
     *
     * @param  Request  $request
     * @param  KehadiranHariLibur  $kehadiranharilibur
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Request $request, KehadiranHariLibur $kehadiranharilibur)
    {
        if ($kehadiranharilibur->delete()) {
                session()->flash('app_message', 'KehadiranHariLibur successfully deleted');
            } else {
                session()->flash('app_error', 'Error occurred while deleting KehadiranHariLibur');
            }

        return redirect()->back();
    }
}
