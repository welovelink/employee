<?php

namespace App\Business;

use App\Models\User;
use App\Models\Employee;
use App\Models\Leave;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Helpers\Helper;
use App\Events\LeaveApproved;
class ApproveServices
{
    public function __construct()
    {

    }

    public function getApproveList(Request $request): object
    {
        $user      = User::find(auth()->id())->with('employee')->first();
        $commander = $user->employee->id;
        $leaves    = Leave::where('commander', $commander)->with('user')->get()->map(function ($row) {
            $row->requested = $row->user->name;
            $row->count     = Helper::dateDiff($row->start_date, $row->end_date);
            unset($row->user);
            return $row;
        });

        return (object)$leaves;
    }

    public function approveLeave(Request $request): object
    {
        $id = $request->post('id');
        $employee            = Employee::find(auth()->id())->first();
        $leave = Leave::where('id', $id)->first();
        $leave->leave_status = $request->post('leave_status');
        $leave->approved_at   = now();
        $leave->approved_by   = auth()->id();
        $leave->updated_at   = now();
        $leave->save();

        event(new LeaveApproved($leave->id));
        $commander = User::find($employee->line_manager)->first();
        return (object)[
            'response'   => [
                'status' => 'ok'
            ],
            'httpStatus' => Response::HTTP_OK,
        ];
    }
}
