<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Web\PaymentController;
use App\Mixins\Cashback\CashbackRules;
use App\Models\Accounting;
use App\Models\OfflineBank;
use App\Models\OfflinePayment;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\PaymentChannel;
use App\Models\RequestPayment;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use Redirect;


class AccountingController extends Controller
{
    public function index()
    {
        $userAuth = auth()->user();

        $accountings = Accounting::where('user_id', $userAuth->id)
            ->where('system', false)
            ->where('tax', false)
            ->with([
                'webinar',
                'promotion',
                'subscribe',
                'meetingTime' => function ($query) {
                    $query->with(['meeting' => function ($query) {
                        $query->with(['creator' => function ($query) {
                            $query->select('id', 'full_name');
                        }]);
                    }]);
                }
            ])
            ->orderBy('created_at', 'desc')
            ->orderBy('id', 'desc')
            ->paginate(10);

        $data = [
            'pageTitle' => trans('financial.summary_page_title'),
            'accountings' => $accountings,
            'commission' => getFinancialSettings('commission') ?? 0,
        ];

        return view(getTemplate() . '.panel.financial.summary', $data);
    }

    public function account($id = null)
    {
        $userAuth = auth()->user();
        $editOfflinePayment = null;
        if (!empty($id)) {
            $editOfflinePayment = OfflinePayment::where('id', $id)
                ->where('user_id', $userAuth->id)
                ->first();
        }

        $paymentChannels = PaymentChannel::where('status', 'active')->get();
        $offlinePayments = OfflinePayment::where('user_id', $userAuth->id)->orderBy('created_at', 'desc')->get();

        $offlineBanks = OfflineBank::query()
            ->orderBy('created_at', 'desc')
            ->with([
                'specifications'
            ])
            ->get();
        $razorpay = false;
        foreach ($paymentChannels as $paymentChannel) {
            if ($paymentChannel->class_name == 'Razorpay') {
                $razorpay = true;
            }
        }

        $registrationBonusAmount = null;

        if ($userAuth->enable_registration_bonus) {
            $registrationBonusSettings = getRegistrationBonusSettings();

            $registrationBonusAccounting = Accounting::query()
                ->where('user_id', $userAuth->id)
                ->where('is_registration_bonus', true)
                ->where('system', false)
                ->first();

            $registrationBonusAmount = (empty($registrationBonusAccounting) and !empty($registrationBonusSettings['status']) and !empty($registrationBonusSettings['registration_bonus_amount'])) ? $registrationBonusSettings['registration_bonus_amount'] : null;
        }

        /* Cashback Rules */
        if (getFeaturesSettings('cashback_active') and !$userAuth->disable_cashback) {
            $cashbackRulesMixin = new CashbackRules($userAuth);
            $cashbackRules = $cashbackRulesMixin->getRules('recharge_wallet');
        }
        $userId = Auth::user()->id;
        $requestPayment = RequestPayment::query()->latest()->where('user_id', $userId)->paginate(5);
        $data = [
            'requestPayment' => $requestPayment,
            'pageTitle' => trans('financial.charge_account_page_title'),
            'offlinePayments' => $offlinePayments,
            'paymentChannels' => $paymentChannels,
            'offlineBanks' => $offlineBanks,
            'accountCharge' => $userAuth->getAccountingCharge(),
            'readyPayout' => $userAuth->getPayout(),
            'totalIncome' => $userAuth->getIncome(),
            'editOfflinePayment' => $editOfflinePayment,
            'razorpay' => $razorpay,
            'registrationBonusAmount' => $registrationBonusAmount,
            'cashbackRules' => $cashbackRules ?? null,
        ];

        return view('web.default.panel.financial.account', $data)->with('msg', 'Request successful');
    }

    public function accountPayout($id = null)
    {

    }

