@extends('layouts.app')

@section('content')
    {{-- <section class="d-flex flex-wrap mb-4">
        <div class="card mb-3 me-3 p-3 bg-white border-0 shadow" style="max-width: 310px;">
            <div class="row g-0">
                <div class="col-md-4">
                    <img src="{{ asset('assets/images/user-profile/cyril.jpeg') }}" class="img-fluid rounded-start"
                        alt="...">
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <h5 class="card-title mb-0">23</h5>
                        <p class="card-text"><small class="text-body-secondary">Repaired items</small></p>
                    </div>
                </div>
            </div>
        </div>
        <div class="card mb-3 me-3 p-3 bg-white border-0 shadow" style="max-width: 310px;">
            <div class="row g-0">
                <div class="col-md-4">
                    <img src="{{ asset('assets/images/user-profile/cyril.jpeg') }}" class="img-fluid rounded-start"
                        alt="...">
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <h5 class="card-title mb-0">23</h5>
                        <p class="card-text"><small class="text-body-secondary">Repaired items</small></p>
                    </div>
                </div>
            </div>
        </div>
        <div class="card mb-3 me-3 p-3 bg-white border-0 shadow" style="max-width: 310px;">
            <div class="row g-0">
                <div class="col-md-4">
                    <img src="{{ asset('assets/images/user-profile/cyril.jpeg') }}" class="img-fluid rounded-start"
                        alt="...">
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <h5 class="card-title mb-0">23</h5>
                        <p class="card-text"><small class="text-body-secondary">Repaired items</small></p>
                    </div>
                </div>
            </div>
        </div>
        <div class="card mb-3 me-3 p-3 bg-white border-0 shadow" style="max-width: 310px;">
            <div class="row g-0">
                <div class="col-md-4">
                    <img src="{{ asset('assets/images/user-profile/cyril.jpeg') }}" class="img-fluid rounded-start"
                        alt="...">
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <h5 class="card-title mb-0">23</h5>
                        <p class="card-text"><small class="text-body-secondary">Repaired items</small></p>
                    </div>
                </div>
            </div>
        </div>
        <div class="card mb-3 me-3 p-3 bg-white border-0 shadow" style="max-width: 310px;">
            <div class="row g-0">
                <div class="col-md-4">
                    <img src="{{ asset('assets/images/user-profile/cyril.jpeg') }}" class="img-fluid rounded-start"
                        alt="...">
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <h5 class="card-title mb-0">23</h5>
                        <p class="card-text"><small class="text-body-secondary">Repaired items</small></p>
                    </div>
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
    </section> --}}

    <dashboard-component />
@endsection
