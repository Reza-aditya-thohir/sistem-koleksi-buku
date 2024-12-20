@extends('dashboard.layouts.main')
@section('container')
    <div class="">
        <h2 class="text-slate-700 font-semibold text-xl md:text-3xl ">Welcombeck, {{ auth()->user()->name }}</h2>
    </div>
@endsection
