<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>My Toko</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="" name="description" />
    <meta content="" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="image/website/website1688263737.png">
    <meta name="csrf-token" content="GlbcEouB8M4v94PcAVVp04gAsG1BFa3AqHP2jsg3">
    <!-- App css -->
    <!-- third party css -->
    <link href="hy_assets/css/vendor/dataTables.bootstrap5.css" rel="stylesheet" type="text/css" />
    <link href="hy_assets/css/vendor/responsive.bootstrap5.css" rel="stylesheet" type="text/css" />
    <link href="hy_assets/css/vendor/buttons.bootstrap5.css" rel="stylesheet" type="text/css" />
    <link href="hy_assets/css/vendor/select.bootstrap5.css" rel="stylesheet" type="text/css" />
    <!-- third party css end -->

    <link href="hy_assets/css/icons.min.css" rel="stylesheet" type="text/css" />
    <link href="hy_assets/css/app-modern.min.css" rel="stylesheet" type="text/css" id="light-style" />
    <link href="hy_assets/css/app-modern-dark.min.css" rel="stylesheet" type="text/css" id="dark-style" />

    <!-- Sweet Alert -->
    <link href="css/sweetalert/sweetalert.css" rel="stylesheet">
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script src="js/jquery-3.6.0.min.js"></script>




    <style>
        table.dataTable td {
            padding: 10px;
        }

        #loading {
            border: 16px solid #f3f3f3;
            /* Light grey */
            border-top: 16px solid #3498db;
            /* Blue */
            border-radius: 50%;
            width: 100px;
            height: 100px;
            animation: spin 2s linear infinite;
            margin: auto;
        }

        #preloading {
            position: fixed;
            left: 50%;
            top: 40%;
            transform: translate(-50%, -50%);
            width: 140px;
            height: 140px;
            text-align: center;
        }

        #canvasloading {
            width: 100%;
            background-color: rgba(255, 255, 255, 0.7);
            height: 100%;
            z-index: 999999;
            position: absolute;
            display: none;
        }

        #txt {
            font-weight: 700;
        }

        @keyframes  spin {
            0% {
                transform: rotate(0deg);
            }

            100% {
                transform: rotate(360deg);
            }
        }

        body {
            font-family: 'sans-serif';
            font-size: 14px;
        }

        .select2-selection__clear {
            margin-right: 18px;
            font-size: 20px;
        }

        .table td,
        .table th {
            padding: 4px;
            font-size: 13px;
        }
    </style>
    <script>
        $(document).ready(function() {
            //ajax setup
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
        });
    </script>
</head>

