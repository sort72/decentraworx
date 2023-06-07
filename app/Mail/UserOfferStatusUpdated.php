<?php

namespace App\Mail;

use App\Models\UserOffer;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class UserOfferStatusUpdated extends Mailable
{
    use Queueable, SerializesModels;

    public UserOffer $userOffer;
    public $status_name = [
        'approved' => 'aceptada',
        'rejected' => 'rechazada',
    ];

    /**
     * Create a new message instance.
     */
    public function __construct(UserOffer $userOffer)
    {
        $this->userOffer = $userOffer;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Tu solicitud a la oferta ' . $this->userOffer->name . ' ha sido ' . $this->status_name[$this->userOffer->status],
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            markdown: 'mail.user-offer-status-updated',
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
