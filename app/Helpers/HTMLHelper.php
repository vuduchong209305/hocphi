<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Request;
use App\Models\Setting;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;
use Auth, Storage, QrCode, File, Blade;

class HTMLHelper {

    public static function uploadImage($type = 'avatar', $folder = 'images', $max_width = 1200, $max_height = 1200)
    {
        if (Request::hasFile($type) && Request::file($type)->isValid()) {

            $imageFile = Request::file($type);
            $extension = strtolower($imageFile->getClientOriginalExtension());
            $types = ['jpeg', 'jpg', 'png', 'webp'];

            if (!in_array($extension, $types)) {
                return null;
            }

            $path = $folder . '/' . date('Y/m/d');

            if (!Storage::disk('public')->exists($path)) {
                Storage::disk('public')->makeDirectory($path);
            }

            $manager = new ImageManager(new Driver());
            $image = $manager->read($imageFile->getRealPath());

            // 👉 resize giữ tỉ lệ, KHÔNG crop
            $image->scaleDown($max_width, $max_height);

            $fileName = $path . '/' . str()->random(20) . '.webp';

            $encoded = $image->toWebp(90); // giảm nhẹ dung lượng

            Storage::disk('public')->put($fileName, (string) $encoded);

            return $fileName;
        }
    }

    public static function updateImage($avatar_old = '', $type = 'avatar', $folder = 'images', $max_width = 500, $max_height = 500)
    {
        $currentField = $type . '_current';

        // ========================
        // 1. Upload file mới
        // ========================
        if (Request::hasFile($type) && Request::file($type)->isValid()) {

            $imageFile = Request::file($type);
            $extension = strtolower($imageFile->getClientOriginalExtension());
            $types = ['jpeg', 'jpg', 'png', 'webp'];

            if (!in_array($extension, $types)) {
                return $avatar_old;
            }

            $path = $folder . '/' . date('Y/m/d');

            if (!Storage::disk('public')->exists($path)) {
                Storage::disk('public')->makeDirectory($path);
            }

            $manager = new ImageManager(new Driver());
            $image = $manager->read($imageFile->getRealPath());

            // resize giữ tỉ lệ
            $image->scaleDown($max_width, $max_height);

            $fileName = $path . '/' . str()->random(20) . '.webp';

            $encoded = $image->toWebp(100);

            Storage::disk('public')->put($fileName, (string) $encoded);

            // Xóa ảnh cũ
            if (!empty($avatar_old) && Storage::disk('public')->exists($avatar_old)) {
                Storage::disk('public')->delete($avatar_old);
            }

            return $fileName;
        }

        // ========================
        // 2. Không upload mới
        // ========================

        $currentValue = request()->input($currentField);

        // Giữ nguyên ảnh
        if ($currentValue == $avatar_old) {
            return $avatar_old;
        }

        // Xóa ảnh (user bấm remove)
        if (empty($currentValue)) {

            if (!empty($avatar_old) && Storage::disk('public')->exists($avatar_old)) {
                Storage::disk('public')->delete($avatar_old);
            }

            return null;
        }

        return $avatar_old;
    }

    public static function renderBladeString($template, $data = []) {
        $generated = Blade::compileString($template);

        ob_start();
        extract($data, EXTR_SKIP);
        $__env = app(\Illuminate\View\Factory::class);
        try {
            eval('?>' . $generated);
        } catch (\Exception $e) {
            ob_end_clean();
            throw $e;
        }

        return ob_get_clean();
    }

    public static function getOption($option_key = null, $value = null)
    {
        if(!empty($option_key)) {

            $option = Setting::select('option_value')->where('option_key', $option_key)->first();

            if($option) {

                $option_value = $option->option_value;

                if(!empty($value) && is_array($option_value) && count($option_value) > 0) {

                    return isset($option_value[$value]) ? $option_value[$value] : null;
                }

                return $option_value;
            }
            
        }
    }

    public static function getOptionLang($key, $lang = null)
    {
        $lang = $lang ?? app()->getLocale();

        $setting = Setting::where('option_key', $key)->first();

        if(!$setting) return null;

        $value = json_decode($setting->option_value, true);

        return is_array($value) ? $value[$lang] : $value;
    }

    public static function generateQR($userExhibition, $exhibition_slug)
    {
        // ===== INIT MANAGER =====
        $manager = new ImageManager(new Driver());

        // Nội dung QR (quan trọng)
        $qrContent = $userExhibition->qr_code;

        // Generate QR
        $qrBinary = (string) QrCode::format('png')
            ->size(500)
            ->encoding('UTF-8')
            ->margin(1)
            ->errorCorrection('H')
            ->generate($qrContent);

        // ===== READ IMAGE =====
        $qrImage = $manager->read($qrBinary);

        // resize logo
        $logoSize = intval($qrImage->width() * 0.2);

        $logo = $manager->read(public_path('assets/images/logo-expoplus-square.jpg'))
            ->resize($logoSize, $logoSize);

        // đặt logo
        $qrImage->place($logo, 'center');

        // ===== TẠO BACKGROUND =====
        $width  = $qrImage->width() + 10;
        $height = $qrImage->height() + 10;

        $background = $manager->create($width, $height)
            ->fill('#ffffff');

        // ===== CHÈN QR =====
        $background->place($qrImage, 'center');

        // path
        $path = 'qrcode/' . date("Y/m/d") . '/' . $exhibition_slug;

        if (!Storage::disk('public')->exists($path)) {
            Storage::disk('public')->makeDirectory($path);
        }

        $fileName = $path . '/' . $userExhibition->qr_code . '.webp';

        // ===== ENCODE WEBP =====
        $encoded = $background->toWebp(90);

        Storage::disk('public')->put($fileName, (string) $encoded);

        return '/storage/' . $fileName;
    }
}

?>