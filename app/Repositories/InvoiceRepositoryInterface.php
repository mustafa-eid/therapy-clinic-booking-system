<?php

namespace App\Repositories;

interface InvoiceRepositoryInterface
{
    public function getAllInvoices();

    public function storeInvoice($data);

    public function deleteInvoice($id);

    public function updateInvoice($id, $data);
}
