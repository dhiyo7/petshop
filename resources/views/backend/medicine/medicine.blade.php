@extends('backend.layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row page-titles">
            <div class="col-md-5 col-8 align-self-center">
                <h3 class="text-themecolor m-b-0 m-t-0">Medicine</h3>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                    <li class="breadcrumb-item active">Medicine</li>
                </ol>
            </div>
            <div class="col-md-7 col-4 align-self-center">
                <div class="d-flex m-t-10 justify-content-end">
                    <button class="btn btn-outline-success btn-sm"><i class="fa fa-plus"></i>&ensp;New Medicine</button>
                </div>
            </div>
        </div>

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
                                    <th>Medicine</th>
                                    <th>Price</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>
                                        <img src="{{ asset('images/medicine/medicine1.jpg') }}" alt="" style="width: auto; height: 60px">
                                    </td>
                                    <td>Medicine 1</td>
                                    <td>Rp. 50.000</td>
                                    <td>
                                        <a href="" class="btn btn-xs btn-outline-warning"><i class="fa fa-pencil"></i>&ensp;Edit</a>
                                        <a href="" class="btn btn-xs btn-outline-danger"><i class="fa fa-trash"></i>&ensp;Remove</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>
                                        <img src="{{ asset('images/medicine/medicine1.jpg') }}" alt="" style="width: auto; height: 60px">
                                    </td>
                                    <td>Medicine 2</td>
                                    <td>Rp. 50.000</td>
                                    <td>
                                        <a href="" class="btn btn-xs btn-outline-warning"><i class="fa fa-pencil"></i>&ensp;Edit</a>
                                        <a href="" class="btn btn-xs btn-outline-danger"><i class="fa fa-trash"></i>&ensp;Remove</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>3</td>
                                    <td>
                                        <img src="{{ asset('images/medicine/medicine1.jpg') }}" alt="" style="width: auto; height: 60px">
                                    </td>
                                    <td>Medicine 3</td>
                                    <td>Rp. 50.000</td>
                                    <td>
                                        <a href="" class="btn btn-xs btn-outline-warning"><i class="fa fa-pencil"></i>&ensp;Edit</a>
                                        <a href="" class="btn btn-xs btn-outline-danger"><i class="fa fa-trash"></i>&ensp;Remove</a>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection