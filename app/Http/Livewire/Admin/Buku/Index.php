<?php

namespace App\Http\Livewire\Admin\Buku;

use App\Models\Buku;
use Livewire\Component;

class Index extends Component
{
    public $buku_id;

    //hapus
    public function destroyBuku ($buku_id){

        dd($buku_id);
        $buku = Buku::find($buku_id);
        $buku->delete();
        session()->flash('message', 'Data buku sudah terhapus.');

        $this->dispatchBrowserEvent('close-modal');
    }

    public function render()
    {
        $listbuku = Buku::orderBy('id_buku', 'DESC')->get(); //pagination(10)
        return view('livewire.admin.buku.index', ['listbuku' => $listbuku]);
    }
}
