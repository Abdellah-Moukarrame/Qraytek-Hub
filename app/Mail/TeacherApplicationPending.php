<?php

namespace App\Mail;

use App\Models\Personnes;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class TeacherApplicationPending extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct(public Personnes $teacher) {}

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Your Application to Qraytek Hub is Under Review',
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'emails.teacher-pending',
        );
    }
}
