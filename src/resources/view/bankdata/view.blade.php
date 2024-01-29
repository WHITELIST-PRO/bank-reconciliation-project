@extends('WhitelistPRO\BankReconciliation::welcome')

@section('content')
    <div class="pagetitle">
        <h1>Bank Data View</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('bank.list') }}">Bank Data List</a></li>
                <li class="breadcrumb-item breadcrumb-active">Bank Data View</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
        <div class="row">
            <div class="card">
                <div class="card-body p-3">
                    <table class="table table-bordered">
                        @foreach ($columns as $value)
                            <thead>
                                <th>{{ $value }}</th>
                                <td></td>
                            </thead>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </section>
@endsection
