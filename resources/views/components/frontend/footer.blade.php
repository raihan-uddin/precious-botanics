@php use App\Helpers\SettingsHelper; @endphp

    <!-- Services -->
    <section class="section-services overflow-hidden py-[50px] max-[1199px]:py-[35px]">
        <div class="flex flex-wrap justify-between relative items-center mx-auto min-[1400px]:max-w-[1320px] min-[1200px]:max-w-[1140px] min-[992px]:max-w-[960px] min-[768px]:max-w-[720px] min-[576px]:max-w-[540px]">
            <div class="flex flex-wrap w-full mb-[-24px]">
                <div class="min-[992px]:w-[25%] min-[768px]:w-[50%] w-full px-[12px] mb-[24px]" data-aos="flip-up" data-aos-duration="1000" data-aos-delay="200">
                    <div class="bb-services-box p-[30px] border-[1px] border-solid border-[#eee] rounded-[20px] text-center">
                        <div class="services-img mb-[20px] flex justify-center">
                            <img src="{{ asset('assets/img/services/1.png') }}" alt="services-1" class="w-[50px]">
                        </div>
                        <div class="services-contact">
                            <h4 class="font-quicksand mb-[8px] text-[18px] font-bold text-[#3d4750] leading-[1.2] tracking-[0.03rem]">Free Shipping</h4>
                            <p class="font-Poppins font-light text-[14px] leading-[20px] text-[#686e7d] tracking-[0.03rem]">Free shipping on all Us orders above $200</p>
                        </div>
                    </div>
                </div>
                <div class="min-[992px]:w-[25%] min-[768px]:w-[50%] w-full px-[12px] mb-[24px]" data-aos="flip-up" data-aos-duration="1000" data-aos-delay="400">
                    <div class="bb-services-box p-[30px] border-[1px] border-solid border-[#eee] rounded-[20px] text-center">
                        <div class="services-img mb-[20px] flex justify-center">
                            <img src="{{ asset('assets/img/services/2.png') }}" alt="services-2" class="w-[50px]">
                        </div>
                        <div class="services-contact">
                            <h4 class="font-quicksand mb-[8px] text-[18px] font-bold text-[#3d4750] leading-[1.2] tracking-[0.03rem]">24x7 Support</h4>
                            <p class="font-Poppins font-light text-[14px] leading-[20px] text-[#686e7d] tracking-[0.03rem]">We provide email support at any time, day or night.</p>
                        </div>
                    </div>
                </div>
                <div class="min-[992px]:w-[25%] min-[768px]:w-[50%] w-full px-[12px] mb-[24px]" data-aos="flip-up" data-aos-duration="1000" data-aos-delay="600">
                    <div class="bb-services-box p-[30px] border-[1px] border-solid border-[#eee] rounded-[20px] text-center">
                        <div class="services-img mb-[20px] flex justify-center">
                            <img src="{{ asset('assets/img/services/3.png') }}" alt="services-3" class="w-[50px]">
                        </div>
                        <div class="services-contact">
                            <h4 class="font-quicksand mb-[8px] text-[18px] font-bold text-[#3d4750] leading-[1.2] tracking-[0.03rem]">Distributor</h4>
                            <p class="font-Poppins font-light text-[14px] leading-[20px] text-[#686e7d] tracking-[0.03rem]">You can easily become distributor.</p>
                        </div>
                    </div>
                </div>
                <div class="min-[992px]:w-[25%] min-[768px]:w-[50%] w-full px-[12px] mb-[24px]" data-aos="flip-up" data-aos-duration="1000" data-aos-delay="800">
                    <div class="bb-services-box p-[30px] border-[1px] border-solid border-[#eee] rounded-[20px] text-center">
                        <div class="services-img mb-[20px] flex justify-center">
                            <img src="{{ asset('assets/img/services/4.png') }}" alt="services-4" class="w-[50px]">
                        </div>
                        <div class="services-contact">
                            <h4 class="font-quicksand mb-[8px] text-[18px] font-bold text-[#3d4750] leading-[1.2] tracking-[0.03rem]">Payment Secure</h4>
                            <p class="font-Poppins font-light text-[14px] leading-[20px] text-[#686e7d] tracking-[0.03rem]">We ensure secure payment method</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


