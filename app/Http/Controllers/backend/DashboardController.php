<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ProductModel;
use App\Models\CategoryModel;
use App\Models\BrandModel;
use App\Models\CouponModel;
use App\Models\UserModel;
use App\Models\CommentModel;
use App\Models\OrderModel;
use App\Models\OrderdetailModel;
use App\Models\PostModel;
use App\Models\WishlistModel;
use Carbon\Carbon;
use DB;
use Illuminate\Support\Facades\DB as FacadesDB;

class DashboardController extends Controller
{
    
    public function __construct(){
        $active = "active";
        view()->share('activeDashboard', $active);
    }

    public function index(){

        return view('backend.dashboard.dashboard');
    }
    
}
