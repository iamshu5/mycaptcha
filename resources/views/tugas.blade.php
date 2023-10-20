@include('partials.header', ['title' => 'Tugas'])

<div class="container">
    <div class="row justify-content-center">
        <div class="col-sm-5 col-lg-4 col-md-8">
            <div class="card mt-4">
                <div class="card-header bg-info text-white">
                    Mathematical Captcha
                </div>
                <div class="card-body">
                    <div class="d-flex justify-content-center">
                        <a class="btn btn-info btn-lg shadow" href="{{ url('/captchamath') }}">Cobain Disini!</a>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="col-sm-5 col-lg-4 col-md-8">
            <div class="card mt-4">
                <div class="card-header bg-primary text-white">
                   Soal Positif-Negatif
                </div>
                <div class="card-body">
                    <div class="d-flex justify-content-center">
                        <a class="btn btn-primary btn-lg shadow" href="{{ url('/soalkeduaa') }}">Cobain Disini!</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-sm-5 col-lg-4 col-md-8">
            <div class="card mt-4">
                <div class="card-header bg-dark text-white">
                   Soal PPDB
                </div>
                <div class="card-body">
                    <div class="d-flex justify-content-center">
                        <a class="btn btn-dark btn-lg shadow" href="{{ url('/ppdb') }}">Cobain Disini!</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@include('partials.footer')
