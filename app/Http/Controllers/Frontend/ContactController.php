<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Setting;
use App\Helpers\SettingHelper;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactFormMail;
use Log;

class ContactController extends Controller
{
    public function index(Request $request)
    {
        $page_id = 9;

        $post = Post::query()
            ->where('id', $page_id)
            ->where('post_status', 'publish')
            ->first();

        $postMeta = $post->GetAllMetaData();

        $mail_address = SettingHelper::get_field('admin_email_address');


        if ($mail_address) {
            $mail = $mail_address;
        } else {
            $mail = 'hello@neevcorporation.com.np';
        }

        try {
            $data = $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|email|max:255',
                'phone' => 'required|string|max:255',
                'option' => 'nullable|string|max:255',
                'message' => 'nullable|string|max:2000',
            ]);
        } catch (\Illuminate\Validation\ValidationException $e) {
            return back()->withErrors($e->errors())->withInput();
        }

        try {

            Mail::to($mail_address)->send(new ContactFormMail($data));

            return view('frontend.pages.thank-you', [
                'message' => 'You have successfully submitted the contact form. We will get back to you soon.',
                'post' => $post,
                'postMeta' => $postMeta,
            ]);
        } catch (\Exception $e) {

            session()->flash('error', 'Error while sending email. Please try again later.', $e->getMessage());
            Log::error('Booking form submission error: ' . $e->getMessage());
            return redirect()->back();
        }
    }
}
