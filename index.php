<?php
include 'scripts/header.html';
?>
<body>
	<div id="connection">
		<div class="connectionCardContainer">
			<div class="connectionCard">
				<div class="title">
					Se connecter - Sign in
				</div>
				<hr>
				<div class="id">
					identifiant/prénom - id/name
					<input type="text" name="id" id="identifiant" placeholder="Entrez votre identifiant/prénom - Your id/name">
				</div>
				<div class="mailAddress">
					addresse email - email address
					<input type="text" id="mailAddress" name="mailAddress" placeholder="Votre adresse email - You email adress">
				</div>
				<div class="enterConnection">
					<button onclick="beggin()">Commencer</button>
				</div>
			</div>
		</div>
	</div>
	<div id="app">
		<div class="cardContainer">
			<div class="card">
				<div class="topMenu" id="topMenu">
					<div class="nameTitle">
						<p id="nameUser">
							
						</p>
					</div>
				</div>
				<div class="chatContainer" id="chatContainer">
					<div class="msgContainer" id="msgContainer">
						<div class="hesMsg" id="hesMsg">
							Bonjour !
						</div>
					</div>
				</div>
				<div class="sendContainerCenter">
					<div class="sendContainer">
						<div class="messageInput">
							<input type="text" name="msgInput" placeholder="Votre message" id="msg">
						</div>
						<div class="sendButtonContainer">
							<img src="ressources/send.png" class="sendImg" id="imgSend" onclick="send()">
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<script type="text/javascript">
		$("#app").hide();
		function beggin(){
			let idContainer = document.getElementById("identifiant").value;
			let mailContainer = document.getElementById("mailAddress").value;
			if (idContainer == "") {
				window.alert("Please, enter your name");
			}else if (mailContainer == "") {
				window.alert("Please enter an email address");
			}
			else{
				$("#app").show();
				$("#connection").hide();
				document.getElementById("nameUser").innerHTML = idContainer;
			}
		}
		function setDarkMode(){
			$("body").css("background", "#181A1B");
			$("#topMenu").css("background", "#181A1B");
			$("#topMenu").css("color", "#fff");
			$("#chatContainer").css("background", "transparent");
			$("#msgContainer").css("background", "transparent");
			$("#hesMsg").css("background", "transparent");
			$("#hesMsg").css("border", "2px solid #fff");
			$("#imgSend").css("border", "2px solid #fff");
		}
		function send(){
			// envoyer un msg
			let getMsg = document.getElementById("msg").value;
			let chatContainer = document.getElementById("chatContainer");
			var myMsgContainer = document.createElement("DIV");
			chatContainer.appendChild(myMsgContainer);
			myMsgContainer.className = "msgContainer yourMsgContainer";

			let yourMsg = document.createElement("DIV");
			myMsgContainer.appendChild(yourMsg);
			yourMsg.className = "yourMsg";

			yourMsg.innerHTML = getMsg;

			// recevoir la réponse
			function createResponseEnvironement(){
				botMsgContainer = document.createElement("DIV");
				chatContainer.appendChild(botMsgContainer);
				botMsgContainer.className = "msgContainer";
				botMsgContainer.setAttribute("id", "msgContainer");
			}
			if (getMsg == "bonjour" || getMsg == "Bonjour") {
				createResponseEnvironement();

				let responseContainer = document.createElement("DIV");
				botMsgContainer.appendChild(responseContainer);
				responseContainer.className = "hesMsg";
				responseContainer.setAttribute("id", "hesMsg");

				responseContainer.innerHTML = "Bonjour";
			}else if (getMsg == "dark mode" || getMsg == "Dark mode" || getMsg == "mode sombre" || getMsg == "Mode sombre" || getMsg == "mode nuit" || getMsg == "Mode nuit"){
				console.log("mise en place du mode sombre...");

				// update to dark mode

				setDarkMode();

				// dire a l'utilisateur qu'il est effectif

				createResponseEnvironement()

				let responseContainer = document.createElement("DIV");
				botMsgContainer.appendChild(responseContainer);
				responseContainer.className = "hesMsg";

				responseContainer.innerHTML = "Le mode sombre est désormais actif";
				responseContainer.setAttribute("id", "hesMsg");
			}else{
				createResponseEnvironement()

				let responseContainer = document.createElement("DIV");
				botMsgContainer.appendChild(responseContainer);
				responseContainer.className = "hesMsg";

				responseContainer.innerHTML = "Désolé, je n'ai pas compris...";
				responseContainer.setAttribute("id", "hesMsg");
			}
		}
		let app = new Vue({
			el: "#app",
			data: {
				user: "",
				allMsg: [],
				botAllMsg: []
			}
		})
	</script>
</body>
</html>