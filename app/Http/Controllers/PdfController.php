<?php

namespace App\Http\Controllers;

use App\Invoice;
use App\Services\Pdf;

class PdfController extends Controller
{
    /**
     * The dompdf instance.
     *
     * @var \App\Services\Pdf
     */
    protected $pdf;

    /**
     * Create a new controller instance.
     *
     * @param  \App\Services\Pdf $pdf
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');

        $this->pdf = $pdf;
    }

    /**
     * Generate the PDF to inspect or download.
     *
     * @param  \App\Invoice $invoice
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Invoice $invoice)
    {
        return response($this->pdf->generate($invoice), 200)->withHeaders([
            'Content-Type' => 'application/pdf',
            'Content-Disposition' => "{$this->pdf->action()}; filename='invoice-{$invoice->id}.pdf'",
        ]);
    }
}
