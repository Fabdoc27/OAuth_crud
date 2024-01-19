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

                <form action="{{ route('auth.login') }}" method="POST">
                    @csrf
                    <h2 class="text-center mb-4">Log In</h2>

                    <div class="row">
                        <div class="col-lg-8 offset-lg-2">

                            <div class="mb-3">
                                <input type="email" name="email" placeholder="Enter Your Email"
                                    class="form-control
                                    @error('email')
                                    border border-danger
                                    @enderror"
                                    value="{{ old('email') }}">

                                @error('email')
                                    <p class="text-danger text-center mt-2">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="mb-3 mt-3">
                                <button type="submit" class="btn w-100 btn-info">Log In</button>
                            </div>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
@endsection
