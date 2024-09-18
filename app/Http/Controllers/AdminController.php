<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Category;

use App\Models\Product;

class AdminController extends Controller
{
    public function view_category()
    {
        $data = Category::all();
        return view('admin.category', compact('data'));
    }
//The method receives the form data via the $request object.
//It creates a new instance of the Category model.
//It assigns the form input (category) to the category_name property of the new Category object.
//The new category is saved to the database.
//Finally, the method redirects the user back to the form page and flashes a success message to be displayed on the redirected page.
    public function add_category(Request $request)
{
    $category = new Category;

    $category->category_name = $request->category;

    $category->save();

    return redirect()->back()->with('success', 'Category added successfully.');
}
public function delete_category($id)
{
    $data = Category::find($id);

    if ($data) {
        $data->delete();
        return redirect()->back()->with('warning', 'Category deleted successfully.');
    } else {
        return redirect()->back()->with('error', 'Category not found.');
    }
}


public function edit_category($id)
{
    $data = Category::find($id);

    return view('admin.edit_category',compact('data'));
}

public function update_category(Request $request, $id)
{
    // Validate the input
    $request->validate([
        'category' => 'required|string|max:255',
    ]);

    // Find the category by its ID
    $data = Category::find($id);

    // Update the category name
    $data->category_name = $request->input('category');

    // Save the updated category
    $data->save();

    // Redirect to the view_category route with a success message
    return redirect('/view_category')->with('success', 'Category updated successfully!');
}

public function add_product()
{
    $category = Category::all();
    return view('admin.add_product', compact('category'));
}

public function upload_product(Request $request)
{
   $data = new Product;
   $data->title = $request->title;

   $data->description = $request->description;

   $data->price = $request->price;

   $data->quantity = $request->qty;

   $data->category = $request->category;

   $image = $request->image;

   if($image){

    $imagename = time().'.'. $image->getClientOriginalExtension();

    $request->image->move('products', $imagename);

    $data->image = $imagename;

   }

   $data->save();

   return redirect()->back()->with('success', 'Product added successfully.');
}

public function view_product()
{
    $product = Product::paginate(2); // Specify the number of items per page
    return view('admin.view_product', compact('product'));
}

public function delete_product($id)
{
    // Find the product by ID
    $data = Product::find($id);

    // Check if the product exists
    if ($data) {

        // Get the image path
        $image_path = public_path('product/' . $data->image); // Ensure folder name matches

        // Check if the image exists in the directory and delete it
        if (file_exists($image_path)) {
            unlink($image_path);
        }

        // Delete the product from the database
        $data->delete();

        // Redirect back with a success message
        return redirect()->back()->with('warning', 'Product deleted successfully.');
    } else {
        // If product not found, return with an error message
        return redirect()->back()->with('error', 'Product not found.');
    }
}

public function update_product($id)
{
    $data = Product::find($id);
    $categories = Category::all(); // Retrieve all categories
    return view('admin.update_page', compact('data', 'categories'));
}




public function edit_product(Request $request, $id)
{
    // Find the product by its ID
    $data = Product::find($id);

    // Update product fields
    $data->title = $request->title;
    $data->description = $request->description;
    $data->price = $request->price;
    $data->quantity = $request->quantity;
    $data->category = $request->category;

    // Handle image upload if a new image is selected
    if ($request->hasFile('image')) {
        // Delete the old image
        $old_image_path = public_path('product/' . $data->image);
        if (file_exists($old_image_path)) {
            unlink($old_image_path);
        }

        // Upload and store the new image
        $image = $request->file('image');
        $imagename = time() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('product'), $imagename);

        // Save the new image name in the database
        $data->image = $imagename;
    }

    // Save the updated product details
    $data->save();

    // Redirect back to view product page
    return redirect('/view_product')->with('success', 'Product updated successfully.');
}

public function product_search(Request $request)
{
    $search = $request->search;

    $product = product::where('title', 'LIKE', '%'.$search.'%')->orWhere('category', 'LIKE', '%'.$search.'%')->orWhere('description', 'LIKE', '%'.$search.'%')->paginate(3);

    return view('admin.view_product',compact('product'));
}

}
