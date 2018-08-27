<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ResetPasswordMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    protected $event;
    public function __construct($event)
    {
        $this->event = $event;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
      return $this->from('support@asvicode.com', 'Asvicode Team')
          ->subject('Laundry Reset Password')
          ->view('emails.reset-password-member')
          ->with([
              'actionUrl' => $this->event['actionUrl'],
              'data' => $this->event['data']
          ]);
    }
}
