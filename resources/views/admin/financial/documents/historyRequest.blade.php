<div class="col-12 col-md-8 pl-0">
    <div class="card-body mt-4 mb-0">
        <div class="table-responsive" style="overflow-y: auto;">
            <table class="table text-center custom-table">
                <thead>
                    <tr>
                        <th class="text-center font-weight-bold">{{ trans('#') }}</th>
                        <th class="text-center font-weight-bold">{{ trans('public.name') }}</th>
                        <th class="text-center font-weight-bold">{{ trans('public.content') }}</th>
                        <th class="text-center font-weight-bold p-0">{{ trans('public.amount') }}</th>
                        <th class="text-center font-weight-bold">{{ trans('public.date_of_payment') }}</th>
                        <th class="text-center font-weight-bold p-0">{{ trans('public.status') }}</th>
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
                                <span class="font-weight">{{ $item->content }}</span>
                            </td>
                            {{-- <td class="text-center align-middle">
                                <span class="font-weight">{{ $item->email }}</span>
                            </td> --}}
                            <td class="text-center align-middle">
                                <span class="font-weight">{{ $item->amount }}</span>
                            </td>
                            <td class="text-center align-middle">
                                <span
                                    class="font-weight">{{ \Carbon\Carbon::parse($item->date_of_payment)->format('d/m/Y') }}</span>
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
                            <td class="align-middle pr-3">
                                <select style="width: 120px;" name="action" class="form-control text-center"
                                @if($item->status != 1) disabled @endif data-item-id="{{ $item->id }}">
                                    <option value="">{{ trans('public.action') }}</option>
                                    <option @if($item->status == 2) selected @endif value="2">{{ trans('public.cancel') }}</option>
                                    <option @if($item->status == 0) selected @endif value="0">{{ trans('financial.approved') }}</option>
                                </select>
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