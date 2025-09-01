@if ($cross_pages_code = $website_plugins->where('slug', 'cross_pages_code')->first())
    @if (isset($cross_pages_code) &&
            data_get($cross_pages_code->settings, 'top_footer_enable', false) &&
            ($top_footer_content = data_get($cross_pages_code->settings, 'top_footer_code', null)))
        @if (is_countable(json_decode($top_footer_content, true)))
            @foreach (\MainHelper::arrayToObject(json_decode($top_footer_content, true)) as $component)
                @include('components.component-render', ['component' => $component])
            @endforeach
        @endif
    @endif
@endif

{{-- background:#fff;border-top:1px solid #f1f1f1; --}}

<footer class="container pb-12 text-center pt-12 shadow-lg z-40 bg-white">
    <div class="">
        <div class="row mt-n10 mt-lg-0">
            <div class="col-xl-10 mx-auto">
                <div class="row mb-3 d-flex">
                    <div class="col-md-6 mb-3">
                        <div class="widget">
                            <img src="{{ $settings['get_website_wide_logo'] }}" style="width:160px;max-width:100%"
                                class="mb-3">
                            <div style="text-align:justify;">{{ $settings['website_bio'] }}</div>
                        </div>
                        <!-- /.widget -->
                    </div>

                    <div class="col-md-3 mb-3">
                        <div class="widget">
                            <div class="widget-title display-6 mb-5">روابط</div>

                            @php
                                $footer_menu = cache()->remember('menu_FOOTER', 60, function () {
                                    return \App\Models\Menu::where('location', 'FOOTER')
                                        ->with([
                                            'links' => function ($q) {
                                                $q->orderBy('order', 'ASC');
                                            },
                                        ])
                                        ->first();
                                });
                            @endphp

                            @if ($footer_menu != null)
                                @foreach ($footer_menu->links as $link)
                                    <div><a href="{{ $link->url }}" class="link-body"><span
                                                class="{{ $link->icon }} font-1 d-none"
                                                style="color: #7b60fb;width: 15px"></span> {{ $link->title }}</a></div>
                                @endforeach
                            @endif


                        </div>
                        <!-- /.widget -->
                    </div>

                    <div class="col-md-3 mb-3">
                        <div class="widget">
                            <div class="widget-title display-6 mb-5">تابعنا</div>

                            <nav class="nav social">
                                @if ($settings['twitter_link'] != null)
                                    <a href="{{ $settings['twitter_link'] }}"><i class="fab fa-twitter"></i></a>
                                @endif
                                @if ($settings['facebook_link'] != null)
                                    <a href="{{ $settings['facebook_link'] }}"><i class="fab fa-facebook-f"></i></a>
                                @endif
                                @if ($settings['instagram_link'] != null)
                                    <a href="{{ $settings['instagram_link'] }}"><i class="fab fa-instagram"></i></a>
                                @endif
                                @if ($settings['youtube_link'] != null)
                                    <a href="{{ $settings['youtube_link'] }}"><i class="fab fa-youtube"></i></a>
                                @endif
                            </nav>


                        </div>
                        <!-- /.widget -->
                    </div>

                    <!--/column -->
                </div>
                <!--/.row -->
                {{-- <p class="text-center">جميع الحقوق محفوظة © موقع بيت التك {{date('Y')}} </p> --}}

                <!-- /.social -->
            </div>
            <!-- /column -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container -->
</footer>

<div class="col-12 copy-rights-footer">
    <div class="container ">
        <div class="col-12 row d-flex justify-content-between p-0">
            <div class="col-12 text-center mt-1 mb-2 pt-3 pb-2 ">
                <p style="font-size: 14px;line-height: 1.8;margin:0px" class="my-0  kufi text-center">
                    <span class="d-inline-block kufi">
                        جميع الحقوق محفوظة © {{ $settings['website_name'] }}
                        {{ date('Y') }}
                    </span>
                    {{-- <span class="d-inline-block kufi"> 
                        All rights reserved
                    </span> --}}
                </p>
            </div>
        </div>
    </div>
</div>


@if ($cross_pages_code = $website_plugins->where('slug', 'cross_pages_code')->first())
    @if (isset($cross_pages_code) &&
            data_get($cross_pages_code->settings, 'bottom_footer_enable', false) &&
            ($bottom_footer_content = data_get($cross_pages_code->settings, 'bottom_footer_code', null)))
        @if (is_countable(json_decode($bottom_footer_content, true)))
            @foreach (\MainHelper::arrayToObject(json_decode($bottom_footer_content, true)) as $component)
                @include('components.component-render', ['component' => $component])
            @endforeach
        @endif
    @endif
@endif
