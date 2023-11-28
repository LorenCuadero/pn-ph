<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class SendClosingOfAccountsEmail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     */

    public $student_name;
    public $graduation_date;
    public $counterpartBalance;
    public $medicalShareBalance;
    public $personalShareBalance;
    public $graduationFeeBalance;

    public function __construct($student_name, $graduation_date, $counterpartBalance, $medicalShareBalance, $personalShareBalance, $graduationFeeBalance)
    {
        $this->student_name = $student_name;
        $this->graduation_date = $graduation_date;
        $this->counterpartBalance = $counterpartBalance;
        $this->medicalShareBalance = $medicalShareBalance;
        $this->personalShareBalance = $personalShareBalance;
        $this->graduationFeeBalance = $graduationFeeBalance;
    }


    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: "Statement of Account for Parents' Counterpart Balances for Graduating Alumni"
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'send-coa-email',
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
