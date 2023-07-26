@extends('layouts.app')

@section('content')
    <div class="container bg-white p-3 rounded-3 shadow">
        <div class="d-flex justify-content-between">
            <p class="text-muted">Owned by
                <strong>{{ $item->user->full_name == Auth::user()->full_name ? "You ({$item->user->full_name})" : $item->user->full_name }}</strong>
            </p>
            <button class="btn p-0 d-flex align-items-center gap-2 mb-4" id="modify-btn">
                <box-icon type='solid' name='edit' color="#0c6dfd"></box-icon>
                <p class="m-0">Modify item</p>
            </button>
        </div>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form class="row" action="{{ route('items.update', $item->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3 col-md-5">
                <label for="model" class="form-label">Model</label>
                <input disabled required type="text" value="{{ $item->model }}"
                    class="form-control @if (Auth::user()->type == 0) item @endif" name="model">
            </div>
            <div class="mb-3 col-md-5">
                <label for="serial_no" class="form-label">Serial No</label>
                <input disabled required type="text" value="{{ $item->serial_no }}"
                    class="form-control @if (Auth::user()->type == 0) item @endif" name="serial_no">
            </div>
            <div class="mb-3 col-md-12">
                <label for="description" class="form-label">Description</label>
                <textarea disabled required class="form-control @if (Auth::user()->type == 0) item @endif" name="description"
                    rows="3">{{ $item->description }}</textarea>
            </div>
            <div class="mb-3 col-md-5">
                <label for="issue" class="form-label">Issue</label>
                <input disabled required type="text" value="{{ $item->issue }}"
                    class="form-control @if (Auth::user()->type == 0) item @endif" name="issue">
            </div>
            <div class="col-md-2">
                <label for="status" class="form-label">Status</label>
                <select disabled required name="status" class="form-select @if (Auth::user()->type != 0) item @endif">
                    <option value="0" @selected(strtolower($item->status) == 'in progress')>In progress</option>
                    <option value="1" @selected(strtolower($item->status) == 'repaired')>Repaired</option>
                    <option value="2" @selected(strtolower($item->status) == 'returned')>Returned</option>
                    <option value="-1" @selected(strtolower($item->status) == 'failed')>Failed</option>
                </select>
            </div>
            <div class="col-md-4 mb">
                <label for="technician" class="form-label">Technician</label>
                <input type="text" autocomplete="off" oninput="technicianSearch(this.value)" id="technician"
                    name="technician" disabled required class="form-control @if (Auth::user()->type != 0) item @endif"
                    list="technicians" placeholder="Type a name" value="{{ $item->technician }}">
                <datalist id="technicians"></datalist>
            </div>
            <div class="mb-3 col-md-7">
                <label for="accessories" class="form-label">Accessories</label>
                <textarea class="form-control item" disabled required name="accessories" rows="3">{{ $item->accessories }}</textarea>
            </div>
            <div class="form-check col-md-7">
                <div class="p-3">
                    <input class="form-check-input @if (Auth::user()->type != 0) item @endif" name="has_warranty"
                        disabled type="checkbox" name="has_warranty" @checked(strtolower($item->has_warranty) == 'yes') id="has_warranty">
                    <label class="form-check-label text-primary" for="has_warranty">
                        This item has warranty
                    </label>
                </div>
            </div>
            <div class="d-flex justify-content-end gap-2 mb-2 d-none" id="form-btns">
                <button type="button" id="cancel-btn" class="btn btn-secondary">Cancel</button>
                <button type="submit" class="btn btn-primary">Save changes</button>
            </div>
        </form>
    </div>

    <script>
        $('#modify-btn').click(() => {
            $('.item').attr('disabled', false);
            $('#form-btns').removeClass('d-none');
        });
        $('#cancel-btn').click(() => {
            $('#form-btns').addClass('d-none');
            $('.item').attr('disabled', true);
        });

        let technicians, clients;

        $.ajax({
            url: "{{ route('api-v1-technicians') }}",
            method: 'GET',
            success: function(response) {
                technicians = response;
            }
        });

        function technicianSearch(query) {
            let datalist = document.getElementById('technicians');
            datalist.innerHTML = '';

            if (query.length) {
                technicians.map(technician => {
                    query.split(' ').map(function(word) {
                        if (technician.full_name.toLowerCase().indexOf(word.toLowerCase()) != -1) {
                            datalist.innerHTML +=
                                `<option value="#${technician.id}-${technician.full_name}"></option>`;
                        }
                    });
                });
            } else
                datalist.innerHTML = '';
        }
    </script>
@endsection
