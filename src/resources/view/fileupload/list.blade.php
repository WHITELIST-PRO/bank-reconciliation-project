@extends('WhitelistPRO\BankReconciliation::welcome')

@section('content')
    <div class="pagetitle">
        <div class="d-flex justify-content-between">
            <h1>Transaction List</h1>
            <a href="{{ route('file.upload') }}" class="btn btn-primary">Upload</a>
        </div>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                <li class="breadcrumb-item breadcrumb-active">Transaction List</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
        <div class="row">
            <div class="card">
                <div class="card-body p-3">
                    <table class="table table-hover table-responsive">
                        <thead>
                            <tr>
                                <th class="col">#</th>
                                <th class="col">Identifier</th>
                                <th class="col">Type</th>
                                <th class="col">Transaction Date</th>
                                <th class="col">customer code</th>
                                <th class="col">Option&#39;s</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($transaction as $data)
                                @php
                                    $date = new DateTime($data->date);
                                    $date_formate = $date->format('d - m - Y');
                                @endphp
                                <tr>
                                    <th scope="row">{{ $data->id }}</th>
                                    <td>{{ $data->identifier }}</td>
                                    <td>{{ $data->type }}</td>
                                    <td>{{ $date_formate }}</td>
                                    <td>{{ $data->customer_code }}</td>
                                    <td class="text-center">
                                        <a class="icon" href="#" data-bs-toggle="dropdown"><i
                                                class="fa fa-ellipsis-v"></i></a>
                                        <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                            <li><a class="dropdown-item" href="{{ route('file.view', $data->id) }}">View</a>
                                            </li>
                                        </ul>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        {{ $transaction->links('pagination::bootstrap-5') }}
    </section>
@endsection
