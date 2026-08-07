<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContactMessage extends Mailable
{
    use Queueable, SerializesModels;

    public string $senderName;
    public string $senderEmail;
    public string $messageBody;

    /**
     * Create a new message instance.
     */
    public function __construct(string $senderName, string $senderEmail, string $messageBody)
    {
        $this->senderName = $senderName;
        $this->senderEmail = $senderEmail;
        $this->messageBody = $messageBody;
    }

    /**
     * Build the message.
     */
    public function build()
    {
        return $this->subject('Nouveau message depuis le portfolio - ' . $this->senderName)
            ->replyTo($this->senderEmail, $this->senderName)
            ->view('emails.contact');
    }
}
