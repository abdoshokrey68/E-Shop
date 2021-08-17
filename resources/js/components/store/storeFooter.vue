<template>
    <div>
        <div class="footer-top"  style='background-image: url("img/front/footer-bg.png")'>
            <div class="container">
            <div class="row gy-4">
                <div class="col-lg-5 col-md-12 footer-info">
                <a href="index.html" class="logo d-flex align-items-center">
                    <img src="{{asset('img/front/logo.png')}}" alt="">
                    <span> S H O K R E Y </span>
                </a>
                <p> {{$store->des}} </p>
                <div class="social-links mt-3">
                    <a href="#" class="twitter"><i class="fas fa-twitter"></i></a>
                    <a href="#" class="facebook"><i class="fas fa-facebook"></i></a>
                    <a href="#" class="instagram"><i class="fas fa-instagram bx bxl-instagram"></i></a>
                    <a href="#" class="linkedin"><i class="fas fa-linkedin bx bxl-linkedin"></i></a>
                </div>
                </div>

                <div class="col-lg-2 col-6 footer-links">
                <h4>Useful Links</h4>
                <ul>
                    <li><i class="fas fa-chevron-right"></i> <a href="{{route('store.index', $store->id)}}">Home</a></li>
                    {{-- <li><i class="fas fa-chevron-right"></i> <a href="#">About us</a></li>
                    <li><i class="fas fa-chevron-right"></i> <a href="#">Services</a></li>
                    <li><i class="fas fa-chevron-right"></i> <a href="#">Terms of service</a></li>
                    <li><i class="fas fa-chevron-right"></i> <a href="#">Privacy policy</a></li> --}}
                </ul>
                </div>

                <div class="col-lg-2 col-6 footer-links">
                <h4>Our Services</h4>
                <ul>
                    <li><i class="fas fa-chevron-right"></i> <a href="#">Web Design</a></li>
                    <li><i class="fas fa-chevron-right"></i> <a href="#">Web Development</a></li>
                    <li><i class="fas fa-chevron-right"></i> <a href="#">Product Management</a></li>
                    <li><i class="fas fa-chevron-right"></i> <a href="#">Marketing</a></li>
                    <li><i class="fas fa-chevron-right"></i> <a href="#">Graphic Design</a></li>
                </ul>
                </div>

                <div class="col-lg-3 col-md-12 footer-contact text-center text-md-start">
                <h4>Contact Us</h4>
                <p>
                    A108 Adam Street <br>
                    New York, NY 535022<br>
                    United States <br><br>
                    <strong>Phone:</strong> +1 5589 55488 55<br>
                    <strong>Email:</strong> info@example.com<br>
                </p>

                </div>

            </div>
            </div>
        </div>

        <div class="container">
            <div class="copyright">
            &copy; Copyright <strong><span> S H O K R E Y </span></strong>. All Rights Reserved
            </div>
            <div class="credits">
            <!-- All the links in the footer should remain intact. -->
            <!-- You can delete the links only if you purchased the pro version. -->
            <!-- Licensing information: https://bootstrapmade.com/license/ -->
            <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/flexstart-bootstrap-startup-template/ -->
            Designed by <a href="https://bootstrapmade.com/"> BootstrapMade </a>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: 'StoreFooter',
    props: ['store_id'],
    data() {
        return {
            storeinfo: {},
        }
    },
    mounted() {
        this.getinfo();
    },
    methods: {
        getinfo: function () {
            axios.get(`/api/storeinfo/${this.store_id}`)
            .then(res => {
                this.storeinfo = res.data;
            });
        }
    }
}
</script>