<body class="loading" data-layout="detached" data-layout-config='{"leftSidebarCondensed":false,"darkMode":false, "showRightSidebarOnStart": false}'>
    <div id="preloader">
        <div id="status">
            <div class="bouncing-loader">
                <div></div>
                <div></div>
                <div></div>
            </div>
        </div>
    </div>
    <div id="canvasloading">

        <div id="preloading">
            <div id="loading"></div>
            <p id="txt">Mohon Tunggu Sebentar...</p>
        </div>
    </div>
    <!-- Topbar Start -->
    <div class="navbar-custom topnav-navbar topnav-navbar-dark">
        <div class="container-fluid">

            <!-- LOGO -->
            <a href="/" class="topnav-logo">
                <span class="topnav-logo-lg">
                    <img src="image/website/website1688263737.png" alt="My Toko" height="30">
                </span>
                <span class="topnav-logo-lg" style="vertical-align: middle; color: #ced4da; font-size:20px; margin-left: 10px;">My Toko</span>
                <span class="topnav-logo-sm">
                    <img src="image/website/website1688263737.png" alt="" height="16">
                </span>
            </a>
            <ul class="list-unstyled topbar-menu float-end mb-0">

                <li class="dropdown notification-list d-xl-none">
                    <a class="nav-link dropdown-toggle arrow-none" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                        <i class="dripicons-search noti-icon"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-animated dropdown-lg p-0">
                        <form class="p-3">
                            <input type="text" class="form-control" placeholder="Search ..." aria-label="Recipient's username">
                        </form>
                    </div>
                </li>



                <!--
                <li class="notification-list">
                    <a class="nav-link end-bar-toggle" href="javascript: void(0);">
                        <i class="dripicons-gear noti-icon"></i>
                    </a>
                </li> -->

                <li class="dropdown notification-list">
                    <a class="nav-link dropdown-toggle arrow-none" data-bs-toggle="dropdown" href="#" id="topbar-notifydrop" role="button" aria-haspopup="true" aria-expanded="false">
                        <i class="dripicons-bell noti-icon"></i>
                        <span class="noti-icon-badge"></span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-end dropdown-menu-animated dropdown-lg" aria-labelledby="topbar-notifydrop">

                        <!-- item-->
                        <div class="dropdown-item noti-title">
                            <h5 class="m-0">
                                <span class="float-end">
                                    
                                </span>Notification
                            </h5>
                        </div>

                        <div id="body-notifikasi" style="max-height: 230px;" data-simplebar>
                            <div id="data-notifikasi"></div>
                            <div class="auto-load-notifikasi text-center">
                                <div class="spinner-border text-success" role="status"></div>
                            </div>

                        </div>

                        <!-- All-->
                        

                    </div>
                </li>

                <li class="dropdown notification-list">
                    <a class="nav-link dropdown-toggle nav-user arrow-none me-0" data-bs-toggle="dropdown" id="topbar-userdrop" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                        <span class="account-user-avatar">
                            <img src="userFoto/1688263760.png" alt="Super Admin" class="rounded-circle">
                        </span>
                        <span>
                            <span class="account-user-name">Super Admin</span>
                            <span class="account-position">SUPERADMIN</span>
                        </span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-end dropdown-menu-animated topbar-dropdown-menu profile-dropdown" aria-labelledby="topbar-userdrop">
                        <!-- item-->
                        <div class=" dropdown-header noti-title">
                            <h6 class="text-overflow m-0">Welcome !</h6>
                        </div>

                        <!-- item-->
                                                <a href="/profil" class="dropdown-item notify-item">
                            <i class="mdi mdi-account-circle me-1"></i>
                            <span>Profil</span>
                        </a>
                        
                        <!-- item-->
                        <a href="logout" class="dropdown-item notify-item" onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">
                            <i class="mdi mdi-logout me-1"></i>
                            <span>Logout</span>
                        </a>


                        <form id="logout-form" action="logout" method="POST" class="d-none">
                            <input type="hidden" name="_token" value="GlbcEouB8M4v94PcAVVp04gAsG1BFa3AqHP2jsg3">                        </form>

                    </div>
                </li>

            </ul>

            <a class="button-menu-mobile disable-btn">
                <div class="lines">
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
            </a>

        </div>
    </div>
    <!-- end Topbar -->

    <!-- Start Content-->
    <div class="container-fluid">

        <!-- Begin page -->
        <div class="wrapper">

            <!-- ========== Left Sidebar Start ========== -->
            <div class="leftside-menu leftside-menu-detached">

                <div class="leftbar-user">
                    <a href="javascript: void(0);">
                        <img src="userFoto/1688263760.png" alt="Super Admin" height="42" class="rounded-circle shadow-sm">
                        <span class="leftbar-user-name">Super Admin</span>
                    </a>
                </div>

                <!--- Sidemenu -->
                <ul class="side-nav">

                    <li class="side-nav-title side-nav-item">Navigation</li>

                    <li class="side-nav-item">
                        <a href="/dashboard" class="side-nav-link">
                            <i class="uil-home-alt"></i>
                            <span> Dashboard </span>
                        </a>
                    </li>

                                        <li class="side-nav-title side-nav-item">Transaksi</li>
                                        <li class="side-nav-item">
                        <a href="/pembelian" class="side-nav-link">
                            <i class="mdi mdi-cash-minus"></i>
                            <span> Pembelian </span>
                        </a>
                    </li>
                                        <!--                     <li class="side-nav-item">
                        <a href="/transaksi" class="side-nav-link">
                            <i class="mdi mdi-cash-check"></i>
                            <span> Penjualan</span>
                        </a>
                    </li>
                     -->
                                        <li class="side-nav-item">
                        <a data-bs-toggle="collapse" href="#sidebar-penjualan" aria-expanded="false" aria-controls="sidebar-penjualan" class="side-nav-link">
                            <i class="mdi mdi-cash-check"></i>
                            <span> Penjualan</span>
                            <span class="menu-arrow"></span>
                        </a>
                        <div class="collapse" id="sidebar-penjualan">
                            <ul class="side-nav-second-level">
                                                                <li>
                                    <a href="/transaksi">
                                        <i class="uil-circle"></i>
                                        <span> Data Penjualan</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="/kasir">
                                        <i class="uil-circle"></i>
                                        <span> Fast Kasir</span>
                                    </a>
                                </li>
                                                            </ul>
                        </div>
                    </li>
                                                            <li class="side-nav-item">
                        <a href="/pembayaran" class="side-nav-link">
                            <i class="mdi mdi-cash-plus"></i>
                            <span> Pembayaran</span>
                        </a>
                    </li>
                                                            <li class="side-nav-title side-nav-item">Transaksi Lain</li>
                                        <li class="side-nav-item">
                        <a href="/preorder" class="side-nav-link">
                            <i class="mdi mdi-cart-arrow-up"></i>
                            <span> Pemesanan</span>
                        </a>
                    </li>
                                                            <li class="side-nav-item">
                        <a href="/quotation" class="side-nav-link">
                            <i class="mdi mdi-cart-arrow-up"></i>
                            <span> Penawaran</span>
                        </a>
                    </li>
                                        <li class="side-nav-title side-nav-item">Tagihan</li>
                                        <li class="side-nav-item">
                        <a href="/invoice" class="side-nav-link">
                            <i class="mdi mdi-cash-register"></i>
                            <span> Tagihan Email</span>
                        </a>
                    </li>
                                                            <li class="side-nav-item">
                        <a href="/xeninvoice" class="side-nav-link">
                            <i class="mdi mdi-cash-register"></i>
                            <span> Tagihan E-Wallet</span>
                        </a>
                    </li>
                    
                                        <li class="side-nav-title side-nav-item">Mutasi</li>
                                        <li class="side-nav-item">
                        <a data-bs-toggle="collapse" href="#sidebar-stock-transfer" aria-expanded="false" aria-controls="sidebar-stock-transfer" class="side-nav-link">
                            <i class="mdi mdi-cart-arrow-right"></i>
                            <span> Transfer Barang</span>
                            <span class="menu-arrow"></span>
                        </a>
                        <div class="collapse" id="sidebar-stock-transfer">
                            <ul class="side-nav-second-level">

                                                                <li>
                                    <a href="/stock-transfer">
                                        <i class="uil-circle"></i>
                                        <span> Data Transfer</span>
                                    </a>
                                </li>
                                                                                                <li>
                                    <a href="/stock/transfer">
                                        <i class="uil-circle"></i>
                                        <span> Item Transfer</span>
                                    </a>
                                </li>
                                                                                                <li>
                                    <a href="/stock-transfer/terima">
                                        <i class="uil-circle"></i>
                                        <span> Terima Barang</span>
                                    </a>
                                </li>
                                
                            </ul>
                        </div>
                    </li>
                                                            <li class="side-nav-item">
                        <a data-bs-toggle="collapse" href="#sidebar-pengurangan" aria-expanded="false" aria-controls="sidebar-pengurangan" class="side-nav-link">
                            <i class="mdi mdi-cart-remove"></i>
                            <span> Pengurangan</span>
                            <span class="menu-arrow"></span>
                        </a>
                        <div class="collapse" id="sidebar-pengurangan">
                            <ul class="side-nav-second-level">
                                                                <li>
                                    <a href="/pengurangan">
                                        <i class="uil-circle"></i>
                                        <span> Data Pengurangan</span>
                                    </a>
                                </li>
                                                                                                <li>
                                    <a href="/stock/pengurangan-stock">
                                        <i class="uil-circle"></i>
                                        <span> Item Pengurangan </span>
                                    </a>
                                </li>
                                                            </ul>
                        </div>
                    </li>
                                                                                <li class="side-nav-title side-nav-item">Stock Barang</li>
                    <li class="side-nav-item">
                        <a data-bs-toggle="collapse" href="#sidebarStock" aria-expanded="false" aria-controls="sidebarStock" class="side-nav-link">
                            <i class="mdi mdi-store"></i>
                            <span> Stock Barang</span>
                            <span class="menu-arrow"></span>
                        </a>
                        <div class="collapse" id="sidebarStock">
                            <ul class="side-nav-second-level">

                                                                <li>
                                    <a href="/stock">
                                        <i class="uil-circle"></i>
                                        <span> Semua Stock </span>
                                    </a>
                                </li>
                                                                                                <li>
                                    <a href="/stock-gudang">
                                        <i class="uil-circle"></i>
                                        <span> Stock Gudang </span>
                                    </a>
                                </li>
                                
                                                                <li>
                                    <a href="/stock/masuk">
                                        <i class="uil-circle"></i>
                                        <span> Masuk</span>
                                    </a>
                                </li>
                                
                                                                <li>
                                    <a href="/stock/keluar">
                                        <i class="uil-circle"></i>
                                        <span> Keluar </span>
                                    </a>
                                </li>
                                
                            </ul>
                        </div>
                    </li>
                                        
                    <li class="side-nav-title side-nav-item">Master</li>
                    <li class="side-nav-item">
                        <a href="/barcode" class="side-nav-link">
                            <i class="mdi mdi-barcode"></i>
                            <span> Buat Barcode</span>
                        </a>
                    </li>
                    <li class="side-nav-item">
                        <a data-bs-toggle="collapse" href="#sidebarMaster" aria-expanded="false" aria-controls="sidebarEmail" class="side-nav-link">
                            <i class="mdi mdi-table"></i>
                            <span> Master</span>
                            <span class="menu-arrow"></span>
                        </a>
                        <div class="collapse" id="sidebarMaster">
                            <ul class="side-nav-second-level">

                                                                <li>
                                    <a href="/kategori">
                                        <i class="uil-circle"></i>
                                        <span> Kategori </span>
                                    </a>
                                </li>
                                
                                                                <li>
                                    <a href="/satuan">
                                        <i class="uil-circle"></i>
                                        <span> Satuan </span>
                                    </a>
                                </li>
                                
                                                                <li>
                                    <a href="/produk">
                                        <i class="uil-circle"></i>
                                        <span> Barang </span>
                                    </a>
                                </li>
                                
                                                                <li>
                                    <a href="/gudang">
                                        <i class="uil-circle"></i>
                                        <span> Gudang </span>
                                    </a>
                                </li>
                                
                                                                <li>
                                    <a href="/customer">
                                        <i class="uil-circle"></i>
                                        <span> Customer </span>
                                    </a>
                                </li>
                                                                                                <li>
                                    <a href="/supplier">
                                        <i class="uil-circle"></i>
                                        <span> Supplier </span>
                                    </a>
                                </li>
                                                                                                <li>
                                    <a href="/sales">
                                        <i class="uil-circle"></i>
                                        <span> Sales </span>
                                    </a>
                                </li>
                                
                            </ul>
                        </div>
                    </li>

                    <li class="side-nav-title side-nav-item">Akuntansi</li>
                                        <li class="side-nav-item">
                        <a data-bs-toggle="collapse" href="#sidebar-akun" aria-expanded="false" aria-controls="sidebar-akun" class="side-nav-link">
                            <i class="mdi mdi-table"></i>
                            <span> Akun</span>
                            <span class="menu-arrow"></span>
                        </a>
                        <div class="collapse" id="sidebar-akun">
                            <ul class="side-nav-second-level">
                                                                <li>
                                    <a href="/kategoriAkun">
                                        <i class="uil-circle"></i>
                                        <span> Kategori Akun</span>
                                    </a>
                                </li>
                                                                                                <li>
                                    <a href="/akun">
                                        <i class="uil-circle"></i>
                                        <span> Daftar Akun</span>
                                    </a>
                                </li>
                                                            </ul>
                        </div>
                    </li>
                                                            <li class="side-nav-item">
                        <a data-bs-toggle="collapse" href="#sidebar-kas" aria-expanded="false" aria-controls="sidebar-kas" class="side-nav-link">
                            <i class="mdi mdi-cash-usd"></i>
                            <span> Kas</span>
                            <span class="menu-arrow"></span>
                        </a>
                        <div class="collapse" id="sidebar-kas">
                            <ul class="side-nav-second-level">
                                                                <li>
                                    <a href="/kasBank">
                                        <i class="uil-circle"></i>
                                        <span> Kas & Bank</span>
                                    </a>
                                </li>
                                                                                                <li>
                                    <a href="/rekening">
                                        <i class="uil-circle"></i>
                                        <span> Rekening</span>
                                    </a>
                                </li>
                                                            </ul>
                        </div>
                    </li>
                                                            <li class="side-nav-item">
                        <a href="/pengeluaran" class="side-nav-link">
                            <i class="mdi mdi-cash-minus"></i>
                            <span> Pengeluaran</span>
                        </a>
                    </li>
                                                            <li class="side-nav-item">
                        <a href="/penerimaan" class="side-nav-link">
                            <i class="mdi mdi-cash-check"></i>
                            <span> Penerimaan</span>
                        </a>
                    </li>
                                                            <li class="side-nav-item">
                        <a href="/transfer" class="side-nav-link">
                            <i class="mdi mdi-bank-transfer"></i>
                            <span> Transfer</span>
                        </a>
                    </li>
                                                            <li class="side-nav-item">
                        <a href="/jurnal" class="side-nav-link">
                            <i class="mdi mdi-cash-multiple"></i>
                            <span> Jurnal Umum</span>
                        </a>
                    </li>
                                                            <li class="side-nav-item">
                        <a data-bs-toggle="collapse" href="#sidebar-laporan-akuntansi" aria-expanded="false" aria-controls="sidebar-laporan-akuntansi" class="side-nav-link">
                            <i class="mdi mdi-table"></i>
                            <span> Laporan</span>
                            <span class="menu-arrow"></span>
                        </a>
                        <div class="collapse" id="sidebar-laporan-akuntansi">
                            <ul class="side-nav-second-level">
                                                                <li>
                                    <a href="/laporan/neraca">
                                        <i class="uil-circle"></i>
                                        <span> Neraca</span>
                                    </a>
                                </li>
                                                                                                <li>
                                    <a href="/laporan/buku-besar">
                                        <i class="uil-circle"></i>
                                        <span> Buku Besar</span>
                                    </a>
                                </li>
                                                                                                <li>
                                    <a href="/laporan/laba-rugi">
                                        <i class="uil-circle"></i>
                                        <span> Laba - Rugi</span>
                                    </a>
                                </li>
                                                            </ul>
                        </div>
                    </li>
                    
                    <li class="side-nav-title side-nav-item">Pengaturan</li>


                                        <li class="side-nav-item">
                        <a href="/toko" class="side-nav-link">
                            <i class="uil-store-alt"></i>
                            <span> Daftar Toko</span>
                        </a>
                    </li>
                    
                                        <li class="side-nav-item">
                        <a href="/toko/ubah/superadmin/" class="side-nav-link">
                            <i class="mdi mdi-cog"></i>
                            <span> Pengaturan Toko</span>
                        </a>
                    </li>
                                        <li class="side-nav-item">
                        <a href="/toko/superadmin" class="side-nav-link">
                            <i class="uil-store"></i>
                            <span> Profil Toko</span>
                        </a>
                    </li>

                                        <li class="side-nav-title side-nav-item">Pengguna</li>
                    <li class="side-nav-item">
                        <a href="/user" class="side-nav-link">
                            <i class="uil uil-users-alt"></i>
                            <span> Data Pengguna </span>
                        </a>
                    </li>
                    
                                        <li class="side-nav-item">
                        <a href="/roles" class="side-nav-link">
                            <i class="uil-lock-access"></i>
                            <span> Roles </span>
                        </a>
                    </li>
                    
                                        <li class="side-nav-item">
                        <a href="/permission" class="side-nav-link">
                            <i class="uil-shield-check"></i>
                            <span> Permission </span>
                        </a>
                    </li>
                                                            <li class="side-nav-item">
                        <a href="/user/superadminn" class="side-nav-link">
                            <i class="uil-user"></i>
                            <span> Profil Saya </span>
                        </a>
                    </li>
                    


                    <div class="clearfix"></div>
                    <!-- Sidebar -left -->

            </div>
            <!-- Left Sidebar End -->

            <div class="content-page">
                <div class="content">

                    
