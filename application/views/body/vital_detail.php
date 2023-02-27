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
                        <li class="active">
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
                        <div class="row m-t">
                            <div class="col-md-12">
								<!-- DATA TABLE-->
								<h3 class="title-3 m-b-30">
                                    <i class="zmdi zmdi-account-calendar"></i><b>ข้อมูลการตรวจของ&nbsp;<span id="ptName"></span></b></h3>
                                <div class="table-responsive m-b-40">
                                    <table class="table table-borderless table-data3" id="tbVitalHead">
                                        <thead>
                                            <tr>
                                                <th style="font-size:16px; vertical-align:middle; text-align:left; width:15%">วัน-เวลาตรวจ</th>
                                                <th style="font-size:16px; vertical-align:middle; text-align:center; width:10%">ความดัน<br>(mmHg)</th>
                                                <th style="font-size:16px; vertical-align:middle; text-align:center; width:10%">ชีพจร<br>(/min)</th>
                                                <th style="font-size:16px; vertical-align:middle; text-align:center; width:10%">น้ำตาลในเลือด<br>(mg/dL)</th>
                                                <th style="font-size:16px; vertical-align:middle; text-align:center; width:10%">ส่วนสูง<br>(cm)</th>
                                                <th style="font-size:16px; vertical-align:middle; text-align:center; width:10%">น้ำหนัก<br>(kg)</th>
                                                <th style="font-size:16px; vertical-align:middle; text-align:center; width:10%">ออกซิเจนในเลือด<br>(%)</th>
                                                <th style="font-size:16px; vertical-align:middle; text-align:center; width:10%">อุณหภูมิ<br>(&#8451;)</th>
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
	<script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
	<script src="https://cdn.datatables.net/1.10.23/js/dataTables.bootstrap4.min.js"></script>

    <!-- Main JS-->
	<script src="<?php echo base_url() ?>assets/js/main.js"></script>
	<script type="text/javascript">
		var totalRow = 0;
		var cid = "<?php echo $cid ?>";
		function reDate(date, useTime){
            var monthTH = new Array("", "ม.ค.", "ก.พ.", "มี.ค.", "เม.ย.", "พ.ค.", "มิ.ย." ,"ก.ค." ,"ส.ค.", "ก.ย.", "ต.ค.", "พ.ย.", "ธ.ค.")
			if(useTime === undefined) {
				useTime = "F";
			}
			var retDateTime = "";
			var thisDateTime = date.split(" ");
			var thisDate = thisDateTime[0].split("-");
            console.log(thisDate);
			var month = monthTH[(thisDate[1]- -0)];
			if(useTime=="T"){
				var thisTime = thisDateTime[1].split(":");
				retDateTime = thisDate[0] + " " + month + " " + ((thisDate[2]- -0) + 543) + '</b></br>' + thisTime[0] + ":" + thisTime[1] + " น.";
			}else{
				retDateTime = thisDate[0] + " " + month + " " + ((thisDate[2]- -0) + 543);
			}
			return retDateTime;
		}

        function loadList(){
			var table = document.all.tbVital;
			table.innerHTML = '';
			var cid = "<?php echo $cid ?>";
            var thisUrl = "<?=base_url('/index.php/vital/listPatientDetail/')?>" + cid;
            $.ajax({
                url: thisUrl,
                success: function (response) {
					var response = JSON.parse(response);
					var data = response["data"];
					totalRow = response["total"];
                    data.sort((a,b) => (a.transactionId < b.transactionId) ? 1 : ((b.transactionId < a.transactionId) ? -1 : 0))
					if(response["code"]=="0000"){
						document.all.ptName.innerHTML = response["name"];
						for(var i = 0; i<data.length; i++){
                            var bpSysVal = (data[i]['bpSysVal']=="-" || data[i]['bpSysVal']=="" || data[i]['bpSysVal']==0) ? "-" : data[i]['bpSysVal']; 
                            var bpDiaVal = (data[i]['bpDiaVal']=="-" || data[i]['bpDiaVal']=="" || data[i]['bpDiaVal']==0) ? "-" : data[i]['bpDiaVal']; 
                            var pressure = (bpSysVal=="-" && bpSysVal=="-") ? "-" : bpSysVal +'/'+bpDiaVal;
                            var pulse = data[i]['pulseVal']<1 ? "-" : data[i]['pulseVal']; 
                            var glu = data[i]['glucoseVal']<1 ? "-" : data[i]['glucoseVal']; 
                            var heightVal = data[i]['heightVal']<1 ? "-" : data[i]['heightVal']; 
                            var weightVal = data[i]['weightVal']<1 ? "-" : data[i]['weightVal']; 
                            var spo2Val = data[i]['spo2Val']<1 ? "-" : data[i]['spo2Val']; 
                            var tempVal = data[i]['tempVal']<1 ? "-" : data[i]['tempVal']; 
							table.innerHTML += '<tr>'+
											'<td style="font-size:16px; vertical-align:middle; text-align:left; width:15%"><span style="display:none">'+((i- -0) +1000)+' </span><b>'+reDate(data[i]['timeStamp'], "T")+'</td>'+
											'<td style="font-size:16px; vertical-align:middle; text-align:center; width:10%">'+pressure+'</td>'+
											'<td style="font-size:16px; vertical-align:middle; text-align:center; width:10%">'+pulse+'</td>'+
											'<td style="font-size:16px; vertical-align:middle; text-align:center; width:10%">'+glu+'</td>'+
											'<td style="font-size:16px; vertical-align:middle; text-align:center; width:10%">'+heightVal+'</td>'+
											'<td style="font-size:16px; vertical-align:middle; text-align:center; width:10%">'+weightVal+'</td>'+
											'<td style="font-size:16px; vertical-align:middle; text-align:center; width:10%">'+spo2Val+'</td>'+
											'<td style="font-size:16px; vertical-align:middle; text-align:center; width:10%">'+tempVal+'</td>'+
										'</tr>'
						}

						$('#tbVitalHead').DataTable({
                            "order": [[ 0, "asc" ]],
                            destroy: true,
							"aoColumns": [
									{ "bSortable": true },
									{ "bSortable": false },
									{ "bSortable": false },
									{ "bSortable": false },
									{ "bSortable": false },
									{ "bSortable": false },
									{ "bSortable": false },
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
        loadList();
    </script>
</body>
</html>
<!-- end document-->
