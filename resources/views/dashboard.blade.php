@extends('layouts.app')

@push('styles')
    <style>
        .btn-grad {
            background-image: linear-gradient(to right, #314755 0%, #26a0da 51%, #314755 100%);
            margin-top: 10px;
            padding: 10px 30px;
            text-align: center;
            text-transform: uppercase;
            transition: 0.5s;
            background-size: 200% auto;
            color: white;
            box-shadow: 0 0 20px #eee;
            border-radius: 10px;
            display: inline-block;
        }

        .btn-grad:hover {
            background-position: right center;
            color: #fff;
            text-decoration: none;
        }
    </style>
@endpush
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <h3 class="my-3">Dashboard</h3>
                <p class="alert alert-info">
                    Welcome, {{ ucwords(auth()->user()->name) }}
                </p>
                <a href="{{ route('index') }}" class="btn btn-grad">All Contacts</a>
            </div>
        </div>
    </div>
@endsection
