<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Products;
use App\Models\Categories;
use App\Http\Requests\RuleProducts;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $list = Products::paginate(5);
        return view('admin/products/list', ['list' => $list]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cats = Categories::all();
        return view('admin/products/add', ['cats' => $cats]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RuleProducts $request)
    {
       
        $updated = new Products();
        $updated->name = $_POST['name'];
        $updated->slug = $_POST['slug'];
        $updated->price = $_POST['price'];
        $updated->description = $_POST['description'];
        if ($request->file('image')) {
            $file = $request->file('image');
            $filename = date('YmdHi') . $file->getClientOriginalName();
            $file->move(public_path('public/Image'), $filename);
            $updated['image'] = $filename;
        }
        $updated->id_category = $_POST['id_category'];
        $updated->status = $_POST['status'];
        $updated->save();
        return redirect()->route('products.list');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cats = Categories::all();
        $products = Products::find($id);
        return view('admin/products/edit', ['products' => $products, 'cats' => $cats]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate(
            [
                'name' => ['required', 'string', 'max:255'],
                'price' => ['required', 'numeric', 'max:255'],
                'description' => ['required', 'string', 'max:500'],
                'image' => ['required', 'max:255'],
                'id_category' => ['required'],
            ],
            [
                'required' => ':attribute kh??ng ???????c ????? tr???ng',
                'max' => ':attribute Kh??ng ???????c l???n h??n :max',
                'string' => ':attribute nh???p k?? t??? kh??ng ???????c nh???p s???',
                'numeric' => ':attribute ph???i nh???p s???',
                'max' => ':attribute nh???p ??t nh???t :max k?? t???',
                'unique' => ':attribute ???? t???n t???i'
            ],
            [
                'name' => 'T??n s???n ph???m',
                'price' => 'Gi??',
                'description' => 'M?? t???',
                'image' => 'H??nh',
                'id_category' => 'Lo???i s???n ph???m'
            ]
        );
        $updated = Products::find($id);
        $updated->name = $_POST['name'];
        $updated->slug = $_POST['slug'];
        $updated->price = $_POST['price'];
        $updated->description = $_POST['description'];
        if ($request->file('image')) {
            $file = $request->file('image');
            $filename = date('YmdHi') . $file->getClientOriginalName();
            $file->move(public_path('public/Image'), $filename);
            $updated['image'] = $filename;
        }
        $updated->id_category = $_POST['id_category'];
        $updated->status = $_POST['status'];
        $updated->save();
        return redirect()->route('products.list');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $products = Products::find($id);
        $products->delete($id);
        return redirect('/san-pham');
    }
}
