<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Bash\Auth\RegisterController;
use Illuminate\Http\Request;

class WebRegisterController extends RegisterController
{
    protected $reditectTo = 'profile/info';

    public function __construct()
    {
        $this->middleware('guest');

    }

    public function register(Request $request)
    {
    }
}