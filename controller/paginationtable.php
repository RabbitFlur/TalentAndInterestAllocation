<?php
$current_page = isset($_GET['page']) ? $_GET['page'] : 1;

// Logic untuk membatasi tampilan maksimal 3 angka halaman:
$start_page = max(1, $current_page - 1);
$end_page = min($start_page + 2, $total_pages);
 // Tampilkan navigasi First Page dan Previous Page:
if ($current_page > 1) {
  // echo "<a href='?page=1'>&laquo; First</a>";
  // echo "<a href='?page=".($current_page - 1)."'>Previous</a>";
  echo "<a href='?page=1&nim=".urlencode($nimFilter)."'>&laquo; First</a>";
  echo "<a href='?page=".($current_page - 1)."&nim=".urlencode($nimFilter)."'>Previous</a>";
}

// Tampilkan tautan untuk halaman-halaman terbatas (maksimal 3 angka):
for ($i = $start_page; $i <= $end_page; $i++) {
  // echo "<a href='?page=".$i."' class='".($i == $current_page ? 'active' : '')."'>".$i."</a>";
  echo "<a href='?page=".$i."&nim=".urlencode($nimFilter)."' class='".($i == $current_page ? 'active' : '')."'>".$i."</a>";
}

// Tampilkan navigasi Next Page dan Last Page:
if ($current_page < $total_pages) {
  // echo "<a href='?page=".($current_page + 1)."'>Next</a>";
  // echo "<a href='?page=".$total_pages."'>Last &raquo;</a>";
  echo "<a href='?page=".($current_page + 1)."&nim=".urlencode($nimFilter)."'>Next</a>";
  echo "<a href='?page=".$total_pages."&nim=".urlencode($nimFilter)."'>Last &raquo;</a>";
}
?>

