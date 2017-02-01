<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Collection;

class BirthdayNotification extends Mailable
{
    use Queueable, SerializesModels;

    public $birthdayPeople;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Collection $birthdayPeople)
    {
        $this->birthdayPeople = $birthdayPeople;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('admin@example.com')
                    ->view('emails.birthday');
    }
}
