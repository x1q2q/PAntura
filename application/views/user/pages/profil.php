<!-- Main -->
<main class="bg-light">
    <div class="container">
        <section>
            <div class="row py-5 d-flex align-items-star justify-content-between flex-column-reverse flex-lg-row">
                <div class="col-lg-7 col-sm-12 mt-5">
                    <div class="card lengkung-20 px-2">
                        <div class="card-body my-3">
                            <form action="">
                                <div class="form-group">
                                    <label class="font-18 text-primary">Username</label>
                                    <input type="text" class="form-control py-4 lengkung-15 text-primary" value="<?= $user['username'];?>" disabled/>
                                </div>
                                <div class="form-group">
                                    <label class="font-18 text-primary">Password</label>
                                    <input type="text" class="form-control py-4 lengkung-15 text-primary" value="<?= $user['password'];?>" disabled/>
                                </div>
                                <div class="form-group">
                                    <label class="font-18 text-primary">Nama Regu</label>
                                    <input type="text" class="form-control py-4 lengkung-15 text-primary text-capitalize" value="<?= $user['regu'];?>" disabled/>
                                </div>
                                <div class="form-group">
                                    <label class="font-18 text-primary">Sekolah</label>
                                    <input type="text" class="form-control py-4 lengkung-15 text-primary" value="<?= $sekolah;?>" disabled/>
                                </div>
                                <div class="form-group">
                                    <label class="font-18 text-primary">Tempat</label>
                                    <input type="text" class="form-control py-4 lengkung-15 text-primary" value="<?= $sekolah;?>" disabled />
                                </div>
                                <div class="form-group">
                                    <label class="font-18 text-primary">Jenis Kelamin</label>
                                    <div class="d-flex">
                                        <div class="form-check">
                                            <input class="form-check-input mt-2" type="radio" name="exampleRadios" id="exampleRadios1" <?php if($user['jenkel'] == 'laki-laki'){?> checked <?php }else{?> <?php }?> disabled/>
                                            <label class="form-check-label font-20 text-primary" for="exampleRadios1">
                                                Laki-laki
                                            </label>
                                        </div>
                                        <div class="form-check ml-3">
                                            <input class="form-check-input mt-2" type="radio" name="exampleRadios" id="exampleRadios2" <?php if($user['jenkel'] == 'perempuan'){?> checked <?php }else{?> <?php }?> disabled/>
                                            <label class="form-check-label font-20 text-primary" for="exampleRadios2">
                                                Perempuan
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="text-center pt-3">
                                    <button type="submit" disabled class="btn btn-success font-32 py-3 lengkung-15 d-block w-100">
                                        Simpan
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5 col-sm-12 mt-5">
                    <div class="card text-center lengkung-20 bg-primary">
                        <div class="card-header d-inline">
                            <ion-icon name="person-circle-outline" style="width: 100px; height: 100px" class="mt-3"></ion-icon>
                            <h3 class="text-white text-uppercase">regu <?= $user['regu'];?></h3>
                        </div>
                        <div class="card-body text-center mb-3 px-5">
                            <div class="row my-3">
                                <div class="col text-center">
                                    <h2 class="mt-3">NILAI</h2>
                                    <button class="btn btn-success font-32 p-3 px-5 lengkung-15">
                                        <?= $skor;?>
                                    </button>
                                </div>
                                <div class="col">
                                    <h2 class="mt-3">MISI</h2>
                                    <button class="btn btn-danger font-32 p-3 px-5 lengkung-15">
                                        <?= $pos;?>/5
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</main>
<!-- Main -->