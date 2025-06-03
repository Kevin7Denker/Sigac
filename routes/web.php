<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\{
    AlunoController,
    CategoriaController,
    ComprovanteController,
    CursoController,
    DeclaracaoController,
    DocumentoController,
    NivelController,
    TurmaController,
    ProfileController,
    AlunoDashboardController,
    CoordenadorDashboardController,
    EixoController,
    AlunoDeclaracaoController
};

Route::view('/', 'welcome');

Route::get('/dashboard', function () {
    if (Auth::check()) {
        $user = Auth::user();
        $role = $user->role->nome ?? null;

        if (!$role) {
            return view('dashboard');
        }
        return match ($role) {
            'aluno' => redirect()->route('aluno.dashboard'),
            'coordenador' => redirect()->route('coordenador.dashboard'),
            default => view('dashboard'),
        };
    }
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware(['auth', 'verified', 'role:aluno'])
    ->prefix('aluno')->name('aluno.')->group(function () {
        Route::get('/dashboard', [AlunoDashboardController::class, 'index'])->name('dashboard');
        Route::get('/documentos/create', [DocumentoController::class, 'createAluno'])->name('documentos.create');
        Route::post('/documentos', [DocumentoController::class, 'storeAluno'])->name('documentos.store');
        Route::get('/declaracao/pdf', [AlunoDeclaracaoController::class, 'gerarDeclaracao'])->name('declaracao.pdf');
    });

Route::middleware(['auth', 'verified', 'role:coordenador'])
    ->prefix('coordenador')->name('coordenador.')->group(function () {
        Route::get('/dashboard', [CoordenadorDashboardController::class, 'index'])->name('dashboard');
        Route::resources([
            'alunos' => AlunoController::class,
            'categorias' => CategoriaController::class,
            'comprovantes' => ComprovanteController::class,
            'cursos' => CursoController::class,
            'declaracoes' => DeclaracaoController::class,
            'documentos' => DocumentoController::class,
            'niveis' => NivelController::class,
            'turmas' => TurmaController::class,
            'eixos' => EixoController::class,
        ], [
            'declaracoes' => ['parameters' => ['declaracoes' => 'declaracao']],
            'niveis' => ['parameters' => ['niveis' => 'nivel']],
        ]);
        Route::put('/alunos/{aluno}', [AlunoController::class, 'update'])->name('alunos.update');
        Route::get('/turmas/get/{cursoId}', [AlunoController::class, 'getTurmasByCurso'])->name('turmas.byCurso');
        Route::post('documentos/{documento}/aprovar', [DocumentoController::class, 'aprovar'])->name('documentos.aprovar');
        Route::post('documentos/{documento}/reprovar', [DocumentoController::class, 'reprovar'])->name('documentos.reprovar');
        Route::get('turmas/{turma}/grafico-horas', [TurmaController::class, 'graficoHoras'])->name('turmas.grafico_horas');
    });

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
