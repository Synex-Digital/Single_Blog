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
    <div class="row justify-content-center">
        <div class="text-center">
            <h3>Set Blog Position</h3>
        </div>
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="form-validation">
                        <form class="form-valide" action="{{ route('editor_pick.store') }}" method="POST"  enctype="multipart/form-data">
                            @csrf
                            <div class="form-group row">
                                <label class="col-lg-4 col-form-label" for="val-username">Select Blog<span class="text-danger"></span>
                                </label>
                                <div class="col-lg-6">
                                    <select class="form-control" id="val-skill" name="blog_id">
                                        @foreach ($blogs as $blog)
                                        <option value="{{ $blog->id }}">{{ $blog->blog_title }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-4 col-form-label" for="val-username">Blog Position<span class="text-danger">*</span>
                                </label>
                                <div class="col-lg-6">
                                    <input type="text" class="form-control @error('position') is-invalid @enderror" id="val-username" name="position" placeholder="Blog Position" value="">
                                    @error('position')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-lg-8 ml-auto">
                                    <button type="submit" class="btn btn-primary">Create</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection