@extends('main')

@section('content')

@if ($message = Session::get('success'))

<div class="alert alert-info">
    {{$message}}
</div>

@endif

    <div class="container-fluid" style="width: 85%">
        <form action="{{ route('prescription.validate_upload') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-row mb-3">
                <label for="inputEmail4">Note</label>
                <input type="text" class="form-control" id="note" name="note" placeholder="Enter note">
                @if ($errors->has('note'))
                    <span class="text-danger">{{ $errors->first('note') }}</span>
                @endif
            </div>
            <div class="form-row mb-3">
                <label for="inputAddress">delivery Address</label>
                <input type="text" class="form-control" id="inputAddress" name="address"
                    placeholder="Input Address">
                @if ($errors->has('address'))
                    <span class="text-danger">{{ $errors->first('address') }}</span>
                @endif
            </div>
            <div class="form-row mb-3">
                <label for="inputAddress">delivery time</label>
                <input type="text" class="form-control" id="inputAddress" name="time"
                    placeholder="Input hours 2 by 2">
                @if ($errors->has('time'))
                    <span class="text-danger">{{ $errors->first('time') }}</span>
                @endif
            </div>
            <div class="form-row mb-3">
                <label for="formFileMultiple" class="form-label">Multiple files input example</label>
                <input class="form-control" type="file" id="formFileMultiple" name="photo" multiple />
                @if ($errors->has('photo'))
                    <span class="text-danger">{{ $errors->first('photo') }}</span>
                @endif
            </div>
            <button type="submit" class="btn btn-primary">Submit Prescription</button>
        </form>
    </div>
@endsection