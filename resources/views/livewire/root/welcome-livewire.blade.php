<div>
    {{-- Knowing others is intelligence; knowing yourself is true wisdom. --}}


    <div class="container">


        <div class="row d-flex justify-content-center pb-5">
            <div class="col-12 col-lg-8">
                <div class="text-center display-2 text-success"> HYDR<span class="ti ti-plant-2"></span>NET</div>

            </div>
        </div>


        <div class="row mt-5 pt-3">


            <div class="col-12 col-lg-6">

                <div class=" box">

                    <div class="d-flex justify-content-center pb-4 ">

                        <i class="ti ti-bulb display-2"></i>
                        <i class="ti ti-bulb display-2"></i>
                        <i class="ti ti-bulb display-2"></i>
                        <i class="ti ti-bulb display-2"></i>


                    </div>
                    <div class="d-flex justify-content-center">
                        <i class="ti brown-green ti-plant display-2"></i>
                        <i class="ti brown-green ti-plant display-2"></i>
                        <i class="ti brown-green ti-plant display-2"></i>

                    </div>


                </div>
            </div>
            <div class="col-12 col-lg-6">
                <div class="text-center">
                    <h1 class="text-success">Cultivating a Sustainable Future with Hydroponics</h1>
                    <p class="text-success ">Welcome to Hydronet, where we harness the power of hydroponics to cultivate
                        a sustainable future.
                        Through innovative technology and a passion for environmental stewardship, we're revolutionizing
                        the way we grow food and manage agricultural resources.</p>
                </div>
            </div>

        </div>
        <div class="row mt-5 pt-3">

            <div class="col-12 col-lg-6">
                <div class="text-center">
                    <h1 class="text-success">Water Efficiency</h1>
                    <p class="text-success ">Hydroponic systems use up to 90% less water than traditional soil-based
                        farming methods by recirculating and reusing water within closed-loop systems. This not only
                        conserves precious water resources but also mitigates the impact of drought and water scarcity
                        on agriculture.</p>
                </div>
            </div>
            <div class="col-12 col-lg-6">

                <div class=" box">
                    <div class="text-center">
                        <i class="ti ti-test-pipe display-2 text-success"></i>
                    </div>
                    <div class="text-center d-flex justify-content-center align-items-center">
                        <i class="ti ti-plant-2 display-2 text-success "></i>
                        <i class="ti ti-plant-2 display-2 text-success "></i>
                    </div>



                </div>
            </div>


        </div>

    </div>



    @push('scripts')
        <script src="{{ asset('minified/gsap.min.js') }}"></script>

        <script>
            gsap.fromTo(".box", {
                y: -200
            }, {
                y: 0
            });
            gsap.to('.ti-bulb', {
                rotation: 180,
            });
            var t1 = gsap.timeline({
                repeat: -1
            });
            t1.to('.ti-bulb', {
                // ease: "bounce.out",
                scale: 1.2,
                opacity: 1,
                // ypercent:50,
                duration: 2,
                color: "yellow"
            }).to('.ti-bulb', {
                // ease: "bounce.out",
                scale: 1,
                opacity: 1,
                duration: 2,
                color: '#000',
            }).to('.ti-bulb', {
                // ease: "bounce.out",
                opacity: 1,
                duration: 1,
            });

            // var t2 = gsap.timeline({repeat:-1});
            // t2.to('.ti-plant',{
            //     scale: 1.11,
            //     // scaleY: 2,
            //     duration: 2,
            // }).to('.ti-plant',{
            //     scale: 1,
            //     duration: 1,
            // }).to('.ti-plant',{
            //     opacity:1,
            //     duration: 1,
            // })
        </script>
    @endpush


</div>
