<template>
  <footer class="p-5">
    <div class="container-lg my-5">
      <div class="row justify-content-between">
        <!-- Colonna logo -->
        <div class="col-3 img-container">
          <!-- Logo -->
          <img
            src="https://cdn.discordapp.com/attachments/1027584701415833620/1032191240126611536/deliveboo-logo-invert-mobile.png"
            alt="logo"
            class="d-lg-none"
          />
          <img
            src="https://media.discordapp.net/attachments/1027584701415833620/1032191239577153586/deliveboo-logo-invert-desktop.png"
            alt="logo"
            class="d-none d-lg-block w-75"
          />
        </div>

        <!-- Colonna join us -->
        <div class="col-6 col-md-3">
          <!-- Links -->
          <h5 class="text-uppercase font-weight-bold h4">join us</h5>
          <ul class="list-unstyled">
            <li class="my-2">
              <a href="#!">Careers</a>
            </li>
            <li class="my-2">
              <a href="#!">Restaurants</a>
            </li>
            <li class="my-2">
              <a href="#!">Become a Courier</a>
            </li>
            <li class="my-2">
              <a href="#!">About</a>
            </li>
          </ul>
        </div>

        <!-- Colonna Let us help you -->
        <div class="col-6 col-md-3">
          <!-- Links -->
          <h5 class="text-uppercase font-weight-bold h4">let us help you</h5>

          <ul class="list-unstyled">
            <li class="my-2">
              <a href="#!">Help Center</a>
            </li>
            <li class="my-2">
              <a href="#!">Support</a>
            </li>
            <li class="my-2">
              <a href="#!">Contacts</a>
            </li>
          </ul>
        </div>

        <!-- Colonna Follow us -->
        <div class="col-6 col-md-3">
          <!-- Links 3 -->
          <h5 class="text-uppercase font-weight-bold h4">follow us</h5>

          <ul class="list-unstyled">
            <li class="my-2">
              <a href="#!">Facebook</a>
            </li>
            <li class="my-2">
              <a href="#!">Twitter</a>
            </li>
            <li class="my-2">
              <a href="#!">Instagram</a>
            </li>
          </ul>
        </div>
      </div>

      <!-- Divisore -->
      <div class="col-12 divisor my-5"></div>

      <!-- Copyright -->
      <div class="copyright-container d-flex justify-content-between">
        <div class="footer-copyright">
          <p class="m-0">
            © All right reserved Made &#129505; by Team 4 - Class #67
          </p>
        </div>
        <div class="footer-copyright-links">
          <p class="m-0">
            <a class="mx-2" href="#!">Privacy Policy</a><span class="pipe-line">|</span>
            <a class="mx-2" href="#!">Terms & condition</a><span class="pipe-line">|</span>
            <a class="mx-2" href="#!">Cookies Policy</a>
          </p>
        </div>
      </div>
    </div>
  </footer>
</template>

<script>
export default {};
</script>

<style lang='scss' scoped>
@import "../../sass/variables";

footer {
  background-color: $footerColor;

  .img-container{
    img{
      width: 100%;
    }
    .d-lg-none{
      max-width: 72px;
      min-width: 72px;
    }
  }
}

.divisor {
  border-bottom: 0.5px solid #999999;
}

a {
  color: $secondaryColor;
  text-decoration: none;
  font-weight: 300;
}

li,
p,
h5 {
  color: white;
}

.copyright-container {
  p {
    font-size: 0.7rem;
    font-weight: 300;
  }
}

.pipe-line{
  color: #999999;
}

// .text-title {
//   display: inline-block;
//   margin-left: 45px;
//   -webkit-transform: scale(2, 1);
//   -moz-transform: scale(2, 1);
//   -o-transform: scale(2, 1);
//   transform: scale(2, 1);
// }

</style>