<div class="row">
    <div class="col-12">
        <div class="page-title-box">

            <h4 class="page-title">Permission</h4>
        </div>
    </div>
</div>


<div class="row">
    <div class="col-12">

        <div class="card">
            <div class="card-header">
                                <button type="button" id="createNewPermission" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#success-header-modal"><i class="mdi mdi-plus-circle me-2"></i>
                    Tambah</button>
                
                 <button type="button" name="bulk_delete" id="bulk_delete" class="btn btn-outline-danger float-end">Hapus
                    Pilihan</button>
                            </div>
            <div class="card-body">


                <div class="table-responsive">
                    <table id="datatable" class="table table-centered table-bordered table-hover w-100 dt-responsive nowrap dataTable no-footer dtr-inline">
                        <thead class="table-light">
                            <tr>
                                <th width="20px">No</th>
                                <th class="all" style="width: 20px;">
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" id="master">
                                        <label class="form-check-label" for="master">&nbsp;</label>
                                    </div>
                                </th>
                                <th>Nama Permission</th>
                                <th>Group</th>
                                <th>Keterangan</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>

                        <tbody>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Success Header Modal -->

<div id="ajaxModel" class="modal fade" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="success-header-modalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header modal-colored-header bg-info">
                <h4 class="modal-title" id="success-header-modalLabel">Permission</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
            </div>
            <form id="permissionForm" name="permissionForm" class="form-horizontal" enctype="multipart/form-data">
                <input type="hidden" name="_token" value="GlbcEouB8M4v94PcAVVp04gAsG1BFa3AqHP2jsg3">                <div class="modal-body">
                    <input type="hidden" name="id_permission" id="id_permission">
                    <div class="mb-2">
                        <label for="parent" class="control-label">Group</label>
                        <select id="induk" name="induk" class="form-control select2">
                            <option value="0">Pilih Group</option>
                            
                            </optgroup>
                        </select>
                    </div>

                    <div class="mb-2 permission-group">
                        <label for="name" class="col-sm-3 control-label">Nama Permission <span style="color: red;">*</span></label>

                        <input type="text" class="form-control" id="name" name="name" placeholder="Masukkan Nama Permission" required="">

                    </div>
                    <div class="mb-2">
                        <label for="keterangan">Keterangan</label>
                        <textarea name="keterangan" id="keterangan" class="form-control"></textarea>
                    </div>


                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-white" data-bs-dismiss="modal">Batal</button>
                    <button type="button" class="btn btn-primary" id="saveBtn">Simpan</button>
                </div>
            </form>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->



