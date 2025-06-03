<x-app-layout>

  <div class="p-6 text-gray-900 dark:text-gray-100">
    <canvas id="graficoHoras" height="120"></canvas>
  </div>
  </div>
  </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <script>
  const ctx = document.getElementById('graficoHoras').getContext('2d');
  const chart = new Chart(ctx, {
    type: 'bar',
    data: {
      labels: @json($labels),
      datasets: [{
        label: 'Horas Cumpridas',
        data: @json($horas),
        backgroundColor: 'rgba(153, 27, 27, 0.7)',
        borderColor: 'rgba(153, 27, 27, 1)',
        borderWidth: 1
      }]
    },
    options: {
      responsive: true,
      plugins: {
        legend: {
          display: false
        },
        title: {
          display: true,
          text: 'Horas Cumpridas por Aluno'
        }
      },
      scales: {
        y: {
          beginAtZero: true,
          title: {
            display: true,
            text: 'Horas'
          }
        },
        x: {
          title: {
            display: true,
            text: 'Alunos'
          }
        }
      }
    }
  });
  </script>
</x-app-layout>
