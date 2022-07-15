<?php

namespace App\Http\Controllers;

use App\FunctionsGeneric\Functions;
use App\Models\Cliente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class ClienteController extends Controller
{
    private $cliente;

    /**
     * Retorna dados para tela de consulta
     * @return Json com array de dados.
     */
    public function index()
    {
        $clientes = DB::table('cliente')
            ->select('id', 'nome', 'endereco', 'cnpjcpf', 'cep', 'cidade', 'estado')
            ->get();

        return view('clientes')->with('clientes', $clientes);
    }

    /**
     * Abre a pagina de cadastro de cliente
     */
    public function create()
    {
        return view('cadastro');
    }

    /**
     * Abre a pagina de cadastro de cliente
     */
    public function store(Request $request)
    {
        $clientes = new Cliente;
        $clientes->nome = ($request->input('nome'));
        $clientes->endereco = $request->input('endereco');
        $clientes->cnpjcpf = ($request->input('cnpjcpf'));
        $clientes->cep = ($request->input('cep'));
        $clientes->cidade = ($request->input('cidade'));
        $clientes->estado = ($request->input('estado'));
        try {
            if ($clientes->saveOrFail()) {//salvou o cliente
                return redirect('/clientes')->with('success', 'Cliente salvo com sucesso!');
            }
        } catch (\Throwable $e) {
            return redirect('/clientes')->with('error', 'Não foi possível salvar o cliente' . $e->getMessage());
        }
    }
}