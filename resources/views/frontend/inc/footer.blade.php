<footer class="footer-area spacer pb-5">

    <div class="footer-style-1 pt-80">
        <div class="container">
            <div class="row mb-20">
                  <div class="col-xl-4 col-lg-4 col-md-4 footer-col-4">
                      <div>
                          <h5 class="fw-bold txt-primary">Description</h5>
                          <div>
                              <p class="text-white">
                                  {{\App\Models\CompanyDetail::where('id',1)->first()->footer_content}}
                              </p>
                              <div class="footer-log">
                                  <a href="{{ route('homepage')}}" class="footer-logo">
                                      <img src="{{ asset('images/company/'.\App\Models\CompanyDetail::where('id',1)->first()->header_logo)}}" class="img-fluid" width="110px"></a>
                              </div>
                          </div>
                      </div>
                  </div>
                  <div class="col-xl-4 col-lg-4 col-md-4 footer-col-4">
                      <div>
                          <h5 class="fw-bold txt-primary">Pages</h5>
                          <div>
                              <ul>
                                  <li>
                                      <div class="eventBox">
                                          <div class="basis-40 txt-primary">
                                              <h4 class="semi-02-title">
                                                  <iconify-icon class="me-2" icon="material-symbols:privacy-tip"></iconify-icon>
                                              </h4>
                                          </div>
                                          <div class="flex-4 pt-2">
                                              <a href="{{ route('frontend.privacy') }}" class="text-decoration-none">
                                                  <span>Privacy Policy</span>
                                              </a>
                                          </div>
                                      </div>
                                  </li>
                                  <li>
                                      <div class="eventBox">
                                          <div class="basis-40 txt-primary">
                                              <h4 class="semi-02-title">
                                                  <iconify-icon class="me-2" icon="material-symbols:description"></iconify-icon>
                                              </h4>
                                          </div>
                                          <div class="flex-4 pt-2">
                                              <a href="{{ route('frontend.terms') }}" class="text-decoration-none">
                                                  <span>Terms of Service</span>
                                              </a>
                                          </div>
                                      </div>
                                  </li>
                                  <li>
                                      <div class="eventBox">
                                          <div class="basis-40 txt-primary">
                                              <h4 class="semi-02-title">
                                                  <iconify-icon class="me-2" icon="material-symbols:help-outline"></iconify-icon>
                                              </h4>
                                          </div>
                                          <div class="flex-4 pt-2">
                                              <a href="{{ route('frontend.faq') }}" class="text-decoration-none">
                                                  <span>FAQ</span>
                                              </a>
                                          </div>
                                      </div>
                                  </li>
                              </ul>
                          </div>
                      </div>
                  </div>
                  <div class="col-xl-4 col-lg-4 col-md-4 footer-col-4">
                      <div>
                          <h5 class="fw-bold txt-primary">Contact Us</h5>
                          <div>
                              <ul>
                                  <li>
                                      <div class="eventBox">
                                          <div class="basis-40 txt-primary">
                                              <h4 class="semi-02-title">
                                                  <iconify-icon class="me-2" icon="material-symbols:add-home-outline"></iconify-icon>
                                              </h4>
                                          </div>
                                          <div class="flex-4 pt-2">
                                              <span><i class="fal fa-map-marker-alt"></i>{{\App\Models\CompanyDetail::where('id',1)->first()->address1 }}</span>
                                          </div>
                                      </div>
                                  </li>
                                  <li>
                                      <div class="eventBox">
                                          <div class="basis-40 txt-primary">
                                              <h4 class="semi-02-title">
                                                  <iconify-icon class="me-2" icon="memory:email"></iconify-icon>
                                              </h4>
                                          </div>
                                          <div class="flex-4 pt-2">
                                              <span><i class="fal fa-map-marker-alt"></i>{{\App\Models\CompanyDetail::where('id',1)->first()->email1 }}</span>
                                          </div>
                                      </div>
                                  </li>
                                  <li>
                                      <div class="eventBox">
                                          <div class="basis-40 txt-primary">
                                              <h4 class="semi-02-title">
                                                  <iconify-icon class="me-2" icon="fluent:call-16-regular"></iconify-icon>
                                              </h4>
                                          </div>
                                          <div class="flex-4 pt-2">
                                              
                                              <span><i class="fal fa-map-marker-alt"></i>{{\App\Models\CompanyDetail::where('id',1)->first()->phone1 }}</span>
                                          </div>
                                      </div>
                                  </li>
                              </ul>
                          </div>
                      </div>
                  </div>
                
            </div>
        </div>
    </div>
    <div class="container py-2 mt-2">
        <div class="">
            <div class="row align-items-center">
                <div class="col-xl-12">
                    <div class="copyright text-center">
                        <p class=" txt-primary">Copyright © 2024 <a href="">Bondhon.</a> 
                            Design & Developed By: <a href="https://mentosoftware.co.uk" target="_blank"></a><br>
                            <a href="https://mentosoftware.co.uk" target="_blank">Mento Software</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>


