<?php

namespace App\Mail;

use Illuminate\Mail\Mailable;

class RescheduleMail extends Mailable
{
    public $startTime;
    public $endTime;
    public $rescheduleId;
    public $status;

    public function __construct($startTime, $endTime, $rescheduleId, $status)
    {
        $this->startTime = $startTime;
        $this->endTime = $endTime;
        $this->rescheduleId = $rescheduleId;
        $this->status = $status;
    }

    public function build()
    {
        return $this->view('emails.reschedule')
            ->with([
                'startTime' => $this->startTime,
                'endTime' => $this->endTime,
                'rescheduleId' => $this->rescheduleId,
                'status' => $this->status,
            ]);
    }
}
