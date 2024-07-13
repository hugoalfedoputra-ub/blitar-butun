<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\UrlsModel;


/**
 * Description of UrlsController
 *
 * @author Tuhin Bepari <digitaldreams40@gmail.com>
 */

class UrlsController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('pages.urls.index', ['records' => UrlsModel::paginate(10)]);
    }    /**
     * Display the specified resource.
     *
     * @param  Request  $request
     * @param  UrlsModel  $urlsmodel
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, UrlsModel $urlsmodel)
    {
        return view('pages.urls.show', [
                'record' =>$urlsmodel,
        ]);

    }    /**
     * Show the form for creating a new resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

        return view('pages.urls.create', [
            'model' => new UrlsModel,

        ]);
    }    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $model=new UrlsModel;
        $model->fill($request->all());

        if ($model->save()) {
            
            session()->flash('app_message', 'UrlsModel saved successfully');
            return redirect()->route('urls.index');
            } else {
                session()->flash('app_message', 'Something is wrong while saving UrlsModel');
            }
        return redirect()->back();
    } /**
     * Show the form for editing the specified resource.
     *
     * @param  Request  $request
     * @param  UrlsModel  $urlsmodel
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, UrlsModel $urlsmodel)
    {

        return view('pages.urls.edit', [
            'model' => $urlsmodel,

            ]);
    }    /**
     * Update a existing resource in storage.
     *
     * @param  Request  $request
     * @param  UrlsModel  $urlsmodel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,UrlsModel $urlsmodel)
    {
        $urlsmodel->fill($request->all());

        if ($urlsmodel->save()) {
            
            session()->flash('app_message', 'UrlsModel successfully updated');
            return redirect()->route('urls.index');
            } else {
                session()->flash('app_error', 'Something is wrong while updating UrlsModel');
            }
        return redirect()->back();
    }    /**
     * Delete a  resource from  storage.
     *
     * @param  Request  $request
     * @param  UrlsModel  $urlsmodel
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Request $request, UrlsModel $urlsmodel)
    {
        if ($urlsmodel->delete()) {
                session()->flash('app_message', 'UrlsModel successfully deleted');
            } else {
                session()->flash('app_error', 'Error occurred while deleting UrlsModel');
            }

        return redirect()->back();
    }
}
