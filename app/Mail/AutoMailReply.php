<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class AutoMailReply extends Mailable
{
    use Queueable, SerializesModels;

    public $replyDetails;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($replyDetails)
    {
        //
        $this->replyDetails = $replyDetails;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Your account alreadly to use.')->view('emails.AutoMailReplay');
    }
}
