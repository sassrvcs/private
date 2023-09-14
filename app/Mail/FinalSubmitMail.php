<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use Illuminate\Mail\Mailables\Attachment;



class FinalSubmitMail extends Mailable
{
    use Queueable, SerializesModels;
    private $name;
    private $pdf;
    private $order_id;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($content)
    {
        $this->name = $content['name'];
        $this->pdf = $content['pdf'];
        $this->order_id = $content['order_id'];
    }

    /**
     * Get the message envelope.
     *
     * @return \Illuminate\Mail\Mailables\Envelope
     */
    public function envelope()
    {
        return new Envelope(
            subject: 'Payment details from FormationsHunt',
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
            view: 'frontend.mail.FirstOrderCheckout',
            with: [
                'name' => $this->name,
                'order_id' => $this->order_id,
            ],
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array
     */
    public function attachments()
    {
        return [Attachment::fromPath($this->pdf)
        ->as('Invoice.pdf')
        ->withMime('application/pdf'),];
    }
}
