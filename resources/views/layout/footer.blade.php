<footer class="footer px-4 pt-4 pb-3 text-white">
    <div class="container">
        <div class="row d-flex justify-content-between">
            <div class="col-md-4 col-sm-12 align-items-center">
                <img src="{{ asset('icons/footer.svg') }}" class="align-baseline my-1" alt="Logo" width="auto"
                    height="70px">
                <p>Reduce your concrete problems and get step-by-step calculations with the online resource of
                    Fraction-online.net.</p>
                <p>Powered By
                    <a href="https://www.eclixtech.com/" title="EclixTech" target="blank" class="bg-white p-1 rounded pt-0">
                        <img src="{{ asset('icons/eclixtech.png') }}" alt="eclixtech" width="auto" height="15px">
                    </a>
                </p>
            </div>
            <div class="col-md-4 col-sm-12 align-items-center ps-md-5">
                <ul class="text-capitalize list-unstyled ms-md-5">
                    <li class="h5">Links</li>
                    <li>
                        <a href="{{ url('/') }}" class="text-white text-decoration-none" title="Home">
                            Home
                        </a>
                    </li>
                    <li>
                        <a href="{{ url('brick-calculator') }}" class="text-white text-decoration-none" title="Brick Calculator">
                            Brick Calculator
                        </a>
                    </li>
                    <li>
                        {{-- <a href="{{ url('contact-us') }}" class="text-white text-decoration-none" title="Contact Us">
                            Contact Us
                        </a> --}}
                    </li>
                    <li>
                        {{-- <a href="{{ url('terms-and-ondition') }}" class="text-white text-decoration-none"
                            title="Terms and Condition">
                            Terms and Condition
                        </a> --}}
                    </li>
                    <li>
                        {{-- <a href="{{ url('about-us') }}" class="text-white text-decoration-none"
                            title="About us">
                            About us
                        </a> --}}
                    </li>
                </ul>
            </div>
            <div class="col-md-4 col-sm-12 align-items-center ps-md-2">
                <ul class="text-capitalize list-unstyled ms-md-5">
                    <li class="h5">Mail at</li>
                    <li>
                        <img src="{{asset('icons/Email.png')}}" alt="Email" width="auto" height="24px" class="pe-3">
                        <a href="mailto:" class="text-white text-decoration-none">info@concretecalculator.com</a>
                    </li>
                    <li class="h5">Newslatters</li>
                    <div class="icons mt-1">
                        <a class="text-decoration-none fb curser-pinter" title="facebook">
                            <img class="rounded align-text-top" src="{{ asset('icons/Facebook.png') }}" alt="facebook"
                                width="auto" height="30px">
                        </a>
                        <a class="text-decoration-none LinkedIn px-2" title="LinkedIn">
                            <img class="rounded align-text-top" src="{{ asset('icons/LinkedIn.png') }}" alt="twitter"
                                width="auto" height="30px">
                        </a>
                        <a class="text-decoration-none twitter" title="twitter">
                            <img class="rounded align-text-top" src="{{ asset('icons/Twitter.png') }}" alt="twitter"
                                width="auto" height="30px">
                        </a>
                        <a class="text-decoration-none instagram px-2" title="instagram">
                            <img class="rounded align-text-top" src="{{ asset('icons/Instagram.png') }}" alt="instagram"
                                width="auto" height="30px">
                        </a>
                        <a class="text-decoration-none pinterset" title="pinterest">
                            <img class="rounded align-text-top" src="{{ asset('icons/Pinterest.png') }}" alt="pinterest"
                                width="auto" height="30px">
                        </a>
                    </div>
                </ul>
            </div>
        </div>
        <div class="text-white border-top border-2 text-center mt-3 mt-md-0">
            <p class="mt-3 mb-0">© Copyrights 2023 <a href="http://www.concrete-calculator.net"
                    class="d-inline text-decoration-none text-white">concrete-calculator.net</a></p>
        </div>
    </div>


</footer>
