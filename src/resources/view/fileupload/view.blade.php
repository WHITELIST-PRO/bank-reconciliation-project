@extends('WhitelistPRO\BankReconciliation::welcome')

@section('content')
    <style>
        th {
            text-transform: uppercase
        }
    </style>

    <div class="pagetitle">
        <h1>Transaction View</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('file.list') }}">Transaction List</a></li>
                <li class="breadcrumb-item breadcrumb-active">Transaction View</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
        <div class="row">
            <div class="card">
                <div class="card-body p-3">
                    <table class="table table-bordered">
                        <thead>
                            @foreach ($columns as $field)
                                <tr>
                                    <th>{{ str_replace('_', ' ', $field) }}</th>
                                    <td>{{ $tran->$field }}</td>
                                </tr>
                            @endforeach
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </section>
@endsection
