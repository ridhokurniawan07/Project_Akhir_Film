<script>
	var isLogin = false;
	function openLoginModal() {
		document.getElementById("loginLink").click();
	}
	
	// Fungsi untuk membuka modal review
	function openWriteReviewModal() {
		document.getElementById("write-review-modal").style.display = "flex";
	}
	// Fungsi untuk menutup modal review
	function closeWriteReviewModal() {
		document.getElementById("write-review-modal").style.display = "none";
	}
	// Event listener untuk membuka modal saat tombol Write Review diklik
	<?php if (isset($_SESSION['is_login'])) { ?>
			isLogin = true;  
	<?php } ?>
	document
		.getElementById("write-review-btn")
		.addEventListener("click", isLogin ? openWriteReviewModal : openLoginModal);
	
	// Event listener untuk menutup modal saat tombol Close diklik
	document
		.getElementById("close-write-review")
		.addEventListener("click", closeWriteReviewModal);
</script>