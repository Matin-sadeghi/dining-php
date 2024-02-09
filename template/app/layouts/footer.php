

 <!-- start footer section -->
 <footer class="footer">
        <div class="footer-header">
            <a href="#" class="logo"><img  style="width: 75px;height: 70px;border-radius:100%" src="http://localhost/restaurant/<?php echo $setting["logo"] ?>"></a>
            <div>
                <h1 class="main-name"><?php echo $setting["restaurant_name"] ?></h1>
                <p class="sub-name"><?php echo $setting["sub_name"] ?></p>
            </div>
        </div>

        <div class="footer-social-media">
            <ul class="social-media">

            <?php foreach($socialMedias as $socialMedia){ ?>
                <li class="social-media-item">
                    <a class="social-media-link" href="<?php echo $socialMedia["url"] ?>">
                        <img title="<?php echo $socialMedia["name"] ?>" style="width: 42.56px;height: 46.6px;" src="http://localhost/restaurant/<?php echo $socialMedia["image"] ?>" >
                    </a>
                </li>
            <?php }?>
            </ul>
        </div>

        <div class="footer-copyright">
            <p class="footer-copyright-paragraph">
                &copy; <?php echo $setting["copyright"] ?>
            </p>
        </div>
    </footer>

    <!-- end footer section -->

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
       $(document).ready(function(){
         
        $(".intro-item-caption").hover(function(){
          
        $(this).css({"bakground-color":"blue"})
        
        // $(this).css({"background-color":"rgba(0,0,0,0.4)"})

          })
});
</script>

</body>
</html>







