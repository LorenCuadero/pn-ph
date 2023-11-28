<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Markdown;
use Illuminate\Queue\SerializesModels;

class SendCustomizedEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $subject;
    public $salutation;
    public $selectedBatchYear;
    public $message_content;
    public $conclusion_salutation;
    public $sender;
    public $student_id;
    public $attachmentPath;
    public $realFileName;
    public $fileType;

    public function __construct($subject, $salutation, $selectedBatchYear, $message_content, $conclusion_salutation, $sender, $student_id, $attachmentPath, $realFileName, $fileType)
    {
        $this->subject = $subject;
        $this->salutation = $salutation;
        $this->selectedBatchYear = $selectedBatchYear;
        $this->message_content = $message_content;
        $this->conclusion_salutation = $conclusion_salutation;
        $this->sender = $sender;
        $this->student_id = $student_id;
        $this->attachmentPath = $attachmentPath;
        $this->realFileName = $realFileName;
        $this->fileType = $fileType;
    }

    public function build()
    {
        $markdown = new Markdown(view(), config('mail.markdown'));
    
        $message = $this
            ->subject($this->subject)
            ->markdown('send-customized-email');
    
        if ($this->attachmentPath && $this->realFileName && $this->fileType) {
            $attachmentPath = storage_path('app/public/' . $this->attachmentPath);
    
            $message->attach($attachmentPath, [
                'as' => $this->realFileName,
                'mime' => $this->fileType,
            ]);
        }
    
        return $message;
    }
}
