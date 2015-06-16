<?php
	// halaman tempat paging akan ditempatkan
	$page_dom = "index.php";
	echo "<ul class='pagination'>";
	// tombol untuk halaman pertama
	if($page>1){
	    echo "<li><a href='{$page_dom}' title='Halaman pertama.'>";
	    echo "<<";
	    echo "</a></li>";
	}
	// count semua data mahasiswa di dalam database untuk menghitung total halaman
	$total_rows = $informasi->countAll();
	$total_pages = ceil($total_rows / $records_per_page);
	// range of links to show
	$range = 2;
	// display links to 'range of pages' around 'current page'
	$initial_num = $page - $range;
	$condition_limit_num = ($page + $range)  + 1;
	for ($x=$initial_num; $x<$condition_limit_num; $x++) {	 
	    // pastikan nilai $x lebih besar dari 0 dan kurang dari atau sama dengan $total_pages
	    if (($x > 0) && ($x <= $total_pages)) {	 
	        // current page
	        if ($x == $page) {
	            echo "<li class='active'><a href='#'>$x <span class='sr-only'>(current)</span></a></li>";
	        }
	 
	        // bukan current page
	        else {
	            echo "<li><a href='{$page_dom}?page=$x'>$x</a></li>";
	        }
	    }
	}
	 
	// tombol untuk halaman terakhir
	if($page<$total_pages){
	    echo "<li><a href='" .$page_dom . "?page={$total_pages}' title='Last page is {$total_pages}.'>";
	        echo ">>";
	    echo "</a></li>";
	}
	echo "</ul>";
?>