<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use App\Helper;
use App\Song;

class song_controller extends Controller
{
    public function index(Request $request)
    {
        $songs = Song::orderBy('id','ASC');

        $paginate = $request->pagination ? $request->pagination : 20;
        $page = (int)$request->page;
        if($request->keyword != '')
            $songs = $songs->where('name','LIKE','%'.$request->keyword.'%');

        $text_pagination = Helper::messageCounterPagination($songs->count(), $page,$paginate);

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

        if ($song)
        {
            Session::flash('flash_message', 'New song created');
            Session::flash('flash_message_type', 'success');
        }
        else
        {
            Session::flash('flash_message', 'Error creating song');
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

        Session::flash('flash_message', 'Song updated');
        Session::flash('flash_message_type', 'success');

        return redirect('admin/songs');
    }

    public function destroy($id)
    {
        $song = Song::findOrFail($id);
        if ($song) {
            $song->delete();

            Session::flash('flash_message', '¡Song deleted!');
            Session::flash('flash_message_type', 'success');
        } else {
            Session::flash('flash_message', 'Song could not be deleted.');
            Session::flash('flash_message_type', 'warning');
        }
        return redirect('admin/songs');
    }
}
