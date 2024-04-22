<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/modern-css-reset/dist/reset.min.css" />

<?php
//Databse Connection file
include('dbconnection.php');
include('./include/header.php');
include('./include/navbar.php');

?>

<link rel="stylesheet" type="text/css" href="csss/jquery.dataTables.min.css">
<link rel="stylesheet" type="text/css" href="csss/buttons.dataTables.min.css">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Kanit:wght@300&display=swap" rel="stylesheet">



<?php
if (isset($_POST['submit'])) {
	//getting the post values
	$date = $_POST['date'];
	$inv = $_POST['inv'];
	$sale = $_POST['sale'];
	$chanel = $_POST['chanel'];
	$name = $_POST['name'];
	$phone = $_POST['phone'];
	$contact = $_POST['contact'];
	$product = $_POST['product'];
	$code = $_POST['code'];
	$qty = $_POST['qty'];
	$price = $_POST['price'];
	$product2 = $_POST['product2'];
	$code2 = $_POST['code2'];
	$qty2 = $_POST['qty2'];
	$price2 = $_POST['price2'];
	$product3 = $_POST['product3'];
	$code3 = $_POST['code3'];
	$qty3 = $_POST['qty3'];
	$price3 = $_POST['price3'];
	$costpay = $_POST['costpay'];
	$costfee = $_POST['costfee'];
	$type = $_POST['type'];
	$total = $_POST['total'];
	$status = $_POST['status'];
	$payment = $_POST['payment'];
	$paymentsec = $_POST['paymentsec'];
	$discount = $_POST['discount'];
	$profit = $_POST['profit'];
	$other = $_POST['other'];
	$confirm = $_POST['confirm'];
	$ppic = $_FILES["profilepic"]["name"];
	// get the image extension
	$extension = substr($ppic, strlen($ppic) - 4, strlen($ppic));
	// allowed extensions
	$allowed_extensions = array(".jpg", "jpeg", ".png", ".PNG", ".gif");
	// Validation for allowed extensions .in_array() function searches an array for a specific value.
	if (!in_array($extension, $allowed_extensions)) {
		echo "<script>alert('Invalid format. Only jpg / jpeg/ png /gif format allowed');</script>";
	} else {
		//rename the image file
		$imgnewfile = md5($imgfile) . time() . $extension;
		// Code for move image into directory
		move_uploaded_file($_FILES["profilepic"]["tmp_name"], "../profilepics/" . $imgnewfile);
	}

	//----------------------------------------------------------------------------------------#image2


	// Query for data insertion
	$query = mysqli_query($con, "insert into income(Date,Sale,INV,Chanel,Name,Phone,Contact,Product,Code,Qty,Price,Product2,Code2,Qty2,Price2,Product3,Code3,Qty3,Price3,Discount,Profit,Costfee,Costpay,Type,Total,Status,Payment,Paymentsec,Other,Confirm,ProfilePic) value('$date','$sale','$inv','$chanel','$name','$phone','$contact','$product','$code','$qty','$price','$product2','$code2','$qty2','$price2','$product3','$code3','$qty3','$price3','$discount','$profit','$costfee','$costpay','$type','$total','$status','$payment','$paymentsec','$other','$confirm','$imgnewfile')");
	if ($query) {
		$_SESSION['success'] = "สร้างการชำระเรียบร้อย";
		echo '<script>
			setTimeout(function() {
			swal({
					title: "สำเร็จ!", 
					text: "สร้างรายการขายเรียบร้อย", 
					type: "success",
					timer: 5000,
					showConfirmButton: true
				}, function(){
					window.location.href = "incomeall-report.php";
					});
			});
		</script>';
	} else {
		echo "<script>alert('Something Went Wrong. Please try again');</script>";
	}
}

?>


