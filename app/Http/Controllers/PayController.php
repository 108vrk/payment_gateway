<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PayController extends Controller
{
    //
    public function getChecksum(Request $request)
{
    $str = 'merchant_id|order_id|NA|100.00|NA|NA|NA|INR|NA|R|securityId|NA|NA|F|john@doe1.com|mobile_no|NA|NA|NA|NA|NA|NA';
    $checksum = hash_hmac('sha256', $str, 'checksum_key', false);
    $checksum = strtoupper($checksum);
    return $checksum;
}
}
