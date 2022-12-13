<?php

namespace App\Http\Controllers\Admin\Account;

use App\Http\Controllers\Controller;
use App\Http\Requests\Account\AkunEditor;
use App\Http\Requests\UserFormRequest;
use App\Models\Akun\Editor;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EditorController extends Controller
{
    public function index()
    {
        $data["users"] = User::where("role", "editor")->orderBy("created_at", "DESC")->get();

        return view("admin.users.editor.v_index", $data);
    }

    public function store(AkunEditor $request)
    {
        $validatedData = $request->validated();

        $user = new User;

        $user->id_users = date("YmdHis");
        $user->nama = $validatedData["nama"];
        $user->email = $validatedData["email"];
        $user->password = bcrypt("editor");
        $user->role = "editor";
        $user->status = 1;
        $user->created_by = Auth::user()->id_users;

        $user->save();

        $data_user = User::where("email", $validatedData["email"])->first();

        $customer = new Editor;

        $customer->id_editor = "ED-" . date("YmdHis");
        $customer->user_id = $data_user->id_users;
        $customer->nomer_telepon = $validatedData["nomer_telepon"];
        $customer->alamat = $validatedData["alamat"];
        $customer->gender = $validatedData["gender"];

        $customer->save();

        return back()->with('message', 'Data User Berhasil Ditambahkan!');
    }

    public function update(AkunEditor $request, $id_users)
    {
        $validatedData = $request->validated();

        User::where("id_users", $id_users)->update([
            "nama" => $validatedData["nama"],
            "email" => $validatedData["email"]
        ]);

        Editor::where("user_id", $id_users)->update([
            "nomer_telepon" => $validatedData["nomer_telepon"],
            "gender" => $validatedData["gender"],
            "alamat" => $validatedData["alamat"]
        ]);

        return back()->with('message', 'Data User Berhasil Diubah!');
    }

    public function destroy($id_users)
    {
        Editor::where("user_id", $id_users)->delete();

        User::where("id_users", $id_users)->delete();

        return back()->with('message', 'Data User Berhasil Dihapus!');
    }
}
