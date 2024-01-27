<footer class="footer pt-3  ">
    <div class="container-fluid">
        <div class="row align-items-center justify-content-lg-between">
            <div class="col-lg-6 mb-lg-0 mb-4">
            </div>
            <div class="col-lg-6 text-sm text-muted text-lg-end">
                © <script>
                    document.write(new Date().getFullYear())
                </script>,
                <span>Dibuat oleh <a href="https://www.facebook.com/resa.endrawan.56" target="_blank">Resa Endrawan</a></span>
            </div>
        </div>
    </div>
</footer>
</div>
</main>

</div>

<?php if ($this->session->flashdata('message')) { ?>
    <!-- Tampilkan pesan 'flashdata' sebagai modal -->
    <div class="modal fade" id="message" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Pesan</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <?= $this->session->flashdata('message') ?>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn bg-gradient-primary" data-bs-dismiss="modal">Oke</button>
                </div>
            </div>
        </div>
    </div>
<?php } ?>

<?php if ($this->session->flashdata('error_add_excel')) { ?>
    <!-- Tampilkan pesan 'flashdata' sebagai modal -->
    <div class="modal fade modal-scrollable" id="message" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Error</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <?php foreach ($this->session->flashdata('error_add_excel') as $row => $invalidColumns) : ?>
                        <ul>
                            <li>
                                <span>Baris <?= $row ?> memiliki kesalahan berikut:</span>
                                <ul>
                                    <?php foreach ($invalidColumns as $column) : ?>
                                        <li><?= $column ?></li>
                                    <?php endforeach; ?>
                                </ul>
                                <!-- <p></p> -->
                            </li>
                        </ul>
                    <?php endforeach; ?>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn bg-gradient-primary" data-bs-dismiss="modal">Oke</button>
                </div>
            </div>
        </div>
    </div>
<?php } ?>

<?php if (validation_errors()) { ?>
    <!-- Tampilkan pesan 'flashdata' sebagai modal -->
    <div class="modal fade" id="kuesioner" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Pesan</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Maaf, ada kolom presepsi ataupun ekspetasi yang belum terisi.
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn bg-gradient-primary" data-bs-dismiss="modal">Oke</button>
                </div>
            </div>
        </div>
    </div>
<?php } ?>


<!-- Modal Logout -->
<div class="modal fade" id="logout" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Logout</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Apakah kamu yakin ingin logout?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn bg-gradient-secondary" data-bs-dismiss="modal">Batalkan</button>
                <a href="<?= base_url() ?>auth/logout" class="btn bg-gradient-primary">Ya</a>
            </div>
        </div>
    </div>
</div>
<!--   Core JS Files   -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="<?= base_url() ?>assets/argon-master/assets/js/core/popper.min.js"></script>
<script src="<?= base_url() ?>assets/argon-master/assets/js/core/bootstrap.min.js"></script>
<script src="<?= base_url() ?>assets/argon-master/assets/js/plugins/perfect-scrollbar.min.js"></script>
<script src="<?= base_url() ?>assets/argon-master/assets/js/plugins/smooth-scrollbar.min.js"></script>
<script src="<?= base_url() ?>assets/argon-master/assets/js/plugins/chartjs.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdn.datatables.net/v/bs5/jq-3.7.0/dt-1.13.8/datatables.min.js"></script>
<script>
    $(document).ready(function() {
        $('#message').modal('show');
    });

    $(document).ready(function() {
        $('#kuesioner').modal('show');
    });

    $(document).ready(function() {
        $('#example').DataTable({
            "oLanguage": {
                "sLengthMenu": "Tampilkan _MENU_ data",
                "sInfo": "Menampilkan _START_ sampai _END_ dari _TOTAL_ data",
                "emptyTable": "Tidak ada data",
            },
            "lengthMenu": [
                [5, 10, 25, 50, -1],
                ["5", "10", "25", "50", "Semua"]
            ],
            // "order": [
            //     [0, "asc"]
            // ],
            language: {
                "search": "Cari:",
                "paginate": {
                    "first": "Pertama",
                    "last": "Terakhir",
                    "next": "<i class='fa fa-angle-right'></i>",
                    "previous": "<i class='fa fa-angle-left'></i>"
                }
            },
        });
    });


    var ctx1 = document.getElementById("chart-line").getContext("2d");
    var gradientStroke1 = ctx1.createLinearGradient(0, 230, 0, 50);

    gradientStroke1.addColorStop(1, 'rgba(94, 114, 228, 0.2)');
    gradientStroke1.addColorStop(0.2, 'rgba(94, 114, 228, 0.0)');
    gradientStroke1.addColorStop(0, 'rgba(94, 114, 228, 0)');
    new Chart(ctx1, {
        type: "line",
        data: {
            labels: ["Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
            datasets: [{
                label: "Mobile apps",
                tension: 0.4,
                borderWidth: 0,
                pointRadius: 0,
                borderColor: "#5e72e4",
                backgroundColor: gradientStroke1,
                borderWidth: 3,
                fill: true,
                data: [50, 40, 300, 220, 500, 250, 400, 230, 500],
                maxBarThickness: 6

            }],
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    display: false,
                }
            },
            interaction: {
                intersect: false,
                mode: 'index',
            },
            scales: {
                y: {
                    grid: {
                        drawBorder: false,
                        display: true,
                        drawOnChartArea: true,
                        drawTicks: false,
                        borderDash: [5, 5]
                    },
                    ticks: {
                        display: true,
                        padding: 10,
                        color: '#fbfbfb',
                        font: {
                            size: 11,
                            family: "Open Sans",
                            style: 'normal',
                            lineHeight: 2
                        },
                    }
                },
                x: {
                    grid: {
                        drawBorder: false,
                        display: false,
                        drawOnChartArea: false,
                        drawTicks: false,
                        borderDash: [5, 5]
                    },
                    ticks: {
                        display: true,
                        color: '#ccc',
                        padding: 20,
                        font: {
                            size: 11,
                            family: "Open Sans",
                            style: 'normal',
                            lineHeight: 2
                        },
                    }
                },
            },
        },
    });
</script>
<script>
    var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
        var options = {
            damping: '0.5'
        }
        Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }
</script>
<script async defer src="https://buttons.github.io/buttons.js"></script>
<script src="<?= base_url() ?>assets/argon-master/assets/js/argon-dashboard.min.js?v=2.0.4"></script>
</body>

</html>