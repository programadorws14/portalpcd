<?php

namespace App\Http\Controllers\Site;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Pagina;
use Exception;

class PaginasController extends Controller
{
    public function show($slug)
    {
        try {
            $page = Pagina::whereSlug($slug)->first();
            return view('site.pagina.page', compact('page'));
        } catch (Exception $e) {
            return redirect()->back();
        }
    }
}
