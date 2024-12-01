<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\UserModel;
use Illuminate\Http\Request;

class VerificationController extends Controller
{
    public function verify(Request $request, $user_id)
{
    // Kiểm tra chữ ký hợp lệ
    if (!$request->hasValidSignature()) {
        abort(401, 'Link không hợp lệ hoặc đã hết hạn.');
    }

    // Tìm user theo ID
    $user = UserModel::findOrFail($user_id);

    // Kiểm tra nếu user đã xác minh email
    if ($user->email_verified_at) {
        return redirect('customer')->with('msgInfo', 'Tài khoản của bạn đã được kích hoạt trước đó.');
    }

    // Xác minh email và kích hoạt tài khoản
    $user->email_verified_at = now();
    $user->status = 1; // Đặt trạng thái user đã kích hoạt
    $user->save();

    return redirect('customer')->with('msgSuccess', 'Tài khoản đã được kích hoạt thành công! Vui lòng đăng nhập.');
}


}
