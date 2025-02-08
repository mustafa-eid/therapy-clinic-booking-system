<?php

namespace App\Repositories;

interface PaymentRepositoryInterface
{
    public function getAllPayments();
    public function deletePayment($id);
}
