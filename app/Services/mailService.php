<?php
namespace App\Services;

use App\Models\Mail;
use File;
use Illuminate\Support\Facades\Auth;

class mailService
{
    public function lists()
    {
        return Mail::orderBy('id', 'DESC')->paginate(10);
    }
    public function createOrUpdate($value)
    {
        $userId = Auth::user()->id;
        if (isset($value['id'])) {
            $data = Mail::findOrFail($value['id']);
            if (isset($value['file'])) {
                if (File::exists($data->file)) {
                    File::delete($data->file);
                }
                $data->picture = $value['file'];
            }
            $data->updated_by = $userId;
        } else {
            $data = new Mail();
            $data->created_by = $userId;
        }
        return $data->fill($value)->save() ? $data : null;
    }
    public function getById($id)
    {
        return Mail::findOrFail($id);
    }
    public function delete($id)
    {
        $data = Mail::findOrFail($id);
        if ($data) {
            if (File::exists($data->file)) {
                File::delete($data->file);
            }
        }
        return $data->delete();
    }
}
