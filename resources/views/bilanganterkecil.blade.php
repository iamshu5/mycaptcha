@include('partials.header', ['title', 'Bilangan Terkecil'])


<div class="container">
    <div class="row justify-content-center">
        <div class="col">
            <div class="card shadow-sm">
                <div class="card-header fw-bold">Menghitung Bilangan Terkecil</div>
                    <div class="card-body">
                        <form action="{{ url('/bilanganterkecill/proses') }}" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="">Bilangan Satu</label>
                                <input type="number" name="bilangan1" class="form-control @error('bilangan1') is-invalid @enderror" placeholder="0">
                                @error('bilangan1')
                                    <div class="invalid-feedback">Masukan Bilangan Kesatu!</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="">Bilangan Kedua</label>
                                <input type="number" name="bilangan2" class="form-control @error('bilangan2') is-invalid @enderror" placeholder="0">
                                @error('bilangan2')
                                    <div class="invalid-feedback">Masukan Bilangan Kedua!</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="">Bilangan Ketiga</label>
                                <input type="number" name="bilangan3" class="form-control @error('bilangan3') is-invalid @enderror" placeholder="0">
                                @error('bilangan3')
                                    <div class="invalid-feedback">Masukan Bilangan Ketiga!</div>
                                @enderror
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Output Terbesar</label>
                                        <input type="number" name="output" value="{{ session('output') }}" class="form-control" placeholder="0" readonly>
                                    </div>
                                </div>
                                {{-- <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Output Terbesar</label>
                                        <input type="number" name="output2" value="{{ session('output2') }}" class="form-control" placeholder="0" readonly>
                                    </div>
                                </div> --}}
                            </div>

                            <div class="d-flex justify-content-end">
                                <button type="submit" class="btn btn-success shadow">Hitung</button>
                            </div>
                        </form>
                    </div>
            </div>
        </div>
    </div>
</div>

@include('partials.footer')