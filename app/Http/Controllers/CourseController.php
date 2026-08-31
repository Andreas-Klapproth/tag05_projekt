<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function index()
    {
        $courses = Course::where('id', '>', 2)
            ->orWhere('id', 1)
            ->get();

        return view('courses.index', compact('courses')); // kurzschreibweise für ['courses' => $courses]
    }

    public function create()
    {
        return view('courses.create');
    }

    public function join()
    {
        return view('courses.join');
    }


    public function store(Request $request)
    {

        $validated = $request->validate([
            'name' => ['required', 'min:3'],
            'description' => ['required', 'min:3'],
            'date' => ['required', 'date', 'after_or_equal:today'],
            'max_participants' => ['required', 'integer', 'min:1', 'max:10'],
        ]);


        $course = Course::create($validated);

        return redirect()->route('courses.created', $course);
    }

    public function show(Course $course)
    {
        return view('courses.show', compact('course'));
    }

    public function created(Course $course)
    {
        return view('courses.confirm', compact('course')); // kurzschreibweise für  ['courses' => $courses]
    }

    public function confirmJoin(Course $course)
    {

    }

    public function processJoin(Course $course)
    {

    }

    public function joined(Course $course)
    {

    }
}
