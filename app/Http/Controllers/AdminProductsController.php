<?php

namespace CodeCommerce\Http\Controllers;

use CodeCommerce\Category;
use CodeCommerce\Tag;
use CodeCommerce\ProductImage;
use Illuminate\Http\Request;
use CodeCommerce\Http\Requests;
use CodeCommerce\Http\Controllers\Controller;
use CodeCommerce\Product;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

class AdminProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    private $productModel;
    public function __construct(Product $product)
    {
        $this->productModel = $product;
    }

    public function index()
    {
        //
        $prod = new Product();
        $products = $prod->paginate(15);
        return view('products', compact('products'));
    }

    public function create(Category $category)
    {
        $categories = $category->lists('name', 'id');

        return view('products.create', compact('categories'));
    }


    /**
     * [insere_tags description]
     * @param  [type] $alltags [description]
     * @param  [type] $id      [description]
     * @return [type]          [description]
     */
    public function insere_tags($alltags, $id)
    {
        $tagModel = new Tag();
        $product = $this->productModel->find($id);

        $tags = explode(',', $alltags);
        
        $tagsAdd = array();
        foreach($tags as $newtags)
        {
            $tag = $tagModel->firstOrCreate(['name' => trim($newtags)]);
            $tagsAdd[] = $tag->id;
        }

        $product->tags()->sync($tagsAdd);
    }


    public function store(Requests\ProductRequest $request)
    {
        $product = $this->productModel->fill($request->all());
        $product = $this->productModel->firstOrCreate($request->all());
        $this->insere_tags($request->tags, $product->id);
        


        return redirect()->route('listproduct');
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
    public function edit(Category $category, $id)
    {
        $product = $this->productModel->find($id);
        $categories = $category->lists('name', 'id');
        $tags = '';

        foreach($product->tags as $tag)
        {
            $tags .= ' '.$tag->name.',';
        }

        return view('products.edit', compact('product', 'categories','tags'));
    }



    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Requests\ProductRequest $request, $id)
    {
        $this->productModel->find($id)->update($request->all());
        $this->insere_tags($request->tags, $id);
        return redirect()->route('listproduct');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = $this->productModel->find($id);

        if($product->images)
        {
            foreach($product->images as $image){
                if(file_exists(public_path('uploads/imgs/'.$image->id.'.'.$image->extension )))
                {
                    Storage::disk('public_local')->delete($image->id.'.'.$image->extension);
                }
                $image->delete();
            }
        }

        foreach($product->tags as $tag)
        {
            $product->tags()->dettach($tag->id);
        }

        $product->delete();

        return redirect()->route('listproduct');
    }

    public function images($id)
    {
        $product = $this->productModel->find($id);

        return view('products.images', compact('product'));
    }

    public function createImage($id)
    {
        $product = $this->productModel->find($id);

        return view('products.create_image', compact('product'));
    }

    public function storeImage(Requests\ProductImageRequest $request, $id, ProductImage $productImage)
    {
        $file = $request->file('image');
        $extension = $file->getClientOriginalExtension();

        $image = $productImage::create([
            'product_id' => $id,
            'extension' => $extension
            ]);

        Storage::disk('public_local')->put($image->id.'.'.$extension, File::get($file));

        return redirect()->route('product.images', ['id' => $id]);
    }

    public function destroyImage(ProductImage $productImage, $id)
    {
        $image = $productImage->find($id);

        if(file_exists(public_path('uploads/imgs/'.$image->id.'.'.$image->extension ))){
            Storage::disk('public_local')->delete($image->id.'.'.$image->extension);
        }

        $image->delete();

        return  redirect()->route('product.images', ['id' => $image->product->id]);
    }


}
