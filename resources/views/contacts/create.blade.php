@extends('layouts.app')

@section('content')
    <div>
        <h1 class="contain-title">Add New Contact</h1>
        <form action="{{ route('contacts.store') }}" method="POST">
            @csrf
            
            <div class="container-form">
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" name="name" value="{{ old('name') }}" required>
                @if ($errors->has('name'))
                    <div class="alert-danger">
                        {{ $errors->first('name') }}
                    </div>
                @endif
            </div>
            <div class="form-group">
                <label for="contact">Contact:</label>
                <input type="text" class="form-control {{ $errors->has('contact') ? 'is-invalid' : '' }}" name="contact" value="{{ old('contact') }}" required>
                @if ($errors->has('contact'))
                    <div class="alert-danger">
                        {{ $errors->first('contact') }}
                    </div>
                @endif
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>
                @if ($errors->has('email'))
                    <div class="alert-danger">
                        {{ $errors->first('email') }}
                    </div>
                @endif
            </div>
            <button type="submit" class="btn-create">Submit</button>
        </div>
        </form>
    </div>
@endsection

<style>
    .contain-title {
        font-weight: bold;
        font-size: 30px;
    }
    .invalid-feedback {
        display: block; /* Garante que a mensagem de erro será exibida */
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
    font-size: 18px;
}

.container-form {
    max-width: 320px;
    padding: 30px;
    box-shadow: rgba(0, 0, 0, 0.05) 0px 6px 24px 0px, rgba(0, 0, 0, 0.08) 0px 0px 0px 1px;
    margin-top: 50px;
    border-radius: 6px;
}

.btn-create {
    width: 100%;
    height: 40px;
    border-radius: 10px;
    background: green;
    color: #fff;
    font-size: 16px;
    font-weight: 600;
    border: none;
    cursor: pointer;
}

.btn-create:hover {
    opacity: 0.7;
}

.alert-danger {
    color: red;
}
</style>
