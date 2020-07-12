</div>
  <footer class="main-footer">
    <strong>Copyright &copy; 2020 <a href="http://adminlte.io">AdminLTE.io</a>.</strong>
    All rights reserved.
  </footer>

  <aside class="control-sidebar control-sidebar-dark">
  </aside>
</div>

<script src="{{asset('assets/js/jquery.min.js')}}"></script>
<script src="{{asset('assets/js/jquery-ui.min.js')}}"></script>
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<script src="{{asset('assets/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('assets/js/moment.min.js')}}"></script>
<script src="{{asset('assets/js/daterangepicker.js')}}"></script>
<script src="{{asset('assets/js/tempusdominus-bootstrap-4.min.js')}}"></script>
<script src="{{asset('assets/js/summernote-bs4.min.js')}}"></script>
<script src="{{asset('assets/js/jquery.overlayScrollbars.min.js')}}"></script>
<script src="{{asset('assets/js/adminlte.js')}}"></script>
<script src="{{asset('assets/js/dashboard.js')}}"></script>
<script src="{{asset('assets/js/demo.js')}}"></script>
<script src="{{asset('assets/js/toastr.min.js')}}"></script>
<script src="{{asset('assets/js/common.js')}}"></script>

@if(!empty($additionalResources['js']))
  @foreach($additionalResources['js'] as $js)
    <script src="{{asset($js)}}"></script>
  @endforeach
@endif

@if (Session::has('success'))
  <script>
    let msg ="{!! Session::get('success') !!}";
    toastr.success(msg);
  </script>
@endif

@if (Session::has('error'))
  <script>
    let addMsg ="{!! Session::get('error') !!}";
    toastr.error(addMsg);
  </script>
@endif

</body>
</html>
