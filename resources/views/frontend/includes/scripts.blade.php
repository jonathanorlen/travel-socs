<!-- COMMON SCRIPTS -->
<script src="{{ url('frontend/js/common_scripts.js')}}"></script>
<script src="{{ url('frontend/js/main.js')}}"></script>
<script src="assets/validate.js"></script>

<!-- DATEPICKER  -->
<script>
    $(function() {
        'use strict';
        $('input[name="dates"]').daterangepicker({
            autoUpdateInput: false,
            minDate: new Date(),
            locale: {
                cancelLabel: 'Clear'
            }
        });
        $('input[name="dates"]').on('apply.daterangepicker', function(ev, picker) {
            $(this).val(picker.startDate.format('MM-DD-YY') + ' > ' + picker.endDate.format(
                'MM-DD-YY'));
        });
        $('input[name="dates"]').on('cancel.daterangepicker', function(ev, picker) {
            $(this).val('');
        });
    });
</script>

<!-- INPUT QUANTITY  -->
{{-- <script src="{{ url('frontend/js/input_qty.js')}}"></script> --}}
