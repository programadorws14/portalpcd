<?php

namespace App\Http\Controllers\Site;

use App\Empresa;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Usuario;
use Exception;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        if (!empty(Auth::guard('empresa')->user())) {
            return redirect()->route('empresa.dashboard');
        } elseif (!empty(Auth::guard('usuario')->user())) {
            return redirect()->route('usuario.dashboard');
        }
        
        return view('site.login.index');
    }

    public function VerificaEmailEmpresa($email)
    {
        try {
            if (!empty(Auth::guard('empresa')->user()->email) && Auth::guard('empresa')->user()->email == $email) {
                return array(
                    'status' => 'error',
                    'email' => $email
                );
            }

            $empresas = Empresa::whereEmail($email)->get();
            if (count($empresas) >= 1) {
                return array(
                    'status' => 'sucesso',
                    'email' => $email
                );
            } else {
                return array(
                    'status' => 'error',
                    'email' => $email
                );
            }
        } catch (Exception $e) {
            return array(
                'status' => 'error',
                'error' => $e->getMessage()
            );
        }
    }

    public function VerificaEmailUsuario($email)
    {
        try {
            if (!empty(Auth::guard('usuario')->user()->email) && Auth::guard('usuario')->user()->email == $email) {
                return array(
                    'status' => 'error',
                    'email' => $email
                );
            }

            $usuario = Usuario::whereEmail($email)->get();
            if (count($usuario) >= 1) {
                return array(
                    'status' => 'sucesso',
                    'email' => $email
                );
            } else {
                return array(
                    'status' => 'error',
                    'email' => $email
                );
            }
        } catch (Exception $e) {
            return array(
                'status' => 'error',
                'error' => $e->getMessage()
            );
        }
    }

    public function indexCandidato()
    {
        if (!empty(Auth::guard('usuario')->user())) {
            return redirect()->route('usuario.dashboard');
        }
        return view('site.login.index_candidato');
    }

    public function indexEmpresa()
    {
        if (!empty(Auth::guard('empresa')->user())) {
            return redirect()->route('empresa.dashboard');
        }
        return view('site.login.index_empresa');
    }
}
