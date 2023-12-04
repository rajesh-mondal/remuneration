<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\RemunerationCategory;
use App\Models\RemunerationRate;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DropdownController extends Controller
{
    public function course()
    {
        if (Auth::user()->is_admin) {
            $courses = Course::orderBy('course', 'ASC')->get();
        } else {
            $courses = Course::orderBy('course', 'ASC')->where('descipline_id', Auth::user()->descipline_id)->get();
        }

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
        if (Auth::user()->is_admin) {
            $users = User::orderBy('name', 'ASC')->get();
        }else{
            $users = User::orderBy('name', 'ASC')->where('descipline_id', Auth::user()->descipline_id)->get();
        }

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

            $data .= '<option value="' . $rate->id . '">' . $rate->title . '-' . $rate->amount . '</option>';
        }

        return response()->json([
            'data' => $data,
        ]);
    }
}
