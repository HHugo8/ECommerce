<html>
<style>

*{margin:0;padding:0;-webkit-box-sizing:border-box;box-sizing:border-box}
.diapo{
display:flex;
flex-direction:column;
align-items:center;
margin:2rem auto}
    
.diapo li{margin-top:1rem}
    
.diapo li a img{
display:flex;
max-width:220px;
border:3px solid white;
box-shadow:0 0 5px hsla(0,0%,0%,.4)}




/*lightbox*/

/*description image*/
.des{
display:block;
position:absolute;
bottom:-100%;
padding:10px;
color:#fff;
font-size:1rem;
text-align:center;
background:hsla(0,0%,0%,.5);
width:100%;
min-height:100px}


/*boutons suivant et precedent lightbox*/
.prece,
.suiva{
display:none;
text-decoration:none;
opacity:.6;
z-index:2;
font-size:54px;
position:absolute;
color:#fff;
top:45%}

.suiva{right:10%}
.prece{left:10%}

.suiva:before{content:"\e068";font-family:"bric-a-brac"}

.prece:before{content:"\e05a";font-family:"bric-a-brac"}

.prece:hover,.suiva:hover{transition:.8s;opacity:1}

/*fermeture lightbox */
.ferm{
display:none;
text-decoration:none;
color:#fff;
position:absolute;
top:0;
right:0;
font-size:42px;
padding:20px}
    
.ferm:before{content:"\e085";font-family:"bric-a-brac"}
/*fin fermeture lightbox */

/*design image et effet lightbox */	
.trans-image{width:0;height:0;position:fixed;overflow:hidden;left:0;top:0;min-height:100%;z-index:1;background:hsla(0,0%,0%,.8)}
.trans-image img{display:none;top:10%;position:absolute;left:50%;margin-left:-150px;border:5px solid #fff}
.trans-image:target{width:100%;height:100%}
.trans-image:target > .prece,
.trans-image:target > .suiva,
.trans-image:target > img,
.trans-image:target > .ferm{
display:block;
animation:effet .4s ease-in-out .4s backwards;
-webkit-animation:effet .4s ease-in-out .4s backwards}

.trans-image:target > .prece,
.trans-image:target > .suiva{animation-delay:.6s;-webkit-animation-delay:.6s}

.trans-image:target > .des{animation:effet1 .4s .6s forwards;-webkit-animation:effet1 .4s .6s forwards}


/*animations*/

@keyframes effet{
0%{transform:scale(0)}
50%{transform:scale(1.2)}
100%{transform:scale(1)}}
	
	
@-webkit-keyframes effet{
0%{opacity:0;-webkit-transform:scale(0)}
80%{-webkit-transform:scale(1.2)}
100%{opacity:1;-webkit-transform:scale(1))}
}	
	
	
@keyframes effet1{100%{bottom:0}}

@-webkit-keyframes effet1{100%{bottom:0}}

/*fin animations*/
  
@media screen and (min-width:37.5rem){ 
.diapo{
display:flex;
flex-flow:row wrap;
justify-content:center}

.diapo li{margin-right:auto;margin-left:auto}
}

</style>


<ul class="diapo">
<li>
<a href="#image1"><img src="images/1.jpg" alt/>
<span class=clic></span></a>
<span class="trans-image" id="image1"><img src="site/3519.jpg" alt>
<span class=des>Description de l'image</span>
<a href="#image8" class="prece"></a>
<a href="#image2" class="suiva"></a>
<a href="#" class="ferm"></a>
</span>
</li>

<li>
<a href="#image2"><img src="images/2.jpg" alt/>
<span class=clic></span></a>
<span class="trans-image" id="image2"><img src="site/Bull-Stein-cherry-bronze.jpg" alt>
<span class=des>Description de l'image</span>
<a href="#image1" class="prece"></a>
<a href="#image3" class="suiva"></a>
<a href="#" class="ferm"></a>
</span>
</li>	
					
<li>
<a href="#image3"><img src="site/Bull-Stein-cherry-bronze.jpg" alt>
<span class=clic></span></a>
<span class="trans-image" id="image3">
<img src="images/3.jpg" alt/>										
<span class=des>Description de l'image</span>
<a href="#image2" class="prece"></a>
<a href="#image4" class="suiva"></a>
<a href="#" class="ferm"></a>
</span>
</li>

<li>
<a href="#image4"><img src="site/1001940-279510182225524-7926115859698840503-n.jpg" alt>
<span class=clic></span></a>
<span class="trans-image" id="image4">
<img src="images/4.jpg" alt/>						
<span class=des>Description de l'image</span>
<a href="#image3" class="prece"></a>
<a href="#image5" class="suiva"></a>
<a href="#" class="ferm"></a>
</span>
</li>

<li>
<a href="#image5"><img src="site/5776cc-fruitsetlgumes.jpg" alt>
<span class=clic></span></a>
<span class="trans-image" id="image5">
<img src="images/5.jpg" alt/>						
<span class=des>Description de l'image</span>
<a href="#image4" class="prece"></a>
<a href="#image6" class="suiva"></a>
<a href="#" class="ferm"></a>
</span>
</li>

<li>
<a href="#image6"><img src="site/Bull-Stein-cherry-bronze.jpg" alt>
<span class=clic></span></a>
<span class="trans-image" id="image6">
<img src="images/6.jpg" alt/>						
<span class=des>Description de l'image</span>
<a href="#image5" class="prece"></a>
<a href="#image7" class="suiva"></a>
<a href="#" class="ferm"></a>
</span>
</li>

<l>
<a href="#image7"><img src="site/Bull-Stein-cherry-bronze.jpg" alt>
<span class=clic></span></a>
<span class="trans-image" id="image7">
<img src="images/7.jpg" alt/>						
<span class=des>Description de l'image</span>
<a href="#image6" class="prece"></a>
<a href="#image8" class="suiva"></a>
<a href="#" class="ferm"></a>
</span>
</li>

<li>
<a href="#image8"><img src="site/Bull-Stein-cherry-bronze.jpg" alt>
<span class=clic></span></a>
<span class="trans-image" id="image8">
<img src="images/8.jpg" alt/>						
<span class=des>Description de l'image</span>
<a href="#image7" class="prece"></a>
<a href="#image1" class="suiva"></a>
<a href="#" class="ferm"></a>
</span>
</li>	
</ul>




<!--
<figure>
<img src="site/3519.jpg" alt>
<img src="site/5776cc-fruitsetlgumes.jpg" alt>
<img src="site/11755711.jpg" alt>
<img src="site/Bull-Stein-cherry-bordeaux-I.jpg" alt>
<img src="site/Bull-Stein-cherry-bronze.jpg" alt>
<img src="site/1001940-279510182225524-7926115859698840503-n.jpg" alt>
</figure>
-->
</html>