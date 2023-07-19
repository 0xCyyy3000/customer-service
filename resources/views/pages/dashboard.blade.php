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
                                <tr>
                                    <td>Argon Design System</td>
                                    <td>$2,500 USD</td>
                                    <td>1232323sdf-123-dfdf-13</td>
                                    <td>Not charging</td>
                                    <td class="d-flex gap-2">
                                        <box-icon name='circle' type='solid' color="orange"></box-icon>
                                        <p class="fw-semibold">in progress</p>
                                    </td>
                                </tr>
                                <tr>
                                    <td>teasingggg</td>
                                    <td>$2,500 USD</td>
                                    <td>1232323sdf-123-dfdf-13</td>
                                    <td>Not charging</td>
                                    <td class="d-flex gap-2">
                                        <box-icon name='circle' type='solid' color="yellowgreen"></box-icon>
                                        <p class="fw-semibold">repaired</p>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Teat</td>
                                    <td>$2,500 USD</td>
                                    <td>1232323sdf-123-dfdf-13</td>
                                    <td>Not charging</td>
                                    <td class="d-flex gap-2">
                                        <box-icon name='circle' type='solid' color="blue"></box-icon>
                                        <p class="fw-semibold">returned</p>
                                    </td>
                                </tr>
                                <tr>
                                    <td>cccdtd>
                                    <td>$2,500 USD</td>
                                    <td>1232323sdf-123-dfdf-13</td>
                                    <td>Not charging</td>
                                    <td class="d-flex gap-2">
                                        <box-icon name='circle' type='solid' color="yellowgreen"></box-icon>
                                        <p class="fw-semibold">in progress</p>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Argon Design System</td>
                                    <td>$2,500 USD</td>
                                    <td>1232323sdf-123-dfdf-13</td>
                                    <td>Not charging</td>
                                    <td class="d-flex gap-2">
                                        <box-icon name='circle' type='solid' color="crimson"></box-icon>
                                        <p class="fw-semibold">failed</p>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <center class="mt-4">
                <a href="{{ route('appointments') }}" class=" text-decoration-none">See all</a>
            </center>
        </div>
    </div>
@endsection
