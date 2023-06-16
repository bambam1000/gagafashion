<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\category;
use App\Models\Oder;
use App\Models\product;
use App\Models\subcategory;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Pagination\LengthAwarePaginator;

class AdminController extends Controller
{
    public function home()
    {    $user = auth()->user();
        $count = Cart::where('phone', optional($user)->phone)->count();
        $products = Product::inRandomOrder()->paginate(30);
        $categories = Category::orderBy('name', 'asc')->get();
        return view('user.home',compact('categories','products', 'count'));
    }




    // ======================= Product function   


    public function addproduct()
    {
        $categories = category::all();
        $subcategories = subcategory::all();
        return view('admin.addproduct', compact('categories', 'subcategories'));
    }

    public function insertproduct(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'description' => 'required',
            'quantity' => 'required',
            'price' => 'required|numeric|min:0',
            'image' => 'required|image|max:2048',
            'category' => 'required|exists:categories,id',
            'subcategory' => 'required|exists:subcategories,id',
        ]);

        // Vérifier si les champs de catégorie et de sous-catégorie sont présents et ont une valeur valide
        if (!isset($validated['category']) || !isset($validated['subcategory'])) {
            return redirect()->back()->withErrors('The category and subcategory fields are required.');
        }

        // Enregistrer le produit dans la base de données
        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('public/images');
            $validated['image'] = Storage::url($path);
        }

        $product = Product::create([
            'name' => $validated['name'],
            'description' => $validated['description'],
            'quantity' => $validated['quantity'],
            'price' => $validated['price'],
            'image' => $validated['image'],
            'category_id' => $validated['category'],
            'subcategory_id' => $validated['subcategory'],
        ]);

        return redirect()->route('product')->with('message', 'Product added successfully!');
    }




    public function product()
    {

        $products = Product::latest()->paginate(5);


        return view('admin.product', compact('products'));
    }



    public function deleteproduct($id)
    {

        $product = product::findOrFail($id);
        $product->delete();
        return redirect()->route('product')->with('message', 'Product Delete successfully!');
    }


    public function productedit($id)
    {
        $product = Product::findOrFail($id);
        $categories = Category::all();
        $subcategories = Subcategory::all();
        return view('admin.productedit', compact('product', 'categories', 'subcategories'));
    }

    public function productupdate(Request $request, $id)
    {
        $product = Product::findOrFail($id);
        $product->name = $request->input('name');
        $product->description = $request->input('description');
        $product->price = $request->input('price');
        $product->category_id = $request->input('category_id');
        $product->subcategory_id = $request->input('subcategory_id');

        // Vérification de l'existence d'une image téléchargée
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = time() . '_' . $image->getClientOriginalName();
            $path = $image->storeAs('public/images', $filename);
            $product->image = 'storage/' . str_replace('public/', '', $path);
        }

        $product->save();
        return redirect()->route('product')->with('message', 'Product Update successfully!');
    }

    public function searchproduct(Request $request)
    {
        $query = $request->input('query');
        $products = product::where('name', 'LIKE', "%$query%")->get();


        return view('admin.product', ['products' => $products]);
    }




    // ======================= category function   



    public function addcategory()
    {

        return view('admin.addcategory');
    }

    public function storecategory(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',

        ]);

        $subcategory = Category::create([
            'name' => $validated['name'],

        ]);


        return redirect()->route('category')->with('message', ' Category  Add successfully!');
    }





    public function category()
    {
        $categories = DB::table('categories')->orderByDesc('created_at')->paginate(7);
        return view('admin.category', compact('categories'));
    }




    public function deletecategory($id)
    {


        $category = Category::find($id);

        if (!$category) {
            return redirect()->back()->with('error', 'La catégorie n\'existe pas');
        }


        // Supprimer toutes les sous-catégories associées
        $subcategories = Subcategory::where('category_id', $category->id)->get();

        foreach ($subcategories as $subcategory) {
            $subcategory->delete();
        }

        // Supprimer la catégorie
        $category->delete();

        return redirect()->route('category')->with('message', 'category  Delete successfully!');
    }


    public function categoryedit($id)
    {
        $category = Category::find($id);
        return view('admin.categoryedit', compact('category'));
    }


    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'name' => 'required|unique:categories,name,' . $id,

        ]);

        $category = Category::find($id);
        $category->name = $validated['name'];

        $category->save();

        return redirect()->route('category')->with('message', 'category  Update successfully!');
    }


    public function search(Request $request)
    {
        $query = $request->input('query');
        $categories = Category::where('name', 'LIKE', "%$query%")->get();



        return view('admin.category', ['categories' => $categories]);
    }

     


    // ======================= subcategory function   



    public function subcategory()
    {
        $subcategories = Subcategory::latest()->paginate(7);
        return view('admin.subcategory', compact('subcategories'));
    }



    public function addsubcategory()
    {

        $categories = category::all();

        return view('admin.addsubcategory', compact('categories'));
    }


    public function storesubcategory(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'category_id' => 'required'
        ]);

        $subcategory = Subcategory::create([
            'name' => $validated['name'],
            'category_id' => $validated['category_id']
        ]);


        return redirect()->route('subcategory')->with('message', 'sub Category  Add successfully!');
    }


    public function deletesubcategory($id)
    {
        $subcategory = subcategory::find($id);

        $subcategory->delete();

        return redirect()->route('subcategory')->with('message', 'subcategory  Delete successfully!');
    }



    public function subcategoryedit($id)
    {


        $subcategory = Subcategory::findOrFail($id);
        $categories = Category::all();

        return view('admin.subcategoryedit', compact('subcategory', 'categories'));
    }


    public function updatesubcategory(Request $request, $id)
    {


        $subcategory = Subcategory::find($id);
        $subcategory->name = $request->input('name');
        $subcategory->category_id = $request->input('category_id');
        $subcategory->save();


        return redirect()->route('subcategory')->with('message', 'subcategory  Update successfully!');
    }


    public function searchsubcategory(Request $request)
    {
        $query = $request->input('query');
        $subcategories = subcategory::where('name', 'LIKE', "%$query%")->get();



        return view('admin.subcategory', ['subcategories' => $subcategories]);
    }

    // ======================= showorder function   

    public function showorder(){
          
        $order =Oder::latest()->paginate(7);

        return view('admin.showorder', compact('order'));
    }

    public function updatestatus($id){

    // Mettre à jour le statut de la commande    

      $order=Oder::find($id);
      $order->status = 'delivred';
      $order->save();

      // Déplacer la commande vers une autre page (par exemple, une table "delivered_orders")
    $deliveredOrder = $order->replicate();
    $deliveredOrder->save();
    $order->delete();

    return redirect()->back()->with('message', 'Order status updated successfully');

    }

    public function showDeliveredOrders()
{
    // Récupérer les commandes livrées depuis la base de données
    $deliveredorders = Oder::where('status', 'delivred')->paginate(5);

    return view('admin.deliveredorders', compact('deliveredorders'));
}

}
