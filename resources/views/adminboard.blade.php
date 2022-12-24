@extends('main')

@section('content')

    <p>welcome to the admin page</p>
    <a href="{{ route('prescription.validation_show') }}" class="btn btn-primary btn-lg" role="button" aria-pressed="true">View Prescriptions</a>

@endsection