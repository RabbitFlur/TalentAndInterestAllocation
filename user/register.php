<?php include '../template/header.php'; ?>

  <div class="profile">
  <h2 >Isikan Biodata Anda</h2>

  <form id="pengguna" onsubmit="return validateForm()" method="post" action="lanjut.php">
  <!-- <form id="pengguna" method="post" action="lanjut.php"> -->
    <div class="input-container">
      <label for="nama">Nama</label>
      <input type="text" id="nama" name="nama" placeholder="Tuliskan nama lengkap" required class="input-text">
    </div>

    <div class="input-container">
      <label for="nim">Nomor Induk Mahasiswa (NIM)</label>
      <input type="text" id="nim" name="nim" placeholder="Masukkan NIM" required class="input-text" data-ignore="true">
      <div id="nimError" class="error"></div>
    </div>
    
    <div class="input-container">
      <label for="smt">Semester</label>
       <input type="text" id="smt" name="smt" placeholder="Semester" required class="input-text" data-ignore="true">
      <div id="smtError" class="error"></div>
    </div>

    <?php include '../template/droopdown.php'; ?>

    <div class="input-container">
      <label for="phone">No HP/WA</label>
      <input type="text" id="phone" name="phone" placeholder="Masukkan nomor handphone" required class="input-text" data-ignore="true">
      <div id="phoneError" class="error"></div>
    </div>

    <div class="input-container">
      <label for="password">Password</label>
      <input type="password" id="password" name="password" placeholder="Masukkan password" required class="input-text">
    </div>

    <div class="input-container">
      <label for="confirmPassword">Konfirmasi Password</label>
      <input type="password" id="confirmPassword" name="confirmPassword" placeholder="Masukkan ulang password" required class="input-text">
      <div id="passwordError" class="error"></div>
    </div>

    <button type="submit" id="lanjut" name="lanjut">Lanjut</button>
  </form>
  </div> 
  <script src="../modules/autofill.js"></script>
  <script src="../modules/validateForm.js"></script>
  
<?php include '../template/footer.php'; ?>

