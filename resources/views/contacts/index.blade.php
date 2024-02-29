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
                <div class="sort-options">
                    <a href="{{ route('contacts.index', ['order_by' => 'created_at', 'sort' => 'desc']) }}"
                    class="{{ request('order_by', 'created_at') == 'created_at' && request('sort', 'desc') == 'desc' ? 'sort-option-active' : '' }}">
                        Mais Recentes
                    </a>
                    <a href="{{ route('contacts.index', ['order_by' => 'created_at', 'sort' => 'asc']) }}"
                    class="{{ request('order_by') == 'created_at' && request('sort') == 'asc' ? 'sort-option-active' : '' }}">
                        Mais Antigos
                    </a>
                </div>


                <form action="{{ route('contacts.index') }}" method="GET">
                    <input type="text" name="search" placeholder="Search contacts...">
                    <button type="submit">Search</button>
                </form>
                </div>
                <div>
                 <table class="table table-container">
                    <thead class="table-header">
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Contact</th>
                            <th>E-mail</th>
                            <th>Created At</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody class="table-body">
    @forelse ($contacts as $contact)
        <tr>
            <td>{{ $contact->id }}</td>
            <td>{{ $contact->name }}</td>
            <td>{{ $contact->contact }}</td>
            <td>{{ $contact->email }}</td>
            <td>{{ $contact->created_at->format('Y-m-d H:i:s') }}</td>
            <td class="action-buttons">
                <a href="{{ route('contacts.show', $contact->id) }}" class="btn-view"><img src="{{ asset('imgs/view.png') }}"></a>
                <a href="{{ route('contacts.edit', $contact->id) }}" class="btn-edit"><img src="{{ asset('imgs/edit.png') }}"></a>
                <form class="deleteForm" action="{{ route('contacts.destroy', $contact->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit"><img src="{{ asset('imgs/delete.png') }}"></button>
                </form>
            </td>
        </tr>
    @empty
        @if(request()->has('search') && request('search') != '')
            <tr><td colspan="6" class="text-center">Nenhum resultado encontrado para "{{ request('search') }}"</td></tr>
        @else
            <tr><td colspan="6" class="text-center">Nenhum contato cadastrado</td></tr>
        @endif
    @endforelse
</tbody>

</table>
</div>
               
<div class="cards-container mobile-only">
    @forelse ($contacts as $contact)
        <div class="card">
            <div class="card-content">
                <p><strong>ID:</strong> {{ $contact->id }}</p>
                <p><strong>Name:</strong> {{ $contact->name }}</p>
                <p><strong>Contact:</strong> {{ $contact->contact }}</p>
                <p><strong>Email:</strong> {{ $contact->email }}</p>
                <p><strong>Created At:</strong> {{ $contact->created_at->format('Y-m-d H:i:s') }}</p>
                <div class="action-buttons" style="margin-top: 10px; justify-content: flex-end !important;">
                    <a href="{{ route('contacts.show', $contact->id) }}" class="btn-view"><img src="{{ asset('imgs/view.png') }}"></a>
                    <a href="{{ route('contacts.edit', $contact->id) }}" class="btn-edit"><img src="{{ asset('imgs/edit.png') }}"></a>
                    <form class="deleteForm" action="{{ route('contacts.destroy', $contact->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit"><img src="{{ asset('imgs/delete.png') }}"></button>
                    </form>
                </div>
            </div>
        </div>
    @empty
    @endforelse
</div>
                <div class="paginate-container">{{ $contacts->links('pagination::default') }}</div>
            </div>
          </div>
        </div>
    </div>

@endsection

<script>
document.addEventListener('DOMContentLoaded', function () {
    const deleteForms = document.querySelectorAll('.deleteForm'); 

    deleteForms.forEach(function(form) {
        form.addEventListener('submit', function (event) {
            event.preventDefault();

            const confirmed = confirm('Tem certeza de que deseja deletar este contato?');
            if (confirmed) {
                form.submit();
            }
        });
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
        height: 20px;
        max-height: 40px;
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
        justify-content: space-between;
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

    

.table-container {
    display: table;
}


.cards-container {
    display: none; 
}

.card {
    background-color: #f9f9f9;
    margin-bottom: 15px;
    border: 1px solid #ddd;
    border-radius: 5px;
    padding: 10px;
}

.action-buttons {
    display: flex;
    gap: 10px;
    justify-content: center; 
}

.sort-options {
    display: flex;
    gap: 10px;
}

.sort-options a {
    height: 20px;
    padding: 10px;
    font-size: 14px;
    border: 1px solid #ccc;
    border-radius: 10px;
    display: flex;
    justify-content: center;
    align-items: center;
    color: black;
}

.sort-option-active {
    background-color: #007bff;
    color: white !important;
    font-weight: 600; 
}


@media (max-width: 768px) {
    /* Oculta a tabela */
    .table-container {
        display: none;
    }

    /* Exibe os cards */
    .cards-container {
        display: block;
    }

}

</style>

<script>
        setTimeout(function() {
            document.getElementById('successAlert').style.display = 'none';
        }, 6000);
</script>
