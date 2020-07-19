@extends('layouts.app')


@section('title', 'Add Task')


@section('content')
<div class="row">
    <div class="col-lg-6 mx-auto">

        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

    <form method="POST" action="{{ route('posts.store') }}">
        @csrf
    <div class="form-group">

      <label for="post-label"><i class="fa fa-thumb-tack" aria-hidden="true"></i>
          надо сделать:</label>
      <input type="text" name="label"  value="{{old('label')}}" class="form-control" id="post-label" >
{{--        <input type="text" name="author_id"  value="{{Auth::id()}}" class="form-control" id="post-label" >--}}
    </div>

    <div class="form-group">
        <label for="post-group_id"><i class="fa fa-list" aria-hidden="true"></i>
            Категорий:</label>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="group_id"  value="1">
            <label class="form-check-label" for="inlineRadio1">Обязательно</label>
        </div>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="group_id"  value="2">
            <label class="form-check-label" for="inlineRadio2">Нужно</label>
        </div>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="group_id"  value="3">
            <label class="form-check-label" for="inlineRadio3">Не плохо бы</label>
        </div>
{{--        <input type="text" name="group_id"  value="{{old('group_id')}}" class="form-control" id="post-group_id" >--}}
      </div>

      <div class="form-group">
        <label for="post-checked"><i class="fa fa-list" aria-hidden="true"></i>
            Состояние:</label>
          <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" name="checked"  value="1">
              <label class="form-check-label" for="inlineRadio4">Сделано</label>
          </div>
          <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" name="checked"  value="0">
              <label class="form-check-label" for="inlineRadio5">Не сделано</label>
          </div>

{{--        <input type="text" name="checked"  value="{{old('checked')}}" class="form-control" id="post-checked" >--}}
      </div>


        {{-- <div class="form-group">

            <label for="post-group_id">Категорий:</label><br>

        <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="group_id" id="inlineRadio1" value="1">
            <label class="form-check-label" for="post-group_id">Обязательно</label>
          </div>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="group_id" id="inlineRadio2" value="2">
            <label class="form-check-label" for="post-group_id">Нужно</label>
          </div>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="group_id" id="inlineRadio3" value="3" >
            <label class="form-check-label" for="post-group_id">Не плохо бы</label>
          </div>


    </div>
        <div class="form-group">
            <label for="post-checked">Состояние:</label><br>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="checked" id="inlineRadio1" value="1">
                <label class="form-check-label" for="post-checked">Сделано</label>
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="checked" id="inlineRadio2" value="0">
                <label class="form-check-label" for="post-checked">Не сделано</label>
              </div>
          </div> --}}
      <button type="submit" class="btn btn-success">Добавить Задачу</button>

  </form>
</div>
</div>
  @endsection
