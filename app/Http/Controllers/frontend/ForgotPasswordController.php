<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\CategoryModel;
use App\Models\BrandModel;
use App\Helpers\SeoHelper;
use App\Models\UserModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;
use App\Mail\ForgotPassword;
use App\Models\CustomerToken;
use Illuminate\Support\Facades\Log;

class ForgotPasswordController extends Controller
{
    public function __construct(){
        $dataCategory = CategoryModel::all();
        $dataBrand = BrandModel::all();
        $this->data_seo = new SeoHelper('Kính chào quý khách', 'Bàn decor, gương decor, thảm decor, ghể decor, tranh decor', 'VINANEON - Chuyên cung cấp những vật phẩm decor uy tín, chất lượng, giá rẻ', 'http://127.0.0.1:8000/customer');

        view()->share(['dataCategory' => $dataCategory, 'dataBrand' => $dataBrand, 'data_seo' => $this->data_seo]);
    }
    // Hiển thị form yêu cầu link reset password
    public function showLinkRequestForm()
    {
        return view('frontend.customer.mail-reset-password');
    }

    // Gửi email chứa link reset password
    public function sendResetLinkEmail(Request $request)
{
    $request->validate([
        'user_email' => 'required|email|exists:users,user_email',
    ], [
        'user_email.required' => 'Vui lòng nhập email.',
        'user_email.email' => 'Định dạng email không hợp lệ.',
        'user_email.exists' => 'Email này không tồn tại trong hệ thống.',
    ]);

    try {
        // Bước 1: Lấy thông tin user
        Log::info('Bắt đầu lấy thông tin user.', ['email' => $request->user_email]);

        $user = UserModel::where('user_email', $request->user_email)->first();
        if (!$user) {
            Log::error('User không tồn tại.', ['email' => $request->user_email]);
            throw new \Exception('User không tồn tại.');
        }
        Log::info('Thông tin user:', ['user' => $user]);

        // Bước 2: Tạo token
        $token = Str::random(40);
        $tokenData = [
            'token' => $token,
            'email' => $request->user_email,
        ];
        Log::info('Token được tạo thành công.', ['token' => $token]);

        // Bước 3: Lưu token vào bảng customer_tokens
        $userToken = CustomerToken::create($tokenData);
        Log::info('Token đã được lưu vào bảng customer_tokens.', ['tokenData' => $tokenData]);

        // Bước 4: Gửi email
        Mail::to($request->user_email)->send(new ForgotPassword($user, $token));
        Log::info('Email đã được gửi thành công.', ['email' => $request->user_email]);

        return redirect()->back()->with('msgSuccess', 'Vui lòng kiểm tra email để tiếp tục.');
    } catch (\Throwable $th) {
        // Log lỗi
        Log::error('Lỗi trong quá trình gửi email reset password.', [
            'message' => $th->getMessage(),
            'trace' => $th->getTraceAsString(),
        ]);

        return redirect()->back()->with('msgError', 'Gửi mail thất bại! Vui lòng kiểm tra lại email!');
    }
}


    // Hiển thị form đặt lại mật khẩu
    public function showResetForm($token)
    {
        //dd($token); //
        return view('frontend.customer.reset-password', ['token' => $token]);
    }

    // Xử lý đặt lại mật khẩu
    public function reset($token)
    {
        // Bước 1: Validate dữ liệu
        request()->validate([
            'password' => 'required|confirmed|min:6',
            'password_confirmation' => 'required|same:password',
        ], [
            'password.required' => 'Vui lòng nhập mật khẩu.',
            'password_confirmation.confirmed' => 'Mật khẩu xác nhận không khớp.',
        ]);
    
        // Bước 2: Kiểm tra token
        $tokenData = CustomerToken::where('token', $token)->first();
    
        if (!$tokenData) {
            return redirect()->back()->with('msgError', 'Token không hợp lệ hoặc đã hết hạn.');
        }
    
        $customer = $tokenData->customer;
    
        // Bước 3: Cập nhật mật khẩu
        $data = [
            'password' => bcrypt(request('password'))
        ];
    
        $check = $customer->update($data);
    
        // Bước 4: Xóa token nếu cập nhật thành công
        if ($check) {
            CustomerToken::where('token', $token)->delete(); // Xóa token dựa vào token
            return redirect()->route('login')->with('msgSuccess', 'Cập nhật mật khẩu thành công.');
        }
    
        return redirect()->back()->with('msgError', 'Cập nhật mật khẩu thất bại.');
    }
    

}
