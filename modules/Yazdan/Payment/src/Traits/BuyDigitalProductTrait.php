<?php

namespace Yazdan\Payment\Traits;

use Yazdan\Payment\Gateways\Gateway;
use Yazdan\Payment\Services\PaymentService;
use Yazdan\Discount\Services\DiscountService;
use Yazdan\Discount\App\Http\Requests\CodeRequest;
use Yazdan\Payment\Repositories\PaymentRepository;
use Yazdan\Payment\App\Events\PaymentWasSuccessful;
use Yazdan\Discount\Repositories\DiscountRepository;
use Illuminate\Database\Eloquent\Concerns\HasRelationships;

trait BuyDigitalProductTrait
{
    use HasRelationships;

    private $discounts = [];

    public function buy()
    {
        $amount = $this->finalPrice();
        if($amount <= 0) $this->free();
        PaymentService::digitalGenerate($this,$amount,$this->discounts);
        resolve(Gateway::class)->redirect();
    }
    public function finalPrice()
    {
        $amount = $this->getPrice();
        $code = session()->get('code');
        if ($code) {
            $discountFromCode = DiscountRepository::getValidDiscountCodeForProduct($code, $this);
            if ($discountFromCode) {
                $this->discounts[] = $discountFromCode;
                $amount = $this->getDiscountAmount($discountFromCode);
            }
        }
        return $amount;
    }
    private function free()
    {
        $invoice_id = uniqid();

        resolve(PaymentRepository::class)->store([
                'user_id' => auth()->id(),
                'paymentable_id' => $this->id,
                'paymentable_type' => get_class($this),
                'amount' => 0,
                'quantity' => 1,
                'totalAmount' =>0,
                'invoice_id' => $invoice_id,
                'gateway' => 'free',
                'status' => PaymentRepository::CONFIRMATION_STATUS_SUCCESS,
            ],$this->discounts);

        $repository = resolve(PaymentRepository::class);
        $payments = $repository->findByInvoiceId($invoice_id);

        foreach ($payments as $payment) {
            event(new PaymentWasSuccessful($payment));
            session()->forget('code');
        }
        newFeedbacks('عملیات موفق', 'پرداخت با موفقیت انجام شد', 'success');
        return redirect('/');
    }

    public function getDiscountAmount($discount,$quantity = 1)
    {
        $discountService = new DiscountService();
        return $discountService->calculateDiscountAmount($this,$discount,$quantity);
    }





}
