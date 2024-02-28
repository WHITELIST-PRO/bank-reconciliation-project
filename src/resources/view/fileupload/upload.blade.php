@extends('WhitelistPRO\BankReconciliation::welcome')

@section('content')
    <div class="pagetitle">
        <h1>Transaction Upload</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('file.list') }}">Transaction List</a></li>
                <li class="breadcrumb-item breadcrumb-active">Transaction Upload</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
        <div class="row">
            <div class="card">
                <div class="card-body p-3">
                    <form class="row g-3" action="{{ route('file.transaction') }}" enctype="multipart/form-data"
                        method="POST">
                        @csrf
                        <div class="col-md-12">
                            <label for="validationCustom01" class="form-label">Upload Transaction File</label>
                            <div class="input-group mb-3">
                                <input type="file" class="form-control" name="file" required>
                            </div>
                        </div>
                        <div class="col-12 d-flex justify-content-center">
                            <button class="btn btn-primary" type="submit">Submit form</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
