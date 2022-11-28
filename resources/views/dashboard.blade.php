@extends('Layout.Index')

@section('content')
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container-fluid">
            <a class="navbar-brand" href="{{ route('dashboard') }}">CRUD App</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="{{ route('dashboard') }}">All Records</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('addview') }}">Add-Records</a>
                    </li>
                </ul>
                @auth
                    <div style="margin-right:20px; color:white;font-size:20px;font-weight:bold;text-transform:uppercase;">
                        {{auth()->user()->username}}
                    </div>
                @endauth
                <a href="{{ route('logout') }}" style="color: white">Logout</a>
            </div>
        </div>
    </nav>
    <h1 class="text-center mt-3 mb-5">Available Records</h1>
    <div class="container">
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>BatchNo</th>
                    <th>Name</th>
                    <th>Quantity</th>
                    <th>Status</th>
                    <th>Description</th>
                    <th>Created_AT</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($list as $item)
                    <tr>
                        <td>{{ $item->id }}</td>
                        <td>{{ $item->BthNo }}</td>
                        <td>{{ $item->Name }}</td>
                        <td>{{ $item->Quantity }}</td>
                        <td>{{ $item->Status }}</td>
                        <td>{{ $item->Description }}</td>
                        <td>{{ $item->created_at }}</td>
                        <td>
                            <a href="{{url('edit/'.$item->id)}}" title="Edit"><i class="uil uil-edit" style="font-size: 22px; color:white;background:skyblue;padding:2px 7px;border-radius:5px"></i></a>
                            <a href="{{url('delete/' . $item->id)}}" title="Delete"><i class="uil uil-trash-alt" style="font-size: 22px; color:white;background:red;padding:2px 7px;border-radius:5px"></i></a>
                        </td>
                    </tr>
                @endforEach
            </tbody>
        </table>
    </div>
@endsection
