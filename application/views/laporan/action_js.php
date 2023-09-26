<script>
    function cari() {
    var periode = $("[name=periode]").val();
    
    alert(periode);
    $.ajax({
        type: 'POST',
        url: "<?= base_url('LaporanController/')?>",
        data: { periode: periode },
        success: function(data) {
            $("#pencarian").html(data);
            $("#export").removeClass('disabled');
            $("#export").attr('type', 'submit');
        }
    })
}
</script>
