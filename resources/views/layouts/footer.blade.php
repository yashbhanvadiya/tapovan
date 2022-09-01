<footer class="footer text-center">
    All Rights Reserved by
    <a href="{{ URL::to('/') }}">Tapovan</a>.
</footer>

</div>
</div>
<script src="{{ asset('/vendor/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js') }}"></script>
<script src="{{ asset('https://unpkg.com/sweetalert/dist/sweetalert.min.js') }}"></script>
<script src="{{ asset('/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('/js/waves.js') }}"></script>
<script src="{{ asset('/js/custom.min.js') }}"></script>
<script src="{{ asset('/vendor/chartist/chartist.min.js') }}"></script>
<script src="{{ asset('/vendor/chartist-plugin-tooltips/chartist-plugin-tooltip.min.js') }}"></script>
{{-- <script src="{{ asset('https://cdnjs.cloudflare.com/ajax/libs/multiple-select/1.2.3/multiple-select.min.js') }}"></script> --}}
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script src="{{ asset('https://cdn.jsdelivr.net/npm/flatpickr') }}"></script>
<script src="{{ asset('https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.3/moment.min.js')}}"></script>
@yield('js')
<script src="{{ asset('/js/tapovan.js') }}"></script>
</body>

</html>
