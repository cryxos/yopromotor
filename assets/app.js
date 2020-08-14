$(document).ready(function () {

	//listar departamentos
	var select01 = '';
	$.each(Ubigeo.getRegiones(), function (i, obj) {
		select01 = '<option value="' + obj.ubigeo + '" class="option" >' + obj.text + '</option>';
		$('#list_depa').append(select01);
	});

	//listar provincias por departamento
	$('#list_depa').on('change', function () {

		//limpiar los selects	
		$('#list_provincia').find('option').remove();
		$('#list_distrito').find('option').remove();

		var iddep = this.value;
		var select02 = '';

		$.each(Ubigeo.getProvincias(+iddep), function (i, obj) {
			select02 = '<option value="' + obj.ubigeo + '" class="option">' + obj.text + '</option>';
			$('#list_provincia').append(select02);
		});
		//cargar los distritos
		$('#list_provincia').trigger('change');
	});

	//listar distritos por provincia
	$('#list_provincia').on('change', function () {
		//limpiar el select de distritos		
		$('#list_distrito').find('option').remove();
		var idpro = this.value;
		var select03 = '';
		$.each(Ubigeo.getDistritos(+idpro), function (i, obj) {
			select03 = '<option value="' + obj.ubigeo + '" class="option">' + obj.text + '</option>';
			$('#list_distrito').append(select03);
		});
	});

	var select04 = '';
	$.each(Lenguaje.getLenguaje(), function (i, obj) {
		select04 = '<option value="' + obj.text + '" class="option" >' + obj.text + '</option>';
		$('#listLenguaje').append(select04);
	}); 


});