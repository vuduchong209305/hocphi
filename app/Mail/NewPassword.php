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

class NewPassword extends Mailable
{
    use Queueable, SerializesModels;

    public $user, $password;
    /**
     * Create a new message instance.
     */
    public function __construct($user, $password)
    {
        $this->user = $user;
        $this->password = $password;
    }

    public function build()
    {
        $template = EmailTemplate::where('key', 'new_password')
                                    ->status()
                                    ->with(['details' => function($q) {
                                        $q->where('lang_id', getLangId());
                                    }])
                                    ->firstOrFail();

        $detail = $template->details->first();

        $subject = HTMLHelper::renderBladeString($detail->subject);

        $body = HTMLHelper::renderBladeString($detail->body, [
            'email' => $this->user->email ?? null,
            'password' => $this->password ?? null
        ]);

        return $this->subject($subject)
                    ->view('mail.layout')
                    ->with([
                        'body' => $body
                    ]);
    }
}
