<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Komentar;


/**
 * Description of KomentarController
 *
 * @author Tuhin Bepari <digitaldreams40@gmail.com>
 */

class KomentarController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return Komentar::paginate(10);
    }    
    /**
     * Display the specified resource.
     *
     * @param  Request  $request
     * @param  Komentar  $komentar
     * @return \Illuminate\Http\Response
     */
    public function show(string $id)
    {
        $komentar = Komentar::find($id);
        if ($komentar) {
            return response()->json($komentar);
        }
        return response()->json(['message' => 'Komentar not found'], 404);
    }    
    /**
     * Show the form for creating a new resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

        return;
    }    
    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return ;
    } 
    /**
     * Show the form for editing the specified resource.
     *
     * @param  Request  $request
     * @param  Komentar  $komentar
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Komentar $komentar)
    {

        return ;
    }    
    /**
     * Update a existing resource in storage.
     *
     * @param  Request  $request
     * @param  Komentar  $komentar
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Komentar $komentar)
    {
        return;
    }    
    /**
     * Delete a  resource from  storage.
     *
     * @param  Request  $request
     * @param  Komentar  $komentar
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Request $request, Komentar $komentar)
    {
        return;
    }

    public function getCommentsByArticleId(string $articleId)
    {
        $comments = Komentar::where('id_artikel', $articleId)
            ->where('status', 1)  // Only approved comments
            ->where('is_archived', 0)  // Not archived
            ->orderBy('tgl_upload', 'desc')
            ->get();

        return response()->json($comments);
    }
}