@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="container-form">
            <form method="POST" action="{{ route('login') }}">
                @csrf

                <div class="form-group">
                    <label for="email">E-mail:</label>
                    <input type="email" name="email" id="email" class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" value="{{ old('email') }}" required autofocus>
                    @if ($errors->has('email'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="form-group">
                    <label for="password">Senha:</label>
                    <input type="password" name="password" id="password" class="form-control {{ $errors->has('password') ? 'is-invalid' : '' }}" required>
                    @if ($errors->has('password'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
                </div>

                <div style="width: 100%; text-align: right;">
                    <button type="submit" class="btn-submit">Entrar</button>
                </div>
            </form>
        </div>
    </div>

<style>
        .container {
            height: 100vh; 
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .container-form {
            max-width: 320px;
            padding: 30px;
            box-shadow: rgba(0, 0, 0, 0.05) 0px 6px 24px 0px, rgba(0, 0, 0, 0.08) 0px 0px 0px 1px;
            margin-top: -50px;
            border-radius: 6px;
        }

        .form-group {
            display: flex;
            flex-direction: column;
            gap: 6px;
            margin-bottom: 16px;
        }

        .form-group input {
            height: 40px;
            padding-left: 10px;
            border-radius: 10px;
            border: 1px solid #ccc; 
            font-size: 16px; /
        }

        .btn-submit {
            background-color: green;
            color: #fff;
            padding: 10px 20px; 
            border: none;
            border-radius: 10px;
            cursor: pointer;
            font-size: 16px;
        }

        .invalid-feedback strong {
            color: red; 
        }
    </style>

@endsection