    public function charge(Request $request)
    {

        $rules = [
            'amount' => 'required|numeric|min:1000'
        ];

        $this->validate($request, $rules);
        
        $amount = $request->input('amount');
        $userId = auth()->user()->id;
       
        // $gateway = $request->input('gateway');
        // $account = $request->input('account');
        // $referenceNumber = $request->input('referral_code');
        // $date = $request->input('date');
        if ($amount < 1000) {
            return back()->withErrors([
                'amount' => trans('update.the_amount_must_be_greater_than_0')
            ]);
        }else{
            $respone = $this->payment_momo($amount);
            if ($respone['resultCode'] == 0) {
                return redirect()->away($respone['payUrl']);
            } else {
                return view('web.default.pages.failCheckout');
            }
        }
    }

    public function payment_momo($amount)
    {
        $endpoint = "https://payment.momo.vn/v2/gateway/api/create";

        $partnerCode = 'MOMOTCNN20240105';
        $accessKey = 'QKF9qTEAvC0WWqnh';    
        $serectkey = 'PMIgjYWsw2Y0xhCjoIgQgKmebvcwU9Ng';
        $orderInfo = "Thanh toán qua MoMo";
        $amount = intval($amount) < 1000 ? 1000 : intval($amount);
        // dd($amount);
        $orderId = "MOMO" . time();
        $redirectUrl = route('momo.request-charge');
        $ipnUrl = "https://webhook.site/b3088a6a-2d17-4f8d-a383-71389a6c600b";
        $extraData = "";
        $requestId = "MOMO" . time();
        // $requestType = "payWithATM";
        $requestType = "captureWallet";
        // $extraData = ($_POST["extraData"] ? $_POST["extraData"] : "");
        //before sign HMAC SHA256 signature
        $rawHash = "accessKey=" . $accessKey . "&amount=" . $amount . "&extraData=" . $extraData . "&ipnUrl=" . $ipnUrl . "&orderId=" . $orderId . "&orderInfo=" . $orderInfo . "&partnerCode=" . $partnerCode . "&redirectUrl=" . $redirectUrl . "&requestId=" . $requestId . "&requestType=" . $requestType;
        $signature = hash_hmac("sha256", $rawHash, $serectkey);
        $data = array(
            'partnerCode' => $partnerCode,
            'partnerName' => "Test",
            "storeId" => "MomoTestStore",
            'requestId' => $requestId,
            'amount' => $amount,
            'orderId' => $orderId,
            'orderInfo' => $orderInfo,
            // "responseTime" => $responseTime,
            'redirectUrl' => $redirectUrl,
            'ipnUrl' => $ipnUrl,
            'lang' => 'vi',
            'extraData' => $extraData,
            'requestType' => $requestType,
            'signature' => $signature
        );
        $result = execPostRequest($endpoint, json_encode($data));
        $jsonResult = json_decode($result, true);
        return $jsonResult;
    }
    public function request_charge()
    {
        $secretKey = 'PMIgjYWsw2Y0xhCjoIgQgKmebvcwU9Ng'; //Put your secret key in there
        $accessKey = 'QKF9qTEAvC0WWqnh'; //Put your access key in there

        $partnerCode = $_GET["partnerCode"];
        $requestId = $_GET["requestId"];
        $amount = $_GET["amount"];
        $orderInfo = $_GET["orderInfo"];
        $orderType = $_GET["orderType"];
        $orderId = $_GET["orderId"];
        $transId = $_GET["transId"];
        $resultCode = $_GET["resultCode"];
        $message = $_GET["message"];
        $payType = $_GET["payType"];
        $responseTime = $_GET["responseTime"];
        $extraData = $_GET["extraData"];
        $m2signature = $_GET["signature"]; //MoMo signature
        //Checksum
        $rawHash = "accessKey=" . $accessKey . "&amount=" . $amount . "&extraData=" . $extraData . "&message=" . $message . "&orderId=" . $orderId . "&orderInfo=" . $orderInfo .
            "&orderType=" . $orderType . "&partnerCode=" . $partnerCode . "&payType=" . $payType . "&requestId=" . $requestId . "&responseTime=" . $responseTime .
            "&resultCode=" . $resultCode . "&transId=" . $transId;
        $partnerSignature = hash_hmac("sha256", $rawHash, $secretKey);
        if ($m2signature == $partnerSignature) {
            if ($resultCode == 0) {
                $userId = auth()->user()->id;
                $accounting = new Accounting();
                $accounting->user_id = $userId;
                $accounting->amount = $amount;
                $accounting->system = 0;
                $accounting->tax = 0;
                $accounting->is_registration_bonus = 0;
                $accounting->is_cashback = 0;
                $accounting->type = Accounting::$addiction;
                $accounting->type_account = Accounting::$asset;
                $accounting->created_at = time();
                $accounting->save();
                if($accounting->save()){
                return redirect('/panel/financial/account')->with('msg', 'Nạp tiền thành công!');
                }else{
                    return view('web.default.pages.failCheckout');
                }
            } else {
                return view('web.default.pages.failCheckout');
            }
        }
        return view('web.default.pages.failCheckout');
    }

