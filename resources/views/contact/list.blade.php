@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <h1>Contact List</h1>

            <form class="mb-4" method="GET" action="{{ route('contacts.list') }}">
                <div class="row">
                    <div class="col-lg-7">
                        <div class="form-group">
                            <input type="text" name="search" class="form-control" placeholder="Search by name or email"
                                value="{{ request('search') }}">
                        </div>
                    </div>
                    <div class="col-lg-2">
                        <button type="submit" class="btn btn-primary">Search</button>
                    </div>
                </div>
            </form>

            @if (Session::get('success'))
                <div class="alert alert-primary alert-dismissible fade show" role="alert">
                    <strong>{{ Session::get('success') }}</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <table class="table table-striped mt-4">
                <thead>
                    <tr>
                        <th><a class="text-decoration-none cursor-pointer"
                                href="{{ route('contacts.list', ['sort' => 'name', 'search' => request('search')]) }}">Name</a>
                        </th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Address</th>
                        <th><a class="text-decoration-none cursor-pointer"
                                href="{{ route('contacts.list', ['sort' => 'created_at', 'search' => request('search')]) }}">Created
                                at</a></th>
                        <th>Updated at</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($contacts as $contact)
                        <tr>
                            <td>{{ $contact->name }}</td>
                            <td>{{ $contact->email }}</td>
                            <td>{{ $contact->phone }}</td>
                            <td>{{ $contact->address }}</td>
                            <td>{{ $contact->created_at }}</td>
                            <td>{{ $contact->updated_at }}</td>
                            <td>
                                <div class="d-flex gap-3">
                                    <a href="{{ route('contacts.show', $contact->id) }}"
                                        class="btn btn-info btn-sm">View</a>
                                    <a href="{{ route('contact.edit', $contact->id) }}"
                                        class="btn btn-warning btn-sm">Edit</a>
                                    <form action="{{ route('contact.delete', $contact->id) }}" method="POST"
                                        style="display: inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
