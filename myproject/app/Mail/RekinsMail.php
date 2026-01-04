<?php

namespace App\Mail;

use App\Models\Pasutijums;
use Illuminate\Mail\Mailable;
use Barryvdh\DomPDF\Facade\Pdf;

class RekinsMail extends Mailable
{
    public function __construct(public Pasutijums $pasutijums) {}

    public function build()
    {
        $pdf = Pdf::loadView('pdf.rekins', [
            'pasutijums' => $this->pasutijums
        ]);

        return $this->subject('Rēķins par pasūtījumu #' . $this->pasutijums->id)
            ->view('emails.rekins')
            ->attachData(
                $pdf->output(),
                'rekins_' . $this->pasutijums->id . '.pdf',
                ['mime' => 'application/pdf']
            );
    }
}
