
<!--footer-->
<div class="footer">
	<div class="container">

		<div class="clearfix"></div>
			<div class="footer-bottom">
				<h2 ><a href="index.php" style="font-family: 'Bitter', serif;"><?php echo $shopname ?><span style="font-family: 'Bitter', serif;"><?php echo $tagline ?></span></a></h2>
				<p class="fo-para" style="font-family: 'Bitter', serif;">Best Product Delivery Service in Bangladesh</p>
				<ul class="social-fo">
					<li><a href="<?php echo $facebook ?>" class=" face"><i class="fa fa-facebook" aria-hidden="true" style="padding:10px;"></i></a></li>
					<li><a href="#" class=" twi"><i class="fa fa-twitter" aria-hidden="true" style="padding:10px;"></i></a></li>
					<li><a href="#" class=" pin"><i class="fa fa-pinterest-p" aria-hidden="true" style="padding:10px;"></i></a></li>
					<li><a href="#" class=" dri"><i class="fa fa-dribbble" aria-hidden="true" style="padding:10px;"></i></a></li>
				</ul>
				<div class=" address">
					<div class="col-md-4 fo-grid1">
							<p style="font-family: 'Bitter', serif;"><i class="fa fa-home" aria-hidden="true"></i><?php echo $address ?></p>
					</div>
					<div class="col-md-4 fo-grid1">
							<p style="font-family: 'Bitter', serif;"><i class="fa fa-phone" aria-hidden="true"></i><?php echo $mobileno ?></p>	
					</div>
					<div class="col-md-4 fo-grid1">
						<p style="font-family: 'Bitter', serif;"><a href="<?php echo $website ?>"><i class="fa fa-envelope-o" aria-hidden="true"></i><?php echo $website ?></a></p>
					</div>
					<div class="clearfix"></div>
					
					</div>
			</div>
		
		<div class="copy-right">
			<p style="font-family: 'Bitter', serif;"> &copy; <?php echo date("Y");?> <?php echo $shopname ?>. All Rights Reserved | Powered by  <a href="http://mkrow.com"> Mkrow Services</a></p>
		
		
				<center><a href='https://www.symptoma.com/en/info/covid-19'>Coronavirus Facts</a> <script type='text/javascript' src='https://www.freevisitorcounters.com/auth.php?id=1399a3b9d389fa1ae7cce28136021d7897ac6acc'></script>
<script type="text/javascript" src="https://www.freevisitorcounters.com/en/home/counter/758390/t/13"></script> &nbsp;&nbsp;<span></span> <center>

		</div>
	</div>
</div>
<!-- //footer-->

<!-- smooth scrolling -->
	<script type="text/javascript">
		$(document).ready(function() {
		/*
			var defaults = {
			containerID: 'toTop', // fading element id
			containerHoverID: 'toTopHover', // fading element hover id
			scrollSpeed: 1200,
			easingType: 'linear' 
			};
		*/								
		$().UItoTop({ easingType: 'easeOutQuart' });
		});
	</script>
	<a href="#" id="toTop" style="display: block;"> <span id="toTopHover" style="opacity: 1;"> </span></a>
<!-- //smooth scrolling -->
<!-- for bootstrap working -->
		<script src="js/bootstrap.js"></script>
<!-- //for bootstrap working -->
<script type='text/javascript' src="js/jquery.mycart.js"></script>
  <script type="text/javascript">
  $(function () {

    var goToCartIcon = function($addTocartBtn){
      var $cartIcon = $(".my-cart-icon");
      var $image = $('<img width="30px" height="30px" src="' + $addTocartBtn.data("image") + '"/>').css({"position": "fixed", "z-index": "999"});
      $addTocartBtn.prepend($image);
      var position = $cartIcon.position();
      $image.animate({
        top: position.top,
        left: position.left
      }, 500 , "linear", function() {
        $image.remove();
      });
    }

    $('.my-cart-btn').myCart({
      classCartIcon: 'my-cart-icon',
      classCartBadge: 'my-cart-badge',
      affixCartIcon: true,
      checkoutCart: function(products) {
        $.each(products, function(){
          console.log(this);
        });
      },
      clickOnAddToCart: function($addTocart){
        goToCartIcon($addTocart);
      },
      getDiscountPrice: function(products) {
        var total = 0;
        $.each(products, function(){
          total += this.quantity * this.price;
        });
        return total * 1;
      }
    });

  });
  </script>
  
 
</body>
</html>