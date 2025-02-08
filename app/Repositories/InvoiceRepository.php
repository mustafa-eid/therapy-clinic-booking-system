<?php

namespace App\Repositories;

use App\Models\Invoice;
use App\Models\Patient;
use App\Models\Payment;
use App\Models\TimeSlot;

class InvoiceRepository implements InvoiceRepositoryInterface
{
    public function getAllInvoices()
    {
        return view('frontend.invoices', [
            'invoices' => Invoice::with(['patient', 'payment', 'slot'])->paginate(5),
            'patients' => Patient::all(),
            'timslots' => TimeSlot::all(),
            'payments' => Payment::all(),
        ]);
    }

    public function storeInvoice($data)
    {
        Invoice::create($data);
        return redirect()->back()->with('success', 'Invoice added successfully.');
    }

    public function deleteInvoice($id)
    {
        $invoice = Invoice::find($id);
        if ($invoice) {
            $invoice->delete();
            return redirect()->back()->with('success', 'Invoice deleted successfully.');
        }
        return redirect()->back()->with('error', 'Invoice not found.');
    }

    public function updateInvoice($id, $data)
    {
        $invoice = Invoice::findOrFail($id);
        $invoice->update($data);
        return redirect()->back()->with('success', 'Invoice updated successfully.');
    }
}
