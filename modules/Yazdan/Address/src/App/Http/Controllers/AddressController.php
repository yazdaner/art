<?php

namespace Yazdan\Address\App\Http\Controllers;

use App\Http\Controllers\Controller;
use Yazdan\Address\App\Models\Address;
use Yazdan\Address\Repositories\AddressRepository;

class AddressController extends Controller
{
    public function index()
    {
        return view("Address::front.index");
    }

}
