<?php 
    session_start();
    session_unset();
    session_destroy();
?>
<script type="text/javascript">
    sessionStorage.removeItem('welcome');
    alert('Anda berhasil LogOut');
    location.href = "login.php";
</script>