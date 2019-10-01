@extends('home')
@section('title', 'Danh sách tasks')
@section('content')
    <div class="col-12">
        <div class="row">
            <div class="col-12"><h1>Danh Sách TASKS</h1></div>
            <div class="col-12">
                @if (Session::has('success'))
                    <p class="text-success">
                        <i class="fa fa-check" aria-hidden="true"></i>{{ Session::get('success') }}
                    </p>
                @endif
            </div>
            <table class="table table-striped">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Title</th>
                    <th scope="col">Content</th>
                    <th scope="col">Created</th>
                    <th scope="col">Image</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                @if(count($tasks)==0)
                    <tr>
                        <td colspan="4">Không có dữ liệu</td>
                    </tr>
                @else
                    @foreach($tasks as $key=>$task)
                        <tr>
                            <th>{{++$key}}</th>
                            <th>{{$task->title}}</th>
                            <th>{{$task->content}}</th>
                            <th>{{$task->created}}</th>
                            <th><img src="{{ asset('storage/images/' . $task->image) }}" alt="" style="width: 150px">
                            </th>
                            <th><a href="{{route('tasks.edit',$task->id)}}" class="btn btn-primary">Edit</a>|
                                <a href="{{route('tasks.destroy',$task->id)}}" class="btn btn-danger"
                                   onclick="return confirm('Are you sure want to delete?')">Delete</a></th>
                        </tr>
                    @endforeach
                @endif
                </tbody>
            </table>
            <a class="btn btn-primary" href="{{route('tasks.create')}}">ADD</a>
        </div>
    </div>
@endsection
