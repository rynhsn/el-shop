<!-- Footer Section Begin -->
<footer class="footer-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="footer-left">
                    <div class="footer-logo">
                        <a href="#"><img src="img/footer-logo.png" alt=""></a>
                    </div>
                    <ul>
                        <li>Address: </li>
                        <li class="mb-2"><?= $site['address']; ?></li>
                        <li>Phone: </li>
                        <li class="mb-2"><?= $site['phone']; ?></li>
                        <li>Email: </li>
                        <li class="mb-2"><?= $site['email']; ?></li>
                    </ul>
                    <div class="footer-social">
                        <a href="https://www.linkedin.com/company/pt-nusaraya-putramandiri/"><i class="fa fa-linkedin"></i></a>
                    </div>
                </div>
            </div>
            <div class="col-lg-2 offset-lg-1">
                <div class="footer-widget">
                    <h5>Information</h5>
                    <ul>
                        <li><a href="#">About Us</a></li>
                        <li><a href="#">Contact</a></li>
                    </ul>
                </div>
            </div>
            <?php if ($this->session->userdata('email')) : ?>
                <div class="col-lg-2">
                    <div class="footer-widget">
                        <h5>My Account</h5>
                        <ul>
                            <li><a href="#">My Account</a></li>
                            <li><a href="#">Contact</a></li>
                            <li><a href="#">Shopping Cart</a></li>
                            <li><a href="#">Shop</a></li>
                        </ul>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </div>
    <div class="copyright-reserved">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="copyright-text">
                        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                        Copyright &copy;
                        <script>
                            document.write(new Date().getFullYear());
                        </script> All rights reserved | Engine Lubricant
                    </div>
                    <div class="payment-pic">
                        <img src="img/payment-method.png" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- Footer Section End -->

<!-- Js Plugins -->
<script src="<?= base_url('assets'); ?>/js/jquery-3.3.1.min.js"></script>
<script src="<?= base_url('assets'); ?>/js/bootstrap.min.js"></script>
<script src="<?= base_url('assets'); ?>/js/jquery-ui.min.js"></script>
<script src="<?= base_url('assets'); ?>/js/jquery.countdown.min.js"></script>
<script src="<?= base_url('assets'); ?>/js/jquery.nice-select.min.js"></script>
<script src="<?= base_url('assets'); ?>/js/jquery.zoom.min.js"></script>
<script src="<?= base_url('assets'); ?>/js/jquery.dd.min.js"></script>
<script src="<?= base_url('assets'); ?>/js/jquery.slicknav.js"></script>
<script src="<?= base_url('assets'); ?>/js/owl.carousel.min.js"></script>
<script src="<?= base_url('assets'); ?>/js/main.js"></script>

</body>

</html>