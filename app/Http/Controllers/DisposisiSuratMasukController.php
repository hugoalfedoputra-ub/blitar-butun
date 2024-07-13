<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\DisposisiSuratMasuk;
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
        return view('pages.disposisi_surat_masuk.index', ['records' => DisposisiSuratMasuk::paginate(10)]);
    }    /**
     * Display the specified resource.
     *
     * @param  Request  $request
     * @param  DisposisiSuratMasuk  $disposisisuratmasuk
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, DisposisiSuratMasuk $disposisisuratmasuk)
    {
        return view('pages.disposisi_surat_masuk.show', [
                'record' =>$disposisisuratmasuk,
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
            'model' => new DisposisiSuratMasuk,
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
        $model=new DisposisiSuratMasuk;
        $model->fill($request->all());

        if ($model->save()) {
            
            session()->flash('app_message', 'DisposisiSuratMasuk saved successfully');
            return redirect()->route('disposisi_surat_masuk.index');
            } else {
                session()->flash('app_message', 'Something is wrong while saving DisposisiSuratMasuk');
            }
        return redirect()->back();
    } /**
     * Show the form for editing the specified resource.
     *
     * @param  Request  $request
     * @param  DisposisiSuratMasuk  $disposisisuratmasuk
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, DisposisiSuratMasuk $disposisisuratmasuk)
    {
		$surat_masuk = SuratMasuk::all(['id']);
		$tweb_desa_pamong = TwebDesaPamong::all(['id']);

        return view('pages.disposisi_surat_masuk.edit', [
            'model' => $disposisisuratmasuk,
			"surat_masuk" => $surat_masuk,
			"tweb_desa_pamong" => $tweb_desa_pamong,

            ]);
    }    /**
     * Update a existing resource in storage.
     *
     * @param  Request  $request
     * @param  DisposisiSuratMasuk  $disposisisuratmasuk
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,DisposisiSuratMasuk $disposisisuratmasuk)
    {
        $disposisisuratmasuk->fill($request->all());

        if ($disposisisuratmasuk->save()) {
            
            session()->flash('app_message', 'DisposisiSuratMasuk successfully updated');
            return redirect()->route('disposisi_surat_masuk.index');
            } else {
                session()->flash('app_error', 'Something is wrong while updating DisposisiSuratMasuk');
            }
        return redirect()->back();
    }    /**
     * Delete a  resource from  storage.
     *
     * @param  Request  $request
     * @param  DisposisiSuratMasuk  $disposisisuratmasuk
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Request $request, DisposisiSuratMasuk $disposisisuratmasuk)
    {
        if ($disposisisuratmasuk->delete()) {
                session()->flash('app_message', 'DisposisiSuratMasuk successfully deleted');
            } else {
                session()->flash('app_error', 'Error occurred while deleting DisposisiSuratMasuk');
            }

        return redirect()->back();
    }
}
