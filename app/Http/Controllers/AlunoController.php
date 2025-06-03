<?php

namespace App\Http\Controllers;

use App\Models\Aluno;
use App\Models\Curso;
use App\Models\Turma;
use App\Models\Nivel;
use Illuminate\Http\Request;
use App\Http\Requests\AlunoRequest;

class AlunoController extends Controller
{
    public function index()
    {
        $alunos = Aluno::with(['curso', 'turma'])->get();
        return view('aluno.index', compact('alunos'));
    }

    public function create()
    {
        return view('aluno.create', [
            'cursos' => Curso::all(),
            'turmas' => Turma::all(),
            'niveis' => Nivel::all(),
        ]);
    }

    public function store(AlunoRequest $request)
    {
        $data = $request->validated();
        $data['senha'] = bcrypt($data['senha']);
        Aluno::create($data);

        return redirect()->route('coordenador.alunos.index')->with('success', 'Aluno criado com sucesso!');
    }

    public function show(Aluno $aluno)
    {
        return view('aluno.show', compact('aluno'));
    }

    public function edit(Aluno $aluno)
    {
        return view('aluno.edit', [
            'aluno' => $aluno,
            'cursos' => Curso::all(),
            'turmas' => Turma::all(),
            'niveis' => Nivel::all(),
        ]);
    }

    public function update(AlunoRequest $request, Aluno $aluno)
    {
        $data = $request->validated();
        if (!empty($data['senha'])) {
            $data['senha'] = bcrypt($data['senha']);
        } else {
            unset($data['senha']);
        }
        $aluno->update($data);

        return redirect()->route('coordenador.alunos.index')->with('success', 'Aluno atualizado com sucesso!');
    }

    public function destroy(Aluno $aluno)
    {
        $aluno->delete();
        return redirect()->route('coordenador.alunos.index')->with('success', 'Aluno excluído com sucesso!');
    }

    public function getTurmasByCurso($cursoId)
    {
        try {
            $turmas = Turma::where('curso_id', $cursoId)->get();
            return response()->json($turmas);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Erro ao buscar turmas'], 500);
        }
    }
}
