@extends('layouts.app')

@section('content')
    <div class="container ">
        <!-- Main content -->
        <div class="row"></div>
        <div class="col-lg-4">
            <h4 class="box-title">Add/Edit Branch</h4>
            <!-- /.box-title -->
            <form method="post" action="{{ url('/add_product') }}" enctype="multipart/form-data" >
                @csrf

                <div class="form-group">
                    <label for="">Product Name</label>
                    <input type="text" class="form-control" value="{{ $edit_data->name ?? '' }}" name="name">
                </div>

                <div class="form-group">
                    <label for="">Price</label>
                    <input type="text" class="form-control" value="{{ $edit_data->price ?? '' }}" name="price">
                </div>

                <div class="form-group">
                    <label for="">Image</label>
                    <input type="file" class="form-control" value="{{ $edit_data->img ?? '' }}" name="img">
                </div>
                <input type="hidden" name="id" value="{{ $edit_data->id ?? '' }}">
                @if (isset($edit_data->id))
                @php
                    $act = 'edit';
                @endphp
            @else
                @php
                    $act = 'add';
                @endphp
            @endif
            <input type="hidden" name="action" value="{{ $act }}">
            <button type="submit" name="add_branch"
                class="btn btn-primary btn-sm waves-effect waves-light">Save</button>
            </form>

        </div>
        <div class="col-lg-8">
            <div class="box-content">
                <h4 class="box-title">View Branch</h4>

                <table id="example" class="table table-striped table-bordered display" style="width:100%">
                    <thead>
                        <tr>
                            <th>Product Name</th>
                            <th>Price</th>
                            <th>image</th>
                            <th>Action</th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $item)    
                        <tr>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->price }}</td>
                            <td><img src="{{ asset('images/'.$item->img) }}" width="70px" alt=""></td>
                            <td>
                                <a href="/edit_product/{{$item->id}}" class="btn  btn-warning">Edit</a>
                                <a href="/del_product/{{$item->id}}" class="btn  btn-danger">Delete</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <!-- /.box-content -->
        </div>

    </div>
    </div>
@endsection
