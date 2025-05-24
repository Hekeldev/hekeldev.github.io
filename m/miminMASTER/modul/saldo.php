<div class="content my01">

<?php
  if (isset($_SESSION['id_akun'])) {
?>


    <div class="container wallet-bal">
        <div class="row text-left">
            <div class="col-xs-6">
                <button class="btn btn-clear btn-refresh-wallet">
                    <i class="icon-currency-dollar fs-lg i-dollar"></i>
                    &nbsp;&nbsp;
                    <span class="bal-txt">IDR <?php echo number_format($total_saldo)?></span>
                </button>
            </div>
            <div class="col-xs-6 noSidePadding i-refresh">
                <button class="btn btn-clear btn-refresh-wallet pull-right"><i class="icon-refresh-2"></i></button>
            </div>
        </div>
    </div>

    <?php
  }
?>

