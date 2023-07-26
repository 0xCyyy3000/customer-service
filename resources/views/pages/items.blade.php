@extends('layouts.app')

@section('content')
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="container p-3 rounded-3 shadow card" style="">
        <div class="container p-0 mb-3">
            <button class="btn btn-primary d-flex align-items-center gap-1" type="button" data-bs-toggle="offcanvas"
                data-bs-target="#offcanvasRight" aria-controls="offcanvasRight">
                <box-icon name='plus' color='white'></box-icon>
                New item
            </button>
        </div>
        <livewire:item-table />
    </div>

    <div class="offcanvas offcanvas-end" data-bs-backdrop="static" tabindex="-1" id="offcanvasRight"
        aria-labelledby="offcanvasRightLabel">
        <div class="offcanvas-header">
            <h5 class="offcanvas-title" id="offcanvasRightLabel">New item</h5>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" id="close-canvas"
                aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
            <form class="row g-3" method="POST" action="{{ route('items.store') }}">
                @csrf

                @if (Auth::user()->type != 0)
                    <div class="col-md-12">
                        <label for="client" class="form-label">Owner</label>
                        <input type="text" autocomplete="off" oninput="clientSearch(this.value)" id="client"
                            name="user_id" required class="form-control new-item" list="clients" placeholder="Type a name">
                        <datalist id="clients"></datalist>
                    </div>
                @else
                    <input type="hidden" name="user_id" value="{{ Auth::user()->id }}" readonly>
                @endif

                <div class="col-md-12">
                    <label for="model" class="form-label">Model</label>
                    <input type="text" class="form-control new-item" name="model" placeholder="Brand/Model of item"
                        autocomplete="off">
                </div>
                <div class="col-md-12">
                    <label for="description" class="form-label">Description</label>
                    <input type="text" class="form-control new-item" name="description" placeholder="Describe your item"
                        autocomplete="off">
                </div>
                <div class="col-md-12">
                    <label for="issue" class="form-label">Issue</label>
                    <input type="text" class="form-control new-item" name="issue" placeholder="What's the problem?"
                        autocomplete="off">
                </div>
                <div class="col-md-12">
                    <label for="serial_no" class="form-label">Serial no</label>
                    <input type="text" class="form-control new-item" name="serial_no" placeholder="(optional)"
                        autocomplete="off">
                </div>
                <div class="col-12 d-flex p-3">
                    <button type="submit" class="btn btn-primary w-100 m-auto align-self-center rounded-4">
                        Save item</button>
                </div>
            </form>
        </div>
    </div>

    <script>
        $('#close-canvas').click(() => $('.new-item').val(''));

        $.ajax({
            url: "{{ route('api-v1-clients') }}",
            method: 'GET',
            success: function(response) {
                clients = response;
            }
        });

        function clientSearch(query) {
            let datalist = document.getElementById('clients');
            datalist.innerHTML = '';

            if (query.length) {
                clients.map(client => {
                    query.split(' ').map(function(word) {
                        if (client.full_name.toLowerCase().indexOf(word.toLowerCase()) != -1) {
                            datalist.innerHTML +=
                                `<option value="#${client.id}-${client.full_name}"></option>`;
                        }
                    });
                });
            } else
                datalist.innerHTML = '';
        }
    </script>
@endsection
