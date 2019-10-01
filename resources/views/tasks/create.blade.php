@extends('home')
@section('title', 'Add tasks')
@section('content')
    <div class="col-12">
        <div class="row">
            <div class="col-12"><h1>ADD TASKS</h1></div>
            <div class="col-12">
                @if (Session::has('success'))
                    <p class="text-success">
                        <i class="fa fa-check" aria-hidden="true"></i>{{ Session::get('success') }}
                    </p>
                @endif
            </div>

            <form method="post" action="{{route('tasks.store')}}" enctype="multipart/form-data">
                @csrf
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label>Title</label>
                        <input type="text" class="form-control" name="title" placeholder="title">
                    </div>
                    <div class="form-group col-md-6">
                        <label>Content</label>
                        <input type="text" class="form-control" name="contented" placeholder="content">
                    </div>
                </div>
                <div class="form-group">
                    <label>Created</label>
                    <input type="text" class="form-control" name="created" placeholder="10/10/2010">
                </div>
                <div class="form-group">
                    <label>File Name</label>
                    <input type="file" class="form-control-file"  name="inputFile">
                </div>
                <button type="submit" class="btn btn-primary">ADD</button>
                <a href="{{route('tasks.index')}}" class="">Cancel</a>
            </form>
        </div>
    </div>
@endsection
