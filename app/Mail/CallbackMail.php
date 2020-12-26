<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Http\Request;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Validator;

class CallbackMail extends Mailable
{
    use Queueable, SerializesModels;

    public $subject;
    public $arrayData;

    public function __construct()
    {

    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build() {
        return $this->subject($this->subject)
            ->markdown('mail.callback');
    }

    public function validate() : void {
        Validator::make(request()->all(), [
            'name' => ['required'],
            'phone' => [
                'required',
                function ($attribute, $value, $fail) {
                    preg_match('#(\+7[\s][0-9]{3}[\s][0-9]{3}-[0-9]{2}-[0-9]{2})#siU', $value, $match);
                    if (!isset($match[1])) {
                        $fail('Телефон заполнен не до конца');
                    }
                },
            ]
        ])->validate();
    }

    public function addElementToArrayData(string $key, string $name) : void {
        $value = \request()->get($key);
        $this->arrayData[$name] = $value;
    }

    public function fillArrayData() : void {
        $this->addElementToArrayData('name', 'Имя');
        $this->addElementToArrayData('phone', 'Телефон');
    }
}
