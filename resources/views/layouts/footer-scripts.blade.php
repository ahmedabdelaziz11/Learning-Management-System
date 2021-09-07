<!-- jQuery -->
<script src="{{ asset('assets/vendor/jquery.min.js') }}"></script>

<!-- Bootstrap -->
<script src="{{ asset('assets/vendor/popper.min.js') }}"></script>
<script src="{{ asset('assets/vendor/bootstrap.min.js') }}"></script>


<!-- Perfect Scrollbar -->
<script src="{{ asset('assets/vendor/perfect-scrollbar.min.js') }}"></script>

<!-- DOM Factory -->
<script src="{{ asset('assets/vendor/dom-factory.js') }}"></script>

<!-- MDK -->
<script src="{{ asset('assets/vendor/material-design-kit.js') }}"></script>

<!-- Fix Footer -->
<script src="{{ asset('assets/vendor/fix-footer.js') }}"></script>

<!-- App JS -->
<script src="{{ asset('assets/js/app.js') }}"></script>



<!-- Global Settings -->
<script src="{{ asset('assets/js/settings.js') }}"></script>

<!-- Moment.js -->
<script src="{{ asset('assets/vendor/moment.min.js') }}"></script>
<script src="{{ asset('assets/vendor/moment-range.min.js') }}"></script>

<!-- Chart.js -->
<script src="{{ asset('assets/vendor/Chart.min.js') }}"></script>

<!-- UI Charts Page JS -->
<script src="{{ asset('assets/js/chartjs-rounded-bar.js') }}"></script>
<script src="{{ asset('assets/js/chartjs.js') }}"></script>

<!-- Chart.js Samples -->
<script src="{{ asset('assets/js/page.instructor-dashboard.js') }}"></script>

<!-- List.js -->
<script src="{{ asset('assets/vendor/list.min.js') }}"></script>
<script src="{{ asset('assets/js/list.js') }}"></script>

<!-- Sidebar Mini JS -->
<script src="{{ asset('assets/js/sidebar-mini.js') }}"></script>
@yield('js')
<script>
    (function() {
        'use strict';

        // ENABLE sidebar menu tabs
        $('.js-sidebar-mini-tabs [data-toggle="tab"]').on('click', function(e) {
            e.preventDefault()
            $(this).tab('show')
        })

        $('.js-sidebar-mini-tabs').on('show.bs.tab', function(e) {
            $('.js-sidebar-mini-tabs > .active').removeClass('active')
            $(e.target).parent().addClass('active')
        })
    })()
</script>











