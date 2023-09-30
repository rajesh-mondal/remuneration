<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\RemunerationCategory;
use App\Models\RemunerationRate;
use App\Models\User;
use Illuminate\Http\Request;

class DropdownController extends Controller
{
    public function course()
    {
        $courses = Course::orderBy('course', 'ASC')->get();

        $data = '';

        foreach ($courses as $course) {

            $data .= '<option value="' . $course->id . '">' . $course->course . '</option>';
        }

        return response()->json([
            'data' => $data,
        ]);
    }

    public function teacher()
    {
        $users = User::orderBy('name', 'ASC')->get();

        $data = '';

        foreach ($users as $user) {

            $data .= '<option value="' . $user->id . '">' . $user->name . '</option>';
        }

        return response()->json([
            'data' => $data,
        ]);
    }


    public function rate($id)
    {
        $category = RemunerationCategory::findOrFail(intval($id));

        $rates = RemunerationRate::where('category_id', $category->id)->get();

        $data = '<option value="" selected="" disabled> -- select remuneration rate --</option>';;

        foreach ($rates as $rate) {

            $data .= '<option value="' . $rate->id . '">' . $rate->title . '-'. $rate->amount .'</option>';
        }

        return response()->json([
            'data' => $data,
        ]);
    }
}
