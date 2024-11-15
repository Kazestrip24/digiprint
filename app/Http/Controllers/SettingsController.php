<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Setting;

class SettingsController extends Controller
{
    public function index()
    {
        // Ambil data pengaturan (misalnya banner image dan teks)
        $setting = Setting::first(); // Ambil pengaturan pertama atau sesuaikan dengan kebutuhan
        $bannerImage = $setting->banner_image;
        $bannerText = $setting->banner_text;  // Ambil teks banner

        // Kirim data ke view (index)
        return view('index', compact('setting'));
    }
}
