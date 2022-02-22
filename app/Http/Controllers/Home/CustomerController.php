<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Notifications\CustomerNotification;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Notification;

class CustomerController extends Controller
{
    public function store(Request $request)
    {
        $customer = Customer::create($request->all());

        return response([
            'data' => $customer,
            'success' => true,
            'message' => ''
        ], 200);
        // Notification::route('mail', 'adgroup.vnn@gmail.com')->notify(new CustomerNotification($customer));
        return true;

    }
}
