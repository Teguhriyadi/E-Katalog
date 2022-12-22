<?php

namespace App\Http\Controllers\Editor\Voting;

use App\Http\Controllers\Controller;
use App\Models\Web\VotingPembaca\Voting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VotingController extends Controller
{
    public function index()
    {
        $data["voting"] = Voting::where("id_editor", Auth::user()->editor->id_editor)->get();

        return view("editor.voting.v_index", $data);
    }

    public function create()
    {
        return view("editor.voting.v_create");
    }

    public function store(Request $request)
    {
        Voting::create([
            "id_voting_pembaca" => "VT-" . date("YmdHis"),
            "url_voting" => $request->url_voting,
            "id_editor" => Auth::user()->editor->id_editor
        ]);

        return redirect("/editor/voting/pembaca")->with('message', 'Data Voting Berhasil Ditambahkan!');
    }

    public function update(Request $request, $id_voting_pembaca)
    {
        Voting::where("id_voting_pembaca", $id_voting_pembaca)->update([
            "url_voting" => $request->url_voting
        ]);

        return back()->with('message', 'Data Voting Berhasil Diubah!');
    }

    public function destroy($id_voting_pembaca)
    {
        Voting::where("id_voting_pembaca", $id_voting_pembaca)->delete();

        return back()->with('message', 'Data Voting Berhasil Dihapus!');
    }
}
