<?php

namespace App\Http\Controllers;

use App\Product;
use App\Like;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [];
        // ユーザの投稿の一覧を作成日時の降順で取得
        //withCount('テーブル名')とすることで、リレーションの数も取得できます。
        $products = Product::withCount('likes')->orderBy('created_at', 'desc')->paginate(10);
        $like = new Like;

        $data = [
                'products' => $products,
                'like'=>$like,
            ];

        return view('product.index', $data);
    }

    public function ajaxlike(Request $request)
    {
        $id = Auth::user()->id;
        $product_id = $request->product_id;
        $like = new Like;
        $product = Product::findOrFail($product_id);

        // 空でない（既にいいねしている）なら
        if ($like->like_exist($id, $product_id)) {
            //likesテーブルのレコードを削除
            $like = Like::where('product_id', $product_id)->where('user_id', $id)->delete();
        } else {
            //空（まだ「いいね」していない）ならlikesテーブルに新しいレコードを作成する
            $like = new Like;
            $like->post_id = $request->post_id;
            $like->user_id = Auth::user()->id;
            $like->save();
        }

        //loadCountとすればリレーションの数を○○_countという形で取得できる（今回の場合はいいねの総数）
        $productLikesCount = $product->loadCount('likes')->likes_count;

        //一つの変数にajaxに渡す値をまとめる
        //今回ぐらい少ない時は別にまとめなくてもいいけど一応。笑
        $json = [
            'productLikesCount' => $productLikesCount,
        ];
        //下記の記述でajaxに引数の値を返す
        return response()->json($json);
    }


    public function productdetail($id)
    {

        $product = Product::find($id);

        return view('product_detail',compact('product'));
    }

    public function search(Request $request)
    {
        $product = new Product;

        $keyword = '';
        $keyword = $request->input('keyword');
        
        // $keywordに全角スペースがあれば半角スペースに変換し、半角スペースで文字列を区切り配列化 's'変換コード

        $keys = preg_split('/[\s,]+/', mb_convert_kana($keyword, 's'), -1, PREG_SPLIT_NO_EMPTY);

        // 配列になっているのでループ処理
        $products = [];
        foreach ($keys as $key) {

            // title, textをor検索 title, textはカラム名が違うのであれば置き換え

            $products[]=$product->where('title', 'LIKE', "%{$key}%")->orWhere('size', 'LIKE', "%{$key}%")->get()->toArray();
        }

        return view('search', compact('keyword', 'products'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $product = new Product;

        $file = $request->file('image_path')->getClientOriginalName();
        $file=$request->file('image_path')->store('public/image');
        $file = str_replace('public/image/','',$file);


        Product::create([

            'title' => $request->title,

            'description' => $request->description,

            'image_path' => $file,

            'price' => $request->price,

            'stock' => $request->stock,

            'size' => $request->size,

        ]);

        return redirect()->route('home');
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //
    }
}
