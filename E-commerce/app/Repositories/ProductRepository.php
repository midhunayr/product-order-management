<?php

namespace App\Repositories;

use App\Models\Category;
use App\Models\Product;

class ProductRepository
{
    public function model()
    {
        return Product::class;
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

    public function createProduct($data)
    {
        $product = new Product();
        $product->product_name = $data['productname'];
        $product->price = $data['price'];
        $product->category_id = $data['category'];

        if (isset($data['image'])) {

            $imageName = $data['type'] . time() . '.' . $data['image']->getClientOriginalExtension();
            $product->image = $imageName;
            $data['image']->storeAs('public/images/', $imageName);
        } else {
            $product->image = '';
        }

        $product->save();
        return $product;
    }


    public static function editProduct($productid)
    {
        return product::with('category')->where('id', $productid)->first();
    }


    public function updateProduct($id, $data)
    {
        $product = product::find($id);
        if (empty($product)) {
            return null;
        }

        $product->product_name = $data['productname'];
        $product->price = $data['price'];
        $product->category_id = $data['category'];

        if (isset($data['image'])) {

            $imageName = $data['type'] . time() . '.' . $data['image']->getClientOriginalExtension();
            $product->image = $imageName;
            $data['image']->storeAs('public/images/', $imageName);
        } else {
            $product->image = '';
        }

        $product->save();
        return $product;
    }

    public function destroy($product)
    {

        return $product->delete();
    }


    public function createCategory($data)
    {
        $category = new Category();
        $category->category = $data['category'];
        $category->save();
        return $category;
    }


    public static function editCategory($category)
    {
        return Category::where('id', $category)->first();
    }

    public function updateCategory($id, $data)
    {
        $category = Category::find($id);
        if (empty($category)) {
            return null;
        }

        $category->category = $data['category'];

        $category->save();
        return $category;
    }

    public function getCategory($id)
    {
        return Category::where('id', $id)->first();
    }

    public function destroyCategory($category)
    {

        return $category->delete();
    }
}
