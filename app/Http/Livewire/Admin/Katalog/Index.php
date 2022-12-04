<?php

namespace App\Http\Livewire\Admin\Katalog;

use App\Models\Katalog;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;
    //protected $paginationTheme = 'bootstrap';

    //public $katalog_id;


    // public function deleteKatalog($katalog_id){
    //     $this->katalog_id = $katalog_id;

    //     //$this.set('katalog_id', id_katalog); (gabisa)
    // }
    
   //hapus
    // public function destroyKatalog($katalog_id){

    //     //dd($katalog_id);
    //     $katalog = Katalog::find($katalog_id);
    //     $katalog->delete();
    //     session()->flash('message', 'udh keapus');

    //     $this->dispatchBrowserEvent('close-modal');
    // }
        
        /**if($katalog == null){
            session() -> flash('message', 'gagal delete');
        }
        else{
            $katalog ->delete();
            session() -> flash('message', 'berhasil apus');
        } 
        return view('livewire.admin.katalog.index'); (gabisa)*/ 


        /**$katalog = Katalog::findorFail($this->katalog_id); //this->katalog_id
        $katalog->delete();
        session()->flash('message', 'udh keapus'); (gabisa)*/

        
//tampilin data katalog
    public function render()
    {
        $katalogs = Katalog::orderBy('id_katalog','DESC') ->get(); //paginate(1);
        return view('livewire.admin.katalog.index', ['katalogs' => $katalogs]);
    }
}
