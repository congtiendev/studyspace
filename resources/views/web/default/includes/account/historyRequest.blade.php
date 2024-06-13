<section class="mt-40">
    <h2 class="section-title">{{ trans('public.history_request') }}</h2>

    <div class="panel-section-card py-20 px-25 mt-20">
        <div class="row">
            <div class="col-12">
                <div class="table-responsive">
                    <table class="table text-center custom-table">
                        <thead>
                            <tr>
                                <th class="text-center font-weight-bold">{{ trans('#') }}</th>
                                <th class="text-center font-weight-bold">{{ trans('public.name') }}</th>
                                <th class="text-center font-weight-bold">{{ trans('public.email') }}</th>
                                <th class="text-center font-weight-bold">{{ trans('public.content') }}</th>
                                <th class="text-center font-weight-bold">{{ trans('public.amount') }}</th>
                                <th class="text-center font-weight-bold">{{ trans('public.date_of_payment') }}</th>
                                <th class="text-center font-weight-bold">{{ trans('public.status') }}</th>
                                <th class="text-center font-weight-bold">{{ trans('public.action') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($requestPayment as $item)
                                <tr>
                                    <td class="text-center align-middle">
                                        <span class="font-weight">{{ $item->id }}</span>
                                    </td>
                                    <td class="text-center align-middle">
                                        <span class="font-weight">{{ $item->name }}</span>
                                    </td>
                                    <td class="text-center align-middle">
                                        <span class="font-weight">{{ $item->email }}</span>
                                    </td>
                                    <td class="text-center align-middle">
                                        <span class="font-weight">{{ $item->content }}</span>
                                    </td>
                                    <td class="text-center align-middle">
                                        <span class="font-weight">{{ $item->amount }}</span>
                                    </td>
                                    <td class="text-center align-middle">
                                        <span class="font-weight">{{ \Carbon\Carbon::parse($item->date_of_payment)->format('d/m/Y') }}</span>
                                    </td>
                                    <td class="text-center align-middle">
                                        @switch($item->status)
                                            @case(\App\Models\RequestPayment::$waiting)
                                                <span class="text-warning">{{ trans('public.waiting') }}</span>
                                                @break
                                            @case(\App\Models\RequestPayment::$approved)
                                                <span class="text-primary">{{ trans('financial.approved') }}</span>
                                                @break
                                            @case(\App\Models\RequestPayment::$reject)
                                                <span class="text-danger">{{ trans('public.cancel') }}</span>
                                                @break
                                        @endswitch
                                    </td>
                                    <td class="align-middle">
                                        <form action="/panel/financial/account/cancel/{{ $item->id }}" method="POST">
                                            @csrf
                                            <input type="hidden" name="status" value="2">
                                            @switch($item->status)
                                                @case(\App\Models\RequestPayment::$waiting)
                                                    <button type="submit" class="text-center align-middle btn btn-sm btn-danger">{{ trans('public.cancel') }}</button>
                                                    @break
                                                @case(\App\Models\RequestPayment::$approved)
                                                @case(\App\Models\RequestPayment::$reject)
                                                    <button type="submit" disabled class="text-center align-middle btn btn-sm btn-danger">{{ trans('public.cancel') }}</button>
                                                    @break
                                            @endswitch
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="mt-20">
                    {{ $requestPayment->links() }}
                </div>
            </div>
        </div>
    </div>
</section>