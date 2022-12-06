<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserFormRequest;
use App\Models\User;
use Illuminate\Http\Request;

class AkunController extends Controller
{
    public function index()
    {
        $data["users"] = User::orderBy("created_at", "DESC")->get();

        return view("admin.users.index", $data);
    }

    public function store(UserFormRequest $request)
    {
        $validatedData = $request->validated();

        $user = new User;

        $user->id_users = date("YmdHis");
        $user->nama = $validatedData["nama"];
        $user->email = $validatedData["email"];
        $user->password = bcrypt("password");
        $user->role = "admin";

        $user->save();

        return back()->with('message', 'Data User Berhasil Ditambahkan!');
    }

    public function update(UserFormRequest $request, $id_users)
    {
        $validatedData = $request->validated();

        User::where("id_users", $id_users)->update([
            "nama" => $validatedData["nama"],
            "email" => $validatedData["email"]
        ]);

        return back()->with('message', 'Data User Berhasil Diubah!');
    }

    public function destroy($id_users)
    {
        User::where("id_users", $id_users)->delete();

        return back()->with('message', 'Data User Berhasil Dihapus!');
    }
}