<div class="content-body" style="font-family: 'Kanit', sans-serif;">
	<form method="POST" enctype="multipart/form-data">
		<div class="container-fluid">
			<h1 class="card-title">สร้างรายการขาย</h1><br>

			<div class="row">
				<div class="col-lg-6">
					<div class="card">
						<div class="card-body">
							<h4 class="card-title">ข้อมูลการขาย</h4>
							<div class="card-body">
								<div class="row">
									<div class="col-md-12">
										<div class="form-group row">
											<label class="col-lg-3 col-form-label" for="">วันที่ <span class="text-danger">*</span>
											</label>
											<div class="col-lg-9">
												<input type="date" name="date" class="form-control" placeholder="วันที่">
											</div>
										</div>
										<div class="form-group row">
											<label class="col-lg-3 col-form-label" for="">เลขที่ <span class="text-danger">*</span>
											</label>
											<div class="col-lg-9">
												<input type="text" class="form-control" name="inv" value="SO-<?= date("Ymd"); ?>" placeholder="เบอร์โทรติดต่อลูกค้า" required readonly="readonly">
											</div>
										</div>
										<div class="form-group row">

											<label class="col-lg-3 col-form-label" for="">ช่องทาง <span class="text-danger">*</span>
											</label>
											<div class="col-lg-9">
												<input type="text" class="form-control" name="chanel" id="chanel" value="<?= $row['Chanel']; ?>" placeholder="ช่องทางการขาย" required readonly="readonly">
											</div>
										</div>
									</div>
								</div>

							</div>
						</div>
					</div>
				</div>

				<div class="col-lg-6">
					<div class="card">
						<div class="card-body">
							<h4 class="card-title">ข้อมูลลูกค้า</h4>
							<div class="card-body">
								<div class="row">
									<div class="col-md-12">
										<div class="form-group row">
											<label class="col-lg-3 col-form-label" for="">ชื่อติดต่อ <span class="text-danger">*</span>
											</label>
											<div class="col-lg-9">
												<div class="input-group">
													<input type="text" name="name" id="name" required class="form-control" placeholder="ชื่อติดต่อ">
													<div class="input-group-append">
														<button type="button" class="btn btn-secondary" data-toggle="modal" data-target=".bd-example-modal-lg">ค้นหา</button>
													</div>
												</div>
											</div>
										</div>
										<div class="form-group row">
											<label class="col-lg-3 col-form-label" for="">ชื่อจัดส่ง<span class="text-danger">*</span>
											</label>
											<div class="col-lg-9">
												<input type="text" class="form-control" name="contact" id="contact" value="<?= $row['Contact']; ?>" placeholder="ชื่อลูกค้า" required>
											</div>
										</div>
										<div class="form-group row">
											<label class="col-lg-3 col-form-label" for="">เบอร์โทร <span class="text-danger">*</span>
											</label>
											<div class="col-lg-9">
												<input type="text" class="form-control" name="phone" id="phone" value="<?= $row['Phone']; ?>" placeholder="เบอร์โทรติดต่อลูกค้า" required>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-lg-12">
					<div class="card">
						<div class="card-body">
							<h4 class="card-title">รายละเอียดการขาย</h4><br>
							<div class="card-body">
								<div class="row">
									<div class="col-md-12">
										<div class="form-group row">
											<div class="col-lg-3">
												<div class="input-group">
													<input type="text" name="product" id="products" required class="form-control" placeholder="ชื่อสินค้า">
													<div class="input-group-append">
														<button type="button" class="btn btn-secondary" data-toggle="modal" data-target=".bd-example-modal-lg-product">ค้นหา</button>
													</div>
												</div>
											</div>
											<div class="col-lg-3">
												<div class="input-group">
													<input type="text" class="form-control" name="code" id="code" placeholder="รหัสสินค้า" data-role="tagsinput" required>
												</div>
											</div>
											<div class="col-lg-3">
												<input type="text" class="form-control" id="price" name="price" placeholder="ราคาสินค้าต่อหนวย" required>
											</div>
											<div class="col-lg-3">
												<div class="input-group">
													<input type="text" class="form-control" id="qty" name="qty" placeholder="จำนวน" required>
												</div>
											</div>
										</div>
									</div>

									<div class="col-md-12">
										<div class="form-group row">
											<div class="col-lg-3">
												<div class="input-group">
													<input type="text" name="product2" id="products2" class="form-control" placeholder="ชื่อสินค้า">
													<div class="input-group-append">
														<button type="button" class="btn btn-secondary" data-toggle="modal" data-target=".bd-example-modal-lg-product2">ค้นหา</button>
													</div>
												</div>
											</div>
											<div class="col-lg-3">
												<div class="input-group">
													<input type="text" class="form-control" name="code2" id="code2" placeholder="รหัสสินค้า" data-role="tagsinput">
												</div>
											</div>
											<div class="col-lg-3">
												<input type="text" class="form-control" name="price2" id="price2" placeholder="ราคาสินค้าต่อหนวย">
											</div>
											<div class="col-lg-3">
												<div class="input-group">
													<input type="text" class="form-control" name="qty2" id="qty2" placeholder="จำนวน">
												</div>
											</div>
										</div>
									</div>

									<div class="col-md-12" style="border-bottom: 1px solid black;">
										<div class="form-group row">
											<div class="col-lg-3">
												<div class="input-group">
													<input type="text" name="product3" id="products3" class="form-control" placeholder="ชื่อสินค้า">
													<div class="input-group-append">
														<button type="button" class="btn btn-secondary" data-toggle="modal" data-target=".bd-example-modal-lg-product3">ค้นหา</button>
													</div>
												</div>
											</div>
											<div class="col-lg-3">
												<div class="input-group">
													<input type="text" class="form-control" name="code3" id="code3" placeholder="รหัสสินค้า" data-role="tagsinput">
												</div>
											</div>
											<div class="col-lg-3">
												<input type="text" class="form-control" name="price3" id="price3" placeholder="ราคาสินค้าต่อหนวย">
											</div>
											<div class="col-lg-3">
												<div class="input-group">
													<input type="text" class="form-control" name="qty3" id="qty3" placeholder="จำนวน">
												</div>
											</div>
										</div>
									</div>
									<hr>
									<div class="col-md-12"><br>
										<div class="form-group row">
											<div class="col-lg-3">
											</div>
											<div class="col-lg-3">
											</div>
											<div class="col-lg-3" style="text-align: right;"><br>
												<h5>ส่วนลด</h5>
											</div>
											<div class="col-lg-3">
												<div class="input-group">
													<input type="text" class="form-control" name="discount" id="discount" placeholder="">
												</div>
											</div>
										</div>
									</div>

									<div class="col-md-12">
										<div class="form-group row">
											<div class="col-lg-3">
											</div>
											<div class="col-lg-3">
											</div>
											<div class="col-lg-3" style="text-align: right;"><br>
												<h5>กำไรบวกเพิ่ม</h5>
											</div>
											<div class="col-lg-3">
												<div class="input-group">
													<input type="text" class="form-control" name="profit" id="profit" placeholder="">
												</div>
											</div>
										</div>
									</div>

									<div class="col-md-12">
										<div class="form-group row">
											<div class="col-lg-3">
											</div>
											<div class="col-lg-3">
											</div>
											<div class="col-lg-3" style="text-align: right;"><br>
												<h5>ค่าขนส่ง</h5>
											</div>
											<div class="col-lg-3">
												<div class="input-group">
													<input type="text" class="form-control" name="costpay" id="costpay" placeholder="">
												</div>
											</div>
										</div>
									</div>

									<div class="col-md-12">
										<div class="form-group row">
											<div class="col-lg-3">
											</div>
											<div class="col-lg-3">
											</div>
											<div class="col-lg-3" style="text-align: right;"><br>
												<h5>ค่าCOD</h5>
											</div>
											<div class="col-lg-3">
												<div class="input-group">
													<input type="text" class="form-control" name="costfee" id="costfee" placeholder="">
												</div>
											</div>
										</div>
									</div>

									<div class="col-md-12">
										<div class="form-group row">
											<div class="col-lg-4">
											</div>
											<div class="col-lg-4" style="text-align: right;"><br>
												<h4>ยอดรวมทั้งหมด</h4>
											</div>
											<div class="col-lg-4">
												<div class="input-group">
													<input type="text" class="form-control" name="total" id="total" placeholder="" style="text-align: right;">
												</div>
											</div>
										</div>
									</div>


								</div>
							</div>
						</div>
					</div>
				</div>




				<div class="col-lg-12">
					<div class="card">
						<div class="card-body">
							<h4 class="card-title">การชำระเงิน</h4><br>
							<div class="card-body">
								<div class="row">
									<div class="col-md-6">
										<div class="form-group row">
											<label class="col-lg-4 col-form-label" for="">ประเภทการชำระ <span class="text-danger">*</span>
											</label>
											<div class="col-lg-6">
												<select class="form-control" id="type" name="type" required>
													<option value="">เลือกประเภทการชำระ</option>
													<option value="โอนเงิน">โอนเงิน</option>
													<option value="เงินสด">เงินสด</option>
													<option value="โอนเงิน+เงินสด">โอนเงิน+เงินสด</option>
													<option value="เครดิต">เครดิต</option>
													<option value="COD">COD</option>
													<option value="โอนค่าส่ง+COD">โอนค่าส่ง+COD</option>
												</select>
											</div>
										</div>
										<div class="form-group row">
											<label class="col-lg-4 col-form-label" for="">สถานะการชำระเงิน <span class="text-danger">*</span>
											</label>
											<div class="col-lg-6">
												<select class="form-control" name="status" required>
													<option value="">เลือกสถานะการชำระเงิน</option>
													<option value="ชำระแล้ว">ชำระแล้ว</option>
													<option value="ชำระบางส่วน">ชำระบางส่วน</option>
													<option value="เก็บเงินปลายทาง">COD</option>
													<option value="รอชำระเงิน">รอชำระเงิน</option>
													<option value="ส่งเปลี่ยน">ส่งเปลี่ยน</option>
													<option value="โอนคืนร้านแมน">โอนคืนร้านแมน</option>
													<option value="โอนคืนลูกค้า">โอนคืนลูกค้า</option>
												</select>
											</div>
										</div>
										<div class="form-group row">
											<label class="col-lg-4 col-form-label" for="">วันที่ชำระเงิน ครั้งที่1 <span class="text-danger"></span>
											</label>
											<div class="col-lg-6">
												<input type="date" class="form-control" name="payment" placeholder="วันที่ชำระเงิน">
											</div>
										</div>
										<!--<div class="form-group row">
												<label class="col-lg-4 col-form-label" for="">วันที่ชำระเงิน ครั้งที่2 <span class="text-danger"></span>
												</label>
												<div class="col-lg-6">
													<input type="date" class="form-control" name="paymentsec" placeholder="วันที่ชำระเงิน">
												</div>
											</div>-->


										<!--<div class="form-group row">
												<label class="col-lg-4 col-form-label" for="val-username">หลักฐานการชำระเงิน 2<span class="text-danger">*</span>
												</label>
												<div class="col-lg-4">
													<input type="file" class="form-control" name="second" required><br><br>
												</div>
											</div>-->
									</div>
									<div class="col-md-6">
										<div class="form-group row">
											<label class="col-lg-4 col-form-label" for="">หมายเหตุ <span class="text-danger"></span>
											</label>
											<div class="col-lg-6">
												<textarea class="form-control" name="other" rows="" placeholder="ระบุหมายเหตุ (หากมี)"></textarea>
											</div>
										</div>

										<div class="form-group row">
											<label class="col-lg-4 col-form-label" for="">สถานะการตรวจสอบ<span class="text-danger"></span>
											</label>
											<div class="col-lg-6">
												<select class="form-control" name="confirm">
													<option value="รอการตรวจสอบ">รอการตรวจสอบ</option>
												</select>
											</div>
										</div>
										<div class="form-group row">
											<label class="col-lg-4 col-form-label" for="val-username">หลักฐานการชำระเงิน 1 <span class="text-danger">*</span>
											</label>
											<div class="col-lg-6">
												<input type="file" class="form-control" name="profilepic" required>
											</div>
										</div>
										
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>



		</div>
