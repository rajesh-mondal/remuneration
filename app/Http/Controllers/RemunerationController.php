<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;
use App\Models\RemunerationCategory;
use App\Models\Descipline;
use App\Models\Designation;
use App\Models\Exam;
use App\Models\Remuneration;
use App\Models\RemunerationRate;
use App\Models\Teacher;
use App\Models\Type;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use niklasravnsborg\LaravelPdf\Facades\Pdf as FacadesPdf;
use PDF;
use Yajra\DataTables\Facades\DataTables;
use App\Notifications\FeedbackNotification;
use Illuminate\Support\Facades\Mail;
use App\Mail\PdfConfirmed;

class RemunerationController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Remuneration::latest()->get();
            return DataTables::of($data)
                ->addColumn('teacher', function ($data) {
                    if ($data->user) {
                        return $data->user['name'];
                    }
                })
                ->addColumn('discipline', function ($data) {
                    if ($data->discipline) {
                        return $data->discipline['name'];
                    }
                })
                ->addColumn('exam', function ($data) {
                    if ($data->exam) {
                        return $data->exam['year']['year'] . ' year - ' . $data->exam['term']['term'] . ' Term (Session: ' . $data->exam['session']['session'] . ')';
                    }
                })
                ->addColumn('action', function ($data) {
                    $button = '<a href="' . route('remuneration.edit', $data->id) . '" class="edit btn btn-primary">Edit</a>';
                    $button .= '&nbsp;&nbsp;&nbsp;<button type="button" name="edit" route="' . route('remuneration-rate.destroy', $data->id) . '" class="delete btn btn-danger">Delete</button>';
                    return $button;
                })
                ->rawColumns(['teacher', 'discipline', 'exam', 'action'])
                ->addIndexColumn()
                ->make(true);
        }

        $exams = Exam::all();
        if (Auth::user()->is_admin == 1) {
            $disciplines = Descipline::all();
        } else {

            $disciplines = Descipline::where('id', Auth::user()->descipline_id)->get();
        }
        $users = User::orderBy('name', 'ASC')->get();
        return view('remuneration.index', compact('exams', 'disciplines', 'users'));
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function newList(Request $request)
    {
        if ($request->ajax()) {
            $data = Remuneration::latest()->get();
            return DataTables::of($data)
                ->addColumn('teacher', function ($data) {
                    if ($data->user) {
                        return $data->user['name'];
                    }
                })
                ->addColumn('discipline', function ($data) {
                    if ($data->discipline) {
                        return $data->discipline['name'];
                    }
                })
                ->addColumn('exam', function ($data) {
                    if ($data->exam) {
                        return $data->exam['year']['year'] . ' year - ' . $data->exam['term']['term'] . ' Term (Session: ' . $data->exam['session']['session'] . ')';
                    }
                })
                ->addColumn('category', function ($data) {
                    if ($data->category) {
                        return $data->category['name'];
                    }
                })
                ->addColumn('rempaper', function ($data) {
                    if ($data->paper == 'helf') {
                        return "Half Paper";
                    } else {
                        return "Full Paper";
                    }
                })
                ->addColumn('amount', function ($data) {

                    if ($data->rate) {
                        if ($data->paper == 'half') {
                            $amount = $data->rate['amount'] / 2;
                        } else {
                            $amount = $data->rate['amount'];
                        }

                        if ($data->number && $data->students) {
                            $total = $amount * $data->number * $data->students;
                        } elseif ($data->number != null) {
                            $total = $amount * $data->number;
                        } elseif ($data->students != null) {
                            $total = $amount * $data->students;
                        }

                        return $total;
                    }
                })

                ->addColumn('status', function ($data) {
                    if ($data->status == 0) {
                        return "Pending";
                    } else {
                        return "Approved";
                    }
                })

                ->rawColumns(['teacher', 'discipline', 'exam', 'category', 'rempaper', 'amount', 'status'])
                ->addIndexColumn()
                ->make(true);
        }

        $exams = Exam::all();
        if (Auth::user()->is_admin == 1 || Auth::user()->role['name'] == 'Accountant') {
            $disciplines = Descipline::all();
        } else {
            $disciplines = Descipline::where('id', Auth::user()->descipline_id)->get();
        }
        $users = User::orderBy('name', 'ASC')->get();
        return view('remuneration.list', compact('exams', 'disciplines', 'users'));
    }


    //search result

    public function searchResult(Request $request)
    {
        $rems = Remuneration::where('exam_id', $request->exam_id)
            ->where('discipline_id', $request->discipline_id)
            ->where('user_id', $request->user_id)
            ->get();

        $exam = Exam::where('id', $request->exam_id)->first();
        $discipline = Descipline::where('id', $request->discipline_id)->first();
        $user = User::where('id', $request->user_id)->first();

        if (Auth::user()->role_id != '') {
            if (Auth::user()->role['name'] == 'Accountant') {
                return view('remuneration.result', compact('rems', 'exam', 'discipline', 'user'));
            }
        } else {
            return view('remuneration.show', compact('rems', 'exam', 'discipline', 'user'));
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = RemunerationCategory::all();
        if (Auth::user()->is_admin == 1) {
            $disciplines = Descipline::all();
        } else {

            $disciplines = Descipline::where('id', Auth::user()->descipline_id)->get();
        }
        $exams = Exam::all();
        $users = User::all();
        $designations = Designation::all();
        $types = Type::all();
        return view('remuneration.create', compact('categories', 'disciplines', 'exams', 'users', 'designations', 'types'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // return $request;
        // validation 
        $user = $request->teacher;
        $course = $request->course;
        $number = $request->number;
        $student = $request->student;
        $paper = $request->paper;

        if (!$request->teacher) {
            $notification = array('message' => 'Please inset all data', 'alert-type' => 'error');
            return redirect()->back()->with($notification);
        }


        for ($count = 0; $count < count($user); $count++) {
            $data = array(
                'discipline_id' => $request->discipline_id,
                'exam_id' => $request->exam_id,
                'category_id' => $request->category_id,
                'rate_id' => $request->rate_id,
                'type_id' => $request->type_id,
                'paper' => $paper[$count],
                'course_id' => $course[$count],
                'user_id' => $user[$count],
                'number' => $number[$count],
                'students' => $student[$count],
                "created_at" =>  \Carbon\Carbon::now(), # new \Datetime()
                "updated_at" => \Carbon\Carbon::now(),  # new \Datetime()

            );

            $insert_date[] = $data;
        }

        Remuneration::insert($insert_date);

        $notification = array('message' => 'Remuneration Addes', 'alert-type' => 'success');

        if ($request->save == 'save') {
            return redirect()->route('remuneration.index')->with($notification);
        } else if ($request->save_another == 'save_another') {
            return redirect()->route('remuneration.create')->with($notification);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categories = RemunerationCategory::all();
        if (Auth::user()->is_admin == 1) {
            $disciplines = Descipline::all();
            $users = User::all();
            $courses = Course::all();
        } else {
            $disciplines = Descipline::where('id', Auth::user()->descipline_id)->get();
            $users = User::where('descipline_id',  Auth::user()->descipline_id)->get();
            $courses = Course::where('descipline_id',  Auth::user()->descipline_id)->get();
        }
        $exams = Exam::all();

        $designations = Designation::all();
        $types = Type::all();


        $rem = Remuneration::findOrFail(intval($id));
        $rate = RemunerationRate::where('id', $rem->rate_id)->first();

        return view('remuneration.edit', compact('categories', 'disciplines', 'exams', 'users', 'courses', 'designations', 'types', 'rem', 'rate'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $rem = Remuneration::findOrFail(intval($id));

        $rem->discipline_id = $request->discipline_id;
        $rem->exam_id = $request->exam_id;
        $rem->category_id = $request->category_id;
        $rem->rate_id = $request->rate_id;
        $rem->type_id = $request->type_id;
        $rem->paper = $request->paper;
        $rem->course_id = $request->course_id;
        $rem->user_id = $request->user_id;
        $rem->number = $request->number;
        $rem->students = $request->student;

        $rem->save();

        return redirect()->route('remuneration.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // $rem = Remuneration::findOrFail(intval($id));
        // $rem->delete();

        // $notification = array('message' => 'Remuneration Deleted!', 'alert-type' => 'success');
        // return redirect()->back()->with($notification);
    }


    public function approve(Request $request)
    {
        $id = $request->id;

        for ($count = 0; $count < count($id); $count++) {
            $rem = Remuneration::where('id', $id[$count])->first();
            $rem->feedback = $request->feedback[$count];
            $rem->status = 1;
            $rem->save();

            if ($request->feedback[$count]) {
                $data = array(
                    'rem_id' => $id[$count],
                    'feedback' => $request->feedback[$count],
                );

                // 
                $users = User::where('role_id', 1)->where('descipline_id', $request->discipline)->get();

                foreach ($users as $user) {
                    $user->notify(new FeedbackNotification($data));
                }
            }
        }

        $user = User::where('id', $request->user)->first();

        $data = array(
            'name'      =>  $user->name,
            'email'     =>  $user->email,
        );

        Mail::to($user->email)->send(new PdfConfirmed($data));

        $notification = array('message' => 'Remuneration Addes', 'alert-type' => 'success');
        return redirect()->route('remuneration.newlist')->with($notification);
    }


    public function generatePdf(Request $request)
    {
        $rems = Remuneration::where('exam_id', $request->exam_id)
            ->where('discipline_id', $request->discipline_id)
            ->where('user_id', $request->user_id)
            ->get();

        $exam = Exam::where('id', $request->exam_id)->first();
        $discipline = Descipline::where('id', $request->discipline_id)->first();
        $user = User::where('id', $request->user_id)->first();
        $categories = RemunerationCategory::orderBy('id', 'ASC')->get();

        // $data = ([
        //     'rems' => $rems,
        //     'exam' => $exam,
        //     'discipline' => $discipline,
        //     'user' => $user,
        // ]);
        // return $data;

        // return view('remuneration.pdf', compact('rems', 'exam', 'discipline', 'user', 'categories'));

        $pdf = FacadesPdf::loadView('remuneration.pdf', compact('rems', 'exam', 'discipline', 'user', 'categories'));
        return $pdf->download($user->name . '-' . $exam->year['year'] . ' year -' . $exam->term['term'] . ' term -' . $exam->session['session'] . ' session.pdf');
    }


    public function myRem()
    {
        $exams = Exam::all();
        $disciplines = Descipline::where('id', Auth::user()->descipline_id)->get();
        return view('my_remuneration.index', compact('exams', 'disciplines'));
    }


    // flist pdf
    public function myRemResult(Request $request)
    {
        $rems = Remuneration::where('exam_id', $request->exam_id)
            ->where('discipline_id', $request->discipline_id)
            ->where('user_id', Auth::user()->id)
            ->get();

        $exam = Exam::where('id', $request->exam_id)->first();
        $discipline = Descipline::where('id', $request->discipline_id)->first();

        $user = User::where('id', Auth::user()->id)->first();

        return view('my_remuneration.result', compact('rems', 'exam', 'discipline', 'user'));
    }
}
