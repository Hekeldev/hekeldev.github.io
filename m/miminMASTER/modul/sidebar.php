<?php
      if (isset($_SESSION['id_akun'])) {
    ?>


<div id="r-side-bar"> 
    <div class="side-bar-content container"><!--This Blade is just to cater for multiple extends -->



<div class="container-wrapper profile-head">
  <div class="container container-box noSidePadding">
    <div class="title fs-lg clearfix">
            <button class="btn btn-link " id="btn-close--login-modal"> X
      </button>&nbsp;&nbsp;
             <span>Profil saya</span>

              <a href="keluar.php"  id="keluar" class="btn-logout"><i class="icon-logout"></i></a>
              
                </div>
    <div class="head-content">
      <div class="row no-gutters">
        <div class="col-xs-12 col-sm-6 col-md-7">
                            <div class="row no-gutters">
          <div class="clearfix col-xs-12 col-md-7">
           
            <div class="acc_safety_info ">
               
              <div class="flex-row  text-center icon_menu">
                <div class="icon-single">
                  <a href="<?php echo $alamat_website.'referral'; ?>">
                    <i class="icon-user1"></i>
                    <div>Referral</div>
                  </a>
                </div>
                <div class="icon-single">
                  <a href="<?php echo $alamat_website.'memo'; ?> " class="mail_link">
                    <i class="icon-envelope"></i>
                    <div>Memo</div>
                                      </a>
                </div>
                <div class="icon-single">
                  <a href="<?php echo $alamat_website.'member-level'; ?>" class="mail_link ">
                    <i class="icon-users"></i>
                    <div>Tingkat Anggota</div>
                  </a>
                </div>
              </div>
            </div>
          </div>
        </div>
                 </div>
        <div class="col-xs-12 col-sm-6 col-md-5  mt-4  mt-md-2">

        </div>
                <div class="col-xs-12 ">
          <div class="bal-box">
            <button class="btn btn-clear btn-refresh-wallet">
              <div class=" row no-gutters ">
                <!--<label for="inputWalletBal" class="col-2 col-form-label"><i class="icon-wallet"></i></label>-->
                <div class="col-xs-12">

                  <!--<i class="icon-wallet"></i>  &nbsp;-->
                  <h5 class="mb-0" i18n="">
                  SALDO DOMPET                  </h5>
                  <div>
                    <span class="bal-txt fs-lg"><?php echo number_format($total_saldo).'.00'; ?></span>
                    &nbsp;
                    <i class="i-refresh icon-refresh-2"></i>
                  </div>
                </div>

                <!--<div class="col-2">
            <button class="btn">
              <i class="icon-refresh"></i>
            </button>
          </div>-->
              </div>
            </button>
          </div>
        </div>
                <div class="col-xs-12  mt-3  ">
          <div class="mdc-tab-bar" role="tablist">
            <div class="mdc-tab-scroller">
              <div class="mdc-tab-scroller__scroll-area mdc-tab-scroller__scroll-area--scroll profile-scoller" style="margin-bottom: 0px; overflow-x: scroll;">
                <div class="mdc-tab-scroller__scroll-content">
                  <!---->
            <a role="tab" href="https://us-usaha188.com/profile/edit" data-tabname="edit" data-active="profileedit" class="mdc-tab active" aria-selected="false" tabindex="-1" id="goog_2098347606-FIXED-0">
              <span class="mdc-tab__content">

                <span class="mdc-tab__text-label"><!---->Detail<!----></span>

              </span>

            <span class="mdc-tab-indicator active">
              <span class="mdc-tab-indicator__content
                  mdc-tab-indicator__content--underline" style=""></span>
            </span>

              <span class="mdc-tab__ripple mdc-ripple-upgraded" style="--mdc-ripple-fg-size:91px; --mdc-ripple-fg-scale:1.8648; --mdc-ripple-fg-translate-start:76px, -10.5px; --mdc-ripple-fg-translate-end:30.6563px, -21.5px;"></span>
          </a>
          <!---->
            <a role="tab" href="https://us-usaha188.com/profile/change-password" data-tabname="change-password" data-active="profilechange-password" class="mdc-tab" aria-selected="true" tabindex="0" id="goog_2098347606-FIXED-1">
              <span class="mdc-tab__content">

                <span class="mdc-tab__text-label"><!---->Tukar kata sandi<!----></span>

              </span>

            <span class="mdc-tab-indicator">
              <span class="mdc-tab-indicator__content
                  mdc-tab-indicator__content--underline" style=""></span>
            </span>

              <span class="mdc-tab__ripple mdc-ripple-upgraded" style="--mdc-ripple-fg-size:93px; --mdc-ripple-fg-scale:1.85613; --mdc-ripple-fg-translate-start:48.6875px, -6.5px; --mdc-ripple-fg-translate-end:31.1875px, -22.5px;"></span>
          </a>
          <!---->
            
          <!---->

            <a role="tab" href="https://us-usaha188.com/profile/referral-downline" data-tabname="referral-downline" data-active="profilereferral-downline" class="mdc-tab ref_down" aria-selected="false" tabindex="-1" id="goog_2098347606-FIXED-3">
              <span class="mdc-tab__content">

                <span class="mdc-tab__text-label"><!---->Referral Downline<!----></span>

              </span>

            <span class="mdc-tab-indicator">
              <span class="mdc-tab-indicator__content
                  mdc-tab-indicator__content--underline" style=""></span>
            </span>

              <span class="mdc-tab__ripple mdc-ripple-upgraded" style="--mdc-ripple-fg-size:102px; --mdc-ripple-fg-scale:1.83267; --mdc-ripple-fg-translate-start:-44.1875px, -35px; --mdc-ripple-fg-translate-end:34.1484px, -27px;"></span>
          </a>

          <!---->
          <a role="tab" href="https://us-usaha188.com/profile/member-level" data-tabname="member-level" data-active="profilemember-level" class="mdc-tab ref_down" aria-selected="false" tabindex="-1" id="goog_2098347606-FIXED-4">
              <span class="mdc-tab__content">

                <span class="mdc-tab__text-label"><!---->Tingkat Anggota<!----></span>

              </span>

            <span class="mdc-tab-indicator">
              <span class="mdc-tab-indicator__content
                  mdc-tab-indicator__content--underline" style=""></span>
            </span>

              <span class="mdc-tab__ripple mdc-ripple-upgraded" style="--mdc-ripple-fg-size:102px; --mdc-ripple-fg-scale:1.83267; --mdc-ripple-fg-translate-start:-44.1875px, -35px; --mdc-ripple-fg-translate-end:34.1484px, -27px;"></span>
          </a>
          <!---->

          
                    <!---->
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="outlet tab-content">
        <div class="tab-pane active" id="home" role="tabpanel" aria-labelledby="home-tab">
          
          <div class="container-b3">
          <!--Outlet -->
<div class="row profile-edit">
        <div class="col-lg-5 col-xs-12">
          <div class="row">
            <div class="col-xs-4 noSidePadding"> <p class="_label" i18n="">Nama pengguna :</p> </div>
            <div class="col-xs-8 noSidePadding">
                <p><?php echo $nama_pengguna_akun_masuk; ?></p>
            </div>
          </div>
          <div class="row">
            <div class="col-xs-4 noSidePadding"> <p class="_label" i18n="">Tingkat Anggota :</p> </div>
            <div class="col-xs-8 noSidePadding">     
              <div class="memer_leavel">  
                <p>New</p>
                                                                            </div>
          </div>
        </div>
          <div class="row">
            <div class="col-xs-4 noSidePadding"> <p class="_label" i18n="">Nama Sesuai Rekening :</p> </div>
            <div class="col-xs-8 noSidePadding"> <p><?php echo $nama_lengkap_akun_masuk; ?> </p> </div>
          </div>
          <div class="row">
            <div class="col-xs-4 noSidePadding">  <p class="_label" i18n="">Alamat email :</p> </div>
            <div class="col-xs-8 noSidePadding"> <p><?php echo $email_akun_masuk; ?></p> </div>
          </div>
        </div>
        <div class="col-lg-7 col-12 ">
          <div class="row">
            <div class="col-xs-4 noSidePadding"> <p class="_label" i18n="">Nomor Kontak. :</p>  </div>
            <div class="col-xs-8 noSidePadding"> <p><?php echo $telepon_akun_masuk; ?></p> </div><!--(//TODO masked)-->
          </div>
                    <div class="row">
            <div class="col-xs-4 noSidePadding"> <p class="_label" i18n="">Refferal Kode :</p> </div>
            <div class="col-xs-8 noSidePadding"> <p><input type="text" class="form-control" value="/register?ref=<?php echo $nama_pengguna_akun_masuk; ?>" readonly="" id="elCopyText" style="width: 80%;display:inline-block;">&nbsp;&nbsp;&nbsp;<a href="javascript:void(0);" id="btn-copy--profile-edit"> <i class="icon-copy"></i></a></p> </div>

          </div>
         
      
          <div class="row">
            <div class="col-xs-4 noSidePadding"> <p class="_label" i18n="">Pin kedua :</p> </div>
            <div class="col-xs-8 noSidePadding">
               <p>
                <span class="switch_lable">OFF</span>
                <label class="switch">                  
                  <input type="checkbox" id="isOnSecondPin" name="is_on_second_pin" value="1">
                  <span class="slider round"></span>                  
                </label>
                <span class="switch_lable">ON</span>
               <a href="https://us-usaha188.com/setup-pin" class="btn btn-secondary" id="btn-reset2ndpin" style="display:none;">Reset sini</a>
              </p>
           </div>
             
          </div>
        </div>

      </div>


<script>
    $(document).ready(function(){
        /*set domain based ref url*/
          var base_url = window.location.origin;
          var ref_url = $("#elCopyText").val();
          var ref_final_url = base_url + ref_url;
          $("#elCopyText").val(ref_final_url);
          // console.log(ref_final_url);
        /*set domain based ref url end*/
    });

</script>
          </div>
        </div>

      </div>

    </div>
  </div>
</div>
<script>
  $(document).ready(function () {
    $(".comingsoon").click(function (e) {
        $( "#btn-close--login-modal" ).trigger( "click" );
                          e.preventDefault();
                          sweetAlert( transMsgs.pageComingSoon);
                          return false;
    });
  });
    </script>  
 
</div> 
</div>


<?php
      } else {
    ?>

<div id="r-side-bar">
    <div class="side-bar-content container">
      <style type="text/css">


      </style>

<div class="modal-header text-center">
        <button class="btn btn-link pull-left" id="btn-close--login-modal"> X </button>
        <div style="width:100%;">
          <h4 class="text-center modal-title">Login</h4>
        </div>
      </div>
      <div class="modal-body">
        <form  class="form-horizontal needs-validation" method="post">
          <input type="hidden" name="_token" value="0WopDRjDBoqgkm52n8j9Egtu3ULcc0I5Rh71VKTK">
          <div class="form-group ">
            <label for="password" class="fs-lg" >Nama pengguna</label>
            <div class="icon-input">
              <input type="text" class="form-control input-l" maxlength="50" name="nama_pengguna_akun" autocomplete="off" required="required" id="UserName" aria-describedby="emailHelp" placeholder="">
              <i class="icon-user left"></i>
            </div>
          </div>
          <div class="form-group ">
            <label for="password" class="fs-lg" >Kata sandi</label>
            <div class="icon-input">

              <input type="password" class="form-control  input-l" maxlength="20" id="pwd--login" name="kata_sandi_akun" required="required" autocomplete="current-password" />
              <i class="icon-lock left"></i>
              <i class="icon-eye toggle-password" input_id="#pwd--login"></i>
            </div>
          </div>

          <div class="row  alert alert-danger message" _login-modal>
          </div>

          <div class="form-group text-center">
            <button type="submit" name="masuk"  class="btn btn-block btn-primary fs-lg btn-submit">Login</button>
            <button type="button"  class="btn btn-link" id="forgotPwd-btn--login-modal" >
              Lupa kata sandi? &nbsp;<i class="icon-redo"></i>
            </button>
            <app-ellipsis *ngIf="inProgress"></app-ellipsis>
          </div>

        </form>


        <form class="form-horizontal" id="resetPwdForm" name="resetPwdForm" action="https://us-usaha188.com/submit_email" method="POST">
          <input type="hidden" name="_token" value="0WopDRjDBoqgkm52n8j9Egtu3ULcc0I5Rh71VKTK">

          <div class="form-group">
            <label for="password" class="fs-lg" i18n>Alamat email</label>
            <div class="icon-input">
              <input type="email" class="form-control input-l" name="email" required="required" id="email" aria-describedby="emailHelp" placeholder="">
              <i class="icon-envelope left"></i>
            </div>
          </div>
          <div class="form-group row no-gutters">
            <div class="col-xs-8 col-md-8">
              <input type="tel" id='registerCaptchaimg' class="form-control" name="forgotPwCaptchaimg" maxlength="4" autocomplete="off" style="height: 50px;" placeholder="Captcha">
            </div>
            <button class="btn btn-refresh col-xs-4 col-md-4 text-left" type="button" id="fogotrefreshCaptcha">
              <img data-url="https://us-usaha188.com/captcha-image-forgotpw?v=" id="forgotPwCaptchaimgpath" class="captcha_img" autocomplete="off">
              <i class="icon-refresh"></i>
            </button>
          </div>
          <div class="row alert alert-danger message" _login-modal>
          </div>

          <div class="form-group text-center">
            <button type="submit" class="btn btn-block btn-primary fs-lg">Mengatur ulang</button>
            <button type="button" id="btn-back--login-modal" class="btn btn-link" i18n>
              <i class="icon-undo"></i>&nbsp; Kembali untuk masuk </button>
            <app-ellipsis *ngIf="inProgress"></app-ellipsis>
          </div>

        </form>


        <form class="form-horizontal text-center" id="pinForm" action="https://us-usaha188.com/secure-pin">

          <div class="form-group ">
            <h3>Kode Pin Aman</h3>
            <p class="">Silakan Masukkan Kode Pin Aman Anda</p>
          </div>
          <div class="form-group ">
            <div class="pin-in-grp" id="pin-in-grp">


              <input type="password" maxlength="1" name="pincode[0]" required class="form-control pincode" style="width:16.66%">


              <input type="password" maxlength="1" name="pincode[1]" required class="form-control pincode" style="width:16.66%">


              <input type="password" maxlength="1" name="pincode[2]" required class="form-control pincode" style="width:16.66%">


              <input type="password" maxlength="1" name="pincode[3]" required class="form-control pincode" style="width:16.66%">


              <input type="password" maxlength="1" name="pincode[4]" required class="form-control pincode" style="width:16.66%">


              <input type="password" maxlength="1" name="pincode[5]" required class="form-control pincode" style="width:16.66%">


            </div>
          </div>
          <div class="form-group button-group">
            <div class="row">
              <div class="col-xs-4">
                <input class="btn btn-primary btn-round btn-block pinkey" type="button" value="5">
              </div>
              <div class="col-xs-4">
                <input class="btn btn-primary btn-round btn-block pinkey" type="button" value="6">
              </div>
              <div class="col-xs-4">
                <input class="btn btn-primary btn-round btn-block pinkey" type="button" value="3">
              </div>
              <div class="col-xs-4">
                <input class="btn btn-primary btn-round btn-block pinkey" type="button" value="4">
              </div>
              <div class="col-xs-4">
                <input class="btn btn-primary btn-round btn-block pinkey" type="button" value="8">
              </div>
              <div class="col-xs-4">
                <input class="btn btn-primary btn-round btn-block pinkey" type="button" value="7">
              </div>
              <div class="col-xs-4">
                <input class="btn btn-primary btn-round btn-block pinkey" type="button" value="0">
              </div>
              <div class="col-xs-4">
                <input class="btn btn-primary btn-round btn-block pinkey" type="button" value="9">
              </div>
              <div class="col-xs-4">
                <input class="btn btn-primary btn-round btn-block pinkey" type="button" value="2">
              </div>
              <div class="col-xs-4">
                <input id='back_bt' class="btn btn-warning btn-block  btn-round" type="button" value="RESET">
              </div>
              <div class="col-xs-4">
                <input class="btn btn-primary btn-block  btn-round pinkey" type="button" value="1">
              </div>
              <div class="col-xs-4">
                <button class="btn btn-info btn-round btn-block waves-effect waves-light btn-submit" type="submit">Kirimkan</button>
              </div>
            </div>
            <div class="row">
              <div class="col-xs-4"></div>
              <div class="col-xs-4"><a style="" class="btn btn-danger btn-round btn-block waves-effect " id="keluar"  >LOGOUT</a></div>
              <div class="col-xs-4"></div>
            </div>
          </div>
          <div class="row  alert alert-danger message" _login-modal>
          </div>
        </form>
      </div>
      <div class="modal-footer text-center" id="footer--login-modal">
        <div class="footer-content">Tidak terdaftar? <a href="<?php echo $alamat_website.'daftar'; ?>" i18n>Daftar</a></div>
      </div>
    </div>
  </div>

  <?php
      }
    ?>


  </div>
  </div>