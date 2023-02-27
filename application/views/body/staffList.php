<body class="animsition">
    <div class="page-wrapper">
        <!-- HEADER MOBILE-->
        <header class="header-mobile d-block d-lg-none">
            <div class="header-mobile__bar">
                <div class="container-fluid">
                    <div class="header-mobile-inner">
                        <button class="hamburger hamburger--slider" type="button">
                            <span class="hamburger-box">
                                <span class="hamburger-inner"></span>
                            </span>
                        </button>
                    </div>
                </div>
            </div>
            <nav class="navbar-mobile">
                <div class="container-fluid">
                    <ul class="navbar-mobile__list list-unstyled">
						<li class="active">
                            <a href="<?=base_url('/index.php/vital/main')?>">
                                <i class="fas fa-clock"></i>ประวัติ</a>
                        </li>
						<li class="has-sub">
                            <a class="js-arrow open" href="#">
                                <i class="far fa-clipboard"></i>การจัดการ</a>
                            <ul class="navbar-mobile-sub__list list-unstyled js-sub-list" style="display: block;">
                                <li class="active">
                                    <a href="<?=base_url('/index.php/management/stafflist')?>">รายชื่อเจ้าหน้าที่</a>
                                </li>
                                <li>
                                    <a href="<?=base_url('/index.php/management/devicelist')?>">อุปกรณ์</a>
                                </li>
                                <li>
                                    <a href="<?=base_url('/index.php/management/admin')?>">ผู้ดูแลระบบ</a>
                                </li>
                            </ul>
                        </li>
                        <?php if($_SESSION["userLevel"]=="ROOT_USER"){?>
                        <li>
                            <a href="<?=base_url('/index.php/setting')?>">
                                <i class="fas fa-cog"></i>ตั้งค่า</a>
                        </li>
						<?php } ?>
                    </ul>
                </div>
            </nav>
        </header>
        <!-- END HEADER MOBILE-->

        <!-- MENU SIDEBAR-->
        <aside class="menu-sidebar d-none d-lg-block">
			<div class="logo">
                <img src="<?php echo base_url() ?>assets/images/logo_moph_white.png" alt="banner" width="80%" />
            </div>
            <div class="menu-sidebar__content js-scrollbar1">
                <nav class="navbar-sidebar">
                    <ul class="list-unstyled navbar__list">
						<li>
                            <a href="<?=base_url('/index.php/vital/main')?>">
                                <i class="fas fa-clock"></i>ประวัติ</a>
						</li>
						<li class="has-sub" >
                            <a class="js-arrow open" href="#">
                                <i class="far fa-clipboard"></i>การจัดการ</a>
                            <ul class="navbar-mobile-sub__list list-unstyled js-sub-list" style="display: block;">
                                <li class="active">
                                    <a href="<?=base_url('/index.php/management/stafflist')?>">รายชื่อเจ้าหน้าที่</a>
                                </li>
                                <li>
                                    <a href="<?=base_url('/index.php/management/devicelist')?>">อุปกรณ์</a>
                                </li>
                                <li>
                                    <a href="<?=base_url('/index.php/management/admin')?>">ผู้ดูแลระบบ</a>
                                </li>
                            </ul>
                        </li>
                        <?php if($_SESSION["userLevel"]=="ROOT_USER"){?>
                        <li>
                            <a href="<?=base_url('/index.php/setting')?>">
                                <i class="fas fa-cog"></i>ตั้งค่า</a>
                        </li>
						<?php } ?>
                    </ul>
                </nav>
            </div>
        </aside>
        <!-- END MENU SIDEBAR-->

        <!-- PAGE CONTAINER-->
        <div class="page-container">
            <!-- HEADER DESKTOP-->
            <header class="header-desktop">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
						<div class="dropdown" align="right">
							<a class="btn btn-logout dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								ผู้ใช้งาน: <?php echo $_SESSION["userName"]?>
							</a>

							<div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
								<a class="dropdown-item" href="<?php echo base_url('index.php/login/logout')?>">Logout</a>
							</div>
						</div>
                    </div>
                </div>
            </header>
            <!-- END HEADER DESKTOP-->

            <!-- MAIN CONTENT-->
            <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row m-t-30">
                            <div class="col-md-12">
                                <!-- DATA TABLE-->
								<div class="col-md-12">
                        			<div class="row m-t-30">
										<div class="col-md-6">
											<h3 class="title-3 m-b-30"><b>รายชื่อเจ้าหน้าที่</b></h3>
										</div>
										<div class="col-md-6" align="right">
											<button class="role member" onclick="addStaff()"><i class="fas fa-plus-circle"></i>&nbsp;เพิ่มเจ้าหน้าที่</button>
										</div>
                        			</div>
								</div>
                                <div class="table-responsive m-b-40">
                                    <table class="table table-borderless table-data3" id="tbStaffHead">
                                        <thead>
                                            <tr>
                                                <th>ชื่อ-นามสกุล</th>
												<th style="font-size:16px; vertical-align:middle; text-align:left; width: 20%">เลขประจำตัวประชาชน</th>
                                                <th style="font-size:16px; vertical-align:middle; text-align:left; width: 30%">สังกัด</th>
                                                <th style="font-size:16px; vertical-align:middle; text-align:left">ใช้งานล่าสุด</th>
                                                <th>operate</th>
                                            </tr>
                                        </thead>
                                        <tbody id="tbStaff">
                                        </tbody>
									</table>
                                </div>
                                <!-- END DATA TABLE-->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

	</div>
	<div id="modalAdd" class="modal fade">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h3 class="modal-title">เพิ่มเจ้าหน้าที่</h3>
				</div>
				<div class="modal-body">
					<form role="form" method="POST" action="" id="formAddStaff">
						<input type="hidden" name="volunteerId" value="">
						<div class="form-group">
							<label class="control-label">ชื่อ</label><span style="color:red"> *</span>
							<div>
								<input type="text" class="form-control input-lg" name="firstName" value="">
							</div>
						</div>
						<div class="form-group">
							<label class="control-label">นามสกุล</label><span style="color:red"> *</span>
							<div>
								<input type="text" class="form-control input-lg" name="lastName" value="">
							</div>
						</div>
						<div class="form-group" id="divCid">
							<label class="control-label">เลขประจำตัวประชาชน</label><span style="color:red"> *</span>
							<div>
								<input type="number" class="form-control input-lg no-spin" name="cid" value="" maxlength="13">
							</div>
						</div>
						<div class="form-group">
							<label class="control-label">จังหวัด</label><span style="color:red"> *</span>
							<div>
								<select name="provinceId" class="custom-select" style="width:100%" onchange="getDistrict()">
									<option value="">กรุณาเลือกจังหวัด</option>
								<?php 
									foreach($provinceList['data'] as $i=>$val){
								?>
									<option value="<?php echo $val['provinceId']?>"><?php echo $val['provinceValue']?></option>
								<?php
									}
								?>
                                </select>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label">อำเภอ</label><span style="color:red"> *</span>
							<div>
								<select name="districtId" class="custom-select" style="width:100%" onchange="getSubDistrict()">
									<option value="">กรุณาเลือกอำเภอ</option>
                                </select>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label">ตำบล</label><span style="color:red"> *</span>
							<div>
								<select name="subDistrictId" class="custom-select" style="width:100%" onchange="getHospital()">
									<option value="">กรุณาเลือกตำบล</option>
                                </select>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label">โรงพยาบาล</label><span style="color:red"> *</span>
							<div>
								<select name="hospId" class="custom-select" style="width:100%" onchange="getDevice()">
									<option value="">กรุณาเลือกโรงพยาบาล</option>
                                </select>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label">เบอร์โทรศัพท์</label>
							<div>
								<input type="text" class="form-control input-lg" name="mobileNo" value="">
							</div>
						</div>
						<div class="form-group">
							<label class="control-label">เครื่องอ่านบัตร</label><span style="color:red"> *</span>
							<div>
								<select name="deviceId" class="custom-select" style="width:100%">
									<option value="">กรุณาเลือกอุปกรณ์</option>
                                </select>
							</div>
						</div>
						<div class="form-group">
							<div style="display: flex;align-items: center;flex-direction: column;" >
								<button type="button" onclick="saveStaff();" class="btn btn-success">
									บันทึกข้อมูล
								</button>
							</div>
						</div>
					</form>
				</div>
			</div><!-- /.modal-content -->
		</div><!-- /.modal-dialog -->
	</div><!-- /.modal -->

    <!-- Jquery JS-->
    <script src="<?php echo base_url() ?>assets/vendor/jquery-3.2.1.min.js"></script>
    <!-- Bootstrap JS-->
    <script src="<?php echo base_url() ?>assets/vendor/bootstrap-4.1/popper.min.js"></script>
    <script src="<?php echo base_url() ?>assets/vendor/bootstrap-4.1/bootstrap.min.js"></script>
    <!-- Vendor JS       -->
    <script src="<?php echo base_url() ?>assets/vendor/slick/slick.min.js">
    </script>
    <script src="<?php echo base_url() ?>assets/vendor/wow/wow.min.js"></script>
    <script src="<?php echo base_url() ?>assets/vendor/animsition/animsition.min.js"></script>
    <script src="<?php echo base_url() ?>assets/vendor/bootstrap-progressbar/bootstrap-progressbar.min.js">
    </script>
    <script src="<?php echo base_url() ?>assets/vendor/counter-up/jquery.waypoints.min.js"></script>
    <script src="<?php echo base_url() ?>assets/vendor/counter-up/jquery.counterup.min.js">
    </script>
    <script src="<?php echo base_url() ?>assets/vendor/circle-progress/circle-progress.min.js"></script>
    <script src="<?php echo base_url() ?>assets/vendor/perfect-scrollbar/perfect-scrollbar.js"></script>
    <script src="<?php echo base_url() ?>assets/vendor/chartjs/Chart.bundle.min.js"></script>
	<script src="<?php echo base_url() ?>assets/vendor/select2/select2.min.js"></script>
	<script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
	<script src="https://cdn.datatables.net/1.10.23/js/dataTables.bootstrap4.min.js"></script>

	<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <!-- Main JS-->
	<script src="<?php echo base_url() ?>assets/js/main.js"></script>
	<script type="text/javascript">
		var allStaff = new Array();
		var selectedStaff = "";

		function reDate(date, useTime){
			var monthTH = new Array("", "ม.ค.", "ก.พ.", "มี.ค.", "เม.ย.", "พ.ค.", "มิ.ย." ,"ก.ค." ,"ส.ค.", "ก.ย.", "ต.ค.", "พ.ย.", "ธ.ค.")
			if(useTime === undefined) {
				useTime = "F";
			}
			var retDateTime = "";
			var thisDateTime = date.split(" ");
			var thisDate = thisDateTime[0].split("-");
			var month = monthTH[(thisDate[1]- -0)];
			if(useTime=="T"){
				var thisTime = thisDateTime[1].split(":");
				retDateTime = thisDate[0]- -0 + " " + month + " " + ((thisDate[2]- -0) + 543) + '</b></br>' + thisTime[0] + ":" + thisTime[1] + " น.";
			}else{
				retDateTime = thisDate[0]- -0 + " " + month + " " + ((thisDate[2] - -0) + 543);
			}
			return retDateTime;
		}

        function loadStaff(){
			var table = document.all.tbStaff;
			table.innerHTML = '';
            var thisUrl = "<?=base_url('/index.php/management/getstafflist/')?>";
            $.ajax({
                url: thisUrl,
                success: function (response) {
					var response = JSON.parse(response);
					var data = response["data"]["volunteerList"];
					if(response["code"]=="0000"){
						for(var i = 0; i<data.length; i++){
							console.log(data[i]);
							allStaff[data[i]['volunteerId']] = data[i];
							var lastLogin = data[i]['lastLogin'] ? reDate(data[i]['lastLogin'], 'T') : "ไม่มีการเข้าใช้งาน"
							table.innerHTML += '<tr>'+
											'<td vertical-align:middle; text-align:left; width: 20%"><b>'+data[i]['firstName'] + " " + data[i]['lastName'] +'</b></td>'+
											'<td vertical-align:middle; text-align:center; width: 20%>'+data[i]['cid']+'</td>'+
											'<td vertical-align:middle; text-align:left; width: 30%">'+data[i]['hospName']+' ('+data[i]['hospId']+')</td>'+
											'<td style="font-size:16px; vertical-align:middle; text-align:left; width: 15%"><b>'+lastLogin+'</td>'+
											'<td>'+
											'<div class="table-data-feature">'+
												'<button class="item" data-toggle="tooltip" data-placement="top" title="Edit" onclick="editStaff('+"'"+data[i]['volunteerId']+"'"+')">'+
                                                	'<i class="zmdi zmdi-edit"></i>'+
                                                '</button>'+
                                                '<button class="item" data-toggle="tooltip" data-placement="top" title="Delete"onclick="deleteStaff('+"'"+data[i]['volunteerId']+"'"+')">'+
                                                    '<i class="zmdi zmdi-delete"></i>'+
												'</button>'+
											'</div>'+
											'</td>'+
										'</tr>'
						}
						$('#tbStaffHead').DataTable({
							"order": [],
							destroy: true,
							"aoColumns": [
									{ "bSortable": false },
									{ "bSortable": false },
									{ "bSortable": false },
									{ "bSortable": true },
									{ "bSortable": false },
								],
						} );
					}else{
                        table.innerHTML = '';
						swal("ไม่พบข้อมูลผู้ป่วย");		
					}
                }
            });
		}
		function getDistrict(provinceName="", districtName="", subDistrictName="", hospName="", deviceeName=""){
			var provinceId = document.all.provinceId.value;
			if(provinceId!=""){
				var select = document.all.districtId;
				select.innerHTML = '';
				var thisUrl = "<?=base_url('/index.php/management/districtMaster/')?>" + provinceId;
				$.ajax({
					url: thisUrl,
					success: function (response) {
						var response = JSON.parse(response);
						var data = response["data"];
						if(response["code"]=="0000"){
							select.innerHTML += '<option value="">กรุณาเลือกอำเภอ</option>';
							for(var i = 0; i<data.length; i++){
								select.innerHTML += '<option value="'+data[i]["districtId"]+'">'+data[i]["districtValue"]+'</option>';
							}
							if(districtName!="" && subDistrictName!=""){
								var dd = document.all.districtId;
								for (var i = 0; i < dd.options.length; i++) {
									if (dd.options[i].text === districtName) {
										dd.selectedIndex = i;
										getSubDistrict(provinceName, districtName, subDistrictName, hospName, deviceeName)
										break;
									}
								}
							}
						}else{
							select.innerHTML = '';
							swal("ไม่พบอำเภอในจังหวัดที่เลือก");		
						}
					}
				});
			}
		}

		function getSubDistrict(provinceName="", districtName="", subDistrictName="", hospName="", deviceeName=""){
			var provinceId = document.all.provinceId.value;
			var districtId = document.all.districtId.value;
			if(provinceId!="" && districtId!=""){
				var select = document.all.subDistrictId;
				select.innerHTML = '';
				var thisUrl = "<?=base_url('/index.php/management/subDistrictMaster/')?>" + provinceId + "/" + districtId;
				$.ajax({
					url: thisUrl,
					success: function (response) {
						var response = JSON.parse(response);
						var data = response["data"];
						if(response["code"]=="0000"){
							select.innerHTML += '<option value="">กรุณาเลือกตำบล</option>';
							for(var i = 0; i<data.length; i++){
								select.innerHTML += '<option value="'+data[i]["subDistrictId"]+'">'+data[i]["subDistrictValue"]+'</option>'
							}
							if(subDistrictName!=""){
								var dd = document.all.subDistrictId;
								for (var i = 0; i < dd.options.length; i++) {
									if (dd.options[i].text === subDistrictName) {
										dd.selectedIndex = i;
										getHospital(provinceName, districtName, subDistrictName, hospName, deviceeName)
										break;
									}
								}
							}
						}else{
							select.innerHTML = '';
							swal("ไม่พบตำบลในอำเภอที่เลือก");		
						}
					}
				});
			}
		}

		function getHospital(provinceName="", districtName="", subDistrictName="", hospName="", deviceeName=""){
			var provinceId = document.all.provinceId.value;
			var districtId = document.all.districtId.value;
			var subDistrictId = document.all.subDistrictId.value;
			if(provinceId!="" && districtId!="" && subDistrictId!=""){
				var select = document.all.hospId;
				select.innerHTML = '';
				var thisUrl = "<?=base_url('/index.php/management/hospitalMaster/')?>" + provinceId + "/" + districtId + "/" + subDistrictId;
				$.ajax({
					url: thisUrl,
					success: function (response) {
						var response = JSON.parse(response);
						var data = response["data"];
						if(response["code"]=="0000"){
							select.innerHTML += '<option value="">กรุณาเลือกโรงพยาบาล</option>';
							for(var i = 0; i<data.length; i++){
								select.innerHTML += '<option value="'+data[i]["hospId"]+'">'+data[i]["hospValue"]+'('+data[i]["hospId"]+')</option>'
							}
							if(hospName!=""){
								var dd = document.all.hospId;
								for (var i = 0; i < dd.options.length; i++) {
									console.log(dd.options[i].value === hospName);
									if (dd.options[i].value === hospName) {
										dd.selectedIndex = i;
										getDevice(deviceeName);
										break;
									}
								}
							}
						}else{
							select.innerHTML = '';
							swal("ไม่พบโรงพยาบาลในเขตที่เลือก");		
						}
					}
				});
			}
		}

		function getDevice(deviceName=""){
			var provinceId = document.all.provinceId.value;
			var districtId = document.all.districtId.value;
			var subDistrictId = document.all.subDistrictId.value;
			var hospId = document.all.hospId.value;
			if(provinceId!="" && districtId!="" && subDistrictId!="" && hospId!=""){
				var select = document.all.deviceId;
				select.innerHTML = '';
				var thisUrl = "<?=base_url('/index.php/management/getCardReaderMaster/')?>" + provinceId + "/" + districtId + "/" + subDistrictId+ "/" + hospId;
				$.ajax({
					url: thisUrl,
					success: function (response) {
						var response = JSON.parse(response);
						var data = response["data"]["androidDeviceList"];
						if(response["code"]=="0000"){
							select.innerHTML += '<option value="">กรุณาเลือกอุปกรณ์</option>';
							for(var i = 0; i<data.length; i++){
								select.innerHTML += '<option value="'+data[i]["deviceId"]+'">'+data[i]["deviceName"]+'</option>'
							}
							if(deviceName!=""){
								var dd = document.all.deviceId;
						console.log(deviceName);
								for (var i = 0; i < dd.options.length; i++) {
						console.log(dd.options[i].value);
									if (dd.options[i].value === deviceName) {
										dd.selectedIndex = i;
										break;
									}
								}
							}
						}else{
							select.innerHTML = '';
							swal("ไม่พบโรงพยาบาลในเขตที่เลือก");		
						}
					}
				});
			}
		}
		
		function editStaff(volunteerId){
			var thisStaff = allStaff[volunteerId];
			console.log(thisStaff);
			selectedStaff = volunteerId;
			document.all.volunteerId.value = volunteerId;
			document.all.provinceId.selectedIndex = 0;
			document.all.provinceId.value="";
			document.all.districtId.selectedIndex = 0;
			document.all.districtId.value="";
			document.all.subDistrictId.selectedIndex = 0;
			document.all.subDistrictId.value="";
			document.all.deviceId.selectedIndex = 0;
			document.all.deviceId.value="";

			document.all.divCid.style.display = "none";

			document.all.firstName.value = thisStaff["firstName"];
			document.all.lastName.value = thisStaff["lastName"];
			document.all.cid.value = thisStaff["cid"];
			document.all.mobileNo.value = thisStaff["mobileNo"] ? thisStaff["mobileNo"] : "";
			var provinceName = thisStaff["provinceName"] ? thisStaff["provinceName"] : "";
			var districtName = thisStaff["districtName"] ? thisStaff["districtName"] : "";
			var subDistrictName = thisStaff["subDistrictName"] ? thisStaff["subDistrictName"] : "";
			var hospName = thisStaff["hospName"] ? thisStaff["hospName"] : "";
			var hospId = thisStaff["hospId"] ? thisStaff["hospId"] : "";
			var deviceName = thisStaff["deviceId"] ? thisStaff["deviceId"] : "";
			if(provinceName!="" && districtName!="" && subDistrictName!=""){
				var dd = document.all.provinceId;
				for (var i = 0; i < dd.options.length; i++) {
					if (dd.options[i].text === provinceName) {
						dd.selectedIndex = i;
						document.all.provinceId.value=dd.options[i].value;
						getDistrict(provinceName, districtName, subDistrictName, hospId, deviceName);
						break;
					}
				}
			}
			$('#modalAdd').modal('show');
		}
		
		function addStaff(){
			document.all.volunteerId.value = "";
			document.all.provinceId.selectedIndex = 0;
			document.all.provinceId.value="";
			document.all.districtId.selectedIndex = 0;
			document.all.districtId.value="";
			document.all.subDistrictId.selectedIndex = 0;
			document.all.subDistrictId.value="";
			document.all.deviceId.selectedIndex = 0;
			document.all.deviceId.value="";
			document.all.hospId.selectedIndex = 0;
			document.all.hospId.value="";

			document.all.firstName.value = "";
			document.all.lastName.value = "";
			document.all.mobileNo.value = "";
			document.all.cid.value = "";
			selectedStaff = "";
			document.all.divCid.style.display = "inline";
			$('#modalAdd').modal('show');
		}
		
		
	
		function getDataInForm(id) {
			var myform = $('#' + id);
			var serialized = myform.serialize();
			return serialized;
		}
		
		function saveStaff(){
			var thisFristName = document.all.firstName.value;
			var thisLastName = document.all.lastName.value;
			var thisCid = document.all.cid.value;
			var thisProvince = document.all.provinceId.selectedIndex;
			var thisDistrict = document.all.districtId.selectedIndex;
			var thisSubDistrict = document.all.subDistrictId.selectedIndex;
			var thisHospital = document.all.hospId.selectedIndex;
			var thisDevice = document.all.deviceId.selectedIndex;
			if(thisFristName==""){
				swal("กรุณากรอกชื่อ");
			}else if(thisLastName==""){
				swal("กรุณากรอกนามสกุล");	
			}else if(thisCid==""){
				swal("กรุณากรอกเลขประจำตัวประชาชน");	
			}else if(thisCid.length < 13){
				swal("กรุณากรอกเลขประจำตัวประชาชนให้ครบ 13 หลัก");	
			}else if(thisProvince==0){
				swal("กรุณาเลือกจังหวัด");	
			}else if(thisDistrict==0){
				swal("กรุณาเลือกอำเภอ");	
			}else if(thisSubDistrict==0){
				swal("กรุณาเลือกตำบล");	
			}else if(thisHospital==0){
				swal("กรุณาเลือกโรงพยาบาล");	
			}else{
				if(selectedStaff==""){
					var thisUrl = "<?=base_url('index.php/management/addStaff')?>";
				}else{
					var thisUrl = "<?=base_url('index.php/management/updateStaff')?>";
				}
				$.ajax({
					url: thisUrl,
					type: "POST",
					data: getDataInForm("formAddStaff"),
					success: function (response) {
						var response = JSON.parse(response);
						if(response["code"]=="0000"){
							swal({
								text: "บันทึกสำเร็จ!",
								type: "success"
							}).then(function() {
								window.location.reload();
							});
						}else if(response["code"]=="VT0004"){
							swal("กรุณาเลือกอุปกรณ์");
						}else if(response["code"]=="VT0005"){
							swal("กรุณากรอกชื่อ");
						}else if(response["code"]=="VT0006"){
							swal("เลขประจำตัวประชาชนซ้ำ");
						}else{
							swal("บันทึกไม่สำเร็จ");		
						}
					}
				});
			}
		}

		function deleteStaff(volunteerId){
			swal({
				title: "แน่ใจหรือ?",
				text: "คุณต้องการลบรายการที่เลือกหรือไม่",
				icon: "warning",
				buttons: true,
				dangerMode: true,
				})
				.then((willDelete) => {
					if (willDelete) {
						var thisUrl = "<?=base_url('index.php/management/deleteStaff')?>";
						$.ajax({
							url: thisUrl,
							type: "POST",
							data: {"volunteerId":volunteerId},
							success: function (response) {
								var response = JSON.parse(response);
								if(response["code"]=="0000"){
									swal({
										text: "ลบรายการสำเร็จ!",
										type: "success"
									}).then(function() {
										window.location.reload();									
									});
								}else{
									swal("บันทึกไม่สำเร็จ");		
								}
							}
						});
					} else {
						swal("ยกเลิกการลบรายการ!");
				}
			});
		}
        loadStaff();
    </script>
</body>
</html>
<!-- end document-->
