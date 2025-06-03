<script type="text/javascript">
    $(document).on('click', '.edit-appointment', function() {

        var stuff = $(this).data('info').split(',');
        fillmodalData(stuff)
        $('#editAppointment').modal('show');



    });

    $(document).on('click', '.pf-form', function() {
        var stuff = $(this).data('info').split(',');
        fillmodalDataPF(stuff)
        $('#editPF').modal('show');



    });

    function fillmodalData(details) {
        $('#id').val(details[0]);
        $('#name').val(details[1]);
        $('#description').val(details[2]);
        $('#time').val(details[3]);
        $('#doctor_id').val(details[4]);
        $('#patient_id').val(jQuery.trim(details[5]));
        $('#date').val(details[6]);

    }

    function fillmodalDataPF(details) {
        $('#idpf').val(details[0]);
        $('#doctor_idd').val(details[4]);
        $('#patient_idd').val(jQuery.trim(details[5]));

        var jsonString = details.slice(6).join(',');
        try {
            var jsonData = JSON.parse(jsonString);
            $("#r_dist_sph").val(jsonData[0].r_dist_sph);
            $("#r_dist_cyl").val(jsonData[0].r_dist_cyl);
            $("#r_dist_axis").val(jsonData[0].r_dist_axis);
            $("#r_near_sph").val(jsonData[0].r_near_sph);
            $("#r_near_cyl").val(jsonData[0].r_near_cyl);
            $("#r_near_axis").val(jsonData[0].r_near_axis);
            $("#l_dist_sph").val(jsonData[0].l_dist_sph);
            $("#l_dist_cyl").val(jsonData[0].l_dist_cyl);
            $("#l_dist_axis").val(jsonData[0].l_dist_axis);
            $("#l_near_sph").val(jsonData[0].l_near_sph);
            $("#l_near_cyl").val(jsonData[0].l_near_cyl);
            $("#l_near_axis").val(jsonData[0].l_near_axis);
            $("#frame").val(jsonData[0].frame);
            $("#lenses").val(jsonData[0].lenses);
            $("#instructions").val(jsonData[0].instructions);
            $("#total").val(jsonData[0].total);
            $("#advance").val(jsonData[0].advance);
            $("#balance").val(jsonData[0].balance);

            console.log(jsonData[0].r_dist_sph); // Example: Accessing one field
        } catch (e) {
            console.error('Invalid JSON:', e);
        }
    }
</script>