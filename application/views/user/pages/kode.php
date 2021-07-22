<!-- Main -->
<main>
    <div class="container">
        <div class="row mt-5 d-flex align-items-center justify-content-between">
            <div class="col-lg-7 col-sm-12">
                <img src="<?= base_url('assets/'); ?>img/img_pantura_home.png" alt="HOME" class="img-fluid">
            </div>
            <div class="col-lg-5 col-sm-12 mt-5">
                <form action="<?= base_url('/')?>user/kode/confirm" method="POST">
                    <div class="card text-center lengkung-20">
                        <?php if ($this->session->flashdata('merah')) { ?>
                            <div class="m-2 alert alert-danger alert-dismissible show fade alert-has-icon lengkung-20">
                                <div class="alert-icon"><i class="far fa-lightbulb"></i></div>
                                <div class="alert-body">
                                    <div class="alert-title">Peringatan </div>
                                    <?= $this->session->flashdata('merah') ?></span>
                                    <button class="close" data-dismiss="alert">
                                        <span>&times;</span>
                                    </button>
                                </div>
                            </div>
                        <?php } ?>
                        <div class="card-header mt-5 d-inline">
                            <h3 class="text-primary">Masukkan Kode</h3>
                        </div>
                        <div class="card-body px-5">
                            <div class="form-group">
                                <input type="text" name="kode" id="kode" class="form-control py-4 lengkung-15 font-24">
                            </div>
                        </div>
                        <div class="card-footer text-center mb-3 px-5">
                            <div class="row">
                                <div class="col">
                                    <div class="btn btn-secondary font-32 d-block w-100 p-4 text-primary lengkung-15" data-toggle="modal" data-target="#exampleModal">
                                        <ion-icon name="qr-code-outline" class="mr-2"></ion-icon>QR Code
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col">
                                    <button class="btn btn-primary font-32 d-block w-100 p-4 lengkung-15" type="submit">MASUK</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</main>
<!-- Main -->

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Scan QR Code</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div id="reader" class="card lengkung-15" width="600px"></div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger d-block w-100" id="close" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<script src="<?= base_url('assets/'); ?>vendor/html5-qrcode.min.js"></script>
<script>
    function onScanSuccess(decodedText, decodedResult) {
        // handle the scanned code as you like, for example:
        console.log(`Code matched = ${decodedText}`, decodedResult);
        let output = decodedText;
        document.getElementById('kode').value = decodedText;
        html5QrcodeScanner.clear();
        document.getElementById('close').click()
    }

    function onScanFailure(error) {
        // handle scan failure, usually better to ignore and keep scanning.
        // for example:
        console.warn(`Code scan error = ${error}`);
    }

    let html5QrcodeScanner = new Html5QrcodeScanner(
        "reader", {
            fps: 10,
            qrbox: 250
        }, /* verbose= */ false);
    html5QrcodeScanner.render(onScanSuccess, onScanFailure);
    document.querySelector('#reader__dashboard_section_csr > div > button').classList.add('btn')
    document.querySelector('#reader__dashboard_section_swaplink').classList.add('btn')
    document.querySelector('#reader__dashboard_section_swaplink').classList.add('btn-secondary')
    document.querySelector('#reader__dashboard_section_swaplink').classList.add('text-decoration-none')
    document.querySelector('#reader__dashboard_section_swaplink').classList.add('text-dark')
    document.querySelector('#reader__dashboard_section_swaplink').classList.add('mt-3')
    document.querySelector('#reader__dashboard_section_csr > div > button').classList.add('btn-success')
    document.querySelector('#reader__dashboard_section_csr > div > button').classList.add('mb-3')
</script>