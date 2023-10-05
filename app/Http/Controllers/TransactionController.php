<?php

namespace App\Http\Controllers;

use App\Models\DonorsCategory;
use App\Models\Transaction;
use Illuminate\Http\Request;
use App\Services\Midtrans\CreateSnapTokenService;

class TransactionController extends Controller
{
    public function index()
    {
        $donors = DonorsCategory::get();
        return view('pay', compact('donors'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name'              =>  'required',
            'grade'             =>  'required',
            'nominal'           =>  'required'
        ]);

        $transaction = Transaction::create([
            'donor_name'            =>  $request->name,
            'donor_category_id'     =>  $request->grade,
            'number'                =>  mt_rand(1000, 7000),
            'total_price'           =>  $request->nominal,
            'payment_status'        =>  1,
        ]);

        return redirect("/pay/$transaction->id");
    }

    public function show($id)
    {
        $transaction = Transaction::where('id', $id)->first();
        if ($transaction != null) {
            $snapToken = $transaction->snap_token;
            if (is_null($snapToken)) {
                // If snap token is still NULL, generate snap token and save it to database

                $midtrans = new CreateSnapTokenService($transaction);
                $snapToken = $midtrans->getSnapToken();

                $transaction->snap_token = $snapToken;
                $transaction->save();
            }
            return view('confirmpay', compact('transaction', 'snapToken'));
        } else {
            return abort(404);
        }
    }
}