    public function cancelRequest(Request  $request, $id)
    {
        
        $status = $request->status;
        $requestPayment = RequestPayment::find($id);
        $requestPayment->status = $status;
        $requestPayment->save();
        return back()->with('msgCancel', 'Request cancel successfully');
    }

    private function handleUploadAttachment($user, $file)
    {
        $storage = Storage::disk('public');

        $path = '/' . $user->id . '/offlinePayments';

        if (!$storage->exists($path)) {
            $storage->makeDirectory($path);
        }

        $img = Image::make($file);
        $name = time() . '.' . $file->getClientOriginalExtension();

        $path = $path . '/' . $name;

        $storage->put($path, (string)$img->encode());

        return $name;
    }

    private function echoRozerpayForm($order)
    {
        $generalSettings = getGeneralSettings();

        echo '<form action="/payments/verify/Razorpay" method="get">
            <input type="hidden" name="order_id" value="' . $order->id . '">

            <script src="/assets/default/js/app.js"></script>
            <script src="https://checkout.razorpay.com/v1/checkout.js"
                    data-key="' . env('RAZORPAY_API_KEY') . '"
                    data-amount="' . (int)($order->total_amount * 100) . '"
                    data-buttontext="product_price"
                    data-description="Rozerpay"
                    data-currency="' . currency() . '"
                    data-image="' . $generalSettings['logo'] . '"
                    data-prefill.name="' . $order->user->full_name . '"
                    data-prefill.email="' . $order->user->email . '"
                    data-theme.color="#43d477">
            </script>

            <style>
                .razorpay-payment-button {
                    opacity: 0;
                    visibility: hidden;
                }
            </style>

            <script>
                $(document).ready(function() {
                    $(".razorpay-payment-button").trigger("click");
                })
            </script>
        </form>';
        return '';
    }

    public function updateOfflinePayment(Request $request, $id)
    {
        $user = auth()->user();
        $offline = OfflinePayment::where('id', $id)
            ->where('user_id', $user->id)
            ->first();

        if (!empty($offline)) {
            $data = $request->all();

            $rules = [
                'amount' => 'required|numeric',
                'gateway' => 'required',
                'account' => 'required_if:gateway,offline',
                'referral_code' => 'required_if:gateway,offline',
                'date' => 'required_if:gateway,offline',
            ];

            if (!empty($request->file('attachment'))) {
                $rules['attachment'] = 'image|mimes:jpeg,png,jpg|max:10240';
            }

            $this->validate($request, $rules);

            $attachment = $offline->attachment;

            if (!empty($request->file('attachment'))) {
                $attachment = $this->handleUploadAttachment($user, $request->file('attachment'));
            }

            $date = convertTimeToUTCzone($data['date'], getTimezone());

            $offline->update([
                'amount' => $data['amount'],
                'bank' => $data['account'],
                'reference_number' => $data['referral_code'],
                'status' => OfflinePayment::$waiting,
                'attachment' => $attachment,
                'pay_date' => $date->getTimestamp(),
            ]);

            return redirect('/panel/financial/account');
        }

        abort(404);
    }

    public function deleteOfflinePayment($id)
    {
        $user = auth()->user();
        $offline = OfflinePayment::where('id', $id)
            ->where('user_id', $user->id)
            ->first();

        if (!empty($offline)) {
            $offline->delete();

            return response()->json([
                'code' => 200
            ], 200);
        }

        return response()->json([], 422);
    }

}
