@extends('layouts.app')

@section('content')
<div>
    <h1 class="contain-title">Edit Contact</h1>
    <div class="container-form">
    <form action="{{ route('contacts.update', $contact->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" class="form-control" name="name" value="{{ old('name', $contact->name) }}" required>
            @error('name')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="contact">Contact:</label>
            <input type="number" class="form-control" name="contact" value="{{ old('contact', $contact->contact) }}" required>
            @error('contact')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" class="form-control" name="email" value="{{ old('email', $contact->email) }}" required>
            @error('email')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn-update">Update</button>
    </form>
  </div>
</div>
@endsection

<style>
.contain-title {
        font-weight: bold;
        font-size: 30px;
}
.container-form {
    max-width: 320px;
    padding: 30px;
    box-shadow: rgba(0, 0, 0, 0.05) 0px 6px 24px 0px, rgba(0, 0, 0, 0.08) 0px 0px 0px 1px;
    margin-top: 50px;
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
    font-size: 18px;
}

.btn-update {
    width: 100%;
    height: 40px;
    border-radius: 10px;
    background: #0081AF;
    color: #fff;
    font-size: 16px;
    font-weight: 600;
    border: none;
    cursor: pointer;
}

.btn-update:hover {
    opacity: 0.7;
}

.alert-danger {
    color: red;
}
</style>
