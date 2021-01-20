<!-- PAGE -->
<section class="page-section brands-2" style="background-color: #fff;">
    <div class="container">
        <h2 class="section-title section-title-1">
            <span><?php echo translate('what_our_clients_say');?></span>
        </h2>
       <div id="testim" class="testim">
        
<div class="wrap">

<span id="right-arrow" class="arrow right fa fa-chevron-right"></span>
<span id="left-arrow" class="arrow left fa fa-chevron-left "></span>
<ul id="testim-dots" class="dots">

<?php
    $this->db->limit(5);
    $this->db->order_by('id','DESC');
    $reviews=$this->db->get('review')->result_array(); 
     ?>
     <?php $i=0; foreach($reviews as $review): ?>
    <li class="dot <?php if($i==0){echo "active"; } ?>"></li>
     <?php endforeach; ?>
</ul>
<div id="testim-content" class="cont">

   
     <?php $i=0; foreach($reviews as $review):
        $this->db->where('user_id',$review['user_id']);
        $users=$this->db->get('user')->result_array(); 
        
                                if(file_exists('uploads/user_image/user_'.$row['user_id'].'.jpg')){ 
                                    $img=$this->crud_model->file_view('user',$row['user_id'],'100','100','no','src','','','.jpg').'?t='.time();
                                } else if(empty($row['fb_id']) !== true){ 
                                    $img='https://graph.facebook.com/'. $row['fb_id'] .'/picture?type=large';
                                } else if(empty($row['g_id']) !== true ){
                                    $img=$row['g_photo'];
                                } else {
                                    $img=base_url().'uploads/user_image/default.jpg';
                                } 
                            
        ?>
    <div class="<?php if($i==0){echo "active"; } ?>">
        <div class="img"><img src="<?php echo $img; ?>" alt=""></div>
        <div class="h4"><?php echo $users[0]['username']; ?></div>
        <p><?php echo $review['review']; ?></p>                    
    </div>
     <?php $i++; endforeach; ?>


</div>
 </div>
</div>
    </div>
</section>
<!-- /PAGE -->

<script>
    
// vars

window.onload = function() {

    'use strict'
var	testim = document.getElementById("testim"),
		testimDots = Array.prototype.slice.call(document.getElementById("testim-dots").children),
    testimContent = Array.prototype.slice.call(document.getElementById("testim-content").children),
    testimLeftArrow = document.getElementById("left-arrow"),
    testimRightArrow = document.getElementById("right-arrow"),
    testimSpeed = 4500,
    currentSlide = 0,
    currentActive = 0,
    testimTimer,
		touchStartPos,
		touchEndPos,
		touchPosDiff,
		ignoreTouch = 30;
;


    // Testim Script
    function playSlide(slide) {
        for (var k = 0; k < testimDots.length; k++) {
            testimContent[k].classList.remove("active");
            testimContent[k].classList.remove("inactive");
            testimDots[k].classList.remove("active");
        }

        if (slide < 0) {
            slide = currentSlide = testimContent.length-1;
        }

        if (slide > testimContent.length - 1) {
            slide = currentSlide = 0;
        }

        if (currentActive != currentSlide) {
            testimContent[currentActive].classList.add("inactive");            
        }
        testimContent[slide].classList.add("active");
        testimDots[slide].classList.add("active");

        currentActive = currentSlide;
    
        clearTimeout(testimTimer);
        testimTimer = setTimeout(function() {
            playSlide(currentSlide += 1);
        }, testimSpeed)
    }

    testimLeftArrow.addEventListener("click", function() {
        playSlide(currentSlide -= 1);
    })

    testimRightArrow.addEventListener("click", function() {
        playSlide(currentSlide += 1);
    })    

    for (var l = 0; l < testimDots.length; l++) {
        testimDots[l].addEventListener("click", function() {
            playSlide(currentSlide = testimDots.indexOf(this));
        })
    }

    playSlide(currentSlide);

    // keyboard shortcuts
    document.addEventListener("keyup", function(e) {
        switch (e.keyCode) {
            case 37:
                testimLeftArrow.click();
                break;
                
            case 39:
                testimRightArrow.click();
                break;

            case 39:
                testimRightArrow.click();
                break;

            default:
                break;
        }
    })
		
		testim.addEventListener("touchstart", function(e) {
				touchStartPos = e.changedTouches[0].clientX;
		})
	
		testim.addEventListener("touchend", function(e) {
				touchEndPos = e.changedTouches[0].clientX;
			
				touchPosDiff = touchStartPos - touchEndPos;
			
				console.log(touchPosDiff);
				console.log(touchStartPos);	
				console.log(touchEndPos);	

			
				if (touchPosDiff > 0 + ignoreTouch) {
						testimLeftArrow.click();
				} else if (touchPosDiff < 0 - ignoreTouch) {
						testimRightArrow.click();
				} else {
					return;
				}
			
		})
}
</script>