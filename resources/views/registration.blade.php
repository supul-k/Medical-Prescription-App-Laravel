@extends('main')

@section('content')

<div class="container-fluid" style="width: 100%">
    <section class="vh-100">
        <div class="mask d-flex align-items-center h-100 gradient-custom-3">
            <div class="container h-100 mt-5 mb-5">
                <div class="row d-flex justify-content-center align-items-center h-100">
                    <div class="col-12 col-md-9 col-lg-7 col-xl-6">
                        <div class="card" style="border-radius: 15px;">
                            <div class="card-body p-5">
                                <h2 class="text-uppercase text-center mb-5">Create an account</h2>

                                <form action="{{ route('user.validate_registration') }}" method="POST">
                                    @csrf
                                    <div class="form-outline mb-4">
                                        <input type="text" id="form3Example1cg"
                                            class="form-control form-control-lg" name="name"/>
                                        <label class="form-label" for="form3Example1cg">Your Name</label>
                                        @if ($errors->has('name'))
                                            <span class="text-danger">{{ $errors->first('name') }}</span>
                                        @endif
                                    </div>

                                    <div class="form-outline mb-4">
                                        <input type="email" id="form3Example3cg"
                                            class="form-control form-control-lg" name="email"/>
                                        <label class="form-label" for="form3Example3cg">Your Email</label>
                                        @if ($errors->has('email'))
                                            <span class="text-danger">{{ $errors->first('email') }}</span>
                                        @endif
                                    </div>

                                    <div class="form-outline mb-4">
                                        <input type="text" id="form3Example1cg"
                                            class="form-control form-control-lg" name="address"/>
                                        <label class="form-label" for="form3Example1cg">Your Address</label>
                                        @if ($errors->has('address'))
                                            <span class="text-danger">{{ $errors->first('address') }}</span>
                                        @endif
                                    </div>

                                    <div class="form-outline mb-4">
                                        <input type="text" id="form3Example1cg"
                                            class="form-control form-control-lg" name="contact_no"/>
                                        <label class="form-label" for="form3Example1cg">Contact Number</label>
                                        @if ($errors->has('contact_no'))
                                            <span class="text-danger">{{ $errors->first('contact_no') }}</span>
                                        @endif
                                    </div>

                                    <div id="date-picker-example" class="md-form md-outline input-with-post-icon datepicker mb-4" inline="true">
                                        <input type="date" id="example" class="form-control form-control-lg" name="DOB">
                                        <label class="form-label" for="form3Example4cg">Date of Birth</label>
                                        <i class="fas fa-calendar input-prefix"></i>
                                        @if ($errors->has('DOB'))
                                            <span class="text-danger">{{ $errors->first('DOB') }}</span>
                                        @endif
                                    </div>

                                    <div class="form-outline mb-4">
                                        <select class="form-control form-control-lg" aria-label=".form-select-lg example" name="type">                                            <option selected>Open this select menu</option>
                                            <option value=1>Customer</option>
                                            <option value=2>Pharmacist</option>
                                        </select>
                                        <label class="form-label" for="form3Example4cg">Select Role</label>
                                        @if ($errors->has('type'))
                                            <span class="text-danger">{{ $errors->first('type') }}</span>
                                        @endif
                                    </div>

                                    <div class="form-outline mb-4">
                                        <input type="password" id="form3Example4cg"
                                            class="form-control form-control-lg" name="password"/>
                                        <label class="form-label" for="form3Example4cg">Password</label>
                                        @if ($errors->has('password'))
                                            <span class="text-danger">{{ $errors->first('password') }}</span>
                                        @endif
                                    </div>

                                    <div class="d-flex justify-content-center">
                                        <button type="submit" class="btn btn-success btn-block btn-lg gradient-custom-4 text-body">Register</button>
                                    </div>

                                    <p class="text-center text-muted mt-5 mb-0">Have already an account? 
                                        <a href="{{ route('login') }}" class="fw-bold text-body"><u>Login here</u></a>
                                    </p>

                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

@endsection
