<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use Illuminate\Http\Request;

class InvoiceController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function invoice(Invoice $invoice)
    {
        return view('pages.invoice', ['page' => "Invoice #{$invoice->id}"]);
    }
}
