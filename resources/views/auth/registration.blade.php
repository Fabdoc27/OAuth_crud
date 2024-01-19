@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6 center-screen card shadow p-3" style="margin-top: 150px">

                @if (session('error'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <p class="text-center m-0">{{ session('error') }}</p>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @elseif (session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <p class="text-center m-0">{{ session('success') }}</p>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif


                <form action="{{ route('auth.register') }}" method="POST">
                    @csrf
                    <h2 class="text-center">Registration</h2>

                    <div class="row">
                        <div class="col-lg-8 offset-lg-2">

                            <div class="mb-3">
                                <label for="user_name" class="form-label">Name</label>
                                <input type="text" name="name"
                                    class="form-control
                                    @error('name')
                                    border border-danger
                                    @enderror"
                                    id="user_name" value="{{ old('name') }}">

                                @error('name')
                                    <p class="text-danger text-center mt-2">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="email_address" class="form-label">Email</label>
                                <input type="email" name="email"
                                    class="form-control
                                    @error('email')
                                    border border-danger
                                    @enderror"
                                    id="email_address" value="{{ old('email') }}">

                                @error('email')
                                    <p class="text-danger text-center mt-2">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="mb-3 mt-4">
                                <button type="submit" class="btn w-100 btn-info">Register</button>
                            </div>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
@endsection
