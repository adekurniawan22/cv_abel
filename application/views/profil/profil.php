<div class="container-fluid py-0 mt-7">
    <div class="row">
        <div class="col-4">
            <div class="card mb-0">
                <div class="card-header mb-0 pb-0">
                    <div class="d-inline-block">
                        <h3><i class="bi bi-person-circle me-1"></i></h3>
                    </div>
                    <div class="d-inline-block">
                        <h3>Informasi</h3>
                    </div>
                </div>
                <hr class="bg-dark mx-4 my-0">
                <div class="card-body my-0 ">
                    <?php if ($this->session->userdata('jabatan') == 'Pelanggan') : ?>
                        <?php
                        $tanggal_langganan = new DateTime($pelanggan->mulai_berlangganan);
                        $waktu_sekarang = new DateTime();
                        $selisih = $tanggal_langganan->diff($waktu_sekarang);
                        ?>
                        <div>
                            <span>
                                <strong>Nama Lengkap</strong>
                                <p class=""><?= $pelanggan->nama_lengkap ?></p>
                            </span>
                            <hr class="bg-secondary mt-1 mb-3 opacity-1">
                            <span>
                                <strong>Nomor Handphone</strong>
                                <p class=""><?= $pelanggan->no_hp ?></p>
                            </span>
                            <hr class="bg-secondary mt-1 mb-3 opacity-1">
                            <span>
                                <strong>Alamat</strong>
                                <p class=""><?= $pelanggan->alamat ?></p>
                            </span>
                            <hr class="bg-secondary mt-1 mb-3 opacity-1">
                            <span>
                                <strong>Lokasi PPPoE</strong>
                                <?php $lokasi_server = $this->db->get_where('t_lokasi_server', array('id_lokasi_server' => $pelanggan->lokasi_server))->row(); ?>
                                <p class=""><?= $lokasi_server->lokasi_server ?></p>
                            </span>
                            <hr class="bg-secondary mt-1 mb-3 opacity-1">
                            <span>
                                <strong>Lama Berlangganan</strong>
                                <p class=""><?php
                                            // Menampilkan Tahun jika Tahun tidak sama dengan 0
                                            if ($selisih->y !== 0) {
                                                echo $selisih->y . ' Tahun, ';
                                            }

                                            // Menampilkan Bulan jika Bulan tidak sama dengan 0
                                            if ($selisih->m !== 0) {
                                                if ($selisih->d !== 0) {
                                                    echo $selisih->m . ' Bulan, ';
                                                } else {
                                                    echo $selisih->m . ' Bulan ';
                                                }
                                            }

                                            // Menampilkan Hari jika Hari tidak sama dengan 0
                                            if ($selisih->d !== 0) {
                                                echo $selisih->d . ' Hari';
                                            }
                                            ?>
                                </p>
                                </p>
                            </span>
                        </div>
                    <?php endif; ?>

                    <?php if ($this->session->userdata('jabatan') == 'Manajer' or $this->session->userdata('jabatan') == 'Admin') : ?>
                        <span>
                            <strong>Nama Lengkap</strong>
                            <p class=""><?= $pegawai->nama_lengkap ?></p>
                        </span>
                        <hr class="bg-secondary mt-1 mb-3 opacity-1">
                        <span>
                            <strong>Username</strong>
                            <p class=""><?= $pegawai->username ?></p>
                        </span>
                        <hr class="bg-secondary mt-1 mb-3 opacity-1">
                        <span>
                            <strong>Email</strong>
                            <p class=""><?= $pegawai->email ?></p>
                        </span>
                        <hr class="bg-secondary mt-1 mb-3 opacity-1">
                        <span>
                            <strong>Nomor Handphone</strong>
                            <p class=""><?= $pegawai->no_hp ?></p>
                        </span>
                        <hr class="bg-secondary mt-1 mb-3 opacity-1">
                        <span>
                            <strong>Alamat</strong>
                            <p class=""><?= $pegawai->alamat ?></p>
                        </span>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        <div class="col-8">
            <div class="card mb-0">
                <div class="card-header mb-0 pb-0">
                    <div class="d-inline-block">
                        <h3><i class="bi bi-pencil-square me-1"></i></h3>
                    </div>
                    <div class="d-inline-block">
                        <h3>Edit Profil</h3>
                    </div>
                </div>
                <hr class="bg-dark mx-4 my-0">
                <div class="card-body ">
                    <?php if ($this->session->userdata('jabatan') == 'Pelanggan') : ?>
                        <form action="<?= base_url() ?>profil/proses-edit-profil-pelanggan" method="post">
                            <div class="form-group">
                                <label for="nama_lengkap" class="form-control-label">Nama Lengkap</label>
                                <input type="hidden" name="id_pelanggan" value="<?= $pelanggan->id_pelanggan ?>">
                                <input class="form-control" type="text" placeholder="Nama Lengkap" id="nama_lengkap" name="nama_lengkap" value="<?php echo set_value('nama_lengkap', $pelanggan->nama_lengkap); ?>">
                                <?= form_error('nama_lengkap', '<p style="font-size: 12px;color: red;" class="my-2">', '</p>'); ?>
                            </div>
                            <div class="form-group">
                                <label for="no_hp" class="form-control-label">Nomor HP</label>
                                <input class="form-control" type="text" placeholder="Nomor HP" id="no_hp" name="no_hp" value="<?php echo set_value('no_hp', $pelanggan->no_hp); ?>">
                                <?= form_error('no_hp', '<p style="font-size: 12px;color: red;" class="my-2">', '</p>'); ?>
                            </div>
                            <div class="form-group">
                                <label for="alamat" class="form-control-label">Alamat</label>
                                <textarea class="form-control" placeholder="Alamat" id="alamat" name="alamat" rows="3"><?php echo set_value('alamat', $pelanggan->alamat); ?></textarea>
                                <?= form_error('alamat', '<p style="font-size: 12px;color: red;" class="my-2">', '</p>'); ?>
                            </div>
                        <?php endif; ?>

                        <?php if ($this->session->userdata('jabatan') == 'Manajer' or $this->session->userdata('jabatan') == 'Admin') : ?>
                            <form action="<?= base_url() ?>profil/proses-edit-profil-pegawai" method="post">
                                <div class="form-group">
                                    <label for="nama_lengkap" class="form-control-label">Nama Lengkap</label>
                                    <input type="hidden" name="id_pegawai" value="<?= $pegawai->id_pegawai ?>">
                                    <input class="form-control" type="text" placeholder="Nama Lengkap" id="nama_lengkap" name="nama_lengkap" value="<?php echo set_value('nama_lengkap', $pegawai->nama_lengkap); ?>">
                                    <?= form_error('nama_lengkap', '<p style="font-size: 12px;color: red;" class="my-2">', '</p>'); ?>
                                </div>
                                <div class="form-group">
                                    <label for="username" class="form-control-label">Username</label>
                                    <input class="form-control" type="text" placeholder="Username" id="username" name="username" value="<?php echo set_value('username', $pegawai->username); ?>">
                                    <?= form_error('username', '<p style="font-size: 12px;color: red;" class="my-2">', '</p>'); ?>
                                </div>
                                <div class="form-group">
                                    <label for="password" class="form-control-label">Password</label>
                                    <input class="form-control" type="password" placeholder="Masukkan Password Lama" id="password_lama" name="password_lama" value="<?php echo set_value('password_lama'); ?>">
                                    <?= form_error('password_lama', '<p style="font-size: 12px;color: red;" class="my-2">', '</p>'); ?>
                                    <input class="form-control mt-3" type="password" placeholder="Masukkan Password Baru" id="password_baru" name="password_baru" value="<?php echo set_value('password_baru'); ?>">
                                    <?= form_error('password_baru', '<p style="font-size: 12px;color: red;" class="my-2">', '</p>'); ?>
                                    <input class="form-control mt-3" type="password" placeholder="Masukkan Konfirmasi Password Baru" id="konfirmasi_password" name="konfirmasi_password" value="<?php echo set_value('konfirmasi_password'); ?>">
                                    <?= form_error('konfirmasi_password', '<p style="font-size: 12px;color: red;" class="my-2">', '</p>'); ?>
                                </div>
                                <div class="form-group">
                                    <label for="email" class="form-control-label">Email</label>
                                    <input class="form-control" type="text" placeholder="Email" id="email" name="email" value="<?php echo set_value('email', $pegawai->email); ?>">
                                    <?= form_error('email', '<p style="font-size: 12px;color: red;" class="my-2">', '</p>'); ?>
                                </div>
                                <div class="form-group">
                                    <label for="no_hp" class="form-control-label">Nomor HP</label>
                                    <input class="form-control" type="text" placeholder="Nomor HP" id="no_hp" name="no_hp" value="<?php echo set_value('no_hp', $pegawai->no_hp); ?>">
                                    <?= form_error('no_hp', '<p style="font-size: 12px;color: red;" class="my-2">', '</p>'); ?>
                                </div>

                                <div class="form-group">
                                    <label for="alamat" class="form-control-label">Alamat</label>
                                    <textarea class="form-control" placeholder="Alamat" id="alamat" name="alamat" rows="3"><?php echo set_value('alamat', $pegawai->alamat); ?></textarea>
                                    <?= form_error('alamat', '<p style="font-size: 12px;color: red;" class="my-2">', '</p>'); ?>
                                </div>
                            <?php endif; ?>
                            <div class="text-end mt-4">
                                <button class="btn btn-primary mb-0" type="submit">Edit</button>
                            </div>
                            </form>
                </div>
            </div>
        </div>
    </div>