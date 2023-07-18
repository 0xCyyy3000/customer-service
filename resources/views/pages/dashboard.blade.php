@extends('layouts.app')

@section('content')
    <style>
        section.d-flex div.card:hover {
            transform: scale(105%);
            transition: all 100ms ease-out;
        }
    </style>

    <section class="d-flex flex-wrap mb-4">
        <div class="card mb-3 me-3 p-3 bg-white border-0 shadow" style="width: min(210px, 210px);">
            <div class="d-flex align-items-center m-auto">
                <div class="">
                    <box-icon name='bar-chart-alt-2' size='lg' type='solid'></box-icon>
                </div>
                <div class="card-body alignt-items-baseline">
                    <h5 class="card-title mb-0 fs-5">23</h5>
                    <p class="card-text fs-6"><small class="text-body-secondary">Sales</small></p>
                </div>
            </div>
        </div>
        <div class="card mb-3 me-3 p-3 bg-white border-0 shadow" style="width: min(210px, 210px);">
            <div class="d-flex align-items-center m-auto">
                <div class="">
                    <box-icon name='calendar-check' size='lg' type='light'></box-icon>
                </div>
                <div class="card-body alignt-items-baseline">
                    <h5 class="card-title mb-0 fs-5">23</h5>
                    <p class="card-text fs-6"><small class="text-body-secondary">Appoinments</small></p>
                </div>
            </div>
        </div>
        <div class="card mb-3 me-3 p-3 bg-white border-0 shadow" style="width: min(210px, 210px);">
            <div class="d-flex align-items-center m-auto">
                <div class="">
                    <box-icon name='receipt' size='lg' type='light'></box-icon>
                </div>
                <div class="card-body alignt-items-baseline">
                    <h5 class="card-title mb-0 fs-5">23</h5>
                    <p class="card-text fs-6"><small class="text-body-secondary">Orders</small></p>
                </div>
            </div>
        </div>
        <div class="card mb-3 me-3 p-3 bg-white border-0 shadow" style="width: min(210px, 210px);">
            <div class="d-flex align-items-center m-auto">
                <div class="">
                    <box-icon name='list-ul' size="lg"></box-icon>
                </div>
                <div class="card-body alignt-items-baseline">
                    <h5 class="card-title mb-0 fs-5">23</h5>
                    <p class="card-text fs-6"><small class="text-body-secondary">Items</small></p>
                </div>
            </div>
        </div>
        <div class="card mb-3 me-3 p-3 bg-white border-0 shadow" style="width: min(210px, 210px);">
            <div class="d-flex align-items-center m-auto">
                <div class="">
                    <box-icon size="lg" type='solid' name='user-account'></box-icon>
                </div>
                <div class="card-body alignt-items-baseline">
                    <h5 class="card-title mb-0 fs-5">23</h5>
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
                    <h5 class="card-title mb-0 fs-5">23</h5>
                    <p class="card-text fs-6"><small class="text-body-secondary">Technicians</small></p>
                </div>
            </div>
        </div>
    </section>

    <section class="mb-3">
        <h4 class="mb-3">Top repaired items</h4>

        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Classification</th>
                        <th scope="col">No. of repairs</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th scope="row">1</th>
                        <td>Laptop</td>
                        <td>37x</td>
                    </tr>
                    <tr>
                        <th scope="row">2</th>
                        <td>PC</td>
                        <td>19x</td>
                    </tr>
                    <tr>
                        <th scope="row">3</th>
                        <td>Monitor</td>
                        <td>8x</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </section>

    <section class="mb-3">
        <h4 class="mb-3">Recent orders</h4>

        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">First</th>
                        <th scope="col">Last</th>
                        <th scope="col">Handle</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th scope="row">1</th>
                        <td>Mark</td>
                        <td>Otto</td>
                        <td>@mdo</td>
                    </tr>
                    <tr>
                        <th scope="row">1</th>
                        <td>Mark</td>
                        <td>Otto</td>
                        <td>@mdo</td>
                    </tr>
                    <tr>
                        <th scope="row">1</th>
                        <td>Mark</td>
                        <td>Otto</td>
                        <td>@mdo</td>
                    </tr>

                    <tr>
                        <th scope="row">2</th>
                        <td>Jacob</td>
                        <td>Thornton</td>
                        <td>@fat</td>
                    </tr>
                    <tr>
                        <th scope="row">3</th>
                        <td colspan="2">Larry the Bird</td>
                        <td>@twitter</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </section>

    {{-- <dashboard-component /> --}}
@endsection
