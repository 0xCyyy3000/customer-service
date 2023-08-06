@extends('layouts.app')

@section('content')

    <div class="container bg-white p-3 rounded-3 shadow">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif


        <form class="opacity-0 position-absolute" action="{{ route('items.change-photo', $item->id) }}" method="post"
            enctype="multipart/form-data" id="photo-form">
            @csrf
            @method('PATCH')
            <input type="file" name="image" id="change-photo-btn">
        </form>

        <div class="d-flex align-items-stretch gap-4 mb-2 position-relative">
            <div class="d-flex gap-1 position-absolute bg-black bg-opacity-75 align-items-stretch p-2 text-white change-photo"
                style="cursor: pointer !important;" onclick="changePhoto()">
                <box-icon type='solid' name='image-add' color='white'></box-icon>
                <p class="m-0">Change photo</p>
            </div>
            <img src="{{ $item->image ? asset('storage/' . $item->image) : asset('assets/images/eds.png') }}"
                id="item-image"
                class="rounded-3 @if ($item->image) object-fit-cover @else object-fit-contain @endif"
                width="300" alt="" srcset="">

            <form class="row" action="{{ route('items.update', $item->id) }}" method="POST" id="item-form">
                @csrf
                @method('PUT')
                <div class="mb-3 col-md-5">
                    <label for="model" class="form-label">Model</label>
                    <input disabled required type="text" value="{{ $item->model }}" class="form-control item"
                        name="model">
                </div>
                <div class="mb-3 col-md-5">
                    <label for="serial_no" class="form-label">Serial No</label>
                    <input disabled type="text" value="{{ $item->serial_no }}" class="form-control item"
                        name="serial_no">
                </div>
                <div class="mb-3 col-md-12">
                    <label for="description" class="form-label">Description</label>
                    <textarea disabled required class="form-control item" name="description" rows="3">{{ $item->description }}</textarea>
                </div>
                <div class="mb-3 col-md-7">
                    <label for="issue" class="form-label">Issue</label>
                    <input disabled required type="text" value="{{ $item->issue }}" class="form-control item"
                        name="issue">
                </div>
                <div class="col-md-4">
                    <label for="status" class="form-label">Status</label>
                    <select disabled required name="status"
                        class="form-select @if (Auth::user()->type != 0) item @endif">
                        <option value="0" @selected(strtolower($item->status) == 'in progress')>In progress</option>
                        <option value="1" @selected(strtolower($item->status) == 'repaired')>Repaired</option>
                        <option value="2" @selected(strtolower($item->status) == 'returned')>Returned</option>
                        {{-- <option value="-1" @selected(strtolower($item->status) == 'failed')>Failed</option> --}}
                    </select>
                </div>
                <div class="col-md-5 mb-3">
                    <label for="technician" class="form-label">Technician</label>
                    <input type="text" autocomplete="off" oninput="technicianSearch(this.value)" id="technician"
                        name="technician" disabled required
                        class="form-control @if (Auth::user()->type != 0) item @endif" list="technicians"
                        placeholder="Type a name" value="{{ $item->technician }}">
                    <datalist id="technicians"></datalist>
                </div>
                <div class="mb-3 col-md-8">
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

            <div class="d-flex position-absolute bottom-0 change-photo-btns d-none">
                <div class="d-flex gap-1 bg-danger bg-opacity-75 align-items-stretch p-2 text-white"
                    style="cursor: pointer !important;" onclick="cancelChange();">
                    <box-icon name='x' color='white'></box-icon>
                    <p class="m-0">Cancel</p>
                </div>

                <div class="d-flex gap-1 bg-primary bg-opacity-75 align-items-stretch p-2 text-white"
                    style="cursor: pointer !important;" onclick="savePhoto()">
                    <box-icon name='check' color='white'></box-icon>
                    <p class="m-0">Save photo</p>
                </div>
            </div>
        </div>
        <div class="row p-1">
            <p class="text-muted mb-0">Added on
                <strong>{{ \Carbon\Carbon::parse($item->created_at)->format('M. d, Y') }}</strong>
            </p>
            <p class="text-muted mb-1">Owned by
                <strong>{{ $item->user->full_name == Auth::user()->full_name ? "You ({$item->user->full_name})" : $item->user->full_name }}</strong>
            </p>
            <button class="btn d-flex align-items-center gap-2" id="modify-btn">
                <box-icon type='solid' name='edit' color="#0c6dfd"></box-icon>
                <p class="m-0">Modify item</p>
            </button>
        </div>

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

        let technicians, clients, item;
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

        function changePhoto() {
            $('#change-photo-btn').click();
            item = "{{ asset('assets/images/items/macbook air m2.webp') }}";
        }

        function readURL(input) {
            if (input.files && input.files[0]) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    $('#item-image').attr('src', e.target.result);
                    $('#item-image').hide();
                    $('#item-image').fadeIn(650);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }
        $("#change-photo-btn").change(function() {
            readURL(this);
            $('.change-photo-btns').removeClass('d-none');
        });

        function cancelChange() {
            $('.change-photo-btns').addClass('d-none');
            $('#item-image').attr('src', item);
            $('#item-image').hide();
            $('#item-image').fadeIn(650);
        }

        function savePhoto() {
            $('#photo-form').submit();
        }
    </script>
@endsection
