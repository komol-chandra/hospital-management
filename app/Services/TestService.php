<?php
namespace App\Services;

use App\Models\Test;
use Illuminate\Support\Facades\Auth;

class TestService
{
    public function createOrUpdate($data)
    {
        $user_id = Auth::user()->id;
        if (!empty($data["id"])) {
            $test = Test::findOrFail($data['id']);
            $test->updated_by = $user_id;
        } else {
            $test = new Test();
            $test->created_by = $user_id;
        }
        return $test->fill($data)->save() ? $test : null;
    }
    public function lists()
    {
        return Test::orderBy('id', 'DESC')->simplePaginate(10);
    }
    public function getById($id)
    {
        return Test::findOrFail($id);
    }
    public function status($id)
    {
        $test = Test::findOrFail($id);
        if ($test->status == 1) {
            $test->status = 0;
        } else {
            $test->status = 1;
        }
        return $test->save();
    }
    public function delete($id)
    {
        return Test::findOrFail($id)->delete();
    }
}
