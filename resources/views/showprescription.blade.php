@extends('main')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-9">
            <div class="card">
                <div class="card-header">Prescription</div>
                <div class="card-body">
                    {{-- <a href="{{ route('prescription.validate_show') }}" class="btn btn-success btn-sm" title="Add New Contact">
                        <i class="fa fa-plus" aria-hidden="true"></i> Add New
                    </a> --}}
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Note</th>
                                    <th>Address</th>
                                    <th>Time</th>
                                    <th>Photo</th>
                            </thead>
                            </thead>
                            <tbody>
                            @foreach($prescriptions as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->note }}</td>
                                    <td>{{ $item->address }}</td>
                                    <td>{{ $item->time }}</td>
                                    <td>
                                        <img src="{{ asset('storage/images/'.$item->photo)}}" width= '50' height='50' class="img img-responsive" />
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection