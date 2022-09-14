@extends('admin.master')
@section('main_content')
<!--Slider Start-->
    <section class="container-fluid">
        <div class="row">
            <div class="col-12 pl-0 pr-0">
                <div class="owl-carousel">
                    @if (isset($sliders))
                        @foreach ($sliders as $slider )
                    <div class="item">
                       <img src="{{ asset('/').$slider->slide_image}}" >
                        <div class="slide-caption" >
                            <h5>{{ $slider->slide_title }}</h5>
                            <p>{{ $slider->slide_description }}</p>
                        </div>
                    </div>
                        @endforeach

                    @else
                    <div class="item">
                        <img src="{{ asset('admin/assets/images/img-1.jpg') }}" alt="">
                        <div class="slide-caption" >
                            <h5>Slider Title</h5>
                            <p>Slider Description</p>
                        </div>
                    </div>
                    <div class="item"><img src="{{ asset('admin/assets/images/img-2.jpg') }}" alt=""></div>
                    <div class="item"><img src="{{ asset('admin/assets/images/img-3.jpg') }}" alt=""></div>
                    <div class="item"><img src="{{ asset('admin/assets/images/img-4.jpg') }}" alt=""></div>
                    <div class="item"><img src="{{ asset('admin/assets/images/img-5.jpg') }}" alt=""></div>

                    @endif

                </div>
            </div>
        </div>
    </section>
<!--Slider End-->

@endSection
