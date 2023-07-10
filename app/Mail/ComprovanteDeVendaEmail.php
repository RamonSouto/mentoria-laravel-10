<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ComprovanteDeVendaEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $emailData;
    public function __construct($emailData)
    {
        $this->emailData = $emailData;
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Comprovante de Venda',
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'email.comprovante_venda',
        );
    }

    public function attachments(): array
    {
        return [];
    }
}
