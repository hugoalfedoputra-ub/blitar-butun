<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\CdesaPenduduk;
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
        return view('pages.cdesa_penduduk.index', ['records' => CdesaPenduduk::paginate(10)]);
    }    /**
     * Display the specified resource.
     *
     * @param  Request  $request
     * @param  CdesaPenduduk  $cdesapenduduk
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, CdesaPenduduk $cdesapenduduk)
    {
        return view('pages.cdesa_penduduk.show', [
                'record' =>$cdesapenduduk,
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
            'model' => new CdesaPenduduk,
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
        $model=new CdesaPenduduk;
        $model->fill($request->all());

        if ($model->save()) {
            
            session()->flash('app_message', 'CdesaPenduduk saved successfully');
            return redirect()->route('cdesa_penduduk.index');
            } else {
                session()->flash('app_message', 'Something is wrong while saving CdesaPenduduk');
            }
        return redirect()->back();
    } /**
     * Show the form for editing the specified resource.
     *
     * @param  Request  $request
     * @param  CdesaPenduduk  $cdesapenduduk
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, CdesaPenduduk $cdesapenduduk)
    {
		$cdesa = Cdesa::all(['id']);

        return view('pages.cdesa_penduduk.edit', [
            'model' => $cdesapenduduk,
			"cdesa" => $cdesa,

            ]);
    }    /**
     * Update a existing resource in storage.
     *
     * @param  Request  $request
     * @param  CdesaPenduduk  $cdesapenduduk
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,CdesaPenduduk $cdesapenduduk)
    {
        $cdesapenduduk->fill($request->all());

        if ($cdesapenduduk->save()) {
            
            session()->flash('app_message', 'CdesaPenduduk successfully updated');
            return redirect()->route('cdesa_penduduk.index');
            } else {
                session()->flash('app_error', 'Something is wrong while updating CdesaPenduduk');
            }
        return redirect()->back();
    }    /**
     * Delete a  resource from  storage.
     *
     * @param  Request  $request
     * @param  CdesaPenduduk  $cdesapenduduk
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Request $request, CdesaPenduduk $cdesapenduduk)
    {
        if ($cdesapenduduk->delete()) {
                session()->flash('app_message', 'CdesaPenduduk successfully deleted');
            } else {
                session()->flash('app_error', 'Error occurred while deleting CdesaPenduduk');
            }

        return redirect()->back();
    }
}
