<!--Footer Start-->
<footer class="container-fluid">
    <div class="row footer">
        <div class="col-12">
            @if (isset($header_footer_info))
                <p class="pt-2 mb-2 text-center">Copyright &copy;
                    <a class="footer-link" href="">{{ $header_footer_info->copy_right }}</a> || Developed by:
                    <a class="footer-link" href="#">SharifTech</a>
                </p>
            @else
                <p class="pt-2 mb-2 text-center">Copyright &copy;
                    <a class="footer-link" href="">Owner</a> || Developed by:
                    <a class="footer-link" href="#">SharifTech</a>
                </p>
            @endif
        </div>
    </div>
</footer>
<!--Footer End-->


<!--    magnific popup-->
<script src="{{ asset('admin/assets/plugins/magnific-popup/js/jquery.magnific-popup.min.js') }}"></script>
<!--    Carousel-->
<script src="{{ asset('admin/assets/plugins/owl-carosel/js/owl.carousel.min.js') }}"></script>
<!--    Bootstrap-4.3-->
<script src="{{ asset('admin/assets/js/popper.min.js') }}"></script>
<script src="{{ asset('admin/assets/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('admin/assets/js/sub-dropdown.js') }}"></script>
<!--Data table-->
<script src="{{ asset('admin/assets/plugins/data-table/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('admin/assets/plugins/data-table/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('admin/assets/plugins/data-table/js/dataTables.fixedHeader.min.js') }}"></script>
<!--    Theme Script-->
<script src="{{ asset('admin/assets/js/script.js') }}"></script>
</body>

</html>
