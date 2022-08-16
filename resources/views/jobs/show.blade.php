@include('layouts.applayout')
<div class="d-flex flex-column justify-content-center align-items-center my-3">
    <span class="mb-4"><a href="{{ route('jobs.index') }}">Jobs List</a></span>
    <div class="card" style="width: 50rem;">
        <div class="card-body">
            <h5 class="card-title"><span class="text-muted">Job title: </span>{{ $job->title }}</h5>
        </div>
        <ul class="list-group list-group-flush">
            <li class="list-group-item"><span class="text-muted">Company: </span>{{ $job->company }}</li>
            <li class="list-group-item"><span class="text-muted">Location: </span>{{ $job->location }}</li>
        </ul>
        <div class="card-body">
            <p class="card-text"><span class="text-muted">Description: </span>{{ $job->description }}</p>

        </div>
    </div>
    <div class="ml-5">
        <span class="m-lg-3 fw-bold">Candidates:</span>
        <ul>
            @foreach($cvs as $cv)
                <li>{{ $cv->name }} | {{ $cv->work }}</li>
            @endforeach
        </ul>
    </div>
</div>
