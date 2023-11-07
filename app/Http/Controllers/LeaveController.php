<?php

namespace App\Http\Controllers;

use App\Business\AuthServices;
use App\Models\Leave;
use Illuminate\Http\Request;
use App\Business\LeaveServices;
use App\Helpers\Helper;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
class LeaveController extends Controller
{
    private LeaveServices $leaveServices;

    public function __construct()
    {
        $this->leaveServices = new LeaveServices();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(Request $request)
    {
        if(Helper::isUser()){
            return response()->json([
                'status' => 'error',
                'code' => Response::HTTP_FORBIDDEN . '_leave',
            ], Response::HTTP_FORBIDDEN);
        }else{
            $output = $this->leaveServices->getLeaveRequest($request);
            return response()->json($output->response, $output->httpStatus);
        }
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function leave(Request $request): JsonResponse
    {
        $output = $this->leaveServices->getLeaveRequest($request);
        return response()->json($output->response, $output->httpStatus);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request): JsonResponse
    {
        $output = $this->leaveServices->createLeave($request);
        return response()->json($output->response, $output->httpStatus);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Leave  $leave
     * @return \Illuminate\Http\Response
     */
    public function show(Leave $leave)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Leave  $leave
     * @return \Illuminate\Http\Response
     */
    public function edit(Leave $leave)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Leave  $leave
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Leave $leave)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Leave  $leave
     * @return \Illuminate\Http\Response
     */
    public function destroy(Leave $leave)
    {
        //
    }
}
