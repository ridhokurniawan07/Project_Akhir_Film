<!-- footer section-->
<footer class="ht-footer">
    <div class="container">
        <div class="flex-parent-ft">
            <div class="flex-child-ft item1 col-md-4">
                <a href="index.php"><img class="logo" src="images/logoo.png" alt=""></a>
                <p>Kelompok 6<br>
                    Indonesia , 2023 </p>
                <p>Call us: <a href="#">(+62) 857 994 6789</a></p>
            </div>
            <div class="flex-child-ft item2">
                <h4>Resources</h4>
                <ul>
                    <li><a href="#">About</a></li>
                    <li><a href="#">Movie</a></li>
                    <li><a href="#">Contact Us</a></li>
                    <li><a href="#">Forums</a></li>
                    <li><a href="#">Blog</a></li>
                    <li><a href="#">Help Center</a></li>
                </ul>
            </div>
            <div class="flex-child-ft item3">
                <h4>Legal</h4>
                <ul>
                    <li><a href="#">Terms of Use</a></li>
                    <li><a href="#">Privacy Policy</a></li>
                    <li><a href="#">Security</a></li>
                </ul>
            </div>
            <div class="flex-child-ft item4">
                <h4>Account</h4>
                <ul>
                    <li><a href="#">My Account</a></li>
                    <li><a href="#">Watchlist</a></li>
                    <li><a href="#">Collections</a></li>
                    <li><a href="#">User Guide</a></li>
                </ul>
            </div>
            <div class="flex-child-ft item5">
                <h4>Newsletter</h4>
                <p>Subscribe to our newsletter system now <br> to get latest news from us.</p>
                <form action="#">
                    <input type="text" placeholder="Enter your email...">
                </form>
                <a href="#" class="btn">Subscribe now <i class="ion-ios-arrow-forward"></i></a>
            </div>
        </div>
    </div>
    <div class="ft-copyright">
        <div class="backtotop">
            <p><a href="#" id="back-to-top">Back to top <i class="ion-ios-arrow-thin-up"></i></a></p>
        </div>
    </div>
</footer>
<!-- end of footer section-->
<?=
$isWriteReview = $pageName == "Movie Single" ? true : false;
if ($isWriteReview) {
    include_once 'footer_write_review.php';
}
?>

<script>
    function openInputImageProfile() {
        document.getElementById("input-profile").click();
    }

    document
        .getElementById("input-profile-button")
        .addEventListener("click", openInputImageProfile);

    function checkImageSelected() {
        const fileInput = document.getElementById('input-profile');

        if (fileInput.files.length > 0) {
            // File(s) selected
            document.getElementById("update-image-button").click();
        }
    }
</script>

<script src="js/jquery.js"></script>
<script src="js/plugins.js"></script>
<script src="js/plugins2.js"></script>
<script src="js/custom.js"></script>
</body>

<!-- celebritylist12:04-->

</html>