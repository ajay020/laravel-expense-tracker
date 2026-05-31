@props([
    'labels', 
    'values'
])

<div class="bg-white p-4 rounded shadow mb-8">
    <h2 class="text-xl font-semibold mb-4">
        Monthly Spending
    </h2>

    <canvas id="monthlyChart"></canvas>

    <script>
        const ctx = document.getElementById('monthlyChart');

        new Chart(ctx, {
            type: 'bar',

            data: {
                labels: @json($labels),

                datasets: [{
                    label: 'Expenses',

                    data: @json($values),
                }]
            }
        });
    </script>
</div>
