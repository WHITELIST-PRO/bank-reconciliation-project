@extends('WhitelistPRO\BankReconciliation::welcome')

@section('content')
    <div class="pagetitle">
        <div class="d-flex justify-content-between">
            <h1>Reconciliation</h1>
        </div>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                <li class="breadcrumb-item breadcrumb-active">Reconciliation</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
        <div class="row">
            <div class="card">
                <div class="card-body p-3">

                    <!-- Bordered Tabs -->
                    <ul class="nav nav-tabs nav-tabs-bordered" id="borderedTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="home-tab" data-bs-toggle="tab"
                                data-bs-target="#bordered-home" type="button" role="tab" aria-controls="home"
                                aria-selected="true">Transaction Data</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="profile-tab" data-bs-toggle="tab"
                                data-bs-target="#bordered-profile" type="button" role="tab" aria-controls="profile"
                                aria-selected="false">Bank Data</button>
                        </li>
                    </ul>
                    <div class="tab-content pt-2" id="borderedTabContent">
                        <div class="tab-pane fade show active" id="bordered-home" role="tabpanel"
                            aria-labelledby="home-tab">
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
                                                    <li><a class="dropdown-item"
                                                            href="{{ route('file.view', $data->id) }}">View</a>
                                                    </li>
                                                </ul>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="tab-pane fade" id="bordered-profile" role="tabpanel" aria-labelledby="profile-tab">
                            <table class="table table-hover table-responsive">
                                <thead>
                                    <tr>
                                        <th class="col">#</th>
                                        <th class="col">Date</th>
                                        <th class="col">Sender Name</th>
                                        <th class="col">Sender Account</th>
                                        <th class="col">Option&#39;s</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($bank as $data)
                                        @php
                                            $date = new DateTime($data->date);
                                            $date_formate = $date->format('d / m / Y');
                                        @endphp
                                        <tr>
                                            <th scope="row">{{ $data->id }}</th>
                                            <td>{{ $date_formate }}</td>
                                            <td>{{ $data->sender_name }}</td>
                                            <td>{{ $data->sender_account }}</td>
                                            <td class="text-center">
                                                <a class="icon" href="#" data-bs-toggle="dropdown"><i
                                                        class="fa fa-ellipsis-v"></i></a>
                                                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                                    <li><a class="dropdown-item"
                                                            href="{{ route('bank.file.view', $data->id) }}">View</a></li>
                                                </ul>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div><!-- End Bordered Tabs -->

                </div>
            </div>
        </div>
    </section>
@endsection
