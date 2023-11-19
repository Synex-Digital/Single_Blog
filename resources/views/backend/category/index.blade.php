@extends('backend.index')
@section('content')
    <div class="row page-titles mx-0">
        <div class="col p-md-0">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Dashboard</a></li>
                <li class="breadcrumb-item active"><a href="javascript:void(0)">Home</a></li>
            </ol>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Data Table</h4>
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered zero-configuration">
                                <thead>
                                    <tr>
                                        <th>Category Name</th>
                                        <th>Image</th>
                                        <th>Icon</th>
                                        <th>SEO Title</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($requests as $request)
                                        <tr>
                                            <td>{{ $request->category_name }}</td>
                                            <td>
                                                <img style="width: 50px;" src="{{ asset('files/category/'.$request->category_image) }}" alt="">
                                            </td>
                                            <td>
                                                <img style="width: 50px;" src="{{ asset('files/category/'.$request->category_icon) }}" alt="">
                                            </td>
                                            <td>{{ $request->seo_title }}</td>
                                            <td>
                                                <a href="{{ route('category.edit', $request->id) }}" class="btn btn-primary"><i class="fa fa-pencil color-muted m-r-5"></i></a>
                                                <form action="{{ route('category.destroy', $request->id) }}" method="POST">
                                                    @method('DELETE')
                                                    @csrf
                                                    <button type="submit"  class="btn btn-warning"><i class="fa fa-close color-danger"></i></button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>Category Name</th>
                                        <th>Image</th>
                                        <th>Icon</th>
                                        <th>SEO Title</th>
                                        <th>Action</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
