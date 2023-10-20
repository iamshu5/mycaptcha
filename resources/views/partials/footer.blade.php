</div>
<!-- End of Main Content -->

<!-- Footer -->
<footer class="sticky-footer bg-gradient-info text-white">
    <div class="container my-auto">
        <div class="copyright text-center my-auto font-weight-bold">
            <span>&copy; ILHAM SHUBKHI</span>
        </div>
    </div>
</footer>
<!-- End of Footer -->

</div>
<!-- End of Page Wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>

{{-- Logout Modal --}}
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Logout!</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Yakin Anda ingin Logout?</div>
            <div class="modal-footer">
                <a class="btn btn-primary" href="{{ url('/logout@@') }}">Logout aja</a>
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Gajadi deh</button>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap core JavaScript-->
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.1.slim.js"
    integrity="sha256-tXm+sa1uzsbFnbXt8GJqsgi2Tw+m4BLGDof6eUPjbtk=" crossorigin="anonymous"></script>

{{-- <script src="{{ url('assets/js/sweetalert.min.js') }}"></script> --}}
<script src="{{ url('assets/js/7fdd60d3a4.js') }}"></script>
<script src="{{ url('assets/js/jquery-3.6.1.slim.js') }}"></script>
<script src="{{ url('assets/vendor/jquery/jquery.min.js') }}"></script>
<script src="{{ url('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

<!-- Core plugin JavaScript-->
<script src="{{ url('assets/vendor/jquery-easing/jquery.easing.min.js') }}"></script>

<script src="{{ url('assets/js/sb-admin-2.min.js') }}"></script>

{{-- <!-- Page level plugins -->
<script src="{{ url('assets/vendor/chart.js/Chart.min.js') }}"></script>

<!-- Page level custom scripts -->
<script src="{{ url('assets/js/demo/chart-area-demo.js') }}"></script>
<script src="{{ url('assets/js/demo/chart-pie-demo.js') }}"></script> --}}

<script>
    // Alert Delete Data
    // function confirmDelete(url) {
    //     const isConfirm = confirm('Apakah Anda yakin ingin MENGHAPUS DATA ini?');
    //     if (!isConfirm) return false;
    //     location.href = url;
    // }

    // Menghitung Detik
    function fixNumClock(num) {
        return num < 10 ? '0' + num : num;
    }

    // Membaca Nama Bulan dengan Alpabhet
    function monthNumToString(num) {
        switch (num) {
            case 1:
                return 'Januari';
            case 2:
                return 'Februari';
            case 3:
                return 'Maret';
            case 4:
                return 'April';
            case 5:
                return 'Mei';
            case 6:
                return 'Juni';
            case 7:
                return 'Juli';
            case 8:
                return 'Agustus';
            case 9:
                return 'September';
            case 10:
                return 'Oktober';
            case 11:
                return 'November';
            case 12:
                return 'Desember';
        }
    }

    function initClock() {
        setInterval(() => {
            const dateInstance = new Date();
            const year = dateInstance.getFullYear();
            const month = monthNumToString((dateInstance.getMonth() < 11 ? dateInstance.getMonth() + 1 :
                dateInstance.getMonth()));
            const date = fixNumClock(dateInstance.getDate());
            const hours = fixNumClock(dateInstance.getHours());
            const minutes = fixNumClock(dateInstance.getMinutes());
            const seconds = fixNumClock(dateInstance.getSeconds());

            const currentDatetime = `${date} ${month} ${year} ${hours}:${minutes}:${seconds} WIB`;
            $('#clock-realtime').html(currentDatetime);
        }, 1000);
    }
    initClock();

</script>

</body>

<script>
    $('.delete').click(function () {
        let id = $(this).attr('data-id');
        let nama = $(this).attr('data-nama');
        swal({
                title: "HAPUS DATA PPDB?",
                text: "Menghapus Data PPDB <" + nama + "> ",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    window.location = "/ppdb-hapus/" + id + ""
                    swal("Data PPDB Telah Berhasil Dihapus!", {
                        icon: "success",
                    });
                } else {
                    swal("OK! Gajadi Hapus Data PPDB");
                }
            });
    });

</script>

<script>
    $('.deleteM').click(function () {
        let id = $(this).attr('data-id');
        let nama = $(this).attr('data-nama');
        swal({
                title: "HAPUS DATA CONTACTS?",
                text: "Menghapus Data Contact <" + nama + "> ",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    window.location = "/captchamath-hapus/" + id + ""
                    swal("Data Contact Telah Berhasil Dihapus!", {
                        icon: "success",
                    });
                } else {
                    swal("OK! Gajadi Hapus Data Contact");
                }
            });
    });
</script>
</html>
