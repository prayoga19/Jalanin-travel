@extends('layouts/admin')

@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"> edit Paket Travel {{ $item-> title }}</h1>  
        
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
            <form action="{{ route ('transaction.update', $item->id) }}" method="POST">
               @method('PUT')
                @csrf
                <div class="form-group">
                    <label for="transaction_status"> Status </label>
                    <select name="transaction_status" required class="form-control">
                        <option value="{{ $item->transaction_status }}">
                            Jangan Ubah ({{ $item->transaction_status }})
                        </option>
                        <option value="IN_CART">in_cart</option>
                        <option value="PENDING">pending</option>
                        <option value="SUCCESS">success</option>
                        <option value="CANCEL">cancel</option>
                        <option value="FAILED">failed</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary btn-block">
                    Ubah
                </button>
            </form>
        </div>
    </div>
</div>
<!-- /.container-fluid -->
    
@endsection