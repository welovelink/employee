<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Helpers\Helper;
class ApprovedLeaveNotifyJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    private $leaveId;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($leaveId)
    {
        $this->leaveId = $leaveId;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $leaveInfo = Helper::getLeaveInfo($this->leaveId);
        $subject = "การลาของคุณได้รับการอนุมัติ";
        $message = $leaveInfo->commanderName . " ได้ทำการขออนุมํติการลา";
        if($leaveInfo->leave_status === 'reject'){
            $subject = "การลาของคุณไม่ได้รับการอนุมัติ";
            $message = $leaveInfo->commanderName . " ไม่อนุมํติการลาของคุณ";
        }
        Helper::EmailSend([
            'name' => $leaveInfo->createdName,
            'email' => $leaveInfo->createdEmail,
            'subject' => $subject,
            'message' => $message,
        ]);
    }
}
