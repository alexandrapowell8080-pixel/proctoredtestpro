<?php

namespace App\Mail;

use App\Models\Quote;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class NewQuoteRequestMail extends Mailable
{
    use Queueable, SerializesModels;

    public Quote $quote;

    public function __construct(Quote $quote)
    {
        $this->quote = $quote;
    }

    public function build()
    {
        $email = $this
            ->subject('New Quote Request - '.($this->quote->subject ?? 'Website Form'))
            ->view('emails.quote-request');

        if ($this->quote->attachment_path) {
            $email->attach(storage_path('app/public/'.$this->quote->attachment_path), [
                'as' => $this->quote->attachment_original_name,
            ]);
        }

        return $email;
    }
}
