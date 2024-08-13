@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Contact List</h1>

        <form method="GET" action="{{ route('contacts.list') }}">
            <div class="row">
                <div class="col-lg-7">
                    <div class="form-group">
                        <input type="text" required name="search" class="form-control" placeholder="Search by name or email"
                            value="{{ request('search') }}">
                    </div>
                </div>
                <div class="col-lg-2">
                    <button type="submit" class="btn btn-primary">Search</button>
                </div>
            </div>
        </form>

        <table class="table table-striped mt-4">
            <thead>
                <tr>
                    <th><a class="text-decoration-none cursor-pointer"
                            href="{{ route('contacts.list', ['sort' => 'name', 'search' => request('search')]) }}">Name</a></th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Address</th>
                    <th><a class="text-decoration-none cursor-pointer"
                            href="{{ route('contacts.list', ['sort' => 'created_at', 'search' => request('search')]) }}">Created at</a></th>
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
                        <td>
                            <a href="{{ route('contacts.show', $contact->id) }}" class="btn btn-info btn-sm">View</a>
                            {{-- <a href="{{ route('contacts.edit', $contact->id) }}" class="btn btn-warning btn-sm">Edit</a> --}}
                            {{-- <form action="{{ route('contacts.destroy', $contact->id) }}" method="POST"
                                style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                            </form> --}}
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        {{-- {{ $contacts->links() }} --}}
    </div>
@endsection
