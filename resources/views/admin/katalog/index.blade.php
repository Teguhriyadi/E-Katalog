@extends('layouts.admin')

@section('content')

{{-- manggil isi yg ada di livewire bwt tampilannya --}}
<div>
    <livewire:admin.katalog.index />
</div>

@endsection