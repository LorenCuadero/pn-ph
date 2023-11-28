<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class SendEmailPayable extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     */

    public $student_name;

    public $month;

    public $year;

    public  $counterpartBalance;

    public $medicalShareBalance;

    public $total;

    public function __construct($student_name, $month, $year, $counterpartBalance, $medicalShareBalance, $total)
    {
        $this->student_name = $student_name;
        $this->month = $this->getMonthName($month);
        $this->year = $year;
        $this->counterpartBalance = $counterpartBalance;
        $this->medicalShareBalance = $medicalShareBalance;
        $this->total = $total;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: "Statement of Account for Parents' Counterpart Balances as of: {$this->month} {$this->year}"
        );
    }


    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'payable-email',
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

    private function getMonthName($month)
    {
        $months = [
            1 => 'January',
            2 => 'February',
            3 => 'March',
            4 => 'April',
            5 => 'May',
            6 => 'June',
            7 => 'July',
            8 => 'August',
            9 => 'September',
            10 => 'October',
            11 => 'November',
            12 => 'December',
        ];

        return $months[$month] ?? 'Unknown'; // Provide a default value for unknown months
    }
}
