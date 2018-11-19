<!-- JavaScript files-->
<script src="<?= base_url('assets/js/jquery-3.3.1.min.js') ?>"></script>
<script src="<?= base_url('assets/js/popper.min.js') ?>"> </script>
<script src="<?= base_url('assets/js/bootstrap.min.js') ?>"></script>
<script src="<?= base_url('assets/js/grasp_mobile_progress_circle-1.0.0.min.js') ?>"></script>
<script src="<?= base_url('assets/js/jquery.cookie.js') ?>"> </script>
<script src="<?= base_url('assets/jquery-validation/jquery.validate.min.js') ?>"></script>
<script src="<?= base_url('assets/js/bootstrap-datepicker.min.js') ?>"></script>
<script src="<?= base_url('assets/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.concat.min.js') ?>"></script>
<!-- SWEET ALERT JS -->
<script src="<?= base_url('assets/js/sweetalert.min.js') ?>"></script>
<!-- Main File-->
<script src="<?= base_url('assets/js/front.js') ?>"></script>
<script>
    <?php $berhasil = $this->session->flashdata('berhasil')?>
    <?php if(!empty($berhasil)) {?>
        $(window).on('load',function(){
            let berhasil = "<?= $berhasil ?>";  
            swal("Berhasil!", berhasil , "success");
        });
    <?php } ?>

    $('#hapus').on('click',function(e){
        e.preventDefault(); // prevent form submit
        var form = document.forms["myForm"]; // storing the form
        swal({
                title: "Apakah data Akan Di Hapus?",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    form.submit();
                } else {
                    swal("Aman!", 'Data Tidak Di Hapus' , "success");
                 }
            });
    });
    
    $("#datepicker").datepicker({
        format: 'yyyy/mm/dd',
        todayHighlight:true,
    });
</script>
</body>
</html>