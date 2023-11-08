<?php

namespace App\Business;

use App\Models\User;
use App\Models\Employee;
use App\Models\Leave;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Symfony\Component\HttpFoundation\Response;
use App\Helpers\Helper;
use Illuminate\Support\Facades\Auth;
use App\Events\LeaveCreated;

class LeaveServices
{
    public function __construct()
    {

    }

    public function getLeaveRequest(Request $request): object
    {
        $leaves = Leave::where('created_by', auth()->id())->with('user')->
        with('commandant')->get()->map(function ($row) {
            $row->created   = $row->user->name;
            $row->commander = $row->commandant->code;
            $row->count     = Helper::dateDiff($row->start_date, $row->end_date);
            unset($row->user);
            unset($row->commandant);
            return $row;
        });

        return (object)$leaves;
    }

    public function getMyLeave(Request $request): object
    {
        return (object)[
            'response'   => [
                'status' => 'ok',
            ],
            'httpStatus' => Response::HTTP_OK,
        ];
    }

    public function createLeave(Request $request): object
    {
        $employee            = Employee::where("uid" , auth()->id())->first();
        $leave               = new Leave();
        $leave->leave_type   = $request->post('leave_type');
        $leave->leave_cause  = $request->post('leave_cause');
        $leave->start_date   = Helper::convertDate($request->post('start_date'));
        $leave->end_date     = Helper::convertDate($request->post('end_date'));
        $leave->created_by   = $employee->id;
        $leave->commander    = $employee->line_manager;
        $leave->leave_status = 'requested';
        $leave->created_at   = now();
        $leave->save();
        event(new LeaveCreated($leave->id));
        return (object)[
            'response'   => [
                'status' => 'ok',
            ],
            'httpStatus' => Response::HTTP_OK,
        ];
    }
}
