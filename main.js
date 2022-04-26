$(document).ready(() => {
	$('#documentacao').on('click', () => {
		//$('#pagina').load('documentacao.html');

		/*
		$.get('documentacao.html', data => { 
			$('#pagina').html(data);
		});
		*/
		
		$.post('documentacao.html', data => { 
			$('#pagina').html(data);
		});
	});

	$('#suporte').on('click', () => {
		//$('#pagina').load('suporte.html');

		/*
		$.get('suporte.html', data => { 
			$('#pagina').html(data);
		})
		*/

		$.post('suporte.html', data => { 
			$('#pagina').html(data);
		});
	});

	$('#competencia').on('change', e => {
		let competencia = $(e.target).val();
		
		$.ajax({ // método, url, dados, sucesso, erro
			type: 'GET',
			url: 'app.php',
			data: `competencia=${competencia}`, // x-www-form-urlencoded
			dataType: 'json',
			success: dados => {
				$('#numero-vendas').html(dados.numero_vendas);
				$('#total-vendas').html(`R&dollar; ${dados.total_vendas}`);
			},
			error: erro => { console.log(erro); }
		});
	});
});