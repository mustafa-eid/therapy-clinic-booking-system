<?php

namespace App\Http\Controllers\DoctorControllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\InvoiceRepository;

class InvoiceController extends Controller
{
    protected $invoiceRepository;

    public function __construct(InvoiceRepository $invoiceRepository)
    {
        $this->invoiceRepository = $invoiceRepository;
    }

    public function getAllInvoice()
    {
        return $this->invoiceRepository->getAllInvoices();
    }

    public function storeInvoice(Request $request)
    {
        return $this->invoiceRepository->storeInvoice($request->validate([
            'patient_id' => 'required|exists:patients,id',
            'slot_id' => 'required|exists:time_slots,id',
            'payment_id' => 'required|exists:payments,id',
            'amount' => 'required|numeric',
            'description' => 'nullable|string',
        ]));
    }

    public function destroyInvoice(Request $request)
    {
        return $this->invoiceRepository->deleteInvoice($request->input('id'));
    }

    public function updateInvoice(Request $request, $id)
    {
        return $this->invoiceRepository->updateInvoice($id, $request->validate([
            'status' => 'required|string',
            'amount' => 'required|numeric',
        ]));
    }
}
