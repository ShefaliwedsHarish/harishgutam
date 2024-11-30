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
    public $email;

    /**
     * Create a new message instance.
     */
    public function __construct($url,$email)
    {
        $this->url = $url;
        $this->email=$email; 
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
        ->to($this->email) // Ensure $recipientEmail contains a valid email address
        ->html('<h1>Wellcome to HS Group</h1>
                <p>Click Button to reset the password.</p> 
               <a href="' . $this->url . '"> <button>Reset Password </button> </a>');
    
      
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
