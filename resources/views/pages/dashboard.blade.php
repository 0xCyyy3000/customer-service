@extends('layouts.app')

@section('content')
    <style>
        section.d-flex div.card:hover {
            transform: scale(105%);
            transition: all 100ms ease-out;
        }
    </style>

    <section class="d-flex flex-wrap mb-4">
        <div class="card mb-3 me-3 p-3 bg-white border-0 shadow") @style(['width: 240px' => Auth::user()->type == 0, 'width: min(210px, 210px)' => Auth::user()->type > 0])>
            <div class="d-flex align-items-center m-auto">
                <div class="">
                    <box-icon name='calendar-check' size='lg' type='light'></box-icon>
                </div>
                <div class="card-body alignt-items-baseline">
                    <h5 class="card-title mb-0 fs-5">{{ $appointments }}</h5>
                    <p class="card-text fs-6"><small class="text-body-secondary">Appoinments</small></p>
                </div>
            </div>
        </div>
        <div class="card mb-3 me-3 p-3 bg-white border-0 shadow" @style(['width: 240px' => Auth::user()->type == 0, 'width: min(210px, 210px)' => Auth::user()->type > 0])>
            <div class="d-flex align-items-center m-auto">
                <div class="">
                    <box-icon name='list-ul' size="lg"></box-icon>
                </div>
                <div class="card-body alignt-items-baseline">
                    <h5 class="card-title mb-0 fs-5">{{ $items }}</h5>
                    <p class="card-text fs-6"><small class="text-body-secondary">Items</small></p>
                </div>
            </div>
        </div>
        @if (Auth::user()->type > 0)
            <div class="card mb-3 me-3 p-3 bg-white border-0 shadow" @style(['width: 240px' => Auth::user()->type == 0, 'width: min(210px, 210px)' => Auth::user()->type > 0])>
                <div class="d-flex align-items-center m-auto">
                    <div class="">
                        <box-icon name='receipt' size='lg' type='light'></box-icon>
                    </div>
                    <div class="card-body alignt-items-baseline">
                        <h5 class="card-title mb-0 fs-5">{{ $orders }}</h5>
                        <p class="card-text fs-6"><small class="text-body-secondary">Orders</small></p>
                    </div>
                </div>
            </div>
            <div class="card mb-3 me-3 p-3 bg-white border-0 shadow" style="width: min(210px, 210px);">
                <div class="d-flex align-items-center m-auto">
                    <div class="">
                        <box-icon name='bar-chart-alt-2' size='lg' type='solid'></box-icon>
                    </div>
                    <div class="card-body alignt-items-baseline">
                        <h5 class="card-title mb-0 fs-5">{{ $sales }}</h5>
                        <p class="card-text fs-6"><small class="text-body-secondary">Sales</small></p>
                    </div>
                </div>
            </div>
            <div class="card mb-3 me-3 p-3 bg-white border-0 shadow" style="width: min(210px, 210px);">
                <div class="d-flex align-items-center m-auto">
                    <div class="">
                        <box-icon size="lg" type='solid' name='user-account'></box-icon>
                    </div>
                    <div class="card-body alignt-items-baseline">
                        <h5 class="card-title mb-0 fs-5">{{ $customers }}</h5>
                        <p class="card-text fs-6"><small class="text-body-secondary">Customers</small></p>
                    </div>
                </div>
            </div>
            <div class="card mb-3 me-3 p-3 bg-white border-0 shadow" style="width: min(210px, 210px);">
                <div class="d-flex align-items-center m-auto">
                    <div class="">
                        <box-icon name='user' size="lg"></box-icon>
                    </div>
                    <div class="card-body alignt-items-baseline">
                        <h5 class="card-title mb-0 fs-5">{{ $technicians }}</h5>
                        <p class="card-text fs-6"><small class="text-body-secondary">Technicians</small></p>
                    </div>
                </div>
            </div>
        @endif
    </section>

    <div class="container p-0">
        <!-- Table -->
        <div class="row mt-5">
            <div class="col">
                <div class="card shadow">
                    <div class="card-header border-0">
                        <h3 class="mb-0">Items table</h3>
                    </div>
                    <div class="table-responsive p-2">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">Model</th>
                                    <th scope="col">Description</th>
                                    <th scope="col">Serial no</th>
                                    <th scope="col">Issue</th>
                                    <th scope="col">Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($item_list as $item)
                                    <tr>
                                        <td>{{ $item->model }}</td>
                                        <td>{{ $item->description }}</td>
                                        <td>{{ $item->serial_no }}</td>
                                        <td>{{ $item->issue }}</td>
                                        <td class="d-flex gap-2">
                                            <box-icon name='circle' type='solid' color="{{ $item->color }}"></box-icon>
                                            <p class="fw-semibold">{{ $item->status }}</p>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <center class="mt-4">
                <a href="{{ route('items') }}" class=" text-decoration-none">see more items</a>
            </center>
        </div>
    </div>
@endsection
