<?php

namespace App\Http\Controllers;
use App\Models\Progress;
use Illuminate\Support\Facades\DB;

use App\Http\Requests\ProgressRequest;

class ProgressController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $porgresses = DB::table('progress as p')
            ->leftJoin('wp_posts as c', 'p.course_id', '=', 'c.ID')
            ->leftJoin('wp_users as i', 'p.instructor_id', '=', 'i.ID')
            ->leftJoin('wp_users as s', 'p.student_id', '=', 's.ID')
            ->select(
                'p.id',
                'p.course_id',
                'c.post_title as course_name',
                'p.instructor_id',
                'i.display_name as instructor_name',
                'p.student_id',
                's.display_name as student_name',
                'p.progress',
                'p.bought_at',
                'p.finished_at',
                'p.notes'
            )
            ->get();
        return view("progresses.index", ['progresses' => $porgresses]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $courses = DB::table('wp_posts')
            ->where('post_type', 'product')
            ->where('post_status', 'publish')
            ->select('ID', 'post_title')
            ->get();
        $users = DB::table('wp_users')->select('ID', 'display_name')->get();
        return view('progresses.create', compact('courses','users'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProgressRequest $request)
    {
        $progress = new Progress();
        $progress->course_id = $request->course_id;
        $progress->instructor_id = $request->instructor_id;
        $progress->student_id = $request->student_id;
        $progress->progress = $request->progress;
        $progress->notes = $request->notes;
        $progress->save();

        return back()->with('success','تم الإدخال بنجاح');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $progress = DB::table('progress as p')
            ->leftJoin('wp_posts as c', 'p.course_id', '=', 'c.ID')
            ->leftJoin('wp_users as i', 'p.instructor_id', '=', 'i.ID')
            ->leftJoin('wp_users as s', 'p.student_id', '=', 's.ID')
            ->where('p.id', $id)
            ->select(
                'p.id',
                'p.course_id',
                'c.post_title as course_name',
                'p.instructor_id',
                'i.display_name as instructor_name',
                'p.student_id',
                's.display_name as student_name',
                'p.progress',
                'p.bought_at',
                'p.finished_at',
                'p.notes'
            )
            ->first();
        return view('progresses.show', compact('progress'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $courses = DB::table('wp_posts')
            ->where('post_type', 'product')
            ->where('post_status', 'publish')
            ->select('ID', 'post_title')
            ->get();
        $users = DB::table('wp_users')->select('ID', 'display_name')->get();
        $progress = DB::table('progress as p')
            ->leftJoin('wp_posts as c', 'p.course_id', '=', 'c.ID')
            ->leftJoin('wp_users as i', 'p.instructor_id', '=', 'i.ID')
            ->leftJoin('wp_users as s', 'p.student_id', '=', 's.ID')
            ->where('p.id', $id)
            ->select(
                'p.id',
                'p.course_id',
                'c.post_title as course_name',
                'p.instructor_id',
                'i.display_name as instructor_name',
                'p.student_id',
                's.display_name as student_name',
                'p.progress',
                'p.bought_at',
                'p.finished_at',
                'p.notes'
            )
            ->first();
        return view('progresses.edit', compact('progress', 'users', 'courses'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProgressRequest $request, string $id)
    {
        $progress = Progress::find($id);
        $progress->course_id = $request->course_id;
        $progress->instructor_id = $request->instructor_id;
        $progress->student_id = $request->student_id;
        $progress->progress = $request->progress;
        $progress->notes = $request->notes;
        $progress->save();

        return back()->with('success','تم التعديل بنجاح');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Progress::destroy($id);
        return redirect()->route('progresses.index')->with('success','تم حذف المعاملة بنجاح');
    }
}
