@include('partials.header', ['title' => 'PPDB'])

<div class="container-fluid">
    <div class="row">
    {{-- TAMBAH --}}
        <div class="col-md-7 col-12 col-lg-4 col-sm-6">
            <div class="card mb-3 mt-4 shadow-sm">
                <div class="card-header bg-warning text-white">Input Formulir Data PPDB</div>
                <div class="card-body">
                    <form action="{{ url('/ppdb-tambah') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="">NIS</label>
                            <input type="number" min="0" name="nis" class="form-control"
                                placeholder="Nomor Induk Siswa" value="{{ old('nis') }}">
                            @error('nis')
                                <div class="alert alert-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">Nama Siswa</label>
                            <input type="text" name="nama" class="form-control" placeholder="Isi Nama Siswa" value="{{ old('nama') }}">
                            @error('nama')
                                <div class="alert alert-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">Jenis Kelamin</label>
                            <select name="jenis_kelamin" id="" class="form-control" value="{{ old('jenis_kelamin') }}">
                                <option value="" selected disabled>Pilih Jenis Kelamin</option>
                                <option value="Laki-Laki">Laki-Laki</option>
                                <option value="Perempuan">Perempuan</option>
                            </select>
                            @error('jenis_kelamin')
                                <div class="alert alert-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">Tempat Lahir</label>
                            <input type="text" name="tempat_lahir" class="form-control"
                                placeholder="Isi Tempat Lahir" value="{{ old('tempat_lahir') }}">
                            @error('tempat_lahir')
                                <div class="alert alert-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">Tanggal Lahir</label>
                            <input type="date" name="tanggal_lahir" class="form-control" value="{{ old('tanggal_lahir') }}">
                            @error('tanggal_lahir')
                                <div class="alert alert-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">Alamat</label>
                            <textarea name="alamat" class="form-control" placeholder="Isi Alamat Rumah"></textarea>
                            @error('alamat')
                                <div class="alert alert-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">Asal Sekolah</label>
                            <input type="text" name="asal_sekolah" class="form-control" placeholder="Isi Asal SMP" value="{{ old('asal_sekolah') }}">
                            @error('asal_sekolah')
                                <div class="alert alert-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="">Kelas</label>
                            <select name="kelas" id="" class="form-control" value="{{ old('kelas') }}">
                                <option value="" selected disabled>Pilih Kelas</option>
                                <option value="X">X</option>
                                <option value="XI">XI</option>
                                <option value="XII">XII</option>
                            </select>
                            @error('kelas')
                                <div class="alert alert-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="">Jurusan</label>
                            <select name="jurusan" id="" class="form-control" value="{{ old('jurusan') }}">
                                <option value="" selected disabled>Pilih Jurusan</option>
                                <option value="RPL">RPL</option>
                                <option value="MM">MM</option>
                                <option value="OTKP">OTKP</option>
                            </select>
                            @error('jurusan')
                                <div class="alert alert-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="d-flex justify-content-end">
                            <button type="reset" class="btn btn-warning btn-sm shadow-sm mr-3">CLEAR</button>
                            <button type="submit" class="btn btn-success btn-sm shadow-sm">SUBMIT</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        {{-- TABLE DATA --}}
        <div class="col-md-7 col-12 col-lg-8 col-sm-6">
            @if (session()->exists('alert'))
                        <div class="alert alert-{{ session()->get('alert')['bg'] }} alert-dismissible fade show"
                            role="alert">
                            {{ session()->get('alert')['message'] }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif

                    @if ($errors->any())
                        <div class="alert alert-danger" role="alert">
                            @foreach ($errors->all() as $error)
                                {{ $error }}
                            @endforeach
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif
            <div class="card mt-4 shadow-sm">
                <div class="card-header bg-info text-white">Data PPDB</div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>NIS</th>
                                    <th>Nama</th>
                                    <th>Jenis Kelamin</th>
                                    <th>Tempat Lahir</th>
                                    <th>Tanggal Lahir</th>
                                    <th>Alamat</th>
                                    <th>Asal Sekolah</th>
                                    <th>Kelas</th>
                                    <th>Jurusan</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if (count($ppdb) == 0)
                                    <tr>
                                        <td colspan="11" class="text-center bg-gradient-danger text-white">
                                            Data Kosong!
                                        </td>
                                    </tr>
                                @endif

                                @foreach ($ppdb as $index => $data)
                                    <tr>
                                        <td>{{ $index + $ppdb->firstItem() }}</td>
                                        <td>{{ $data->nis }}</td>
                                        <td>{{ $data->nama }}</td>
                                        <td>{{ $data->jenis_kelamin }}</td>
                                        <td>{{ $data->tempat_lahir }}</td>
                                        <td>{{ $data->tanggal_lahir }}</td>
                                        <td>{{ $data->alamat }}</td>
                                        <td>{{ $data->asal_sekolah }}</td>
                                        <td>{{ $data->kelas }}</td>
                                        <td>{{ $data->jurusan }}</td>
                                        <td>
                                            <button class="btn btn-warning shadow-sm rounded" data-toggle="modal"
                                                data-target="#ModalEdit{{ $index }}">Edit</button>
                                            <button
                                                class="btn btn-danger btn-sm rounded mb-1 delete mt-2 shadow-sm"
                                                data-id="{{ $data->id_ppdb }}"
                                                data-nama="{{ $data->nama }}">Hapus</button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        TOTAL {{ $ppdb->total() }} SISWA PENDAFTAR
                        <div class="d-flex justify-content-end">
                            {{ $ppdb->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- EDIT --}}
@foreach ($ppdb as $index => $data)
    <div class="modal fade" id="ModalEdit{{ $index }}" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title" id="exampleModalLabel">Form Edit PPDB</h1>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <form action="{{ url('/ppdb-edit/' . $data->id_ppdb) }}" method="post">
                    @csrf
                    <div class="modal-body">
                        <div class="form-floating mb-3">
                            <label for="">ID PPDB</label>
                            <input type="text" name="id_ppdb" class="form-control" value="{{ $data->id_ppdb }}" readonly>
                        </div>

                        <div class="form-floating mb-3">
                            <label for="">NIS</label>
                            <input type="number" min="0" class="form-control" name="nis" value="{{ $data->nis }}" placeholder="0" required>
                        </div>

                        <div class="form-floating mb-3">
                            <label for="">Nama Siswa</label>
                            <input type="text" name="nama" class="form-control" value="{{ $data->nama }}" placeholder="Harap isi Nama Siswa" required>
                        </div>

                        <div class="form-floating mb-3">
                            <label for="">Jenis Kelamin</label>
                            <select name="jenis_kelamin" id="" class="form-control">
                                <option value="Laki-Laki" {{ $data->jenis_kelamin == 'Laki-Laki' ? 'selected' : '' }}>Laki-Laki</option>
                                <option value="Perempuan" {{ $data->jenis_kelamin == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                            </select>
                        </div>

                        <div class="form-floating mb-3">
                            <label for="">Tempat Lahir</label>
                            <input type="text" name="tempat_lahir" class="form-control" value="{{ $data->tempat_lahir}}" placeholder="Harap isi Tempat Lahir" required>
                        </div>

                        <div class="form-floating mb-3">
                            <label for="">Tanggal Lahir</label>
                            <input type="date" name="tanggal_lahir" class="form-control" value="{{ $data->tanggal_lahir}}" placeholder="Harap isi Tanggal Lahir" required>
                        </div>
                        <div class="form-floating mb-3">
                            <label for="">Alamat</label>
                           <textarea name="alamat" class="form-control" id="" cols="30" rows="10">{{ $data->alamat }}</textarea>
                        </div>
                        <div class="form-floating mb-3">
                            <label for="">Asal Sekolah</label>
                            <input type="text" name="asal_sekolah" class="form-control" value="{{ $data->asal_sekolah}}" placeholder="Harap isi asal SMP" required>
                        </div>
                        <div class="form-floating mb-3">
                            <label for="">Kelas</label>
                            <select name="kelas" class="form-control" id="">
                                <option value="X" {{ $data->kelas == 'X' ? 'selected' : '' }}>X</option>
                                <option value="XI" {{ $data->kelas == 'XI' ? 'selected' : '' }}>XI</option>
                                <option value="XII" {{ $data->kelas == 'XII' ? 'selected' : '' }}>XII</option>
                            </select>
                        </div>
                        <div class="form-floating mb-3">
                            <label for="">Jurusan</label>
                            <select name="jurusan" class="form-control" id="">
                                <option value="RPL" {{ $data->kelas == 'RPL' ? 'selected' : '' }}>RPL</option>
                                <option value="MM" {{ $data->kelas == 'MM' ? 'selected' : '' }}>MM</option>
                                <option value="OTKP" {{ $data->kelas == 'OTKP' ? 'selected' : '' }}>OTKP</option>
                            </select>
                        </div>

                        <div class="d-flex justify-content-end">
                            <button class="btn btn-success shadow-sm btn-sm" type="submit">Simpan Perubahan</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endforeach


@include('partials.footer')
