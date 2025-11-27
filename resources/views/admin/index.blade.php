@extends('admin.master')
@section('title', 'Dashboard')

@section('content')
<div class="col-sm-6"><h3 class="m-3">Dashboard</h3></div>
<div class="container-fluid">

    {{-- Statistic Cards --}}
    <div class="row">
        <div class="col-lg-3 col-6">
            <div class="small-box bg-info">
                <div class="inner">
                    <h3>{{ $projects->count() }}</h3>
                    <p>Projects</p>
                </div>
                <div class="icon">
                    <i class="fas fa-project-diagram"></i>
                </div>
                <a href="{{ route('admin.projects.index') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <div class="col-lg-3 col-6">
            <div class="small-box bg-success">
                <div class="inner">
                    <h3>{{ $services->count() }}</h3>
                    <p>Services</p>
                </div>
                <div class="icon">
                    <i class="fas fa-concierge-bell"></i>
                </div>
                <a href="{{ route('admin.services.index') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <div class="col-lg-3 col-6">
            <div class="small-box bg-warning">
                <div class="inner">
                    <h3>{{ $team->count() }}</h3>
                    <p>Team Members</p>
                </div>
                <div class="icon">
                    <i class="fas fa-users"></i>
                </div>
                <a href="{{ route('admin.team.index') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <div class="col-lg-3 col-6">
            <div class="small-box bg-danger">
                <div class="inner">
                    <h3>{{ $messages->count() }}</h3>
                    <p>Messages</p>
                </div>
                <div class="icon">
                    <i class="fas fa-envelope"></i>
                </div>
                <a href="{{ route('site.contact') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
    </div>

    

    {{-- Recent Items --}}
    <div class="row">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Recent Projects</h3>
                </div>
                <div class="card-body">
                    <ul class="list-group">
                        @foreach($projects->take(5) as $project)
                            <li class="list-group-item">{{ $project->title }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Recent Messages</h3>
                </div>
                <div class="card-body">
                    <ul class="list-group">
                        @foreach($messages->take(5) as $msg)
                            <li class="list-group-item">{{ $msg->name }} - {{ Str::limit($msg->message, 30) }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Recent Testimonials</h3>
                </div>
                <div class="card-body">
                    <ul class="list-group">
                        @foreach($testimonials->take(5) as $test)
                            <li class="list-group-item">{{ $test->name }} - {{ Str::limit($test->comment, 30) }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>

    {{-- Chart Projects by Category --}}
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Projects by Category</h3>
                </div>
                <div class="card-body">
                    <canvas id="projectsChart" style="height: 200px;"></canvas>
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
            label: '# of Projects',
            data: {!! json_encode($categoryCounts->values()) !!},
            backgroundColor: 'rgba(54, 162, 235, 0.7)',
            borderColor: 'rgba(54, 162, 235, 1)',
            borderWidth: 1
        }]
    },
    options: { responsive: true, maintainAspectRatio: false }
});
</script>
@stop