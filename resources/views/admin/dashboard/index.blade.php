@extends('admin.layouts.layout')
@section('content')
    <iframe src="{{ route('admin.dashboard.show') }}" frameborder="0" class="layadmin-iframe"></iframe>
@endsection()

@section('js')
<script src="{{ asset("theme/js/admin.js") }}"></script>
@endsection()