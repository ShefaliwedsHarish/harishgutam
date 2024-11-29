<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ForgotPasswordEmail extends Mailable
{
    use Queueable, SerializesModels;
    public $url; 

    /**
     * Create a new message instance.
     */
    public function __construct($url)
    {
        $this->url = $url;
        //
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Forgot Password Email test',
        );
    }

    /**
     * Get the message content definition.
     */
  
        public function build()
    {
        return $this
        ->to($this->url)
        ->html('<h1>Hello, this is a test</h1><p>This is a test email. Click <a href="' . $this->url . '">here</a> to reset your password.</p>');
    }


    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}
