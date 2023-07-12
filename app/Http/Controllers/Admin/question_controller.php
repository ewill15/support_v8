<?php

namespace App\Http\Controllers\Admin;

use App\Helper;
use App\Section;
use App\Question;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class question_controller extends Controller
{
    public function index($section_id,Request $request)
    {
        $questions = Question::where('section_id',$section_id)->orderBy('id','desc');

        $paginate = $request->pagination ? $request->pagination : 20;
        $page = (int)$request->page;
        if($request->keyword != '')
            $questions = $questions->where('question','LIKE','%'.$request->keyword.'%');

        $text_pagination = Helper::messageCounterPagination($questions->count(), $page,$paginate);

        $questions = $questions->paginate($paginate);

        return view('admin.questions.index', compact('section_id','questions', 'paginate','text_pagination'));
    }

    public function create($section_id)
    {
        $sections = Section::orderBy('id','asc')->pluck('name','id');
        return view('admin.questions.create',compact('sections','section_id'));
    }

    public function show(){/* show */}

    public function store($section_id,Request $request)
    {
        $v= Validator::make($request->all(),[
            'question' => 'required',
            'answer' => 'required',
            'section_id'=>'required'
        ]);
        if($v && $v->fails()){
            return redirect()->back()->withInput()->withErrors($v->errors());
        }

        $fields = $request->all();

        $fields['section_id'] = $section_id;

        $question = Question::create($fields);
        $section = Section::find($section_id);

        if ($question)
        {
            
            Session::flash('flash_message', 'New question created in '.$section->name);
            Session::flash('flash_message_type', 'success');
        }
        else
        {
            Session::flash('flash_message', 'Error creating question in '.$section->name);
            Session::flash('flash_message_type', 'danger');
        }
        return redirect('admin/sections/'.$section_id.'/questions');
    }

    public function edit($section_id,$id)
    {
        $question = Question::find($id);
        $sections = Section::orderBy('id','asc')->pluck('name','id');

        return view('admin.questions.edit',compact('question','sections','section_id'));
    }

    public function update($section_id, Request $request, $id)
    {        
        $question = Question::find($id);
        $fields = $request->all();
        
        $v= Validator::make($request->all(),[
            'question' => 'required',
            'answer' => 'required',
            'section_id'=>'required'
        ]);
        if($v && $v->fails()){
            return redirect()->back()->withInput()->withErrors($v->errors());
        }
        
        $question->update($fields);

        Session::flash('flash_message', 'job updated');
        Session::flash('flash_message_type', 'success');

        return redirect('admin/sections/'.$section_id.'/questions');
    }

    public function destroy($section_id,$id)
    {
        $question = Question::findOrFail($id);
        if ($question) {
            $question->delete();

            Session::flash('flash_message', '¡job deleted!');
            Session::flash('flash_message_type', 'success');
        } else {
            Session::flash('flash_message', 'job could not be deleted.');
            Session::flash('flash_message_type', 'warning');
        }
        return redirect('admin/sections/'.$section_id.'/questions');
    }
}
