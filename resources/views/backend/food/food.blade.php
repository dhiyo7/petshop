@extends('backend.layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row page-titles">
            <div class="col-md-5 col-8 align-self-center">
                <h3 class="text-themecolor m-b-0 m-t-0">Food</h3>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                    <li class="breadcrumb-item active">Food</li>
                </ol>
            </div>
            <div class="col-md-7 col-4 align-self-center">
                <div class="d-flex m-t-10 justify-content-end">
                    <a href="{{ route('admin.food.create') }}" class="btn btn-outline-success btn-sm"><i
                                class="fa fa-plus"></i>&ensp;New Food</a>
                </div>
            </div>
        </div>

        @if($message = Session::get('success'))
            <div class="row">
                <div class="col-md-12">
                    <div class="alert alert-success">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <h3 class="text-success"><i class="fa fa-check-circle"></i> Success</h3>
                        {{ $message }}
                    </div>
                </div>
            </div>
        @endif

        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Image</th>
                                    <th>Food</th>
                                    <th>Price</th>
                                    <th>Seller</th>
                                    <th>Category</th>
                                    <th>Description</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @php
                                $number = 1;
                                @endphp
                                @foreach($foods as $food)
                                    <tr>
                                        <td>{{ $number++ }}</td>
                                        <td>
                                            <img src="{{ asset('images/' . $food->image) }}" alt="food"
                                                 style="width: auto; height: 60px">
                                        </td>
                                        <td>{{ $food->name }}</td>
                                        <td>{{ $food->price }}</td>
                                        <td>{{ $food->seller }}</td>
                                        <td>{{ $food->category }}</td>
                                        <td>{{ $food->description }}</td>
                                        <td>
                                            <a href="{{ route('admin.food.edit', $food->id) }}" class="btn btn-xs btn-outline-warning">
                                                <i class="fa fa-pencil"></i>&ensp;Edit</a>
                                            <a href="" class="btn btn-xs btn-outline-danger" data-toggle="modal"
                                               data-target="#deleteModal{{$food->id}}">
                                                <i class="fa fa-trash"></i>&ensp;Remove</a>
                                            <div class="modal fade" id="deleteModal{{$food->id}}" tabindex="-1"
                                                 role="dialog" aria-labelledby="exampleModalLabel1">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h4 class="modal-title text-danger" id="exampleModalLabel1">
                                                                <b>WARNING !!!</b>
                                                            </h4>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                    aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form action="{{ route('admin.food.destroy', $food->id) }}"
                                                                  method="POST">
                                                                @csrf
                                                                @method('DELETE')
                                                                <p>
                                                                    Are you sure to remove "
                                                                    <b class="text-danger">{{ $food->name }}</b>"
                                                                    ?
                                                                </p>
                                                                <div class="modal-footer">
                                                                    <button type="button"
                                                                            class="btn btn-outline-success btn-sm"
                                                                            data-dismiss="modal">
                                                                        <i class="fa fa-close"></i>&ensp;No, go back
                                                                    </button>
                                                                    <button type="submit"
                                                                            class="btn btn-outline-danger btn-sm">
                                                                        <i class="fa fa-check"></i>&ensp;Yes, remove this
                                                                        record
                                                                    </button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection