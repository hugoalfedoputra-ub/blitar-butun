<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\GambarGalleryModel;


/**
 * Description of GambarGalleryController
 *
 * @author Tuhin Bepari <digitaldreams40@gmail.com>
 */

class GambarGalleryController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('pages.gambar_gallery.index', ['records' => GambarGalleryModel::paginate(10)]);
    }    /**
     * Display the specified resource.
     *
     * @param  Request  $request
     * @param  GambarGalleryModel  $gambargallerymodel
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, GambarGalleryModel $gambargallerymodel)
    {
        return view('pages.gambar_gallery.show', [
                'record' =>$gambargallerymodel,
        ]);

    }    /**
     * Show the form for creating a new resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

        return view('pages.gambar_gallery.create', [
            'model' => new GambarGalleryModel,

        ]);
    }    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $model=new GambarGalleryModel;
        $model->fill($request->all());

        if ($model->save()) {
            
            session()->flash('app_message', 'GambarGalleryModel saved successfully');
            return redirect()->route('gambar_gallery.index');
            } else {
                session()->flash('app_message', 'Something is wrong while saving GambarGalleryModel');
            }
        return redirect()->back();
    } /**
     * Show the form for editing the specified resource.
     *
     * @param  Request  $request
     * @param  GambarGalleryModel  $gambargallerymodel
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, GambarGalleryModel $gambargallerymodel)
    {

        return view('pages.gambar_gallery.edit', [
            'model' => $gambargallerymodel,

            ]);
    }    /**
     * Update a existing resource in storage.
     *
     * @param  Request  $request
     * @param  GambarGalleryModel  $gambargallerymodel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,GambarGalleryModel $gambargallerymodel)
    {
        $gambargallerymodel->fill($request->all());

        if ($gambargallerymodel->save()) {
            
            session()->flash('app_message', 'GambarGalleryModel successfully updated');
            return redirect()->route('gambar_gallery.index');
            } else {
                session()->flash('app_error', 'Something is wrong while updating GambarGalleryModel');
            }
        return redirect()->back();
    }    /**
     * Delete a  resource from  storage.
     *
     * @param  Request  $request
     * @param  GambarGalleryModel  $gambargallerymodel
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Request $request, GambarGalleryModel $gambargallerymodel)
    {
        if ($gambargallerymodel->delete()) {
                session()->flash('app_message', 'GambarGalleryModel successfully deleted');
            } else {
                session()->flash('app_error', 'Error occurred while deleting GambarGalleryModel');
            }

        return redirect()->back();
    }
}
