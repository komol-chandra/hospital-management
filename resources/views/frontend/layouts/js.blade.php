{{-- <script type="text/javascript">
    function activateSchool(school_id) {
      $.ajax({
        url: "http://ekattor-school-erp.com/demo/v7/home/active_school_id_for_frontend/"+school_id,
        success: function(response){
          location.reload();
        }
      });
    }
    </script> --}}
    
          <!-- JS Global Compulsory -->
      <script src="{{ asset('frontend/assets/vendor/jquery/dist/jquery.min.js') }}"></script>
      <script src="{{ asset('frontend/assets/vendor/jquery-migrate/dist/jquery-migrate.min.js') }}"></script>
      <script src="{{ asset('frontend/assets/vendor/popper.js/dist/umd/popper.min.js') }}"></script>
      <script src="{{ asset('frontend/assets/vendor/bootstrap/bootstrap.min.js') }}"></script>
    
      <!-- JS Implementing Plugins -->
      <script src="{{ asset('frontend/assets/vendor/hs-megamenu/src/hs.megamenu.js') }}"></script>
      <script src="{{ asset('frontend/assets/vendor/svg-injector/dist/svg-injector.min.js') }}"></script>
      <script src="{{ asset('frontend/assets/vendor/fancybox/jquery.fancybox.min.js') }}"></script>
      <script src="{{ asset('frontend/assets/vendor/slick-carousel/slick/slick.js') }}"></script>
      <script src="{{ asset('frontend/assets/vendor/jquery-validation/dist/jquery.validate.min.js') }}"></script>
      <script src="{{ asset('frontend/assets/vendor/cubeportfolio/js/jquery.cubeportfolio.min.js') }}"></script>
    
    
      <!-- JS Front -->
      <script src="{{ asset('frontend/assets/js/hs.core.js') }}"></script>
      <script src="{{ asset('frontend/assets/js/components/hs.header.js') }}"></script>
      <script src="{{ asset('frontend/assets/js/components/hs.unfold.js') }}"></script>
      <script src="{{ asset('frontend/assets/js/components/hs.fancybox.js') }}"></script>
      <script src="{{ asset('frontend/assets/js/components/hs.slick-carousel.js') }}"></script>
      <script src="{{ asset('frontend/assets/js/components/hs.validation.js') }}"></script>
      <script src="{{ asset('frontend/assets/js/components/hs.focus-state.js') }}"></script>
    
      <script src="{{ asset('frontend/assets/js/components/hs.g-map.js') }}"></script>
      <script src="{{ asset('frontend/assets/js/components/hs.cubeportfolio.js') }}"></script>
      <script src="{{ asset('frontend/assets/js/components/hs.svg-injector.js') }}"></script>
      <script src="{{ asset('frontend/assets/js/components/hs.go-to.js') }}"></script>
      <script src="{{ asset('frontend/assets/js/custom.js') }}"></script>

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
    
    
      <!-- JS Plugins Init. -->
      <script>
        $(window).on('load', function () {
          // initialization of HSMegaMenu component
          $('.js-mega-menu').HSMegaMenu({
            event: 'hover',
            pageContainer: $('.container'),
            breakpoint: 767.98,
            hideTimeOut: 0
          });
    
          // initialization of svg injector module
          $.HSCore.components.HSSVGIngector.init('.js-svg-injector');
        });
    
        $(document).on('ready', function () {
          // initialization of header
          $.HSCore.components.HSHeader.init($('#header'));
    
          // initialization of unfold component
          $.HSCore.components.HSUnfold.init($('[data-unfold-target]'));
    
          // initialization of fancybox
          $.HSCore.components.HSFancyBox.init('.js-fancybox');
    
          // initialization of slick carousel
          $.HSCore.components.HSSlickCarousel.init('.js-slick-carousel');
    
          // initialization of form validation
          $.HSCore.components.HSValidation.init('.js-validate');
    
          // initialization of forms
          $.HSCore.components.HSFocusState.init();
    
          // initialization of cubeportfolio
          $.HSCore.components.HSCubeportfolio.init('.cbp');
    
          // initialization of go to
          $.HSCore.components.HSGoTo.init('.js-go-to');
        });
      </script>
      @yield('js')