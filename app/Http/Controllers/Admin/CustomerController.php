<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $customer = Customer::all();
        $user = User::all();
        return view('Admin.Customer.customer', compact('customer', 'user'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $user = User::where('role', 2)->get();
        $customer = Customer::all();
        return view('Admin.Customer.createCustomer', compact('user'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Customer::create([
            'user_id' => $request->user_id,
            'notelp' => $request->notelp,
            'img_customer' => $request->file('img_customer')->store('images'),
        ]);
        return redirect()->route('customer.index')->with('Create', "berhasil Menambah data Product");
    }

    /**
     * Display the specified resource.
     */
    public function show(Customer $customer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $user = User::all();
        $customer = Customer::findOrFail($id);
        return view('Admin.Customer.updateCustomer', compact('customer'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $customer = Customer::findOrFail($id);

        if ($request->hasFile('image/storage/')) {

            $img_customer = $request->file('image/storage/');
            $img_customer->storeAs('public/images/storage/', $img_customer->hasName());

            Storage::delete('public/images/storage/' . $customer->img_customer);

            $customer->update([
                'img_customer' => $img_customer->hashName(),
            ]);
        } else {
            $customer->notelp = $request->notelp;
            $customer->img_customer = $request->file('img_customer')->store('images');
        }

        $customer->update();

        return redirect()->route('customer.index')->with('Update', "Data Customer Berhasil di update");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $customer = Customer::findOrFail($id);

        // Periksa apakah img_customer tidak null sebelum mencoba menghapus
        if ($customer->img_customer) {
            Storage::delete($customer->img_customer);
        }

        $customer->delete();

        return redirect()->back()->with("delete", "berhasil hapus data");
    }
}
