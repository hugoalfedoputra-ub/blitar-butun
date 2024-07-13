<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\GambarGallery;


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
        return GambarGallery::paginate(10);
    }    /**
     * Display the specified resource.
     *
     * @param  Request  $request
     * @param  GambarGallery  $gambargallery
     * @return \Illuminate\Http\Response
     */
    public function show(string $id)
    {
        $gambargallery = GambarGallery::find($id);
        if ($gambargallery) {
            return response()->json($gambargallery);
        }
        return response()->json(['message' => 'GambarGallery not found'], 404);
    }    /**
     * Show the form for creating a new resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

        return view('pages.gambar_gallery.create', [
            'model' => new GambarGallery,

        ]);
    }    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $model=new GambarGallery;
        $model->fill($request->all());

        if ($model->save()) {
            
            session()->flash('app_message', 'GambarGallery saved successfully');
            return redirect()->route('gambar_gallery.index');
            } else {
                session()->flash('app_message', 'Something is wrong while saving GambarGallery');
            }
        return redirect()->back();
    } /**
     * Show the form for editing the specified resource.
     *
     * @param  Request  $request
     * @param  GambarGallery  $gambargallery
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, GambarGallery $gambargallery)
    {

        return view('pages.gambar_gallery.edit', [
            'model' => $gambargallery,

            ]);
    }    /**
     * Update a existing resource in storage.
     *
     * @param  Request  $request
     * @param  GambarGallery  $gambargallery
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,GambarGallery $gambargallery)
    {
        $gambargallery->fill($request->all());

        if ($gambargallery->save()) {
            
            session()->flash('app_message', 'GambarGallery successfully updated');
            return redirect()->route('gambar_gallery.index');
            } else {
                session()->flash('app_error', 'Something is wrong while updating GambarGallery');
            }
        return redirect()->back();
    }    /**
     * Delete a  resource from  storage.
     *
     * @param  Request  $request
     * @param  GambarGallery  $gambargallery
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Request $request, GambarGallery $gambargallery)
    {
        if ($gambargallery->delete()) {
                session()->flash('app_message', 'GambarGallery successfully deleted');
            } else {
                session()->flash('app_error', 'Error occurred while deleting GambarGallery');
            }

        return redirect()->back();
    }
}
