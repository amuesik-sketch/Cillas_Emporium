<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;

use App\Models\Index;
use App\Models\About;
use App\Models\Deals;
use App\Models\Benefits;
use App\Models\Usage;
use App\Models\Features;
use App\Models\Directions;
use App\Models\Items;
use App\Models\Products;
use App\Models\Testimonials;
use App\Models\Reviews;
use App\Models\Comments;
use App\Models\Blog;
use App\Models\Article;
use App\Models\Contacts;
use App\Models\Details;
use App\Models\Billings;
use App\Models\Order;
use App\Models\Nail;
use App\Models\Makeup;
use App\Models\Pedicure;

class CillasController extends Controller
{
    /* =========================
       HOME
    ========================== */
    public function index()
    {
        return view('welcome', [
            'index' => Index::first(),
            'about' => About::first(),
            'deals' => Deals::first(),
            'features' => Features::first(),
            'benefits' => Benefits::all(),
            'usage' => Usage::first(),
            'directions' => Directions::all(),
            'items' => Items::first(),
            'products' => Products::all(),
            'testimonials' => Testimonials::all(),
            'review' => Reviews::first(),
            'article' => Article::first(),
            'blogs' => Blog::with('comments')->get(),
        ]);
    }

    /* =========================
       COMMENTS
    ========================== */
    public function storeComment(Request $request, $blog_id)
    {
        $request->validate([
            'name' => 'required',
            'comment' => 'required',
        ]);

        Comments::create([
            'blog_id' => $blog_id,
            'name' => $request->name,
            'comment' => $request->comment,
        ]);

        return back()->with('success', 'Comment added successfully!');
    }

    /* =========================
       STATIC PAGES
    ========================== */
    public function about() { return view('about', ['about' => About::first()]); }

    public function features()
    {
        return view('features', [
            'features' => Features::first(),
            'benefits' => Benefits::all(),
            'about' => About::first(),
        ]);
    }

    public function how_to_use()
    {
        return view('htu', [
            'usage' => Usage::first(),
            'directions' => Directions::all(),
            'about' => About::first(),
        ]);
    }

    public function testimonials()
    {
        return view('testimonials', [
            'testimonials' => Testimonials::all(),
            'review' => Reviews::first(),
            'about' => About::first(),
        ]);
    }

    public function blogs()
    {
        return view('blogs', [
            'blogs' => Blog::all(),
            'article' => Article::first(),
        ]);
    }

    public function notfound() { return view('404'); }

    /* =========================
       CONTACT
    ========================== */
    public function contacts()
{
    $contacts = Contacts::first();

    return view('contacts', compact('contacts'));
}

