@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="contain-title-button">
                    <h1>Contacts</h1>
                    <a href="{{ route('contacts.create') }}" class="btn-create">Add New Contact</a>
                </div>

                <div class="container-table">
                @if(session('success'))
                    <div class="alert alert-success" id="successAlert">
                        {{ session('success') }}
                    </div>
                @endif

                <div class="container-search">
                <form action="{{ route('contacts.index') }}" method="GET">
                    <input type="text" name="search" placeholder="Search contacts...">
                    <button type="submit">Search</button>
                </form>
                </div>
                 <table class="table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Contact Name</th>
                            <th>Contact Email</th>
                            <th>Created At</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
    @forelse ($contacts as $contact)
        <tr>
            <td>{{ $contact->id }}</td>
            <td>{{ $contact->name }}</td>
            <td>{{ $contact->email }}</td>
            <td>{{ $contact->created_at->format('Y-m-d H:i:s') }}</td>
            <td class="action-buttons">
                <a href="{{ route('contacts.show', $contact->id) }}" class="btn-view"><img src="{{ asset('imgs/view.png') }}"></a>
                <a href="{{ route('contacts.edit', $contact->id) }}" class="btn-edit"><img src="{{ asset('imgs/edit.png') }}"></a>
                <form id="deleteForm" action="{{ route('contacts.destroy', $contact->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit"><img src="{{ asset('imgs/delete.png') }}"></button>
                </form>
            </td>
        </tr>
    @empty
        @if(request()->has('search') && request('search') != '')
            <tr><td colspan="5" class="text-center">Nenhum resultado encontrado para "{{ request('search') }}"</td></tr>
        @else
            <tr><td colspan="5" class="text-center">Nenhum contato cadastrado</td></tr>
        @endif
    @endforelse
</tbody>

                </table>
                <div class="paginate-container">{{ $contacts->links('pagination::default') }}</div>
            </div>
          </div>
        </div>
    </div>

@endsection
<script>
document.addEventListener('DOMContentLoaded', function () {
    const deleteForm = document.getElementById('deleteForm');

    deleteForm.addEventListener('submit', function (event) {
        event.preventDefault(); // Impede o envio do formulário imediatamente

        // Mostra um diálogo de confirmação
        const confirmed = confirm('Tem certeza de que deseja deletar este contato?');

        // Se o usuário confirmar, envia o formulário
        if (confirmed) {
            this.submit(); // 'this' refere-se ao formulário
        }
        // Se o usuário não confirmar, nada acontece e o formulário não é enviado
    });
});
</script>


<style>
    .container .row{
        width: 100%;
    }
    .contain-title-button {
        display: flex;
        justify-content: space-between;
    }

    .contain-title-button h1 {
        font-weight: bold;
        font-size: 30px;
    }

    .table {
        width: 100%;
        border-collapse: collapse;
    }

    .table th, .table td {
        padding: 8px;
        text-align: left;
        border-bottom: 1px solid #ddd;
    }

    .table th {
        background-color: #00ABE7;
        font-weight: bold;
        color: #F4F4F4;
    }

    .table .bg-success {
        background: green !important;
    }

    /* Estilos para os botões de ação */

    .action-buttons {
        display: flex;
        gap: 6px;
    }

    .action-buttons a {
        border-radius: 10px;
        width: 32px;
        height: 32px;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .action-buttons a img {
        width: 16px;
        height: 16px;
    }

    .action-buttons button img {
        width: 16px;
        object-fit; cover;
        height: 16px;
    }

    .action-buttons button {
        width: 32px;
        height: 32px;
        display: flex;
        border-radius: 10px;
        align-items: center;
        justify-content: center;
        background: #f61717;
        border:none;
        cursor: pointer;     
    }

    .action-buttons button:hover {
        opacity: 0.8;
    }

    .btn-view {
        background-color: #007bff;
        color: #fff;
    }

    .btn-edit {
        background-color: #28a745;
        color: #fff;
    }

    .btn-delete {
        background-color: #dc3545;
        color: #fff;
    }

    .btn-create {
        background: #04ce04;
        color: #fff;
        padding: 10px 20px;
        border-radius: 10px;
        font-weight: 600;
    }

    .alert-success {
        color: green;
        font-weight: 700;
        font-size: 20px;
        margin-bottom: 20px;
    }

    .container-table {
        margin-top: 100px;
    }

    nav.pagination svg {
        width: 20px; 
        height: 20px; 
    }

    .paginate-container {
        margin-top: 30px;
    }

    .container-search {
        display: flex;
        justify-content: center;
        margin-bottom: 20px;
    }

    .container-search input {
        width: 300px;
        height: 40px;
        border-radius: 12px;
        border: 1px solid #ccc;
        padding-left: 20px;
    }

    .container-search button {
        height: 40px;
        border-radius: 10px;
        border: none;
        background: #2DC7FF;
        color: #fff;
        cursor: pointer;
        font-size: 16px;
        padding: 0 16px;
    }

    .container-search button:hover {
        opacity: 0.8;
    }

</style>

<script>
        setTimeout(function() {
            document.getElementById('successAlert').style.display = 'none';
        }, 6000);
</script>
