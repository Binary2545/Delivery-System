<?php
//database conection  file
include('dbconnection.php');
include('./include/header.php');
include('./include/navbar.php');

?>

<link rel="stylesheet" type="text/css" href="csss/jquery.dataTables.min.css">
<link rel="stylesheet" type="text/css" href="csss/buttons.dataTables.min.css">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Kanit:wght@300&display=swap" rel="stylesheet">

<div class="content-body">
    <div class="container-fluid" style="font-family: 'Kanit', sans-serif; font-size:15px">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body" style="overflow-x:auto;">
                        <div class="btn-group" role="group">
                            <button type="button" class="btn mb-1 btn-outline-info dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">สร้างรายการขาย</button>
                            <div class="btn-group" role="group">
                            <button type="button" class="btn mb-1 btn-outline-info dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">สร้างรายการขาย</button>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="income.php">สร้างรายการขาย</a> 
                            </div>
                        </div>
                        <div class="btn-group" role="group">
                            <button type="button" class="btn mb-1 btn-outline-info dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">ดูรายงาน</button>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="income-report.php">รายงานขายทั้งหมด</a>
                                <a class="dropdown-item" href="#">รายงานขายรายวัน</a>
                                <a class="dropdown-item" href="incomenovember-report.php">รายงานขาย พ.ย.</a>
                            </div>
                        </div>
                        <table id="myTable" class="table" style="width: 100%;">
                            <thead>
                                <tr>
                                    <th style="text-align: left;"><span class="badgegreen">วันที่</span></th>
                                    <th style="text-align: left;"><span class="badgegreen">เลขที่ใบขาย</span></th>
                                    <th style="text-align: left;"><span class="badgegreen">รายละเอียดลูกค้า</span></th>
                                    <th style="text-align: left;"><span class="badgegreen">ยอดรวม</span></th>
                                    <th style="text-align: left;"><span class="badgegreen">สถานะการชำระเงิน</span></th>
                                    <th style="text-align: left;"><span class="badgegreen">จัดการ</span></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $ret = mysqli_query($con, "select * from income");
                                $cnt = 1;
                                $row = mysqli_num_rows($ret);
                                if ($row > 0) {
                                    while ($row = mysqli_fetch_array($ret)) {

                                ?>

                                        <!--Fetch the Records -->
                                        <tr>
                                            <td style="text-align: left; font-size: 12;"><?php echo $row['Date']; ?></td>
                                            <td style="text-align: left; font-size: 12;"><a href="income-detail.php?viewid=<?php echo htmlentities($row['ID']); ?>" style="font-size: 15px;"><?php echo $row['INV']; ?>-<?php echo $row['ID']; ?></a>
                                            <td style="text-align: left; font-size: 12;"><?php echo $row['Contact']; ?>
                                            <td style="text-align: left; font-size: 12;"><?php echo $row['Total']; ?>
                                            <td style="text-align: left;"><?php if ($row['Status'] == 'ชำระแล้ว') {
                                                                                echo '<span class="badge badge-pill badge-success">ชำระแล้ว</span>';
                                                                            } else if ($row['Status'] == 'รอชำระเงิน') {
                                                                                echo '<span class="badge badge-pill badge-warning">รอชำระเงิน</span>';
                                                                            } else if ($row['Status'] == 'ชำระบางส่วน') {
                                                                                echo '<span class="badge badge-pill badge-secondary">ชำระบางส่วน</span>';
                                                                            } else if ($row['Status'] == 'เก็บเงินปลายทาง') {
                                                                                echo '<span class="badge badge-pill badge-info">COD</span>';
                                                                            } else if ($row['Status'] == 'ส่งเปลี่ยน') {
                                                                                echo '<span class="badge badge-pill badge-dark">ส่งเปลี่ยน</span>';
                                                                            } else if ($row['Status'] == 'โอนคืนร้านแมน') {
                                                                                echo '<span class="badge badge-pill badge-danger">โอนคืนร้านแมน</span>';
                                                                            } ?></span></td>
                                            <td>
                                                <div class="btn-group" role="group">
                                                    <button type="button" class="btn mb-1 btn-info dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">ตัวเลือก</button>
                                                    <div class="dropdown-menu" style="font-size: 12px;">
                                                        <a class="dropdown-item" href="income-detail.php?viewid=<?php echo htmlentities($row['ID']); ?>">รายละเอียด</a>
                                                        <a class="dropdown-item" href="income-edit.php?editid=<?php echo htmlentities($row['ID']); ?>">แก้ไขรายการ</a>
                                                        <a class="dropdown-item" href="income-payment.php?payid=<?php echo htmlentities($row['ID']); ?>">สร้างการชำระเงิน</a>
                                                        <a class="dropdown-item" href="cashsale-add.php?chsid=<?php echo htmlentities($row['ID']); ?>">สร้างใบเสร็จรับเงิน</a>

                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php
                                        $cnt = $cnt + 1;
                                    }
                                } else { ?>
                                    <tr>
                                        <th style="text-align:center; color:red;" colspan="6">No Record Found</th>
                                    </tr>
                                <?php } ?>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- #/ container -->
</div>


<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<script>
    $(document).ready(function() {
        $("#myTable").DataTable({
            "autoWidth": false,
            order: [
                [1, 'desc']
            ],
        })

    });
</script>