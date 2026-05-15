<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ContactMessageMail extends Mailable
{
    use Queueable, SerializesModels;

    public $data;
    public $details;
    public $subject;

    public function __construct($details, $subject)
    {
        $this->details = $details;
        $this->subject = $subject;
    }

    /**
     * Get the message envelope (Sujet du mail).
     */
    public function envelope(): Envelope
    {
        return new Envelope(subject: $this->subject);
    }

    /**
     * Get the message content definition (Le fichier de design).
     */
    public function content(): Content
    {
        return new Content(view: 'emails.notification');
    }
}
