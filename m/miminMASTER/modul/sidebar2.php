<?php
      if (isset($_SESSION['id_akun'])) {
    ?>

<div class="full-container layout">
    <div id="sideNav" class="side-nav">
      <nav class="nav-content">
  <ul class="side-nav-items">
    <li class="nav-item">

    
    <a class="navlink" href="<?php echo $alamat_website; ?>" onclick="closeNav(-1);">
        <div><i class="icon-home"></i></div> <!--routerLinkActiveOptions for root URL-->
        <div class="nav-title" i18n="@HOME">HOME</div>
      </a>

    </li>
            <li class="nav-item">
      <a href="javascript:void(0);" class="navlink has-sub" onclick="openNavItem(0);"  >
        <div><i class="icon-coins"></i></div>
        <div class="nav-title" i18n="@Funds">Dana</div>
      </a>
      <div class="nav-item-content" >
        <ul class="submenu account">
          <li>
            <a href="<?php echo $alamat_website.'methode'; ?>" (click)="closeNav($event);">
              <div><span class="circle"><i class="icon-pig"></i></span></div>
              <div class="fs-sm mt-1" i18n>Deposit</div>
            </a>
          </li>
          <li>
            <a href="<?php echo $alamat_website.'penarikan'; ?>" (click)="closeNav($event);">
              <div><span class="circle"><i class="icon-transfer"></i></span></div>
              <div class="fs-sm mt-1" i18n>Withdraw</div>
            </a>
          </li>
          <li>
            <a href="<?php echo $alamat_website.'history'; ?>" (click)="closeNav($event);">
              <div><span class="circle"><i class="icon-history"></i></span></div>
              <div class="fs-sm mt-1" i18n="@History">Pernyataan &nbsp;</div>
            </a>
          </li>
                    <li>
            <a href="<?php echo $alamat_website.'referral'; ?>" (click)="closeNav($event);">
              <div><span class="circle"><i class="icon-users"></i></span></div>
              <div class="fs-sm mt-1" i18n="">Referral &nbsp;</div>
            </a>
          </li>
                  </ul>
      </div>
    </li>
    
    <li class="nav-item">
      <a href="javascript:void(0);" class="navlink has-sub" onclick="openNavItem(1);" >
        <div><i class="icon-videogame_asset"></i></div>
        <div class="nav-title" i18n>PERMAINAN</div>
      </a>
      <div class="nav-item-content" >
        <ul class="submenu">
                  <!-- <i class="icon-lottery"></i>
                  <i  class="icon-others"></i>    -->

                                   <li>  <a href="<?php echo $alamat_website; ?>slots" (click)="closeNav(-1);">
              <div class="">
                <span class="circle">
                  <i class="icon-slot"></i>
                </span>
                                <span class='hot sub' style="">HOT</span>
                              </div>
              <div class="fs-sm mt-1">SLOTS</div>
            </a>
            </li>
                                                <li>  <a href="<?php echo $alamat_website; ?>sports" (click)="closeNav(-1);">
              <div class="">
                <span class="circle">
                  <i class="icon-soccer"></i>
                </span>
              </div>
              <div class="fs-sm mt-1">SPORTS</div>
            </a>
            </li>
                                                <li>    <a href="<?php echo $alamat_website; ?>casino" (click)="closeNav(-1);">
              <div class="">
                <span class="circle">
                  <i class="icon-casino"></i>
                </span>
              </div>
              <div class="fs-sm mt-1">CASINO</div>
            </a>
            </li>
                                                <li>
              <a href="<?php echo $alamat_website; ?>lottery" (click)="closeNav(-1);">
                <div class="">
                    <span class="circle">
                      <i class="icon-lottery"></i>
                    </span>
                                       
                    <span class="hot sub new "  >NEW</span>
                                    </div>
                <div class="fs-sm mt-1">LOTRE</div>
               </a>
            </li>
                                                <li>
              <a href="<?php echo $alamat_website; ?>fish-hunter" (click)="closeNav(-1);">
                <div class="">
                    <span class="circle">
                    <i class="icon-fish_hunter"></i>
                    </span>
                </div>
                <div class="fs-sm mt-1">TEMBAK IKAN</div>
               </a>
            </li>
                                                <li>   <a href="<?php echo $alamat_website; ?>e-games" (click)="closeNav(-1);">
              <div class="">
                <span class="circle">
                  <i class="icon-others"></i>
                </span>
              </div>
              <div class="fs-sm mt-1">e-games</div>
            </a>
            </li>
                                                <li>   <a href="<?php echo $alamat_website; ?>cockfight" (click)="closeNav(-1);">
              <div class="">
                <span class="circle">
                  <i class="icon-cockfight"></i>
                </span>
              </div>
              <div class="fs-sm mt-1">SABUNG AYAM</div>
            </a>
            </li>
                        

        </ul>
      </div>
    </li>

    <li class="nav-item">

      <a class="navlink" href="<?php echo $alamat_website.'promosi'; ?>"  onclick="closeNav(-1);">
        <div><i class="icon-gift"></i></div> <!--routerLinkActiveOptions for root URL-->
        <div class="nav-title" i18n="@PROMOS">PROMOSI</div>
      </a>
    </li>
            <li class="nav-item">

      <a class="navlink" href="<?php echo $alamat_website.'referral'; ?>" onclick="closeNav(-1);">
        <div><i class="icon-users"></i></div> <!--routerLinkActiveOptions for root URL-->
        <div class="nav-title" i18n="@REFERRAL">REFERRAL</div>
      </a>

    </li>
                    <li class="nav-item">

      <a class="navlink"  href="infortpgacor/" target="_blank" onclick="closeNav(-1);">
        <div>
          <i></i>
          <img src = "https://files.sitestatic.net/ImageFile/LscIUbeBWYqw9ntO9T4VblabBoWJh4A6qfD27MPl.png" width="30px" height="30px">
        </div> <!--routerLinkActiveOptions for root URL-->

        <div class="nav-title" >RTP <?php echo $isi1_judul_website; ?></div>
      </a>
    </li>
        

    <li class="nav-item">

      <a class="navlink" href="<?php echo $alamat_website.'info'; ?>" onclick="closeNav(-1);">
        <div><i class="icon-info"></i></div> <!--routerLinkActiveOptions for root URL-->
        <div class="nav-title" i18n="@INFO">INFO</div>
      </a>

    </li>
 
    <li class="nav-item">
      <a class="navlink" href="<?php echo $alamat_website.'contact-us'; ?>"   onclick="closeNav(-1);">
        <div><i class="icon-address-book"></i></div> <!--routerLinkActiveOptions for root URL-->
        <div class="nav-title" i18n>HUBUNGI KAMI</div>
      </a>
    </li>
        <li class="nav-item">
      <a href="javascript:void(0);" class="navlink" onclick="closeNav();" data-trigger='nifty' data-target='#langModal-mobile'  >
       <div><i class="icon-language"></i></div>
       Bahasa      </a>
    </li>
    <li class="nav-item">
      <a class="navlink" href="<?php echo $alamat_website; ?>?device=Desktop" onclick="closeNav(-1);">
        <div><i class="icon-display"></i></div> <!--routerLinkActiveOptions for root URL-->
        <div class="nav-title">Desktop View</div>
      </a>
    </li>
    <li class="nav-item"><a href="javascript:void(0);" class="navlink" onclick="closeNav();"> <i class="icon-double_arrow_l"></i></a></li>
  </ul>
</nav>
    </div>




<?php
      } else {
    ?>

<div class="full-container layout">
    <div id="sideNav" class="side-nav">
      <nav class="nav-content">
  <ul class="side-nav-items">
    <li class="nav-item">

      <a class="navlink" href="https://ppbet88.biz/" onclick="closeNav(-1);">
        <div><i class="icon-home"></i></div> <!--routerLinkActiveOptions for root URL-->
        <div class="nav-title" i18n="@HOME">HOME</div>
      </a>

    </li>
        
    <li class="nav-item">
      <a href="javascript:void(0);" class="navlink has-sub" onclick="openNavItem(0);" >
        <div><i class="icon-videogame_asset"></i></div>
        <div class="nav-title" i18n>PERMAINAN</div>
      </a>
      <div class="nav-item-content" >
        <ul class="submenu">
                  <!-- <i class="icon-lottery"></i>
                  <i  class="icon-others"></i>    -->

                                   <li>  <a href="<?php echo $alamat_website; ?>slots" (click)="closeNav(-1);">
              <div class="">
                <span class="circle">
                  <i class="icon-slot"></i>
                </span>
                                <span class='hot sub' style="">HOT</span>
                              </div>
              <div class="fs-sm mt-1">SLOTS</div>
            </a>
            </li>
                                                <li>  <a href="<?php echo $alamat_website; ?>sports" (click)="closeNav(-1);">
              <div class="">
                <span class="circle">
                  <i class="icon-soccer"></i>
                </span>
              </div>
              <div class="fs-sm mt-1">SPORTS</div>
            </a>
            </li>
                                                <li>    <a href="<?php echo $alamat_website; ?>casino" (click)="closeNav(-1);">
              <div class="">
                <span class="circle">
                  <i class="icon-casino"></i>
                </span>
              </div>
              <div class="fs-sm mt-1">CASINO</div>
            </a>
            </li>
                                                <li>
              <a href="<?php echo $alamat_website; ?>lottery" (click)="closeNav(-1);">
                <div class="">
                    <span class="circle">
                      <i class="icon-lottery"></i>
                    </span>
                                       
                    <span class="hot sub new "  >NEW</span>
                                    </div>
                <div class="fs-sm mt-1">LOTRE</div>
               </a>
            </li>
                                                <li>
              <a href="<?php echo $alamat_website; ?>fish-hunter" (click)="closeNav(-1);">
                <div class="">
                    <span class="circle">
                    <i class="icon-fish_hunter"></i>
                    </span>
                </div>
                <div class="fs-sm mt-1">TEMBAK IKAN</div>
               </a>
            </li>
                                                <li>   <a href="<?php echo $alamat_website; ?>e-games" (click)="closeNav(-1);">
              <div class="">
                <span class="circle">
                  <i class="icon-others"></i>
                </span>
              </div>
              <div class="fs-sm mt-1">e-games</div>
            </a>
            </li>
                                                <li>   <a href="<?php echo $alamat_website; ?>cockfight" (click)="closeNav(-1);">
              <div class="">
                <span class="circle">
                  <i class="icon-cockfight"></i>
                </span>
              </div>
              <div class="fs-sm mt-1">SABUNG AYAM</div>
            </a>
            </li>
                        

        </ul>
      </div>
    </li>

    <li class="nav-item">

      <a class="navlink" href="<?php echo $alamat_website.'promosi'; ?>"  onclick="closeNav(-1);">
        <div><i class="icon-gift"></i></div> <!--routerLinkActiveOptions for root URL-->
        <div class="nav-title" i18n="@PROMOS">PROMOSI</div>
      </a>
    </li>
            <li class="nav-item">

      <a class="navlink" href="<?php echo $alamat_website.'referral'; ?>" onclick="closeNav(-1);">
        <div><i class="icon-users"></i></div> <!--routerLinkActiveOptions for root URL-->
        <div class="nav-title" i18n="@REFERRAL">REFERRAL</div>
      </a>

    </li>
                    <li class="nav-item">

      <a class="navlink"  href="infortpgacor/" target="_blank" onclick="closeNav(-1);">
        <div>
          <i></i>
          <img src = "https://files.sitestatic.net/ImageFile/LscIUbeBWYqw9ntO9T4VblabBoWJh4A6qfD27MPl.png" width="30px" height="30px">
        </div> <!--routerLinkActiveOptions for root URL-->

        <div class="nav-title" >RTP <?php echo $isi1_judul_website; ?></div>
      </a>
    </li>
        

    <li class="nav-item">

      <a class="navlink" href="<?php echo $alamat_website.'info'; ?>" onclick="closeNav(-1);">
        <div><i class="icon-info"></i></div> <!--routerLinkActiveOptions for root URL-->
        <div class="nav-title" i18n="@INFO">INFO</div>
      </a>

    </li>
 
    <li class="nav-item">
      <a class="navlink" href="<?php echo $alamat_website.'contact-us'; ?>"   onclick="closeNav(-1);">
        <div><i class="icon-address-book"></i></div> <!--routerLinkActiveOptions for root URL-->
        <div class="nav-title" i18n>HUBUNGI KAMI</div>
      </a>
    </li>
        <li class="nav-item">
      <a href="javascript:void(0);" class="navlink" onclick="closeNav();" data-trigger='nifty' data-target='#langModal-mobile'  >
       <div><i class="icon-language"></i></div>
       Bahasa      </a>
    </li>
    <li class="nav-item">
      <a class="navlink" href="<?php echo $alamat_website; ?>?device=Desktop" onclick="closeNav(-1);">
        <div><i class="icon-display"></i></div> <!--routerLinkActiveOptions for root URL-->
        <div class="nav-title">Desktop View</div>
      </a>
    </li>
    <li class="nav-item"><a href="javascript:void(0);" class="navlink" onclick="closeNav();"> <i class="icon-double_arrow_l"></i></a></li>
  </ul>
</nav>
    </div>
    <?php
      }
    ?>