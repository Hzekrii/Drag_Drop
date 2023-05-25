<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Lesson;
use App\Models\Section;
class LessonController extends Controller
{
    public function index()
{
    $lessons = Lesson::orderBy('position')->get()->groupBy('section_id');
    $sections = Section::orderBy('position')->get();
    
    return view('index', ['lessons' => $lessons, 'sections' => $sections]);
}


    public function store(Request $request)
    {
        $lessonName = $request->input('lessonName');
        $sectionId = $request->input('sectionId');
        $position = $request->input('position');

        // Create a new lesson
        $lesson = new Lesson();
        $lesson->name = $lessonName;
        $lesson->section_id = $sectionId; // Assuming the column name in the lessons table is 'section_id'
        $lesson->position=$position;
        $lesson->save();

        // Return a success response
        return response()->json(['lessonId' => $lesson->id]);
    }
    public function update(Request $request, Lesson $lesson)
    {
        $lesson->name = $request->input('name');
        $lesson->save();
    
        return response()->json(['message' => 'Lesson updated successfully']);
    }
    public function updatePosition(Request $request)
    {
        $lessonPositions = $request->all();
        // return response()->json(['message' => $lessonPositions[0]['lessonId']]);
        
        // Loop through the received lessonPositions
        
        foreach ($lessonPositions as $lessonPosition) {
            $lesson = Lesson::findOrFail($lessonPosition['lessonId']);
            // dd($lesson->id);

            $lesson->position = $lessonPosition['position'];
            $lesson->section_id = $lessonPosition['sectionId'];
            $lesson->save();
        }

        return response()->json(['message' => 'Lesson positions updated hssd successfully']);
  
    }

}
