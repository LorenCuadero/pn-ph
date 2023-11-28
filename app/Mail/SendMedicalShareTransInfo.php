<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class SendMedicalShareTransInfo extends Mailable
{
    use Queueable, SerializesModels;

    public $student_name;
    public $medical_concern;
    public $total_cost;
    public $percent_share_as_amount_due;
    public $amount_paid;
    public $date;

    public function __construct($student_name, $medical_concern, $total_cost, $percent_share_as_amount_due, $amount_paid, $date)
    {
        $this->student_name = $student_name;
        $this->medical_concern = $medical_concern;
        $this->total_cost = $total_cost;
        $this->percent_share_as_amount_due = $percent_share_as_amount_due;
        $this->amount_paid = $amount_paid;
        $this->date = $date;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'PNPHI: Medical Share Transaction Information',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'medical-share',
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