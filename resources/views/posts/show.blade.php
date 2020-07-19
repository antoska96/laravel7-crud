@extends('layouts.app')


@section('title', 'SHOW '.$post ->id)


@section('content')

<div class="card">
    <div class="card-body">

<h3>Что надо сделать: {{ $post->label }}</h3>
<p>Категорий: @if ( $post ->group_id== 1)
            <td class="bg-danger text-white">Обязательно</td>
        @elseif ( $post ->group_id == 2)
            <td class="bg-warning text-dark">Нужно</td>
        @elseif ($post ->group_id == 3)
            <td class="bg-info">Не плохо бы</td>
            @endif</p>
<p><b>Состояние: @if ( $post ->checked== 1)
            <td class="bg-success">Сделано</td>
        @elseif ( $post ->checked == 0)
            <td class="bg-light">Не сделано</td>
        @endif</b></p>
    </div>
  </div>

  @endsection
