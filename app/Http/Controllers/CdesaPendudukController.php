<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\CdesaPendudukModel;
use App\Models\Cdesa;


/**
 * Description of CdesaPendudukController
 *
 * @author Tuhin Bepari <digitaldreams40@gmail.com>
 */

class CdesaPendudukController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('pages.cdesa_penduduk.index', ['records' => CdesaPendudukModel::paginate(10)]);
    }    /**
     * Display the specified resource.
     *
     * @param  Request  $request
     * @param  CdesaPendudukModel  $cdesapendudukmodel
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, CdesaPendudukModel $cdesapendudukmodel)
    {
        return view('pages.cdesa_penduduk.show', [
                'record' =>$cdesapendudukmodel,
        ]);

    }    /**
     * Show the form for creating a new resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
		$cdesa = Cdesa::all(['id']);

        return view('pages.cdesa_penduduk.create', [
            'model' => new CdesaPendudukModel,
			"cdesa" => $cdesa,

        ]);
    }    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $model=new CdesaPendudukModel;
        $model->fill($request->all());

        if ($model->save()) {
            
            session()->flash('app_message', 'CdesaPendudukModel saved successfully');
            return redirect()->route('cdesa_penduduk.index');
            } else {
                session()->flash('app_message', 'Something is wrong while saving CdesaPendudukModel');
            }
        return redirect()->back();
    } /**
     * Show the form for editing the specified resource.
     *
     * @param  Request  $request
     * @param  CdesaPendudukModel  $cdesapendudukmodel
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, CdesaPendudukModel $cdesapendudukmodel)
    {
		$cdesa = Cdesa::all(['id']);

        return view('pages.cdesa_penduduk.edit', [
            'model' => $cdesapendudukmodel,
			"cdesa" => $cdesa,

            ]);
    }    /**
     * Update a existing resource in storage.
     *
     * @param  Request  $request
     * @param  CdesaPendudukModel  $cdesapendudukmodel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,CdesaPendudukModel $cdesapendudukmodel)
    {
        $cdesapendudukmodel->fill($request->all());

        if ($cdesapendudukmodel->save()) {
            
            session()->flash('app_message', 'CdesaPendudukModel successfully updated');
            return redirect()->route('cdesa_penduduk.index');
            } else {
                session()->flash('app_error', 'Something is wrong while updating CdesaPendudukModel');
            }
        return redirect()->back();
    }    /**
     * Delete a  resource from  storage.
     *
     * @param  Request  $request
     * @param  CdesaPendudukModel  $cdesapendudukmodel
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Request $request, CdesaPendudukModel $cdesapendudukmodel)
    {
        if ($cdesapendudukmodel->delete()) {
                session()->flash('app_message', 'CdesaPendudukModel successfully deleted');
            } else {
                session()->flash('app_error', 'Error occurred while deleting CdesaPendudukModel');
            }

        return redirect()->back();
    }
}
