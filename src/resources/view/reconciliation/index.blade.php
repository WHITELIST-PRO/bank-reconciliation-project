@extends('WhitelistPRO\BankReconciliation::welcome')

@section('content')

    @foreach ($combination as $color)
        <style>

            .green-row {
                background-color: {{ $color->complete_matching }};
            }

            .yellow-row {
                background-color: {{ $color->partial_matching }};
            }

            .show {
                display: block;
            }
        </style>
    @endforeach

    <div class="pagetitle">
        <div class="d-flex justify-content-between">
            <h1>Reconciliation</h1>
            <div>
                <button id="reconciliationButton" class="btn btn-primary"><i class="fa fa-compress"></i>
                    Reconciliation</button>
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#percentage"><i
                        class="fa fa-cogs"></i> Configuration</button>
                {{--  <button class="btn btn-success"><i class="fa fa-check"></i> Confirm</button>  --}}
            </div>
        </div>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                <li class="breadcrumb-item breadcrumb-active">Reconciliation</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <div class="reconciliation_error"></div>

    <section class="section dashboard">

        <div id="msg"></div>

        <div class="row">
            <div class="row">
                <div class="col-sm-6">
                    <div class="card">
                        <div class="card-body p-3">
                            <div class="container first">
                                <table class="table table-hover table-responsive" id="transaction_reconciliation_table">
                                    <thead>
                                        <tr id="col">
                                            <th class="col">Date</th>
                                            <th class="col">Amount</th>
                                            <th class="col">Business name</th>
                                            <th class="col">Type</th>
                                            <th class="col">Edit</th>
                                            <th class="col force-th" style="display: none">Force</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($transaction as $data)
                                            @php
                                                $date = new DateTime($data->date);
                                                $date_formate = $date->format('d / m / Y');
                                            @endphp
                                            <tr class="rter" data-row="{{ $data->id }}">
                                                <td><b>{{ $date_formate }}</b></td>
                                                <td><b>{{ $data->amount }}</b></td>
                                                <td><b>{{ $data->business_name }}</b></td>
                                                <td><b>{{ $data->type }}</b></td>
                                                <td>
                                                    <button data-id="{{ $data->id }}" type="button"
                                                        class="btn btn-light reconciliation_edit" data-bs-toggle="modal">
                                                        <i class="fa fa-pencil-square-o"></i>
                                                    </button>
                                                </td>
                                                <td class="force-td" style="display: none">
                                                    <button class="btn btn-light force common-force-button" data-row="{{ $data->id }}"><i class="fa fa-angle-double-right"></i></button>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="card">
                        <div class="card-body p-3">
                            <div class="container last">
                                <table class="table table-hover table-responsive" id="bankData_reconciliation_table">
                                    <thead>
                                        <tr>
                                            <th class="col">Date</th>
                                            <th class="col">Amount</th>
                                            <th class="col">Business name</th>
                                            <th class="col">Type</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($bank as $data)
                                            @php
                                                $date = new DateTime($data->date);
                                                $date_formate = $date->format('d / m / Y');
                                            @endphp
                                            <tr data-row-id="{{ $data->id }}">
                                                <td><b>{{ $date_formate }}</b></td>
                                                <td><b>{{ $data->amount }}</b></td>
                                                <td><b>{{ $data->business_name }}</b></td>
                                                <td><b>{{ $data->type }}</b></td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="modal fade" id="transaction_form" tabindex="-1">
        <div class="modal-dialog modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Transaction Update</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form class="row g-3" action="{{ route('transaction.update') }}" id="transaction_update_form"
                        enctype="multipart/form-data" method="POST" style="text-transform: uppercase;">
                        @csrf
                        <input type="hidden" name="id" id="id">
                        <div class="col-md-12">
                            <label for="validationCustom01" class="form-label">Identifier id</label>
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" name="identifier" id="identifier" disabled>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <label for="validationCustom01" class="form-label">Type</label>
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" name="type" id="type">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <label for="validationCustom01" class="form-label">Transaction Date</label>
                            <div class="input-group mb-3">
                                <input type="datetime-local" class="form-control" name="date">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <label for="validationCustom01" class="form-label">Customer Code</label>
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" name="customer_code" disabled>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <label for="validationCustom01" class="form-label">Business Name</label>
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" name="business_name">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <label for="validationCustom01" class="form-label">fiscal code</label>
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" name="fiscal_code" disabled>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <label for="validationCustom01" class="form-label">vat number</label>
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" name="vat_number" disabled>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <label for="validationCustom01" class="form-label">registration number</label>
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" name="registration_number" disabled>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <label for="validationCustom01" class="form-label">payment method type</label>
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" name="payment_method_type">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <label for="validationCustom01" class="form-label">fb platform id</label>
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" name="fb_platform_id" disabled>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <label for="validationCustom01" class="form-label">amount</label>
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" name="amount">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <label for="validationCustom01" class="form-label">amount usd</label>
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" name="amount_usd">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <label for="validationCustom01" class="form-label">transfer reason</label>
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" name="transfer_reason">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <label for="validationCustom01" class="form-label">lender business name</label>
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" name="lender_business_name">
                            </div>
                        </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-primary col-12" type="submit">Submit form</button>
                </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade" id="percentage" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Configuration</h5>
                    <button type="button" class="btn" data-bs-dismiss="modal" aria-label="Close"><i class="fa fa-close"></i></button>
                </div>
                <form id="form-data">
                    <div class="modal-body">
                        <div class="text-center">
                            <span class="text-danger" role="alert">
                                <small class="total_validate"></small>
                            </span>
                        </div>

                        @csrf
                        <div id="percentageNewForm">
                            @php
                                $matchingKeys = [];
                            @endphp

                            @foreach ($filteredBankColumns as $key => $value)
                                @if (isset($value) && isset($filteredTransactionColumns) && in_array($value, $filteredTransactionColumns))
                                    @php $matchingKeys[] = $value; @endphp
                                @endif
                            @endforeach

                            <div class="input-group mb-3">
                                <select id="text-to-add" class="form-control">
                                    @foreach ($matchingKeys as $key)
                                        <option value="{{ $key }}">
                                            {{ ucfirst(str_replace('_', ' ', $key)) }}</option>
                                    @endforeach
                                </select>

                                <div id="new-item" class="brn btn-primary input-group-text"><i
                                        class="fa fa-plus"></i></div>
                            </div>

                            <div class="form-group list">
                                @foreach ($configuration as $config)
                                <lable class="lab"><b>{{ $config->key }} : </b></lable>
                                <input type="hidden" name="key[]" value="{{ $config->key }}">
                                <div class="input-group mb-3 fi">
                                    <input name="value[]" class="form-control percentage-input" id="{{ $config->key }}" value="{{ $config->value }}"></input>
                                    <button class="btn btn-danger input-group-text remove-btn deleteRecord" data-id="{{ $config->id }}" data-item="{{ $config->key }}"><i class="fa fa-times"></i></button>
                                </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="modal-footer d-flex justify-content-center">
                            <button type="button" id="modelData" class="btn btn-secondary col-lg-12 submit-form" data-bs-dismiss="modal">OK</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div title="color combination">
        <div class="setting" type="button" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
            <i class="fa fa-cog"></i>
        </div>
    </div>

    <div class="modal fade" id="staticBackdrop" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel"><b>Color Combination</b></h5>
              <button type="button" class="btn" data-bs-dismiss="modal"><i class="fa fa-close"></i></button>
            </div>
            <form id="color-matching-form">
                @csrf
                <div class="modal-body">

                    <div id="color-field">
                        @foreach ($combination as $combi)

                            <input type="hidden" name="id" value="{{ $combi->id }}">

                            <label for="" class="form-label"><b>Complete Matching percentage(%) :</b></label>
                            <div class="input-group mb-3">
                                <input type="text" name="complete_matching_percentage" class="form-control" aria-expanded="false" value="{{ $combi->complete_matching_percentage }}">
                            </div>

                            <label for="" class="form-label"><b>Partial Matching percentage(%) :</b></label>
                            <div class="input-group mb-3">
                                <input type="text" name="partial_matching_percentage" class="form-control" aria-expanded="false" value="{{ $combi->partial_matching_percentage }}">
                            </div>

                            <label for="" class="form-label"><b>Complete Matching :</b></label>
                            <div class="input-group mb-3">
                                <input type="color" name="complete_matching" class="form-control" aria-expanded="false" value="{{ $combi->complete_matching }}">
                            </div>

                            <label for="" class="form-label"><b>Complete Matching Select :</b></label>
                            <div class="input-group mb-3">
                                <input type="color" name="complete_matching_select" class="form-control" aria-expanded="false" value="{{ $combi->complete_matching_select }}">
                            </div>

                            <label for="" class="form-label"><b>Partial Matching :</b></label>
                            <div class="input-group mb-3">
                                <input type="color" name="partial_matching" class="form-control" aria-expanded="false" value="{{ $combi->partial_matching }}">
                            </div>

                            <label for="" class="form-label"><b>Partial Matching Select :</b></label>
                            <div class="input-group mb-3">
                                <input type="color" name="partial_matching_select" class="form-control" aria-expanded="false" value="{{ $combi->partial_matching_select }}">
                            </div>

                        @endforeach
                    </div>

                </div>
                <div class="modal-footer d-flex justify-content-center">
                    <button class="btn btn-success submit-color-matching-form col-lg-12">Save Color</button>
                </div>
            </form>
          </div>
        </div>
      </div>

    <script>

        let forceData = [];

        $(".submit-form").click(function(e){
            e.preventDefault();
            var data = $('#form-data').serialize();
            var totalValue = 0;

            $('.percentage-input').each(function() {
                var inputValue = parseFloat($(this).val()) || 0;
                totalValue += inputValue;
            });

            if (totalValue <= 100) {
                $('.percentage-input').each(function() {
                    $.ajax({
                        type: 'post',
                        url: "{{ route('configuration.store') }}",
                        data: data,
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        success: function(response){
                            $('#msg').html('<div class="alert alert-success alert-dismissible fade show" role="alert"><b>' + response.message + '</b><button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>');
                            location.reload();
                        }
                    });
                });
            }
        });

        $(".submit-color-matching-form").click(function(e){
            e.preventDefault();
            var data = $('#color-matching-form').serialize();
            $.ajax({
                type: 'post',
                url: "{{ route('combination.store') }}",
                data: data,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(response){
                    $('#msg').html('<div class="alert alert-success alert-dismissible fade show" role="alert"><b>' + response.message + '</b><button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>');
                    $('#staticBackdrop').modal('hide');
                    location.reload();
                }
            });
        });

        $(document).ready(function() {
            var fieldCount = 0;

            $('#new-item').click(function() {
                var itemName = $('#text-to-add').val();
                // Check if a field with the same name already exists
                if ($('.lab:contains(' + itemName + ')').length > 0) {
                    $('.total_validate').html(
                        '<p>Field name already used. Want to try with a different name?</p>');
                } else {
                    // Clear previous messages
                    $('.total_validate').empty();
                    // Add a new field if no matching field exists
                    fieldCount++;
                    var fieldValue = 0; // Round to 2 decimal places
                    $('.list').append('<lable class="lab"><b>' + itemName + ' : </b></lable>');
                    $('.list').append('<input name="key[]" type="hidden" class="lab" value="' + itemName + '"></input>');
                    $('.list').append(
                        '<div class="input-group mb-3 fi"><input name="value[]" class="form-control percentage-input" id="' +
                        itemName + '" value="' + fieldValue +
                        '"></input><button class="btn btn-danger input-group-text remove-btn" data-item="' +
                        itemName + '"><i class="fa fa-times"></i></button></div>');
                }
            });

            $('.list').on('click', '.remove-btn', function() {
                var itemName = $(this).data('item');
                $('.lab:contains(' + itemName + ')').remove();
                $('.fi:has([data-item="' + itemName + '"])').remove();
            });
        });

        $(document).ready(function() {
            $('.reconciliation_edit').on('click', function() {
                var id = $(this).attr('data-id');

                $.ajax({
                    // fatch data form database with ajex
                    url: "transaction/data/" + id,
                    method: 'GET',
                    // return data as json formet
                    dataType: 'json',

                    // if data fatch perfectly then go to success section
                    success: function(data) {
                        $('#transaction_form input[name="id"]').val(data.id);
                        $('#transaction_form input[name="identifier"]').val(data.identifier);
                        $('#transaction_form input[name="type"]').val(data.type);
                        $('#transaction_form input[name="date"]').val(data.date);
                        $('#transaction_form input[name="customer_code"]').val(data
                            .customer_code);
                        $('#transaction_form input[name="business_name"]').val(data
                            .business_name);
                        $('#transaction_form input[name="fiscal_code"]').val(data.fiscal_code);
                        $('#transaction_form input[name="vat_number"]').val(data.vat_number);
                        $('#transaction_form input[name="registration_number"]').val(data
                            .registration_number);
                        $('#transaction_form input[name="payment_method_type"]').val(data
                            .payment_method_type);
                        $('#transaction_form input[name="fb_platform_id"]').val(data
                            .fb_platform_id);
                        $('#transaction_form input[name="amount"]').val(data.amount);
                        $('#transaction_form input[name="amount_usd"]').val(data.amount_usd);
                        $('#transaction_form input[name="transfer_reason"]').val(data
                            .transfer_reason);
                        $('#transaction_form input[name="lender_business_name"]').val(data
                            .lender_business_name);

                        $('#transaction_form').modal('show');
                    },

                    // else go to error section
                    error: function(xhr, status, error) {
                        console.error('Error fetching data from server:', error);
                        $('#transaction_form').modal('hide');
                    }
                });
            });

            $('#percentage').on('show.bs.modal', function() {
                $('.total_validate').html('');
            });

            $('#percentage').on('hide.bs.modal', function(e) {
                var totalValue = 0;

                $('.percentage-input').each(function() {
                    var inputValue = parseFloat($(this).val()) || 0;
                    totalValue += inputValue;
                });

                if (totalValue <= 100) {
                    $('.percentage-input').each(function() {
                        var inputValue = parseFloat($(this).val()) || 0;
                        $(this).val(inputValue);
                    });
                } else {
                    e.preventDefault();
                    $('.total_validate').append('<p>Total cannot be greater than 100.</p>');
                }
            });

            $('#modelData').on('click', function() {
                var defaultValues = [];

                $('.percentage-input').each(function() {
                    var inputValue = parseFloat($(this).val()) || 0;
                    defaultValues.push(inputValue);
                });

            });
        });

        function force(id, forceData) {
            // Your force function code here
            document.querySelectorAll('.rter')
                .forEach(row => {
                    row.style.backgroundColor = null;
                });

                let matchingObject = forceData.find(obj => obj.row === id);
                let resultrowId = matchingObject.index2;

                let resultrowId1 = resultrowId + 1;
                let id1 = id + 1;

                var rowToChange1 = document.querySelector('[data-row="' + id1 + '"]');
                var rowToChange2 = document.querySelector('[data-row-id="' + resultrowId1 + '"]');

                if (matchingObject) {
                    rowToChange1.style.backgroundColor = null;
                    rowToChange1.classList.add('f');
                    rowToChange1.classList.add('green-row');
                    rowToChange1.classList.remove('yellow-row');
                    rowToChange2.style.backgroundColor = null;
                    rowToChange2.classList.add('f');
                    rowToChange2.classList.add('green-row');
                    rowToChange2.classList.remove('yellow-row');

                    setTimeout(() => {
                        rowToChange1.style.backgroundColor = ''; // You can set the desired background color here
                        rowToChange2.style.backgroundColor = ''; // You can set the desired background color here
                    }, 100);

                }

        }

        $(document).ready(function() {
            $('.common-force-button').on('click', function() {
                var id = $(this).attr('data-row');
                force(id-1, forceData);
            });

            $('#reconciliationButton').on('click', function() {
                $('.force-th').show();
            });

        });

        document.addEventListener('DOMContentLoaded', function() {
            let result = [];
            let currentlyHighlightedRow1 = null;
            let currentlyHighlightedRow2 = null;

            document.getElementById('reconciliationButton').addEventListener('click', function() {
                if ($('.percentage-input').length === 0) {
                    $('.reconciliation_error').html(
                        '<div class="alert alert-danger alert-dismissible fade show" role="alert"><b>Please add at least one percentage value before reconciliation.</b><button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>'
                        );
                    return;
                }
                performReconciliation();
            });

            function performReconciliation() {
                clearColors();

                let data1 = <?php echo json_encode($transaction); ?>;
                let data2 = <?php echo json_encode($bank); ?>;
                result = reconcile(data1, data2);
                forceData = result;
                highlightRows(result);

                document.querySelectorAll('.container.first table tbody tr').forEach(row => {
                    row.removeEventListener('click', handleRowClickFirst);
                    row.addEventListener('click', handleRowClickFirst);
                });

                document.querySelectorAll('.container.last table tbody tr').forEach(row => {
                    row.removeEventListener('click', handleRowClickLast);
                    row.addEventListener('click', handleRowClickLast);
                });
            }

            function handleRowClickFirst() {
                let rowIndex = Array.from(this.parentNode.children).indexOf(this);
                let matchingObject = result.find(obj => obj.row === rowIndex);
                if (currentlyHighlightedRow1) {
                    currentlyHighlightedRow1.style.backgroundColor = '';
                }
                if (currentlyHighlightedRow2) {
                    currentlyHighlightedRow2.style.backgroundColor = '';
                }
                if (matchingObject) {
                    this.style.backgroundColor = matchingObject.color;
                    currentlyHighlightedRow1 = this;
                    let resultrowId = matchingObject.index2;
                    let secondTableRows = document.querySelectorAll('.container.last table tbody tr');
                    if (secondTableRows[resultrowId]) {
                        secondTableRows[resultrowId].style.backgroundColor = matchingObject.color;
                        currentlyHighlightedRow2 = secondTableRows[resultrowId];
                    }

                    if(secondTableRows[resultrowId].classList.contains('green-row') || this.classList.contains('green-row')) {
                        this.style.backgroundColor = '{{ $color->complete_matching_select }}';
                        secondTableRows[resultrowId].style.backgroundColor = '{{ $color->complete_matching_select }}';
                    }
                }
            }

            function handleRowClickLast() {
                let data2Index = Array.from(this.parentNode.children).indexOf(this);
                let matchingObject = result.find(obj => obj.index2 === data2Index);

                if (currentlyHighlightedRow1) {
                    currentlyHighlightedRow1.style.backgroundColor = '';
                }
                if (currentlyHighlightedRow2) {
                    currentlyHighlightedRow2.style.backgroundColor = '';
                }
                if (matchingObject) {
                    this.style.backgroundColor = matchingObject.color;
                    currentlyHighlightedRow2 = this;
                    let resultrowId = matchingObject.row;
                    let firstTableRows = document.querySelectorAll('.container.first table tbody tr');
                    if (firstTableRows[resultrowId]) {
                        firstTableRows[resultrowId].style.backgroundColor = matchingObject.color;
                        currentlyHighlightedRow1 = firstTableRows[resultrowId];
                    }

                    if(firstTableRows[resultrowId].classList.contains('green-row') || this.classList.contains('green-row')) {
                        this.style.backgroundColor = '{{ $color->complete_matching_select }}';
                        firstTableRows[resultrowId].style.backgroundColor = '{{ $color->complete_matching_select }}';
                    }
                }
            }

            function clearColors() {
                document.querySelectorAll('.container.first table tbody tr, .container.last table tbody tr')
                    .forEach(row => {
                        row.style.backgroundColor = '';
                        row.classList.remove('green-row', 'yellow-row');
                    });
            }

            function reconcile(data1, data2) {
                let result = [];
                let matchedIndices = new Set();

                for (let i = 0; i < data1.length; i++) {
                    let bestMatch = {
                        percentage: 0,
                        index: -1
                    };

                    for (let j = 0; j < data2.length; j++) {
                        if (!matchedIndices.has(j)) {
                            let percentageMatch = compareEntries(data1[i], data2[j]);
                            if (percentageMatch > bestMatch.percentage) {
                                bestMatch = {
                                    percentage: percentageMatch,
                                    index: j
                                };
                            }
                        }
                    }

                    // reconcilation percentage get into database
                    let comPer = <?php echo json_encode($color->complete_matching_percentage); ?>;
                    let parPer = <?php echo json_encode($color->partial_matching_percentage); ?>;

                    if (bestMatch.percentage >= comPer) {
                        result.push({
                            row: i,
                            index2: bestMatch.index,
                            color: '{{ $color->complete_matching_select }}'
                        });
                        matchedIndices.add(bestMatch.index);
                    } else if (bestMatch.percentage > parPer) {
                        result.push({
                            row: i,
                            index2: bestMatch.index,
                            color: '{{ $color->partial_matching_select }}'
                        });
                        matchedIndices.add(bestMatch.index);
                    }

                }

                return result;
            }

            function compareEntries(entry1, entry2) {
                var params = {};
                var inputElements = document.querySelectorAll('.percentage-input');
                inputElements.forEach(function(input) {
                    var key = input.id;
                    var value = parseInt(input.value);
                    if (!isNaN(value)) {
                        params[key] = value;
                    }
                });

                var success = 0;
                for (var key in params) {
                    if (params.hasOwnProperty(key)) {
                        if (entry1.hasOwnProperty(key) && entry2.hasOwnProperty(key)) {
                            if (entry1[key] === entry2[key]) {
                                success += params[key];
                            }
                        }
                    }
                }

                return success;
            }

            function highlightRows(result) {
                result.forEach(item => {
                    let rowElement1 = document.querySelectorAll('.container.first table tbody tr')[item
                        .row];
                    let rowElement2 = item.index2 !== -1 ?
                        document.querySelectorAll('.container.last table tbody tr')[item.index2] :
                        null;

                    if (rowElement1) {
                        if (item.color === '{{ $color->complete_matching_select }}') {
                            rowElement1.classList.add('green-row');
                        } else if (item.color === '{{ $color->partial_matching_select }}') {
                            rowElement1.classList.add('yellow-row');
                            var mycells = rowElement1.getElementsByTagName("td");
                            var lastcell = mycells[mycells.length -1];
                            lastcell.style.removeProperty("display");
                        }
                    }

                    if (rowElement2) {
                        if (item.color === '{{ $color->complete_matching_select }}') {
                            rowElement2.classList.add('green-row');
                        } else if (item.color === '{{ $color->partial_matching_select }}') {
                            rowElement2.classList.add('yellow-row');
                        }
                    }
                });
            }
        });

        $(document).ready(function() {

            $(".deleteRecord").click(function(){
                var id = $(this).data("id");
                var token = $("meta[name='csrf-token']").attr("content");

                $.ajax({
                    url: "/remove/configuration/"+id,
                    type: 'DELETE',
                    data: {
                        "id": id,
                        "_token": token,
                    },
                    success: function(response){
                        // Set a flag in local storage
                        localStorage.setItem('openModalAfterRefresh', 'true');

                        // Display success message
                        $('#msg').html('<div class="alert alert-success alert-dismissible fade show" role="alert"><b>' + response.message + '</b><button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>');

                        // Reload the page
                        location.reload();
                    }
                });
            });

            // Check if the flag is set to open the modal
            $(document).ready(function(){
                if(localStorage.getItem('openModalAfterRefresh') === 'true'){
                    // Remove the flag from local storage
                    localStorage.removeItem('openModalAfterRefresh');

                    // Open the modal
                    $('#percentage').modal('show');
                    $('#msg').modal('show');
                }
            });

    });
    </script>
@endsection
