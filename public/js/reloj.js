window.onload = function(){

	setInterval(function(){

		var now= new Date();

		var today = now.toDateString();
		var time = now.toLocaleTimeString()

		var dia = document.querySelector('.diaSemana')
		var hora = document.querySelector('.hora')

		dia.innerHTML = today
		hora.innerHTML = time
	},1000)

}
	
