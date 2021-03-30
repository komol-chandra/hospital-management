<script src="{{ asset('backend/assets/plugins/jQuery/jquery-1.12.4.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('backend/assets/plugins/jquery-ui-1.12.1/jquery-ui.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('backend/assets/bootstrap/js/bootstrap.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('backend/assets/plugins/lobipanel/lobipanel.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('backend/assets/plugins/pace/pace.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('backend/assets/plugins/slimScroll/jquery.slimscroll.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('backend/assets/plugins/fastclick/fastclick.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('backend/assets/dist/js/custom1.js') }}" type="text/javascript"></script>
<script src="{{ asset('backend/assets/plugins/toastr/toastr.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('backend/assets/plugins/sparkline/sparkline.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('backend/assets/plugins/datamaps/d3.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('backend/assets/plugins/datamaps/topojson.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('backend/assets/plugins/datamaps/datamaps.all.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('backend/assets/plugins/counterup/waypoints.js') }}" type="text/javascript"></script>
<script src="{{ asset('backend/assets/plugins/counterup/jquery.counterup.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('backend/assets/plugins/chartJs/Chart.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('backend/assets/plugins/emojionearea/emojionearea.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('backend/assets/plugins/monthly/monthly.js') }}" type="text/javascript"></script>
<script src="{{ asset('backend/assets/plugins/datamaps/d3.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('backend/assets/plugins/datamaps/topojson.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('backend/assets/plugins/datamaps/datamaps.all.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('backend/assets/dist/js/custom.js') }}" type="text/javascript"></script>
<script src="{{ asset('backend/assets/plugins/modals/classie.js')}}" type="text/javascript"></script>
<script src="{{ asset('backend/assets/plugins/modals/modalEffects.js')}}" type="text/javascript"></script>

<script src="{{ asset('ckeditor/ckeditor.js')}}" type="text/javascript"></script>
<script type="text/javascript" src="{{ asset('vendor/jsvalidation/js/jsvalidation.js')}}"></script>

{{-- select2 --}}
<link rel="stylesheet" href="{{ asset('select2/select2.min.css') }}">
<script src="{{ asset('select2/select2.min.js') }}"></script>

{{-- select2 --}}

{{-- Date Range Picker --}}
<script src="{{ asset('date-range-picker/moment.min.js') }}"></script>
<script src="{{ asset('date-range-picker/daterangepicker.min.js') }}"></script>
<link rel="stylesheet" href="{{ asset('date-range-picker/daterangepicker.css') }}">
{{-- <script src="{{ asset('date-range-picker/jquery.min.js') }}"></script> --}}

{{-- Date Range Picker --}}

<script>
    function printDiv(divName) {
  var printContents = document.getElementById(divName).innerHTML;
  var originalContents = document.body.innerHTML;

  document.body.innerHTML = printContents;

  window.print();

  document.body.innerHTML = originalContents;
}
</script>

<script>
    @foreach ($errors->all() as $error)
    iziToast.warning({
        title: "Warning",
        message: "{{ $error }}",
        position: 'topRight',
    });
    @endforeach

    @if(Session::has('message'))
      var type = "{{ Session::get('alert-type') }}";
      switch(type){
          case 'info':
          iziToast.info({
            title: "{{ Session::get('title') }}",
            message: "{{ Session::get('message') }}",
            position: 'topRight',
        });
              break;

          case 'warning':
              iziToast.warning({
                title: "{{ Session::get('title') }}",
                message: "{{ Session::get('message') }}",
                position: 'topRight',
            });
              break;

          case 'success':
          iziToast.success({
                title: "{{ Session::get('title') }}",
                message: "{{ Session::get('message') }}",
                position: 'topRight',
                });
              break;

          case 'error':
              iziToast.error({
                title: "{{ Session::get('message') }}",
                message: "{{ Session::get('message') }}",
                position: 'topRight',
                });
              break;
      }
    @endif
</script>

<script>
    $('.datepicker-input').datepicker();
</script>
@yield('js')