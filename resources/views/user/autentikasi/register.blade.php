@extends("user.layout.main")

@section("title", "Register")

@section("content")

<form method="POST" style="padding: 30px;" action="{{ url('/register') }}">
    @csrf
	<div class="container">
		<div class="card">
			<div class="card-header">
				<i class="fa fa-plus"></i> Daftar Pelanggan
			</div>
			<div class="card-body">
				<div class="row">
					<div class="col-md-6">
						<div class="form-group">
							<label for="email"> Email Pelanggan </label>
							<input type="email" class="form-control" name="email" placeholder="Masukkan email" autocomplete="off">
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label for="password"> Password </label>
							<input type="password" class="form-control" name="password" placeholder="Masukkan password" autocomplete="off">
						</div>
					</div>
				</div>

				<div class="row">
					<div class="col-md-4">
						<div class="form-group">
							<label for="nama"> Nama Pelanggan </label>
							<input type="text" class="form-control" name="nama" id="nama" placeholder="Masukkan Nama Pelanggan" autocomplete="off">
						</div>
					</div>
                    <div class="col-md-4">
						<div class="form-group">
							<label for="gender"> Gender </label>
							<select name="gender" class="form-control" id="gender">
                                <option value="">- Pilih -</option>
                                <option value="L">Laki - Laki</option>
                                <option value="P">Perempuan</option>
                            </select>
						</div>
					</div>
					<div class="col-md-4">
						<div class="form-group">
							<label for="notelp"> Telepon Pelanggan </label>
							<input type="number" class="form-control" name="notelp" id="notelp" placeholder="Masukkan Telepon Pelanggan" min="1" autocomplete="off">
						</div>
					</div>
				</div>

				<div class="form-group">
					<label for="alamat"> Alamat Pelanggan </label>
					<textarea class="form-control" id="alamat" name="alamat" rows="5" placeholder="Masukkan Alamat Pelanggan" autocomplete="off"></textarea>
				</div>
				<div class="form-group">
					<button type="submit" class="btn btn-primary btn-block btn-sm" name="btn-submit">
						<i class="fa fa-save"></i> Daftar
					</button>
				</div>
			</div>
		</div>
	</div>
</form>


@endsection
