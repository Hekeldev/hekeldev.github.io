<?php
  $query_livechat = mysqli_query($koneksi, "SELECT * FROM pengaturan WHERE nama_pengaturan = 'livechat'");
  $data_livechat = mysqli_fetch_array($query_livechat);
  $id_livechat = $data_livechat['id_pengaturan'];
  $isi1_livechat = $data_livechat['isi1_pengaturan'];
  $isi2_livechat = $data_livechat['isi2_pengaturan'];
  $isi3_livechat = $data_livechat['isi3_pengaturan'];

  $query_line = mysqli_query($koneksi, "SELECT * FROM pengaturan WHERE nama_pengaturan = 'line'");
  $data_line = mysqli_fetch_array($query_line);
  $id_line = $data_line['id_pengaturan'];
  $isi1_line = $data_line['isi1_pengaturan'];
  $isi2_line = $data_line['isi2_pengaturan'];

  $query_twitter = mysqli_query($koneksi, "SELECT * FROM pengaturan WHERE nama_pengaturan = 'twitter'");
  $data_twitter = mysqli_fetch_array($query_twitter);
  $id_twitter = $data_twitter['id_pengaturan'];
  $isi1_twitter = $data_twitter['isi1_pengaturan'];
  $isi2_twitter = $data_twitter['isi2_pengaturan'];

  $query_whatsapp = mysqli_query($koneksi, "SELECT * FROM pengaturan WHERE nama_pengaturan = 'whatsapp'");
  $data_whatsapp = mysqli_fetch_array($query_whatsapp);
  $id_whatsapp = $data_whatsapp['id_pengaturan'];
  $isi1_whatsapp = $data_whatsapp['isi1_pengaturan'];
  $isi2_whatsapp = $data_whatsapp['isi2_pengaturan'];
  $isi3_whatsapp = $data_whatsapp['isi3_pengaturan'];

  $query_instagram = mysqli_query($koneksi, "SELECT * FROM pengaturan WHERE nama_pengaturan = 'instagram'");
  $data_instagram = mysqli_fetch_array($query_instagram);
  $id_instagram = $data_instagram['id_pengaturan'];
  $isi1_instagram = $data_instagram['isi1_pengaturan'];
  $isi2_instagram = $data_instagram['isi2_pengaturan'];

  $query_facebook = mysqli_query($koneksi, "SELECT * FROM pengaturan WHERE nama_pengaturan = 'facebook'");
  $data_facebook = mysqli_fetch_array($query_facebook);
  $id_facebook = $data_facebook['id_pengaturan'];
  $isi1_facebook = $data_facebook['isi1_pengaturan'];
  $isi2_facebook = $data_facebook['isi2_pengaturan'];
  
  $query_footer = mysqli_query($koneksi, "SELECT * FROM pengaturan WHERE nama_pengaturan = 'footer'");
  $data_footer = mysqli_fetch_array($query_footer);
  $id_footer = $data_footer['id_pengaturan'];
  $isi1_footer = $data_footer['isi1_pengaturan'];
  $isi2_footer = $data_footer['isi2_pengaturan'];

  $query_livescore = mysqli_query($koneksi, "SELECT * FROM pengaturan WHERE nama_pengaturan = 'livescore'");
  $data_livescore = mysqli_fetch_array($query_livescore);
  $id_livescore = $data_livescore['id_pengaturan'];
  $isi1_livescore = $data_livescore['isi1_pengaturan'];
  $isi2_livescore = $data_livescore['isi2_pengaturan'];

  $query_rtp_slot = mysqli_query($koneksi, "SELECT * FROM pengaturan WHERE nama_pengaturan = 'rtp_slot'");
  $data_rtp_slot = mysqli_fetch_array($query_rtp_slot);
  $id_rtp_slot = $data_rtp_slot['id_pengaturan'];
  $isi1_rtp_slot = $data_rtp_slot['isi1_pengaturan'];
  $isi2_rtp_slot = $data_rtp_slot['isi2_pengaturan'];

  $query_popup_pengumuman = mysqli_query($koneksi, "SELECT * FROM pengaturan WHERE nama_pengaturan = 'popup_pengumuman'");
  $data_popup_pengumuman = mysqli_fetch_array($query_popup_pengumuman);
  $id_popup_pengumuman = $data_popup_pengumuman['id_pengaturan'];
  $isi1_popup_pengumuman = $data_popup_pengumuman['isi1_pengaturan'];
  $isi2_popup_pengumuman = $data_popup_pengumuman['isi2_pengaturan'];
  $isi3_popup_pengumuman = $data_popup_pengumuman['isi3_pengaturan'];

  $query_pusat_bantuan = mysqli_query($koneksi, "SELECT * FROM pengaturan WHERE nama_pengaturan = 'pusat_bantuan'");
  $data_pusat_bantuan = mysqli_fetch_array($query_pusat_bantuan);
  $id_pusat_bantuan = $data_pusat_bantuan['id_pengaturan'];
  $isi1_pusat_bantuan = $data_pusat_bantuan['isi1_pengaturan'];

  $query_syarat_dan_ketentuan = mysqli_query($koneksi, "SELECT * FROM pengaturan WHERE nama_pengaturan = 'syarat_dan_ketentuan'");
  $data_syarat_dan_ketentuan = mysqli_fetch_array($query_syarat_dan_ketentuan);
  $id_syarat_dan_ketentuan = $data_syarat_dan_ketentuan['id_pengaturan'];
  $isi1_syarat_dan_ketentuan = $data_syarat_dan_ketentuan['isi1_pengaturan'];

  $query_responsible_gaming = mysqli_query($koneksi, "SELECT * FROM pengaturan WHERE nama_pengaturan = 'responsible_gaming'");
  $data_responsible_gaming = mysqli_fetch_array($query_responsible_gaming);
  $id_responsible_gaming = $data_responsible_gaming['id_pengaturan'];
  $isi1_responsible_gaming = $data_responsible_gaming['isi1_pengaturan'];
  
  $query_tentang = mysqli_query($koneksi, "SELECT * FROM pengaturan WHERE nama_pengaturan = 'tentang'");
  $data_tentang = mysqli_fetch_array($query_tentang);
  $id_tentang = $data_tentang['id_pengaturan'];
  $isi1_tentang = $data_tentang['isi1_pengaturan'];

  $query_marquee_pengumuman = mysqli_query($koneksi, "SELECT * FROM pengaturan WHERE nama_pengaturan = 'marquee_pengumuman'");
  $data_marquee_pengumuman = mysqli_fetch_array($query_marquee_pengumuman);
  $id_marquee_pengumuman = $data_marquee_pengumuman['id_pengaturan'];
  $isi1_marquee_pengumuman = $data_marquee_pengumuman['isi1_pengaturan'];

  $query_logo = mysqli_query($koneksi, "SELECT * FROM pengaturan WHERE nama_pengaturan = 'logo'");
  $data_logo = mysqli_fetch_array($query_logo);
  $id_logo = $data_logo['id_pengaturan'];
  $isi1_logo = $data_logo['isi1_pengaturan'];

  $query_favicon = mysqli_query($koneksi, "SELECT * FROM pengaturan WHERE nama_pengaturan = 'favicon'");
  $data_favicon = mysqli_fetch_array($query_favicon);
  $id_favicon = $data_favicon['id_pengaturan'];
  $isi1_favicon = $data_favicon['isi1_pengaturan'];

  $query_judul_website = mysqli_query($koneksi, "SELECT * FROM pengaturan WHERE nama_pengaturan = 'judul_website'");
  $data_judul_website = mysqli_fetch_array($query_judul_website);
  $id_judul_website = $data_judul_website['id_pengaturan'];
  $isi1_judul_website = $data_judul_website['isi1_pengaturan'];

  $query_warna_utama = mysqli_query($koneksi, "SELECT * FROM pengaturan WHERE nama_pengaturan = 'warna_utama'");
  $data_warna_utama = mysqli_fetch_array($query_warna_utama);
  $id_warna_utama = $data_warna_utama['id_pengaturan'];
  $isi1_warna_utama = $data_warna_utama['isi1_pengaturan'];

  $query_logo_admin_light = mysqli_query($koneksi, "SELECT * FROM pengaturan WHERE nama_pengaturan = 'logo_admin_light'");
  $data_logo_admin_light = mysqli_fetch_array($query_logo_admin_light);
  $id_logo_admin_light = $data_logo_admin_light['id_pengaturan'];
  $isi1_logo_admin_light = $data_logo_admin_light['isi1_pengaturan'];

  $query_logo_admin_dark = mysqli_query($koneksi, "SELECT * FROM pengaturan WHERE nama_pengaturan = 'logo_admin_dark'");
  $data_logo_admin_dark = mysqli_fetch_array($query_logo_admin_dark);
  $id_logo_admin_dark = $data_logo_admin_dark['id_pengaturan'];
  $isi1_logo_admin_dark = $data_logo_admin_dark['isi1_pengaturan'];

  $query_logo_admin_sm = mysqli_query($koneksi, "SELECT * FROM pengaturan WHERE nama_pengaturan = 'logo_admin_sm'");
  $data_logo_admin_sm = mysqli_fetch_array($query_logo_admin_sm);
  $id_logo_admin_sm = $data_logo_admin_sm['id_pengaturan'];
  $isi1_logo_admin_sm = $data_logo_admin_sm['isi1_pengaturan'];
?>