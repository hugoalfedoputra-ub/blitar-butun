<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\DisposisiSuratMasukModel;
use App\Models\SuratMasuk;
use App\Models\TwebDesaPamong;


/**
 * Description of DisposisiSuratMasukController
 *
 * @author Tuhin Bepari <digitaldreams40@gmail.com>
 */

class DisposisiSuratMasukController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('pages.disposisi_surat_masuk.index', ['records' => DisposisiSuratMasukModel::paginate(10)]);
    }    /**
     * Display the specified resource.
     *
     * @param  Request  $request
     * @param  DisposisiSuratMasukModel  $disposisisuratmasukmodel
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, DisposisiSuratMasukModel $disposisisuratmasukmodel)
    {
        return view('pages.disposisi_surat_masuk.show', [
                'record' =>$disposisisuratmasukmodel,
        ]);

    }    /**
     * Show the form for creating a new resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
		$surat_masuk = SuratMasuk::all(['id']);
		$tweb_desa_pamong = TwebDesaPamong::all(['id']);

        return view('pages.disposisi_surat_masuk.create', [
            'model' => new DisposisiSuratMasukModel,
			"surat_masuk" => $surat_masuk,
			"tweb_desa_pamong" => $tweb_desa_pamong,

        ]);
    }    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $model=new DisposisiSuratMasukModel;
        $model->fill($request->all());

        if ($model->save()) {
            
            session()->flash('app_message', 'DisposisiSuratMasukModel saved successfully');
            return redirect()->route('disposisi_surat_masuk.index');
            } else {
                session()->flash('app_message', 'Something is wrong while saving DisposisiSuratMasukModel');
            }
        return redirect()->back();
    } /**
     * Show the form for editing the specified resource.
     *
     * @param  Request  $request
     * @param  DisposisiSuratMasukModel  $disposisisuratmasukmodel
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, DisposisiSuratMasukModel $disposisisuratmasukmodel)
    {
		$surat_masuk = SuratMasuk::all(['id']);
		$tweb_desa_pamong = TwebDesaPamong::all(['id']);

        return view('pages.disposisi_surat_masuk.edit', [
            'model' => $disposisisuratmasukmodel,
			"surat_masuk" => $surat_masuk,
			"tweb_desa_pamong" => $tweb_desa_pamong,

            ]);
    }    /**
     * Update a existing resource in storage.
     *
     * @param  Request  $request
     * @param  DisposisiSuratMasukModel  $disposisisuratmasukmodel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,DisposisiSuratMasukModel $disposisisuratmasukmodel)
    {
        $disposisisuratmasukmodel->fill($request->all());

        if ($disposisisuratmasukmodel->save()) {
            
            session()->flash('app_message', 'DisposisiSuratMasukModel successfully updated');
            return redirect()->route('disposisi_surat_masuk.index');
            } else {
                session()->flash('app_error', 'Something is wrong while updating DisposisiSuratMasukModel');
            }
        return redirect()->back();
    }    /**
     * Delete a  resource from  storage.
     *
     * @param  Request  $request
     * @param  DisposisiSuratMasukModel  $disposisisuratmasukmodel
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Request $request, DisposisiSuratMasukModel $disposisisuratmasukmodel)
    {
        if ($disposisisuratmasukmodel->delete()) {
                session()->flash('app_message', 'DisposisiSuratMasukModel successfully deleted');
            } else {
                session()->flash('app_error', 'Error occurred while deleting DisposisiSuratMasukModel');
            }

        return redirect()->back();
    }
}
