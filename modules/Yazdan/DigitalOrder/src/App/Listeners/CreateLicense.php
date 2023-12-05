<?php

namespace Yazdan\DigitalOrder\App\Listeners;

use Illuminate\Support\Facades\Http;
use Yazdan\Course\App\Models\Course;

class CreateLicense
{

    public function __construct()
    {
        //
    }

    public function handle($event)
    {
        if ($event->payment->paymentable_type == Course::class) {
            // create license
            $response = Http::withHeader('$API','ZUNDIpNCPQrQJP6vtcyaqAeriwA=')->post('https://panel.spotplayer.ir/license/edit/',[
                "test" => true,
                "course" => ["654344fc93423d0ad025033f"],
                "name" => "customer",
                "watermark" =>  ['texts' => [['text'=>'09121112266']]]
                ]);
            dd($response->json());
        }
    }
}
