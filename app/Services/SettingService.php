<?php
namespace App\Services;

use App\Models\Setting;
use File;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;

class SettingService
{
    public function getData()
    {
        return Setting::first();
    }
    public function createOrUpdate($value)
    {
        $userId = Auth::user()->id;
        if (isset($value['id'])) {
            $data = Setting::findOrFail($value['id']);
            if (isset($value['favicon'])) {
                if (File::exists($data->favicon)) {
                    File::delete($data->favicon);
                }
                $data->favicon = $value['favicon'];
            }
            if (isset($value['small_logo'])) {
                if (File::exists($data->small_logo)) {
                    File::delete($data->small_logo);
                }
                $data->small_logo = $value['small_logo'];
            }
            if (isset($value['logo'])) {
                if (File::exists($data->logo)) {
                    File::delete($data->logo);
                }
                $data->logo = $value['logo'];
            }
            if (isset($value['white_logo'])) {
                if (File::exists($data->white_logo)) {
                    File::delete($data->white_logo);
                }
                $data->white_logo = $value['white_logo'];
            }
            $data->updated_by = $userId;
        } else {
            $data = new Setting();
            $data->created_by = $userId;
        }
        $data->fill($value)->save() ? $data : null;
        Cache::forget('settings');
        return $data ?? null;
    }
}
