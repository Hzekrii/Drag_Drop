<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Section;
class SectionController extends Controller
{
    public function store(Request $request)
    {
        $sectionName = $request->input('sectionName');
        $position = $request->input('position');
        // Create a new section
        $section = new Section();
        $section->name = $sectionName;
        $section->position=$position;
        $section->save();
        // Return the generated section ID
        return response()->json(['sectionId' => $section->id]);
    }
    public function update(Request $request, Section $section)
{
    $section->name = $request->input('name');
    $section->save();

    return response()->json(['message' => 'Section updated successfully']);
}
    public function updatePosition(Request $request)
{
        $sectionPositions = $request->all();
        // Loop through the received sectionPositions
        foreach ($sectionPositions as $sectionPosition) {
            $section = Section::findOrFail($sectionPosition['sectionId']);
            $section->position = $sectionPosition['position'];
            $section->save();
        }

        return response()->json(['message' => 'Section positions updated successfully']);
   
}
}
