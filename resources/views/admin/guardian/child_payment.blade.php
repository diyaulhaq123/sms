@php
$school = app(App\Http\Controllers\SchoolController::class)->getSchool();
@endphp
@extends('layouts.view')
@section('page-title')
Payments
@endsection
@section('card-header')
{{ $student->last_name.' '.$student->first_name }}
@endsection

@section('body')
@if(!$receipt)
<div class="table-responsive text-nowrap p-3">
    <table class="table" id="">
      <thead>
        <tr>
          <th></th>
          <th>Name</th>
          <th>Payment Type</th>
          <th>Amount<i style="font-size: 10px">(expected)</i></th>
          <th>Paid</th>
          <th>Balance</th>
          <th>Status</th>
          <th>Reciept</th>
        </tr>
      </thead>
      <tbody class="table-border-bottom-0">
          @php $sn=0; @endphp
        @forelse ($payments as $row)
        <tr>
          <td>#</td>
          <td>{{ $row->student->first_name }}</td>
          <td>{{ $row->payment_type->name }}</td>
          <td>{{ number_format($row->amount, 2) }}</td>
          <td>{{ number_format($row->paid, 2) }}</td>
          <td>{{ number_format($row->balance, 2) }}</td>
          <td><span class="badge {{ $row->payment_status == 'Paid' ? 'bg-label-success' : 'bg-label-danger'  }}  me-1">{{ $row->payment_status }}</span></td>
          <td><a href="{{ route('guardian.reciept',[$row->student_id, $row->id] ) }}" class="btn btn-primary btn-sm"><i class="fa fa-eye"></i></a></td>
        @empty
        <td colspan="7">
            <div class="alert alert-info text-center text-dark p-2">No payment found</div>
        </td>
        </tr>
        @endforelse

      </tbody>
    </table>
</div>

@else

<div class="row justify-content-center">
    <div class="col-xl-9 col-md-8 col-12 mb-md-0 mb-4">
        <div class="card invoice-preview-card">
          <div class="card-body">
            <div class="d-flex justify-content-between flex-xl-row flex-md-column flex-sm-row flex-column m-sm-3 m-0">
              <div class="mb-xl-0 mb-4">
                <div class="d-flex svg-illustration mb-4 gap-2 align-items-center">
                  <img src="{{ asset($school->logo) }}" alt="logo" width="32" height="22" class="rounded-circle">

                  <span class="app-brand-text fw-bold fs-4"> {{ $school->name }} </span>
                </div>
                <p class="mb-2">Office 149, 450 South Brand Brooklyn</p>
                <p class="mb-2">San Diego County, CA 91905, USA</p>
                <p class="mb-0">+1 (123) 456 7891, +44 (876) 543 2198</p>
              </div>
              <div>
                <h4 class="fw-medium mb-2">INVOICE #86423</h4>
                <div class="mb-2 pt-1">
                  <span>Date Issues:</span>
                  <span class="fw-medium">April 25, 2021</span>
                </div>
                <div class="pt-1">
                  <span>Date Due:</span>
                  <span class="fw-medium">May 25, 2021</span>
                </div>
              </div>
            </div>
          </div>
          <hr class="my-0">
          <div class="card-body">
            <div class="row p-sm-3 p-0">
              <div class="col-xl-6 col-md-12 col-sm-5 col-12 mb-xl-0 mb-md-4 mb-sm-0 mb-4">
                <h6 class="mb-3">Invoice To:</h6>
                <p class="mb-1">Thomas shelby</p>
                <p class="mb-1">Shelby Company Limited</p>
                <p class="mb-1">Small Heath, B10 0HF, UK</p>
                <p class="mb-1">718-986-6062</p>
                <p class="mb-0">peakyFBlinders@gmail.com</p>
              </div>
              <div class="col-xl-6 col-md-12 col-sm-7 col-12">
                <h6 class="mb-4">Bill To:</h6>
                <table>
                  <tbody>
                    <tr>
                      <td class="pe-4">Total Due:</td>
                      <td class="fw-medium">$12,110.55</td>
                    </tr>
                    <tr>
                      <td class="pe-4">Bank name:</td>
                      <td>American Bank</td>
                    </tr>
                    <tr>
                      <td class="pe-4">Country:</td>
                      <td>United States</td>
                    </tr>
                    <tr>
                      <td class="pe-4">IBAN:</td>
                      <td>ETD95476213874685</td>
                    </tr>
                    <tr>
                      <td class="pe-4">SWIFT code:</td>
                      <td>BR91905</td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
          <div class="table-responsive border-top">
            <table class="table m-0">
              <thead>
                <tr>
                  <th>Item</th>
                  <th>Description</th>
                  <th>Cost</th>
                  <th>Qty</th>
                  <th>Price</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td class="text-nowrap">Vuexy Admin Template</td>
                  <td class="text-nowrap">HTML Admin Template</td>
                  <td>$32</td>
                  <td>1</td>
                  <td>$32.00</td>
                </tr>
                <tr>
                  <td class="text-nowrap">Frest Admin Template</td>
                  <td class="text-nowrap">Angular Admin Template</td>
                  <td>$22</td>
                  <td>1</td>
                  <td>$22.00</td>
                </tr>
                <tr>
                  <td class="text-nowrap">Apex Admin Template</td>
                  <td class="text-nowrap">HTML Admin Template</td>
                  <td>$17</td>
                  <td>2</td>
                  <td>$34.00</td>
                </tr>
                <tr>
                  <td class="text-nowrap">Robust Admin Template</td>
                  <td class="text-nowrap">React Admin Template</td>
                  <td>$66</td>
                  <td>1</td>
                  <td>$66.00</td>
                </tr>
                <tr>
                  <td colspan="3" class="align-top px-4 py-4">
                    <p class="mb-2 mt-3">
                      <span class="ms-3 fw-medium">Salesperson:</span>
                      <span>Alfie Solomons</span>
                    </p>
                    <span class="ms-3">Thanks for your business</span>
                  </td>
                  <td class="text-end pe-3 py-4">
                    <p class="mb-2 pt-3">Subtotal:</p>
                    <p class="mb-2">Discount:</p>
                    <p class="mb-2">Tax:</p>
                    <p class="mb-0 pb-3">Total:</p>
                  </td>
                  <td class="ps-2 py-4">
                    <p class="fw-medium mb-2 pt-3">$154.25</p>
                    <p class="fw-medium mb-2">$00.00</p>
                    <p class="fw-medium mb-2">$50.00</p>
                    <p class="fw-medium mb-0 pb-3">$204.25</p>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>

          <div class="card-body mx-3">
            <div class="row">
              <div class="col-12">
                <span class="fw-medium">Note:</span>
                <span>It was a pleasure working with you and your team. We hope you will keep us in mind for
                  future freelance projects. Thank You!</span>
              </div>
            </div>
          </div>
        </div>
    </div>
</div>

@endif

@endsection
