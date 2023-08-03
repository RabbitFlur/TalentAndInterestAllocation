<?php include '../template/header.php'; ?>

  <div class="profile">
  <h2><img src="../image/24727098.png" alt="Gambar" style="max-width: 100%; height: auto;"></h2>

  <form id="pengguna" method="post" action="lanjut.php">
    <div class="input-container">
      <label for="nama">Nama</label>
      <input type="text" id="nama" name="nama" placeholder="Tuliskan nama lengkap" required class="input-text" autocomplete="off">
    </div>

    <div class="input-container">
      <label for="nim">Nomor Induk Mahasiswa (NIM)</label>
      <input type="text" id="nim" name="nim" placeholder="Masukkan NIM" required class="input-text" data-ignore="true" autocomplete="off">
      <div id="nimError" class="error"></div>
    </div>
    
    <div class="input-container">
      <label for="smt">Semester</label>
       <input type="text" id="smt" name="smt" placeholder="Semester" required class="input-text" data-ignore="true" autocomplete="off">
      <div id="smtError" class="error"></div>
    </div>

    <?php include '../template/droopdown.php'; ?>

    <div class="input-container">
      <label for="phone">No HP/WA</label>
      <input type="text" id="phone" name="phone" placeholder="Masukkan nomor handphone" required class="input-text" data-ignore="true" autocomplete="off">
      <div id="phoneError" class="error"></div>
    </div>

    <div class="input-container">
      <label for="password">Password</label>
      <input type="password" id="password" name="password" placeholder="Masukkan password" required data-ignore="true" autocomplete="new-password">
    </div>

    <div class="input-container">
      <label for="confirmPassword">Konfirmasi Password</label>
      <input type="password" id="confirmPassword" name="confirmPassword" placeholder="Masukkan ulang password" required data-ignore="true" autocomplete="off">
      <div id="errorModal" class="modal">
        <div class="modal-content">
        <span class="close" onclick="closeModal()">&times;</span>
        <p id="errorMessageText"></p>
        </div>
      </div>
    </div>

    <button type="submit" id="lanjut" name="lanjut" onclick="return validateForm()">Daftar</button>
  </form>
  <script src="../modules/formValidation.js"></script>
  </div> 
  
<?php include '../template/footer.php'; ?>