<script type="text/javascript">
    $(document).ready(function() {
        //ajax setup
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });



        // datatable
        var table = $('#datatable').DataTable({
            processing: true,
            serverSide: true,
            responsive: true,
            retrieve: true,
            paging: true,
            destroy: true,
            lengthMenu: [
                    [50, 100, -1],
                    [50, 100, "All"]
                ],
            "scrollX": false,
            ajax: {
                url: "permissionTable",
                type: "POST",

            },
            columns: [{
                    data: 'DT_RowIndex',
                    name: 'DT_RowIndex',
                    orderable: false,
                    searchable: false
                },
                {
                    data: 'select',
                    name: 'select',
                    orderable: false,
                    searchable: false
                },
                {
                    data: 'name',
                    name: 'name'
                },
                {
                    data: 'group',
                    name: 'group'
                },
                {
                    data: 'keterangan',
                    name: 'keterangan'
                },
                {
                    data: 'action',
                    name: 'action',
                    orderable: false,
                    searchable: false
                },
            ]
        });



        permission();

        $('#master').on('click', function(e) {
            if ($(this).is(':checked', true)) {
                $(".select").prop('checked', true);
            } else {
                $(".select").prop('checked', false);
            }
        });


        function permission() {
            $.ajax({
                url: "/permission/select",
                type: "post",
                dataType: 'json',
                success: function(params) {
                    $("#induk").select2({
                        placeholder: {
                            id: '0', // the value of the option
                            text: 'Permission Group'
                        },
                        allowClear: true,
                        dropdownParent: $('#ajaxModel .modal-body'),
                        //    _token: CSRF_TOKEN,
                        data: params // search term
                    });
                },
            });
        }




        $('#createNewPermission').click(function() {
            $('#saveBtn').html("Simpan");
            $('#id_permission').val('');
            $('#permissionForm').trigger("reset");
            $('#modelHeading').html("Tambah Permission ");
            $("#induk").select2("trigger", "select", {
                data: {
                    id: 0
                }
            });
            permission();

            $('#ajaxModel').modal('show');
        });

        $('#saveBtn').click(function(e) {
            e.preventDefault();
            name = $("#name").val();
            induk = $("#induk").val();
            id = $('#id_permission').val();
            if (name == '') {
                Swal.fire({
                    title: 'Error!',
                    text: 'Nama Permission Tidak Boleh Kosong!',
                    icon: 'error',
                    confirmButtonText: 'OK'
                })
            } else {


                $(this).html('Menyimpan..');

                var form = $('#permissionForm')[0];
                var formData = new FormData(form);
                $("#canvasloading").show();
                $("#loading").show();
                $.ajax({
                    data: formData,
                    url: "permission/simpan",
                    type: "POST",
                    dataType: 'json',
                    contentType: false,
                    cache: false,
                    processData: false,
                    success: function(data) {
                        if (data.success == true) {
                            table.draw();
                            $('#permissionForm').trigger("reset");
                            $("#induk").select2("trigger", "select", {
                                data: {
                                    id: induk
                                }
                            });
                            $('#saveBtn').html("Simpan");
                            $('#id_permission').val('');
                            $("#canvasloading").hide();
                            $("#loading").hide();
                            if(id){
                                $("#induk").select2("trigger", "select", {
                                data: {
                                    id: 0
                                }
                            });
                                $('#ajaxModel').modal('hide');
                            }
                            $.NotificationApp.send("Berhasil", data.message, "top-right",
                                "",
                                "info")
                        } else {
                            $('#saveBtn').html('Simpan');
                            $("#canvasloading").hide();
                            $("#loading").hide();
                            Swal.fire({
                                title: 'Error!',
                                text: data.message,
                                icon: 'error',
                                confirmButtonText: 'OK'
                            })
                        }
                    },
                    error: function(xhr) {
                        var res = xhr.responseJSON;
                        if ($.isEmptyObject(res) == false) {
                            err = '';
                            $.each(res.errors, function(key, value) {
                                err = value;
                            });
                            $('#saveBtn').html('Simpan');
                            $("#canvasloading").hide();
                            $("#loading").hide();
                            Swal.fire({
                                title: 'Error!',
                                text: err,
                                icon: 'error',
                                confirmButtonText: 'OK'
                            })
                        }
                    }
                });
            }
        });

        $('body').on('click', '.editPermission', function() {

            var id_permission = $(this).data('id_permission');
            $("#canvasloading").show();
            $("#loading").show();
            $.get("permission" + '/' + id_permission + '/edit', function(data) {
                $("#canvasloading").hide();
                $("#loading").hide();
                $('#modelHeading').html("Ubah Permission ");
                $('#saveBtn').html('Perbaharui');
                $('#ajaxModel').modal('show');
                $('#id_permission').val(data.id);
                $('#name').val(data.name);
                $('#keterangan').val(data.keterangan);
                permission();
                $("#induk").select2("trigger", "select", {
                    data: {
                        id: data.induk_id
                    }
                });

            })

        });

        $('body').on('click', '.deletePermission', function() {
            var id_permission = $(this).data("id_permission");
            status = $(this).data("status");

            myurl = '';
            myurl = "permission-trash" + '/' + id_permission

            msg =
                "Data Permission yang dihapus tidak dapat dikembalikan!";

            swal({
                    title: "Yakin hapus data ini?",
                    text: msg,
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#DD6B55",
                    confirmButtonText: "Ya, Hapus Data!",
                    cancelButtonText: "Batal!",
                    closeOnConfirm: true,
                    closeOnCancel: true
                },
                function(isConfirm) {
                    if (isConfirm) {
                        $("#canvasloading").show();
                        $("#loading").show();
                        $.ajax({
                            type: "get",
                            url: myurl,
                            success: function(data) {
                                if (data.success == true) {
                                    table.draw();
                                    $("#canvasloading").hide();
                                    $("#loading").hide();
                                    $.NotificationApp.send("Berhasil", data.message,
                                        "top-right", "",
                                        "info")
                                } else {
                                    $("#canvasloading").hide();
                                    $("#loading").hide();
                                    Swal.fire({
                                        title: 'Gagal!',
                                        text: data.message,
                                        icon: 'error',
                                        confirmButtonText: 'OK'
                                    })
                                }
                            },
                            error: function(data) {
                                console.log('Error:', data);
                                $("#canvasloading").hide();
                                $("#loading").hide();
                                Swal.fire({
                                    title: 'Error!',
                                    text: 'Terjadi Kesalahan',
                                    icon: 'error',
                                    confirmButtonText: 'OK'
                                })
                            }
                        });

                    }
                    //  else {
                    //     $("#canvasloading").hide();
                    //     $("#loading").hide();
                    //     Swal.fire({
                    //         title: 'Batal!',
                    //         text: 'Hapus Data Dibatalkan',
                    //         icon: 'success',
                    //         confirmButtonText: 'OK'
                    //     })
                    // }
                });
        });


        $('body').on('click', '.restorePermission', function() {

            var id_permission = $(this).data("id_permission");
            swal({
                    title: "Kembalikan Permission ini?",
                    text: "Data akan dikembalikan ke tabel Permission!",
                    type: "info",
                    showCancelButton: true,
                    confirmButtonColor: "#DD6B55",
                    confirmButtonText: "Ya, Kembalikan!",
                    cancelButtonText: "Batal!",
                    closeOnConfirm: true,
                    closeOnCancel: true
                },
                function(isConfirm) {
                    if (isConfirm) {
                        $("#canvasloading").show();
                        $("#loading").show();
                        $.ajax({
                            type: "get",
                            url: "permission-restore" + '/' + id_permission,
                            success: function(data) {
                                table.draw();
                                tableTrashed.draw();
                                $("#canvasloading").hide();
                                $("#loading").hide();
                                $.NotificationApp.send("Berhasil", data.message,
                                    "top-right", "",
                                    "info")
                            },
                            error: function(data) {
                                console.log('Error:', data);
                                $("#canvasloading").hide();
                                $("#loading").hide();
                            }
                        });

                    }

                });
        });

        $(document).on('click', '#bulk_delete', function() {
            var id = [];
            swal({
                    title: "Yakin hapus data yang dipilih?",
                    text: "Data yang dihapus akan dipindahkan ke Tempat Sampah!",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#DD6B55",
                    confirmButtonText: "Ya, Hapus!",
                    cancelButtonText: "Batal!",
                    closeOnConfirm: true,
                    closeOnCancel: true
                },
                function(isConfirm) {
                    if (isConfirm) {
                        $('.select:checked').each(function() {
                            id.push($(this).val());
                        });
                        if (id.length > 0) {
                            $.ajax({
                                url: "permission/bulk-delete",
                                method: "get",
                                data: {
                                    id: id
                                },
                                success: function(data) {
                                    if (data.success == true) {
                                        table.draw();
                                        tableTrashed.draw();
                                        $("#canvasloading").hide();
                                        $("#loading").hide();
                                        $.NotificationApp.send("Berhasil", data.message,
                                            "top-right", "",
                                            "info")
                                    } else {
                                        $("#canvasloading").hide();
                                        $("#loading").hide();
                                        Swal.fire({
                                            title: 'Gagal',
                                            text: data.message,
                                            icon: 'error',
                                            confirmButtonText: 'OK'
                                        })
                                    }
                                }
                            });
                        } else {
                            Swal.fire({
                                title: 'Error!',
                                text: 'Silahkan Pilih Data Yang Akan Dihapus...!!!',
                                icon: 'error',
                                confirmButtonText: 'OK'
                            })
                        }
                    }
                });
        });

        // $('.chosen-select').chosen({width: "100%"});
    });
