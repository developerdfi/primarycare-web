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
                                <li>
                                    <a href="<?=base_url('/index.php/management/stafflist')?>">รายชื่อเจ้าหน้าที่</a>
                                </li>
                                <li>
                                    <a href="<?=base_url('/index.php/management/devicelist')?>">อุปกรณ์</a>
                                </li>
                                <li class="active">
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
						<li class="has-sub">
                            <a class="js-arrow open" href="#">
                                <i class="far fa-clipboard"></i>การจัดการ</a>
                            <ul class="navbar-mobile-sub__list list-unstyled js-sub-list" style="display: block;">
                                <li>
                                    <a href="<?=base_url('/index.php/management/stafflist')?>">รายชื่อเจ้าหน้าที่</a>
                                </li>
                                <li>
                                    <a href="<?=base_url('/index.php/management/devicelist')?>">อุปกรณ์</a>
                                </li>
                                <li class="active">
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
											<h3 class="title-3 m-b-30"><b>ผู้ดูแลระบบ</b></h3>
										</div>
										<div class="col-md-6" align="right">
											<button class="role member" onclick="addAdmin()"><i class="fas fa-plus-circle"></i>&nbsp;เพิ่มผู้ดูแลระบบ</button>
										</div>
                        			</div>
								</div>
                                <div class="table-responsive m-b-40">
                                    <table class="table table-borderless table-data3" id="tbVitalHead">
                                        <thead>
                                            <tr>
                                                <th style="font-size:16px; vertical-align:middle; text-align:left; width:20%">User Login</th>
                                                <th style="font-size:16px; vertical-align:middle; text-align:left; width:20%">ชื่อ-นามสกุล</th>
                                                <th style="font-size:16px; vertical-align:middle; text-align:left; width:20%">ระดับผู้ดูแล</th>
                                                <th style="font-size:16px; vertical-align:middle; text-align:left; width:20%">ใช้งานล่าสุด</th>
                                                <th style="font-size:16px; vertical-align:middle; text-align:center; width:10%">Operate</th>
                                            </tr>
                                        </thead>
                                        <tbody id="tbVital">
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
						<div class="form-group">
							<label class="control-label">User</label>
							<div>
								<input type="text" class="form-control input-lg" name="userCode" value="">
							</div>
						</div>
						<div class="form-group">
							<label class="control-label">Password</label>
							<div>
								<input type="password" class="form-control input-lg" name="password" value="">
							</div>
						</div>
						<div class="form-group">
							<label class="control-label">ชื่อที่แสดง</label>
							<div>
								<input type="text" class="form-control input-lg" name="displayName" value="">
							</div>
						</div>
						<div class="form-group" id="divCid">
							<label class="control-label">เลขประจำตัวประชาชน</label>
							<div>
								<input type="text" class="form-control input-lg" name="userCid" value="">
							</div>
						</div>
						<div class="form-group">
							<label class="control-label">ระดับผู้ดูแลระบบ</label>
							<div>
								<select name="userLevelId" class="custom-select" style="width:100%">
									<option value="">กรุณาเลือกระดับ</option>
									<?php 
										foreach($userLevelList['data']['levelList'] as $i=>$val){
									?>
										<option value="<?php echo $val['levelId']?>"><?php echo $val['levelValue']?></option>
									<?php
										}
									?>
                                </select>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label">จังหวัด</label>
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
							<label class="control-label">อำเภอ</label>
							<div>
								<select name="districtId" class="custom-select" style="width:100%" onchange="getSubDistrict()">
									<option value="">กรุณาเลือกอำเภอ</option>
                                </select>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label">ตำบล</label>
							<div>
								<select name="subDistrictId" class="custom-select" style="width:100%" onchange="getHospital()">
									<option value="">กรุณาเลือกตำบล</option>
                                </select>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label">โรงพยาบาล</label>
							<div>
								<select name="hospId" class="custom-select" style="width:100%">
									<option value="">กรุณาเลือกโรงพยาบาล</option>
                                </select>
							</div>
						</div>
						<div class="form-group">
							<div style="display: flex;align-items: center;flex-direction: column;" >
								<button type="button" onclick="saveAdmin();" class="btn btn-success">
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
	<script src="<?php echo base_url() ?>assets/js/md5.min.js"></script>

    <!-- Main JS-->
	<script src="<?php echo base_url() ?>assets/js/main.js"></script>
	<script type="text/javascript">
		var allAdmin = new Array();
		var selectedAdmin = "";

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
				retDateTime = thisDate[0]- -0 + " " + month + " " + ((thisDate[2]- -0) + 543) + "</b></br>" + thisTime[0] + ":" + thisTime[1] + " น.";
			}else{
				retDateTime = thisDate[0]- -0 + " " + month + " " + ((thisDate[2] - -0) + 543);
			}
			return retDateTime;
		}

        function loadAdmin(){
			var userLevelList = <?php echo json_encode($userLevelList['data']['levelList']); ?>;
			var table = document.all.tbVital;
			table.innerHTML = '';
            var thisUrl = "<?=base_url('/index.php/management/getadminlist/')?>";
            $.ajax({
                url: thisUrl,
                success: function (response) {
					var response = JSON.parse(response);
					var data = response["data"]["userList"];
					console.log(data)
					if(response["code"]=="0000"){
						for(var i = 0; i<data.length; i++){
							var lastLoginDate = data[i]['lastLogin'] ? reDate(data[i]['lastLogin'], 'T') :"ไม่มีการเข้าใช้งาน";
							allAdmin[data[i]['userCode']] = data[i];
							var thisUserLevel = "";
							userLevelList.map(function (userLevel) {
								if (userLevel.levelId == data[i]['userLevelCode']) {
									thisUserLevel = userLevel.levelValue
								} 
							});
							table.innerHTML += '<tr>'+
											'<td style="font-size:16px; vertical-align:left; ; text-align:left; width: 20%";><b>'+data[i]['userCode']+'</b></td>'+
											'<td style="font-size:16px; text-align:left; width: 20%">'+data[i]['displayName']+'</td>'+
											'<td style="font-size:16px">'+thisUserLevel+'</td>'+
											'<td style="font-size:16px; vertical-align:middle; text-align:left; width: 15%"><b>'+lastLoginDate+'</td>'+
											'<td>'+
											'<div class="table-data-feature">'+
												'<button class="item" data-toggle="tooltip" data-placement="top" title="Edit" onclick="editAdmin('+"'"+data[i]['userCode']+"'"+')">'+
                                                	'<i class="zmdi zmdi-edit"></i>'+
                                                '</button>'+
                                                '<button class="item" data-toggle="tooltip" data-placement="top" title="Delete"onclick="deleteAdmin('+"'"+data[i]['userCode']+"'"+')">'+
                                                    '<i class="zmdi zmdi-delete"></i>'+
												'</button>'+
											'</div>'+
											'</td>'+
										'</tr>'
						}
						$('#tbVitalHead').DataTable(
								{destroy: true,
									order:false,
									"aoColumns": [
									{ "bSortable": false },
									{ "bSortable": false },
									{ "bSortable": false },
									{ "bSortable": false },
									{ "bSortable": false },
								],}
						);
					}else{
                        table.innerHTML = '';
						swal("ไม่พบข้อมูลผู้ป่วย");		
					}
                }
            });
		}
		function getDistrict(provinceName="", districtName="", subDistrictName="", hospName=""){
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
										getSubDistrict(provinceName, districtName, subDistrictName, hospName)
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

		function getSubDistrict(provinceName="", districtName="", subDistrictName="", hospName=""){
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
										getHospital(provinceName, districtName, subDistrictName, hospName)
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

		function getHospital(provinceName="", districtName="", subDistrictName="", hospName=""){
			var provinceId = document.all.provinceId.value;
			var districtId = document.all.districtId.value;
			var subDistrictId = document.all.subDistrictId.value;
			if(provinceId!="" && districtId!="" && subDistrictId!=""){
				var select = document.all.hospId;
				select.innerHTML = '';
				var thisUrl = "<?=base_url('/index.php/management/hospitalMaster/')?>" + provinceId + "/" + districtId + "/" + subDistrictId;;
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
									if (dd.options[i].value === hospName) {
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
		
		function editAdmin(userCode){
			var thisAdmin = allAdmin[userCode];
			console.log(thisAdmin);
			selectedAdmin = userCode;
			document.all.provinceId.selectedIndex = 0;
			document.all.provinceId.value="";
			document.all.districtId.selectedIndex = 0;
			document.all.districtId.value="";
			document.all.subDistrictId.selectedIndex = 0;
			document.all.subDistrictId.value="";
			document.all.userLevelId.selectedIndex = 0;
			document.all.userLevelId.value="";
			document.all.userCid.disabled = true;
			document.all.userCode.value = thisAdmin["userCode"];
			document.all.displayName.value = thisAdmin["displayName"];
			document.all.userCid.value = thisAdmin["userCid"];
			var provinceName = thisAdmin["provinceName"] ? thisAdmin["provinceName"] : "";
			var districtName = thisAdmin["districtName"] ? thisAdmin["provinceName"] : "";
			var subDistrictName = thisAdmin["subDistrictName"] ? thisAdmin["subDistrictName"] : "";
			var hospName = thisAdmin["hospName"] ? thisAdmin["hospName"] : "";
			var hospId = thisAdmin["hospId"] ? thisAdmin["hospId"] : "";
			if(provinceName!="" && districtName!="" && subDistrictName!=""){
				var dd = document.all.provinceId;
				for (var i = 0; i < dd.options.length; i++) {
					if (dd.options[i].text === provinceName) {
						dd.selectedIndex = i;
						document.all.provinceId.value=dd.options[i].value;
						getDistrict(provinceName, districtName, subDistrictName, hospId);
						break;
					}
				}
			}
			var userLevelCode = thisAdmin["userLevelCode"] ? thisAdmin["userLevelCode"] : "";
			if(userLevelCode!=""){
				var dd = document.all.userLevelId;
				for (var i = 0; i < dd.options.length; i++) {
					if (dd.options[i].value === userLevelCode) {
						dd.selectedIndex = i;
						document.all.userLevelId.value=dd.options[i].value;
						break;
					}
				}
			}
			$('#modalAdd').modal('show');
		}
		
		function addAdmin(){
			document.all.userCode.value = "";
			document.all.provinceId.selectedIndex = 0;
			document.all.provinceId.value="";
			document.all.districtId.selectedIndex = 0;
			document.all.districtId.value="";
			document.all.subDistrictId.selectedIndex = 0;
			document.all.subDistrictId.value="";
			document.all.hospId.selectedIndex = 0;
			document.all.hospId.value="";
			document.all.userLevelId.selectedIndex = 0;
			document.all.userLevelId.value="";

			document.all.password.value = "";
			document.all.displayName.value = "";
			document.all.userCid.value = "";
			selectedAdmin = "";
			document.all.userCid.disabled = false;
			$('#modalAdd').modal('show');
		}
		
		
	
		function getDataInForm(id) {
			var myform = $('#' + id);
			var serialized = myform.serialize();
			return serialized;
		}
		
		function saveAdmin(){
			var thisUserCode = document.all.userCode.value;
			var thisUserCid = document.all.userCid.value;
			var thisPassword = document.all.password.value;
			var thisUserLevel = document.all.userLevelId.value;
			var thisDisplayName = document.all.displayName.value;
			if(thisUserCode==""){
				swal("กรุณากรอก User");
			}else if(thisPassword==""){
				swal("กรุณากรอก password");	
			}else if(thisUserCid==""){
				swal("กรุณากรอกเลขประจำตัวประชาชน");	
			}else if(thisUserLevel==""){
				swal("กรุณากรอกระดับผู้ดูแลระบบ");	
			}else if(thisDisplayName==""){
				swal("กรุณากรอกชื่อที่แสดง");	
			}else{

				document.all.userCid.disabled = false;
				if(selectedAdmin==""){
					var thisUrl = "<?=base_url('index.php/management/addAdmin')?>";
				}else{
					var thisUrl = "<?=base_url('index.php/management/updateAdmin')?>";
				}
				document.all.password.value = md5(document.all.password.value);
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
						}else if(response["code"]=="USER0006"){
							swal("มี User นี้ในระบบแล้ว");
						}else if(response["code"]=="USER0007"){
							swal("มี User ใช้เลขบัตรประจำตัวประชาชนนี้แล้ว");
						}else{
							swal("บันทึกไม่สำเร็จ");		
						}
					}
				});
			}
		}

		function deleteAdmin(userCode){
			swal({
				title: "แน่ใจหรือ?",
				text: "คุณต้องการลบรายการที่เลือกหรือไม่",
				icon: "warning",
				buttons: true,
				dangerMode: true,
				})
				.then((willDelete) => {
					if (willDelete) {
						var thisUrl = "<?=base_url('index.php/management/deleteAdmin')?>";
						$.ajax({
							url: thisUrl,
							type: "POST",
							data: {"userCode":userCode},
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
        loadAdmin();
    </script>
</body>
</html>
<!-- end document-->
