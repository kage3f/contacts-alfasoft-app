@extends('layouts.app')

@section('content')
    <div>
        <h1 class="contain-title">Contact Details</h1>
        <div class="container-profile">
            <div class="capa">
                <img src="{{ asset('imgs/user.png') }}" />
            </div>
            <div class="user-details">
                <h2>User details</h2>
                <div class="item">
                    <p class="title">Name</p>
                    <p>{{ $contact->name }}</p>
                </div>
                <div class="item">
                    <p class="title">Contact</p>
                    <p>{{ $contact->contact }}</p>
                </div>
                <div class="item">
                    <p class="title">E-mail</p>
                    <p>{{ $contact->email }}</p>
                </div>
                <div class="item">
                    <p class="title">Created at</p>
                    <p>{{ $contact->created_at->format('Y-m-d H:i:s') }}</p>
                </div>
            </div>
            
            <div class="container-actions">
                <a href="{{ route('contacts.edit', $contact->id) }}" class="btn">Edit</a>

                <!-- Botão de deletar que aciona o JavaScript para confirmação -->
                <button class="btn-delete" onclick="confirmDeletion()">Delete</button>

                <!-- Formulário de deleção -->
                <form id="deleteForm" action="{{ route('contacts.destroy', $contact->id) }}" method="POST" style="display:none;">
                    @csrf
                    @method('DELETE')
                </form>
            </div>
        </div>
    </div>

    <script>
        function confirmDeletion() {
            if (confirm("Tem certeza que deseja deletar este contato?")) {
                document.getElementById('deleteForm').submit();
            }
        }
    </script>
@endsection

<style>
    .contain-title {
        font-weight: bold;
        font-size: 30px;
    }

    .container-profile {
        width: 700px;
        box-shadow: rgba(0, 0, 0, 0.15) 0px 15px 25px, rgba(0, 0, 0, 0.05) 0px 5px 10px;
        border-radius: 10px;
        padding-bottom: 50px;
        margin: 50px auto auto auto;
    }

    .capa {
        background-image: url('{{ asset('imgs/capa.png') }}');
        background-position: center;
        height: 120px;
        border-radius: 10px;
        background-size: cover;
        position: relative;
    }

    .capa img {
        position: absolute;
        left: 5%;
        top: 70%;
        display: block;
    }

    .user-details {
        margin-top: 60px;
        padding-left: 50px;
        width: 250px;
    }

    .user-details h2 {
        color: #a09b9b;
        font-weight: 900;
    }

    .user-details .item {
        margin-top: 20px;
    }

    .user-details .item .title {
        color: #332a8a;
        font-weight: 600;
        font-size: 16px;
        margin-bottom: 6px;
    }

    .container-actions {
        padding-left: 50px;
        width: 200px;
    }

    .container-actions a {
        width: 100%;
        height: 36px;
        background: #15c22a;
        border-radius: 4px;
        display: flex;
        justify-content: center;
        color: #fff;
        align-items: center;
        max-width: 200px;
        margin-top: 20px;
        font-weight: 600;
    }

    .btn-delete {
        display: block;
        width: 100%;
        padding: 10px 10px;
        background: red;
        border-radius: 4px;
        color: #fff;
        margin-top: 20px;
        font-weight: 600;
        border: none;
        cursor: pointer;
    }

    .btn-delete-contain {
        width: auto;
        display: block !important;
    }

    .btn-delete-contain button {
        width: 200px;
        margin-top: 20px;
        padding: 10px;
        
        border-radius: 4px;
        display: block !important;
    }

    @media(max-width: 992px){
        .container-profile {
            width: 100%;
        }
    }
</style>