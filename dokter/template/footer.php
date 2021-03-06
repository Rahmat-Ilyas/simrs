<?php 

if (!isset($_SESSION["login_dokter"]))
{
	header("location: ../../login.php");
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
<script src="/medik_rev/asset/js/jquery.min.js"></script>
<script src="/medik_rev/asset/js/popper.min.js"></script>
<script src="/medik_rev/asset/js/bootstrap.min.js"></script>
<script src="/medik_rev/asset/js/metisMenu.min.js"></script>
<script src="/medik_rev/asset/js/waves.js"></script>
<script src="/medik_rev/asset/js/jquery.slimscroll.js"></script>
<script src="/medik_rev/oplugins/waypoints/lib/jquery.waypoints.min.js"></script>
<script src="/medik_rev/oplugins/counterup/jquery.counterup.min.js"></script>

<!-- Required datatable js -->
<script src="/medik_rev/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="/medik_rev/plugins/datatables/dataTables.bootstrap4.min.js"></script>
<!-- Buttons examples -->
<script src="/medik_rev/plugins/datatables/dataTables.buttons.min.js"></script>
<script src="/medik_rev/plugins/datatables/buttons.bootstrap4.min.js"></script>
<script src="/medik_rev/plugins/datatables/jszip.min.js"></script>
<script src="/medik_rev/plugins/datatables/pdfmake.min.js"></script>
<script src="/medik_rev/plugins/datatables/vfs_fonts.js"></script>
<script src="/medik_rev/plugins/datatables/buttons.html5.min.js"></script>
<script src="/medik_rev/plugins/datatables/buttons.print.min.js"></script>
<!-- Responsive examples -->
<script src="/medik_rev/plugins/datatables/dataTables.responsive.min.js"></script>
<script src="/medik_rev/plugins/datatables/responsive.bootstrap4.min.js"></script>

<!-- Chart JS -->
<script src="/medik_rev/oplugins/chart.js/chart.bundle.js"></script>

<!-- init dashboard -->
<script src="/medik_rev/asset/pages/jquery.dashboard.init.js"></script>

<!-- Sweet Alert Js  -->
<script src="/medik_rev/plugins/sweet-alert/sweetalert2.min.js"></script>
<script src="/medik_rev/asset/pages/jquery.sweet-alert.init.js"></script>

<script src="/medik_rev/plugins/switchery/switchery.min.js"></script>
<script src="/medik_rev/plugins/bootstrap-tagsinput/js/bootstrap-tagsinput.min.js"></script>
<script src="/medik_rev/plugins/select2/js/select2.min.js" type="text/javascript"></script>
<script src="/medik_rev/plugins/bootstrap-select/js/bootstrap-select.js" type="text/javascript"></script>
<script src="/medik_rev/plugins/bootstrap-filestyle/js/bootstrap-filestyle.min.js" type="text/javascript"></script>
<script src="/medik_rev/plugins/bootstrap-touchspin/js/jquery.bootstrap-touchspin.min.js" type="text/javascript"></script>
<script src="/medik_rev/plugins/bootstrap-maxlength/bootstrap-maxlength.js" type="text/javascript"></script>

<script type="text/javascript" src="/medik_rev/plugins/autocomplete/jquery.mockjax.js"></script>
<script type="text/javascript" src="/medik_rev/plugins/autocomplete/jquery.autocomplete.min.js"></script>
<script type="text/javascript" src="/medik_rev/plugins/autocomplete/countries.js"></script>
<script type="text/javascript" src="/medik_rev/asset/pages/jquery.autocomplete.init.js"></script>

<!-- Init Js file -->
<script type="text/javascript" src="/medik_rev/asset/pages/jquery.form-advanced.init.js"></script> X

<!-- App js -->
<script src="/medik_rev/asset/js/jquery.core.js"></script>
<script src="/medik_rev/asset/js/jquery.app.js"></script>

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
