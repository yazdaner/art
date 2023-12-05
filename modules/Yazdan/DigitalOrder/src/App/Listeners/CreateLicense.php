<?php

namespace Yazdan\DigitalOrder\App\Listeners;

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
        }
    }
}
