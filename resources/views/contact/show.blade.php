@extends('layouts.app')

@section('content')
    <div class="container mt-3">
        <div class="d-flex justify-content-between">
            <h3>Show Contact</h3>
            <div>
                <a href="{{ route('contacts.list') }}" class="btn btn-primary ms-auto btn-sm px-3">Back</a>
            </div>
        </div>

        <table class="table table-bordered">
            <tbody>
                <tr>
                    <th>Name</th>
                    <td>{{ $contact->name }}</td>
                </tr>
                <tr>
                    <th>Email</th>
                    <td>{{ $contact->email }}</td>
                </tr>
                <tr>
                    <th>Phone</th>
                    <td>{{ $contact->phone }}</td>
                </tr>
                <tr>
                    <th>Address</th>
                    <td>{{ $contact->address }}</td>
                </tr>
                <tr>
                    <th>Created at</th>
                    <td>{{ $contact->created_at }}</td>
                </tr>
                <tr>
                    <th>Updated at</th>
                    <td>{{ $contact->updated_at }}</td>
                </tr>
            </tbody>
        </table>

    </div>
@endsection
