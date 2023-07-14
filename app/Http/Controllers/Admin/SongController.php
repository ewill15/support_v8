<?php

namespace App\Http\Controllers\Admin;

use App\Helper;
use App\Models\Song;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class SongController extends Controller
{
    public function __construct()
    {
        view()->share('section','songs');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
     public function index(Request $request)
     {
        $lang = app()->getLocale();
        $songs = Song::orderBy('id','ASC');

        $paginate = $request->pagination ? $request->pagination : 20;
        $page = (int)$request->page;
        if($request->search != '')
            $songs = $songs->where('name','LIKE','%'.$request->search.'%');

        $text_pagination = Helper::messageCounterPagination($songs->count(), $page,$paginate,$lang);

        $songs = $songs->paginate($paginate);

        return view('admin.songs.index', compact('songs', 'paginate','text_pagination'));
     }
 
     public function create()
     {
        return view('admin.songs.create');
     }
 
     public function show(){/* show */}
 
     public function store(Request $request)
     {
        $v= Validator::make($request->all(),[
            'title' => 'required|string'
        ]);

        if($v && $v->fails()){
            return redirect()->back()->withInput()->withErrors($v->errors());
        }

        $fields = $request->all();
        
        $song = Song::create($fields);
 
        if ($song) {
            Session::flash('flash_message', Helper::contentFlashMessage('create')['success']);
            Session::flash('flash_message_type', 'success');
        } else {
            Session::flash('flash_message', Helper::contentFlashMessage('create')['error']);
            Session::flash('flash_message_type', 'danger');
        }

        return redirect('admin/songs');
     }
 
     public function edit($id)
     {
        $song = Song::find($id);

        return view('admin.songs.edit',compact('song'));
     }
 
     public function update(Request $request, $id)
     {        
        $song = Song::find($id);
        $fields = $request->all();
        
        $v= Validator::make($request->all(),[
            'title' => 'required|string'
        ]);
        if($v && $v->fails()){
            return redirect()->back()->withInput()->withErrors($v->errors());
        }

        $song->update($fields);

        if ($song) {
            Session::flash('flash_message', Helper::contentFlashMessage('create')['success']);
            Session::flash('flash_message_type', 'success');
        } else {
            Session::flash('flash_message', Helper::contentFlashMessage('create')['error']);
            Session::flash('flash_message_type', 'danger');
        }
 
         return redirect('admin/songs');
     }
 
     public function destroy($id)
     {
        $song = Song::findOrFail($id);
        if ($song) {
            $song->delete(); //delete phisically

            Session::flash('flash_message', Helper::contentFlashMessage('delete')['success']);
            Session::flash('flash_message_type', 'success');
        } else {
            Session::flash('flash_message', Helper::contentFlashMessage('delete')['error']);
            Session::flash('flash_message_type', 'danger');
        }

        return redirect('admin/songs');
     }
}
