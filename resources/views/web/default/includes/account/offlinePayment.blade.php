<section class="mt-40">
    <h2 class="section-title">{{ trans('financial.offline_transactions_history') }}</h2>

    <div class="panel-section-card py-20 px-25 mt-20">
        <div class="row">
            <div class="col-12 ">
                <div class="table-responsive">
                    <table class="table text-center custom-table">
                        <thead>
                            <tr>
                                <th>{{ trans('financial.bank') }}</th>
                                <th>{{ trans('admin/main.referral_code') }}</th>
                                <th class="text-center">{{ trans('panel.amount') }} ({{ $currency }})</th>
                                <th class="text-center">{{ trans('update.attachment') }}</th>
                                <th class="text-center">{{ trans('public.status') }}</th>
                                <th class="text-right">{{ trans('public.controls') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($offlinePayments as $offlinePayment)
                                <tr>
                                    <td class="text-left">
                                        <div class="d-flex flex-column">

                                            @if (!empty($offlinePayment->offlineBank))
                                                <span
                                                    class="font-weight-500 text-dark-blue">{{ $offlinePayment->offlineBank->title }}</span>
                                            @else
                                                <span class="font-weight-500 text-dark-blue">-</span>
                                            @endif
                                            <span
                                                class="font-12 text-gray">{{ dateTimeFormat($offlinePayment->pay_date, 'j M Y H:i') }}</span>
                                        </div>
                                    </td>
                                    <td class="text-left align-middle">
                                        <span>{{ $offlinePayment->reference_number }}</span>
                                    </td>
                                    <td class="text-center align-middle">
                                        <span
                                            class="font-16 font-weight-bold text-primary">{{ handlePrice($offlinePayment->amount, false) }}</span>
                                    </td>

                                    <td class="text-center align-middle">
                                        @if (!empty($offlinePayment->attachment))
                                            <a href="{{ $offlinePayment->getAttachmentPath() }}" target="_blank"
                                                class="text-primary">{{ trans('public.view') }}</a>
                                        @else
                                            ---
                                        @endif
                                    </td>

                                    <td class="text-center align-middle">
                                        @switch($offlinePayment->status)
                                            @case(\App\Models\OfflinePayment::$waiting)
                                                <span class="text-warning">{{ trans('public.waiting') }}</span>
                                            @break

                                            @case(\App\Models\OfflinePayment::$approved)
                                                <span class="text-primary">{{ trans('financial.approved') }}</span>
                                            @break

                                            @case(\App\Models\OfflinePayment::$reject)
                                                <span class="text-danger">{{ trans('public.rejected') }}</span>
                                            @break
                                        @endswitch
                                    </td>
                                    <td class="text-right align-middle">
                                        @if ($offlinePayment->status != 'approved')
                                            <div class="btn-group dropdown table-actions">
                                                <button type="button" class="btn-transparent dropdown-toggle"
                                                    data-toggle="dropdown" aria-haspopup="true"
                                                    aria-expanded="false">
                                                    <i data-feather="more-vertical" height="20"></i>
                                                </button>
                                                <div class="dropdown-menu">
                                                    <a href="/panel/financial/offline-payments/{{ $offlinePayment->id }}/edit"
                                                        class="webinar-actions d-block mt-10">{{ trans('public.edit') }}</a>
                                                    <a href="/panel/financial/offline-payments/{{ $offlinePayment->id }}/delete"
                                                        data-item-id="1"
                                                        class="webinar-actions d-block mt-10 delete-action">{{ trans('public.delete') }}</a>
                                                </div>
                                            </div>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

</section>