<!-- Footer -->
<footer class="bb-footer mt-[50px] max-[1199px]:mt-[35px] bg-[#f8f8fb] text-[#fff]">
    <div class="footer-directory py-[50px] max-[1199px]:py-[35px] border-[1px] border-solid">
        <div
            class="flex flex-wrap justify-between relative items-center mx-auto min-[1400px]:max-w-[1320px] min-[1200px]:max-w-[1140px] min-[992px]:max-w-[960px] min-[768px]:max-w-[720px] min-[576px]:max-w-[540px]">
            <div class="flex flex-wrap w-full">
                <div class="w-full" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="200">
                    <div class="directory-title mb-[24px] text-center">
                        <h4 class="font-quicksand leading-[1.2] text-[16px] font-bold text-[#3d4750] tracking-[0] uppercase">
                            Tags Directory</h4>
                    </div>
                    <div class="directory-contact mb-[-24px]">
                        <div class="flex flex-wrap w-full">
                            <div class=" w-full px-[12px]">
                                <div class="inner-contact mb-[24px]">
                                    <ul class="flex flex-wrap">
                                        <li>
                                                <span
                                                    class="font-Poppins leading-[28px] tracking-[0.03rem] mr-[12px] text-[14px] font-semibold text-[#686e7d] capitalize">All Tags :</span>
                                        </li> 
                                        @php($tags = getAllTags())
                                            @foreach ($tags as $tag)
                                            <li>
                                                <a href="{{ route('tag.products', $tag->slug) }}"
                                                class="transition-all duration-[0.3s] ease-in-out font-Poppins leading-[28px] tracking-[0.03rem] text-[13px] font-normal text-[#686e7d] hover:text-[#6c7fd8] capitalize">{{ $tag->name }}</a>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-container border-t-[1px] border-solid border-[#eee]">
        <div class="footer-top py-[50px] max-[1199px]:py-[35px]">
            <div
                class="flex flex-wrap justify-between relative items-center mx-auto min-[1400px]:max-w-[1320px] min-[1200px]:max-w-[1140px] min-[992px]:max-w-[960px] min-[768px]:max-w-[720px] min-[576px]:max-w-[540px]">
                <div class="flex flex-wrap w-full max-[991px]:mb-[-30px]" data-aos="fade-up"
                     data-aos-duration="1000" data-aos-delay="200">
                    <div
                        class="min-[992px]:w-[25%] max-[991px]:w-full w-full px-[12px] bb-footer-toggle bb-footer-cat">
                        <div class="bb-footer-widget bb-footer-company flex flex-col max-[991px]:mb-[24px]">
                            <img src="{{ asset('assets/img/logo/logo.png') }}"
                                 class="bb-footer-logo max-w-[144px] mb-[30px] max-[767px]:max-w-[130px]"
                                 alt="footer logo">
                            <img src="{{ asset('assets/img/logo/logo.png') }}"
                                 class="bb-footer-dark-logo max-w-[144px] mb-[30px] max-[767px]:max-w-[130px] hidden"
                                 alt="footer logo">
                            <p class="bb-footer-detail max-w-[400px] mb-[30px] p-[0] font-Poppins text-[14px] leading-[27px] font-normal text-[#686e7d] inline-block relative max-[1399px]:text-[15px] max-[1199px]:text-[14px]">
                                Precious Botanics is your go-to source for natural and herbal beauty products. Embrace
                                your wellness journey with our carefully curated selection.
                            </p>
                        </div>
                    </div>
                    <div
                        class="min-[992px]:w-[16.66%] max-[991px]:w-full w-full px-[12px] bb-footer-toggle bb-footer-account">
                        <div class="bb-footer-widget">
                            <h4 class="bb-footer-heading font-quicksand leading-[1.2] text-[18px] font-bold mb-[20px] text-[#3d4750] tracking-[0] relative block w-full pb-[15px] capitalize border-b-[1px] border-solid border-[#eee] max-[991px]:text-[14px]">
                            INFORMATION</h4>
                            <div class="bb-footer-links bb-footer-dropdown hidden max-[991px]:mb-[35px]">
                                <ul class="align-items-center">
                                    <li class="bb-footer-link leading-[1.5] flex items-center mb-[16px] max-[991px]:mb-[15px]">
                                        <a href="{{ route('about') }}"
                                           class="transition-all duration-[0.3s] ease-in-out font-Poppins text-[14px] leading-[20px] text-[#686e7d] hover:text-[#6c7fd8] mb-[0] inline-block break-all tracking-[0] font-normal">About
                                            us</a>
                                    </li>
                                    <li class="bb-footer-link leading-[1.5] flex items-center mb-[16px] max-[991px]:mb-[15px]">
                                        <a href="{{ route('delivery.information') }}"
                                           class="transition-all duration-[0.3s] ease-in-out font-Poppins text-[14px] leading-[20px] text-[#686e7d] hover:text-[#6c7fd8] mb-[0] inline-block break-all tracking-[0] font-normal">Delivery Information</a>
                                    </li>
                                    <li class="bb-footer-link leading-[1.5] flex items-center mb-[16px] max-[991px]:mb-[15px]">
                                        <a href="{{ route('privacy.policy') }}"
                                           class="transition-all duration-[0.3s] ease-in-out font-Poppins text-[14px] leading-[20px] text-[#686e7d] hover:text-[#6c7fd8] mb-[0] inline-block break-all tracking-[0] font-normal">Privacy Policy</a>
                                    </li>
                                    <li class="bb-footer-link leading-[1.5] flex items-center mb-[16px] max-[991px]:mb-[15px]">
                                        <a href="{{ route('terms.of.service') }}"
                                           class="transition-all duration-[0.3s] ease-in-out font-Poppins text-[14px] leading-[20px] text-[#686e7d] hover:text-[#6c7fd8] mb-[0] inline-block break-all tracking-[0] font-normal">Terms
                                            of Service</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div
                        class="min-[992px]:w-[16.66%] max-[991px]:w-full w-full px-[12px] bb-footer-toggle bb-footer-account">
                        <div class="bb-footer-widget">
                            <h4 class="bb-footer-heading font-quicksand leading-[1.2] text-[18px] font-bold mb-[20px] text-[#3d4750] tracking-[0] relative block w-full pb-[15px] capitalize border-b-[1px] border-solid border-[#eee] max-[991px]:text-[14px]">
                            CUSTOMER SERVICE</h4>
                            <div class="bb-footer-links bb-footer-dropdown hidden max-[991px]:mb-[35px]">
                                <ul class="align-items-center">
                                    <li class="bb-footer-link leading-[1.5] flex items-center mb-[16px] max-[991px]:mb-[15px]">
                                        <a href="{{ route('contact') }}"
                                           class="transition-all duration-[0.3s] ease-in-out font-Poppins text-[14px] leading-[20px] text-[#686e7d] hover:text-[#6c7fd8] mb-[0] inline-block break-all tracking-[0] font-normal">
                                           Contact Us
                                        </a>
                                    </li>
                                    <li class="bb-footer-link leading-[1.5] flex items-center mb-[16px] max-[991px]:mb-[15px]">
                                        <a href="{{ route('return.policy') }}"
                                           class="transition-all duration-[0.3s] ease-in-out font-Poppins text-[14px] leading-[20px] text-[#686e7d] hover:text-[#6c7fd8] mb-[0] inline-block break-all tracking-[0] font-normal">
                                           Return Policy
                                        </a>
                                    </li>
                                    <li class="bb-footer-link leading-[1.5] flex items-center mb-[16px] max-[991px]:mb-[15px]">
                                        <a href="{{ route('privacy.policy') }}"
                                           class="transition-all duration-[0.3s] ease-in-out font-Poppins text-[14px] leading-[20px] text-[#686e7d] hover:text-[#6c7fd8] mb-[0] inline-block break-all tracking-[0] font-normal">
                                           Site Map
                                        </a>
                                    </li>

                                    <li class="bb-footer-link leading-[1.5] flex items-center mb-[16px] max-[991px]:mb-[15px]">
                                        <a href="#"
                                           class="transition-all duration-[0.3s] ease-in-out font-Poppins text-[14px] leading-[20px] text-[#686e7d] hover:text-[#6c7fd8] mb-[0] inline-block break-all tracking-[0] font-normal">Become
                                            a Distributor</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div
                        class="min-[992px]:w-[16.66%] max-[991px]:w-full w-full px-[12px] bb-footer-toggle bb-footer-service">
                        <div class="bb-footer-widget">
                            <h4 class="bb-footer-heading font-quicksand leading-[1.2] text-[18px] font-bold mb-[20px] text-[#3d4750] tracking-[0] relative block w-full pb-[15px] capitalize border-b-[1px] border-solid border-[#eee] max-[991px]:text-[14px]">
                            MY ACCOUNT</h4>
                            <div class="bb-footer-links bb-footer-dropdown hidden max-[991px]:mb-[35px]">
                                <ul class="align-items-center">
                                    <li class="bb-footer-link leading-[1.5] flex items-center mb-[16px] max-[991px]:mb-[15px]">
                                        <a href="{{ route('login') }}"
                                           class="transition-all duration-[0.3s] ease-in-out font-Poppins text-[14px] leading-[20px] text-[#686e7d] hover:text-[#6c7fd8] mb-[0] inline-block break-all tracking-[0] font-normal">Sign
                                            In</a>
                                    </li>
                                    <li class="bb-footer-link leading-[1.5] flex items-center mb-[16px] max-[991px]:mb-[15px]">
                                        <a href="#"
                                           class="transition-all duration-[0.3s] ease-in-out font-Poppins text-[14px] leading-[20px] text-[#686e7d] hover:text-[#6c7fd8] mb-[0] inline-block break-all tracking-[0] font-normal">View
                                            Cart</a>
                                    </li>
                                    <li class="bb-footer-link leading-[1.5] flex items-center mb-[16px] max-[991px]:mb-[15px]">
                                        <a href="#"
                                           class="transition-all duration-[0.3s] ease-in-out font-Poppins text-[14px] leading-[20px] text-[#686e7d] hover:text-[#6c7fd8] mb-[0] inline-block break-all tracking-[0] font-normal">Affiliate
                                            Program</a>
                                    </li>
                                    <li class="bb-footer-link leading-[1.5] flex items-center">
                                        <a href="#"
                                           class="transition-all duration-[0.3s] ease-in-out font-Poppins text-[14px] leading-[20px] text-[#686e7d] hover:text-[#6c7fd8] mb-[0] inline-block break-all tracking-[0] font-normal">Payments</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div
                        class="min-[992px]:w-[25%] max-[991px]:w-full w-full px-[12px] bb-footer-toggle bb-footer-cont-social">
                        <div class="bb-footer-contact mb-[30px]">
                            <div class="bb-footer-widget">
                                <h4 class="bb-footer-heading font-quicksand leading-[1.2] text-[18px] font-bold mb-[20px] text-[#3d4750] tracking-[0] relative block w-full pb-[15px] capitalize border-b-[1px] border-solid border-[#eee] max-[991px]:text-[14px]">
                                    Contact</h4>
                                <div class="bb-footer-links bb-footer-dropdown hidden max-[991px]:mb-[35px]">
                                    <ul class="align-items-center">
                                        <li class="bb-footer-link bb-foo-location flex items-start max-[991px]:mb-[15px] mb-[16px]">
                                                <span class="mt-[5px] w-[25px] basis-[auto] grow-[0] shrink-[0]">
                                                    <i class="ri-map-pin-line leading-[0] text-[18px] text-[#6c7fd8]"></i>
                                                </span>
                                            <p class="m-[0] font-Poppins text-[14px] text-[#686e7d] font-normal leading-[28px] tracking-[0.03rem]">
                                                {{ SettingsHelper::get('site_address', 'Dhaka, Bangladesh') }}
                                            </p>
                                        </li>
                                        @if (SettingsHelper::get('site_phone')) 
                                            <li class="bb-footer-link bb-foo-call flex items-start max-[991px]:mb-[15px] mb-[16px]">
                                                    <span class="w-[25px] basis-[auto] grow-[0] shrink-[0]">
                                                        <i class="ri-whatsapp-line leading-[0] text-[18px] text-[#6c7fd8]"></i>
                                                    </span>
                                                <a href="tel:{{ SettingsHelper::get('site_phone', '+8801680527922') }}"
                                                class="transition-all duration-[0.3s] ease-in-out font-Poppins text-[14px] leading-[20px] text-[#686e7d] inline-block relative break-all tracking-[0] font-normal max-[1399px]:text-[15px] max-[1199px]:text-[14px]">
                                                    {{ SettingsHelper::get('site_phone', '+8801680527922') }}
                                                </a>
                                            </li>
                                        @endif
                                        <li class="bb-footer-link bb-foo-mail flex">
                                                <span class="w-[25px] basis-[auto] grow-[0] shrink-[0]">
                                                    <i class="ri-mail-line leading-[0] text-[18px] text-[#6c7fd8]"></i>
                                                </span>
                                            <a href="mailto:{{ SettingsHelper::get('site_email', 'raihanuddin2@yahoo.com') }}"
                                               class="transition-all duration-[0.3s] ease-in-out font-Poppins text-[14px] leading-[20px] text-[#686e7d] inline-block relative break-all tracking-[0] font-normal max-[1399px]:text-[15px] max-[1199px]:text-[14px]">
                                                {{ SettingsHelper::get('site_email', 'raihanuddin2@yahoo.com') }}
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="bb-footer-social">
                            <div class="bb-footer-widget">
                                <div class="bb-footer-links bb-footer-dropdown hidden max-[991px]:mb-[35px]">
                                    <ul class="align-items-center flex flex-wrap items-center">
                                        @if(SettingsHelper::get('site_facebook'))
                                            <li class="bb-footer-link leading-[1.5] flex items-center pr-[5px]">
                                                <a href="{{ SettingsHelper::get('site_facebook') }}"
                                                   class="transition-all duration-[0.3s] ease-in-out w-[30px] h-[30px] rounded-[5px] bg-[#3d4750] hover:bg-[#6c7fd8] capitalize flex items-center justify-center text-[15px] leading-[20px] text-[#686e7d] relative break-all font-normal"><i
                                                        class="ri-facebook-fill text-[16px] text-[#fff]"></i></a>
                                            </li>
                                        @endif
                                        @if(SettingsHelper::get('twitter'))
                                            <li class="bb-footer-link leading-[1.5] flex items-center pr-[5px]">
                                                <a href="{{ SettingsHelper::get('twitter') }}"
                                                   class="transition-all duration-[0.3s] ease-in-out w-[30px] h-[30px] rounded-[5px] bg-[#3d4750] hover:bg-[#6c7fd8] capitalize flex items-center justify-center text-[15px] leading-[20px] text-[#686e7d] relative break-all font-normal"><i
                                                        class="ri-twitter-fill text-[16px] text-[#fff]"></i></a>
                                            </li>
                                        @endif
                                        @if(SettingsHelper::get('linkedin'))
                                            <li class="bb-footer-link leading-[1.5] flex items-center pr-[5px]">
                                                <a href="{{ SettingsHelper::get('linkedin') }}"
                                                   class="transition-all duration-[0.3s] ease-in-out w-[30px] h-[30px] rounded-[5px] bg-[#3d4750] hover:bg-[#6c7fd8] capitalize flex items-center justify-center text-[15px] leading-[20px] text-[#686e7d] relative break-all font-normal"><i
                                                        class="ri-linkedin-fill text-[16px] text-[#fff]"></i></a>
                                            </li>
                                        @endif
                                        @if(SettingsHelper::get('instagram'))
                                            <li class="bb-footer-link leading-[1.5] flex items-center pr-[5px]">
                                                <a href="javascript:void(0)"
                                                   class="transition-all duration-[0.3s] ease-in-out w-[30px] h-[30px] rounded-[5px] bg-[#3d4750] hover:bg-[#6c7fd8] capitalize flex items-center justify-center text-[15px] leading-[20px] text-[#686e7d] relative break-all font-normal"><i
                                                        class="ri-instagram-line text-[16px] text-[#fff]"></i></a>
                                            </li>
                                        @endif
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-bottom py-[10px] border-t-[1px] border-solid border-[#eee] max-[991px]:py-[15px]">
            <div
                class="flex flex-wrap justify-between relative items-center mx-auto min-[1400px]:max-w-[1320px] min-[1200px]:max-w-[1140px] min-[992px]:max-w-[960px] min-[768px]:max-w-[720px] min-[576px]:max-w-[540px]">
                <div class="flex flex-wrap w-full">
                    <div
                        class="bb-bottom-info w-full flex flex-row items-center justify-between max-[991px]:flex-col px-[12px]">
                        <div class="footer-copy max-[991px]:mb-[15px]">
                            <div class="footer-bottom-copy max-[991px]:text-center">
                                <div
                                    class="bb-copy text-[#686e7d] text-[13px] tracking-[1px] text-center font-normal leading-[2]">
                                    Copyright © <span
                                        class="text-[#686e7d] text-[13px] tracking-[1px] text-center font-normal"
                                        id="copyright_year">
                                        {{ date('Y') }}
                                    </span>
                                    <a class="site-name transition-all duration-[0.3s] ease-in-out font-medium text-[#6c7fd8] hover:text-[#3d4750] font-Poppins text-[15px] leading-[28px] tracking-[0.03rem]"
                                       href="{{ route('home') }}">{{ env('APP_NAME') }}</a> all rights reserved.
                                </div>
                            </div>
                        </div>
                        <div class="footer-bottom-right">
                            <div class="footer-bottom-payment flex justify-center">
                                <div class="payment-link">
                                    <img src="{{ asset('assets/img/payment/payment.png') }}" alt="payment"
                                         class="max-[360px]:w-full">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>

<!-- Cart sidebar -->
<div class="bb-side-cart-overlay hidden w-full h-screen fixed top-[0] left-[0] bg-[#00000080] z-[17]"></div>
<div
    class="bb-side-cart w-[470px] h-[calc(100%-30px)] my-[15px] ml-[15px] pt-[15px] px-[8px] text-[14px] font-normal fixed z-[17] top-[0] right-[0] left-[auto] block transition-all duration-[0.5s] ease delay-[0s] translate-x-[100%] bg-[#fff] overflow-auto opacity-[0] rounded-tl-[20px] rounded-bl-[20px] max-[991px]:w-[740px] max-[767px]:w-[350px] max-[575px]:w-[300px]">
    <div class="flex flex-wrap h-full">
        <div class="w-full px-[12px]">
            <div class="bb-inner-cart relative z-[9] flex flex-col h-full justify-between">
                <div class="bb-top-contact">
                    <div class="bb-cart-title w-full mb-[20px] flex flex-wrap justify-between">
                        <h4 class="font-quicksand text-[18px] font-extrabold text-[#3d4750] tracking-[0.03rem] leading-[1.2]">
                            My cart</h4>
                        <a href="javascript:void(0)"
                           class="bb-cart-close transition-all duration-[0.3s] ease-in-out w-[16px] h-[20px] absolute top-[-20px] right-[0] bg-[#e04e4eb3] rounded-[10px] cursor-pointer"
                           title="Close Cart"></a>
                    </div>
                </div>
                <div class="bb-cart-box item h-full flex flex-col max-[767px]:justify-start">
                    <ul class="bb-cart-items mb-[-24px]">
                        <li class="cart-sidebar-list mb-[24px] p-[20px] flex bg-[#f8f8fb] rounded-[20px] border-[1px] border-solid border-[#eee] relative max-[575px]:p-[10px]">
                            <a href="javascript:void(0)"
                               class="cart-remove-item transition-all duration-[0.3s] ease-in-out bg-[#3d4750] w-[20px] h-[20px] text-[#fff] absolute top-[-3px] right-[-3px] rounded-[50%] flex items-center justify-center opacity-[0.5] text-[15px]"><i
                                    class="ri-close-line"></i></a>
                            <a href="javascript:void(0)"
                               class="bb-cart-pro-img flex grow-[1] shrink-[0] basis-[25%] items-center max-[575px]:flex-[initial]">
                                <img src="{{ asset('assets/img/new-product/1.jpg') }}" alt="product-img-1"
                                     class="w-[85px] rounded-[10px] border-[1px] border-solid border-[#eee] max-[575px]:w-[50px]">
                            </a>
                            <div
                                class="bb-cart-contact pl-[15px] relative grow-[1] shrink-[0] basis-[70%] overflow-hidden">
                                <a href="#"
                                   class="bb-cart-sub-title w-full mb-[8px] font-Poppins tracking-[0.03rem] text-[#3d4750] whitespace-nowrap overflow-hidden text-ellipsis block text-[14px] leading-[18px] font-medium">Ground
                                    Nuts Oil Pack</a>
                                <span
                                    class="cart-price mb-[8px] text-[14px] leading-[18px] block font-Poppins text-[#686e7d] font-light tracking-[0.03rem]">
                                        <span
                                            class="new-price px-[3px] text-[15px] leading-[18px] text-[#686e7d] font-bold">$15</span>
                                        x 500 g
                                    </span>
                                <div
                                    class="qty-plus-minus h-[28px] w-[85px] py-[7px] border-[1px] border-solid border-[#eee] overflow-hidden relative flex items-center justify-between bg-[#fff] rounded-[10px]">
                                    <input class="qty-input text-center" type="text" name="bb-qtybtn" value="1">
                                </div>
                            </div>
                        </li>
                        <li class="cart-sidebar-list mb-[24px] p-[20px] flex bg-[#f8f8fb] rounded-[20px] border-[1px] border-solid border-[#eee] relative max-[575px]:p-[10px]">
                            <a href="javascript:void(0)"
                               class="cart-remove-item transition-all duration-[0.3s] ease-in-out bg-[#3d4750] w-[20px] h-[20px] text-[#fff] absolute top-[-3px] right-[-3px] rounded-[50%] flex items-center justify-center opacity-[0.5] text-[15px]"><i
                                    class="ri-close-line"></i></a>
                            <a href="javascript:void(0)"
                               class="bb-cart-pro-img flex grow-[1] shrink-[0] basis-[25%] items-center max-[575px]:flex-[initial]">
                                <img src="{{ asset('assets/img/new-product/2.jpg') }}" alt="product-img-2"
                                     class="w-[85px] rounded-[10px] border-[1px] border-solid border-[#eee] max-[575px]:w-[50px]">
                            </a>
                            <div
                                class="bb-cart-contact pl-[15px] relative grow-[1] shrink-[0] basis-[70%] overflow-hidden">
                                <a href="#"
                                   class="bb-cart-sub-title w-full mb-[8px] font-Poppins tracking-[0.03rem] text-[#3d4750] whitespace-nowrap overflow-hidden text-ellipsis block text-[14px] leading-[18px] font-medium">Organic
                                    Litchi Juice Pack</a>
                                <span
                                    class="cart-price mb-[8px] text-[14px] leading-[18px] block font-Poppins text-[#686e7d] font-light tracking-[0.03rem]">
                                        <span
                                            class="new-price px-[3px] text-[15px] leading-[18px] text-[#686e7d] font-bold">$25</span>
                                        x 500 ml
                                    </span>
                                <div
                                    class="qty-plus-minus h-[28px] w-[85px] py-[7px] border-[1px] border-solid border-[#eee] overflow-hidden relative flex items-center justify-between bg-[#fff] rounded-[10px]">
                                    <input class="qty-input text-center" type="text" name="bb-qtybtn" value="1">
                                </div>
                            </div>
                        </li>
                        <li class="cart-sidebar-list mb-[24px] p-[20px] flex bg-[#f8f8fb] rounded-[20px] border-[1px] border-solid border-[#eee] relative max-[575px]:p-[10px]">
                            <a href="javascript:void(0)"
                               class="cart-remove-item transition-all duration-[0.3s] ease-in-out bg-[#3d4750] w-[20px] h-[20px] text-[#fff] absolute top-[-3px] right-[-3px] rounded-[50%] flex items-center justify-center opacity-[0.5] text-[15px]"><i
                                    class="ri-close-line"></i></a>
                            <a href="javascript:void(0)"
                               class="bb-cart-pro-img flex grow-[1] shrink-[0] basis-[25%] items-center max-[575px]:flex-[initial]">
                                <img src="{{ asset('assets/img/new-product/3.jpg') }}" alt="product-img-3"
                                     class="w-[85px] rounded-[10px] border-[1px] border-solid border-[#eee] max-[575px]:w-[50px]">
                            </a>
                            <div
                                class="bb-cart-contact pl-[15px] relative grow-[1] shrink-[0] basis-[70%] overflow-hidden">
                                <a href="#"
                                   class="bb-cart-sub-title w-full mb-[8px] font-Poppins tracking-[0.03rem] text-[#3d4750] whitespace-nowrap overflow-hidden text-ellipsis block text-[14px] leading-[18px] font-medium">Crunchy
                                    Banana Chips</a>
                                <span
                                    class="cart-price mb-[8px] text-[14px] leading-[18px] block font-Poppins text-[#686e7d] font-light tracking-[0.03rem]">
                                        <span
                                            class="new-price px-[3px] text-[15px] leading-[18px] text-[#686e7d] font-bold">$1</span>
                                        x 500 g
                                    </span>
                                <div
                                    class="qty-plus-minus h-[28px] w-[85px] py-[7px] border-[1px] border-solid border-[#eee] overflow-hidden relative flex items-center justify-between bg-[#fff] rounded-[10px]">
                                    <input class="qty-input text-center" type="text" name="bb-qtybtn" value="1">
                                </div>
                            </div>
                        </li>
                        <li class="cart-sidebar-list mb-[24px] p-[20px] flex bg-[#f8f8fb] rounded-[20px] border-[1px] border-solid border-[#eee] relative max-[575px]:p-[10px]">
                            <a href="javascript:void(0)"
                               class="cart-remove-item transition-all duration-[0.3s] ease-in-out bg-[#3d4750] w-[20px] h-[20px] text-[#fff] absolute top-[-3px] right-[-3px] rounded-[50%] flex items-center justify-center opacity-[0.5] text-[15px]"><i
                                    class="ri-close-line"></i></a>
                            <a href="javascript:void(0)"
                               class="bb-cart-pro-img flex grow-[1] shrink-[0] basis-[25%] items-center max-[575px]:flex-[initial]">
                                <img src="{{ asset('assets/img/new-product/6.jpg') }}" alt="product-img-3"
                                     class="w-[85px] rounded-[10px] border-[1px] border-solid border-[#eee] max-[575px]:w-[50px]">
                            </a>
                            <div
                                class="bb-cart-contact pl-[15px] relative grow-[1] shrink-[0] basis-[70%] overflow-hidden">
                                <a href="#"
                                   class="bb-cart-sub-title w-full mb-[8px] font-Poppins tracking-[0.03rem] text-[#3d4750] whitespace-nowrap overflow-hidden text-ellipsis block text-[14px] leading-[18px] font-medium">Small
                                    Cardamom Spice Pack</a>
                                <span
                                    class="cart-price mb-[8px] text-[14px] leading-[18px] block font-Poppins text-[#686e7d] font-light tracking-[0.03rem]">
                                        <span
                                            class="new-price px-[3px] text-[15px] leading-[18px] text-[#686e7d] font-bold">$4</span>
                                        x 500 g
                                    </span>
                                <div
                                    class="qty-plus-minus h-[28px] w-[85px] py-[7px] border-[1px] border-solid border-[#eee] overflow-hidden relative flex items-center justify-between bg-[#fff] rounded-[10px]">
                                    <input class="qty-input text-center" type="text" name="bb-qtybtn" value="1">
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="bb-bottom-cart">
                    <div
                        class="cart-sub-total mt-[20px] pb-[8px] flex flex-wrap justify-between border-t-[1px] border-solid border-[#eee]">
                        <table class="table cart-table mt-[10px] w-full align-top">
                            <tbody>
                            <tr>
                                <td class="title font-medium text-[#777] p-[.5rem]">Sub-Total :</td>
                                <td class="price text-[#777] text-right p-[.5rem]">$300.00</td>
                            </tr>
                            <tr>
                                <td class="title font-medium text-[#777] p-[.5rem]">VAT (20%) :</td>
                                <td class="price text-[#777] text-right p-[.5rem]">$60.00</td>
                            </tr>
                            <tr>
                                <td class="title font-medium text-[#777] p-[.5rem]">Total :</td>
                                <td class="price text-[#777] text-right p-[.5rem]">$360.00</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="cart-btn flex justify-between mb-[20px]">
                        <a href="#"
                           class="bb-btn-1 transition-all duration-[0.3s] ease-in-out font-Poppins leading-[28px] tracking-[0.03rem] py-[5px] px-[15px] text-[14px] font-normal text-[#3d4750] bg-transparent rounded-[10px] border-[1px] border-solid border-[#3d4750] hover:bg-[#6c7fd8] hover:border-[#6c7fd8] hover:text-[#fff]">View
                            Cart</a>
                        <a href="#"
                           class="bb-btn-2 transition-all duration-[0.3s] ease-in-out font-Poppins leading-[28px] tracking-[0.03rem] py-[5px] px-[15px] text-[14px] font-normal text-[#fff] bg-[#6c7fd8] rounded-[10px] border-[1px] border-solid border-[#6c7fd8] hover:bg-transparent hover:border-[#3d4750] hover:text-[#3d4750]">Checkout</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Quick view Modal -->
<div class="bb-modal-overlay w-full h-screen hidden fixed top-0 left-0 z-[26] bg-[#000000b3]"></div>
<div
    class="bb-modal quickview-modal max-[575px]:w-full fixed top-[45%] max-[767px]:top-[50%] left-[50%] z-[30] max-[767px]:w-full hidden max-[767px]:max-h-full max-[767px]:overflow-y-auto">
    <div
        class="bb-modal-dialog h-full my-[0%] mx-auto max-w-[700px] w-[700px] max-[991px]:max-w-[650px] max-[991px]:w-[650px] max-[767px]:w-[80%] max-[767px]:h-auto max-[767px]:max-w-[80%] max-[767px]:m-[0] max-[767px]:py-[35px] max-[767px]:mx-auto max-[575px]:w-[90%] transition-transform duration-[0.3s] ease-out cr-fadeOutUp">
        <div class="modal-content p-[24px] relative bg-[#fff] rounded-[20px] overflow-hidden">
            <button type="button"
                    class="bb-close-modal transition-all duration-[0.3s] ease-in-out w-[16px] h-[20px] absolute top-[-5px] right-[27px] bg-[#e04e4eb3] rounded-[10px] cursor-pointer hover:bg-[#e04e4e]"
                    title="Close"></button>
            <div class="modal-body mx-[-12px] max-[767px]:mx-[0]">
                <div class="flex flex-wrap mx-[-12px] mb-[-24px]">
                    <div class="min-[768px]:w-[41.66%] min-[576px]:w-full px-[12px] mb-[24px]">
                        <div
                            class="single-pro-img single-pro-img-no-sidebar h-full border-[1px] border-solid border-[#eee] overflow-hidden rounded-[20px]">
                            <div class="single-product-scroll h-full">
                                <div class="single-slide zoom-image-hover h-full bg-[#fff] flex items-center">
                                    <img class="img-responsive max-w-full block" src="{{ asset('assets/img/product/1.jpg')}}" alt="product-img-1">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="min-[768px]:w-[58.33%] min-[576px]:w-full px-[12px] mb-[24px]">
                        <div class="quickview-pro-content">
                            <h5 class="bb-quick-title">
                                <a href="#" class="font-Poppins tracking-[0.03rem] mb-[10px] block text-[#3d4750] text-[20px] leading-[30px] font-medium">
                                </a>
                            </h5>
                            <div class="bb-pro-rating flex mb-[10px]">
                                <i class="ri-star-fill float-left text-[15px] mr-[3px] leading-[18px] text-[#fea99a]"></i>
                                <i class="ri-star-fill float-left text-[15px] mr-[3px] leading-[18px] text-[#fea99a]"></i>
                                <i class="ri-star-fill float-left text-[15px] mr-[3px] leading-[18px] text-[#fea99a]"></i>
                                <i class="ri-star-fill float-left text-[15px] mr-[3px] leading-[18px] text-[#fea99a]"></i>
                                <i class="ri-star-line float-left text-[15px] mr-[3px] leading-[18px] text-[#777]"></i>
                            </div>
                            <div class="bb-quickview-desc mb-[10px] text-[15px] leading-[24px] text-[#777] font-light line-clamp-3">
                            </div>
                            <div class="bb-quickview-price pt-[5px] pb-[10px] flex items-center justify-left">
                                <span class="new-price px-[3px] text-[16px] text-[#686e7d] font-bold"></span>
                                <span class="old-price px-[3px] text-[14px] text-[#686e7d] line-through"></span>
                            </div>
                            <div class="bb-pro-variation mt-[15px] mb-[25px]">
                                <h5 class="font-Poppins text-[16px] text-[#3d4750] mb-[10px] leading-[24px] font-medium">Select Size</h5>

                                <ul class="flex flex-wrap m-[-2px]">
                                    <li class="h-[22px] m-[2px] py-[2px] px-[8px] cursor-pointer border-[1px] border-solid border-[#eee] text-[#777] flex items-center justify-center text-[12px] leading-[22px] rounded-[20px] font-normal active">
                                        <a href="javascript:void(0)"
                                           class="bb-opt-sz font-Poppins text-[12px] leading-[22px] font-normal text-[#777] tracking-[0.03rem]"
                                           data-tooltip="Small">250g</a>
                                    </li>
                                    <li class="h-[22px] m-[2px] py-[2px] px-[8px] cursor-pointer border-[1px] border-solid border-[#eee] text-[#777] flex items-center justify-center text-[12px] leading-[22px] rounded-[20px] font-normal">
                                        <a href="javascript:void(0)"
                                           class="bb-opt-sz font-Poppins text-[12px] leading-[22px] font-normal text-[#777] tracking-[0.03rem]"
                                           data-tooltip="Medium">500g</a>
                                    </li>
                                    <li class="h-[22px] m-[2px] py-[2px] px-[8px] cursor-pointer border-[1px] border-solid border-[#eee] text-[#777] flex items-center justify-center text-[12px] leading-[22px] rounded-[20px] font-normal">
                                        <a href="javascript:void(0)"
                                           class="bb-opt-sz font-Poppins text-[12px] leading-[22px] font-normal text-[#777] tracking-[0.03rem]"
                                           data-tooltip="Large">1kg</a>
                                    </li>
                                    <li class="h-[22px] m-[2px] py-[2px] px-[8px] cursor-pointer border-[1px] border-solid border-[#eee] text-[#777] flex items-center justify-center text-[12px] leading-[22px] rounded-[20px] font-normal">
                                        <a href="javascript:void(0)"
                                           class="bb-opt-sz font-Poppins text-[12px] leading-[22px] font-normal text-[#777] tracking-[0.03rem]"
                                           data-tooltip="Extra Large">2kg</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="bb-quickview-qty flex max-[360px]:justify-center">
                                <div
                                    class="qty-plus-minus w-[85px] h-[40px] py-[7px] border-[1px] border-solid border-[#eee] overflow-hidden relative flex items-center justify-between bg-[#fff] rounded-[10px] max-[360px]:m-[auto]">
                                    <input
                                        class="qty-input text-[#777] float-left text-[14px] h-auto m-[0] p-[0] text-center w-[32px] outline-[0] font-normal leading-[35px] rounded-[10px]"
                                        type="text" name="bb-qtybtn" value="1">
                                </div>
                                <div
                                    class="bb-quickview-cart ml-[4px] max-[360px]:mt-[15px] max-[360px]:ml-[0] max-[360px]:flex max-[360px]:justify-center">
                                    <button type="button"
                                            class="bb-btn-1 transition-all duration-[0.3s] ease-in-out font-Poppins h-[40px] leading-[28px] tracking-[0.03rem] py-[3px] px-[20px] text-[14px] font-normal text-[#3d4750] bg-transparent rounded-[10px] border-[1px] border-solid border-[#3d4750] hover:bg-[#6c7fd8] hover:border-[#6c7fd8] hover:text-[#fff]">
                                        <i class="ri-shopping-bag-line pr-[8px]"></i>Add To Cart
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Newsletter Modal -->
@if(SettingsHelper::get('show_newsletter', false))
    <div class="bb-popnews-bg fixed left-[0] top-[0] w-full h-full bg-[#00000080] hidden z-[25] hidden"></div>
    <div
        class="bb-popnews-box w-full max-w-[600px] p-[24px] fixed left-[50%] top-[50%] bg-[#fff] hidden z-[25] text-center rounded-[15px] overflow-hidden max-[767px]:w-[90%]">
        <div
            class="bb-popnews-close transition-all duration-[0.3s] ease-in-out w-[16px] h-[20px] absolute top-[-5px] right-[27px] bg-[#e04e4eb3] rounded-[10px] cursor-pointer hover:bg-[#e04e4e]"
            title="Close"></div>
        <div class="flex flex-wrap mx-[-12px]">
            <div class="min-[768px]:w-[50%] w-full px-[12px]">
                <img src="{{ asset('assets/img/newsletter/newsletter.jpg') }}" alt="newsletter"
                     class="w-full rounded-[15px] max-[767px]:hidden">
            </div>
            <div class="min-[768px]:w-[50%] w-full px-[12px]">
                <div class="bb-popnews-box-content h-full flex flex-col items-center justify-center">
                    <h2 class="font-quicksand text-[#3d4750] block text-[22px] leading-[33px] font-semibold mt-[0] mx-[auto] mb-[10px] tracking-[0] capitalize">
                        Newsletter.</h2>
                    <p class="font-Poppins font-light tracking-[0.03rem] mb-[8px] text-[14px] leading-[22px] text-[#686e7d]">
                        Subscribe the {{ env('APP_NAME') }} to get in touch and get the future update.</p>
                    <form class="bb-popnews-form mt-[0]" action="#" method="post">
                        <input type="email" name="newsemail" placeholder="Email Address"
                               class="mb-[20px] bg-transparent border-[1px] border-solid border-[#eee] text-[#3d4750] text-[14px] py-[10px] px-[15px] w-full outline-[0] rounded-[10px] font-normal"
                               required>
                        <button type="button"
                                class="bb-btn-2 transition-all duration-[0.3s] ease-in-out font-Poppins leading-[28px] tracking-[0.03rem] py-[4px] px-[15px] text-[14px] font-normal text-[#fff] bg-[#6c7fd8] rounded-[10px] border-[1px] border-solid border-[#6c7fd8] hover:bg-transparent hover:border-[#3d4750] hover:text-[#3d4750]"
                                name="subscribe">Subscribe
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endif

@if(SettingsHelper::get('show_tools_bar', false))
<!-- Tools Sidebar -->
<div class="bb-tools-sidebar-overlay w-full h-screen fixed top-[0] left-[0] bg-[#00000080] z-[16] hidden"></div>
<div
    class="bb-tools-sidebar w-[300px] h-screen fixed right-[0] top-[0] bg-[#fff] transition-all duration-[0.3s] ease z-[16] translate-x-[300px]">
    <a href="javascript:void(0)"
       class="bb-tools-sidebar-toggle in-out absolute top-[45%] right-[302px] w-[40px] h-[40px] bg-[#3d4750] transition-all duration-[0.3s] ease-in flex items-center justify-center text-[25px] z-[-1] rounded-[5px]">
        <i class="ri-settings-fill text-[20px] text-[#fff]"></i>
    </a>
    <div
        class="bb-bar-title mb-[15px] p-[15px] flex flex-row justify-between items-center border-b-[1px] border-solid border-[#eee] ">
        <h6 class="m-[0] font-quicksand text-[17px] font-bold tracking-[0.03rem] leading-[1.2] text-[#3d4750]">
            Tools</h6>
        <a href="#"
           class="close-tools text-[#ff0000] text-[17px] font-semibold leading-[28px] tracking-[0.03rem]"><i
                class="ri-close-line"></i></a>
    </div>
    <div class="bb-tools-detail h-[calc(100vh-72px)] px-[15px] pb-[15px] overflow-auto">
        <div class="bb-tools-block">
            <h3 class="font-quicksand tracking-[0.03rem] leading-[1.2] my-[15px] text-[14px] font-bold text-[#3d4750]">
                Select Color</h3>
            <ul class="bb-color">
                <li class="color-primary inline-block h-[35px] w-[35px] rounded-[5px] cursor-pointer align-middle m-[6px] relative bg-[#6c7fd8] active-variant"></li>
                <li class="color-1 inline-block h-[35px] w-[35px] rounded-[5px] cursor-pointer align-middle m-[6px] relative bg-[#8118d5]"></li>
                <li class="color-2 inline-block h-[35px] w-[35px] rounded-[5px] cursor-pointer align-middle m-[6px] relative bg-[#5f6af5]"></li>
                <li class="color-3 inline-block h-[35px] w-[35px] rounded-[5px] cursor-pointer align-middle m-[6px] relative bg-[#f5885f]"></li>
                <li class="color-4 inline-block h-[35px] w-[35px] rounded-[5px] cursor-pointer align-middle m-[6px] relative bg-[#32dbe2]"></li>
                <li class="color-5 inline-block h-[35px] w-[35px] rounded-[5px] cursor-pointer align-middle m-[6px] relative bg-[#3f51b5]"></li>
                <li class="color-6 inline-block h-[35px] w-[35px] rounded-[5px] cursor-pointer align-middle m-[6px] relative bg-[#f44336]"></li>
                <li class="color-7 inline-block h-[35px] w-[35px] rounded-[5px] cursor-pointer align-middle m-[6px] relative bg-[#e91e63]"></li>
                <li class="color-8 inline-block h-[35px] w-[35px] rounded-[5px] cursor-pointer align-middle m-[6px] relative bg-[#607d8b]"></li>
                <li class="color-9 inline-block h-[35px] w-[35px] rounded-[5px] cursor-pointer align-middle m-[6px] relative bg-[#5eb595]"></li>
            </ul>
        </div>
        <div class="bb-tools-block">
            <h3 class="font-quicksand tracking-[0.03rem] leading-[1.2] my-[15px] text-[14px] font-bold text-[#3d4750]">
                Dark Modes</h3>
            <div class="bb-tools-dark flex flex-wrap flex-row justify-between">
                <div
                    class="mode-primary bb-dark-item mode light relative w-[125px] mb-[10px] text-center active-dark"
                    data-bb-mode-tool="light">
                    <img src="{{ asset('assets/img/tools/light.png') }}" alt="light"
                         class="w-full p-[5px] rounded-[10px] border-[1px] border-solid border-[#eee] hover:border-[#6c7fd8]">
                    <p class="m-[0] font-Poppins text-[14px] font-semibold capitalize leading-[28px] tracking-[0.03rem] text-[#686e7d]">
                        Light</p>
                </div>
                <div class="bb-dark-item mode dark relative w-[125px] mb-[10px] text-center"
                     data-bb-mode-tool="dark">
                    <img src="{{ asset('assets/img/tools/dark.png') }}" alt="dark"
                         class="w-full p-[5px] rounded-[10px] border-[1px] border-solid border-[#eee] hover:border-[#6c7fd8]">
                    <p class="m-[0] font-Poppins text-[14px] font-semibold capitalize leading-[28px] tracking-[0.03rem] text-[#686e7d]">
                        Dark</p>
                </div>
            </div>
        </div>
        <div class="bb-tools-block">
            <h3 class="font-quicksand tracking-[0.03rem] leading-[1.2] my-[15px] text-[14px] font-bold text-[#3d4750]">
                RTL Modes</h3>
            <div class="bb-tools-rtl flex flex-wrap flex-row justify-between">
                <div class="bb-tools-item ltr relative w-[125px] mb-[10px] text-center active-rtl"
                     data-bb-mode-tool="ltr">
                    <img src="{{ asset('assets/img/tools/ltr.png') }}" alt="ltr"
                         class="w-full p-[5px] rounded-[10px] border-[1px] border-solid border-[#eee] hover:border-[#6c7fd8]">
                    <p class="m-[0] font-Poppins text-[14px] font-semibold capitalize leading-[28px] tracking-[0.03rem] text-[#686e7d]">
                        LTR</p>
                </div>
                <div class="bb-tools-item rtl relative w-[125px] mb-[10px] text-center" data-bb-mode-tool="rtl">
                    <img src="{{ asset('assets/img/tools/rtl.png') }}" alt="rtl"
                         class="w-full p-[5px] rounded-[10px] border-[1px] border-solid border-[#eee] hover:border-[#6c7fd8]">
                    <p class="m-[0] font-Poppins text-[14px] font-semibold capitalize leading-[28px] tracking-[0.03rem] text-[#686e7d]">
                        RTL</p>
                </div>
            </div>
        </div>
        <div class="bb-tools-block">
            <h3 class="font-quicksand tracking-[0.03rem] leading-[1.2] my-[15px] text-[14px] font-bold text-[#3d4750]">
                Box Design</h3>
            <div class="bb-tools-box flex flex-wrap flex-row justify-between">
                <div class="bb-tools-item default relative w-[125px] mb-[10px] text-center active-box"
                     data-bb-mode-tool="default">
                    <img src="{{ asset('assets/img/tools/box-0.png') }}" alt="box-0"
                         class="w-full p-[5px] rounded-[10px] border-[1px] border-solid border-[#eee] hover:border-[#6c7fd8]">
                    <p class="m-[0] font-Poppins text-[14px] font-semibold capitalize leading-[28px] tracking-[0.03rem] text-[#686e7d]">
                        Default</p>
                </div>
                <div class="bb-tools-item box-1 relative w-[125px] mb-[10px] text-center" data-bb-mode-tool="box-1">
                    <img src="{{ asset('assets/img/tools/box-1.png') }}" alt="box-1"
                         class="w-full p-[5px] rounded-[10px] border-[1px] border-solid border-[#eee] hover:border-[#6c7fd8]">
                    <p class="m-[0] font-Poppins text-[14px] font-semibold capitalize leading-[28px] tracking-[0.03rem] text-[#686e7d]">
                        Box-1</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endif

<!-- Back to top  -->
<a href="#Top"
   class="back-to-top result-placeholder transition-all duration-[0.3s] ease-in-out w-[38px] h-[38px] hidden fixed right-[15px] bottom-[15px] z-[10] rounded-[20px] cursor-pointer bg-[#fff] text-[#6c7fd8] border-[1px] border-solid border-[#6c7fd8] text-center text-[22px] leading-[1.6]">
    <i class="ri-arrow-up-line text-[20px]"></i>
    <div class="back-to-top-wrap active-progress">
        <svg viewBox="-1 -1 102 102" class="w-[36px] h-[36px] fixed right-[16px] bottom-[16px]">
            <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98"
                  class="fill-transparent stroke-[5px] stroke-[#6c7fd8]"></path>
        </svg>
    </div>
</a>

@push('scripts')
<script>

    /*----------- modal ----------------*/
    $(".bb-modal-toggle").on("click", function () {
         // Get the product data from the data attribute
        const productData = $(this).closest('.bb-pro-box').find('.bb-price').data('product');

        // change the product image
        $(".single-pro-img img").attr('src', `/storage/${productData.featured_image}`);

        // change the product name .bb-quick-title a
        $(".bb-quick-title a").text(productData.name);

        let plainTextShortDescription = $(productData.full_description).text();

        // change .bb-quickview-desc if productData.full_description is available else use productData.description
        $(".bb-quickview-desc").text(plainTextShortDescription);


        // change .bb-quickview-price .new-price if productData.discount_price is available else use productData.price
        if (productData.discount_price) {
            $(".bb-quickview-price .new-price").text(`$${productData.discount_price}`);
            $(".bb-quickview-price .old-price").text(`$${productData.price}`);
        } else {
            $(".bb-quickview-price .new-price").text(`$${productData.price}`);
            $(".bb-quickview-price .old-price").text('');
        }

        let variants = productData.variants;
        /*
        [
            {
                "id": 23,
                "product_id": 18,
                "size": "8 oz",
                "color": null,
                "price": "220.00",
                "sku": "Ameer Al Oud Attar",
                "stock": 0
            },
            {
                "id": 24,
                "product_id": 18,
                "size": "16 oz",
                "color": null,
                "price": "400.00",
                "sku": "",
                "stock": 0
            },
            {
                "id": 25,
                "product_id": 18,
                "size": "4 oz",
                "color": null,
                "price": "120.00",
                "sku": "",
                "stock": 0
            },
            {
                "id": 26,
                "product_id": 18,
                "size": "3 ml",
                "color": null,
                "price": "8.00",
                "sku": "",
                "stock": 0
            },
            {
                "id": 27,
                "product_id": 18,
                "size": "6 ml",
                "color": null,
                "price": "10.00",
                "sku": "",
                "stock": 0
            },
            {
                "id": 28,
                "product_id": 18,
                "size": "12 ml",
                "color": null,
                "price": "15.00",
                "sku": "",
                "stock": 0
            },
            {
                "id": 29,
                "product_id": 18,
                "size": "20 ml",
                "color": null,
                "price": "40.00",
                "sku": "",
                "stock": 0
            },
            {
                "id": 30,
                "product_id": 18,
                "size": "35 ml",
                "color": null,
                "price": "75.00",
                "sku": "",
                "stock": 0
            },
            {
                "id": 31,
                "product_id": 18,
                "size": "55 ml",
                "color": null,
                "price": "100.00",
                "sku": "",
                "stock": 0
            }
        ]*/

        // Handling product variants (size, color) first show the size then color, Like
        // Size: 16oz, 12oz, 8oz, 4oz, 3oz, 2oz, 1oz
        // Color: Red, Blue, Green, Yellow

        // first remove all the existing size and color
        // $(".bb-pro-variation ul").empty();

        // get all the unique sizes from the variants dont need null or empty value
        let uniqueSizes = variants.filter((variant) => variant.size).map((variant) => variant.size);
        
        // get all the unique colors from the variants dont need null or empty value
        let uniqueColors = variants.filter((variant) => variant.color).map((variant) => variant.color);

        // add the size to the .bb-pro-variation ul with a title of Select Size and toolip of price. after title must be a break
        // if (uniqueSizes.length > 0) {
        //     $(".bb-pro-variation ul").append(`<li class="font-Poppins text-[14px] leading-[22px] text-[#777] font-light">Select Size</li>`);
        //     uniqueSizes.forEach((size) => {
        //         $(".bb-pro-variation ul").append(`<li class="h-[22px] m-[2px] py-[2px] px-[8px] cursor-pointer border-[1px] border-solid border-[#eee] text-[#777] flex items-center justify-center text-[12px] leading-[22px] rounded-[20px] font-normal">
        //             <a href="javascript:void(0)" class="bb-opt-sz font-Poppins text-[12px] leading-[22px] font-normal text-[#777] tracking-[0.03rem]" data-tooltip="${size}">${size}</a>
        //         </li>`);
        //     });
        // }


        $(".bb-modal-overlay").fadeIn();
        $(".bb-modal").fadeIn();
        $("body").addClass("bb-overflow-hidden")
        $(".bb-modal-dialog").addClass("bb-fadeOutUp");
        $(".bb-modal-dialog").removeClass("bb-fadeInDown");
    });

    $(".bb-close-modal, .bb-modal-overlay").on("click", function () {
        $(".bb-modal-overlay").fadeOut();
        $(".bb-modal").fadeOut();
        $("body").removeClass("bb-overflow-hidden")
        $(".bb-modal-dialog").removeClass("bb-fadeOutUp");
        $(".bb-modal-dialog").addClass("bb-fadeInDown");
    });
</script>

@endpush
