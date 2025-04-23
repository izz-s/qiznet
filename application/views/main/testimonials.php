  <!-- Testimonials Section -->
  <section id="testimonials" class="testimonials section light-background">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
          <h2><?= $this->lang->line('testimonials'); ?></h2>
      </div><!-- End Section Title -->

      <div class="container" data-aos="fade-up" data-aos-delay="100">

          <div class="swiper init-swiper">
              <script type="application/json" class="swiper-config">
                  {
                      "loop": true,
                      "speed": 600,
                      "autoplay": {
                          "delay": 5000
                      },
                      "slidesPerView": "auto",
                      "pagination": {
                          "el": ".swiper-pagination",
                          "type": "bullets",
                          "clickable": true
                      },
                      "breakpoints": {
                          "320": {
                              "slidesPerView": 1,
                              "spaceBetween": 40
                          },
                          "1200": {
                              "slidesPerView": 3,
                              "spaceBetween": 1
                          }
                      }
                  }
              </script>
              <div class="swiper-wrapper">

                  <div class="swiper-slide">
                      <div class="testimonial-item">
                          <div class="stars">
                              <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
                          </div>
                          <p>
                              <?= $this->lang->line('testi1'); ?> </p>
                          <div class="profile mt-auto">
                              <img src="assets/img/testimonials/testimonials-1.jpg" class="testimonial-img" alt="">
                              <h3>Mamang Botak</h3>
                              <h4>Ceo &amp; Founder</h4>
                          </div>
                      </div>
                  </div><!-- End testimonial item -->

                  <div class="swiper-slide">
                      <div class="testimonial-item">
                          <div class="stars">
                              <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
                          </div>
                          <p>
                              <?= $this->lang->line('testi2'); ?>
                          </p>
                          <div class="profile mt-auto">
                              <img src="assets/img/testimonials/vin.jpg" class="testimonial-img" alt="">
                              <h3>Vin Diesel</h3>
                              <h4>Pembalap</h4>
                          </div>
                      </div>
                  </div><!-- End testimonial item -->

                  <div class="swiper-slide">
                      <div class="testimonial-item">
                          <div class="stars">
                              <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
                          </div>
                          <p>
                              <?= $this->lang->line('testi3'); ?>
                          </p>
                          <div class="profile mt-auto">
                              <img src="assets/img/testimonials/fitgirl.webp" class="testimonial-img" alt="">
                              <h3>Amélie Poulain</h3>
                              <h4>FitGirl Repacks</h4>
                          </div>
                      </div>
                  </div><!-- End testimonial item -->

                  <div class="swiper-slide">
                      <div class="testimonial-item">
                          <div class="stars">
                              <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
                          </div>
                          <p>
                              <?= $this->lang->line('testi4'); ?>
                          </p>
                          <div class="profile mt-auto">
                              <img src="assets/img/testimonials/mark.webp" class="testimonial-img" alt="">
                              <h3>Mark Zuckerberg</h3>
                              <h4>CEO Meta</h4>
                          </div>
                      </div>
                  </div><!-- End testimonial item -->

                  <div class="swiper-slide">
                      <div class="testimonial-item">
                          <div class="stars">
                              <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
                          </div>
                          <p>
                              <?= $this->lang->line('testi5'); ?>
                          </p>
                          <div class="profile mt-auto">
                              <img src="assets/img/testimonials/harry.jpg" class="testimonial-img" alt="">
                              <h3>Harry Potter</h3>
                              <h4>Penyihir Hogwarts</h4>
                          </div>
                      </div>
                  </div><!-- End testimonial item -->

              </div>
              <div class="swiper-pagination"></div>
          </div>

      </div>

  </section><!-- /Testimonials Section -->