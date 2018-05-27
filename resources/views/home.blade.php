@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @include('inc.messages')
                    <button class="btn btn-primary btn-lg" data-toggle="modal"
                            data-target="#addModal" type="button"
                            name="button">Add Bookmark</button>
                    <hr>
                    <h3>Bookmarks</h3>
                    <ul class="list-group">
                        @foreach($bookmarks as $bookmark)
                            <li style="margin-bottom: 10px;">
                                <a href="{{$bookmark->url}}" target="_blank">
                                    {{$bookmark->name}} <span class="label label-default">({{$bookmark->description}})</span>
                                </a>
                                <span class="pull-right button-group">
                                    <form action="{{route('bookmarks.delete', ['id'=>$bookmark->id])}}" method="POST" style="display:inline;">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <button type="submit" class="btn btn-danger">
                                            <b>X</b> Delete
                                        </button>
                                    </form>
                                </span>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" tabindex="-1" role="dialog" id="addModal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Add Bookmark</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <form action="{{route('bookmarks.store')}}" method="post">
                    {{csrf_field()}}
                    <div class="form-group">
                        <label>Bookmark Name</label>
                        <input type="text" class="form-control" name="name">
                    </div>
                    <div class="form-group">
                        <label>Bookmark URL</label>
                        <input type="text" class="form-control" name="url">
                    </div>
                    <div class="form-group">
                        <label>Website Description</label>
                        <textarea class="form-control" name="description"></textarea>
                    </div>
                    <input type="submit" name="submit" value="Submit" class="btn btn-success">
                </form>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
@endsection
