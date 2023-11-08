<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Business\ApproveServices;
use Symfony\Component\HttpFoundation\JsonResponse;
class ApproveController extends Controller
{
    private ApproveServices $approveServices;

    public function __construct()
    {
        $this->approveServices = new ApproveServices();
    }

    public function index(Request $request)
    {
        $rs = $this->approveServices->getApproveList($request);
        return view('approve.index',[
            'current' => 'approve',
            'record' => $rs
        ]);
    }

    public function store(Request $request): JsonResponse
    {
        $output = $this->approveServices->approveLeave($request);
        return response()->json($output->response, $output->httpStatus);
    }

}
