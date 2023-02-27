<link href="<?php echo base_url() ?>assets/css/login.css" rel="stylesheet" media="all">
<div class="body"></div>
<div class="grad"></div>
<div class="header">
	<div>Ayutthaya<br>Selfcare<br>Monitoring</div>
</div>
<br>
<div class="login">
	<form name="loginform" id="loginform" action="">
		<input type="text" placeholder="ชื่อผู้ใช้" name="userName"><br>
		<input type="password" placeholder="รหัสผ่าน" name="password"><br>
		<input type="hidden" name="userAgent" value="chrome">
		<input type="hidden" name="sessionRefCode" value="20210219105321000">
		<input type="hidden" name="language" value="en">
		<input type="button" value="Login" onclick="login()">
	</form>
</div>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="<?php echo base_url() ?>assets/js/md5.min.js"></script>
<script src="<?php echo base_url() ?>assets/vendor/jquery-3.2.1.min.js"></script>
<script type="text/javascript">
    $(document).on('keypress',function(e) {
        if(e.which == 13) {
            login();
        }
    });
	
	function getDataInForm(id) {
		var myform = $('#' + id);
		var serialized = myform.serialize();
		return serialized;
	}

	function login(){
        if(document.all.userName.value==""){
			swal("กรุณากรอกชื่อผู้ใช้");
        }else if(document.all.password.value==""){
			swal("กรุณากรอกรหัสผ่าน");
        }else{
			document.all.password.value = md5(document.all.password.value);
            $.ajax({
                url: "<?=base_url('login/login')?>",
                type: "POST",
                data: getDataInForm("loginform"),
                success: function (response) {
					var response = JSON.parse(response);
					console.log(response)
					if(response["code"]=="0000"){
                    	window.location.href = "<?php echo base_url() ?>vital/main" ;
					}else{
						swal("ลงชื่อเข้าสู่ระบบไม่สำเร็จ");		
					}
                }
            });
        }
    }

</script>
