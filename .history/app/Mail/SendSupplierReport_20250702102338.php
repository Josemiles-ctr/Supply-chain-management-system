<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class SendSupplierReport extends Mailable
{
    use Queueable, SerializesModels;
    public $supplier;

    /**
     * Create a new message instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Supplier\'s Weekly Report',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            markdown: 'emails.reports.supplier_report',
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        // You can include file attachments here.
        // Example: Attach a file from storage
        // use Illuminate\Mail\Mailables\Attachment;
        // return [
        //     Attachment::fromPath(storage_path('app/reports/supplier_report.pdf'))
        //         ->as('SupplierReport.pdf')
        //         ->withMime('application/pdf'),
        // ];

        return [];
    }
}