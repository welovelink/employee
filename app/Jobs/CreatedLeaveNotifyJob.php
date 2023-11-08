<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Helpers\Helper;

class CreatedLeaveNotifyJob implements ShouldQueue
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
        Helper::EmailSend([
            'name' => $leaveInfo->commanderName,
            'email' => $leaveInfo->commanderEmail,
            'subject' => $leaveInfo->createdName . ' ได้ทำการขออนุมํติการลา',
            'message' => "ประเภทการลา " . $leaveInfo->leave_type . " ระหว่างวันที่ " . $leaveInfo->start_date . "ถึง " . $leaveInfo->end_date,
        ]);
    }
}
