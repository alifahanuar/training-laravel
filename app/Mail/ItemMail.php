<?php

namespace App\Mail;

use App\Models\Item;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ItemMail extends Mailable
{
    use Queueable, SerializesModels;

    public $item;

    /**
     * Create a new message instance.
     */
    public function __construct(Item $item) //set sbb nak item yang kita dpt daripada item control dgn item dari public
    {
        $this->item = $item;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Tugasan Baru' . $this->item->user->name,
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            markdown: 'emails.item',
            with: [
                'data' => $this->item, //ke template email n nak paparkan email yang kita nak
            ]
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
