<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Business\LeaveServices;
use Symfony\Component\HttpFoundation\JsonResponse;
class LeaveController extends Controller
{
    private LeaveServices $leaveServices;

    public function __construct()
    {
        $this->leaveServices = new LeaveServices();
    }

    public function index(Request $request)
    {
        $rs = $this->leaveServices->getLeaveRequest($request);
        return view('leave.index',[
            'current' => 'leave',
            'record' => $rs
        ]);
    }

    public function create(Request $request)
    {
        return view('leave.create',[
            'current' => 'leave',
            'action' => 'create'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request): JsonResponse
    {
        $output = $this->leaveServices->createLeave($request);
        return response()->json($output->response, $output->httpStatus);
    }

}
