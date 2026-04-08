<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use App\Models\EmailTemplate;
use App\Helpers\HTMLHelper;

class Otp extends Mailable
{
    use Queueable, SerializesModels;

    public $user;
    /**
     * Create a new message instance.
     */
    public function __construct($user)
    {
        $this->user = $user;
    }

    public function build()
    {
        $template = EmailTemplate::where('key', 'otp')
                                    ->status()
                                    ->with(['details' => function($q) {
                                        $q->where('lang_id', getLangId());
                                    }])
                                    ->firstOrFail();

        $detail = $template->details->first();

        $subject = HTMLHelper::renderBladeString($detail->subject, [
            'otp' => $this->user->otp ?? null
        ]);

        $body = HTMLHelper::renderBladeString($detail->body, [
            'email' => $this->user->email ?? null,
            'otp' => $this->user->otp ?? null
        ]);

        return $this->subject($subject)
                    ->view('mail.layout')
                    ->with([
                        'body' => $body
                    ]);
    }
}
