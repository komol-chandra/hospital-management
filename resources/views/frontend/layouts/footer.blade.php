<footer class="border-top">
    <div class="container space-2">
      <div class="row">
        <div class="col-sm-3 col-lg-2 order-sm-2 mb-4 mb-sm-0 ml-lg-auto">
          <h4 class="h6 font-weight-semi-bold">Contact</h4>
  
          <!-- Address -->
          <address>
            <ul class="list-group list-group-flush list-group-borderless mb-0">
              <li class="list-group-item">{{ $settings->contact }}</li>
              <li class="list-group-item">
                <a href="mailto:{{ $settings->email }}">{{ $settings->email }}</a>
              </li>
              <li class="list-group-item">{{ $settings->address }}</li>
            </ul>
          </address>
          <!-- End Address -->
        </div>
        <div class="col-sm-3 col-lg-2 order-sm-2 mb-4 mb-sm-0 ml-lg-auto">
          <h4 class="h6 font-weight-semi-bold">About</h4>
  
          <!-- List Group -->
          <ul class="list-group list-group-flush list-group-borderless mb-0">
            <li><a class="list-group-item list-group-item-action"
              href="#">About</a></li>
              <li><a class="list-group-item list-group-item-action"
                href="#">Doctors </a></li>
                <li><a class="list-group-item list-group-item-action"
                  href="#">Gallery </a></li>
                </ul>
                <!-- End List Group -->
              </div>
  
              <div class="col-sm-3 col-lg-2 order-sm-3 mb-4 mb-sm-0">
                <h4 class="h6 font-weight-semi-bold">Resources</h4>
  
                <!-- List Group -->
                <ul class="list-group list-group-flush list-group-borderless mb-0">
                  <li><a class="list-group-item list-group-item-action"
                    href="#">Terms & Conditions</a></li>
                    <li><a class="list-group-item list-group-item-action"
                      href="#">Privacy Policy</a></li>
                      <li><a class="list-group-item list-group-item-action" target="_blank"
                        href="#">Login</a></li>
                      </ul>
                      <!-- End List Group -->
                    </div>
  
                    <!-- ALUMNI CONTENT IF ADDON IS AVAILABLE STARTS -->
                                        <!-- ALUMNI CONTENT IF ADDON IS AVAILABLE STARTS -->
  
                    <div class="col-sm-6 col-lg-4 order-sm-1">
                      {{-- <div class="mb-1">
                        <select class="form-control" name="" onchange="activateSchool(this.value)">
                                                  <option value="1" selected>University of Michigan</option>
                                            </select>
                    </div> --}}
                    <!-- Logo -->
                    <a class="d-inline-flex align-items-center mb-2" href="index.html">
                      {{-- <img src="{{ asset ('frontend/assets/uploads/system/logo/logo-dark.png') }}" style="height:45px;" /> --}}
                    </a>
                    <!-- End Logo -->
  
                    <div class="mb-4">
                      <p class="small text-muted">© All the rights reserved to {{ $settings->footer_text }} form {{ $settings->footer_year }}</p>
                    </div>
  
                    <!-- Social Networks -->
                    <ul class="list-inline mb-0">
                      <li class="list-inline-item mx-0">
                        <a class="btn btn-sm btn-icon btn-soft-secondary rounded-circle"
                        href="{{ $settings->facebook }}" target="_blank">
                        <span class="fab fa-facebook-f btn-icon__inner"></span>
                      </a>
                    </li>
                    <li class="list-inline-item mx-0">
                      <a class="btn btn-sm btn-icon btn-soft-secondary rounded-circle"
                      href="{{ $settings->instagram }}" target="_blank">
                      <span class="fab fa-instagram btn-icon__inner"></span>
                    </a>
                  </li>
                  <li class="list-inline-item mx-0">
                    <a class="btn btn-sm btn-icon btn-soft-secondary rounded-circle"
                    href="{{ $settings->twitter }}" target="_blank">
                    <span class="fab fa-twitter btn-icon__inner"></span>
                  </a>
                </li>
                <li class="list-inline-item mx-0">
                  <a class="btn btn-sm btn-icon btn-soft-secondary rounded-circle"
                  href="{{ $settings->google }}" target="_blank">
                  <span class="fab fa-google btn-icon__inner"></span>
                </a>
              </li>
              <li class="list-inline-item mx-0">
                <a class="btn btn-sm btn-icon btn-soft-secondary rounded-circle"
                href="{{ $settings->youtube }}" target="_blank">
                <span class="fab fa-youtube btn-icon__inner"></span>
              </a>
            </li>
            <li class="list-inline-item mx-0">
              <a class="btn btn-sm btn-icon btn-soft-secondary rounded-circle"
              href="{{ $settings->linkedin }}" target="_blank">
              <span class="fab fa-linkedin btn-icon__inner"></span>
            </a>
          </li>
        </ul>
        <!-- End Social Networks -->
      </div>
    </div>
  </div>
  </footer>
  <!-- Go to Top -->
<a class="js-go-to u-go-to" href="#"
data-position='{"bottom": 15, "right": 15 }'
data-type="fixed"
data-offset-top="400"
data-compensation="#header"
data-show-effect="slideInUp"
data-hide-effect="slideOutDown">
<span class="fas fa-arrow-up u-go-to__inner"></span>
</a>
<!-- End Go to Top -->