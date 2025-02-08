<?php

namespace App\Repositories;

use App\Models\Payment;

class PaymentRepository implements PaymentRepositoryInterface
{
    public function getAllPayments()
    {
        return Payment::with(['booking', 'invoice'])->paginate(10);
    }

    public function deletePayment($id)
    {
        $payment = Payment::find($id);
        if ($payment) {
            $payment->delete();
            return redirect()->back()->with('success', 'Payment deleted successfully!');
        }

        return redirect()->back()->with('error', 'Payment not found!');
    }
}
