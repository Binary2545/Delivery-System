<?php
//Databse Connection file
include('../../dbconnection.php');
//Code for deletion
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<!--  This file has been downloaded from bootdey.com @bootdey on twitter -->
	<!--  All snippets are MIT license http://bootdey.com/license -->
	<title>ใบจัดส่งสินค้า</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- CSS only -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
	<!-- JavaScript Bundle with Popper -->
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</head>

<body>
	<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
	<style type="text/css">
		body {
			margin-top: 20px;
			background: #eee;
			font-family: 'Sarabun', sans-serif;
		}
	</style>

	<script type="text/javascript">

	</script>
	<div class="container-fluid">
		<div class="row">
        
				<div class="col-sm-12">
					<div class="panel panel-default invoice" id="invoice">
						<div class="panel-body">
							<!--<div class="invoice-ribbon">
								<div class="ribbon-inner"><?php echo $row['Status']; ?></div>
							</div>-->
							<div class="row">

                                <div class="col-sm-4 top-left">
                                    <div class="col-lg-12">
										<p style="font-size: 13px">บริษัท บิ๊กแมน อิเล็กทรอนิค จำกัด
                                        <br>190/19 หมู่ที่ 5 ตำบลรัษฎา อำเภอเมืองภูเก็ต จังหวัดภูเก็ต 83000
                                        <br>เลขประจำตัวผู้เสียภาษี 0835563003372
                                        <br>เบอร์ติดต่อ 095-449-6141
                                        <br>อีเมล์ Bigman.etn4289@gmail.com</p>
									</div>
								</div>
								<div class="col-sm-4 top-center">
									<h3 style="text-align:center"><img onclick="window.print()" src="logo.png" alt="" style="width: 120px;"></h3>
								</div>

								<div class="col-sm-4 top-right">
                                    <h3 class="marginright">ใบงานรับ/ส่ง สินค้า
                                        <br><?php echo date("d/m/y") ?>
                                    </h3>
								</div>

							</div>
							<hr>
						
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="zero_config" class="table table-striped table-bordered">
                                        <thead>
                                           <tr>
                                                <th>ลำดับที่</th>
                                                <th>Job No.</th>
                                                <th>ประเภท</th>
                                                <th>สถานะ</th>
                                                <th>วันที่ลงคิว</th>
                                                <th>ชื่อลูกค้า</th>
                                                <th>เขตพื้นที่ส่ง</th>
                                                <th>รายการสินค้า</th>
                                                <th>จำนวนสินค้า</th>
                                                <th>ผู้ลงคิว</th>
                                                <th>หมายเหตุ</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                    $ret = mysqli_query($con, "select * from delivery WHERE Cstatus='รอ รับ/ส่ง สินค้า' ORDER BY ID DESC");
                                    $cnt = 1;
                                    $row = mysqli_num_rows($ret);
                                    if ($row > 0) {
                                        while ($row = mysqli_fetch_array($ret)) {

                                    ?>
                                            <tr>
                                                <td></td>
                                                <td><?php echo $row['Job']; ?></td>
                                                <td><span><?php if ($row['Type'] == 'รับสินค้า') {
                                                        echo '<p style="color:green">รับสินค้า</p>';
                                                    } else if ($row['Type'] == 'ส่งสินค้า') {
                                                        echo '<p style="color:red">ส่งสินค้า</p>';
                                                    } else if ($row['Type'] == 'รับ/ส่งสินค้า') {
                                                        echo '<p style="color:blue">รับ/ส่งสินค้า</p>';
                                                    } else if ($row['Type'] == 'ตรวจเช็คหน้างาน') {
                                                        echo '<p style="color:gray">ตรวจเช็คหน้างาน</p>';
                                                    } ?></span></td>
                                                <td><span><?php if ($row['Cstatus'] == 'ลงคิว') {
                                                        echo 'ลงคิว';
                                                    } else if ($row['Cstatus'] == 'รอ รับ/ส่ง สินค้า') {
                                                        echo 'รอ รับ/ส่ง สินค้า';
                                                    } else if ($row['Cstatus'] == 'Complete') {
                                                        echo 'Complete';
                                                    } else if ($row['Cstatus'] == 'ตรวจเช็คหน้างาน') {
                                                        echo 'ตรวจเช็คหน้างาน';
                                                    }?></span></td>
                                                <td><?php echo $row['Queuedate']; ?></td>
                                                <td><?php echo $row['Cname']; ?></td>
                                                <td><?php echo $row['Clocation']; ?></a></td>
                                                <td><?php echo $row['Item']; ?></td>
                                                <td><?php echo $row['Qty']; ?></td>
                                                <td><?php echo $row['Staff']; ?></td>
                                                <td><?php echo $row['Other']; ?></td>
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

</body>

</html>