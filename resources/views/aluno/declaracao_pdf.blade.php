<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="UTF-8">
  <title>Declaração de Horas Aprovadas</title>
  <style>
  body {
    font-family: 'DejaVu Sans', Arial, sans-serif;
    font-size: 15px;
    background: #f8f9fa;
    color: #222;
    margin: 0;
    padding: 0;
  }

  .container {
    max-width: 800px;
    margin: 30px auto;
    background: #fff;
    border-radius: 10px;
    box-shadow: 0 2px 8px rgba(0, 0, 0, 0.08);
    padding: 32px 40px 40px 40px;
  }

  h2 {
    color: #8B0000;
    /* dark red */
    margin-bottom: 10px;
    font-size: 2em;
    letter-spacing: 1px;
  }

  h3 {
    color: #444;
    margin-top: 32px;
    margin-bottom: 10px;
    font-size: 1.2em;
    font-weight: 600;
  }

  .info-list {
    list-style: none;
    padding: 0;
    margin: 0 0 24px 0;
  }

  .info-list li {
    margin-bottom: 7px;
    font-size: 1em;
  }

  .info-label {
    font-weight: 600;
    color: #555;
    margin-right: 6px;
  }

  table {
    width: 100%;
    border-collapse: separate;
    border-spacing: 0;
    margin-top: 18px;
    background: #fafbfc;
    border-radius: 8px;
    overflow: hidden;
    box-shadow: 0 1px 3px rgba(0, 0, 0, 0.03);
  }

  th,
  td {
    padding: 10px 12px;
    text-align: left;
  }

  th {
    background: #f6e9e9;
    /* light red background */
    color: #8B0000;
    /* dark red */
    font-weight: 700;
    border-bottom: 2px solid #e6d1d1;
    /* light red border */
  }

  tr:not(:last-child) td {
    border-bottom: 1px solid #e8e3e3;
    /* light red border */
  }

  a {
    color: #8B0000;
    /* dark red */
    text-decoration: none;
    font-weight: 500;
  }

  a:hover {
    text-decoration: underline;
  }

  .total {
    margin-top: 28px;
    font-size: 1.1em;
    color: #222;
    background: #f6e9e9;
    /* light red background */
    padding: 12px 18px;
    border-radius: 6px;
    display: inline-block;
    font-weight: 600;
  }
  </style>
</head>

<body>
  <div class="container">
    <h2>Declaração de Horas Aprovadas</h2>
    <ul class="info-list">
      <li><span class="info-label">Aluno:</span> <strong>{{ $aluno->nome }}</strong></li>
      <li><span class="info-label">CPF:</span> <strong>{{ $aluno->cpf }}</strong></li>
      <li><span class="info-label">Curso:</span> <strong>{{ $aluno->curso->nome ?? '-' }}</strong></li>
      <li><span class="info-label">Turma:</span> <strong>{{ $aluno->turma->ano ?? '-' }}</strong></li>
      <li><span class="info-label">Data de emissão:</span> <strong>{{ date('d/m/Y') }}</strong></li>
    </ul>
    <h3>Horas Aprovadas</h3>
    <table>
      <thead>
        <tr>
          <th>Descrição</th>
          <th>Horas</th>
          <th>Documento</th>
        </tr>
      </thead>
      <tbody>
        @foreach($horasAprovadas as $hora)
        <tr>
          <td>{{ $hora->documento->descricao ?? '-' }}</td>
          <td>{{ $hora->horas }}</td>
          <td>
            @if($hora->documento && $hora->documento->url)
            <a href="{{ asset('storage/' . $hora->documento->url) }}">PDF</a>
            @else
            -
            @endif
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
    <div class="total">
      Total de Horas Aprovadas: <strong>{{ $totalHoras }}</strong>
    </div>
  </div>
</body>

</html>
