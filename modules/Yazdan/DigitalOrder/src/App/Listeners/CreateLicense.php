<?php

namespace Yazdan\DigitalOrder\App\Listeners;

use Illuminate\Support\Facades\Http;
use Yazdan\Course\App\Models\Course;
use Yazdan\DigitalOrder\App\Models\DigitalOrder;

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
                "course" => [$event->payment->paymentable->spot_course_token],
                "name" => auth()->user()->username,
                "watermark" =>  ['texts' => [['text'=>auth()->user()->email]]]
                ]);
            $key = json_decode($response->getBody(), true)['key'];
            DigitalOrder::create([
                'payment_id' => $event->payment->id,
                'user_id' => auth()->id(),
                'key' => $key
            ]);
        }
    }
}
