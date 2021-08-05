<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>PAntura - Perwira Adventure Apps</title>
      <link href="https://fonts.googleapis.com/css?family=Amatic+SC|Raleway" rel="stylesheet">
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    </head>
<body>
  <!-- Forked from a template on Tutorialzine: https://tutorialzine.com/2016/06/freebie-landing-page-template-with-flexbox -->
      <header>
        <h2><a href="#">PANTURA</a></h2>
        <nav>
          <li><a href="#">Panduan</a></li>
          <li><a href="#">Tentang</a></li>
        </nav>
      </header>

      <section class="hero">
        <div class="background-image"></div>
        <div class="hero-content-area">
          <h1>PANTURA</h1>
          <h3>PERWIRA ADVENTURE APPS </h3>
          <a href="<?= base_url('user'); ?>" class="btn">MULAI POS</a>
        </div>
      </section>

      <section class="destinations">
        <h3 class="title">Tujuan Kami:</h3>
        <p>Nahkan, di masa pandemi seperti ini (+ PPKM lv.4) siswa-siswi kesulitan mencari kegiatan yang menyenangkan. Dengan adanya PAntura berbentuk online ini... </p>
        <hr>

        <ul class="grid">
          <li class="small image-1"></li>
          <li class="large image-2"></li>
          <li class="large image-3"></li>
          <li class="small image-4"></li>
        </ul>
      </section>


      <section class="testimonials">
        <h3 class="title">Testimoni dari Kakak Pembina:</h3>
        <hr>
        <p class="quote">Kegiatan yang keren ini!</p>
        <p class="author">- Kakak Khabib Malik</p>
        <p class="quote">Membantu mengurangkan Stress!</p>
        <p class="author">- Kakak Irwan</p>
        <p class="quote">Saya yakin dengan PAntura ini, membuat siswa-siswi senang meski dengan prokes yang ketat.</p>
        <p class="author">- Kakak Ado</p>
      </section>

      <section class="contact">
        <h3 class="title">Hubungi Panitia:</h3>
        <p>Silakan untuk menghubungi panitia di sini (masih belum works).</p>
        <hr>
        <form>
          <input type="text" placeholder="Kesan & Pesan">
          <a href="#" class="btn">KIRIM</a>
        </form>
      </section>

      <footer>
        <p>Images courtesy of <a href="http://unsplash.com/">unsplash</a>.</p>
        <p>Jangan kelamaan di sini, lur! Silakan masuk ke Halaman USER untuk mulai Pengerjaan POS :)</p>
        <ul>
          <li><a href="https://twitter.com/rafikbo_jes/"><i class="fa fa-twitter-square fa-2x"></i></a></li>
          <li><a href="https://instagram.com/rafikbo.jes"><i class="fa fa-instagram fa-2x"></i></a></li>
        </ul>
      </footer>
  </body>
</html>


<style type="text/css">
/*General Styles*/

* {
margin: 0;
padding: 0;
box-sizing: border-box;
}

html {
font-size: 16px;
font-family: "Raleway", sans-serif;
color: #555;
}

ul,
nav {
list-style: none;
}

a {
text-decoration: none;
opacity: 0.75;
color: #fff;
}

a:hover {
opacity: 1;
}

a.btn {
border-radius: 4px;
text-transform: uppercase;
font-weight: bold;
text-align: center;
background-color: #e07e7b;
opacity: 1;
transition: all 400ms;
}

a.btn:hover {
background-color: #ce5856;
}

section {
display: flex;
flex-direction: column;
align-items: center;
padding: 100px 80px;
}

section:not(.hero):nth-child(even) {
background-color: #f5f5f5;
}

.grid {
width: 100%;
display: flex;
flex-wrap: wrap;
justify-content: center;
}

hr {
width: 250px;
height: 3px;
background-color: #e07e7b;
border: 0;
margin-bottom: 50px;
}

.image-1 {
background-image: url("https://images.unsplash.com/photo-1573146500785-c84e60e35184?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1834&q=80");
}

.image-2 {
background-image: url("https://images.unsplash.com/photo-1475483768296-6163e08872a1?ixlib=rb-0.3.5&q=80&fm=jpg&crop=entropy&cs=tinysrgb&w=1600&h=900&fit=crop&s=20b3b1c3caef8c619ac3c75c07a7eafb");
}

.image-3 {
background-image: url("https://images.unsplash.com/photo-1573146168647-d127118ba80e?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1650&q=80");
}

.image-4 {
background-image: url("https://images.unsplash.com/photo-1520685303244-0461943ece6e?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=1050&q=80");
}

