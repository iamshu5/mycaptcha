@include('partials.header', ['title' => 'MathCaptcha'])

<div class="container-fluid">
    <div class="row">
        <div class="col-md-7 col-12 col-lg-4 col-sm-6">
            @if (session()->exists('alert'))
                <div class="alert alert-{{ session()->get('alert')['bg'] }} alert-dismissible fade show" role="alert">
                    {{ session()->get('alert')['message'] }}
                </div>
            @endif
            <div class="card mb-2 shadow-sm">
                <div class="card-header bg-info text-white">Form Contact</div>
                <div class="card-body">
                    <form action="{{ url('/captchamath-proses') }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="">Name</label>
                            <input type="text" name="name"
                                class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}"
                                placeholder="Input Name Here!">
                            @error('name')
                                <strong class="invalid-feedback">Masukan NAMA LENGKAP Anda</strong>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">Email</label>
                            <input type="email" name="email"
                                class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}"
                                placeholder="example@blabla.co">
                            @error('email')
                                <strong class="invalid-feedback">Masukan EMAIL Anda</strong>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">Tempat Lahir</label>
                            <input type="text" name="tempat_lahir"
                                class="form-control @error('tempat_lahir') is-invalid @enderror" value="{{ old('tempat_lahir') }}"
                                placeholder="Masukan tempat lahir">
                            @error('tempat_lahir')
                                <strong class="invalid-feedback">Masukan Tempat Lahir</strong>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">Tanggal Lahir</label>
                            <input type="date" name="tanggal_lahir"
                                class="form-control @error('tanggal_lahir') is-invalid @enderror" value="{{ old('tanggal_lahir') }}">
                            @error('tanggal_lahir')
                                <strong class="invalid-feedback">Masukan Tanggal Lahir Anda</strong>
                            @enderror
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-3 col-form-label">Gender</label>
                            <div class="col-sm-9 form-control @error('jenis_kelamin')
                                is-invalid
                            @enderror">
                                <input type="radio" name="jenis_kelamin" value="Laki-Laki"> Laki-Laki
                                <input type="radio" name="jenis_kelamin" value="Perempuan"> Perempuan
                            </div>
                            @error('jenis_kelamin')
                                <strong class="invalid-feedback">Pilih Jenis Kelamin</strong>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">Phone</label>
                            <input type="number" min="0" name="phone" value="{{ old('phone') }}"
                                class="form-control @error('phone') is-invalid @enderror"
                                placeholder="Input Number in Here!">
                            @error('phone')
                                <strong class="invalid-feedback">Masukan NOMOR TELEPON Anda</strong>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">Website URL</label>
                            <input type="text" min="0" name="website" value="{{ old('website') }}"
                                class="form-control @error('website') is-invalid @enderror" placeholder="Example URL: https://www.yourdomain.com">
                            @error('website')
                                <strong class="invalid-feedback">Contoh: http://aaa.com</strong>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">Message</label>
                            <textarea name="message" class="form-control @error('message') is-invalid @enderror" placeholder="Input Message in Here!">{{ old('message') }}</textarea>
                            @error('message')
                                <strong class="invalid-feedback">Masukan PENDAPAT Anda</strong>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="mathgroup">Captcha Number: {{ app('mathcaptcha')->label() }} </label>
                            {!! app('mathcaptcha')->input([
                                'class' => 'form-control',
                                'id' => 'mathgroup',
                                'type' => 'number',
                                'placeholder' => 'Input Captcha number in here!',
                            ]) !!}
                            @if ($errors->has('mathcaptcha'))
                                <span class="alert alert-danger mt-5 help-block">
                                    <strong>{{ $errors->first('mathcaptcha') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="d-flex justify-content-end">
                            <button type="submit" class="btn btn-info shadow-sm">SUBMIT</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        
        <div class="col-md-7 col-12 col-lg-8 col-sm-6">
            <div class="card shadow-sm">
                <div class="card-header">Data Captcha yang Anda input</div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nama</th>
                                    <th>Email</th>
                                    <th>Tempat Lahir</th>
                                    <th>Tanggal Lahir</th>
                                    <th>Jenis Kelamin</th>
                                    <th>Phone</th>
                                    <th>Website</th>
                                    <th>Message</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if (count($contact) == 0)
                                    <tr>
                                        <td colspan="11" class="text-center bg-gradient-danger text-white">Data
                                            Kosong!</td>
                                    </tr>
                                @endif

                                @foreach ($contact as $index => $data)
                                    <tr>
                                        <td>{{ $index + $contact->firstItem() }}</td>
                                        <td>{{ $data->name }}</td>
                                        <td>{{ $data->email }}</td>
                                        <td>{{ $data->tempat_lahir }}</td>
                                        <td>{{ $data->tanggal_lahir }}</td>
                                        <td>{{ $data->jenis_kelamin }}</td>
                                        <td>{{ $data->phone }}</td>
                                        <td>{{ $data->website }}</td>
                                        <td>{{ $data->message }}</td>
                                        <td>
                                            <button class="btn btn-warning btn-sm shadow-sm" data-toggle="modal"
                                                data-target="#ModalE{{ $index }}">Edit</button>
                                            <button class="btn btn-danger btn-sm shadow-sm  deleteM"
                                                data-id="{{ $data->id_contact }}"
                                                data-nama="{{ $data->name }}">Delete</button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        TOTAL: "{{ $contact->total() }}" Masukan Anda
                        <div class="d-flex justify-content-end">
                            {{ $contact->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @foreach ($contact as $index => $data)
        <div class="modal fade" id="ModalE{{ $index }}" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title" id="exampleModalLabel">Form Edit Contact</h1>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <form action="{{ url('/captchamath-edit/' . $data->id_contact) }}" method="post">
                        @csrf
                        <div class="modal-body">
                            <div class="form-floating mb-3">
                                <label for="">ID PPDB</label>
                                <input type="text" name="id_contact" class="form-control"
                                    value="{{ $data->id_contact }}" readonly>
                            </div>

                            <div class="form-floating mb-3">
                                <label for="">Name</label>
                                <input type="text" name="name" class="form-control" value="{{ $data->name }}"
                                    required>
                            </div>

                            <div class="form-floating mb-3">
                                <label for="">Email</label>
                                <input type="email" name="email" class="form-control"
                                    value="{{ $data->email }}" required>
                            </div>

                            <div class="form-floating mb-3">
                                <label for="">Tempat Lahir</label>
                                <input type="text" name="tempat_lahir" class="form-control"
                                    value="{{ $data->tempat_lahir }}" required>
                            </div>

                            <div class="form-floating mb-3">
                                <label for="">Tanggal Lahir</label>
                                <input type="date" name="tanggal_lahir" class="form-control"
                                    value="{{ $data->tanggal_lahir }}" required>
                            </div>

                            <div class="row mb-3">
                                <label class="col-sm-3 col-form-label">Gender</label>
                                <div class="col-sm-9 form-control" required> 
                                    <input type="radio" name="jenis_kelamin" value="Laki-Laki" {{ $data->jenis_kelamin == 'Laki-Laki' ? 'checked' : '' }}> Laki-Laki
                                    <input type="radio" name="jenis_kelamin" value="Perempuan" {{ $data->jenis_kelamin == 'Perempuan' ? 'checked' : '' }}> Perempuan
                                </div>
                            </div>

                            <div class="form-floating mb-3">
                                <label for="">Phone</label>
                                <input type="number" name="phone" class="form-control"
                                    value="{{ $data->phone }}" required>
                            </div>

                            <div class="form-floating mb-3">
                                <label for="">Website</label>
                                <input type="text" name="website" class="form-control"
                                    value="{{ $data->website }}" required>
                            </div>

                            <div class="form-floating mb-3">
                                <label for="">Message</label>
                                <textarea name="message" id="" cols="10" rows="10" class="form-control">{{ $data->message }}</textarea>
                            </div>
                            <div class="d-flex justify-content-end">
                                <button class="btn btn-success shadow-sm btn-sm" type="submit">Simpan
                                    Perubahan</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endforeach

    @include('partials.footer')
