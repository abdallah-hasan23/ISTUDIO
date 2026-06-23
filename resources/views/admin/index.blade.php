@extends('admin.master')
@section('title', 'Dashboard')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h3 class="fw-bold">Overview</h3>
    <div class="text-muted small">{{ now()->format('l, d M Y') }}</div>
</div>

<div class="container-fluid p-0">

    {{-- Statistic Cards --}}
    <div class="row g-4 mb-4">
        <div class="col-lg-3 col-md-6">
            <div class="card h-100 p-3">
                <div class="d-flex align-items-center">
                    <div class="rounded-circle p-3 me-3" style="background-color: rgba(13, 107, 104, 0.1); color: var(--primary-color);">
                        <i class="bi bi-briefcase fs-3"></i>
                    </div>
                    <div>
                        <h6 class="text-muted mb-1">Total Projects</h6>
                        <h3 class="fw-bold mb-0">{{ $projects->count() }}</h3>
                    </div>
                </div>
                <a href="{{ route('admin.projects.index') }}" class="stretched-link"></a>
            </div>
        </div>
        <div class="col-lg-3 col-md-6">
            <div class="card h-100 p-3">
                <div class="d-flex align-items-center">
                    <div class="rounded-circle p-3 me-3" style="background-color: rgba(13, 107, 104, 0.1); color: var(--primary-color);">
                        <i class="bi bi-gear fs-3"></i>
                    </div>
                    <div>
                        <h6 class="text-muted mb-1">Services</h6>
                        <h3 class="fw-bold mb-0">{{ $services->count() }}</h3>
                    </div>
                </div>
                <a href="{{ route('admin.services.index') }}" class="stretched-link"></a>
            </div>
        </div>
        <div class="col-lg-3 col-md-6">
            <div class="card h-100 p-3">
                <div class="d-flex align-items-center">
                    <div class="rounded-circle p-3 me-3" style="background-color: rgba(13, 107, 104, 0.1); color: var(--primary-color);">
                        <i class="bi bi-people fs-3"></i>
                    </div>
                    <div>
                        <h6 class="text-muted mb-1">Team Members</h6>
                        <h3 class="fw-bold mb-0">{{ $team->count() }}</h3>
                    </div>
                </div>
                <a href="{{ route('admin.team.index') }}" class="stretched-link"></a>
            </div>
        </div>
        <div class="col-lg-3 col-md-6">
            <div class="card h-100 p-3">
                <div class="d-flex align-items-center">
                    <div class="rounded-circle p-3 me-3" style="background-color: rgba(13, 107, 104, 0.1); color: var(--primary-color);">
                        <i class="bi bi-chat-dots fs-3"></i>
                    </div>
                    <div>
                        <h6 class="text-muted mb-1">Messages</h6>
                        <h3 class="fw-bold mb-0">{{ $messages->count() }}</h3>
                    </div>
                </div>
                <a href="{{ route('admin.messages.index') }}" class="stretched-link"></a>
            </div>
        </div>
    </div>

    {{-- Recent Items --}}
    <div class="row g-4 mb-4">
        <div class="col-md-4">
            <div class="card h-100">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="card-title mb-0">Recent Projects</h5>
                    <a href="{{ route('admin.projects.index') }}" class="btn btn-sm btn-light border">View All</a>
                </div>
                <div class="card-body p-0">
                    <div class="list-group list-group-flush">
                        @foreach($projects->take(5) as $project)
                            <div class="list-group-item border-0 py-3 d-flex align-items-center">
                                <div class="bg-light rounded p-2 me-3">
                                    <i class="bi bi-check-circle text-success"></i>
                                </div>
                                <div class="flex-grow-1">
                                    <div class="fw-medium">{{ $project->title }}</div>
                                    <small class="text-muted">{{ $project->category }}</small>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card h-100">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="card-title mb-0">Recent Messages</h5>
                    <a href="{{ route('admin.messages.index') }}" class="btn btn-sm btn-light border">View All</a>
                </div>
                <div class="card-body p-0">
                    <div class="list-group list-group-flush">
                        @foreach($messages->take(5) as $msg)
                            <div class="list-group-item border-0 py-3 d-flex align-items-center">
                                <div class="bg-light rounded-circle p-2 me-3" style="width: 40px; height: 40px; display: flex; align-items: center; justify-content: center;">
                                    <span class="fw-bold text-primary">{{ substr($msg->name, 0, 1) }}</span>
                                </div>
                                <div class="flex-grow-1 text-truncate">
                                    <div class="fw-medium">{{ $msg->name }}</div>
                                    <small class="text-muted">{{ Str::limit($msg->message, 30) }}</small>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card h-100">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="card-title mb-0">Testimonials</h5>
                    <a href="{{ route('admin.testimonials.index') }}" class="btn btn-sm btn-light border">View All</a>
                </div>
                <div class="card-body p-0">
                    <div class="list-group list-group-flush">
                        @foreach($testimonials->take(5) as $test)
                             <div class="list-group-item border-0 py-3 d-flex align-items-center">
                                <div class="bg-light rounded p-2 me-3">
                                    <i class="bi bi-star-fill text-warning"></i>
                                </div>
                                <div class="flex-grow-1 text-truncate">
                                    <div class="fw-medium">{{ $test->name }}</div>
                                    <small class="text-muted">{{ Str::limit($test->comment, 30) }}</small>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Chart Projects by Category --}}
    <div class="row">
        <div class="col-md-12">
            <div class="card p-4">
                <h5 class="card-title mb-4">Projects Analysis</h5>
                <div style="height: 300px;">
                    <canvas id="projectsChart"></canvas>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection

@section('js')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    const ctx = document.getElementById('projectsChart').getContext('2d');
    const projectsChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: {!! json_encode($categoryCounts->keys()) !!},
            datasets: [{
                label: 'Projects by Category',
                data: {!! json_encode($categoryCounts->values()) !!},
                backgroundColor: '#0d6b68',
                borderRadius: 8,
                barThickness: 30
            }]
        },
        options: { 
            responsive: true, 
            maintainAspectRatio: false,
            plugins: {
                legend: { display: false }
            },
            scales: {
                y: {
                    beginAtZero: true,
                    grid: { drawBorder: false, color: '#eef2f2' }
                },
                x: {
                    grid: { display: false }
                }
            }
        }
    });
</script>
@stop