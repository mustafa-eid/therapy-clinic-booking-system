<?php

namespace App\Http\Controllers\DoctorControllers;

use App\Http\Controllers\Controller;
use App\Repositories\PaymentRepository;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    protected $paymentRepo;

    public function __construct(PaymentRepository $paymentRepo)
    {
        $this->paymentRepo = $paymentRepo;
    }

    public function payments()
    {
        $payments = $this->paymentRepo->getAllPayments();
        return view('frontend.payments', compact('payments'));
    }

    public function destroyPayment(Request $request)
    {
        return $this->paymentRepo->deletePayment($request->input('id'));
    }
}
