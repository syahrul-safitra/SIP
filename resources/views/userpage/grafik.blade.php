@extends('userpage.layouts.main')

@section('container')
    <div class="container mt-5">
        <div class="row">
            <div class="col-lg-12">
                <div class="card mb-4">

                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Grafik Berat Badan Tahun {{ date('Y') }}</h6>
                    </div>

                    <canvas id="beratChart">
                    </canvas>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <div class="card mb-4">

                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Grafik Tinggi Badan Tahun {{ date('Y') }}</h6>
                    </div>

                    <canvas id="tinggiChart">
                    </canvas>
                </div>
            </div>
        </div>
    </div>

    <script>
        const ctx = document.getElementById('beratChart').getContext('2d');
        new Chart(ctx, {
            type: 'bar',
            data: {
                labels: <?php echo json_encode($label); ?>,
                datasets: [{
                    label: 'Berat (Kg)',
                    data: <?php echo json_encode($dataBerat); ?>,
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });

        const cty = document.getElementById('tinggiChart').getContext('2d');
        new Chart(cty, {
            type: 'bar',
            data: {
                labels: <?php echo json_encode($label); ?>,
                datasets: [{
                    label: 'Tinggi (cm)',
                    data: <?php echo json_encode($dataTinggi); ?>,
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>


    <script></script>
@endsection
