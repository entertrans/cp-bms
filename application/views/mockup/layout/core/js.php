<!-- <script data-cfasync="false" src="../../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script> -->
<script src="<?= base_url() ?>assets/mockup/core/js/vendor/jquery-1.12.4.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
<script src="<?= base_url() ?>assets/mockup/core/js/vendor/modernizr-2.8.3-respond-1.4.2.min.js"></script>
<script src="<?= base_url() ?>assets/mockup/core/js/vendor/bootstrap.min.js"></script>
<script src="<?= base_url() ?>assets/mockup/core/js/vendor/tether.min.js"></script>
<script src="<?= base_url() ?>assets/mockup/core/js/vendor/headroom.min.js"></script>
<script src="<?= base_url() ?>assets/mockup/core/js/vendor/owl.carousel.min.js"></script>
<script src="<?= base_url() ?>assets/mockup/core/js/vendor/smooth-scroll.min.js"></script>
<script src="<?= base_url() ?>assets/mockup/core/js/vendor/venobox.min.js"></script>
<script src="<?= base_url() ?>assets/mockup/core/js/vendor/jquery.ajaxchimp.min.js"></script>
<script src="<?= base_url() ?>assets/mockup/core/js/vendor/slick.min.js"></script>
<script src="<?= base_url() ?>assets/mockup/core/js/vendor/waypoints.min.js"></script>
<script src="<?= base_url() ?>assets/mockup/core/js/vendor/odometer.min.js"></script>
<script src="<?= base_url() ?>assets/mockup/core/js/vendor/wow.min.js"></script>
<script src="<?= base_url() ?>assets/mockup/core/js/main.js"></script>
<!-- SweetAlert -->
<script src="<?= base_url() ?>assets/admin/plugins/sweetalert2/sweetalert2.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/ekko-lightbox/5.3.0/ekko-lightbox.min.js"></script>

  <!--Floating WhatsApp javascript-->
  <script type="text/javascript" src="https://rawcdn.githack.com/rafaelbotazini/floating-whatsapp/3d18b26d5c7d430a1ab0b664f8ca6b69014aed68/floating-wpp.min.js"></script>

<script>
    function cartRemove(id) {
        $.ajax({
            url: "<?= site_url('checkout/hapus_cart/') ?>" + id,
            type: "POST",
            dataType: "JSON",
            data: {
                row_id: id
            },
            success: function(data) {
                location.reload();
            }
        });
    }
</script>

</body>

</html>