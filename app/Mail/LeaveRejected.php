<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class LeaveRejected extends Mailable
{
    use Queueable, SerializesModels;

    public $leave; // Define public property to hold leave request data

    /**
     * Create a new message instance.
     *
     * @param  array  $leave
     * @return void
     */
    public function __construct(array $leave)
    {
        $this->leave = $leave;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.leave.rejected')
                    ->subject('Leave Rejected');
    }
}
