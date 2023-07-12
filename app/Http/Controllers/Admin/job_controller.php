<?php

namespace App\Http\Controllers\Admin;

use App\Job;
use App\Helper;
use App\Resume;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class job_controller extends Controller
{
    public function index($resume_id,Request $request)
    {
        $jobs = Job::where('resume_id',$resume_id)->orderBy('id','desc');

        $paginate = $request->pagination ? $request->pagination : 20;
        $page = (int)$request->page;
        if($request->keyword != '')
            $jobs = $jobs->where('description','LIKE','%'.$request->keyword.'%');

        $text_pagination = Helper::messageCounterPagination($jobs->count(), $page,$paginate);

        $jobs = $jobs->paginate($paginate);

        return view('admin.jobs.index', compact('resume_id','jobs', 'paginate','text_pagination'));
    }

    public function create($resume_id)
    {
        $resumes = Resume::orderBy('last_name','asc')->pluck('last_name','id');
        return view('admin.jobs.create',compact('resumes','resume_id'));
    }

    public function show(){/* show */}

    public function store($resume_id,Request $request)
    {
        $v= Validator::make($request->all(),[
            'start' => 'required',
            'end' => '',
            'description' => 'required',
            'company' => 'required'
        ]);
        if($v && $v->fails()){
            return redirect()->back()->withInput()->withErrors($v->errors());
        }

        $fields = $request->all();

        $fields['resume_id'] = $resume_id;
        
        $fields['start'] = Carbon::parse($request->start)->format('Y-m-d');
        $fields['end'] = $request->end ? Carbon::createFromFormat('d-m-Y', $request->end)->toDateString():null;

        $job = Job::create($fields);

        if ($job)
        {
            Session::flash('flash_message', 'New job created');
            Session::flash('flash_message_type', 'success');
        }
        else
        {
            Session::flash('flash_message', 'Error creating job');
            Session::flash('flash_message_type', 'danger');
        }
        return redirect('admin/resumes/'.$resume_id.'/jobs');
    }

    public function edit($resume_id,$id)
    {
        $job = Job::find($id);
        $resumes = Resume::orderBy('last_name','asc')->pluck('last_name','id');

        return view('admin.jobs.edit',compact('job','resumes','resume_id'));
    }

    public function update($resume_id, Request $request, $id)
    {        
        $job = job::find($id);
        $fields = $request->all();
        
        $v= Validator::make($request->all(),[
            'start' => 'required',
            'end' => '',
            'description' => 'required',
            'company' => 'required'
        ]);
        if($v && $v->fails()){
            return redirect()->back()->withInput()->withErrors($v->errors());
        }

        $fields['start'] = Carbon::parse($request->start)->format('Y-m-d');
        $fields['end'] = $request->end ? Carbon::parse($request->end)->format('Y-m-d'):null;

        $job->update($fields);

        Session::flash('flash_message', 'job updated');
        Session::flash('flash_message_type', 'success');

        return redirect('admin/resumes/'.$resume_id.'/jobs');
    }

    public function destroy($resume_id,$id)
    {
        $job = job::findOrFail($id);
        if ($job) {
            $job->delete();

            Session::flash('flash_message', '¡job deleted!');
            Session::flash('flash_message_type', 'success');
        } else {
            Session::flash('flash_message', 'job could not be deleted.');
            Session::flash('flash_message_type', 'warning');
        }
        return redirect('admin/resumes/'.$resume_id.'/jobs');
    }
}
