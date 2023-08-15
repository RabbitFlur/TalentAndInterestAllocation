<?php include '../template/header.php'; ?>
<title>Answer The Question</title>
</head>
<body>
<div class="form-wrapper">
<form id="questionForm" action="../controller/outputjawaban.php" method="POST">

  <fieldset class="fieldset-container active">
    <legend>Kelompok Pertanyaan 1</legend>
    <div class="question-group">
      <label for="l-1">Berbagai tulisan suka anda baca; koran, majalah, merk mobil, stiker di angkutan kota, bahkan label produk</label><br>
      <div class="answer-options">
        <input type="radio" id="l-1y" name="l-1answer" value="yes">
        <label for="l-1y">Ya</label>
        <input type="radio" id="l-1n" name="l-1answer" value="no">
        <label for="l-1n">Tidak</label>
      </div>
    </div>
    <div class="question-group">
      <label for="l-2">Anda cukup percaya diri dan meyakinkan pada saat berdebat dengan orang lain</label><br>
      <div class="answer-options">
        <input type="radio" id="l-2y" name="l-2answer" value="yes">
        <label for="l-2y">Ya</label>
        <input type="radio" id="l-2n" name="l-2answer" value="no">
        <label for="l-2n">Tidak</label>
      </div>
    </div>
    <div class="question-group">
      <label for="l-3">Salah satu permainan yang anda sukai adalah scrabble dan TTS</label><br>
      <div class="answer-options">
        <input type="radio" id="l-3y" name="l-3answer" value="yes">
        <label for="l-3y">Ya</label>
        <input type="radio" id="l-3n" name="l-3answer" value="no">
        <label for="l-3n">Tidak</label>
      </div>
    </div>
    <div class="question-group">
      <label for="l-4">Anda dapat memberikan pengarahan atau penjelasan yang jelas dan lugas</label><br>
      <div class="answer-options">
        <input type="radio" id="l-4y" name="l-4answer" value="yes">
        <label for="l-4y">Ya</label>
        <input type="radio" id="l-4n" name="l-4answer" value="no">
        <label for="l-4n">Tidak</label>
      </div>
    </div>
    <button type="button" class="next-button">Next</button>
  </fieldset>

  <fieldset class="fieldset-container">
    <legend>Kelompok Pertanyaan 2</legend>
    <div class="question-group">
      <label for="lm-1">Kegiatan anda sehari-hari tersusun dengan rapi dan teratur </label><br>
      <div class="answer-options">
        <input type="radio" id="lm-1y" name="lm-1answer" value="yes">
        <label for="lm-1y">Ya</label>
        <input type="radio" id="lm-1n" name="lm-1answer" value="no">
        <label for="lm-1n">Tidak</label>
      </div>
    </div>
    <div class="question-group">
      <label for="lm-2">Permainan logika seperti catur, permainan komputer yang memerlukan strategi anda sukai</label><br>
      <div class="answer-options">
        <input type="radio" id="lm-2y" name="lm-2answer" value="yes">
        <label for="lm-2y">Ya</label>
        <input type="radio" id="lm-2n" name="lm-2answer" value="no">
        <label for="lm-2n">Tidak</label>
      </div>
    </div>
    <div class="question-group">
      <label for="lm-3">Kalau menghadapi suatu masalah, anda biasanya menyusun langkah-langkah yang akan anda ambil</label><br>
      <div class="answer-options">
        <input type="radio" id="lm-3y" name="lm-3answer" value="yes">
        <label for="lm-3y">Ya</label>
        <input type="radio" id="lm-3n" name="lm-3answer" value="no">
        <label for="lm-3n">Tidak</label>
      </div>
    </div>
    <div class="question-group">
      <label for="lm-4">Anda senang melihat atau mencari pola hubungan antar objek atau antar bilangan</label><br>
      <div class="answer-options">
        <input type="radio" id="lm-4y" name="lm-4answer" value="yes">
        <label for="lm-4y">Ya</label>
        <input type="radio" id="lm-4n" name="lm-4answer" value="no">
        <label for="lm-4n">Tidak</label>
      </div>
    </div>
    <button type="button" class="next-button">Next</button>
  </fieldset>

  <fieldset class="fieldset-container">
    <legend>Kelompok Pertanyaan 3</legend>
    <div class="question-group">
      <label for="k-1">Tidak cukup hanya melihat saja untuk mempelajari hal baru, anda lebih suka kalau bisa mengerjakannya langsung sendiri</label><br>
      <div class="answer-options">
        <input type="radio" id="k-1y" name="k-1answer" value="yes">
        <label for="k-1y">Ya</label>
        <input type="radio" id="k-1n" name="k-1answer" value="no">
        <label for="k-1n">Tidak</label>
      </div>
    </div>
    <div class="question-group">
      <label for="k-2">Anda menyukai petualangan yang sangat berkesan untukmu, yang spektakuler, yang membebani fisik</label><br>
      <div class="answer-options">
        <input type="radio" id="k-2y" name="k-2answer" value="yes">
        <label for="k-2y">Ya</label>
        <input type="radio" id="k-2n" name="k-2answer" value="no">
        <label for="k-2n">Tidak</label>
      </div>
    </div>
    <div class="question-group">
      <label for="k-3">Saat berolah raga adalah kegiatan yang ditunggu-tunggu olehmu di sekolah</label><br>
      <div class="answer-options">
        <input type="radio" id="k-3y" name="k-3answer" value="yes">
        <label for="k-3y">Ya</label>
        <input type="radio" id="k-3n" name="k-3answer" value="no">
        <label for="k-3n">Tidak</label>
      </div>
    </div>
    <div class="question-group">
      <label for="k-4">Buat anda, memecahkan suatu masalah sambil bergerak: berjalan, berlari atau berolah raga merupakan cara yang tepat dan membuat anda lebih nyaman</label><br>
      <div class="answer-options">
        <input type="radio" id="k-4y" name="k-4answer" value="yes">
        <label for="k-4y">Ya</label>
        <input type="radio" id="k-4n" name="k-4answer" value="no">
        <label for="k-4n">Tidak</label>
      </div>
    </div>
    <button type="button" class="next-button">Next</button>
  </fieldset> 

  <fieldset class="fieldset-container">
    <legend>Kelompok Pertanyaan 4</legend>
    <div class="question-group">
      <label for="m-1">Sambil mengerjakan sesuatu, anda suka bersenandung atau bersiul</label><br>
      <div class="answer-options">
        <input type="radio" id="m-1y" name="m-1answer" value="yes">
        <label for="m-1y">Ya</label>
        <input type="radio" id="m-1n" name="m-1answer" value="no">
        <label for="m-1n">Tidak</label>
      </div>
    </div>
    <div class="question-group">
      <label for="m-2">Menghafalkan lagu, terutama nadanya sangat mudah buat anda</label><br>
      <div class="answer-options">
        <input type="radio" id="m-2y" name="m-2answer" value="yes">
        <label for="m-2y">Ya</label>
        <input type="radio" id="m-2n" name="m-2answer" value="no">
        <label for="m-2n">Tidak</label>
      </div>
    </div>
    <div class="question-group">
      <label for="m-3">Ada satu atau beberapa alat musik yang dapat anda mainkan</label><br>
      <div class="answer-options">
        <input type="radio" id="m-3y" name="m-3answer" value="yes">
        <label for="m-3y">Ya</label>
        <input type="radio" id="m-3n" name="m-3answer" value="no">
        <label for="m-3n">Tidak</label>
      </div>
    </div>
    <div class="question-group">
      <label for="m-4">Jika musik dimainkan, anda dapat menyanyi dengan nada yang tepat</label><br>
      <div class="answer-options">
        <input type="radio" id="m-4y" name="m-4answer" value="yes">
        <label for="m-4y">Ya</label>
        <input type="radio" id="m-4n" name="m-4answer" value="no">
        <label for="m-4n">Tidak</label>
      </div>
    </div>
    <button type="button" class="next-button">Next</button>
  </fieldset>

  <fieldset class="fieldset-container">
    <legend>Kelompok Pertanyaan 5</legend>
    <div class="question-group">
      <label for="ier-1">Jika ada masalah, anda lebih suka mendiskusikannya dengan orang lain daripada dipikirkan sendiri</label><br>
      <div class="answer-options">
        <input type="radio" id="ier-1y" name="ier-1answer" value="yes">
        <label for="ier-1y">Ya</label>
        <input type="radio" id="ier-1n" name="ier-1answer" value="no">
        <label for="ier-1n">Tidak</label>
      </div>
    </div>
    <div class="question-group">
      <label for="ier-2">Anda senang 'ngumpul-ngumpul' dengan teman kalau ada waktu luang</label><br>
      <div class="answer-options">
        <input type="radio" id="ier-2y" name="ier-2answer" value="yes">
        <label for="ier-2y">Ya</label>
        <input type="radio" id="ier-2n" name="ier-2answer" value="no">
        <label for="ier-2n">Tidak</label>
      </div>
    </div>
    <div class="question-group">
      <label for="ier-3">Anda senang mengarahkan orang lain mengerjakan sesuatu, anda senang menjadi pemimpin</label><br>
      <div class="answer-options">
        <input type="radio" id="ier-3y" name="ier-3answer" value="yes">
        <label for="ier-3y">Ya</label>
        <input type="radio" id="ier-3n" name="ier-3answer" value="no">
        <label for="ier-3n">Tidak</label>
      </div>
    </div>
    <div class="question-group">
      <label for="ier-4">Anda cukup sering membantu teman menyelesaikan permasalahannya</label><br>
      <div class="answer-options">
        <input type="radio" id="ier-4y" name="ier-4answer" value="yes">
        <label for="ier-4y">Ya</label>
        <input type="radio" id="ier-4n" name="ier-4answer" value="no">
        <label for="ier-4n">Tidak</label>
      </div>
    </div>
    <button type="button" class="next-button">Next</button>
  </fieldset>

  <fieldset class="fieldset-container">
    <legend>Kelompok Pertanyaan 6</legend>
    <div class="question-group">
      <label for="ia-1">Mengikuti seminar-seminar pengembangan diri sangat menarik minat anda</label><br>
      <div class="answer-options">
        <input type="radio" id="ia-1y" name="ia-1answer" value="yes">
        <label for="ia-1y">Ya</label>
        <input type="radio" id="ia-1n" name="ia-1answer" value="no">
        <label for="ia-1n">Tidak</label>
      </div>
    </div>
    <div class="question-group">
      <label for="ia-2">Jika waktu libur tiba, yang terbayang adalah tempat-tempat yang nyaman untuk menyendiri, merenung, tidak terlalu ramai dan bukan merupakan pusat kota</label><br>
      <div class="answer-options">
        <input type="radio" id="ia-2y" name="ia-2answer" value="yes">
        <label for="ia-2y">Ya</label>
        <input type="radio" id="ia-2n" name="ia-2answer" value="no">
        <label for="ia-2n">Tidak</label>
      </div>
    </div>
    <div class="question-group">
      <label for="ia-3">Anda menetapkan tujuan hidup anda, dan punya gambaran kemana anda akan melangkah</label><br>
      <div class="answer-options">
        <input type="radio" id="ia-3y" name="ia-3answer" value="yes">
        <label for="ia-3y">Ya</label>
        <input type="radio" id="ia-3n" name="ia-3answer" value="no">
        <label for="ia-3n">Tidak</label>
      </div>
    </div>
    <div class="question-group">
      <label for="ia-4">Kegiatan-kegiatan yang dapat dilakukan sendiri lebih anda pilih daripada yang melibatkan banyak orang</label><br>
      <div class="answer-options">
        <input type="radio" id="ia-4y" name="ia-4answer" value="yes">
        <label for="ia-4y">Ya</label>
        <input type="radio" id="ia-4n" name="ia-4answer" value="no">
        <label for="ia-4n">Tidak</label>
      </div>
    </div>
    <input type="hidden" name="hasil" value="<?php echo $finalResult ? 'TRUE' : 'FALSE'; ?>">
    <button type="submit" id="kirim" name="kirim">Kirim</button>
  </fieldset>

  <!-- <div id="output"></div> -->

</form>
<script src="../modules/hidden.js"></script>
<script src="../modules/nextfieldset.js"></script>
</div>

<?php include '../template/footer.php'; ?>