    public function storeContact(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'mail' => 'required|email',
            'subject' => 'required',
            'message' => 'required',
        ]);

        Details::create($request->all());
        return back()->with('success', 'Your message has been sent successfully!');
    }

    /* =========================
       PRODUCTS
    ========================== */
    public function products(Request $request)
    {
        $query = Products::query();

        if ($request->filled('search')) {
            $query->where('first', 'LIKE', '%' . $request->search . '%');
        }

        if ($request->filled('min_price')) {
            $query->where('second', '>=', $request->min_price);
        }

        if ($request->filled('max_price')) {
            $query->where('second', '<=', $request->max_price);
        }

        return view('products', [
            'products' => $query->get(),
            'items' => Items::first(),
        ]);
    }

    /* =========================
       CART (FIXED)
    ========================== */
    public function addToCart(Request $request)
    {
        $request->validate(['product_id' => 'required|exists:products,id']);

        $cart = session()->get('cart', []);
        $cart[] = (int)$request->product_id;

        session(['cart' => $cart, 'cart_count' => count($cart)]);

        return response()->json([
            'success' => true,
            'cart_count' => count($cart),
        ]);
    }

    public function cart()
    {
        $cart = collect(session('cart', []))->values();
        $products = Products::whereIn('id', $cart->unique())->get();

        $grandTotal = 0;
        foreach ($products as $product) {
            $qty = $cart->filter(fn ($id) => $id == $product->id)->count();
            $grandTotal += $product->second * $qty;
        }

        session(['grandTotal' => $grandTotal]);

        return view('cart', compact('products', 'grandTotal'));
    }

    public function increase($id)
    {
        $cart = session()->get('cart', []);
        $cart[] = (int)$id;
        session(['cart' => $cart]);

        $quantity = collect($cart)->filter(fn ($pid) => $pid == $id)->count();

        return response()->json(['quantity' => $quantity]);
    }

    public function decrease($id)
    {
        $cart = session()->get('cart', []);

        $index = array_search((int)$id, $cart);
        if ($index !== false) unset($cart[$index]);

        $cart = array_values($cart);
        session(['cart' => $cart]);

        $quantity = collect($cart)->filter(fn ($pid) => $pid == $id)->count();

        return response()->json(['quantity' => $quantity]);
    }

    public function removeFromCart($id)
    {
        $cart = array_values(array_filter(session('cart', []), fn ($x) => $x != $id));
        session(['cart' => $cart]);

        return response()->json(['success' => true]);
    }

    /* =========================
       CHECKOUT & ORDERS
    ========================== */
    public function checkout()
    {
        return view('checkout', [
            'products' => Products::whereIn('id', collect(session('cart', []))->unique())->get(),
            'grandTotal' => session('grandTotal', 0),
        ]);
    }

    public function storeBillings(Request $request)
{
    // Validate and save billing info
    $billing = Billings::create($request->validate([
        'first_name' => 'required',
        'last_name'  => 'required',
        'email'      => 'required|email',
        'address'    => 'required',
    ]));

    // Generate order number
    $orderNumber = 'ORD-' . strtoupper(Str::random(8));

    // Save order
    Order::create([
        'order_number' => $orderNumber,
        'email'        => $billing->email,
        'total'        => session('grandTotal', 0),
        'status'       => 'received',
    ]);

    // Store order number in session for success page
    return redirect()->route('track.form')
                     ->with('success_message', 'Your order has been placed!')
                     ->with('order_number', $orderNumber);
}

    public function trackOrderForm() { return view('track-order'); }

    public function trackOrder(Request $request)
{
    $order = Order::where('order_number', $request->order_number)->first();

    if(!$order) {
        return redirect()->back()->with('error', 'Order not found!');
    }

    return redirect()->route('order.details', $order->order_number);
}

    /* =========================
       APPOINTMENTS (NAILS, MAKEUP, PEDICURE)
    ========================== */
    // ✅ unchanged from your original — safe to keep

    /* =========================
       NAILS APPOINTMENTS
    ========================== */
    public function nails() { return view('appointments.nails'); }

    public function storeNail(Request $request)
    {
        $data = $request->validate([
            'name' => 'required',
            'phone' => 'required',
            'service' => 'required',
            'date' => 'required|date',
            'time' => 'required',
            'style_image' => 'nullable|image',
            'notes' => 'nullable',
        ]);

        $data['reference'] = Str::uuid();

        if ($request->hasFile('style_image')) {
            $data['style_image'] = $request->file('style_image')->store('nails', 'public');
        }

        $nail = Nail::create($data);

        return redirect()->route('nails.view', $nail->reference)
            ->with('success', 'Appointment booked successfully 💅');
    }

    public function viewNail($reference)
    {
        $nail = Nail::where('reference', $reference)->firstOrFail();
        return view('appointments.nails-view', compact('nail'));
    }

    public function editNail($reference)
    {
        $nail = Nail::where('reference', $reference)->firstOrFail();
        return view('appointments.nails-edit', compact('nail'));
    }

    public function updateNail(Request $request, $reference)
    {
        $nail = Nail::where('reference', $reference)->firstOrFail();

        $data = $request->validate([
            'name' => 'required',
            'phone' => 'required',
            'service' => 'required',
            'date' => 'required|date',
            'time' => 'required',
            'notes' => 'nullable',
        ]);

        $nail->update($data);

        return redirect()->route('nails.view', $reference)
            ->with('success', 'Appointment updated successfully ✨');
    }

    public function deleteNail($reference)
    {
        $nail = Nail::where('reference', $reference)->firstOrFail();
        $nail->delete();

        return redirect()->route('appointments.nails')
            ->with('success', 'Appointment deleted successfully ❌');
    }

    /* =========================
       MAKEUP APPOINTMENTS
    ========================== */
    public function storeMakeup(Request $request)
    {
        $data = $request->validate([
            'name' => 'required',
            'phone' => 'required',
            'email' => 'nullable|email',
            'location' => 'required',
            'makeup_type' => 'required',
            'event_type' => 'nullable',
            'event_date' => 'required|date',
            'event_time' => 'required',
            'faces' => 'required|integer|min:1',
            'style_image' => 'nullable|image',
            'notes' => 'nullable',
        ]);

        $data['reference'] = Str::uuid();

        if ($request->hasFile('style_image')) {
            $data['style_image'] = $request->file('style_image')->store('makeups', 'public');
        }

        $makeup = Makeup::create($data);

        return redirect()->route('makeup.view', $makeup->reference)
            ->with('success', 'Makeup appointment booked successfully 💄');
    }

    public function viewMakeup($reference)
    {
        $makeup = Makeup::where('reference', $reference)->firstOrFail();
        return view('appointments.makeup-view', compact('makeup'));
    }

    public function editMakeup($reference)
    {
        $makeup = Makeup::where('reference', $reference)->firstOrFail();
        return view('appointments.makeup-edit', compact('makeup'));
    }

    public function updateMakeup(Request $request, $reference)
    {
        $makeup = Makeup::where('reference', $reference)->firstOrFail();

        $data = $request->validate([
            'name' => 'required',
            'phone' => 'required',
            'email' => 'nullable|email',
            'location' => 'required',
            'makeup_type' => 'required',
            'event_type' => 'nullable',
            'event_date' => 'required|date',
            'event_time' => 'required',
            'faces' => 'required|integer|min:1',
            'notes' => 'nullable',
        ]);

        $makeup->update($data);

        return redirect()->route('makeup.view', $reference)
            ->with('success', 'Appointment updated successfully ✨');
    }

    public function deleteMakeup($reference)
{
    $makeup = Makeup::where('reference', $reference)->firstOrFail();
    $makeup->delete();

    return redirect()->route('appointments.makeup')
        ->with('success', 'Appointment deleted successfully');
}


    /* =========================
       LASHES & PEDICURE
    ========================== */
    public function lashes() { return view('appointments.lashes'); }

    public function storeLashAppointment(Request $request)
    {
        return back()->with('success', 'Your lash appointment has been booked!');
    }

    
