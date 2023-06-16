<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\category;
use App\Models\Oder;
use App\Models\product;
use App\Models\subcategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Pagination\LengthAwarePaginator;


use App\Models\User;
use Illuminate\Support\Facades\DB;

class Homecontroller extends Controller
{
    public function redirect()
    {
        if (Auth::check()) {
            $usertype = Auth::user()->usertype;
            if ($usertype == 'admin') {
                return view('admin.home');
            } else {
                $user = auth()->user();
                $count = Cart::where('phone', optional($user)->phone)->count();
                $products = Product::inRandomOrder()->paginate(30);
                $categories = Category::orderBy('name', 'asc')->get();
                return view('user.home', compact('categories', 'products', 'count'));
            }
        } else {
            $products = Product::inRandomOrder()->paginate(16);
            $categories = Category::orderBy('name', 'asc')->get();
            return view('user.home', compact('categories', 'products'));
        }
    }

    // Rest of your code...


    public function index()
    {
        if (Auth::check()) {
            return redirect('redirect');
        } else {
           $products =  Product::inRandomOrder()->paginate(16);
            $categories = Category::orderBy('name', 'asc')->get();
            return view('user.home', compact('categories', 'products'));
        }
    }

   


    public function show($id)
    {    
        $user = auth()->user();
        $count = Cart::where('phone', optional($user)->phone)->count();
        $categorie = Category::orderBy('name', 'asc')->get();
        $categories = Category::find($id);
        $products = $categories->products()->Paginate(30);
        $subcategories = $categories->subcategories;
        $subcategory = Subcategory::find($id);
        return view('user.categoryshow', compact('categories', 'products', 'categorie', 'subcategories', 'subcategory','count'));
    }


    public function showProductsBySubcategory($id)
    {
        $user = auth()->user();
        $count = Cart::where('phone', optional($user)->phone)->count();
        $categorie = Category::orderBy('name', 'asc')->get();
        $subcategory = Subcategory::find($id);
        $products = $subcategory->products()->Paginate(30);
        $categories = Category::all();


        $subcategories = $subcategory->category->subcategories;

        return view('user.subcategoryshow', compact('subcategory', 'products', 'categories', 'subcategories', 'categorie','count'));
    }


    public function productdetail($id)

    {
        $user = auth()->user();
        $count = Cart::where('phone', optional($user)->phone)->count();
        $product = Product::findOrFail($id);
        $categoryProducts = Product::where('category_id', $product->category_id)->get();

        return view('user.productdetail', compact('product', 'categoryProducts','count'));
    }


    public function addcard(Request $request,  $id)
    {

        if (Auth::id()) {

            $user = Auth()->user();
            $product = product::find($id);
            $cart = new Cart;
            $cart->name = $user->name;
            $cart->phone = $user->phone;
            $cart->address = $user->address;
            $cart->product_title = $product->name;
            $cart->price = $product->price;
            $cart->quantity = $request->quantity;
            $cart->save();
            return redirect()->back()->with('message', ' Produit ajouter avec succes');
        } else {
            return redirect('login');
        }
    }


    public function showcart()
    {
        $user = auth()->user();
        $count = Cart::where('phone', $user->phone)->count();
        $cart = Cart::where('phone', $user->phone)->get();
       
        return view('user.showcart', compact('count', 'cart'));
    }


    public function deletecart($id)
    {
        $data = Cart::find($id);
        $data->delete();
        return redirect()->back()->with('message', ' Produit retire avec succes');
    }

     
     public function confirmeorder(Request $request){
        $user = auth()->user();
        $name = $user->name;
        $phone = $user->phone;
        $address = $user->address;

        foreach($request->productname as $key=> $productname ){
            $order = new Oder();
            $order->product_name = $request->productname[$key];
            $order->price = $request->price[$key]; 
            $order->quantity = $request->quantity[$key];
            
            $order->name=$name;
            $order->phone=$phone;
            $order->address=$address;
            $order->status= "En cour";
            $order->save();

        }
        DB::table('carts')->where('phone',$phone)->delete();

        return redirect()->back()->with('message', 'Commande en cour de traitement');
     }




    public function about()
    {
        $user = auth()->user();
        $count = Cart::where('phone', optional($user)->phone)->count();
        return view('user.about', compact('count'));
    }


    public function contact()
    {
        $user = auth()->user();
        $count = Cart::where('phone', optional($user)->phone)->count();
        return view('user.contact', compact('count'));
    }
}
