@extends('Layout.Index')

@section('rbody')
    <style>
        .inp {
            position: relative;
            height: 50px;
            width: 100%
        }

        .inpbox {
            position: absolute;
            padding: 0 35px;
            height: 100%;
            width: 100%;
            border: none;
            outline: none;
            font-size: 16px;
            border-bottom: 2px solid #ccc;
            transition: 0.3s ease-out;
        }

        .inp i {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            color: #999;
            font-size: 23px;
            transition: 0.3s ease-out;
        }

        .ers {
            border-bottom-color: red;
        }
    </style>
@endsection
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
                        {{ auth()->user()->username }}
                    </div>
                @endauth
                <a href="{{ route('logout') }}" style="color: white">Logout</a>
            </div>
        </div>
    </nav>
    <div class="container">
        <div class="row d-flex vh-100 justify-content-center align-content-center">
            <div class="col-5 bg-white p-5 shadow">
                <h1 class="text-center pb-4">Edit the Records</h1>
                <form class="d-flex flex-column" action="{{ route('editdata') }}" method="POST">
                    @csrf
                    <div class="mb-3 inp">
                        <input type="hidden" value="{{ $data->id }}" name="id">
                    </div>

                    <div class="mb-3 inp">
                        <input type="text" class="inpbox @error('num') ers @enderror" placeholder="{{ $data->BthNo }}"
                            title="Please enter product BatchNo." name="num" value="{{ old('num') }}">
                        <i class="uil uil-key-skeleton i"></i>
                        @error('num')
                            <i class="uil uil-exclamation-octagon" style="right:0;color:red"></i>
                        @enderror
                    </div>
                    @error('num')
                        <span style="color: red;padding:0 0 2px 30px ; margin: -10px 0 0 0;">{{ $message }}</span>
                    @enderror


                    <div class="mb-3 inp">
                        <input type="text" class="inpbox  @error('name') ers @enderror"
                            placeholder="{{ $data->Name }}" title="Please enter your name" name="name"
                            value="{{ old('name') }}">
                        <i class="uil uil-tag-alt i"></i>
                        @error('name')
                            <i class="uil uil-exclamation-octagon" style="right:0;color:red"></i>
                        @enderror
                    </div>
                    @error('name')
                        <span style="color: red;padding:0 0 2px 30px ; margin: -10px 0 0 0;">{{ $message }}</span>
                    @enderror



                    <div class="mb-3 inp">
                        <input type="text" class="inpbox  @error('quantity') ers @enderror"
                            placeholder="{{ $data->Quantity }}" title="Please enter product quantity" name="quantity"
                            value="{{ old('quantity') }}">
                        <i class="uil uil-cube i"></i>
                        @error('quantity')
                            <i class="uil uil-exclamation-octagon" style="right:0;color:red"></i>
                        @enderror
                    </div>
                    @error('quantity')
                        <span style="color: red;padding:0 0 2px 30px ; margin: -10px 0 0 0;">{{ $message }}</span>
                    @enderror



                    <div class="mb-3 inp d-flex">
                        <label for="status" class="m-auto">Status:</label>
                        <select name="status"
                            style="width: 100%;height:100%; border-radius:5px; margin-left:20px;padding:2px">
                            <option value="Good">Good</option>
                            <option value="Average">Average</option>
                            <option value="Bad">Bad</option>
                        </select>
                    </div>
                    @error('status')
                        <span style="color: red;padding:0 0 2px 30px ; margin: -10px 0 0 0;">{{ $message }}</span>
                    @enderror

                    <div class="mb-3">
                        <textarea name="description" rows="7" placeholder="{{ $data->Description }}"
                            style="width: 100%;padding:10px 0 0 10px;resize:none;"></textarea>
                    </div>
                    @error('description')
                        <span style="color: red;padding:0 0 2px 30px ; margin: -10px 0 0 0;">{{ $message }}</span>
                    @enderror


                    <button type="submit" class="btn btn-primary mt-3">Edit Record</button>
                </form>
            </div>
        </div>
    </div>
    <script>
        window.onload = () => {
            let input = document.querySelectorAll('.inpbox');
            let i = document.querySelectorAll('.i');
            input.forEach((element, a) => {
                element.addEventListener('focus', () => {
                    element.style.borderBottom = "2px solid #4070f4";
                    i.forEach((item, b) => {
                        if (a == b) {
                            item.style.color = "#4070f4";
                        }
                    });
                })
                element.addEventListener('blur', () => {
                    element.style.borderBottom = "2px solid #ccc";
                    i.forEach((item) => {
                        item.style.color = "#ccc";
                    });

                })
            });
        }
    </script>
@endsection
