@extends('layouts.app')


@section('title', $post->title)


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

    <form method="POST" action="{{ route('posts.update', $post) }}">
        @csrf
        @method('PATCH')

    <div class="form-group">
      <label for="exampleFormControlInput1">Что надо сделать:</label>
      <input type="text" name="label"
    value="{{$post->label}}" class="form-control" id="post-label" >
    </div>
        <div class="form-group">
            <label for="post-group_id"><i class="fa fa-list" aria-hidden="true"></i>
                Категорий:</label>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="group_id"  value="1" @if(old('group_id', $post ->group_id)=="1") checked @endif>
                <label class="form-check-label" for="inlineRadio1">Обязательно</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="group_id"  value="2" @if(old('group_id',$post ->group_id)=="2") checked @endif>
                <label class="form-check-label" for="inlineRadio2">Нужно</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="group_id"  value="3" @if(old('group_id',$post ->group_id)=="3") checked @endif>
                <label class="form-check-label" for="inlineRadio3">Не плохо бы</label>
            </div>
            {{--        <input type="text" name="group_id"  value="{{old('group_id')}}" class="form-control" id="post-group_id" >--}}
        </div>

        <div class="form-group">
            <label for="post-checked"><i class="fa fa-list" aria-hidden="true"></i>
                Состояние:</label>
            <div class="form-check form-check-inline">
                <input class="form-check-input" id="radio" type="radio" name="checked"  value="1" onclick="myFunction()" >
                <label class="form-check-label" for="inlineRadio4">Сделано</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" id="radio" type="radio" name="checked"  value="0"  >
                <label class="form-check-label" for="inlineRadio5">Не сделано</label>
            </div>

        </div>
      <button type="submit" class="btn btn-success"   >Сохранить изменение</button>



  </form>
</div>
</div>
  @endsection
