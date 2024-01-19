@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-8 offset-lg-2">
                @if (session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                <h1 class="text-center mb-3">Edit Product</h1>

                <form method="post" action="{{ route('update', $contact->id) }}">
                    @csrf



                    <div class="mb-3">
                        <label class="form-label">Contact Name</label>
                        <input type="text" class="form-control" name="name" value="{{ old('name', $contact->name) }}">
                        @error('name')
                            <p class="text-danger text-center mt-2">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Contact Email</label>
                        <input type="email" class="form-control" name="email"
                            value="{{ old('quantity', $contact->email) }}">
                        @error('email')
                            <p class="text-danger text-center mt-2">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Contact Phone</label>
                        <input type="tel" class="form-control" name="phone"
                            value="{{ old('phone', $contact->phone) }}">
                        @error('phone')
                            <p class="text-danger text-center mt-2">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mt-4">
                        <button type="submit" class="btn btn-success">Update Contact</button>
                        <a href="{{ route('index') }}" class="btn btn-primary ms-2">Go Back</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
