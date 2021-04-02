<?php


namespace App\Services;


class PaymentService
{

    public function pay($type, $amount)
    {
        $payment = new payment();

        if ($type == 'paypal') {
            $payment->payWithPayPal();
        } elseif ($type == 'payu') {
            $payment->payWithPayU();
        } else {
            $payment->payWithCash();
        }
    }

}
