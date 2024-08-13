@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Create Contact</h1>

        <form action="{{ route('contacts.store') }}" method="POST">
            @csrf
            <div class="form-group mb-3">
                <label for="name">Name <span class="text-danger">*</span></label>
                <input type="text" name="name" class="form-control" value="{{ old('name') }}">
                @error('name')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group mb-3">
                <label for="email">Email <span class="text-danger">*</span></label>
                <input type="email" name="email" class="form-control" value="{{ old('email') }}">
                @error('email')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group mb-3">
                <label for="phone">Phone</label>
                <input type="text" name="phone" class="form-control" value="{{ old('phone') }}">
                @error('phone')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group mb-3">
                <label for="address">Address</label>
                <input type="text" name="address" class="form-control" value="{{ old('address') }}">
                @error('address')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Save contact</button>
        </form>
    </div>
@endsection
