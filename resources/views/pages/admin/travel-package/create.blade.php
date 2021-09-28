@extends('layouts/admin')

@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"> Tambah Paket Travel</h1>  
        
    </div>

    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors ->all() as $error)
                <li>{{ $error }}</li>
                
            @endforeach
        </ul>
    </div>
        
    @endif
    
    <div class="card shadow">
        <div class="card-body">
            <form action="{{ route ('travel-package.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" class="form-control" name="title" placeholder="Title" value="{{ old ('title') }}">
                </div>
                <div class="form-group">
                    <label for="location">Location</label>
                    <input type="text" class="form-control" name="location" placeholder="Location" value="{{ old ('location') }}">
                </div>
                <div class="form-group">
                    <label for="about">About</label>
                    <textarea name="about" rows="10" class="d-block w-100 form-control">{{ old('about') }}</textarea>
                </div>
                <div class="form-group">
                    <label for="featured_event">featured event</label>
                    <input type="text" class="form-control" name="featured_event" placeholder="featured event" value="{{ old ('featured_event') }}">
                </div>
                <div class="form-group">
                    <label for="language">language</label>
                    <input type="text" class="form-control" name="language" placeholder="language" value="{{ old ('language') }}">
                </div>
                <div class="form-group">
                    <label for="foods">foods</label>
                    <input type="text" class="form-control" name="foods" placeholder="foods" value="{{ old ('foods') }}">
                </div>
                <div class="form-group">
                    <label for="departure_date">departure date</label>
                    <input type="date" class="form-control" name="departure_date" placeholder="departure date" value="{{ old ('departure_date') }}">
                </div>
                <div class="form-group">
                    <label for="duration">duration</label>
                    <input type="text" class="form-control" name="duration" placeholder="duration" value="{{ old ('duration') }}">
                </div>
                <div class="form-group">
                    <label for="type">type</label>
                    <input type="text" class="form-control" name="type" placeholder="type" value="{{ old ('type') }}">
                </div>
                <div class="form-group">
                    <label for="price">price</label>
                    <input type="number" class="form-control" name="price" placeholder="price" value="{{ old ('price') }}">
                </div>
                <button type="submit" class="btn btn-primary btn-block">
                    Simpan
                </button>
            </form>
        </div>
    </div>
</div>
<!-- /.container-fluid -->
    
@endsection