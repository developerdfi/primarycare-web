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
                        <li>
                            <a href="<?=base_url('/index.php/vital/main')?>">
                                <i class="fas fa-clock"></i>ประวัติ</a>
                        </li>
                        <li class="has-sub">
                            <a class="js-arrow" href="#">
                                <i class="far fa-clipboard"></i>การจัดการ</a>
                            <ul class="navbar-mobile-sub__list list-unstyled js-sub-list">
                                <li>
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
                        <li class="active">
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
                            <a class="js-arrow" href="#">
                                <i class="far fa-clipboard"></i>การจัดการ</a>
                            <ul class="navbar-mobile-sub__list list-unstyled js-sub-list">
                                <li>
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
                        <li class="active">
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
                            <a class="btn btn-logout dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                ผู้ใช้งาน: <?php echo $_SESSION["userName"]?>
                            </a>

                            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                <a class="dropdown-item"
                                    href="<?php echo base_url('index.php/login/logout')?>">Logout</a>
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
                        <div class="row m-t">
                            <form id="settingForm">
                                <div class="col-lg-12 pb-5">
                                    <div class="row">
                                        <div class="col-lg-12 pb-5">
                                            <h3 class="title-3 m-b-30"><b>ตั้งค่าระยะเวลาการเข้าใช้งาน</b></h3>
                                        </div>
                                        <div align="right" class="col-md-4">
                                            <div class="form-group">
                                                <span>ระยะเวลา Session หมดอายุ</span>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">

                                                <select name="sessionExpire" class="custom-select" style="width:100%">

                                                    <?php 
												foreach($sessionList['data'] as $i=>$val){
													if($settingList['data']['sessionExpire']==$val['sessionId']){
												?>
                                                    <option value="<?php echo $val['sessionId']?>" selected="selected">
                                                        <?php echo $val['sessionValue']?></option>
                                                    <?php
													}else{
												?>
                                                    <option value="<?php echo $val['sessionId']?>">
                                                        <?php echo $val['sessionValue']?></option>
                                                    <?php
															}
														}
												?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12 pb-5">
                                    <h3 class="title-3 m-b-30"><b>ตั้งค่าการแจ้งเตือน</b></h3>
                                </div>
                                <div class="col-lg-10 pb-5">
                                    <div class="row">
                                        <div align="right" class="col-md-4">
                                            <div class="form-group">
                                            </div>
                                        </div>
                                        <div align="center" class="col-md-4">
                                            <div class="form-group">
                                                <span>
                                                    <p style="color:#ffa037">ระดับอันตราย</p>
                                                </span>
                                            </div>
                                        </div>
                                        <div align="center" class="col-md-4">
                                            <div class="form-group">
                                                <span>
                                                    <p style="color:red">ระดับรุนแรง</p>
                                                </span>
                                            </div>
                                        </div>
                                        <div align="right" class="col-md-4">
                                            <div class="form-group">
                                                <span>ค่าชีพจร : </span>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <select name="pulseWarning" class="custom-select" style="width:100%">
                                                    <option value="<?php echo $settingList['data']['pulseWarning']?>"
                                                        selected="selected">
                                                        <?php echo $settingList['data']['pulseWarning']?></option>
                                                    <?php 
												foreach($pulseList['data'] as $i=>$val){
													if($settingList['data']['pulseWarning']!=$val['pulseValue']){
												?>
                                                    <option value="<?php echo $val['pulseValue']?>">
                                                        <?php echo $val['pulseValue']?></option>
                                                    <?php
															}
														}
												?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <select name="pulseCritical" class="custom-select" style="width:100%">
                                                    <option value="<?php echo $settingList['data']['pulseCritical']?>"
                                                        selected="selected">
                                                        <?php echo $settingList['data']['pulseCritical']?></option>
                                                    <?php 
												foreach($pulseList['data'] as $i=>$val){
													if($settingList['data']['pulseCritical']!=$val['pulseValue']){
												?>
                                                    <option value="<?php echo $val['pulseValue']?>">
                                                        <?php echo $val['pulseValue']?></option>
                                                    <?php
															}
														}
												?>
                                                </select>
                                            </div>
                                        </div>
                                        <div align="right" class="col-md-4">
                                            <div class="form-group">
                                                <span>ค่าความดันขณะหัวใจบีบตัว : </span>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <select name="bloodPressureSysWarning" class="custom-select"
                                                    style="width:100%">
                                                    <option
                                                        value="<?php echo $settingList['data']['bloodPressureSysWarning']?>"
                                                        selected="selected">
                                                        <?php echo $settingList['data']['bloodPressureSysWarning']?>
                                                    </option>
                                                    <?php 
												foreach($systolicList['data'] as $i=>$val){
													if($settingList['data']['bloodPressureSysWarning']!=$val['bloodPressureSysValue']){
												?>
                                                    <option value="<?php echo $val['bloodPressureSysValue']?>">
                                                        <?php echo $val['bloodPressureSysValue']?></option>
                                                    <?php
															}
														}
												?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <select name="bloodPressureSysCritical" class="custom-select"
                                                    style="width:100%">
                                                    <option
                                                        value="<?php echo $settingList['data']['bloodPressureSysCritical']?>"
                                                        selected="selected">
                                                        <?php echo $settingList['data']['bloodPressureSysCritical']?>
                                                    </option>
                                                    <?php 
												foreach($systolicList['data'] as $i=>$val){
													if($settingList['data']['bloodPressureSysCritical']!=$val['bloodPressureSysValue']){
												?>
                                                    <option value="<?php echo $val['bloodPressureSysValue']?>">
                                                        <?php echo $val['bloodPressureSysValue']?></option>
                                                    <?php
															}
														}
												?>
                                                </select>
                                            </div>
                                        </div>
                                        <div align="right" class="col-md-4">
                                            <div class="form-group">
                                                <span>ค่าความดันขณะหัวใจคลายตัว : </span>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <select name="bloodPressureDiaWarning" class="custom-select"
                                                    style="width:100%">
                                                    <option
                                                        value="<?php echo $settingList['data']['bloodPressureDiaWarning']?>"
                                                        selected="selected">
                                                        <?php echo $settingList['data']['bloodPressureDiaWarning']?>
                                                    </option>
                                                    <?php 
												foreach($diastolicList['data'] as $i=>$val){
													if($settingList['data']['bloodPressureDiaWarning']!=$val['bloodPressureDiaValue']){
												?>
                                                    <option value="<?php echo $val['bloodPressureDiaValue']?>">
                                                        <?php echo $val['bloodPressureDiaValue']?></option>
                                                    <?php
															}
														}
												?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <select name="bloodPressureDiaCritical" class="custom-select"
                                                    style="width:100%">
                                                    <option
                                                        value="<?php echo $settingList['data']['bloodPressureDiaCritical']?>"
                                                        selected="selected">
                                                        <?php echo $settingList['data']['bloodPressureDiaCritical']?>
                                                    </option>
                                                    <?php 
												foreach($diastolicList['data'] as $i=>$val){
													if($settingList['data']['bloodPressureDiaCritical']!=$val['bloodPressureDiaValue']){
												?>
                                                    <option value="<?php echo $val['bloodPressureDiaValue']?>">
                                                        <?php echo $val['bloodPressureDiaValue']?></option>
                                                    <?php
															}
														}
												?>
                                                </select>
                                            </div>
                                        </div>
                                        <div align="right" class="col-md-4">
                                            <div class="form-group">
                                                <span>ค่าน้ำตาลกลูโคส : </span>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <select name="glucoseWarning" class="custom-select" style="width:100%">
                                                    <option value="<?php echo $settingList['data']['glucoseWarning']?>"
                                                        selected="selected">
                                                        <?php echo $settingList['data']['glucoseWarning']?></option>
                                                    <?php 
												foreach($sugarList['data'] as $i=>$val){
													if($settingList['data']['glucoseWarning']!=$val['glucoseValue']){
												?>
                                                    <option value="<?php echo $val['glucoseValue']?>">
                                                        <?php echo $val['glucoseValue']?></option>
                                                    <?php
															}
														}
												?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <select name="glucoseCritical" class="custom-select" style="width:100%">
                                                    <option value="<?php echo $settingList['data']['glucoseCritical']?>"
                                                        selected="selected">
                                                        <?php echo $settingList['data']['glucoseCritical']?></option>
                                                    <?php 
												foreach($sugarList['data'] as $i=>$val){
													if($settingList['data']['glucoseCritical']!=$val['glucoseValue']){
												?>
                                                    <option value="<?php echo $val['glucoseValue']?>">
                                                        <?php echo $val['glucoseValue']?></option>
                                                    <?php
															}
														}
												?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <hr class="mt-2 mb-3">
                                            <div align="center" class="col-md-12">
                                                <button class="btn btn-style-1 btn-warning" type="button"
                                                    onclick="updateSetting()">บันทึก</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

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
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <!-- Main JS-->
    <script src="<?php echo base_url() ?>assets/js/main.js"></script>
    <script type="text/javascript">
    function getDataInForm(id) {
        var myform = $('#' + id);
        var serialized = myform.serialize();
        return serialized;
    }

    function updateSetting() {
        $.ajax({
            url: "<?=base_url('index.php/setting/updateSetting')?>",
            type: "POST",
            data: getDataInForm("settingForm"),
            success: function(response) {
                var response = JSON.parse(response);
                if (response["code"] == "0000") {
                    swal("บันทึกการตั้งค่าสำเร็จ");
                } else {
                    swal("ไม่สามารถบันทึกการตั้งค่าได้");
                }
            }
        });
    }
    </script>
</body>

</html>
<!-- end document-->