/* =========================
   PEDICURE APPOINTMENTS
========================= */

public function pedicure()
{
    return view('appointments.pedicure');
}

public function storePedicure(Request $request)
{
    $data = $request->validate([
        'name'  => 'required',
        'phone' => 'required',
        'type'  => 'required',
        'date'  => 'required|date',
        'time'  => 'required',
        'notes' => 'nullable',
    ]);

    $data['reference'] = Str::uuid();

    $pedicure = Pedicure::create($data);

    return redirect()->route('pedicure.view', $pedicure->reference)
        ->with('success', 'Pedicure appointment booked successfully 🦶');
}

public function viewPedicure($reference)
{
    $pedicure = Pedicure::where('reference', $reference)->firstOrFail();
    return view('appointments.pedicure-view', compact('pedicure'));
}

public function editPedicure($reference)
{
    $pedicure = Pedicure::where('reference', $reference)->firstOrFail();
    return view('appointments.pedicure-edit', compact('pedicure'));
}

public function updatePedicure(Request $request, $reference)
{
    $pedicure = Pedicure::where('reference', $reference)->firstOrFail();

    $data = $request->validate([
        'name'  => 'required',
        'phone' => 'required',
        'type'  => 'required',
        'date'  => 'required|date',
        'time'  => 'required',
        'notes' => 'nullable',
    ]);

    $pedicure->update($data);

    return redirect()->route('pedicure.view', $reference)
        ->with('success', 'Pedicure appointment updated ✨');
}

public function deletePedicure($reference)
{
    $pedicure = Pedicure::where('reference', $reference)->firstOrFail();
    $pedicure->delete();

    return redirect()->route('appointments.pedicure')
        ->with('success', 'Pedicure appointment deleted ❌');
}

public function show($order_number)
{
    $order = Order::where('order_number', $order_number)->firstOrFail();

    return view('order-details', compact('order'));
}

public function orderDetails($order_number)
{
    $order = Order::where('order_number', $order_number)->firstOrFail();
    return view('order-details', compact('order'));
}
}
