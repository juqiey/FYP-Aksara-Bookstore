<html>
<head>
	<meta name="viewport" content="width=device-width,inititla-scale=1">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" 
	integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
	<link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<style>
		@import url('https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');

		:root{
			/*font style*/
			--title-font: 'Bebas Neue', cursive;
			--content-font: 'Poppins', sans-serif;
			
			/*color theme*/
			--font-color: #F5F5F1;
			--background-color: #221F1F;
			--first-color: #E50914;
			--second-color: #B81D24;	
		}
		a{
			text-decoration: none;
		}
		#hero {
			font-family: var(--content-font);
			width: 100%;
			height: 100vh;
			background: url(source/hero-bg.jpg) top center;
			background-size: cover;
			position: relative;
		}
		@media (min-width: 1024px) {
			#hero {
				background-attachment: fixed;
			}
		}
		#hero:before {
		    content: "";
		    background: rgba(0, 0, 0, 0.6);
		    position: absolute;
		    bottom: 0;
		    top: 0;
		    left: 0;
		    right: 0;
		}
		#hero .hero-container {
		    position: absolute;
		    bottom: 0;
		    top: 0;
		    left: 0;
		    right: 0;
		    display: flex;
		    justify-content: center;
		    align-items: center;
		    flex-direction: column;
		    text-align: center;
		}
		#hero h1 {
		    margin: 30px 0 10px 0;
		    font-size: 60px;
		    font-weight: 700;
		    line-height: 56px;
		    text-transform: uppercase;
		    color: var(--font-color);
		}
		@media (max-width: 768px) {
		    #hero h1 {
				font-size: 28px;
				line-height: 36px;
		    }
		}
		#hero h2 {
		    color: #eee;
		    margin-bottom: 50px;
		    font-size: 24px;
		}
		@media (max-width: 768px) {
		    #hero h2 {
				font-size: 18px;
				line-height: 24px;
				margin-bottom: 30px;
		    }
		}
		#hero .btn-get-started {
		    text-transform: uppercase;
		    font-weight: 500;
		    font-size: 20px;
		    letter-spacing: 1px;
		    display: inline-block;
		    padding: 8px 28px;
		    border-radius: 50px;
		    transition: 0.4s;
		    margin: 10px;
		    border: 2px solid #fff;
		    color: #fff;
		}
		#hero .btn-get-started:hover {
		    background: var(--first-color);
		    border: 2px solid var(--first-color);
			transform: scale(1.1);
		}
	</style>
	<title>AKSARA BOOKSTORE</title>
</head>
<body>
	<section id="hero">
    <div class="hero-container">
      <h1>Welcome to AKSARA BOOKSTORE</h1>
      <h2></h2>
      <a href="login.php" class="btn-get-started">Shop Now</a>
    </div>
  </section><!-- End Hero Section -->
  <script>
		$(document).ready(function(){
			$(".hero-container").hide();
			$(".hero-container").slideDown(750);
		});
  </script>
</body>
</html>