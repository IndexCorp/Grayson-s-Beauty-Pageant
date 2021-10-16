@if(Session::has('success_alert'))
<script>
    Swal.fire('Success!', @json(Session::get('success_alert')), 'success');
</script>
@endif

@if(Session::has('error_alert'))
<script>
    Swal.fire('Error!', @json(Session::get('error_alert')), 'error');
</script>
@endif

@if(Session::has('success_toast'))
<script>
    toastr.success(@json(Session::get('success_toast')), 'Success!');
</script>
@endif

@if(Session::has('error_toast'))
<script>
    toastr.error(@json(Session::get('error_toast')), 'Error!');
</script>
@endif