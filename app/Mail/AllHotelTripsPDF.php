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
    public $user;
    
    /**
     * Create a new message instance.
     */
    public function __construct($pdfContent, $user) {

        $this->pdfContent = $pdfContent;
        $this->user = $user;
    }

    public function build() {

        return $this->subject('All Hotel Trips PDF')
                    ->with([
                        'name' => $this->user->first_name, // Pass first name to the email view
                    ])
                    ->view('emails.allHotelTripsPdf')
                    ->attachData($this->pdfContent, 'allHotelTrips.pdf', [
                        'mime' => 'application/pdf',
                    ]);
    }
}
