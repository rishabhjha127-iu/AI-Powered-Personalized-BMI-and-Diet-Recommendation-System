<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class BmiReportMail extends Mailable
{
    use Queueable, SerializesModels;

    public $pdfPath;
    public $name;

    public function __construct($name, $pdfPath)
    {
        $this->name = $name;
        $this->pdfPath = $pdfPath;
    }

    public function build()
    {
        return $this->subject('Your Personalized BMI & Health Report')
            ->markdown('emails.bmi_report')
            ->attach(storage_path('app/public/' . $this->pdfPath), [
                'as' => 'BMI_Report.pdf',
                'mime' => 'application/pdf',
            ]);
    }
}
