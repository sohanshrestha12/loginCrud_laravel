@extends('Layout.Index')

@section('rbody')
    <style>
        body {
            background: #4070f4;
        }

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
    <div class="container">
        <div class="row d-flex vh-100 justify-content-center align-content-center">
            <div class="col-4 bg-white p-5">
                @if (Session::has('err'))
                    <div class="alert alert-danger text-center" role="alert">
                        {{Session::get('err')}}
                    </div>
                @endif
                <h1 class="text-center pb-4">Login</h1>
                <form class="d-flex flex-column" action="{{ route('login') }}" method="POST">
                    @csrf
                    <div class="mb-3 inp">
                        <input type="email" class="inpbox  @error('email') ers @enderror" placeholder="Enter your email"
                            title="Please enter your email" name="email" value="{{old('email')}}">
                        <i class="uil uil-envelope i"></i>
                        @error('email')
                            <i class="uil uil-exclamation-octagon" style="right:0;color:red"></i>
                        @enderror
                    </div>
                    @error('email')
                        <span style="color: red;padding:0 0 2px 30px ; margin: -10px 0 0 0;">{{ $message }}</span>
                    @enderror



                    <div class="mb-3 inp">
                        <input type="password" class="inpbox  @error('password') ers @enderror"
                            placeholder="Enter your password" title="Please enter your password" name="password">
                        <i class="uil uil-lock i"></i>
                        @error('password')
                            <i class="uil uil-exclamation-octagon" style="right:0;color:red"></i>
                        @enderror
                    </div>
                    @error('password')
                        <span style="color: red;padding:0 0 2px 30px ; margin: -10px 0 0 0;">{{ $message }}</span>
                    @enderror
                    <button type="submit" class="btn btn-primary mt-3">LogIn Now</button>
                    <div class="mt-5 text-center">
                        <span>Don't have an account?</span>
                        <a href="{{ route('register') }}">SignUp Now</a>
                    </div>
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
