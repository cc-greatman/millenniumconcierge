<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class AllHotelTripsPDF extends Mailable
{
    use Queueable, SerializesModels;

    public $pdfContent;
    /**
     * Create a new message instance.
     */
    public function __construct($pdfContent) {

        $this->pdfContent = $pdfContent;
    }

    public function build() {

        return $this->subject('All Hotel Trips PDF')
                    ->view('emails.allHotelTripsPdf')
                    ->attachData($this->pdfContent, 'allHotelTrips.pdf', [
                        'mime' => 'application/pdf',
                    ]);
    }
}
