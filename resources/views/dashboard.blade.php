@extends('main')

@section('content')

<div class="container-fluid" style="width: 85%">

    <p style="textalign: center">welcome to the customer page</p>
    <a href="{{ route('upload') }}" class="btn btn-primary btn-lg" role="button" aria-pressed="true">Upload Prescription</a>

</div>
    
@endsection
