<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class PembayaranRegistrasiMail extends Mailable
{
    use Queueable, SerializesModels;

    public $nama;
    public $nomorRegistrasi;
    public $tanggalVerifikasi;
    public $status;
    public function __construct($nama, $nomorRegistrasi, $tanggalVerifikasi, $status)
    {
        $this->nama = $nama;
        $this->nomorRegistrasi = $nomorRegistrasi;
        $this->tanggalVerifikasi = $tanggalVerifikasi;
        $this->status = $status;
    }


    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Pembayaran Registrasi Mail',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'email.pembayaran-registrasi',
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
