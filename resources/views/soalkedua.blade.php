@include('partials.header', ['title' => 'Positif Negatif'])

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow-sm">
                <div class="card-header bg-primary text-white">Soal</div>
                <div class="card-body">
                    <?php
                        for ($i = 1; $i <= 13; $i++) {
                        if ( $i%4 == 0 && $i%12 == 0 ) {
                            echo  "i help you"."<br>" ;
                        }
                        else if ( $i%4 == 0 ) {
                            echo  "bye"."<br>";
                        }else if ( $i%2 == 0 ) {
                            echo  "i"."<br>";
                        }else {
                            echo $i."<br>";
                        }
                        }
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>

@include('partials.footer')
