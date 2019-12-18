<?php

namespace App\Http\Controllers\Site;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Newsletter;
use Exception;

class NewsletterController extends Controller
{
    public function store(request $request)
    {

        try {
            $data = $request->except('_token');
            $verificaEmail = Newsletter::whereEmail($data['email'])->first();

            if (!empty($verificaEmail)) {
                return redirect()->route('site.home', '#newsletter')->with('successNewsletter', 'Você já possui cadastro!');
            } else {
                Newsletter::create($data);
                return redirect()->route('site.home', '#newsletter')->with('successNewsletter', 'Cadastrado com sucesso!');
            }
        } catch (Exception $e) {
            return redirect()->back()->with('erroNewsletter', 'Erro ao cadastrar - ' . $e->getMessage());
        }
    }
}