</script>

                </div> <!-- End Content -->

                <!-- Footer Start -->
                <footer class="footer">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-6">
                                © My Toko - 2023 All Right Reserved.
                            </div>
                            <div class="col-md-6">
                                <div class="text-md-end footer-links d-none d-md-block">
                                    <a href="javascript: void(0);">About</a>
                                    <a href="javascript: void(0);">Support</a>
                                    <a href="javascript: void(0);">Contact Us</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </footer>
                <!-- end Footer -->

            </div> <!-- content-page -->

        </div> <!-- end wrapper-->
    </div>
    <!-- END Container -->




    <div class="rightbar-overlay"></div>
    <!-- /End-bar -->



    <script>
        // $(document).ready(function() {
        //     var ENDPOINT = "http://nyuscoding.great-site.net";
        // var page = 1;
        // infinteLoadMore(page);
        // $('#body-notifikasi').scroll(function() {
        // if ($('#body-notifikasi').scrollTop() + $('#body-notifikasi').height() >= $('#body-notifikasi').height()) {
        // page++;
        // infinteLoadMore(page);
        // }
        // });


        // function infinteLoadMore(page) {
        // $.ajax({
        //         url: ENDPOINT + "/notifikasi",
        //         datatype: "html",
        //         type: "get",
        //         beforeSend: function() {
        //             $('.auto-load-notifikasi').show();
        //         }
        //     })
        //     .done(function(response) {
        //         if (response.length == 0) {
        //             $('.auto-load-notifikasi').html("We don't have more data to display :(");
        //             return;
        //         }
        //         $('.auto-load-notifikasi').hide();
        //         $("#data-notifikasi").append(response);
        //     })
        //     .fail(function(jqXHR, ajaxOptions, thrownError) {
        //         console.log('Server error occured');
        //     });



        // $(document).on("mouseover", ".notify-item", function() {
        //     var id = $(this).data('id');
        //     myurl = "notif-read" + '/' + id
        //     $.ajax({
        //         type: "get",
        //         url: myurl,
        //         success: function(data) {

        //         },
        //         error: function(data) {
        //             console.log('Error:', data);
        //         }
        //     });
        // })

        // });
    </script>

    <!-- bundle -->
    <script src="hy_assets/js/vendor.min.js"></script>
    <script src="hy_assets/js/app.min.js"></script>

    <!-- third party js -->
    <script src="hy_assets/js/vendor/jquery.dataTables.min.js"></script>
    <script src="hy_assets/js/vendor/dataTables.bootstrap5.js"></script>
    <script src="hy_assets/js/vendor/dataTables.responsive.min.js"></script>
    <script src="hy_assets/js/vendor/responsive.bootstrap5.min.js"></script>
    <script src="hy_assets/js/vendor/dataTables.buttons.min.js"></script>
    <script src="hy_assets/js/vendor/buttons.bootstrap5.min.js"></script>
    <script src="hy_assets/js/vendor/buttons.html5.min.js"></script>
    <script src="hy_assets/js/vendor/buttons.flash.min.js"></script>
    <script src="hy_assets/js/vendor/buttons.print.min.js"></script>
    <script src="hy_assets/js/vendor/dataTables.keyTable.min.js"></script>
    <script src="hy_assets/js/vendor/dataTables.select.min.js"></script>
    <!-- third party js ends -->

    <!-- demo app -->
    <script src="hy_assets/js/pages/demo.datatable-init.js"></script>
    <!-- end demo js-->

    

    <!-- Todo js -->
    <script src="hy_assets/js/ui/component.todo.js"></script>

    <!-- demo app -->
    
    <!-- end demo js-->

    <!-- demo -->
    
    <!-- end demo js-->

    <script src="js/sweetalert/sweetalert.min.js"></script>
    <script src="/js/jquery.mask.min.js"></script>
    <!-- demo app -->
    <script src="hy_assets/js/pages/demo.form-wizard.js"></script>
    <!-- end demo js-->

    <script>
        $(document).ready(function() {
            $('.input-daterange').datepicker({
                todayBtn: 'linked',
                format: 'yyyy-mm-dd',
                autoclose: true
            });

            $('body').on("keyup change", ".rupiah", function() {
                // Format mata uang.
                $(this).mask('0.000.000.000', {
                    reverse: true
                });

            })

            $('body').on("focus", ".rupiah", function() {
                if ($(this).val() == 0) {
                    $(this).val('');
                }
            })

            $('body').on("focusout", ".rupiah", function() {
                if ($(this).val() == '') {
                    $(this).val(0);
                }
            })

            $('body').on("focus", ".nilai", function() {
                if ($(this).val() == 0) {
                    $(this).val('');
                }
            })

            $('body').on("focusout", ".nilai", function() {
                if ($(this).val() == '') {
                    $(this).val(0);
                }
            })
        })
    </script>
</body>

</html>