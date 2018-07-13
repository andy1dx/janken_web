<!DOCTYPE html>
<html>
    <head>
		<script src="https://code.jquery.com/jquery-3.3.1.min.js" ></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

		<script>
		$(document).ready(function() {
	        var audioElement = document.createElement('audio');
	        audioElement.setAttribute('src', 'http://www.uscis.gov/files/nativedocuments/Track%2093.mp3');
	        audioElement.setAttribute('autoplay', 'autoplay');
	        //audioElement.load()
	        $.get();
	        audioElement.addEventListener("load", function() {
	        audioElement.play();
	        }, true);




	        $('.play').click(function() {
	        audioElement.play();
	        });


	        $('.pause').click(function() {
	        audioElement.pause();
			});
			


		});	var myVar = setInterval(myTimer, 1000);
			function playJankenStart() {
				document.getElementById("score").innerHTML = 0;


				playJanken();
			}

			function playJanken() {
				var condition  = Math.floor(Math.random() * 2);
				if(condition == 1){
					document.getElementById("win_condition").innerHTML = "WIN";
					disableButton(true);
				}else{
					document.getElementById("win_condition").innerHTML = "LOSE";
					disableButton(true);
				}
				var janken  = Math.floor(Math.random() * 3);
				if(janken == 1){
					document.getElementById("janken_random").innerHTML = "rock";
					document.getElementById("image_random").src="./img/batu.png";
				}else if(janken == 2){
					document.getElementById("janken_random").innerHTML = "paper";
					document.getElementById("image_random").src="./img/kertas.png";
				}else{
					document.getElementById("janken_random").innerHTML = "scissor";
					document.getElementById("image_random").src="./img/gunting.png";
				}
				document.getElementById("timer").innerHTML = 4;
				
			}
			function myTimer() {
				var timer = document.getElementById("timer").innerHTML;
				console.log(timer);
				if(timer !== ""){
					if( timer > 0){
						timer -= 1;
						document.getElementById("timer").innerHTML = timer;	
					}else if( timer == 0 ){
						loseTime();
						document.getElementById("timer").innerHTML = "TIME OUT";	
					}
				}
			}
			function disableButton(flag){
				if(flag == true){
					document.getElementById("rock").disabled = false;
					document.getElementById("paper").disabled = false;
					document.getElementById("scissor").disabled = false;
					document.getElementById("play_janken").disabled = true;
					document.getElementById("play_janken").innerHTML = "PLAYING";
				}else{
					document.getElementById("rock").disabled = true;
					document.getElementById("paper").disabled = true;
					document.getElementById("scissor").disabled = true;
					document.getElementById("play_janken").disabled = false;
					document.getElementById("play_janken").innerHTML = "START";
				}
			}
			function loseTime(){
				disableButton(false);
				var score = parseInt(document.getElementById("score").innerHTML);
				// score -= 10;
				document.getElementById("score").innerHTML = score;
			}
			function selectJanken(janken){
				// disableButton(false);
				var condition = document.getElementById("win_condition").innerHTML;
				var janken_random = document.getElementById("janken_random").innerHTML;
				var score = parseInt(document.getElementById("score").innerHTML);
				if(condition == "WIN"){
					if(janken == "rock" && janken_random == "scissor"){
						score += 10;
						// document.getElementById("timer").innerHTML = "WIN";
						playJanken();
					}else if(janken == "scissor" && janken_random == "paper"){
						score += 10;
						// document.getElementById("timer").innerHTML = "WIN";
						playJanken();
					}else if(janken == "paper" && janken_random == "rock"){
						score += 10;
						// document.getElementById("timer").innerHTML = "WIN";
						playJanken();
					}else{
						// score -= 10;
						document.getElementById("timer").innerHTML = "LOSE";
						disableButton(false);
					}
						
				}else{
					if(janken == "rock" && janken_random == "paper"){
						score += 10;
						// document.getElementById("timer").innerHTML = "WIN";
						playJanken();
					}else if(janken == "scissor" && janken_random == "rock"){
						score += 10;
						// document.getElementById("timer").innerHTML = "WIN";
						playJanken();
					}else if(janken == "paper" && janken_random == "scissor"){
						score += 10;
						// document.getElementById("timer").innerHTML = "WIN";
						playJanken();
					}else{
						// score -= 10;
						document.getElementById("timer").innerHTML = "LOSE";
						
						disableButton(false);
					}
				}
				document.getElementById("score").innerHTML = score;
				
			}
		</script>
    </head>
    
    <body>
     	<!-- <div class="play">Play</div>

		<div class="pause">Stop</div> -->

		<div class="container">
			<div class="row">
				<div class="col-md-12 text-center">
					<h1>SCORE</h1>
					<h1 class="text-warning" id="score">0</h1>
				</div>			
			</div>
			<div class="row">
				<div class="col-md-12 text-center">
					<h1>CONDITION</h1>
				</div>			
			</div>
			<div class="row">
				<div class="col-md-12 text-center">
					<h1 class="	text-success" id="win_condition"></h1>
				</div>			
			</div>

			<div class="row">
				<div class="col-md-12 text-center">
					<h1 style="	display:none;" id="janken_random">random</h1>
					<img id="image_random" src="./img/random.gif">
				</div>			
			</div>
			<div class="row">
				<div class="col-md-12 text-center">
					<h1  class="text-danger"  id="timer"></h1>
				</div>			
			</div>			
			<div class="row">
				<div class="col-md-4 text-center	">
					<div disabled id="rock" onclick="selectJanken('rock')"><img src="./img/batu.png"></div>
				</div>			
				<div class="col-md-4 text-center	">
					<div disabled id="paper" onclick="selectJanken('paper')"><img src="./img/kertas.png"></div>
				</div>			
				<div class="col-md-4 text-center	">
					<div disabled id="scissor" onclick="selectJanken('scissor')"><img src="./img/gunting.png"></div>
				</div>			
			</div>
			<div class="row">
				<div class="col-md-12 text-center">
					<button id="play_janken" class="btn btn-primary" style="padding:20px 50px ;" onclick="playJankenStart()">START</button>
				</div>			
			</div>
		</div>
    </body>
</html>