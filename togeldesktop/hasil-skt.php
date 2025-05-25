<?php

// Tanggal saat ini
$today = date('Y-m-d');
$minnol = date('Y-m-d', strtotime($today . ''));
$minsatu = date('Y-m-d', strtotime($today . ' -1 day'));
$mindua = date('Y-m-d', strtotime($today . ' -2 days'));
$mintiga = date('Y-m-d', strtotime($today . ' -3 days'));
$minempat = date('Y-m-d', strtotime($today . ' -4 days'));
$minlima = date('Y-m-d', strtotime($today . ' -5 days'));
$minenam = date('Y-m-d', strtotime($today . ' -6 days'));
$mintujuh = date('Y-m-d', strtotime($today . ' -7 days'));
$mindelapan = date('Y-m-d', strtotime($today . ' -8 days'));
$minsembilan = date('Y-m-d', strtotime($today . ' -9 days'));
$minsepuluh = date('Y-m-d', strtotime($today . ' -10 days'));


// ... dan seterusnya

// Fungsi untuk mengubah format tanggal menjadi "Hari"
function formatHari($tanggal)
{
    $hari = date('l', strtotime($tanggal)); // Ambil hari dalam bahasa Inggris (e.g., Sunday, Monday, dst.)
    $hariIndonesia = array(
        'Sunday' => 'Minggu',
        'Monday' => 'Senin',
        'Tuesday' => 'Selasa',
        'Wednesday' => 'Rabu',
        'Thursday' => 'Kamis',
        'Friday' => 'Jumat',
        'Saturday' => 'Sabtu'
    );
    return $hariIndonesia[$hari];
}
?>

<div class="content-area">
    <div id="content" class="content-box">

        <div class="panel panel-danger panelbg">
            <div class="panel-body">
                <div>
                    <div style="display: flex; gap: 8px; font-size: 1.5rem; font-weight: bold; margin-bottom: 8px"><i class="bi bi-hdd-stack-fill"></i>
                        <div>Hasil Keluaran</div>
                    </div>
                </div>
                <div class="contentbox">
                    <div style="margin-bottom:10px;">
                        <span class="text-warning" style="font-weight:bold; font-size:1.5rem">SAKA TOTO</span>
                        <span style="margin-left:10px;"> <span class="text-info">Website: </span><a href="http://www.sakatoto.com" target="_blank">www.sakatoto.com</a><span class="text-info">, Hari: </span>Setiap Hari<span class="text-info">, Tutup: </span>21:30 WIB<span class="text-info">, Result: </span>22:00 WIB</span>
                    </div>
                    <table class="table table-striped">
                        <thead>
                            <tr style="background: transparent">
                                <th>No</th>
                                <th>Tanggal</th>
                                <th>Hari</th>
                                <th>Pasaran</th>
                                <th>Result</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="text-secondary" style="vertical-align:middle;">1</td>
                                <td class="text-success" style="vertical-align:middle;"><?php echo $minnolFormatted ?></td>
                                <td class="text-success" style="vertical-align:middle;"><?php echo formatHari($minnol); ?></td>
                                <td class="text-info" style="vertical-align:middle;">SKT - 983</td>
                                <td style="vertical-align:middle;"><strong>4633</strong></td>
                            </tr>
                            <tr>
                                <td class="text-secondary" style="vertical-align:middle;">2</td>
                                <td class="text-success" style="vertical-align:middle;"><?php echo $minsatuFormatted ?></td>
                                <td class="text-success" style="vertical-align:middle;"><?php echo formatHari($minsatu); ?></td>
                                <td class="text-info" style="vertical-align:middle;">SKT - 982</td>
                                <td style="vertical-align:middle;"><strong>9150</strong></td>
                            </tr>
                            <tr>
                                <td class="text-secondary" style="vertical-align:middle;">3</td>
                                <td class="text-success" style="vertical-align:middle;"><?php echo $minduaFormatted ?></td>
                                <td class="text-success" style="vertical-align:middle;"><?php echo formatHari($mindua); ?></td>
                                <td class="text-info" style="vertical-align:middle;">SKT - 981</td>
                                <td style="vertical-align:middle;"><strong>2318</strong></td>
                            </tr>
                            <tr>
                                <td class="text-secondary" style="vertical-align:middle;">4</td>
                                <td class="text-success" style="vertical-align:middle;"><?php echo $mintigaFormatted ?></td>
                                <td class="text-success" style="vertical-align:middle;"><?php echo formatHari($mintiga); ?></td>
                                <td class="text-info" style="vertical-align:middle;">SKT - 980</td>
                                <td style="vertical-align:middle;"><strong>2668</strong></td>
                            </tr>
                            <tr>
                                <td class="text-secondary" style="vertical-align:middle;">5</td>
                                <td class="text-success" style="vertical-align:middle;"><?php echo $minempatFormatted ?></td>
                                <td class="text-success" style="vertical-align:middle;"><?php echo formatHari($minempat); ?></td>
                                <td class="text-info" style="vertical-align:middle;">SKT - 979</td>
                                <td style="vertical-align:middle;"><strong>0381</strong></td>
                            </tr>
                            <tr>
                                <td class="text-secondary" style="vertical-align:middle;">6</td>
                                <td class="text-success" style="vertical-align:middle;"><?php echo $minlimaFormatted ?></td>
                                <td class="text-success" style="vertical-align:middle;"><?php echo formatHari($minlima); ?></td>
                                <td class="text-info" style="vertical-align:middle;">SKT - 978</td>
                                <td style="vertical-align:middle;"><strong>9128</strong></td>
                            </tr>
                            <tr>
                                <td class="text-secondary" style="vertical-align:middle;">7</td>
                                <td class="text-success" style="vertical-align:middle;"><?php echo $minenamFormatted ?></td>
                                <td class="text-success" style="vertical-align:middle;"><?php echo formatHari($minenam); ?></td>
                                <td class="text-info" style="vertical-align:middle;">SKT - 977</td>
                                <td style="vertical-align:middle;"><strong>0634</strong></td>
                            </tr>
                            <tr>
                                <td class="text-secondary" style="vertical-align:middle;">8</td>
                                <td class="text-success" style="vertical-align:middle;"><?php echo $mintujuhFormatted ?></td>
                                <td class="text-success" style="vertical-align:middle;"><?php echo formatHari($mintujuh); ?></td>
                                <td class="text-info" style="vertical-align:middle;">SKT - 976</td>
                                <td style="vertical-align:middle;"><strong>5515</strong></td>
                            </tr>
                            <tr>
                                <td class="text-secondary" style="vertical-align:middle;">9</td>
                                <td class="text-success" style="vertical-align:middle;"><?php echo $mindelapanFormatted ?></td>
                                <td class="text-success" style="vertical-align:middle;"><?php echo formatHari($mindelapan); ?></td>
                                <td class="text-info" style="vertical-align:middle;">SKT - 975</td>
                                <td style="vertical-align:middle;"><strong>9767</strong></td>
                            </tr>
                            <tr>
                                <td class="text-secondary" style="vertical-align:middle;">10</td>
                                <td class="text-success" style="vertical-align:middle;"><?php echo $minsembilanFormatted ?></td>
                                <td class="text-success" style="vertical-align:middle;"><?php echo formatHari($minsembilan); ?></td>
                                <td class="text-info" style="vertical-align:middle;">SKT - 974</td>
                                <td style="vertical-align:middle;"><strong>2352</strong></td>
                            </tr>
                        </tbody>
                    </table>

                </div>
            </div>
        </div>


    </div>
</div>