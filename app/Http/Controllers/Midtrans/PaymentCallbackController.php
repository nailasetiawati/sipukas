<?php

namespace App\Http\Controllers\Midtrans;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Income;
use App\Models\Transaction;
use App\Services\Midtrans\CallbackService;

class PaymentCallbackController extends Controller
{
    public function receive()
    {
        $transaction = Transaction::where('number', $_REQUEST['order_id'])->first();
        if ($_REQUEST['status_code'] == 200) {
            Transaction::where('number', $_REQUEST['order_id'])->update(['payment_status' => 2]);
            Income::create([
                'nominal'           =>  $transaction->total_price,
                'donor_name'        =>  $transaction->donor_name,
                'donor_category_id' =>  $transaction->donor_category_id,
                'pay_from'          =>  2
            ]);
            return redirect("/pay/$transaction->id")->with('Berhasil', 'Selamat Anda Telah Berhasil Membayar Uang Kas!');
        } else {
            return redirect("/pay/$transaction->id")->with('Gagal', 'Pembayaran Uang Kas Anda Gagal Silahkan Coba Lagi!');
        }
    }
}
