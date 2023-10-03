<?php

namespace App\Services\Midtrans;

use Midtrans\Snap;


class CreateSnapTokenService extends Midtrans
{
    protected $transaction;

    public function __construct($transaction)
    {
        parent::__construct();

        $this->transaction = $transaction;
    }

    public function getSnapToken()
    {
        $params = [
            'transaction_details' => [
                'order_id'      =>  $this->transaction->number,
                'transaction_id' => $this->transaction->number,
                'gross_amount' => $this->transaction->total_price,
            ],
            'item_details' => [
                [
                    'id' => 1,
                    'price' => $this->transaction->total_price,
                    'quantity' => 1,
                    'name' => 'Pembayaran Uang Kas',
                ],
            ],
            'customer_details' => [
                'first_name' => $this->transaction->donor_name,
                'email' => 'sipukas@gmail.com',
                'phone' => '012345678',
            ]
        ];

        $snapToken = Snap::getSnapToken($params);

        return $snapToken;
    }
}
