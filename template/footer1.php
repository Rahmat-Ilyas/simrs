<?php 

if (!isset($_SESSION["login_admin"]))
{
	header("location: ../login.php");
	exit();
}
?>


</div> <!-- container -->

</div> <!-- content -->

<footer class="footer text-right">
	2017 - 2018 © Abstack. - Coderthemes.com
</footer>

</div>


<!-- ============================================================== -->
<!-- End Right content here -->
<!-- ============================================================== -->


</div>
<!-- END wrapper -->



<!-- jQuery  -->
<script src="/simrs/asset/js/jquery.min.js"></script>
<script src="/simrs/asset/js/popper.min.js"></script>
<script src="/simrs/asset/js/bootstrap.min.js"></script>
<script src="/simrs/asset/js/metisMenu.min.js"></script>
<script src="/simrs/asset/js/waves.js"></script>
<script src="/simrs/asset/js/jquery.slimscroll.js"></script>
<script src="/simrs/oplugins/waypoints/lib/jquery.waypoints.min.js"></script>
<script src="/simrs/oplugins/counterup/jquery.counterup.min.js"></script>

<!-- Required datatable js -->
<script src="/simrs/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="/simrs/plugins/datatables/dataTables.bootstrap4.min.js"></script>
<!-- Buttons examples -->
<script src="/simrs/plugins/datatables/dataTables.buttons.min.js"></script>
<script src="/simrs/plugins/datatables/buttons.bootstrap4.min.js"></script>
<script src="/simrs/plugins/datatables/jszip.min.js"></script>
<script src="/simrs/plugins/datatables/pdfmake.min.js"></script>
<script src="/simrs/plugins/datatables/vfs_fonts.js"></script>
<script src="/simrs/plugins/datatables/buttons.html5.min.js"></script>
<script src="/simrs/plugins/datatables/buttons.print.min.js"></script>
<!-- Responsive examples -->
<script src="/simrs/plugins/datatables/dataTables.responsive.min.js"></script>
<script src="/simrs/plugins/datatables/responsive.bootstrap4.min.js"></script>

<!-- Chart JS -->
<script src="/simrs/oplugins/chart.js/chart.bundle.js"></script>

<!-- init dashboard -->
<script src="/simrs/asset/pages/jquery.dashboard.init.js"></script>

<!-- Sweet Alert Js  -->
<script src="/simrs/plugins/sweet-alert/sweetalert2.min.js"></script>
<script src="/simrs/asset/pages/jquery.sweet-alert.init.js"></script>

<script src="/simrs/plugins/switchery/switchery.min.js"></script>
<script src="/simrs/plugins/bootstrap-tagsinput/js/bootstrap-tagsinput.min.js"></script>
<script src="/simrs/plugins/select2/js/select2.min.js" type="text/javascript"></script>
<script src="/simrs/plugins/bootstrap-select/js/bootstrap-select.js" type="text/javascript"></script>
<script src="/simrs/plugins/bootstrap-filestyle/js/bootstrap-filestyle.min.js" type="text/javascript"></script>
<script src="/simrs/plugins/bootstrap-touchspin/js/jquery.bootstrap-touchspin.min.js" type="text/javascript"></script>
<script src="/simrs/plugins/bootstrap-maxlength/bootstrap-maxlength.js" type="text/javascript"></script>

<script type="text/javascript" src="/simrs/plugins/autocomplete/jquery.mockjax.js"></script>
<script type="text/javascript" src="/simrs/plugins/autocomplete/jquery.autocomplete.min.js"></script>
<script type="text/javascript" src="/simrs/plugins/autocomplete/countries.js"></script>
<script type="text/javascript" src="/simrs/asset/pages/jquery.autocomplete.init.js"></script>

<!-- Init Js file -->
<script type="text/javascript" src="/simrs/asset/pages/jquery.form-advanced.init.js"></script> X

<!-- App js -->
<script src="/simrs/asset/js/jquery.core.js"></script>
<script src="/simrs/asset/js/jquery.app.js"></script>

<script type="text/javascript">
	$(document).ready(function() {
        $('#ruang_rawat').hide();
        $('#poli_tujuan').hide();

        $('#rawat_inap').click(function(){
            $('#ruang_rawat').show();
            $('#poli_tujuan').hide();
        });

        $('#rawat_jalan').click(function(){
            $('#ruang_rawat').hide();
            $('#poli_tujuan').show();
        });

        $('#ugd').click(function(){
            $('#ruang_rawat').hide();
            $('#poli_tujuan').hide();
        });

        $('#icu').click(function(){
            $('#ruang_rawat').hide();
            $('#poli_tujuan').hide();
        });

        // $('#no_rawat').keyup(function(){
        //     var no_reg = $('#no_reg').val();
        //     var no_rawat = $('#no_rawat').val();
        //     var no_rm = "RM-"+no_reg+"-"+no_rawat;
        //     $('#no_rm').val(no_rm);
        // });

        var no_reg = $('#no_reg').val();
        var no_rawat = $('#no_rawat').val();
        var tggl_masuk = $('#tggl_masuk').val();
        var no_rm = "RM-"+no_reg+"-"+tggl_masuk+"-"+no_rawat;
        $('#no_rm').val(no_rm);

        $('#datatable').DataTable();

                //Buttons examples
                var table = $('#datatable-buttons').DataTable({
                	lengthChange: false,
                	buttons: ['copy', 'excel', 'pdf']
                });

                table.buttons().container()
                .appendTo('#datatable-buttons_wrapper .col-md-6:eq(0)');
            } );

        </script>

    </body>
    </html>
