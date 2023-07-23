@extends('layouts.app')

@section('content')
    <style>
        section.d-flex div.card:hover {
            transform: scale(105%);
            transition: all 100ms ease-out;
        }
    </style>

    <div class="container p-3 rounded-3 shadow card" style="">
        <livewire:item-table />
    </div>
@endsection