section h3.title {
text-transform: capitalize;
font: bold 48px "Amatic SC", sans-serif;
margin-bottom: 30px;
text-align: center;
}

section p {
max-width: 775px;
line-height: 2;
padding: 0 20px;
margin-bottom: 30px;
text-align: center;
}

@media (max-width: 800px) {
section {
  padding: 50px 20px;
}
}

/*Header Styles*/

header {
position: absolute;
width: 100%;
display: flex;
justify-content: space-between;
align-items: center;
padding: 35px 100px 0;
animation: 1s fadein 0.5s forwards;
opacity: 0;
color: #fff;
z-index: 2;
}

@keyframes fadein {
100% {
  opacity: 1;
}
}

header h2 {
font-family: "Amatic SC", sans-serif;
}

header nav {
display: flex;
margin-right: -15px;
}

header nav li {
margin: 0 15px;
}

@media (max-width: 800px) {
header {
  padding: 20px 50px;
  flex-direction: column;
}

header h2 {
  margin-bottom: 15px;
}
}

/*Hero Styles*/

.hero {
position: relative;
justify-content: center;
text-align: center;
min-height: 100vh;
color: #fff;
}

.hero .background-image {
position: absolute;
top: 0;
left: 0;
width: 100%;
height: 100%;
background-image: url("https://images.unsplash.com/photo-1510797215324-95aa89f43c33?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=1875&q=80");
background-size: cover;
background-attachment: fixed;
background-position: center;
z-index: -1;
background-color: #80a3db;
}

.hero h1 {
font: 72px "Amatic SC", sans-serif;
text-shadow: 2px 2px rgba(0, 0, 0, 0.3);
margin-bottom: 15px;
}

.hero h3 {
font: 28px "Raleway", sans-serif;
font-weight: 300;
text-shadow: 2px 2px rgba(0, 0, 0, 0.3);
margin-bottom: 40px;
}

.hero a.btn {
padding: 20px 46px;
}

.hero-content-area {
opacity: 0;
margin-top: 100px;
animation: 1s slidefade 1s forwards;
}

@keyframes slidefade {
100% {
  opacity: 1;
  margin: 0;
}
}

@media (max-width: 800px) {
.hero {
  min-height: 600px;
}

.hero h1 {
  font-size: 48px;
}

.hero h3 {
  font-size: 24px;
}

.hero a.btn {
  padding: 15px 40px;
}
}

/*Destinations Section*/

.destinations .grid li {
height: 350px;
padding: 20px;
background-clip: content-box;
background-size: cover;
background-position: center;
}

.destinations .grid li.small {
flex-basis: 30%;
}

.destinations .grid li.large {
flex-basis: 70%;
}

@media (max-width: 1100px) {
.destinations .grid li.small,
.destinations .grid li.large {
  flex-basis: 50%;
}
}

@media (max-width: 800px) {
.destinations .grid li.small,
.destinations .grid li.large {
  flex-basis: 100%;
}
}

/*Packages Section*/

.packages .grid li {
padding: 50px;
flex-basis: 50%;
text-align: center;
}

.packages .grid li i {
color: #e07e7b;
}

.packages .grid li h4 {
font-size: 30px;
margin: 25px 0;
}

@media (max-width: 800px) {
.packages .grid li {
  flex-basis: 100%;
  padding: 20px;
}
}

/*Testimonials Section*/

.testimonials .quote {
font-size: 22px;
font-weight: 300;
line-height: 1.5;
margin: 40px 0 25px;
}

@media (max-width: 800px) {
.testimonials .quote {
  font-size: 18px;
  margin: 15px 0;
}

.testimonials .author {
  font-size: 14px;
}
}

/*Contact Section*/

.contact form {
display: flex;
align-items: center;
justify-content: center;
flex-wrap: wrap;
width: 60%;
}

.contact form .btn {
padding: 18px 42px;
}

.contact form input {
padding: 15px;
margin-right: 30px;
font-size: 18px;
color: #555;
flex: 1;
}

@media (max-width: 1000px) {
.contact form input {
  flex-basis: 100%;
  margin: 0 0 20px 0;
}
}

/*Footer Section*/

footer {
display: flex;
align-items: center;
justify-content: space-around;
background-color: #555;
color: #fff;
padding: 20px 0;
}

footer ul {
display: flex;
}

footer ul li {
margin-left: 16px;
}

footer p {
text-transform: uppercase;
font-size: 14px;
opacity: 0.6;
align-self: center;
}

@media (max-width: 1100px) {
footer {
  flex-direction: column;
}

footer p {
  text-align: center;
  margin-bottom: 20px;
}

footer ul li {
  margin: 0 8px;
}
}

</style>
