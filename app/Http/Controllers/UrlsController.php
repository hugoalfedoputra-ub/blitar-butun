<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Urls;


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
        return view('pages.urls.index', ['records' => Urls::paginate(10)]);
    }    /**
     * Display the specified resource.
     *
     * @param  Request  $request
     * @param  Urls  $urls
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Urls $urls)
    {
        return view('pages.urls.show', [
                'record' =>$urls,
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
            'model' => new Urls,

        ]);
    }    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $model=new Urls;
        $model->fill($request->all());

        if ($model->save()) {
            
            session()->flash('app_message', 'Urls saved successfully');
            return redirect()->route('urls.index');
            } else {
                session()->flash('app_message', 'Something is wrong while saving Urls');
            }
        return redirect()->back();
    } /**
     * Show the form for editing the specified resource.
     *
     * @param  Request  $request
     * @param  Urls  $urls
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Urls $urls)
    {

        return view('pages.urls.edit', [
            'model' => $urls,

            ]);
    }    /**
     * Update a existing resource in storage.
     *
     * @param  Request  $request
     * @param  Urls  $urls
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Urls $urls)
    {
        $urls->fill($request->all());

        if ($urls->save()) {
            
            session()->flash('app_message', 'Urls successfully updated');
            return redirect()->route('urls.index');
            } else {
                session()->flash('app_error', 'Something is wrong while updating Urls');
            }
        return redirect()->back();
    }    /**
     * Delete a  resource from  storage.
     *
     * @param  Request  $request
     * @param  Urls  $urls
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Request $request, Urls $urls)
    {
        if ($urls->delete()) {
                session()->flash('app_message', 'Urls successfully deleted');
            } else {
                session()->flash('app_error', 'Error occurred while deleting Urls');
            }

        return redirect()->back();
    }
}
