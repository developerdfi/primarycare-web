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
                        <?php }?>
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
                        <div class="row m-t-30">
                            <div class="col-md-12">
                                <!-- DATA TABLE-->
								<h3 class="title-3 m-b-30"><b>ประวัติผู้เข้ารับบริการ</b></h3>
                                <div class="table-responsive m-b-40">
                                    <div style="display: flex; justify-content: flex-end; margin-bottom: 20px;">
                                        <label for="birthday" style="padding-top:10px;margin-right:10px">ข้อมูลวันที่:</label>
                                        <input type="text" id="daterange" style="padding-left:8px; margin-top:10px; border: 1px solid;margin-bottom: 10px; border-radius: 5px; margin-left: 10px; border-color:#ced4da" name="daterange" value="<?php echo date('1/m/Y')?> - <?php echo date('d/m/Y')?>" />
                                    </div>
                                    <table class="table table-borderless table-data3" id="tbVitalHead">
                                        <thead>
                                            <tr>
                                                <th>ชื่อ-นามสกุล</th>
                                                <th>ที่อยู่</th>
                                                <th>เลขประจำตัวประชาชน</th>
                                                <th>วัน-เวลา</th>
                                                <th></th>
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
	<script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
	<script src="https://cdn.datatables.net/1.10.23/js/dataTables.bootstrap4.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>

	<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
   
    <!-- Main JS-->
	<script src="<?php echo base_url() ?>assets/js/main.js"></script>
	<script type="text/javascript">
        $(function() {
            $('input[name="daterange"]').daterangepicker({
                opens: 'center',
                showCustomRangeLabel: false,
                linkedCalendars: false,
                locale: {
                    "format": "DD/MM/YYYY",
                    "separator": " - ",
                    "applyLabel": "ค้นหา",
                    "cancelLabel": "ยกเลิก",
                    "fromLabel": "จาก",
                    "toLabel": "ถึง",
                    "customRangeLabel": "Custom",
                    "weekLabel": "W",
                    "daysOfWeek": [
                        "อา.",
                        "จ.",
                        "อ.",
                        "พ.",
                        "พฤ.",
                        "ศ.",
                        "ส."
                    ],
                    "monthNames": [
                        "มกราคม",
                        "กุมภาพันธ์",
                        "มีนาคม",
                        "เมษายน",
                        "พฤษภาคม",
                        "มิถุนายน",
                        "กรกฎาคม",
                        "สิงหาคม",
                        "กันยายน",
                        "ตุลาคม",
                        "พฤศจิกายน",
                        "ธันวาคม"
                    ],
                    "firstDay": 1
                },
            }, function(start, end, label) {
                console.log("A new date selection was made: " + start.format('YYYY-MM-DD') + ' to ' + end.format('YYYY-MM-DD'));
                loadPatient();
            });
            $('.drp-calendar.right').css({
                display: 'none'
            });
            $('.drp-calendar.left').css({
                width: '100%'
            });

            $('.applyBtn.btn.btn-sm.btn-primary').css({
                "background-color": '#30915A',
                "border-color": '#30915A',
            });

            $('.daterangepicker.td.active').css({
                "background-color": '#30915A',
            });
            
            $(".applyBtn.btn.btn-sm.btn-primary").html("ค้นหา");
        });

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

        function loadPatient(){
			var table = document.all.tbVital;
            $('#tbVitalHead').DataTable().clear()
            $('#tbVitalHead').DataTable().destroy()
			table.innerHTML = '';
            var startDate = $("#daterange").data('daterangepicker').startDate.format('YYYY-MM-DD');;
            var endDate = $("#daterange").data('daterangepicker').endDate.format('YYYY-MM-DD');;
            var thisUrl = "<?=base_url('/index.php/vital/listPatient/')?>" + startDate + "/" + endDate;
            $.ajax({
                url: thisUrl,
                success: function (response) {
					var response = JSON.parse(response);
                    console.log(response);
					var data = response["data"];
					if(response["code"]=="0000"){
						for(var i = 0; i<data.length; i++){
                            var showDetail = "F";
                            var date = "ไม่มีการตรวจวัด";
                            if(data[i]['lastTimeStamp']!==null){
                                date = reDate(data[i]['lastTimeStamp'], "T");
                                showDetail = 'T'
                            }
							table.innerHTML += '<tr>'+
											'<td style="font-size:16px; vertical-align:middle; text-align:left; width: 20%"><b>'+data[i]['name']+'</b></td>'+
											'<td style="font-size:16px; vertical-align:middle; text-align:left; width: 30%">'+data[i]['address']+'</td>'+
											'<td style="font-size:16px; vertical-align:middle; text-align:left; width: 20%">'+data[i]['cid']+'</td>'+
											'<td vertical-align:middle; text-align:center; width: 10%"><span style="display:none">'+((i- -0) +1000)+' </span><b>'+date+'</td>'+
											'<td style="font-size:16px; vertical-align:middle; text-align:center;"><button style="width:100px" class="role member" onclick="goDetail('+data[i]['cid']+')">ผลตรวจ</button></td>'+
										'</tr>'
						}
						$('#tbVitalHead').DataTable({
                            "order": [[ 3, "asc" ]],
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
		
		function goDetail(cid){
			window.location.href = "<?php echo base_url() ?>index.php/vital/detail/" + cid;
		}

        $( document ).ready(function() {
            loadPatient();
        });
        
    </script>
</body>
</html>
<!-- end document-->
