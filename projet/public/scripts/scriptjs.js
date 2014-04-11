function rafraichir()
 {
				if (window.XMLHttpRequest) xhr = new XMLHttpRequest();
				else if (window.ActiveXObject) xhr = new ActiveXObject('Microsoft.XMLHTTP');
				else alert('JavaScript : votre navigateur ne supporte pas les objets XMLHttpRequest...');
				xhr.open('GET',URL,true);
				xhr.onreadystatechange = ajaxReponse;
				xhr.send(null);
		}
 
		function ajaxReponse() {
				if (xhr.readyState == 4) {
						document.getElementById("test_refresh",true).innerHTML=xhr.responseText; 
						var timer=setTimeout("rafraichir()",1000); 
				}
		}