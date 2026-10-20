<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Payment;

class PaymentController extends Controller
{
    public function store(Request $request) {
        $payment = Payment::create($request->only(['booking_id', 'amount', 'method']));
        return response()->json($payment, 201);
    }

    public function index() {
        return Payment::all();
    }

    public function show(string $id) {
        return Payment::findOrFail($id);
    }

    public function update(Request $request, string $id) {
        $payment = Payment::findOrFail($id);

        $payment->update($request->only('booking_id', 'amount', 'method'));

        return $payment;
    }

    public function destroy(string $id) {
        $payment = Payment::findOrFail($id);
        $payment->delete();
        return response()->json($payment, 200);
    }

    public function create() {
        return view('payments.create');
    }

    public function edit(string $id) {
        $payment = Payment::findOrFail($id);
        return view('payments.edit', ['payment' => $payment]);
    }
}
