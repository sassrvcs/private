<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ServicePurchaseMail extends Mailable
{
    use Queueable, SerializesModels;
    private $serviceDetails;
    private $userDetails;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($serviceDetails,$userDetails)
    {
        $this->serviceDetails = $serviceDetails;
        $this->userDetails = $userDetails;
    }

    /**
     * Get the message envelope.
     *
     * @return \Illuminate\Mail\Mailables\Envelope
     */
    public function envelope()
    {
        return new Envelope(
            subject: 'Service Purchase Confirmation!',
        );
    }

    /**
     * Get the message content definition.
     *
     * @return \Illuminate\Mail\Mailables\Content
     */
    public function content()
    {
        return new Content(
            view: 'frontend.mail.ServicePurchaseMail',
            with: [
                'serviceDetails' => $this->serviceDetails,
                'userDetails' => $this->userDetails,
                'logo'=>public_path('frontend/assets/images/logo_custom.png')
            ]
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array
     */
    public function attachments()
    {
        return [];
    }
}
