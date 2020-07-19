@extends('layouts.app')


@section('title', 'To Do list')


@section('content')


<a href="{{ route('posts.create') }}" class="btn btn-success " >Добавить задачу</a>
@if (session('status'))
    <div class="alert alert-success" role="alert">
        {{ session('status') }}
    </div>
@endif

@if(session()->get('success'))
<div class="alert alert-success mt-3">
  {{ session()->get('success') }}
</div>

@endif
<table class="table table-striped mt-3">
    <thead>
      <tr>
        {{-- <th scope="col">#</th> --}}
        <th scope="col">Задача</th>
        <th scope="col">Состояние</th>
        <th scope="col">Категория</th>
          <th></th>
{{--        <th>{{Auth::user()->name}}</th>--}}
      </tr>
    </thead>
    <tbody>
@include('inc.repet')

    </tbody>

  </table>
@endsection

