
window.onload = function(){

	axios.get('/get_segundos')
	.then(res => {
		//console.log(res.data)
		var segundos = res.data
		cronometro(segundos);
	})
	.catch(err => {
		console.log(err)
	})


}

function cronometro(segundos){
	const segundosView = document.querySelector(".segundos")

	segundosView.innerHTML = segundos

		tiempo = setInterval( function(){

			segundos--;

			if(segundos <= 5){
				segundosView.style.color = "red";
				segundosView.style.fontSize  = "50px";
				segundosView.style.fontWeight  = "bold";
			}

			if(segundos <= 0){

				window.location.href = '/';

				clearInterval(tiempo);
			}


			segundosView.innerHTML = segundos;
		
			
			
		},1000);
}