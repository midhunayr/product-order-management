<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Http\Requests\AddProductRequest;
use App\Repositories\ProductRepository;
use App\Http\Requests\AddCategoryRequest;

class ProductController extends Controller
{
    public $productRepo;

    public function __construct(ProductRepository $productRepo)
    {
        $this->productRepo = $productRepo;
    }

    public function addProduct()
    {

        $category = Category::get();
        return view('pages.addproduct', compact('category'));
    }


    public function storeProduct(AddProductRequest $request)
    {
        $this->productRepo->createProduct($request);
        return response()->json(['status' => 200, 'message' => 'success']);
    }

    public function listProduct()
    {

        $product = Product::with('category')->get();
        return view('pages.listproduct', compact('product'));
    }


    public function editProductView($productid)
    {

        $product = $this->productRepo->editProduct($productid);
        $category = Category::get();
        return view('pages.editproduct', compact('product', 'category'));
    }

    public function updateProduct(Request $request, $id)
    {

        $this->productRepo->updateProduct($id, $request);
        return response()->json(['status' => 200, 'message' => 'success']);
    }

    public function destroyProduct($id)
    {

        $product = $this->productRepo->find($id);
        $this->productRepo->destroy($product);
        return response()->json(['status' => 200, 'message' => 'success']);
    }

    public function listCategory()
    {

        $category = Category::get();
        return view('pages.listcategory', compact('category'));
    }

    public function editCategoryView($category)
    {

        $category = $this->productRepo->editCategory($category);
        return view('pages.editcategory', compact('category'));
    }

    public function updateCategory(Request $request, $id)
    {

        $this->productRepo->updateCategory($id, $request);
        return response()->json(['status' => 200, 'message' => 'success']);
    }

    public function destroyCategory($id)
    {

        $product = $this->productRepo->getCategory($id);
        $this->productRepo->destroyCategory($product);
        return response()->json(['status' => 200, 'message' => 'success']);
    }

    public function addCategory()
    {
        return view('pages.addcategory');
    }


    public function storeCategory(AddCategoryRequest $request)
    {
        $this->productRepo->createCategory($request);
        return response()->json(['status' => 200, 'message' => 'success']);
    }
}
