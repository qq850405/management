<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $products = new Product();
        $category = $products->getProductCategory(1);
        $menu = $products->getProduct();
        return view('menu', compact('category', 'menu'));
    }

    public function shop()
    {
        $products = new Product();
        $menu = $products->getProductByPeriod();
        return view('shop', compact('menu'));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        try {
            $data = $request->validate([
                'name' => ['required', 'string', 'max:20'],
                'description' => ['required', 'string', 'max:255'],
                'status' => ['required', 'string', 'max:10'],
                'inventory' => ['required', 'integer', 'min:0'],
                'price' => ['required', 'integer', 'min:1'],
            ]);
        } catch (ValidationException $e) {
            return response()->json(['status' => 'The given data was invalid.']);
        }

        Product::query()
            ->create([
                'name' => $data['name'],
                'description' => $data['description'],
                'status' => $data['status'],
                'inventory' => $data['inventory'],
                'price' => $data['price'],
                'seller_id' => Auth::id()
            ]);

        return response()->json(['status' => 'success']);

    }

    /**
     * Display the specified resource.
     *
     *
     * @return string
     */
    public function show($product)
    {
        //
        $data = Product::canShow()->find($product);
        if (!$data) {
            return response()->json(['status' => 'product doesn\'t exists.']);
        } else {
            return $data->first();
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Product $product
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, Product $product)
    {
        try {
            $data = $request->validate([
                'name' => ['required', 'string', 'max:200'],
                'description' => ['required', 'string', 'max:255'],
                'status' => ['required', 'string', 'max:10'],
                'inventory' => ['required', 'integer', 'min:0'],
                'price' => ['required', 'integer', 'min:1'],
            ]);
        } catch (ValidationException $e) {
            return response()->json(['status' => 'The given data was invalid.']);
        }

        if (Auth::id() == $product->seller()->first()->id) {
            $product->update([
                'name' => $data['name'],
                'description' => $data['description'],
                'status' => $data['status'],
                'inventory' => $data['inventory'],
                'price' => $data['price'],
            ]);
            return response()->json(['status' => 'update success']);
        } else {
            return response()->json(['status' => 'update failed']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Product $product
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(Product $product)
    {
        if (Auth::id() == $product->seller()->first()->id) {
            $product->delete();
            return response()->json(['status' => 'delete success']);
        } else {
            return response()->json(['status' => 'delete failed']);
        }
    }

    public function addProduct()
    {
//        $user = new User();
//        $seller = $user->getSeller();
        return view('add_product');
    }

    public function addProductAction(Request $request)
    {
        try {
            $data = $request->validate([
                'name' => ['required', 'string', 'max:200'],
                'description' => ['nullable'],
                'category' => ['required', 'string'],
                'inventory' => [ 'integer', 'min:0'],
                'price' => ['required', 'numeric', 'min:0'],
                'photo' => 'image|mimes:jpeg,png,jpg,gif,svg',
                'recommend' => 'string',
                'online_ordering' => 'string',
                'menu_order' => [ 'integer', 'min:0']

            ]);
        } catch (ValidationException $e) {

            dd($e);
            return response()->json(['status' => 'The given data was invalid.']);
        }

        $product = new Product();
        $sort_data  = $product->checkProductCategoryExist(1,$data['category']);
        if($sort_data){
            $product->category = $data['category'];
            $product->category_sort = $sort_data->category_sort;
        }else{
            $product->category = $data['category'];
            $product->category_sort = 999;
        }
        $product->name = $data['name'];
        $product->description = $data['description'];
        $product->inventory = $data['inventory'];
        $product->price = $data['price'];
        $product->status = 'on';
        $product->seller_id = 1;
        $product->recommendation = $data['recommend'] ?? "0";
        $product->online_ordering = $data['online_ordering'] ?? "0";



        if ($request->photo != null) {
            $imageName = time() . '.' . $request->photo->extension();
            $request->photo->move(public_path('images'), $imageName);
            $product->photo = $imageName;
        }
        $product->save();

        return redirect()->back();

    }

    public function showProductList()
    {
        $products = new Product();
        $menu = $products->getProduct();
        return view('product_list', compact('menu'));
    }

    public function productUpdateAction(Request $request)
    {
        try {
            $data = $request->validate([
                'id' => ['required', 'integer', 'min:0'],
                'name' => ['required', 'string', 'max:200'],
                'description' => ['nullable'],
                'category' => ['required', 'string'],
                'inventory' => ['required', 'integer', 'min:0'],
                'price' => ['required', 'numeric', 'min:0'],
                'photo' => 'image|mimes:jpeg,png,jpg,gif,svg',
                'recommend' => 'string',
                'add_to' => 'string',
                'online_ordering' => 'string',
                'category_sort' => ['required', 'integer', 'min:0'],
                'menu_sort' => ['required', 'integer', 'min:0'],
            ]);
        } catch (ValidationException $e) {
            dd($e);
            return response()->json(['status' => 'The given data was invalid.']);
        }

        $sort = new Product();

        $sort->query()
            ->where('category', $data['category'])
            ->update([
                'category_sort' => $data['category_sort'],
            ]);

        $sort->query()
            ->where('id', $data['id'])
            ->update([
                'menu_sort' => $data['menu_sort'],
            ]);


        $product = new Product();
        $product->query()
            ->where('id', $data['id'])
            ->update([
                'name' => $data['name'],
                'description' => $data['description'],
                'inventory' => $data['inventory'],
                'price' => $data['price'],
                'status' => 'on',
                'seller_id' => 1,
                'category' => $data['category'],
                'recommendation' => $data['recommend'] ?? "0",
                'online_ordering' => $data['online_ordering'] ?? "0",
                'add_to' => $data['add_to'] ?? "0",

            ]);

        if ($request->hasFile('photo')) {
            $imageName = time() . '.' . $request->photo->extension();
            $request->photo->move(public_path('images'), $imageName);
            $product->query()
                ->where('id', $data['id'])
                ->update([
                    'photo' => $imageName,
                ]);
        }

        return redirect()->back();

    }

    public function showProductUpdate(Request $request)
    {

        $data = $request->validate([
            'id' => ['required', 'integer', 'min:0'],
        ]);

        $product = new Product();
        $p = $product->getProductById($data['id']);
        return view('update_product', compact('p'));
    }

    public function productDelete(Request $request)
    {
        $data = $request->validate([
            'id' => ['required', 'integer', 'min:0'],
        ]);

        $product = new Product();
        $product->query()
            ->where('id', $data['id'])
            ->delete();

        return redirect()->back();
    }

    public function deleteProductPhoto(Request $request)
    {
        $data = $request->validate([
            'id' => ['required', 'integer', 'min:0'],
        ]);

        $product = new Product();
        $product->deletePhoto($data['id']);
        return redirect()->back();
    }

    public function updateAllOnlineOrdering(Request $request)
    {
        $product = new Product();
        $product->updateOnlineOrdering();
        return redirect()->back();
    }
}
