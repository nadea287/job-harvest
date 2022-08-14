@include('layouts.applayout')
<body>
<div>
    <div>
        <input type="text" name="search" id="search-input" placeholder="search...">
        <button id="search">search</button>
    </div>
    <table class="table table-hover table-sm">
        <thead>
        <tr>
            <th scope="col">Title</th>
            <th scope="col">Company</th>
            <th scope="col">Location</th>
            <th scope="col">Description</th>
        </tr>
        </thead>
        <tbody>
        <tbody class="all-data">
        @foreach($jobs as $job)
            <tr>
                <td>
                    <a href="{{ route('jobs.show', ['job' => $job->id]) }}">
                        {{ $job->title }}
                    </a>
                </td>
                <td>{{ $job->company }}</td>
                <td>{{ $job->location }}</td>
                <td>{{ $job->description }}</td>
            </tr>
        @endforeach
        </tbody>
        <tbody id="content" class="search-data"></tbody>
        </tbody>
    </table>
</div>
{{--@push('scripts')--}}
{{--    <script src="{{ asset('js/jquery.js') }}"></script>--}}
{{--    <script src="{{ asset('/js/search.js') }}"></script>--}}
{{--@endpush--}}

