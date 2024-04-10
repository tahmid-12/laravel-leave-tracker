<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class LeaveApproved extends Mailable
{
    use Queueable, SerializesModels;

    public $leave;

    public function __construct($leave)
    {
        $this->leave = $leave;
    }

    public function build()
    {
        return $this->markdown('emails.leave.approved')
                    ->with([
                        'leave' => $this->leave,
                    ]);
    }
}
