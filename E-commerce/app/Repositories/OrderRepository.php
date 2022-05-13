<?php

namespace App\Repositories;

use App\Models\Customer;
use App\Models\OrderDetails;
use Illuminate\Support\Facades\DB;

class OrderRepository
{
    public function model()
    {
        return Customer::class;
    }

    public function find($id)
    {
        $modelName = $this->model();
        $model = null;
        if ($id instanceof $modelName) {

            $model = $id;
        } else {
            $model = $this->model()::find($id);
        }
        return $model;
    }

    public function createOrder($data)
    {

        $order_no = rand(10000, 999999);
        $customer = new Customer();
        $customer->customer_name = $data['customername'];
        $customer->order_no = $order_no;
        $customer->customer_phone = $data['number'];

        $customer->save();

        return $customer->id;
    }

    public function getCustomer($id, $cus_id)
    {
        $dtls =  OrderDetails::where('product_id', $id)->where('customer_id', $cus_id)->first();
        if (!$dtls) {
            return 0;
        } else {

            return 1;
        }
    }

    public function customerOrder($data, $id)
    {
        // dd($data);
        $order = new OrderDetails();
        $order->product_id = $id;
        $order->quantity = $data['quantity'];
        $order->customer_id = $data['cus_id'];
        $order->total_price = $data['quantity'] * $data['price'];

        $order->save();
        return $order;
    }


    public static function getDeleteData($id)
    {
        return OrderDetails::where('product_id', $id)->first();
    }

    public function destroy($product)
    {

        $result = $product->delete();
        return $result;
    }

    public function destroyOrder($data, $id)
    {

        $cus_id = $data['cus_id'];
        $dtls =  OrderDetails::where('product_id', $id)->where('customer_id', $cus_id)->first();
        $dtls->delete();
        return true;
    }


    public static function editOrder($cusid)
    {
        return Customer::where('id', $cusid)->first();
    }


    public function updateCustomer($id, $data)
    {
        $customer = Customer::find($id);
        if (empty($customer)) {
            return null;
        }

        $customer->customer_name = $data['customername'];
        $customer->customer_phone = $data['number'];

        $customer->save();
        return $customer;
    }

    public static function deleteorder($id)
    {
        $data = OrderDetails::where('customer_id', $id)->delete();
        return Customer::where('id', $id)->delete();
    }


    public static function getTotalSum($id)
    {
        return OrderDetails::select(DB::raw('sum(total_price) as total'))->where('customer_id', $id)->first();

        // OrderDetails::groupBy('customer_id')
        //     ->selectRaw('sum(total_price) as sum, customer_id')
        //     ->pluck('sum', 'customer_id');
    }
}