</div>
<div class="form-group row" style="text-align: center;">
	<div class="col-lg-12 ml-auto">
		<button type="submit" class="btn btn-primary" name="submit">บันทึก</button>
	</div>
</div>
</form>
</div>


<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<a href="./customer/customer.php"><button type="button" class="btn btn-success">เพิ่ม</button></a>
				<button type="button" class="close" data-dismiss="modal"><span>&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<div class="container-fluid">
					<div class="row">
						<div class="col-12">
							<div class="card">
								<div class="card-body">
									<table id="table" class="display nowrap" style="width:100%; overflow-x:auto;">
										<thead>
											<tr>
												<th>ชื่อที่ติดต่อ</th>
												<th>ชื่อจัดส่ง</th>
												<th>เบอร์โทร</th>
												<th>ช่องทาง</th>
											</tr>
										</thead>
										<tbody>
											<?php
											$ret = mysqli_query($con, "select * from customer");
											$cnt = 1;
											$row = mysqli_num_rows($ret);
											if ($row > 0) {
												while ($row = mysqli_fetch_array($ret)) {

											?>

													<!--Fetch the Records -->
													<tr>
														<td><?php echo $row['Name']; ?></td>
														<td><?php echo $row['Contact']; ?></td>
														<td><?php echo $row['Phone']; ?></td>
														<td><?php echo $row['Chanel']; ?></td>

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
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
			</div>
		</div>
	</div>
</div>


<div class="modal fade bd-example-modal-lg-product" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal"><span>&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<div class="container-fluid">
					<div class="row">
						<div class="col-12">
							<div class="card">
								<div class="card-body">
									<table id="product" class="display nowrap" style="width:100%">
										<thead>
											<tr>
												<th>รหัสสินค้า</th>
												<th>ชื่อสินค้า</th>
												<th>ราคาต่อหน่วย</th>
											</tr>
										</thead>
										<tbody>
											<?php
											$con = mysqli_connect("localhost", "bigmanel_pos", "Dr25myuFED", "bigmanel_pos");
											if (mysqli_connect_errno()) {
												echo "Connection Fail" . mysqli_connect_error();
											}
											$ret = mysqli_query($con, "select * from wh_product_list");
											$cnt = 1;
											$row = mysqli_num_rows($ret);
											if ($row > 0) {
												while ($row = mysqli_fetch_array($ret)) {

											?>

													<!--Fetch the Records -->
													<tr>
														<td style="font-size: 12;"><?php echo $row['product_code']; ?></td>
														<td style="font-size: 12;"><?php echo $row['product_name']; ?></td>
														<td style="font-size: 12;"><?php echo $row['product_price']; ?></td>

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
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
			</div>
		</div>
	</div>
</div>

<div class="modal fade bd-example-modal-lg-product2" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal"><span>&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<div class="container-fluid">
					<div class="row">
						<div class="col-12">
							<div class="card">
								<div class="card-body">
									<table id="product2" class="display nowrap" style="width:100%">
										<thead>
											<tr>
												<th>รหัสสินค้า</th>
												<th>ชื่อสินค้า</th>
												<th>ราคาต่อหน่วย</th>
											</tr>
										</thead>
										<tbody>
											<?php
											$con = mysqli_connect("localhost", "bigmanel_pos", "Dr25myuFED", "bigmanel_pos");
											if (mysqli_connect_errno()) {
												echo "Connection Fail" . mysqli_connect_error();
											}
											$ret = mysqli_query($con, "select * from wh_product_list");
											$cnt = 1;
											$row = mysqli_num_rows($ret);
											if ($row > 0) {
												while ($row = mysqli_fetch_array($ret)) {

											?>

													<!--Fetch the Records -->
													<tr>
														<td style="font-size: 12;"><?php echo $row['product_code']; ?></td>
														<td style="font-size: 12;"><?php echo $row['product_name']; ?></td>
														<td style="font-size: 12;"><?php echo $row['product_price']; ?></td>

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
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
			</div>
		</div>
	</div>
</div>

<div class="modal fade bd-example-modal-lg-product3" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal"><span>&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<div class="container-fluid">
					<div class="row">
						<div class="col-12">
							<div class="card">
								<div class="card-body">
									<table id="product3" class="display nowrap" style="width:100%">
										<thead>
											<tr>
												<th>รหัสสินค้า</th>
												<th>ชื่อสินค้า</th>
												<th>ราคาต่อหน่วย</th>
											</tr>
										</thead>
										<tbody>
											<?php
											$con = mysqli_connect("localhost", "bigmanel_pos", "Dr25myuFED", "bigmanel_pos");
											if (mysqli_connect_errno()) {
												echo "Connection Fail" . mysqli_connect_error();
											}
											$ret = mysqli_query($con, "select * from wh_product_list");
											$cnt = 1;
											$row = mysqli_num_rows($ret);
											if ($row > 0) {
												while ($row = mysqli_fetch_array($ret)) {

											?>

													<!--Fetch the Records -->
													<tr>
														<td style="font-size: 12;"><?php echo $row['product_code']; ?></td>
														<td style="font-size: 12;"><?php echo $row['product_name']; ?></td>
														<td style="font-size: 12;"><?php echo $row['product_price']; ?></td>

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
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
			</div>
		</div>
	</div>
</div>


<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<script>
	$(document).ready(function() {
		$("#product").DataTable({
			"autoWidth": false
		})

	});
</script>

<script>
	$(document).ready(function() {
		$("#product2").DataTable({
			"autoWidth": false
		})

	});
</script>

<script>
	$(document).ready(function() {
		$("#product3").DataTable({
			"autoWidth": false
		})

	});
</script>

<script>
	$(document).ready(function() {
		$("#table").DataTable({
			"autoWidth": false
		})

	});
</script>


<script>
	$(document).ready(function() {
		// Get value on keyup funtion
		$("#price, #qty,#price2, #qty2,#price3, #qty3, #discount, #profit, #costpay, #costfee").keyup(function() {

			var total = 0;
			var a = Number($("#qty").val());
			var b = Number($("#price").val());
			var c = Number($("#qty2").val());
			var d = Number($("#price2").val());
			var e = Number($("#qty3").val());
			var f = Number($("#price3").val());
			var g = Number($("#discount").val());
			var h = Number($("#profit").val());
			var i = Number($("#costpay").val());
			var j = Number($("#costfee").val());
			var total = (a * b) + (c * d) + (e * f) - g + h + i + j

			$('#total').val(total);

		});
	});
</script>

<script>
	var table = document.getElementById('table');

	for (var i = 1; i < table.rows.length; i++) {
		table.rows[i].onclick = function() {
			//rIndex = this.rowIndex;

			document.getElementById("name").value = this.cells[0].innerHTML;
			document.getElementById("contact").value = this.cells[1].innerHTML;
			document.getElementById("phone").value = this.cells[2].innerHTML;
			document.getElementById("chanel").value = this.cells[3].innerHTML;
		};
	}
</script>

<script>
	var table = document.getElementById('product');

	for (var i = 1; i < table.rows.length; i++) {
		table.rows[i].onclick = function() {
			//rIndex = this.rowIndex;
			document.getElementById("code").value = this.cells[0].innerHTML;
			document.getElementById("products").value = this.cells[1].innerHTML;
			document.getElementById("price").value = this.cells[2].innerHTML;
		};
	}
</script>
<script>
	var table = document.getElementById('product2');

	for (var i = 1; i < table.rows.length; i++) {
		table.rows[i].onclick = function() {
			//rIndex = this.rowIndex;
			document.getElementById("code2").value = this.cells[0].innerHTML;
			document.getElementById("products2").value = this.cells[1].innerHTML;
			document.getElementById("price2").value = this.cells[2].innerHTML;
		};
	}
</script>
<script>
	var table = document.getElementById('product3');

	for (var i = 1; i < table.rows.length; i++) {
		table.rows[i].onclick = function() {
			//rIndex = this.rowIndex;
			document.getElementById("code3").value = this.cells[0].innerHTML;
			document.getElementById("products3").value = this.cells[1].innerHTML;
			document.getElementById("price3").value = this.cells[2].innerHTML;
		};
	}
</script>