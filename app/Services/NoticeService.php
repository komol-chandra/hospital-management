<?php
namespace App\Services;

use App\Models\Notice;
use Illuminate\Support\Facades\Auth;

class NoticeService
{
    public function lists()
    {
        return Notice::orderBy('id', 'DESC')->get();
    }
    public function createOrUpdate($value)
    {
        $userId = Auth::user()->id;
        if (isset($value['id'])) {
            $data = Notice::findOrFail($value['id']);
            $data->updated_by = $userId;
        } else {
            $data = new Notice();
            $data->created_by = $userId;
        }
        $data->fill($value)->save() ? $data : null;
        return $data ?? null;
    }
    public function getById($id)
    {
        return Notice::findOrFail($id);
    }
    public function delete($id)
    {
        $data = Notice::findOrFail($id);
        return $data->delete();
    }
    public function status($id)
    {
        $data = Notice::findOrFail($id);
        if ($data->status == 1) {
            $data->status = 0;
        } else {
            $data->status = 1;
        }
        return $data->save();
    }
}
