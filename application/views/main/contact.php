  <!-- Contact Section -->
  <section id="contact" class="contact section">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
          <h2>Kontak Kami</h2>
      </div><!-- End Section Title -->

      <div class="container" data-aos="fade-up" data-aos-delay="100">

          <div class="row gy-4">

              <div class="col-lg-6">
                  <div class="info-item d-flex flex-column justify-content-center align-items-center" data-aos="fade-up" data-aos-delay="200">
                      <i class="bi bi-geo-alt"></i>
                      <h3>Alamat</h3>
                      <p>Jl. H. Saman, RT.9/RW.008, Tugu, Kec. Cimanggis, Kota Depok, Jawa Barat</p>
                  </div>
              </div><!-- End Info Item -->

              <div class="col-lg-3 col-md-6">
                  <div class="info-item d-flex flex-column justify-content-center align-items-center" data-aos="fade-up" data-aos-delay="300">
                      <i class="bi bi-telephone"></i>
                      <h3>Hubungi Kami</h3>
                      <a href="https://wa.me/6287716180033" target="_blank">+62 877-1618-0033</a>
                  </div>
              </div><!-- End Info Item -->

              <div class="col-lg-3 col-md-6">
                  <div class="info-item d-flex flex-column justify-content-center align-items-center" data-aos="fade-up" data-aos-delay="400">
                      <i class="bi bi-envelope"></i>
                      <h3>Email Kami</h3>
                      <p>qiznetnetwork@gmail.com</p>
                  </div>
              </div><!-- End Info Item -->

          </div>

          <div class="row gy-4 mt-1">
              <div class="col-lg-6" data-aos="fade-up" data-aos-delay="300">
                  <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3965.1825793006637!2d106.84878717430094!3d-6.3704132623147105!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69ec7024a2c2db%3A0xfaffd0f16cab0d0e!2sJVH2%2BRHM%2C%20Jl.%20H.%20Saman%2C%20RT.9%2FRW.008%2C%20Tugu%2C%20Kec.%20Cimanggis%2C%20Kota%20Depok%2C%20Jawa%20Barat%2016451!5e0!3m2!1sid!2sid!4v1741241459544!5m2!1sid!2sid" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
              </div><!-- End Google Maps -->

              <div class="col-lg-6">
                  <form action="<?= base_url('contact/submit_form'); ?>" method="post" class="php-email-form" data-aos="fade-up" data-aos-delay="400">
                      <div class="row gy-4">

                          <div class="col-md-6">
                              <input type="text" name="name" class="form-control" placeholder="Nama Kamu" required>
                          </div>

                          <div class="col-md-6 ">
                              <input type="email" class="form-control" name="email" placeholder="Email Kamu" required>
                          </div>

                          <div class="col-md-12">
                              <input type="text" class="form-control" name="subject" placeholder="Subjek" required>
                          </div>

                          <div class="col-md-12">
                              <textarea class="form-control" name="message" rows="6" placeholder="Pesan" required></textarea>
                          </div>

                          <div class="col-md-12 text-center">
                              <div class="loading" style="display: none;">Loading</div>
                              <div class="error-message" style="display: none;"></div>
                              <div class="sent-message" style="display: none;">Pesan berhasil dikirim!!</div>

                              <button type="submit">Kirim</button>
                          </div>
                      </div>
                  </form>
              </div><!-- End Contact Form -->


          </div>

      </div>

  </section><!-- /Contact Section -->