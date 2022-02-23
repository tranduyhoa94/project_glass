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
        $input = $request->all();
        if (isset($input['post_name']) && $input['post_name']) {
            $input['content'] = '( Nhận báo giá: ' . $input['post_name']. ') ' .  $input['content'];
            unset($input['post_name']);
        }

        $customer = Customer::create($input);

        return response([
            'data' => $customer,
            'success' => true,
            'message' => ''
        ], 200);
        // Notification::route('mail', 'adgroup.vnn@gmail.com')->notify(new CustomerNotification($customer));
        return true;

    }
}
