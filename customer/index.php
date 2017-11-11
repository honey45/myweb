<?php require "header.php";?>

<body>
  <div id="background">
<br>
 
    <div  align="center">
      <span class="xs-hidden">
      <div id="container">
        <div id="list" style="left:-900px;">  
         <img src="img/5.jpg" alt="1"/>
         <img src="img/2.jpg" alt="2"/>
         <img src="img/3.jpg" alt="3"/>
         <img src="img/4.jpg" alt="4"/>
         <img src="img/5.jpg" alt="5"/>
         <img src="img/1.jpg" alt="5"/>
        </div>
        <div id="buttons">
        <span index="1" class="on"></span>
        <span index="2"></span>
        <span index="3"></span>
        <span index="4"></span>
        <span index="5"></span>
        </div>
       <a href="javascript:;" id="prev" class="arrow">&lt;</a>
       <a href="javascript:;" id="next" class="arrow">&gt;</a>
      </div>
      </span>
    </div>

<?php require "list-right.php"; ?>


  <div class="list scenery">
    <section>
      <h2>Hot Sales</h2>
      <div class="img">
      
  <img src="img/lst.jpg" alt="RS 07 Gold" width="160" height="160">
  
  <div class="desc"> <a target="_blank" href="img/list.jpg">20M</a></div>
</div>

<div class="img">
  
  <img src="/i/tulip_flaming_club_s.jpg" alt="RS 03 Gold" width="160" height="160">
 
  <div class="desc"><a target="_blank" href="/i/tulip_flaming_club.jpg">50M </a></div>
</div>

<div class="img">
  
  <img src="/i/tulip_fringed_family_s.jpg" alt="Deadman Gold" width="160" height="160">

  <div class="desc"><a target="_blank" href="/i/tulip_fringed_family.jpg">100M  </a></div>
</div>

<div class="img">
 
  <img src="/i/tulip_peach_blossom_s.jpg" alt="RS 07 Gold" width="160" height="160">
 
  <div class="desc"> <a target="_blank" href="/i/tulip_peach_blossom.jpg">50M </a></div>
</div>
<div class="img">
  
  <img src="/i/tulip_flaming_club_s.jpg" alt="RS 03 Gold" width="160" height="160">
  
  <div class="desc"><a target="_blank" href="/i/tulip_flaming_club.jpg">100M</a></div>
</div>

<div class="img">
  
  <img src="/i/tulip_fringed_family_s.jpg" alt="RS 07 Accounts" width="160" height="160">
  
  <div class="desc"><a target="_blank" href="/i/tulip_fringed_family.jpg">70atc|70str|70def</a></div>
</div>
</section>
</div>

<div class="news">
   <h2>Last News</h2>
   <p><?php include "hnews.php";?></p>
   <br>
  <h2 >Coustomer Review</h2>
  <p><?php include"feeback.php";?></p>
   

</div>
<?php require "footer.php";?>

               
</div>
</body>
</html>
