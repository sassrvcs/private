<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Attachment;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class CompanyEditAdmin extends Mailable
{
    use Queueable, SerializesModels;
    protected $cart_items;
    protected $purchase_address;
    protected $pdf;
    protected $direct_submit;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($cart_items,$purchase_address,$pdf,$direct_submit)
    {
        $this->cart_items = $cart_items;
        $this->purchase_address = $purchase_address;
        $this->pdf = $pdf;
        $this->direct_submit = $direct_submit;

    }

    /**
     * Get the message envelope.
     *
     * @return \Illuminate\Mail\Mailables\Envelope
     */
    public function envelope()
    {
        return new Envelope(
            subject: 'Company Edit Notification',
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
            view: 'frontend.mail.editCompanyMailToAdmin',
            with: [
                'cart_items' => $this->cart_items,
                'purchase_address' => $this->purchase_address,
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
        if($this->direct_submit!=1){
            return [Attachment::fromPath($this->pdf)
            ->as('Invoice.pdf')
            ->withMime('application/pdf'),];
        }
    }
}
