<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddOrderRequest;
use App\Models\Customer;
use App\Models\OrderDetails;
use App\Models\Product;
use App\Repositories\OrderRepository;
use Illuminate\Http\Request;


class OrderController extends Controller
{
    public $orderRepo;

    public function __construct(OrderRepository $orderRepo)
    {
        $this->orderRepo = $orderRepo;
    }


    public function addOrderView()
    {
        return view('pages.addorder');
    }

    public function storeOrder(Request $request)
    {
        //dd('hii');
        $id = $this->orderRepo->createOrder($request->all());
        // dd($id);
        // $customer = Customer::find($id);
        // $products = Product::get();
        // return view('pages.productsview', compact('products', 'customer', 'id'));
        // dd(redirect()->route('user.productview'));
        return redirect()->route('user.productview', $id);
    }


    public function productView($id)
    {

        $customer = Customer::find($id);
        $products = Product::get();
        return view('pages.productsview', compact('products', 'customer'));
    }


    public function storeProductOrder(Request $request, $id)
    {

        $data = $this->orderRepo->customerOrder($request->all(), $id);
        return response()->json(['status' => '200', 'message' => 'Successfully added the question', 'data' => $data]);
    }


    public function destroyOrderProduct(Request $request, $id)
    {

        $this->orderRepo->destroyOrder($request->all(), $id);
        return response()->json(['status' => 200, 'message' => 'success']);
    }

    public function listOrders()
    {
        $orders = Customer::get();
        // dd($orders);
        // $data = $this->orderRepo->getTotalSum();
        // dd($data);
        return view('pages.listorders', compact('orders'));
    }


    public function editOrderView($cusid)
    {

        $order = $this->orderRepo->editOrder($cusid);
        return view('pages.editorderdetails', compact('order'));
    }

    public function updateOrder(Request $request, $id)
    {
        $this->orderRepo->updateCustomer($id, $request);
        return response()->json(['status' => 200, 'message' => 'success']);
    }

    public function destroyOrder($id)
    {

        $this->orderRepo->deleteorder($id);
        return response()->json(['status' => 200, 'message' => 'success']);
    }
}
