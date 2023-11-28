<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class SendPersonalCATransInfo extends Mailable
{
    use Queueable, SerializesModels;

    public $student_name;
    public $purpose;
    public $amount_due;
    public $amount_paid;
    public $date;

    public function __construct($student_name, $purpose, $amount_due, $amount_paid, $date)
    {
        $this->student_name = $student_name;
        $this->purpose = $purpose;
        $this->amount_due = $amount_due;
        $this->amount_paid = $amount_paid;
        $this->date = $date;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'PNPHI: Personal Cash Advance Transaction Information',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'personal-ca',
        );
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