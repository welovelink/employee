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

class LeaveServices
{
    public function __construct()
    {

    }

    public function getLeaveRequest(Request $request): object
    {
        /*$user = User::with('employee')->paginate(50)->through(function($product){
            $product->category_name = $product->category->name;
            unset($product->category);
            return $product;
        });*/
        return (object)[
            'response' => [
                'status' => 'ok',
                'employee' => User::find(auth()->id())->employee
            ],
            'httpStatus' => Response::HTTP_OK
        ];
    }

    public function getMyLeave(Request $request): object
    {
        return (object)[
            'response' => [
                'status' => 'ok',],
            'httpStatus' => Response::HTTP_OK
        ];
    }

    public function createLeave(Request $request): object
    {
        $employee = Employee::find(auth()->id())->first();
        $leave = new Leave();
        $leave->leave_type = $request->post('leave_type');
        $leave->leave_cause = $request->post('leave_cause');
        $leave->start_date = $request->post('start_date');
        $leave->end_date = $request->post('end_date');
        $leave->created_by = $employee->id;
        $leave->commander = $employee->line_manager;
        $leave->leave_status = 'requested';
        $leave->created_at = now();

        return (object)[
            'response' => [
                'status' => 'ok',
                'commander' => User::find($employee->line_manager)->first()->email,
                'leave' => $leave,
                'employee' => $employee,
            ],
            'httpStatus' => Response::HTTP_OK
        ];
    }
}
