<div class="contentdata">
    <div id="content-primary" class="p-0">


        <div class="content-body" style="position: relative">
            <div class="content-area">
                <div id="content" class="content-box">



                    <div id="" class="panel panel-default panelbg ptsans">
                        <div class="panel-body panelbg">
                            <div style="margin-bottom:16px; font-weight: bold; font-size: 1.5rem"><i class="bi bi-person-fill"></i> Daftar</div>
                            <div id="statusRegisterDesktop" style="margin-bottom: 5px; width: 100%"></div>
                            <form class="form-group-sm" id="registerFormDesktop">
                                <!-- <form method="post" action="functions/actions.php?aksi=daftar" class="form-group-sm" id="formRegister"> -->
                                <div class="form-group-sm" id="input-username">
                                    <label>Username</label><input type="text" class="form-control has-success" id="regUsernameDesktop" placeholder="Username 6-16 karakter standar (A~Z, a~z, 0~9) dan tanpa spasi">
                                </div>
                                <div class="row" style="margin-top:10px">
                                    <div class="form-group-sm col-md-3" id="input-pass">
                                        <label>Password</label><input type="password" id="regPasswordDesktop" class="form-control" placeholder="Password (6 karakter atau lebih)">
                                    </div>
                                    <div class="form-group-sm col-md-3" id="input-passcon">
                                        <label>Konfirmasi Password</label><input type="password" id="regConfirmPasswordDesktop" class="form-control" placeholder="Password sekali lagi">
                                    </div>
                                    <div class="form-group-sm col-md-3" id="input-email">
                                        <label>Email</label><input type="text" id="regEmailDesktop" class="form-control" placeholder="Masukkan Email">
                                    </div>
                                    <div class="form-group-sm col-md-3" id="input-telpon">
                                        <label>Telpon</label><input type="text" inputmode="numeric" id="regTelpDesktop" class="form-control" placeholder="Masukkan Telpon">
                                    </div>
                                </div>
                                <div class="row" style="margin-top:10px">
                                    <div class="form-group-sm col-md-3" id="input-bank">
                                        <label>Bank</label>
                                        <select class="form-control" id="regBankDesktop">
                                            <option value="">Pilih Bank</option>
                                            <option value="BCA">BCA</option>
                                            <option value="Mandiri">Mandiri</option>
                                            <option value="BNI">BNI</option>
                                            <option value="BRI">BRI</option>
                                            <option value="CIMB">CIMB</option>
                                            <option value="Danamon">Danamon</option>
                                            <option value="Permata">Permata</option>
                                            <option value="BJB">BJB</option>
                                            <option value="PANIN">PANIN</option>
                                            <option value="OCBC">OCBC</option>
                                            <option value="SUMUT">SUMUT</option>
                                            <option value="BSI">BSI</option>
                                            <option value="NEO">NEO</option>
                                            <option value="JAGO">JAGO</option>
                                            <option value="Jenius">Jenius</option>
                                            <option value="DANA">DANA</option>
                                            <option value="OVO">OVO</option>
                                            <option value="ShopeePay">ShopeePay</option>
                                            <option value="GOPAY">GOPAY</option>
                                            <option value="LinkAja">LinkAja</option>
                                            <option value="Lain-lain">Lain-lain</option>
                                        </select>
                                    </div>
                                    <div class="form-group-sm col-md-3" id="input-rek">
                                        <label>No Rekening</label><input type="text" inputmode="numeric" id="regAccDesktop" class="form-control" placeholder="Masukkan nomor rekening">
                                    </div>
                                    <div class="form-group-sm col-md-3" id="input-nama">
                                        <label>Nama sesuai Rekening</label><input id="regNameDesktop" type="text" class="form-control" placeholder="Nama sesuai rekening">
                                    </div>
                                    <div class="form-group-sm col-md-3" id="input-ref">
                                        <label>Referal</label><input  type="text" class="form-control" placeholder="Username Referal bila ada">
                                    </div>
                                </div>
                                <div style="margin-top:15px">
                                    <label class="checkbox-inline" style="display: flex; gap: 4px">
                                        <input type="checkbox" checked disabled>
                                        <div>Dengan ini saya menyatakan bahwa saya telah membaca dan menyetujui <a href="javascript:showInformasi('privasi')" style="color: var(--primary-color)">Kebijakan Privasi</a> pada Situs ini.</div>
                                    </label>

                                </div>
                                <input type="submit" class="btn btn-masuk fw-bold" value="Daftar" style="margin-top:20px; width:200px; text-align: center; display: grid; place-items: center; line-height: var(--text-size-default); height: 40px">
                                <input type="hidden" name="task" value="register">

                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </div>


    </div>
</div>