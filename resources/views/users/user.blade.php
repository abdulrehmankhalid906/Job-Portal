@extends('frontend.master')
@section('content')
<section class="py-5">
    <div class="container mb2">
        <h1 class="text-center">All User</h1>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>
                            <a href="{{ route('user.show',$user->id)}}" class="btn btn-primary btn-sm"><i class="fa-solid fa-eye"></i></a>
                            <a href="{{ route('user.edit', $user->id) }}" class="btn btn-info btn-sm"><i class="fa-solid fa-pen-to-square"></i></a>
                            <form action="{{ route('user.destroy', $user->id) }}" method="post" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger btn-sm fa-solid fa-trash-can"></button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</section>
@endsection
