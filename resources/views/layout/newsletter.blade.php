<!-- Newsletter Start -->
<div class="container-fluid newsletter bg-pink py-5 my-5" style="background-color:#ffb6c1;">
    <div class="container py-5">
        <div class="mx-auto text-center wow fadeIn" data-wow-delay="0.1s" style="max-width: 600px;">
            <h1 class="text-white mb-3">
                <span class="fw-light text-dark">Let's Subscribe</span> to Our Newsletter
            </h1>
            <p class="text-white mb-4">Subscribe now and get <strong>30% off</strong> on any of our products!</p>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-7 wow fadeIn" data-wow-delay="0.5s">
                <form id="newsletterForm">
                    <div class="position-relative w-100 mt-3 mb-2">
                        <input class="form-control w-100 py-3 ps-4 pe-5" type="email" name="email" placeholder="Enter Your Email"
                            style="height: 48px;" required>
                        <button type="submit" class="btn shadow-none position-absolute top-0 end-0 mt-1 me-2"
                            style="background-color:#ff69b4; border:none;">
                            <i class="fa fa-paper-plane text-white fs-4"></i>
                        </button>
                    </div>
                </form>
                <small class="text-white d-block mt-2" id="newsletterMessage"></small>
            </div>
        </div>
    </div>
</div>
<!-- Newsletter End -->

<script>
    // Newsletter Form AJAX submission
    $('#newsletterForm').on('submit', function(e) {
        e.preventDefault();
        var email = $(this).find('input[name="email"]').val();

        if(email) {
            // Simulate AJAX call
            $('#newsletterMessage').text('Thanks for subscribing!').css('color', 'white');
            $(this).trigger("reset");
        } else {
            $('#newsletterMessage').text('Please enter a valid email').css('color', 'yellow');
        }
    });
</script>
