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
                        <h4 class="card-title">All Blogs</h4>
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered zero-configuration">
                                <thead>
                                    <tr>
                                        <th>Image</th>
                                        <th>Parent Category</th>
                                        <th>Category</th>
                                        <th>Blog Title</th>
                                        <th>SEO Title</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($requests as $request)
                                        <tr>
                                            <td>
                                                <img style="width: 50px;" src="{{ asset('files/blog/'.$request->blog_image) }}" alt="">
                                            </td>
                                            <td>{{ $request->category->parent_category_id }}</td>
                                            <td>{{ $request->category->category_name }}</td>
                                            <td>{{ $request->blog_title }}</td>
                                            <td>{{ $request->seo_title }}</td>
                                            <td>
                                                <a href="{{ route('blog.edit', $request->id) }}" class="btn btn-primary"><i class="fa fa-pencil color-muted m-r-5"></i></a>
                                                <a href="{{ route('category.destroy', $request->id) }}" class="btn btn-warning"><i class="fa fa-close color-danger"></i></a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>Image</th>
                                        <th>Parent Category</th>
                                        <th>Category</th>
                                        <th>Blog Title</th>
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
