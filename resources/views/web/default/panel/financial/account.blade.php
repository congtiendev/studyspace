@extends(getTemplate() . '.panel.layouts.panel_layout')

@push('styles_top')
    <link rel="stylesheet" href="/assets/default/vendors/daterangepicker/daterangepicker.min.css">
@endpush
<style>
    .btn-cc {
        display: flex;
        flex-direction: column;
        gap: 5px;
        justify-content: center;
        align-items: center;
    }

    .btn-snap {
        padding: 10px 20px;
        margin: 0 20px;
        background-color: #1f3b64;
        color: #FFF;
        font: 16px;
        font-weight: 500;
        border-radius: 10px;
        text-align: center;
        border: none;

    }

    btn-snap:hover {}
</style>
@section('content')
    {{-- Cashback Alert --}}
    {{-- @if (!empty($cashbackRules) and count($cashbackRules))
        @foreach ($cashbackRules as $cashbackRule)
            <div class="d-flex align-items-center mb-20 p-15 success-transparent-alert {{ $classNames ?? '' }}">
                <div class="success-transparent-alert__icon d-flex align-items-center justify-content-center">
                    <i data-feather="credit-card" width="18" height="18" class=""></i>
                </div>

                <div class="ml-10">
                    <div class="font-14 font-weight-bold ">{{ trans('update.get_cashback') }}</div>

                    <div class="font-12 ">
                        {{ trans('update.by_charging_your_wallet_will_get_amount_as_cashback', ['amount' => $cashbackRule->amount_type == 'percent' ? "%{$cashbackRule->amount}" : handlePrice($cashbackRule->amount)]) }}
                    </div>
                </div>
            </div>
        @endforeach
    @endif --}}


    {{-- @if (!empty($registrationBonusAmount))
        <div class="mb-25 d-flex align-items-center justify-content-between p-15 bg-white panel-shadow">
            <div class="d-flex align-items-center">
                <img src="/assets/default/img/icons/money.png" alt="money" width="51" height="51">

                <div class="ml-15">
                    <span
                        class="d-block font-16 text-dark font-weight-bold">{{ trans('update.unlock_registration_bonus') }}</span>
                    <span
                        class="d-block font-14 text-gray font-weight-500 mt-5">{{ trans('update.your_wallet_includes_amount_registration_bonus_This_amount_is_locked', ['amount' => handlePrice($registrationBonusAmount)]) }}</span>
                </div>
            </div>

            <a href="/panel/marketing/registration_bonus" class="btn btn-border-gray300">{{ trans('update.view_more') }}</a>
        </div>
    @endif --}}

    {{-- <section>
        <h2 class="section-title">{{ trans('financial.account_summary') }}</h2>

        <div class="activities-container mt-25 p-20 p-lg-35">
            <div class="row">
                <div class="col-4 d-flex align-items-center justify-content-center">
                    <div class="d-flex flex-column align-items-center text-center">
                        <img src="/assets/default/img/activity/36.svg" width="64" height="64" alt="">
                        <strong
                            class="font-30 text-dark-blue font-weight-bold mt-5">{{ $accountCharge ? handlePrice($accountCharge) : 0 }}
                        </strong>
                        <span class="font-16 text-gray font-weight-500">{{ trans('financial.account_charge') }}</span>
                    </div>
                </div>

                <div class="col-4 d-flex align-items-center justify-content-center">
                    <div class="d-flex flex-column align-items-center text-center">
                        <img src="/assets/default/img/activity/37.svg" width="64" height="64" alt="">
                        <strong
                            class="font-30 text-dark-blue font-weight-bold mt-5">{{ $readyPayout ? handlePrice($readyPayout) : 0 }}</strong>
                        <span class="font-16 text-gray font-weight-500">{{ trans('financial.ready_to_payout') }}</span>
                    </div>
                </div>

                <div class="col-4 d-flex align-items-center justify-content-center">
                    <div class="d-flex flex-column align-items-center text-center">
                        <img src="/assets/default/img/activity/38.svg" width="64" height="64" alt="">
                        <strong
                            class="font-30 text-dark-blue font-weight-bold mt-5">{{ $totalIncome ? handlePrice($totalIncome) : 0 }}</strong>
                        <span class="font-16 text-gray font-weight-500">{{ trans('financial.total_income') }}</span>
                    </div>
                </div>

            </div>
        </div>
    </section> --}}
    {{-- @if (\Session::has('msg'))
        <div class="alert alert-warning">
            <ul>
                <li>{!! \Session::get('msg') !!}</li>
            </ul>
        </div>
    @endif --}}

    @php
        $showOfflineFields = false;
        if ($errors->has('date') or $errors->has('referral_code') or $errors->has('account') or !empty($editOfflinePayment)) {
            $showOfflineFields = true;
        }

        $isMultiCurrency = !empty(getFinancialCurrencySettings('multi_currency'));
        $userCurrency = currency();
        $invalidChannels = [];
    @endphp

    <section class="mt-30">
        {{-- <h2 class="section-title">{{ trans('financial.select_the_payment_gateway') }}</h2> --}}

        <form action="/panel/financial/account-post" method="post" enctype="multipart/form-data" class="mt-25">
            {{ csrf_field() }}
            @if (session('msg'))
                <div class="alert alert-success">
                    {{ session('msg') }}
                </div>
            @endif
            {{-- action="/panel/financial/{{ !empty($editOfflinePayment) ? 'offline-payments/' . $editOfflinePayment->id . '/update' : 'charge' }}"
            method="post" enctype="multipart/form-data" class="mt-25">


            {{-- @if ($errors->has('gateway'))
                <div class="text-danger mb-3">{{ $errors->first('gateway') }}</div>
            @endif --}}

            {{-- <div class="row"> --}}
            {{-- @foreach ($paymentChannels as $paymentChannel)
                    @if (!$isMultiCurrency or !empty($paymentChannel->currencies) and in_array($userCurrency, $paymentChannel->currencies))
                        <div class="col-6 col-lg-3 mb-40 charge-account-radio">
                            <input type="radio" class="online-gateway" name="gateway" id="{{ $paymentChannel->class_name }}" @if (old('gateway') == $paymentChannel->class_name) checked @endif value="{{ $paymentChannel->class_name }}">
                            <label for="{{ $paymentChannel->class_name }}" class="rounded-sm p-20 p-lg-45 d-flex flex-column align-items-center justify-content-center">
                             <img src="{{ $paymentChannel->image }}" width="120" height="60" alt="">
                                <p class="mt-30 font-14 font-weight-500 text-dark-blue">{{ trans('financial.pay_via') }}
                                    <span class="font-weight-bold">{{ $paymentChannel->title }}</span>
                                </p>
                            </label>
                        </div>
                    @else
                        @php
                            $invalidChannels[] = $paymentChannel;
                        @endphp
                    @endif
                @endforeach --}}

            {{-- @if (!empty(getOfflineBankSettings('offline_banks_status')))
                    <div class="col-6 col-lg-3 mb-40 charge-account-radio">
                        <input type="radio" name="gateway" id="offline" value="offline" @if (old('gateway') == 'offline' or !empty($editOfflinePayment)) checked @endif>
                        <label for="offline" class="rounded-sm p-20 p-lg-45 d-flex flex-column align-items-center justify-content-center">
                            <img src="/assets/default/img/activity/pay.svg" width="120" height="60" alt="">
                            <p class="mt-30 font-14 font-weight-500 text-dark-blue">{{ trans('financial.pay_via') }}
                                <span class="font-weight-bold">{{ trans('financial.offline') }}</span>
                            </p>
                        </label>
                    </div>
                @endif --}}
            {{-- </div> --}}

            {{-- @if (!empty($invalidChannels))
                <div class="d-flex align-items-center rounded-lg border p-15">
                    <div class="size-40 d-flex-center rounded-circle bg-gray200">
                        <i data-feather="gift" class="text-gray" width="20" height="20"></i>
                    </div>
                    <div class="ml-5">
                        <h4 class="font-14 font-weight-bold text-gray">{{ trans('update.disabled_payment_gateways') }}</h4>
                        <p class="font-12 text-gray">{{ trans('update.disabled_payment_gateways_hint') }}</p>
                    </div>
                </div>

                <div class="row mt-20">
                    @foreach ($invalidChannels as $invalidChannel)
                        <div class="col-6 col-lg-3 mb-40 charge-account-radio">
                            <div class="disabled-payment-channel bg-white border rounded-sm p-20 p-lg-45 d-flex flex-column align-items-center justify-content-center">
                                <img src="{{ $invalidChannel->image }}" width="120" height="60" alt="">

                                <p class="mt-30 mt-lg-50 font-weight-500 text-dark-blue">
                                    {{ trans('financial.pay_via') }}
                                    <span class="font-weight-bold font-14">{{ $invalidChannel->title }}</span>
                                </p>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif --}}
            <div class="">
                {{-- <h3 class="section-title mb-20">{{ trans('financial.finalize_payment') }}</h3> --}}
                <div class="row">
                    <div class="col-12 col-lg-4 mb-4 mb-lg-0">
                        <label style="color: #032482;"
                            class="font-weight-500 font-14 text-dark-blue d-block">{{ trans('panel.amount') }}</label>
                        <div class="input-group rounded ">
                            <input type="number" name="amount" min="10000"
                                class="form-control input-payment @error('amount') is-invalid @enderror"
                                value="{{ !empty($editOfflinePayment) ? $editOfflinePayment->amount : old('amount') }}"
                                placeholder="{{ trans('panel.number_only') }}" />
                            <span class="input-addon rounded-input-group-prepend">
                                VNĐ
                            </span>

                            <div class="invalid-feedback">
                                @error('amount')
                                    {{ $message }}
                                @enderror
                            </div>

                        </div>
                    </div>

                    {{-- <div class="col-12 col-lg-3 mb-25 mb-lg-0 js-offline-payment-input "
                        style="{{ !$showOfflineFields ? 'display:none' : '' }}">
                        <div class="form-group">
                            <label class="input-label">{{ trans('financial.account') }}</label>
                            <select name="account" class="form-control @error('account') is-invalid @enderror">
                                <option selected disabled>{{ trans('financial.select_the_account') }}</option>

                                @foreach ($offlineBanks as $offlineBank)
                                    <option value="{{ $offlineBank->id }}"
                                        @if (!empty($editOfflinePayment) and $editOfflinePayment->offline_bank_id == $offlineBank->id) selected @endif>{{ $offlineBank->title }}
                                    </option>
                                @endforeach
                            </select>

                            @error('account')
                                <div class="invalid-feedback"> {{ $message }}</div>
                            @enderror
                        </div>
                    </div> --}}

                    {{-- <div class="col-12 col-lg-3 mb-25 mb-lg-0 js-offline-payment-input "
                        style="{{ !$showOfflineFields ? 'display:none' : '' }}">
                        <div class="form-group">
                            <label for="referralCode" class="input-label">{{ trans('admin/main.referral_code') }}</label>
                            <input type="text" name="referral_code" id="referralCode"
                                value="{{ !empty($editOfflinePayment) ? $editOfflinePayment->reference_number : old('referral_code') }}"
                                class="form-control @error('referral_code') is-invalid @enderror" />
                            @error('referral_code')
                                <div class="invalid-feedback"> {{ $message }}</div>
                            @enderror
                        </div>
                    </div> --}}

                    {{-- <div class="col-12 col-lg-3 mb-25 mb-lg-0 js-offline-payment-input "
                        style="{{ !$showOfflineFields ? 'display:none' : '' }}">
                        <div class="form-group">
                            <label class="input-label">{{ trans('public.date_time') }}</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="dateRangeLabel">
                                        <i data-feather="calendar" width="18" height="18" class="text-white"></i>
                                    </span>
                                </div>
                                <input type="text" name="date"
                                    value="{{ !empty($editOfflinePayment) ? dateTimeFormat($editOfflinePayment->pay_date, 'Y-m-d H:i', false) : old('date') }}"
                                    class="form-control datetimepicker @error('date') is-invalid @enderror"
                                    aria-describedby="dateRangeLabel" />
                                @error('date')
                                    <div class="invalid-feedback"> {{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div> --}}

                    {{-- <div class="col-12 col-lg-3 mb-25 mb-lg-0 js-offline-payment-input "
                        style="{{ !$showOfflineFields ? 'display:none' : '' }}">
                        <div class="form-group">
                            <label class="input-label">{{ trans('update.attach_the_payment_photo') }}</label>

                            <label for="attachmentFile" id="attachmentFileLabel" class="custom-upload-input-group">
                                <span class="custom-upload-icon text-white">
                                    <i data-feather="upload" width="18" height="18" class="text-white"></i>
                                </span>
                                <div class="custom-upload-input"></div>
                            </label>

                            <input type="file" name="attachment" id="attachmentFile"
                                class="form-control h-auto invisible-file-input @error('attachment') is-invalid @enderror"
                                value="" />
                            @error('attachment')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div> --}}

                    <div class="col-12 col-lg-3 p-0">
                        <div class="mt-30 p-0">
                            <button style="border-radius: 15px;background: #032482 ; color: white;" type="submit"
                                class="btn btn-sm">{{ trans('public.send_require') }}</button>
                        </div>
                    </div>

                    <div class="col-12 col-lg-3 mb-4 mb-lg-0">
                        <label style="font-size: 20px; color: #032482;
                        "
                            class="font-weight-500 font-14 text-dark-blue d-block">{{ trans('panel.account_charge') }}</label>

                        <strong style="color: #C92D39;" class="font-30 font-weight-bold mt-5">
                            {{ $accountCharge ? handlePrice($accountCharge) : 0 }}
                        </strong>
                    </div>
                    {{--  --}}

                </div>
            </div>
        </form>
    </section>

    <section class="mt-9">
        {{-- <h2 class="section-title">{{ trans('financial.bank_accounts_information') }}</h2> --}}
        <div class="row mt-25 d-flex justify-content-center">

            {{-- <div class="col-md-7 col-lg-4 d-flex align-items-center  justify-content-center">
                <div style="display: flex;
                flex-direction: column;justify-content: center;gap:10px;"> --}}
                    {{-- <div class="text-center">
                        <label style="font-size: 20px; color: #032482;
                    "
                            class="font-weight-500 font-14 text-dark-blue d-block">{{ trans('panel.account_charge') }}</label>

                        <strong style="color: #C92D39;" class="font-30 font-weight-bold mt-5">
                            {{ $accountCharge ? handlePrice($accountCharge) : 0 }}
                        </strong>
                    </div> --}}
                    {{-- <p class="font-weight-bold"
                        style="color: #C92D39;text-align:center;font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif"
                        class="flex-shrink-0">
                        The transaction will be processed within 2-10 minutes. For support, please contact: <strong
                            style="font-size: 25px;">0383664415</strong>
                    </p> --}}
                    {{-- <img src="/store/1/bank/QR.png" alt="" class="flex-grow-1"> --}}
                    {{-- <div style="display:flex; justify-content:center;align-items:center; text-align:center">
                        <div class="btn-cc">
                            <strong>{{ trans('panel.transfer_content') }}</strong>
                            <button class="btn-snap">snap {{ Auth::user()->email }}</button>
                        </div>
                    </div> --}}
                {{-- </div> --}}

            </div>
            <style>
                .img-banking {
                    margin-top: 150px;
                }

                @media (max-width: 768px) {
                    .img-banking {
                    margin-top: 50px;
                    }
                }
            </style>
            <div class="col-md-5 mt-5 ml-md-3">
                <img class="img-banking" style="width:100%;" src="/store/2/itachi.jpg">
            </div>
        </div>


    </section>



    {{--  @if ($requestPayment->count() > 0)
        @include('web.default.includes.account.historyRequest');
    @endif

    @if ($offlinePayments->count() > 0)
    @include('web.default.includes.account.offlinePayment');
 @else
     @include(getTemplate() . '.includes.no-result', [
         'file_name' => 'offline.png',
         'title' => trans('financial.offline_no_result'),
         'hint' => nl2br(trans('financial.offline_no_result_hint')),
     ])
 @endif  --}}
@endsection

@push('scripts_bottom')
    <script src="/assets/default/vendors/daterangepicker/daterangepicker.min.js"></script>
    <script src="/assets/default/js/panel/financial/account.min.js"></script>

    <script>
        (function($) {
            "use strict";

            @if (session()->has('sweetalert'))
                Swal.fire({
                    icon: "{{ session()->get('sweetalert')['status'] ?? 'success' }}",
                    html: '<h3 class="font-20 text-center text-dark-blue py-25">{{ session()->get('sweetalert')['msg'] ?? '' }}</h3>',
                    showConfirmButton: false,
                    width: '25rem',
                });
            @endif
        })(jQuery)
    </script>
@endpush
