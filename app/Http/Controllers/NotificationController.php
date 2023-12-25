<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Facades\DataTables;

class NotificationController extends Controller
{
    public function index(Request $request)
    {

        if ($request->ajax()) {
            $data = Auth::user()->notifications;
            return DataTables::of($data)
                ->addColumn('status', function ($data) {
                    if ($data->read_at == null) {
                        return "Unread";
                    } else {
                        return "Read";
                    }
                })
                ->addColumn('action', function ($data) {
                    $button = '<a href="' . route('notification.show', $data->id) . '" class="edit btn btn-primary">View</a>';

                    return $button;
                })
                ->rawColumns(['status', 'action'])
                ->addIndexColumn()
                ->make(true);
        }

        return view('notification.index');
    }

    public function show($id)
    {
        $notification = Auth::user()->notifications->where('id', $id)->first();
        $notification->markAsRead();

        if ($notification->data['role'] == 'feedback') {
            return redirect()->route('remuneration.edit', $notification->data['data']['rem_id']);
        }
    }
}
