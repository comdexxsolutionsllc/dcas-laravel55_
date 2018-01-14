<?php

namespace App\Services;

use App\Invoice;
use Dompdf\Dompdf;
use Illuminate\Support\Facades\View;

class Pdf extends Dompdf
{
    /**
     * Create a new pdf instance.
     *
     * @param  array $config
     * @return void
     */
    public function __construct(array $config = [])
    {
        parent::__construct($config);
    }

    /**
     * Determine id the use wants to download or view.
     *
     * @return string
     */
    public function action(): string
    {
        return request()->has('download') ? 'attachment' : 'inline';
    }


    /**
     * Render the PDF.
     *
     * @param  \App\Invoice $invoice
     * @return string
     */
    public function generate(Invoice $invoice): string
    {
        $this->loadHtml(
            View::make('your.blade.template', compact('invoice'))->render()
        );

        $this->render();

        return $this->output();
    }
}
