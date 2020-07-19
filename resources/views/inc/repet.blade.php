    @foreach ($posts as $post)

        <tr>
            {{--       <th scope="row">{{ $post ->id }}</th>--}}
            <td>{{ $post ->label }}</td>

            @if ( $post ->checked== 1)
                <td class="bg-success">Сделано</td>
            @elseif ( $post ->checked == 0)
                <td class="bg-light">Не сделано</td>
            @endif

            {{--        <td>{{ $post ->checked }}</td>--}}
            @if ( $post ->group_id== 1)
                <td class="bg-danger text-white">Обязательно</td>
            @elseif ( $post ->group_id == 2)
                <td class="bg-warning text-dark">Нужно</td>
            @elseif ($post ->group_id == 3)
                <td class="bg-info">Не плохо бы</td>
            @endif


            {{--        <td>{{ $post ->group_id}}</td>--}}
            <td class="table-buttons">

                <a href="{{ route('posts.show', $post) }}" class="btn btn-success" >
                    <i class="fa fa-eye"></i>
                </a>

                <a href="{{ route('posts.edit', $post) }}" class="btn btn-primary" >
                    <i class="fa fa-pencil-square-o"></i>
                </a>

                <form method="POST" action="{{ route('posts.destroy', $post) }}">
                    @csrf
                    @method('DELETE')
                    <button type="submit"  class="btn btn-danger" >
                        <i class="fa fa-trash"></i>
                    </button>
                </form>
            </td>
        </tr>
    @endforeach

