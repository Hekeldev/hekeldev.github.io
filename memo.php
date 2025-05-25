<div class="tab-content">
    <div id="memo-tulis" class="tab-pane fade">
        <div class="panel panel-default">
            <div class="panel-heading"><strong><span class="glyphicon glyphicon-tasks"></span>Tulis</strong></div>
            <div class="panel-body">
                <form class="form-group-sm tulis_form" method="post">
                    <table class="table table-striped form-group-sm" style="margin-bottom:0px">
                        <tbody>
                            <tr>
                                <td style="width:150px">Subject</td>
                                <td>
                                    <select class="form-control tulis_subject" name="subject">
                                        <option value="">Pilih Subject</option>
                                        <option value="Perihal Member Baru">Perihal Member Baru</option>
                                        <option value="Perihal Deposit">Perihal Deposit</option>
                                        <option value="Perihal Withdraw">Perihal Withdraw</option>
                                        <option value="Masalah Umum">Masalah Umum</option>
                                        <option value="Perubahan Data">Perubahan Data</option>
                                        <option value="Pengaduan Layanan">Pengaduan Layanan</option>
                                        <option value="Lain-lain">Lain-lain</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td>Memo</td>
                                <td><textarea class="tulis_memo" style="height:100px" name="memo"></textarea></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td><input type="button" class="form-control btn btn-info kirim" value="Kirim" style="width:200px">
                                    <input type="hidden" name="task" value="tulis">
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </form>
            </div>
        </div>
    </div>
    <div id="memo-inbox" class="tab-pane fade in active">
        <div class="panel panel-default">
            <div class="panel-heading"><strong><span class="glyphicon glyphicon-tasks"></span>Memo</strong></div>
            <div class="panel-body">

                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Date</th>
                            <th>Subject</th>

                            <th></th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
        <ul class="pagination"></ul>
        <script>
            $(document).ready(function() {
                $('[data-toggle="tooltip"]').tooltip();
            });
        </script>
    </div>
    <div id="memo-sent" class="tab-pane fade">
        <div class="panel panel-default">
            <div class="panel-heading"><strong><span class="glyphicon glyphicon-tasks"></span>Memo</strong></div>
            <div class="panel-body">

                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Date</th>
                            <th>Subject</th>

                            <th></th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
        <ul class="pagination"></ul>
        <script>
            $(document).ready(function() {
                $('[data-toggle="tooltip"]').tooltip();
            });
        </script>
    </div>
</div>