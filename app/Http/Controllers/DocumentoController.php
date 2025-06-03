<?php

namespace App\Http\Controllers;

use App\Models\Documento;
use App\Models\HorasCumpridas;
use App\Models\Categoria;
use App\Models\Aluno;
use App\Http\Requests\DocumentoRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DocumentoController extends Controller
{
    public function index()
    {
        $documentos = Documento::all();
        return view('documento.index', compact('documentos'));
    }

    public function create()
    {
        $categorias = Categoria::all();
        return view('documento.create', compact('categorias'));
    }

    public function store(DocumentoRequest $request)
    {
        Documento::create($request->validated());
        return redirect()->route('coordenador.documentos.index')->with('success', 'Documento criado com sucesso!');
    }

    public function show(Documento $documento)
    {
        return view('documento.show', compact('documento'));
    }

    public function edit(Documento $documento)
    {
        $categorias = Categoria::all();
        return view('documento.edit', compact('documento', 'categorias'));
    }

    public function update(DocumentoRequest $request, Documento $documento)
    {
        $documento->update($request->validated());
        return redirect()->route('coordenador.documentos.index')->with('success', 'Documento atualizado com sucesso!');
    }

    public function destroy(Documento $documento)
    {
        $documento->delete();
        return redirect()->route('coordenador.documentos.index')->with('success', 'Documento excluído com sucesso!');
    }

    public function createAluno()
    {
        $categorias = Categoria::all();
        return view('aluno.documento_create', compact('categorias'));
    }

    public function storeAluno(Request $request)
    {
        $validated = $request->validate([
            'arquivo' => 'required|file|mimes:pdf|max:5120',
            'descricao' => 'required|string|max:255',
            'horas' => 'required|numeric|min:0.1',
            'categoria_id' => 'required|exists:categorias,id',
        ]);

        $user = Auth::user();
        $aluno = Aluno::where('user_id', $user->id)->first();

        if (!$aluno) {
            return redirect()->route('aluno.dashboard')->with('error', 'Aluno não encontrado para este usuário.');
        }

        $path = $request->file('arquivo')->store('documentos', 'public');

        $documento = Documento::create([
            'url' => $path,
            'descricao' => $validated['descricao'],
            'horas_in' => $validated['horas'],
            'status' => 'Pendente',
            'comentario' => '',
            'horas_out' => 0,
            'categoria_id' => $validated['categoria_id'],
            'user_id' => $user->id,
        ]);

        HorasCumpridas::create([
            'aluno_id' => $aluno->id,
            'documento_id' => $documento->id,
            'horas' => $validated['horas'],
            'status' => 'Pendente',
            'comentario' => '',
        ]);

        return redirect()->route('aluno.dashboard')->with('success', 'Documento submetido para aprovação!');
    }

    public function aprovar($id, Request $request)
    {
        $documento = Documento::findOrFail($id);
        $horas = $request->input('horas_out', $documento->horas_in);
        $comentario = $request->input('comentario', '');

        $documento->update([
            'status' => 'Aprovado',
            'horas_out' => $horas,
            'comentario' => $comentario,
        ]);

        $this->updateHorasCumpridas($documento->id, [
            'status' => 'Aprovado',
            'horas' => $horas,
            'comentario' => $comentario,
        ]);

        return redirect()->route('coordenador.documentos.index')->with('success', 'Documento aprovado e horas registradas!');
    }

    public function reprovar($id, Request $request)
    {
        $documento = Documento::findOrFail($id);
        $comentario = $request->input('comentario', '');

        $documento->update([
            'status' => 'Reprovado',
            'comentario' => $comentario,
            'horas_out' => 0,
        ]);

        $this->updateHorasCumpridas($documento->id, [
            'status' => 'Reprovado',
            'horas' => 0,
            'comentario' => $comentario,
        ]);

        return redirect()->route('coordenador.documentos.index')->with('success', 'Documento reprovado!');
    }

    private function updateHorasCumpridas($documentoId, array $data)
    {
        $horasCumpridas = HorasCumpridas::where('documento_id', $documentoId)->first();
        if ($horasCumpridas) {
            $horasCumpridas->update($data);
        }
    }
}
