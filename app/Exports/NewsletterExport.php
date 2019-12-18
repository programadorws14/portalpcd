<?php

namespace App\Exports;

use App\Candidatura;
use App\Newsletter;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class NewsletterExport implements FromView
{
    public function view(): View
    {
        $newsletters = Newsletter::all();
        return view('admin.gerenciar_newsletter._list_excel', compact('newsletters'));
    }
}
