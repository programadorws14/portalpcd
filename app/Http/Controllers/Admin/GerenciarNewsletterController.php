<?php

namespace App\Http\Controllers\Admin;

use App\Exports\NewsletterExport;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Newsletter;
use Exception;
use Maatwebsite\Excel\Facades\Excel;

class GerenciarNewsletterController extends Controller
{
    public function __construct()
    {
        $this->middleware('AdminAuth');
    }
    
    public function index()
    {
        $newsletters = Newsletter::all();
        return view('admin.gerenciar_newsletter.index', compact('newsletters'));
    }

    public function deletar($id)
    {
        try {
            Newsletter::find($id)->delete();
            return redirect()->back()->with('success', 'Deletado com sucesso!');
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'Error ao deletar' . $e->getMessage());
        }
    }

    public function export()
    {
        return Excel::download(new NewsletterExport, 'newsletters.xlsx');
    }
}
