<?php
namespace App\Http\Controllers\Admin;
use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminHomeController extends Controller
{
    public function index()
{
    $title = 'Admin Home Sub Page';
    $message = 'Welcome to Admin Panel';

    $categoryCount = Category::count();
    $productCount = Product::count();
    $userCount = User::count();

    $latestProducts = Product::latest()->take(5)->get();
    $latestUsers = User::latest()->take(5)->get();

    return view('admin.index', compact(
        'title',
        'message',
        'categoryCount',
        'productCount',
        'userCount',
        'latestProducts',
        'latestUsers'
    ));
}
}
