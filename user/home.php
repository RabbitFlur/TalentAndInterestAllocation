<?php include '../template/header.php'; ?>
<div class="profile">
<style>
#register-link {
  position: absolute;
  top: 8px;
  right: 10px;
  font-size: 12px;
  text-decoration: underline;
  cursor: pointer;
  color: #183885;
}
#register-link:hover {
  color: #f77c43;
}

</style>
<h2><img src="../image/tia.png" alt="Gambar" style="max-width: 100%; height: auto;"></h2>
<form>
<div class="input-container">
      <input type="text" id="nim" name="nim" placeholder="Masukkan NIM" required class="input-text" data-ignore="true" value="">
      <div id="nimError" class="error"></div>
</div>
<div class="input-container">
      <input type="password" id="password" name="password" placeholder="Masukkan Password" required class="input-text" data-ignore="true" value="">
      <div id="passError" class="error"></div><br>
      <span id="register-link" onclick="register()">Register</span>
</div>
<button type="submit" id="login" name="login">Log in</button>
</form>
</div>
<script src="../modules/register.js"></script>
<?php include '../template/footer.php'; ?>