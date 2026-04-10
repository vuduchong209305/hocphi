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

class RegisterCourse extends Mailable
{
    use Queueable, SerializesModels;

    public $order;
    /**
     * Create a new message instance.
     */
    public function __construct($order)
    {
        $this->order = $order;
    }

    public function build()
    {
        $template = EmailTemplate::where('key', 'register_course')
                                    ->status()
                                    ->with(['details' => function($q) {
                                        $q->where('lang_id', getLangId());
                                    }])
                                    ->firstOrFail();

        $detail = $template->details->first();

        $subject = HTMLHelper::renderBladeString($detail->subject);

        $body = HTMLHelper::renderBladeString($detail->body, [
            'course_name' => $this->order->course->title ?? null,
            'start_date' => $this->order->start_date ?? null,
            'email' => $this->order->email ?? null,
            'fullname' => $this->order->fullname ?? null,
            'phone' => $this->order->phone ?? null,
            'gender' => $this->order->gender == 1 ? 'Nam' : 'Nữ',
            'company' => $this->order->company ?? null,
            'cccd' => $this->order->cccd  ?? null,
            'birthday' => $this->order->birthday ?? null,
            'birth_place' => $this->order->birthplace ?? null,
            'address' => $this->order->address ?? null,
            'address_cme' => $this->order->address_cme ?? null,

            'is_vat' => $this->order->is_vat ?? null,
            'mst' => $this->order->mst ?? null,
            'mst_name' => $this->order->mst_name ?? null,
            'mst_address' => $this->order->mst_address ?? null
        ]);

        return $this->subject($subject)
                    ->view('mail.layout')
                    ->with([
                        'body' => $body
                    ]);
    }
}
