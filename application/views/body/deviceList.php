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
                                <li class="active">
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
						<li class="has-sub">
                            <a class="js-arrow open" href="#">
                                <i class="far fa-clipboard"></i>การจัดการ</a>
                            <ul class="navbar-mobile-sub__list list-unstyled js-sub-list" style="display: block;">
                                <li>
                                    <a href="<?=base_url('/index.php/management/stafflist')?>">รายชื่อเจ้าหน้าที่</a>
                                </li>
                                <li class="active">
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
								<ul class="nav nav-pills">
									<li class="nav-item">
										<a class="nav-link <?php echo $tab==1 ? 'active' : ''?>" href="#1" onclick="loadListBp()" aria-controls="1" role="tab" data-toggle="tab">เครื่องวัดความดัน</a>
									</li>
									<li class="nav-item">
										<a class="nav-link <?php echo $tab==2 ? 'active' : ''?>" href="#2" onclick="loadListGlu()" aria-controls="2" role="tab" data-toggle="tab">เครื่องวัดน้ำตาล</a>
									</li>
									<li class="nav-item">
										<a class="nav-link <?php echo $tab==4 ? 'active' : ''?>" href="#4" onclick="loadListSpo2()" aria-controls="4" role="tab" data-toggle="tab">เครื่องวัดออกซิเจนในเลือด</a>
									</li>
									<li class="nav-item">
										<a class="nav-link <?php echo $tab== 5 ? 'active' : ''?>" href="#5" onclick="loadListWeight()" aria-controls="5" role="tab" data-toggle="tab">เครื่องชั่งน้ำหนัก</a>
									</li>
									<li class="nav-item">
										<a class="nav-link <?php echo $tab== 6 ? 'active' : ''?>" href="#6" onclick="loadListWeightHeight()" aria-controls="6" role="tab" data-toggle="tab">เครื่องชั่งน้ำหนักวัดส่วนสูง</a>
									</li>
									<li class="nav-item">
										<a class="nav-link <?php echo $tab== 7 ? 'active' : ''?>" href="#7" onclick="loadListTemp()" aria-controls="6" role="tab" data-toggle="tab">เครื่องวัดอุณหภูมิ</a>
									</li>
									<li class="nav-item" >
										<a class="nav-link <?php echo $tab==3 ? 'active' : ''?>" href="#3" onclick="loadListReader()" aria-controls="3" role="tab" data-toggle="tab">เครื่องอ่านบัตรประชาชน</a>
									</li>
								</ul>
								<br>
								<!-- Tab panes -->
								<div class="tab-content">
									
									<div role="tabpanel" class="tab-pane <?php echo $tab==1 ? 'active' : ''?>" id="1">
										<div class="col-md-12">
											<!-- DATA TABLE-->
											<div class="col-md-12">
                        						<div class="row m-t-30">
													<div class="col-md-6">
														<h3 class="title-3 m-b-30"><b>เครื่องวัดความดัน</b></h3>
													</div>
													<div class="col-md-6" align="right">
													<button class="role member" onclick="addBp()"><i class="fas fa-plus-circle"></i>&nbsp;เพิ่มอุปกรณ์</button>
													</div>
                        						</div>
											</div>
											<div class="table-responsive m-b-40">
												<table class="table table-borderless table-data3" id="tbBpDeviceHead">
													<thead>
														<tr>
															<th>mac address</th>
															<th>ชื่ออุปกรณ์</th>
															<th>สถานที่</th>
															<th>operate</th>
														</tr>
													</thead>
													<tbody id="tbBpDevice">
													</tbody>
												</table>
											</div>
											<!-- END DATA TABLE-->
										</div>
									</div>
									<div role="tabpanel" class="tab-pane <?php echo $tab==2 ? 'active' : ''?>" id="2">
										<div class="col-md-12">
											<!-- DATA TABLE-->
											<div class="col-md-12">
                        						<div class="row m-t-30">
													<div class="col-md-6">
														<h3 class="title-3 m-b-30"><b>เครื่องวัดน้ำตาล</b></h3>
													</div>
													<div class="col-md-6" align="right">
													<button class="role member" onclick="addGlu()"><i class="fas fa-plus-circle"></i>&nbsp;เพิ่มอุปกรณ์</button>
													</div>
                        						</div>
											</div>
											<div class="table-responsive m-b-40">
												<table class="table table-borderless table-data3" id="tbGluDeviceHead">
													<thead>
														<tr>
															<th>mac address</th>
															<th>ชื่ออุปกรณ์</th>
															<th>สถานที่</th>
															<th>operate</th>
														</tr>
													</thead>
													<tbody id="tbGluDevice">
													</tbody>
												</table>
											</div>
											<!-- END DATA TABLE-->
										</div>
									</div>
									<div role="tabpanel" class="tab-pane <?php echo $tab==4 ? 'active' : ''?>" id="4">
										<div class="col-md-12">
											<!-- DATA TABLE-->
											<div class="col-md-12">
                        						<div class="row m-t-30">
													<div class="col-md-6">
														<h3 class="title-3 m-b-30"><b>เครื่องวัดออกซิเจนในเลือด</b></h3>
													</div>
													<div class="col-md-6" align="right">
													<button class="role member" onclick="addSpo2()"><i class="fas fa-plus-circle"></i>&nbsp;เพิ่มอุปกรณ์</button>
													</div>
                        						</div>
											</div>
											<div class="table-responsive m-b-40">
												<table class="table table-borderless table-data3" id="tbSpo2DeviceHead">
													<thead>
														<tr>
															<th>mac address</th>
															<th>ชื่ออุปกรณ์</th>
															<th>สถานที่</th>
															<th>operate</th>
														</tr>
													</thead>
													<tbody id="tbSpo2Device">
													</tbody>
												</table>
											</div>
											<!-- END DATA TABLE-->
										</div>
									</div>
									<div role="tabpanel" class="tab-pane <?php echo $tab==5 ? 'active' : ''?>" id="5">
										<div class="col-md-12">
											<!-- DATA TABLE-->
											<div class="col-md-12">
                        						<div class="row m-t-30">
													<div class="col-md-6">
														<h3 class="title-3 m-b-30"><b>เครื่องชั่งน้ำหนัก</b></h3>
													</div>
													<div class="col-md-6" align="right">
													<button class="role member" onclick="addWeight()"><i class="fas fa-plus-circle"></i>&nbsp;เพิ่มอุปกรณ์</button>
													</div>
                        						</div>
											</div>
											<div class="table-responsive m-b-40">
												<table class="table table-borderless table-data3" id="tbWeightDeviceHead">
													<thead>
														<tr>
															<th>mac address</th>
															<th>ชื่ออุปกรณ์</th>
															<th>สถานที่</th>
															<th>operate</th>
														</tr>
													</thead>
													<tbody id="tbWeightDevice">
													</tbody>
												</table>
											</div>
											<!-- END DATA TABLE-->
										</div>
									</div>
									<div role="tabpanel" class="tab-pane <?php echo $tab==6 ? 'active' : ''?>" id="6">
										<div class="col-md-12">
											<!-- DATA TABLE-->
											<div class="col-md-12">
                        						<div class="row m-t-30">
													<div class="col-md-6">
														<h3 class="title-3 m-b-30"><b>เครื่องชั่งน้ำหนักวัดส่วนสูง</b></h3>
													</div>
													<div class="col-md-6" align="right">
													<button class="role member" onclick="addWeightHeight()"><i class="fas fa-plus-circle"></i>&nbsp;เพิ่มอุปกรณ์</button>
													</div>
                        						</div>
											</div>
											<div class="table-responsive m-b-40">
												<table class="table table-borderless table-data3" id="tbWeightHeightDeviceHead">
													<thead>
														<tr>
															<th>mac address</th>
															<th>ชื่ออุปกรณ์</th>
															<th>สถานที่</th>
															<th>operate</th>
														</tr>
													</thead>
													<tbody id="tbWeightHeightDevice">
													</tbody>
												</table>
											</div>
											<!-- END DATA TABLE-->
										</div>
									</div>
									<div role="tabpanel" class="tab-pane <?php echo $tab==7 ? 'active' : ''?>" id="7">
										<div class="col-md-12">
											<!-- DATA TABLE-->
											<div class="col-md-12">
                        						<div class="row m-t-30">
													<div class="col-md-6">
														<h3 class="title-3 m-b-30"><b>เครื่องวัดอุณหภูมิ</b></h3>
													</div>
													<div class="col-md-6" align="right">
													<button class="role member" onclick="addTemp()"><i class="fas fa-plus-circle"></i>&nbsp;เพิ่มอุปกรณ์</button>
													</div>
                        						</div>
											</div>
											<div class="table-responsive m-b-40">
												<table class="table table-borderless table-data3" id="tbTempDeviceHead">
													<thead>
														<tr>
															<th>mac address</th>
															<th>ชื่ออุปกรณ์</th>
															<th>สถานที่</th>
															<th>operate</th>
														</tr>
													</thead>
													<tbody id="tbTempDevice">
													</tbody>
												</table>
											</div>
											<!-- END DATA TABLE-->
										</div>
									</div>
									<div role="tabpanel" class="tab-pane <?php echo $tab==3 ? 'active' : ''?>" id="3">
										<div class="col-md-12">
											<!-- DATA TABLE-->
											<div class="col-md-12">
                        						<div class="row m-t-30">
													<div class="col-md-6">
														<h3 class="title-3 m-b-30"><b>เครื่องอ่านบัตรประชาชน</b></h3>
													</div>
													<div class="col-md-6" align="right">
													<button class="role member" onclick="addCardReader()"><i class="fas fa-plus-circle"></i>&nbsp;เพิ่มอุปกรณ์</button>
													</div>
                        						</div>
											</div>
											<div class="table-responsive m-b-40">
												<table class="table table-borderless table-data3" id="tbDeviceHead">
													<thead>
														<tr>
															<th>Android ID</th>
															<th>ชื่ออุปกรณ์</th>
															<th>สถานที่</th>
															<th>operate</th>
														</tr>
													</thead>
													<tbody id="tbDevice">
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
            </div>
        </div>

	</div>
	
	<div id="modalAddDevice" class="modal fade">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h3 class="modal-title">เพิ่มอุปกรณ์</h3>
				</div>
				<div class="modal-body">
					<form role="form" method="POST" action="" id="formSaveCard">
						<input type="hidden" name="_token" value="">
						<div class="form-group">
							<label class="control-label"><span id="addDeviceMac">MAC Address</span></label><span style="color:red"> *</span>
							<div>
								<input type="text" class="form-control input-lg" name="deviceId" value="">
							</div>
						</div>
						<div class="form-group">
							<label class="control-label">ชื่ออุปกรณ์</label><span style="color:red"> *</span>
							<div>
								<input type="text" class="form-control input-lg" name="deviceName" value="">
							</div>
						</div>
						<div class="form-group">
							<label class="control-label">ที่อยู่อุปกรณ์</label>
							<div>
								<input type="text" class="form-control input-lg" name="descript" value="">
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
								<select name="hospId" class="custom-select" style="width:100%">
									<option value="">กรุณาเลือกโรงพยาบาล</option>
                                </select>
							</div>
						</div>
						<div class="form-group">
							<div id="divBp">
								<label class="control-label">เครื่องวัดความดัน</label>
								<div>
									<select name="bpDeviceId" class="custom-select" style="width:100%">
										<option value="">กรุณาเลือกเครื่องวัดความดัน</option>
										<?php 
											foreach($bpList['data']['bpDeviceList'] as $i=>$val){
										?>
											<option value="<?php echo $val['deviceId']?>"><?php echo $val['deviceName']?></option>
										<?php
											}
										?>
									</select>
								</div>
							</div>
						</div>
						<div class="form-group">
							<div id="divGlu">
								<label class="control-label">เครื่องวัดน้ำตาล</label>
								<div>
									<select name="glucoseDeviceId" class="custom-select" style="width:100%">
									<option value="">กรุณาเลือกเครื่องวัดน้ำตาล</option>
										<?php 
											foreach($gluList['data']['glucoseDeviceList'] as $i=>$val){
										?>
											<option value="<?php echo $val['deviceId']?>"><?php echo $val['deviceName']?></option>
										<?php
											}
										?>
									</select>
								</div>
							</div>
						</div>
						<div class="form-group">
							<div id="divSpo2">
								<label class="control-label">เครื่องวัดออกซิเจนในเลือด</label>
								<div>
									<select name="spo2DeviceId" class="custom-select" style="width:100%">
									<option value="">กรุณาเลือกเครื่องวัดออกซิเจนในเลือด</option>
										<?php 
											foreach($spo2List['data']['spo2DeviceList'] as $i=>$val){
										?>
											<option value="<?php echo $val['deviceId']?>"><?php echo $val['deviceName']?></option>
										<?php
											}
										?>
									</select>
								</div>
							</div>
						</div>
						<div class="form-group">
							<div id="divWeight">
								<label class="control-label">เครื่องชั่งน้ำหนัก</label>
								<div>
									<select name="weightDeviceId" class="custom-select" style="width:100%">
									<option value="">กรุณาเลือกเครื่องชั่งน้ำหนัก</option>
										<?php 
											foreach($weightList['data']['weightDeviceList'] as $i=>$val){
										?>
											<option value="<?php echo $val['deviceId']?>"><?php echo $val['deviceName']?></option>
										<?php
											}
										?>
									</select>
								</div>
							</div>
						</div>
						<div class="form-group">
							<div id="divWeightHeight">
								<label class="control-label">เครื่องชั่งน้ำหนักวัดส่วนสูง</label>
								<div>
									<select name="weightHeightDeviceId" class="custom-select" style="width:100%">
									<option value="">กรุณาเลือกเครื่องชั่งน้ำหนักวัดส่วนสูง</option>
										<?php 
											foreach($weightHeightList['data']['scaleDeviceList'] as $i=>$val){
										?>
											<option value="<?php echo $val['deviceId']?>"><?php echo $val['deviceName']?></option>
										<?php
											}
										?>
									</select>
								</div>
							</div>
						</div>
						<div class="form-group">
							<div id="divTemp">
								<label class="control-label">เครื่องวัดอุณหภูมิ</label>
								<div>
									<select name="tempDeviceId" class="custom-select" style="width:100%">
									<option value="">กรุณาเลือกเครื่องวัดอุณหภูมิ</option>
										<?php 
											foreach($tempList['data']['tempDeviceList'] as $i=>$val){
										?>
											<option value="<?php echo $val['deviceId']?>"><?php echo $val['deviceName']?></option>
										<?php
											}
										?>
									</select>
								</div>
							</div>
						</div>
						<div class="form-group">
							<div id="btSaveCard">
								<div style="display: flex;align-items: center;flex-direction: column;" >
									<button type="button" id="btModalSave1" class="btn btn-success" onclick="saveCardReader()">
										บันทึกข้อมูล
									</button>
								</div>
							</div>
							<div id="btSaveBp">
								<div style="display: flex;align-items: center;flex-direction: column;" >
									<button type="button" id="btModalSave2" class="btn btn-success" onclick="saveBp()">
										บันทึกข้อมูล
									</button>
								</div>
							</div>
							<div id="btSaveSpo2">
								<div style="display: flex;align-items: center;flex-direction: column;" >
									<button type="button" id="btModalSave4" class="btn btn-success" onclick="saveSpo2()">
										บันทึกข้อมูล
									</button>
								</div>
							</div>
							<div id="btSaveWeight">
								<div style="display: flex;align-items: center;flex-direction: column;" >
									<button type="button" id="btModalSave5" class="btn btn-success" onclick="saveWeight()">
										บันทึกข้อมูล
									</button>
								</div>
							</div>
							<div id="btSaveWeightHeight">
								<div style="display: flex;align-items: center;flex-direction: column;" >
									<button type="button" id="btModalSave6" class="btn btn-success" onclick="saveWeightHeight()">
										บันทึกข้อมูล
									</button>
								</div>
							</div>
							<div id="btSaveTemp">
								<div style="display: flex;align-items: center;flex-direction: column;" >
									<button type="button" id="btModalSave7" class="btn btn-success" onclick="saveTemp()">
										บันทึกข้อมูล
									</button>
								</div>
							</div>
							<div id="btSaveGlu">
								<div style="display: flex;align-items: center;flex-direction: column;" >
									<button type="button" id="btModalSave3" class="btn btn-success" onclick="saveGlu()">
										บันทึกข้อมูล
									</button>
								</div>
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
		var allDevice = new Array();
		var allBp = new Array();
		var allGlu = new Array();
		var allSpo2 = new Array();
		var allWeight = new Array();
		var allWeightHeight = new Array();
		var allTemp = new Array();
		var selectedDevice = "";
		

		function reDate(date, useTime){
			var monthTH = new Array("", "มกราคม", "กุมภาพันธ์", "มีนาคม", "เมษายน", "พฤษภาคม", "มิถุนายน" ,"กรกฏาคม" ,"สิงหาคม", "กันยายน", "ตุลาคม", "พฤศจิกายน", "ธันวาคม")
			if(useTime === undefined) {
				useTime = "F";
			}
			var retDateTime = "";
			var thisDateTime = date.split(" ");
			var thisDate = thisDateTime[0].split("-");
			var month = monthTH[(thisDate[1]- -0)];
			if(useTime=="T"){
				var thisTime = thisDateTime[1].split(":");
				retDateTime = thisDate[0]- -0 + " " + month + " " + ((thisDate[2]- -0) + 543) + " เวลา " + thisTime[0] + ":" + thisTime[1] + " น.";
			}else{
				retDateTime = thisDate[0]- -0 + " " + month + " " + ((thisDate[2] - -0) + 543);
			}
			return retDateTime;
		}

        function loadListReader(){
			var table = document.all.tbDevice;
			table.innerHTML = '';
            var thisUrl = "<?=base_url('/index.php/management/getcardreaderlist/')?>";
            $.ajax({
                url: thisUrl,
                success: function (response) {
					var response = JSON.parse(response);
					var data = response["data"]["androidDeviceList"];
					console.log(data);
					if(response["code"]=="0000" && data!==undefined){
						for(var i = 0; i<data.length; i++){
							allDevice[data[i]['deviceId']] = data[i];
							table.innerHTML += '<tr>'+
											'<td><b>'+data[i]['deviceId']+'</b></td>'+
											'<td>'+data[i]['deviceName']+'</td>'+
											'<td>'+data[i]['hospName']+' ('+data[i]['hospId']+')</td>'+
											'<td width="80px">'+
											'<div class="table-data-feature">'+
												'<button class="item" data-toggle="tooltip" data-placement="top" title="Edit" onclick="editCardReader('+"'"+data[i]['deviceId']+"'"+')">'+
                                                	'<i class="zmdi zmdi-edit"></i>'+
                                                '</button>'+
                                                '<button class="item" data-toggle="tooltip" data-placement="top" title="Delete"onclick="deleteCardReader('+"'"+data[i]['deviceId']+"'"+')">'+
                                                    '<i class="zmdi zmdi-delete"></i>'+
												'</button>'+
											'</div>'+
											'</td>'+
										'</tr>'
						}
						$('#tbDeviceHead').DataTable({
							"order": [],
							destroy: true,
							"aoColumns": [
									{ "bSortable": false },
									{ "bSortable": false },
									{ "bSortable": false },
									{ "bSortable": false },
								],
							
						} );
					}else{
                        table.innerHTML = '';
						swal("ไม่พบข้อมูลเครื่องอ่านบัตร");		
					}
                }
            });
		}

		function loadListBp(){
			var table = document.all.tbBpDevice;
			table.innerHTML = '';
			var thisUrl = "<?=base_url('/index.php/management/getBpList/')?>";
			$.ajax({
				url: thisUrl,
				success: function (response) {
					var response = JSON.parse(response);
					var data = response["data"]["bpDeviceList"];
					if(response["code"]=="0000" && data!==undefined){
						for(var i = 0; i<data.length; i++){
							allBp[data[i]['deviceId']] = data[i];
							table.innerHTML += '<tr>'+
											'<td><b>'+data[i]['deviceId']+'</b></td>'+
											'<td>'+data[i]['deviceName']+'</td>'+
											'<td>'+data[i]['hospName']+' ('+data[i]['hospId']+')</td>'+
											'<td width="80px">'+
											'<div class="table-data-feature">'+
												'<button class="item" data-toggle="tooltip" data-placement="top" title="Edit" onclick="editBp('+"'"+data[i]['deviceId']+"'"+')">'+
													'<i class="zmdi zmdi-edit"></i>'+
												'</button>'+
												'<button class="item" data-toggle="tooltip" data-placement="top" title="Delete"onclick="deleteBp('+"'"+data[i]['deviceId']+"'"+')">'+
													'<i class="zmdi zmdi-delete"></i>'+
												'</button>'+
											'</div>'+
											'</td>'+
										'</tr>'
						}
						$('#tbBpDeviceHead').DataTable({
							"order": [],
							destroy: true,
							"aoColumns": [
									{ "bSortable": false },
									{ "bSortable": false },
									{ "bSortable": false },
									{ "bSortable": false },
								],
						} );
					}else{
						table.innerHTML = '';
						swal("ไม่พบข้อมูลเครื่องัดความดัน");		
					}
				}
			});
		}

		function loadListGlu(){
			var table = document.all.tbGluDevice;
			table.innerHTML = '';
			var thisUrl = "<?=base_url('/index.php/management/getGlucoseList/')?>";
			$.ajax({
				url: thisUrl,
				success: function (response) {
					var response = JSON.parse(response);
					console.log(response)
					var data = response["data"]["glucoseDeviceList"];
					if(response["code"]=="0000" && data!==undefined){
						for(var i = 0; i<data.length; i++){
							allGlu[data[i]['deviceId']] = data[i];
							table.innerHTML += '<tr>'+
											'<td><b>'+data[i]['deviceId']+'</b></td>'+
											'<td>'+data[i]['deviceName']+'</td>'+
											'<td>'+data[i]['hospName']+' ('+data[i]['hospId']+')</td>'+
											'<td width="80px">'+
											'<div class="table-data-feature">'+
												'<button class="item" data-toggle="tooltip" data-placement="top" title="Edit" onclick="editGlu('+"'"+data[i]['deviceId']+"'"+')">'+
													'<i class="zmdi zmdi-edit"></i>'+
												'</button>'+
												'<button class="item" data-toggle="tooltip" data-placement="top" title="Delete"onclick="deleteGlu('+"'"+data[i]['deviceId']+"'"+')">'+
													'<i class="zmdi zmdi-delete"></i>'+
												'</button>'+
											'</div>'+
											'</td>'+
										'</tr>'
						}
						$('#tbGluDeviceHead').DataTable({
							"order": [],
							destroy: true,
							"aoColumns": [
									{ "bSortable": false },
									{ "bSortable": false },
									{ "bSortable": false },
									{ "bSortable": false },
								],
						} );
					}else{
						table.innerHTML = '';
						swal("ไม่พบข้อมูลเครื่องวัดน้ำตาล");		
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
						if(response["code"]=="0000" && data!==undefined){
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
						if(response["code"]=="0000" && data!==undefined){
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
						if(response["code"]=="0000" && data!==undefined){
							select.innerHTML += '<option value="">กรุณาเลือกโรงพยาบาล</option>';
							for(var i = 0; i<data.length; i++){
								select.innerHTML += '<option value="'+data[i]["hospId"]+'">'+data[i]["hospValue"]+'('+data[i]["hospId"]+')</option>'
							}
							if(hospName!=""){
								var dd = document.all.hospId;
								for (var i = 0; i < dd.options.length; i++) {
										console.log(dd.options[i].text)
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
		
		function editCardReader(deviceId){
			clearData();
			var thisDevice = allDevice[deviceId];
			console.log(thisDevice);
			selectedDevice = deviceId;
			document.all.divGlu.style.display = "inline";
			document.all.divBp.style.display = "inline";
			document.all.btSaveBp.style.display = "none";
			document.all.btSaveGlu.style.display = "none";
			document.all.btSaveCard.style.display = "inline";	
			document.all.divSpo2.style.display = "inline";
			document.all.divWeight.style.display = "inline";
			document.all.divWeightHeight.style.display = "inline";
			document.all.divTemp.style.display = "inline";
			document.all.btSaveSpo2.style.display = "none";
			document.all.btSaveWeight.style.display = "none";
			document.all.btSaveWeightHeight.style.display = "none";
			document.all.btSaveTemp.style.display = "none";	
			document.all.addDeviceMac.innerHTML = "Android Id";

			document.all.deviceId.value = thisDevice["deviceId"];
			document.all.deviceName.value = thisDevice["deviceName"];
			document.all.descript.value = thisDevice["description"]!==undefined ? thisDevice["description"] : "";
			var provinceName = thisDevice["provinceName"] ? thisDevice["provinceName"] : "";
			var districtName = thisDevice["districtName"] ? thisDevice["districtName"] : "";
			var subDistrictName = thisDevice["subDistrictName"] ? thisDevice["subDistrictName"] : "";
			var hospName = thisDevice["hospName"] ? thisDevice["hospName"] : "";
			var hospId = thisDevice["hospId"] ? thisDevice["hospId"] : "";
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
			var bpDeviceName = thisDevice["bpDeviceName"] ? thisDevice["bpDeviceName"] : "";
			if(bpDeviceName!=""){
				var dd = document.all.bpDeviceId;
				for (var i = 0; i < dd.options.length; i++) {
					if (dd.options[i].text === bpDeviceName) {
						dd.selectedIndex = i;
						document.all.bpDeviceId.value=dd.options[i].value;
						break;
					}
				}
			}
			var glucoseDeviceName = thisDevice["glucoseDeviceName"] ? thisDevice["glucoseDeviceName"] : "";
			if(glucoseDeviceName!=""){
				var dd = document.all.glucoseDeviceId;
				for (var i = 0; i < dd.options.length; i++) {
					if (dd.options[i].text === glucoseDeviceName) {
						dd.selectedIndex = i;
						document.all.glucoseDeviceId.value=dd.options[i].value;
						break;
					}
				}
			}
			var spo2DeviceName = thisDevice["spo2DeviceName"] ? thisDevice["spo2DeviceName"] : "";
			if(spo2DeviceName!=""){
				var dd = document.all.spo2DeviceId;
				for (var i = 0; i < dd.options.length; i++) {
					if (dd.options[i].text === spo2DeviceName) {
						dd.selectedIndex = i;
						document.all.spo2DeviceId.value=dd.options[i].value;
						break;
					}
				}
			}
			var weightDeviceName = thisDevice["weightDeviceName"] ? thisDevice["weightDeviceName"] : "";
			if(weightDeviceName!=""){
				var dd = document.all.weightDeviceId;
				for (var i = 0; i < dd.options.length; i++) {
					if (dd.options[i].text === weightDeviceName) {
						dd.selectedIndex = i;
						document.all.weightDeviceId.value=dd.options[i].value;
						break;
					}
				}
			}
			var weightHeightDeviceName = thisDevice["scaleDeviceName"] ? thisDevice["scaleDeviceName"] : "";
			if(weightHeightDeviceName!=""){
				var dd = document.all.weightHeightDeviceId;
				for (var i = 0; i < dd.options.length; i++) {
					if (dd.options[i].text === weightHeightDeviceName) {
						dd.selectedIndex = i;
						document.all.weightHeightDeviceId.value=dd.options[i].value;
						break;
					}
				}
			}
			var weightHeightDeviceName = thisDevice["scaleDeviceName"] ? thisDevice["scaleDeviceName"] : "";
			if(weightHeightDeviceName!=""){
				var dd = document.all.weightHeightDeviceId;
				for (var i = 0; i < dd.options.length; i++) {
					if (dd.options[i].text === weightHeightDeviceName) {
						dd.selectedIndex = i;
						document.all.weightHeightDeviceId.value=dd.options[i].value;
						break;
					}
				}
			}
			$('#modalAddDevice').modal('show');
		}
		function clearData(){
			document.all.provinceId.selectedIndex = 0;
			document.all.provinceId.value="";
			document.all.districtId.selectedIndex = 0;
			document.all.districtId.value="";
			document.all.subDistrictId.selectedIndex = 0;
			document.all.subDistrictId.value="";
			document.all.bpDeviceId.selectedIndex = 0;
			document.all.bpDeviceId.value="";
			document.all.glucoseDeviceId.selectedIndex = 0;
			document.all.glucoseDeviceId.value="";
			document.all.hospId.selectedIndex = 0;
			document.all.hospId.value="";
			document.all.deviceId.value = "";
			document.all.deviceName.value = "";
			document.all.descript.value = "";
			selectedDevice = "";
		}
		
		function editBp(deviceId){
			clearData();
			var thisDevice = allBp[deviceId];
			console.log(thisDevice);
			selectedDevice = deviceId;
			document.all.divGlu.style.display = "none";
			document.all.divBp.style.display = "none";
			document.all.btSaveBp.style.display = "inline";
			document.all.btSaveGlu.style.display = "none";
			document.all.btSaveCard.style.display = "none";
			document.all.divSpo2.style.display = "none";
			document.all.divWeight.style.display = "none";
			document.all.divWeightHeight.style.display = "none";
			document.all.divTemp.style.display = "none";
			document.all.btSaveSpo2.style.display = "none";
			document.all.btSaveWeight.style.display = "none";
			document.all.btSaveWeightHeight.style.display = "none";
			document.all.btSaveTemp.style.display = "none";
			document.all.addDeviceMac.innerHTML = "Mac Address";

			document.all.deviceId.value = thisDevice["deviceId"];
			document.all.deviceName.value = thisDevice["deviceName"];
			document.all.descript.value = thisDevice["description"]!==undefined ? thisDevice["description"] : "";
			var provinceName = thisDevice["provinceName"] ? thisDevice["provinceName"] : "";
			var districtName = thisDevice["districtName"] ? thisDevice["districtName"] : "";
			var subDistrictName = thisDevice["subDistrictName"] ? thisDevice["subDistrictName"] : "";
			var hospName = thisDevice["hospName"] ? thisDevice["hospName"] : "";
			var hospId = thisDevice["hospId"] ? thisDevice["hospId"] : "";
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
			$('#modalAddDevice').modal('show');
		}
		
		function editGlu(deviceId){
			clearData();
			var thisDevice = allGlu[deviceId];
			console.log(thisDevice);
			selectedDevice = deviceId;
			document.all.divGlu.style.display = "none";
			document.all.divBp.style.display = "none";
			document.all.btSaveBp.style.display = "none";
			document.all.btSaveGlu.style.display = "inline";
			document.all.btSaveCard.style.display = "none";
			document.all.divSpo2.style.display = "none";
			document.all.divWeight.style.display = "none";
			document.all.divWeightHeight.style.display = "none";
			document.all.divTemp.style.display = "none";
			document.all.addDeviceMac.innerHTML = "Mac Address";

			document.all.deviceId.value = thisDevice["deviceId"];
			document.all.deviceName.value = thisDevice["deviceName"];
			document.all.descript.value = thisDevice["description"]!==undefined ? thisDevice["description"] : "";
			var provinceName = thisDevice["provinceName"] ? thisDevice["provinceName"] : "";
			var districtName = thisDevice["districtName"] ? thisDevice["districtName"] : "";
			var subDistrictName = thisDevice["subDistrictName"] ? thisDevice["subDistrictName"] : "";
			var hospName = thisDevice["hospName"] ? thisDevice["hospName"] : "";
			var hospId = thisDevice["hospId"] ? thisDevice["hospId"] : "";
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
			$('#modalAddDevice').modal('show');
		}
		
		function addCardReader(){
			clearData();
			document.all.divGlu.style.display = "inline";
			document.all.divBp.style.display = "inline";
			document.all.btSaveBp.style.display = "none";
			document.all.btSaveGlu.style.display = "none";
			document.all.btSaveCard.style.display = "inline";
			document.all.divSpo2.style.display = "inline";
			document.all.divWeight.style.display = "inline";
			document.all.divWeightHeight.style.display = "inline";
			document.all.divTemp.style.display = "inline";
			document.all.btSaveSpo2.style.display = "none";
			document.all.btSaveWeight.style.display = "none";
			document.all.btSaveWeightHeight.style.display = "none";
			document.all.btSaveTemp.style.display = "none";
			document.all.addDeviceMac.innerHTML = "Android Id";
			$('#modalAddDevice').modal('show');
		}
		
		function addBp(){
			clearData();
			document.all.divGlu.style.display = "none";
			document.all.divBp.style.display = "none";
			document.all.btSaveBp.style.display = "inline";
			document.all.btSaveGlu.style.display = "none";
			document.all.btSaveCard.style.display = "none";
			document.all.divSpo2.style.display = "none";
			document.all.divWeight.style.display = "none";
			document.all.divWeightHeight.style.display = "none";
			document.all.divTemp.style.display = "none";
			document.all.btSaveSpo2.style.display = "none";
			document.all.btSaveWeight.style.display = "none";
			document.all.btSaveWeightHeight.style.display = "none";
			document.all.btSaveTemp.style.display = "none";
			document.all.addDeviceMac.innerHTML = "Mac Address";
			$('#modalAddDevice').modal('show');
		}
		
		function addGlu(){
			clearData();
			document.all.divGlu.style.display = "none";
			document.all.divBp.style.display = "none";
			document.all.btSaveBp.style.display = "none";
			document.all.btSaveGlu.style.display = "inline";
			document.all.btSaveCard.style.display = "none";
			document.all.divSpo2.style.display = "none";
			document.all.divWeight.style.display = "none";
			document.all.divWeightHeight.style.display = "none";
			document.all.divTemp.style.display = "none";
			document.all.btSaveSpo2.style.display = "none";
			document.all.btSaveWeight.style.display = "none";
			document.all.btSaveWeightHeight.style.display = "none";
			document.all.btSaveTemp.style.display = "none";
			document.all.addDeviceMac.innerHTML = "Mac Address";
			$('#modalAddDevice').modal('show');
		}
	
		function getDataInForm(id) {
			var myform = $('#' + id);
			var serialized = myform.serialize();
			return serialized;
		}
		
		function saveCardReader(){
			var thisDeviceId = document.all.deviceId.value;
			var thisDeviceName = document.all.deviceName.value;
			var thisProvince = document.all.provinceId.selectedIndex;
			var thisDistrict = document.all.districtId.selectedIndex;
			var thisSubDistrict = document.all.subDistrictId.selectedIndex;
			var thisHospital = document.all.hospId.selectedIndex;
			var thisBpDevice = document.all.bpDeviceId.selectedIndex;
			var thisGlucoseDevice = document.all.glucoseDeviceId.selectedIndex;
			var thisSpo2Device = document.all.spo2DeviceId.selectedIndex;
			var thisWeightDevice = document.all.weightDeviceId.selectedIndex;
			var thisWeightHeightDevice = document.all.weightHeightDeviceId.selectedIndex;
			var thisTempDevice = document.all.tempDeviceId.selectedIndex;

			if(thisDeviceId==""){
				swal("กรุณากรอก MAC Address");
			}else if(thisDeviceName==""){
				swal("กรุณากรอกชื่ออุปกรณ์");	
			}else if(thisProvince==0){
				swal("กรุณาเลือกจังหวัด");	
			}else if(thisDistrict==0){
				swal("กรุณาเลือกอำเภอ");	
			}else if(thisSubDistrict==0){
				swal("กรุณาเลือกตำบล");	
			}else if(thisHospital==0){
				swal("กรุณาเลือกโรงพยาบาล");	
			}else{
				if(selectedDevice==""){
					var thisUrl = "<?=base_url('index.php/management/addcardreader')?>";
				}else{
					var thisUrl = "<?=base_url('index.php/management/updatecardreader')?>";
				}
				$.ajax({
					url: thisUrl,
					type: "POST",
					data: getDataInForm("formSaveCard"),
					success: function (response) {
						var response = JSON.parse(response);
						if(response["code"]=="0000"){
							swal({
								text: "บันทึกสำเร็จ!",
								type: "success"
							}).then(function() {
								window.location.replace("<?php echo base_url('index.php/management/devicelist/3')?>");
							});
						}else if(response["code"]=="DEVICE0004"){
							swal("มีการบันทึกอุปกรณ์ที่มี MAC Address นี้แล้ว");
						}else if(response["code"]=="DEVICE0005"){
							swal("มีอุปกรณ์อื่นเชื่อมต่อกับเครื่องวัดน้ำตาลนี้แล้ว");
						}else if(response["code"]=="DEVICE0006"){
							swal("มีอุปกรณ์อื่นเชื่อมต่อกับเครื่องวัดความดันนี้แล้ว");
						}else{
							swal("บันทึกไม่สำเร็จ");		
						}
					}
				});
			}
		}

		function deleteCardReader(deviceId){
			swal({
				title: "แน่ใจหรือ?",
				text: "คุณต้องการลบรายการที่เลือกหรือไม่",
				icon: "warning",
				buttons: true,
				dangerMode: true,
				})
				.then((willDelete) => {
					if (willDelete) {
						var thisUrl = "<?=base_url('index.php/management/deletecardreader')?>";
						$.ajax({
							url: thisUrl,
							type: "POST",
							data: {"deviceId":deviceId},
							success: function (response) {
								var response = JSON.parse(response);
								if(response["code"]=="0000"){
									swal({
										text: "ลบรายการสำเร็จ!",
										type: "success"
									}).then(function() {
										window.location.replace("<?php echo base_url('index.php/management/devicelist/3')?>");								
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
		
		function saveBp(){
			var thisDeviceId = document.all.deviceId.value;
			var thisDeviceName = document.all.deviceName.value;
			var thisProvince = document.all.provinceId.selectedIndex;
			var thisDistrict = document.all.districtId.selectedIndex;
			var thisSubDistrict = document.all.subDistrictId.selectedIndex;
			var thisHospital = document.all.hospId.selectedIndex;
			if(thisDeviceId==""){
				swal("กรุณากรอก MAC Address");
			}else if(thisDeviceName==""){
				swal("กรุณากรอกชื่ออุปกรณ์");	
			}else if(thisProvince==0){
				swal("กรุณาเลือกจังหวัด");	
			}else if(thisDistrict==0){
				swal("กรุณาเลือกอำเภอ");	
			}else if(thisSubDistrict==0){
				swal("กรุณาเลือกตำบล");	
			}else if(thisHospital==0){
				swal("กรุณาเลือกโรงพยาบาล");	
			}else{
				if(selectedDevice==""){
					var thisUrl = "<?=base_url('index.php/management/addbp')?>";
				}else{
					var thisUrl = "<?=base_url('index.php/management/updatebp')?>";
				}
				$.ajax({
					url: thisUrl,
					type: "POST",
					data: getDataInForm("formSaveCard"),
					success: function (response) {
						var response = JSON.parse(response);
						if(response["code"]=="0000"){
							swal({
								text: "บันทึกสำเร็จ!",
								type: "success"
							}).then(function() {
								window.location.replace("<?php echo base_url('index.php/management/devicelist/1')?>");
							});
						}else if(response["code"]=="DEVICE0004"){
							swal("มีการบันทึกอุปกรณ์ที่มี MAC Address นี้แล้ว");
						}else if(response["code"]=="DEVICE0005"){
							swal("มีอุปกรณ์อื่นเชื่อมต่อกับเครื่องวัดน้ำตาลนี้แล้ว");
						}else if(response["code"]=="DEVICE0006"){
							swal("มีอุปกรณ์อื่นเชื่อมต่อกับเครื่องวัดความดันนี้แล้ว");
						}else{
							swal("บันทึกไม่สำเร็จ");		
						}
					}
				});
			}
		}

		function deleteBp(deviceId){
			swal({
				title: "แน่ใจหรือ?",
				text: "คุณต้องการลบรายการที่เลือกหรือไม่",
				icon: "warning",
				buttons: true,
				dangerMode: true,
				})
				.then((willDelete) => {
					if (willDelete) {
						var thisUrl = "<?=base_url('index.php/management/deletebp')?>";
						$.ajax({
							url: thisUrl,
							type: "POST",
							data: {"deviceId":deviceId},
							success: function (response) {
								var response = JSON.parse(response);
								if(response["code"]=="0000"){
									swal({
										text: "ลบรายการสำเร็จ!",
										type: "success"
									}).then(function() {
										window.location.replace("<?php echo base_url('index.php/management/devicelist/1')?>");								
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
		
		function saveGlu(){
			var thisDeviceId = document.all.deviceId.value;
			var thisDeviceName = document.all.deviceName.value;
			var thisProvince = document.all.provinceId.selectedIndex;
			var thisDistrict = document.all.districtId.selectedIndex;
			var thisSubDistrict = document.all.subDistrictId.selectedIndex;
			var thisHospital = document.all.hospId.selectedIndex;
			if(thisDeviceId==""){
				swal("กรุณากรอก MAC Address");
			}else if(thisDeviceName==""){
				swal("กรุณากรอกชื่ออุปกรณ์");	
			}else if(thisProvince==0){
				swal("กรุณาเลือกจังหวัด");	
			}else if(thisDistrict==0){
				swal("กรุณาเลือกอำเภอ");	
			}else if(thisSubDistrict==0){
				swal("กรุณาเลือกตำบล");	
			}else if(thisHospital==0){
				swal("กรุณาเลือกโรงพยาบาล");	
			}else{
				if(selectedDevice==""){
					var thisUrl = "<?=base_url('index.php/management/addglucose')?>";
				}else{
					var thisUrl = "<?=base_url('index.php/management/updateglucose')?>";
				}
				$.ajax({
					url: thisUrl,
					type: "POST",
					data: getDataInForm("formSaveCard"),
					success: function (response) {
						var response = JSON.parse(response);
						if(response["code"]=="0000"){
							swal({
								text: "บันทึกสำเร็จ!",
								type: "success"
							}).then(function() {
								window.location.replace("<?php echo base_url('index.php/management/devicelist/2')?>");
							});
						}else if(response["code"]=="DEVICE0004"){
							swal("มีการบันทึกอุปกรณ์ที่มี MAC Address นี้แล้ว");
						}else if(response["code"]=="DEVICE0005"){
							swal("มีอุปกรณ์อื่นเชื่อมต่อกับเครื่องวัดน้ำตาลนี้แล้ว");
						}else if(response["code"]=="DEVICE0006"){
							swal("มีอุปกรณ์อื่นเชื่อมต่อกับเครื่องวัดความดันนี้แล้ว");
						}else{
							swal("บันทึกไม่สำเร็จ");		
						}
					}
				});
			}
		}

		function deleteGlu(deviceId){
			swal({
				title: "แน่ใจหรือ?",
				text: "คุณต้องการลบรายการที่เลือกหรือไม่",
				icon: "warning",
				buttons: true,
				dangerMode: true,
				})
				.then((willDelete) => {
					if (willDelete) {
						var thisUrl = "<?=base_url('index.php/management/deleteglucose')?>";
						$.ajax({
							url: thisUrl,
							type: "POST",
							data: {"deviceId":deviceId},
							success: function (response) {
								var response = JSON.parse(response);
								if(response["code"]=="0000"){
									swal({
										text: "ลบรายการสำเร็จ!",
										type: "success"
									}).then(function() {
										window.location.replace("<?php echo base_url('index.php/management/devicelist/2')?>");
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

		function addSpo2(){
			clearData();
			document.all.divGlu.style.display = "none";
			document.all.divBp.style.display = "none";
			document.all.divSpo2.style.display = "none";
			document.all.divWeight.style.display = "none";
			document.all.divWeightHeight.style.display = "none";
			document.all.divTemp.style.display = "none";
			document.all.btSaveBp.style.display = "none";
			document.all.btSaveGlu.style.display = "none";
			document.all.btSaveCard.style.display = "none";
			document.all.btSaveSpo2.style.display = "inline";
			document.all.btSaveWeight.style.display = "none";
			document.all.btSaveWeightHeight.style.display = "none";
			document.all.btSaveTemp.style.display = "none";
			document.all.addDeviceMac.innerHTML = "Mac Address";
			$('#modalAddDevice').modal('show');
		}

		function addWeight(){
			clearData();
			document.all.divGlu.style.display = "none";
			document.all.divBp.style.display = "none";
			document.all.divSpo2.style.display = "none";
			document.all.divWeight.style.display = "none";
			document.all.divWeightHeight.style.display = "none";
			document.all.divTemp.style.display = "none";
			document.all.btSaveBp.style.display = "none";
			document.all.btSaveGlu.style.display = "none";
			document.all.btSaveCard.style.display = "none";
			document.all.btSaveSpo2.style.display = "none";
			document.all.btSaveWeight.style.display = "inline";
			document.all.btSaveWeightHeight.style.display = "none";
			document.all.btSaveTemp.style.display = "none";
			document.all.addDeviceMac.innerHTML = "Mac Address";
			$('#modalAddDevice').modal('show');
		}

		function addWeightHeight(){
			clearData();
			document.all.divGlu.style.display = "none";
			document.all.divBp.style.display = "none";
			document.all.divSpo2.style.display = "none";
			document.all.divWeight.style.display = "none";
			document.all.divWeightHeight.style.display = "none";
			document.all.divTemp.style.display = "none";
			document.all.btSaveBp.style.display = "none";
			document.all.btSaveGlu.style.display = "none";
			document.all.btSaveCard.style.display = "none";
			document.all.btSaveSpo2.style.display = "none";
			document.all.btSaveWeight.style.display = "none";
			document.all.btSaveWeightHeight.style.display = "inline";
			document.all.btSaveTemp.style.display = "none";
			document.all.addDeviceMac.innerHTML = "Mac Address";
			$('#modalAddDevice').modal('show');
		}

		function addTemp(){
			clearData();
			document.all.divGlu.style.display = "none";
			document.all.divBp.style.display = "none";
			document.all.divSpo2.style.display = "none";
			document.all.divWeight.style.display = "none";
			document.all.divWeightHeight.style.display = "none";
			document.all.divTemp.style.display = "none";
			document.all.btSaveBp.style.display = "none";
			document.all.btSaveGlu.style.display = "none";
			document.all.btSaveCard.style.display = "none";
			document.all.btSaveSpo2.style.display = "none";
			document.all.btSaveWeight.style.display = "none";
			document.all.btSaveWeightHeight.style.display = "none";
			document.all.btSaveTemp.style.display = "inline";
			document.all.addDeviceMac.innerHTML = "Mac Address";
			$('#modalAddDevice').modal('show');
		}

		function editSpo2(deviceId){
			clearData();
			var thisDevice = allSpo2[deviceId];
			console.log(thisDevice);
			selectedDevice = deviceId;
			document.all.divGlu.style.display = "none";
			document.all.divBp.style.display = "none";
			document.all.btSaveBp.style.display = "none";
			document.all.btSaveGlu.style.display = "none";
			document.all.btSaveCard.style.display = "none";
			document.all.divSpo2.style.display = "none";
			document.all.divWeight.style.display = "none";
			document.all.divWeightHeight.style.display = "none";
			document.all.divTemp.style.display = "none";
			document.all.btSaveSpo2.style.display = "inline";
			document.all.btSaveWeight.style.display = "none";
			document.all.btSaveWeightHeight.style.display = "none";
			document.all.btSaveTemp.style.display = "none";
			document.all.addDeviceMac.innerHTML = "Mac Address";

			document.all.deviceId.value = thisDevice["deviceId"];
			document.all.deviceName.value = thisDevice["deviceName"];
			document.all.descript.value = thisDevice["description"]!==undefined ? thisDevice["description"] : "";
			var provinceName = thisDevice["provinceName"] ? thisDevice["provinceName"] : "";
			var districtName = thisDevice["districtName"] ? thisDevice["districtName"] : "";
			var subDistrictName = thisDevice["subDistrictName"] ? thisDevice["subDistrictName"] : "";
			var hospName = thisDevice["hospName"] ? thisDevice["hospName"] : "";
			var hospId = thisDevice["hospId"] ? thisDevice["hospId"] : "";
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
			$('#modalAddDevice').modal('show');
		}

		function editWeight(deviceId){
			clearData();
			var thisDevice = allWeight[deviceId];
			console.log(thisDevice);
			selectedDevice = deviceId;
			document.all.divGlu.style.display = "none";
			document.all.divBp.style.display = "none";
			document.all.btSaveBp.style.display = "none";
			document.all.btSaveGlu.style.display = "none";
			document.all.btSaveCard.style.display = "none";
			document.all.divSpo2.style.display = "none";
			document.all.divWeight.style.display = "none";
			document.all.divWeightHeight.style.display = "none";
			document.all.divTemp.style.display = "none";
			document.all.btSaveSpo2.style.display = "none";
			document.all.btSaveWeight.style.display = "inline";
			document.all.btSaveWeightHeight.style.display = "none";
			document.all.btSaveTemp.style.display = "none";
			document.all.addDeviceMac.innerHTML = "Mac Address";

			document.all.deviceId.value = thisDevice["deviceId"];
			document.all.deviceName.value = thisDevice["deviceName"];
			document.all.descript.value = thisDevice["description"]!==undefined ? thisDevice["description"] : "";
			var provinceName = thisDevice["provinceName"] ? thisDevice["provinceName"] : "";
			var districtName = thisDevice["districtName"] ? thisDevice["districtName"] : "";
			var subDistrictName = thisDevice["subDistrictName"] ? thisDevice["subDistrictName"] : "";
			var hospName = thisDevice["hospName"] ? thisDevice["hospName"] : "";
			var hospId = thisDevice["hospId"] ? thisDevice["hospId"] : "";
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
			$('#modalAddDevice').modal('show');
		}

		function editWeightHeight(deviceId){
			clearData();
			var thisDevice = allWeightHeight[deviceId];
			console.log(thisDevice);
			selectedDevice = deviceId;
			document.all.divGlu.style.display = "none";
			document.all.divBp.style.display = "none";
			document.all.btSaveBp.style.display = "none";
			document.all.btSaveGlu.style.display = "none";
			document.all.btSaveCard.style.display = "none";
			document.all.divSpo2.style.display = "none";
			document.all.divWeight.style.display = "none";
			document.all.divWeightHeight.style.display = "none";
			document.all.divTemp.style.display = "none";
			document.all.btSaveSpo2.style.display = "none";
			document.all.btSaveWeight.style.display = "none";
			document.all.btSaveWeightHeight.style.display = "inline";
			document.all.btSaveTemp.style.display = "none";
			document.all.addDeviceMac.innerHTML = "Mac Address";

			document.all.deviceId.value = thisDevice["deviceId"];
			document.all.deviceName.value = thisDevice["deviceName"];
			document.all.descript.value = thisDevice["description"]!==undefined ? thisDevice["description"] : "";
			var provinceName = thisDevice["provinceName"] ? thisDevice["provinceName"] : "";
			var districtName = thisDevice["districtName"] ? thisDevice["districtName"] : "";
			var subDistrictName = thisDevice["subDistrictName"] ? thisDevice["subDistrictName"] : "";
			var hospName = thisDevice["hospName"] ? thisDevice["hospName"] : "";
			var hospId = thisDevice["hospId"] ? thisDevice["hospId"] : "";
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
			$('#modalAddDevice').modal('show');
		}

		function editTemp(deviceId){
			clearData();
			var thisDevice = allTemp[deviceId];
			console.log(thisDevice);
			selectedDevice = deviceId;
			document.all.divGlu.style.display = "none";
			document.all.divBp.style.display = "none";
			document.all.btSaveBp.style.display = "none";
			document.all.btSaveGlu.style.display = "none";
			document.all.btSaveCard.style.display = "none";
			document.all.divSpo2.style.display = "none";
			document.all.divWeight.style.display = "none";
			document.all.divWeightHeight.style.display = "none";
			document.all.divTemp.style.display = "none";
			document.all.btSaveSpo2.style.display = "none";
			document.all.btSaveWeight.style.display = "none";
			document.all.btSaveWeightHeight.style.display = "none";
			document.all.btSaveTemp.style.display = "inline";
			document.all.addDeviceMac.innerHTML = "Mac Address";

			document.all.deviceId.value = thisDevice["deviceId"];
			document.all.deviceName.value = thisDevice["deviceName"];
			document.all.descript.value = thisDevice["description"]!==undefined ? thisDevice["description"] : "";
			var provinceName = thisDevice["provinceName"] ? thisDevice["provinceName"] : "";
			var districtName = thisDevice["districtName"] ? thisDevice["districtName"] : "";
			var subDistrictName = thisDevice["subDistrictName"] ? thisDevice["subDistrictName"] : "";
			var hospName = thisDevice["hospName"] ? thisDevice["hospName"] : "";
			var hospId = thisDevice["hospId"] ? thisDevice["hospId"] : "";
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
			$('#modalAddDevice').modal('show');
		}

		function deleteSpo2(deviceId){
			swal({
				title: "แน่ใจหรือ?",
				text: "คุณต้องการลบรายการที่เลือกหรือไม่",
				icon: "warning",
				buttons: true,
				dangerMode: true,
				})
				.then((willDelete) => {
					if (willDelete) {
						var thisUrl = "<?=base_url('index.php/management/deletespo2')?>";
						$.ajax({
							url: thisUrl,
							type: "POST",
							data: {"deviceId":deviceId},
							success: function (response) {
								var response = JSON.parse(response);
								if(response["code"]=="0000"){
									swal({
										text: "ลบรายการสำเร็จ!",
										type: "success"
									}).then(function() {
										window.location.replace("<?php echo base_url('index.php/management/devicelist/4')?>");								
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

		function deleteWeight(deviceId){
			swal({
				title: "แน่ใจหรือ?",
				text: "คุณต้องการลบรายการที่เลือกหรือไม่",
				icon: "warning",
				buttons: true,
				dangerMode: true,
				})
				.then((willDelete) => {
					if (willDelete) {
						var thisUrl = "<?=base_url('index.php/management/deleteweight')?>";
						$.ajax({
							url: thisUrl,
							type: "POST",
							data: {"deviceId":deviceId},
							success: function (response) {
								var response = JSON.parse(response);
								if(response["code"]=="0000"){
									swal({
										text: "ลบรายการสำเร็จ!",
										type: "success"
									}).then(function() {
										window.location.replace("<?php echo base_url('index.php/management/devicelist/5')?>");								
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

		function deleteWeightHeight(deviceId){
			swal({
				title: "แน่ใจหรือ?",
				text: "คุณต้องการลบรายการที่เลือกหรือไม่",
				icon: "warning",
				buttons: true,
				dangerMode: true,
				})
				.then((willDelete) => {
					if (willDelete) {
						var thisUrl = "<?=base_url('index.php/management/deleteweightheight')?>";
						$.ajax({
							url: thisUrl,
							type: "POST",
							data: {"deviceId":deviceId},
							success: function (response) {
								var response = JSON.parse(response);
								if(response["code"]=="0000"){
									swal({
										text: "ลบรายการสำเร็จ!",
										type: "success"
									}).then(function() {
										window.location.replace("<?php echo base_url('index.php/management/devicelist/6')?>");								
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

		function deleteTemp(deviceId){
			swal({
				title: "แน่ใจหรือ?",
				text: "คุณต้องการลบรายการที่เลือกหรือไม่",
				icon: "warning",
				buttons: true,
				dangerMode: true,
				})
				.then((willDelete) => {
					if (willDelete) {
						var thisUrl = "<?=base_url('index.php/management/deletetemp')?>";
						$.ajax({
							url: thisUrl,
							type: "POST",
							data: {"deviceId":deviceId},
							success: function (response) {
								var response = JSON.parse(response);
								if(response["code"]=="0000"){
									swal({
										text: "ลบรายการสำเร็จ!",
										type: "success"
									}).then(function() {
										window.location.replace("<?php echo base_url('index.php/management/devicelist/7')?>");								
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
		
		function saveSpo2(){
			var thisDeviceId = document.all.deviceId.value;
			var thisDeviceName = document.all.deviceName.value;
			var thisProvince = document.all.provinceId.selectedIndex;
			var thisDistrict = document.all.districtId.selectedIndex;
			var thisSubDistrict = document.all.subDistrictId.selectedIndex;
			var thisHospital = document.all.hospId.selectedIndex;
			if(thisDeviceId==""){
				swal("กรุณากรอก MAC Address");
			}else if(thisDeviceName==""){
				swal("กรุณากรอกชื่ออุปกรณ์");	
			}else if(thisProvince==0){
				swal("กรุณาเลือกจังหวัด");	
			}else if(thisDistrict==0){
				swal("กรุณาเลือกอำเภอ");	
			}else if(thisSubDistrict==0){
				swal("กรุณาเลือกตำบล");	
			}else if(thisHospital==0){
				swal("กรุณาเลือกโรงพยาบาล");	
			}else{
				if(selectedDevice==""){
					var thisUrl = "<?=base_url('index.php/management/addspo2')?>";
				}else{
					var thisUrl = "<?=base_url('index.php/management/updatespo2')?>";
				}
				$.ajax({
					url: thisUrl,
					type: "POST",
					data: getDataInForm("formSaveCard"),
					success: function (response) {
						var response = JSON.parse(response);
						if(response["code"]=="0000"){
							swal({
								text: "บันทึกสำเร็จ!",
								type: "success"
							}).then(function() {
								window.location.replace("<?php echo base_url('index.php/management/devicelist/4')?>");
							});
						}else if(response["code"]=="DEVICE0004"){
							swal("มีการบันทึกอุปกรณ์ที่มี MAC Address นี้แล้ว");
						}else if(response["code"]=="DEVICE0005"){
							swal("มีอุปกรณ์อื่นเชื่อมต่อกับเครื่องวัดน้ำตาลนี้แล้ว");
						}else if(response["code"]=="DEVICE0006"){
							swal("มีอุปกรณ์อื่นเชื่อมต่อกับเครื่องวัดความดันนี้แล้ว");
						}else{
							swal("บันทึกไม่สำเร็จ");		
						}
					}
				});
			}
		}
		
		function saveWeight(){
			var thisDeviceId = document.all.deviceId.value;
			var thisDeviceName = document.all.deviceName.value;
			var thisProvince = document.all.provinceId.selectedIndex;
			var thisDistrict = document.all.districtId.selectedIndex;
			var thisSubDistrict = document.all.subDistrictId.selectedIndex;
			var thisHospital = document.all.hospId.selectedIndex;
			if(thisDeviceId==""){
				swal("กรุณากรอก MAC Address");
			}else if(thisDeviceName==""){
				swal("กรุณากรอกชื่ออุปกรณ์");	
			}else if(thisProvince==0){
				swal("กรุณาเลือกจังหวัด");	
			}else if(thisDistrict==0){
				swal("กรุณาเลือกอำเภอ");	
			}else if(thisSubDistrict==0){
				swal("กรุณาเลือกตำบล");	
			}else if(thisHospital==0){
				swal("กรุณาเลือกโรงพยาบาล");	
			}else{
				if(selectedDevice==""){
					var thisUrl = "<?=base_url('index.php/management/addweight')?>";
				}else{
					var thisUrl = "<?=base_url('index.php/management/updateweight')?>";
				}
				$.ajax({
					url: thisUrl,
					type: "POST",
					data: getDataInForm("formSaveCard"),
					success: function (response) {
						var response = JSON.parse(response);
						if(response["code"]=="0000"){
							swal({
								text: "บันทึกสำเร็จ!",
								type: "success"
							}).then(function() {
								window.location.replace("<?php echo base_url('index.php/management/devicelist/5')?>");
							});
						}else if(response["code"]=="DEVICE0004"){
							swal("มีการบันทึกอุปกรณ์ที่มี MAC Address นี้แล้ว");
						}else if(response["code"]=="DEVICE0005"){
							swal("มีอุปกรณ์อื่นเชื่อมต่อกับเครื่องวัดน้ำตาลนี้แล้ว");
						}else if(response["code"]=="DEVICE0006"){
							swal("มีอุปกรณ์อื่นเชื่อมต่อกับเครื่องวัดความดันนี้แล้ว");
						}else{
							swal("บันทึกไม่สำเร็จ");		
						}
					}
				});
			}
		}
		
		function saveWeightHeight(){
			var thisDeviceId = document.all.deviceId.value;
			var thisDeviceName = document.all.deviceName.value;
			var thisProvince = document.all.provinceId.selectedIndex;
			var thisDistrict = document.all.districtId.selectedIndex;
			var thisSubDistrict = document.all.subDistrictId.selectedIndex;
			var thisHospital = document.all.hospId.selectedIndex;
			if(thisDeviceId==""){
				swal("กรุณากรอก MAC Address");
			}else if(thisDeviceName==""){
				swal("กรุณากรอกชื่ออุปกรณ์");	
			}else if(thisProvince==0){
				swal("กรุณาเลือกจังหวัด");	
			}else if(thisDistrict==0){
				swal("กรุณาเลือกอำเภอ");	
			}else if(thisSubDistrict==0){
				swal("กรุณาเลือกตำบล");	
			}else if(thisHospital==0){
				swal("กรุณาเลือกโรงพยาบาล");	
			}else{
				if(selectedDevice==""){
					var thisUrl = "<?=base_url('index.php/management/addweightheight')?>";
				}else{
					var thisUrl = "<?=base_url('index.php/management/updateweightheight')?>";
				}
				$.ajax({
					url: thisUrl,
					type: "POST",
					data: getDataInForm("formSaveCard"),
					success: function (response) {
						var response = JSON.parse(response);
						if(response["code"]=="0000"){
							swal({
								text: "บันทึกสำเร็จ!",
								type: "success"
							}).then(function() {
								window.location.replace("<?php echo base_url('index.php/management/devicelist/6')?>");
							});
						}else if(response["code"]=="DEVICE0004"){
							swal("มีการบันทึกอุปกรณ์ที่มี MAC Address นี้แล้ว");
						}else if(response["code"]=="DEVICE0005"){
							swal("มีอุปกรณ์อื่นเชื่อมต่อกับเครื่องวัดน้ำตาลนี้แล้ว");
						}else if(response["code"]=="DEVICE0006"){
							swal("มีอุปกรณ์อื่นเชื่อมต่อกับเครื่องวัดความดันนี้แล้ว");
						}else{
							swal("บันทึกไม่สำเร็จ");		
						}
					}
				});
			}
		}
		
		function saveTemp(){
			var thisDeviceId = document.all.deviceId.value;
			var thisDeviceName = document.all.deviceName.value;
			var thisProvince = document.all.provinceId.selectedIndex;
			var thisDistrict = document.all.districtId.selectedIndex;
			var thisSubDistrict = document.all.subDistrictId.selectedIndex;
			var thisHospital = document.all.hospId.selectedIndex;
			if(thisDeviceId==""){
				swal("กรุณากรอก MAC Address");
			}else if(thisDeviceName==""){
				swal("กรุณากรอกชื่ออุปกรณ์");	
			}else if(thisProvince==0){
				swal("กรุณาเลือกจังหวัด");	
			}else if(thisDistrict==0){
				swal("กรุณาเลือกอำเภอ");	
			}else if(thisSubDistrict==0){
				swal("กรุณาเลือกตำบล");	
			}else if(thisHospital==0){
				swal("กรุณาเลือกโรงพยาบาล");	
			}else{
				if(selectedDevice==""){
					var thisUrl = "<?=base_url('index.php/management/addtemp')?>";
				}else{
					var thisUrl = "<?=base_url('index.php/management/updatetemp')?>";
				}
				$.ajax({
					url: thisUrl,
					type: "POST",
					data: getDataInForm("formSaveCard"),
					success: function (response) {
						var response = JSON.parse(response);
						if(response["code"]=="0000"){
							swal({
								text: "บันทึกสำเร็จ!",
								type: "success"
							}).then(function() {
								window.location.replace("<?php echo base_url('index.php/management/devicelist/7')?>");
							});
						}else if(response["code"]=="DEVICE0004"){
							swal("มีการบันทึกอุปกรณ์ที่มี MAC Address นี้แล้ว");
						}else if(response["code"]=="DEVICE0005"){
							swal("มีอุปกรณ์อื่นเชื่อมต่อกับเครื่องวัดน้ำตาลนี้แล้ว");
						}else if(response["code"]=="DEVICE0006"){
							swal("มีอุปกรณ์อื่นเชื่อมต่อกับเครื่องวัดความดันนี้แล้ว");
						}else{
							swal("บันทึกไม่สำเร็จ");		
						}
					}
				});
			}
		}

		function loadListSpo2(){
			var table = document.all.tbSpo2Device;
			table.innerHTML = '';
			var thisUrl = "<?=base_url('/index.php/management/getspo2list/')?>";
			$.ajax({
				url: thisUrl,
				success: function (response) {
					var response = JSON.parse(response);
					var data = response["data"]["spo2DeviceList"];
					if(response["code"]=="0000" && data!==undefined){
						for(var i = 0; i<data.length; i++){
							allSpo2[data[i]['deviceId']] = data[i];
							table.innerHTML += '<tr>'+
											'<td><b>'+data[i]['deviceId']+'</b></td>'+
											'<td>'+data[i]['deviceName']+'</td>'+
											'<td>'+data[i]['hospName']+' ('+data[i]['hospId']+')</td>'+
											'<td width="80px">'+
											'<div class="table-data-feature">'+
												'<button class="item" data-toggle="tooltip" data-placement="top" title="Edit" onclick="editSpo2('+"'"+data[i]['deviceId']+"'"+')">'+
													'<i class="zmdi zmdi-edit"></i>'+
												'</button>'+
												'<button class="item" data-toggle="tooltip" data-placement="top" title="Delete"onclick="deleteSpo2('+"'"+data[i]['deviceId']+"'"+')">'+
													'<i class="zmdi zmdi-delete"></i>'+
												'</button>'+
											'</div>'+
											'</td>'+
										'</tr>'
						}
						$('#tbSpo2DeviceHead').DataTable({
							"order": [],
							destroy: true,
							"aoColumns": [
									{ "bSortable": false },
									{ "bSortable": false },
									{ "bSortable": false },
									{ "bSortable": false },
								],
							
						} );
					}else{
						table.innerHTML = '';
						swal("ไม่พบข้อมูลเครื่องวัดออกซิเจนในเลือด");		
					}
				}
			});
		}

		function loadListWeight(){
			var table = document.all.tbWeightDevice;
			table.innerHTML = '';
			var thisUrl = "<?=base_url('/index.php/management/getweightlist/')?>";
			$.ajax({
				url: thisUrl,
				success: function (response) {
					var response = JSON.parse(response);
					var data = response["data"]["weightDeviceList"];
					if(response["code"]=="0000" && data!==undefined){
						for(var i = 0; i<data.length; i++){
							allWeight[data[i]['deviceId']] = data[i];
							table.innerHTML += '<tr>'+
											'<td><b>'+data[i]['deviceId']+'</b></td>'+
											'<td>'+data[i]['deviceName']+'</td>'+
											'<td>'+data[i]['hospName']+' ('+data[i]['hospId']+')</td>'+
											'<td width="80px">'+
											'<div class="table-data-feature">'+
												'<button class="item" data-toggle="tooltip" data-placement="top" title="Edit" onclick="editWeight('+"'"+data[i]['deviceId']+"'"+')">'+
													'<i class="zmdi zmdi-edit"></i>'+
												'</button>'+
												'<button class="item" data-toggle="tooltip" data-placement="top" title="Delete"onclick="deleteWeight('+"'"+data[i]['deviceId']+"'"+')">'+
													'<i class="zmdi zmdi-delete"></i>'+
												'</button>'+
											'</div>'+
											'</td>'+
										'</tr>'
						}
						$('#tbWeightDeviceHead').DataTable({
							"order": [],
							destroy: true,
							"aoColumns": [
									{ "bSortable": false },
									{ "bSortable": false },
									{ "bSortable": false },
									{ "bSortable": false },
								],
							
						} );
					}else{
						table.innerHTML = '';
						swal("ไม่พบข้อเครื่องชั่งน้ำหนัก");		
					}
				}
			});
		}

		function loadListWeightHeight(){
			var table = document.all.tbWeightHeightDevice;
			table.innerHTML = '';
			var thisUrl = "<?=base_url('/index.php/management/getweightheightlist/')?>";
			$.ajax({
				url: thisUrl,
				success: function (response) {
					var response = JSON.parse(response);
					var data = response["data"]["scaleDeviceList"];
					if(response["code"]=="0000" && data!==undefined){
						for(var i = 0; i<data.length; i++){
							allWeightHeight[data[i]['deviceId']] = data[i];
							table.innerHTML += '<tr>'+
											'<td><b>'+data[i]['deviceId']+'</b></td>'+
											'<td>'+data[i]['deviceName']+'</td>'+
											'<td>'+data[i]['hospName']+' ('+data[i]['hospId']+')</td>'+
											'<td width="80px">'+
											'<div class="table-data-feature">'+
												'<button class="item" data-toggle="tooltip" data-placement="top" title="Edit" onclick="editWeightHeight('+"'"+data[i]['deviceId']+"'"+')">'+
													'<i class="zmdi zmdi-edit"></i>'+
												'</button>'+
												'<button class="item" data-toggle="tooltip" data-placement="top" title="Delete"onclick="deleteWeightHeight('+"'"+data[i]['deviceId']+"'"+')">'+
													'<i class="zmdi zmdi-delete"></i>'+
												'</button>'+
											'</div>'+
											'</td>'+
										'</tr>'
						}
						$('#tbWeightHeightDeviceHead').DataTable({
							"order": [],
							destroy: true,
							"aoColumns": [
									{ "bSortable": false },
									{ "bSortable": false },
									{ "bSortable": false },
									{ "bSortable": false },
								],
							
						} );
					}else{
						table.innerHTML = '';
						swal("ไม่พบข้อเครื่องชั่งน้ำหนักวัดส่วนสูง");		
					}
				}
			});
		}

		function loadListTemp(){
			var table = document.all.tbTempDevice;
			table.innerHTML = '';
			var thisUrl = "<?=base_url('/index.php/management/gettemplist/')?>";
			$.ajax({
				url: thisUrl,
				success: function (response) {
					var response = JSON.parse(response);
					var data = response["data"]["tempDeviceList"];
					if(response["code"]=="0000" && data!==undefined){
						for(var i = 0; i<data.length; i++){
							allTemp[data[i]['deviceId']] = data[i];
							table.innerHTML += '<tr>'+
											'<td><b>'+data[i]['deviceId']+'</b></td>'+
											'<td>'+data[i]['deviceName']+'</td>'+
											'<td>'+data[i]['hospName']+' ('+data[i]['hospId']+')</td>'+
											'<td width="80px">'+
											'<div class="table-data-feature">'+
												'<button class="item" data-toggle="tooltip" data-placement="top" title="Edit" onclick="editTemp('+"'"+data[i]['deviceId']+"'"+')">'+
													'<i class="zmdi zmdi-edit"></i>'+
												'</button>'+
												'<button class="item" data-toggle="tooltip" data-placement="top" title="Delete"onclick="deleteTemp('+"'"+data[i]['deviceId']+"'"+')">'+
													'<i class="zmdi zmdi-delete"></i>'+
												'</button>'+
											'</div>'+
											'</td>'+
										'</tr>'
						}
						$('#tbTempDeviceHead').DataTable({
							"order": [],
							destroy: true,
							"aoColumns": [
									{ "bSortable": false },
									{ "bSortable": false },
									{ "bSortable": false },
									{ "bSortable": false },
								],
							
						} );
					}else{
						table.innerHTML = '';
						swal("ไม่พบข้อมูลเครื่องวัดอุณหภูมิ");		
					}
				}
			});
		}

		var tab = "<?php echo $tab?>";
		if(tab==1){
        	loadListBp();
		}else if(tab==2){
			loadListGlu()
		}else if(tab==3){
			loadListReader();
		}else if(tab==4){
			loadListSpo2();
		}else if(tab==5){
			loadListWeight();
		}else if(tab==6){
			loadListWeightHeight();
		}else if(tab==7){
			loadListTemp();
		}
    </script>
</body>
</html>
<!-- end document-->
