var idagl = {};

//Seccion de VARIABLES: _____________________________________________________________________________________
idagl.elementos = {};







//Seccion de ATAJOS: _____________________________________________________________________________________
var id = idagl;
var el = id.elementos;







//Seccion de Funciones Globales: _____________________________________________________________________________________
//Funcion general de consultas externas.
function db_conectE(url, datos, f, e){
	new Request.JSON({
		method:'post',
		url:url,
		secure:false,
		onError:function(er){
			if(typeOf(e) === 'function'){ e(er); }
			console.warn(er);
			alert("Ocurrio un problema al guardar su informacion, intentelo mas tarde");
			
		},
		onFailure:function(xhr){
			if(typeOf(e) === 'function'){ f(xhr); }
			console.warn(xhr);
			alert("Ocurrio un problema al guardar su informacion, intentelo mas tarde");
			
		},
		onSuccess:function(j){
			if(j){
				if(j.status == 'ok'){
					if(typeOf(f) === 'function'){ f(j); }
				} else{
					if(typeOf(e) === 'function'){ e(j); }
					console.warn(j);
					alert("Ocurrio un problema al guardar su informacion, intentelo mas tarde");
				}
			} else{
				if(typeOf(e) === 'function'){ e(j); }
				console.warn(j);
				alert("Ocurrio un problema con su consulta, intentelo mas tarde");
			}
		}
	}).post('datos='+ JSON.encode(datos));
}




function db_conect(url, datos, f, e){
	// Set up the request.
	var xhr = new XMLHttpRequest();
	
	// Open the connection.
	xhr.open('POST', url, true);
	
	// Set up a handler for when the request finishes.
	xhr.onload = function () {
		var j = JSON.parse(xhr.response);
		
		if (xhr.status === 200) {
			if(j.status != 'ok'){
				console.info('Ocurrio un error al procesar tu informacion.');
				console.info(j);
				swal('', 'Ocurrio un error al procesar tu informacion, intentelo más tarde o póngase en contacto con su área de sistemas.', 'warning');
				e(j);
			} else{
				swal('', 'Se envio su mensaje con exito', 'success');
				f(j);
			}
		} else {
			console.info('Ocurrio un error con la coneccion.');
			console.info(j);
			swal('', 'Ocurrio un error con la coneccion., intentelo más tarde o póngase en contacto con su área de sistemas.', 'warning');
			e(j);
		}
	};
	
	xhr.onerror = function(){
		console.info('Ocurrio un error con la coneccion.');
		console.info(j);
		swal('', 'Ocurrio un error con la coneccion., intentelo más tarde o póngase en contacto con su área de sistemas.', 'warning');
		e(j);
	}
	
	// Send the Data.
	var consulta = xhr.send(datos);
}


function cleanBox(){
	gb.empty();
	gbc.empty();
}




function delReg(seccion){
	if(document.id('idRegistro') !== null){
		if(document.id('idRegistro').value !== ''){
			if(confirm('¿Esta seguro que desea borrar el registro actualmente cargado que se encuentra en pantalla?')){
				window.location.replace( baseDir + 'admin/' + seccion + '/delReg/' + document.id('idRegistro').value);
			}
		} else{
			alert('No ha cargado ningun registro que se pueda borrar');
		}
	}
	
}















function reconteo(seccion, extra){
	var valores = $$(seccion);
	
	valores.each(function(s, i){
		var textExtra = '';
		if(extra && typeOf(extra) === 'array'){
			extra.each(function(e){
				var texto = s.getElement(e);
				textExtra += ' ' + texto.value;
			});
		}
		
		var conteos = s.getElements('.conteo');
		conteos.each(function(c){
			switch(c.getProperty('data-conteoval')){
				case 'text':
					c.empty().set('text', c.getProperty('data-conteovalin') + (i+1) + ' -' + textExtra + c.getProperty('data-conteovalfin'));
				break;
				
				case 'name':
					c.name = c.getProperty('data-conteovalin') + i + c.getProperty('data-conteovalfin');
				break;
			}
		});
	});
}


//funcion para activar botones de borrado para images u otro proceso que se requira actiar desde un inicio.
function btnDelImg(seccion){
	if(confirm('¿Confirma borrar la imagen?')){
		var clone = $$('.hiden.boxClones > [data-cloneinfo="'+this.idago.cloneType+'"]');
		this.empty();
		this.grab(clone[0].clone());
		
		reconteo('#'+seccion+' .registro', []);
	}
}

function activeImgBbox(seccion){
	//var secciones = $$('#'+seccion+' .registro .cleanBox');
	var secciones = $$('#'+seccion+' .cleanBox');
	secciones.each(function(s){
		var btnBorrar = s.getElements('.imgDel');
		btnBorrar.each(function(b){
			s.idago = {};
			s.idago.cloneType = s.getProperty('data-clonetype');
			b.addEvent('click', function(){
				btnDelImg.call(s, seccion);
			});
		});
	});
}

function removeInputIMG(bloque, cleanBox, clone, imagen, tipo, seccion, item, carpeta){
	var box = bloque.getElement(cleanBox);
	box.empty();
	
	var clone = $$('.hiden.boxClones > [data-cloneinfo="'+clone+'"]');
	clone = clone[0].clone();
	var img = clone.getElement('img');
	img.src = baseDir + 'assets/public/img/' + carpeta + '/' + imagen;
	var hiden = clone.getElement('input[type="hidden"]');
	hiden.value = imagen;
	hiden.setProperty('data-conteovalfin', '_'+tipo);
	hiden.setProperty('data-conteovalin', item);
	var nombre = clone.getElement('.name span');
	nombre.set('text', imagen);
	var btnDel = clone.getElement('.imgDel');
	
	box.idago = {};
	box.idago.cloneType = tipo;
		
	btnDel.addEvent('click', function(){
		btnDelImg.call(box, seccion);
	});
	
	box.grab(clone);
}



// 	Funciones para activar los botones de clones de registros
function activar(copia, seccion, padre,  a){
	var btn_menos = copia.getElement(".menos");
	btn_menos.addEvent('click', function(){
		btnMenos.call(padre, seccion, a);
	});
	
	reconteo('#'+seccion+' .registro', a);
}

function btnMas(name, box, seccion, callBack){
	var clone = $$('.hiden.boxClones > [data-cloneinfo="'+name+'"]');
	clone = clone[0].clone();
	box.adopt([clone]);
	activar(clone, seccion, clone, callBack.a);
	
	if(callBack.f && typeOf(callBack.f) === 'function'){
		callBack.f(callBack.o, clone);
	}
}

function btnMenos(seccion, a){
	this.destroy();
	reconteo('#'+seccion+' .registro', a);
}



function addListItem(lista, item){
	lista.addItems(item);
}



function runListaReg(seccion){
	var btnLista = document.id('btnListaReg');
	var lista = document.id('listaRegistros');
	btnLista.addEvent('click', function(){
		window.location.href = baseDir+'admin/'+seccion+'/registro/' + lista.value;
	});
}

















// Pagina Home
function home_inicio(){
	//Desactivar el formulario para cobtrolar el envio
	document.id('formulario').addEvent('submit', function(e){
		e.preventDefault();
		e.stop();
		
		validar();
	});	
	
	
	
	//funciones para validar y enviar el formulario
	//validar
	function validar(){
		
		function fin(j){
			//remplazar los input por imagenes cargadas en SERVICIOS
			
			var contenedor = $$('#servicios');
			//remplazar los input por imagenes cargadas el fondo de los registros
			if(j.valores.base.video_portada[0] !== 'nop' && j.valores.base.video_portada[0] !== ''){
				removeInputIMG(contenedor[0], '.video_portada.cleanBox', 'imgBlock', j.valores.base.video_portada[0],  'video_portada', 'servicios', 'base', 'servicios');
				var hiden = $$('.video_portada.cleanBox input[type="hidden"]');
				hiden[0].name = hiden[0].getProperty('data-conteovalin') + '0' + hiden[0].getProperty('data-conteovalfin');
			}
			
			var secciones = $$('#servicios .registro');
			secciones.each(function(s, i){
				if(j.valores.servicio.icono[i] !== 'nop' && j.valores.servicio.icono[i] !== ''){
					removeInputIMG(s, '.servicio_icono .cleanBox', 'imgBlock', j.valores.servicio.icono[i],  'icono', 'servicios', 'servicio', 'servicios');
				}
				if(j.valores.servicio.foto[i] !== 'nop' && j.valores.servicio.foto[i] !== ''){
					removeInputIMG(s, '.servicio_foto .cleanBox', 'imgBlock', j.valores.servicio.foto[i],  'foto', 'servicios', 'servicio', 'servicios');
				}
			});
			reconteo('#servicios .registro', ['.servicio_titulo input']);
			
			
			//remplazar los input por imagenes cargadas en Clientes
			var secciones = $$('#clientes .registro');
			secciones.each(function(s, i){
				if(j.valores.cliente.logo[i] !== 'nop' && j.valores.cliente.logo[i] !== ''){
					removeInputIMG(s, '.cleanBox', 'imgBlock', j.valores.cliente.logo[i],  'logo', 'clientes', 'cliente', 'clientes');
				}
			});
			reconteo('#clientes .registro', []);
			
			
			//remplazar los input por imagenes cargadas en Portafolios
			var secciones = $$('#portafolios .registro');
			secciones.each(function(s, i){
				if(j.valores.portafolio.fondo[i] !== 'nop' && j.valores.portafolio.fondo[i] !== ''){
					removeInputIMG(s, '.portafolio_fondo .cleanBox', 'imgBlock', j.valores.portafolio.fondo[i],  'fondo', 'portafolios', 'portafolio', 'portafolios');
				}
			});
			reconteo('#portafolios .registro', ['.portafolio_enlace input']);
			
			
			//remplazar los input por imagenes cargadas en Nosotros
			var secciones = $$('#nosotros .registro');
			secciones.each(function(s, i){
				if(j.valores.team.fondo[i] !== 'nop' && j.valores.team.fondo[i] !== ''){
					removeInputIMG(s, '.team_fondo .cleanBox', 'imgBlock', j.valores.team.fondo[i],  'fondo', 'nosotros', 'team', 'nosotros');
				}
			});
			reconteo('#nosotros .registro', ['.team_nombre input', '.team_apellido input']);
		}
		
		function error(j){
			
		}
		
		var datos = new FormData(document.id('formulario'));
		db_conect(window.location.pathname+'/do_upload', datos, fin, error);
		
	}
	
	
	
	
	
// 	Codigo para iniciar la seccion SERVICIOS
	var listaNosotros = new Sortables('#servicios .boxDrag', {
		clone:true,
		onStart: function(e, c){
			c.addClass('cloneDrag');
		},
		onComplete: function(){
			var padre = $$();
			reconteo('#servicios .registro', ['.servicio_titulo input']);
		}
	});
	var nosotrosAccordion = new Fx.Accordion($$('#servicios .boxDrag .boxShow'), $$('#servicios .boxDrag .boxHide'), {
	    display: -1,
	    alwaysHide: true,
	    keepOpen: true
	});
	
	activeImgBbox('servicios');
	document.id('servicio_clonemas').addEvent('click', function(){
		btnMas('formServicio', document.id('servicios').getElement('.boxRepeat'), 'servicios', {f:addListItem, o:listaNosotros, a:['.servicio_titulo input']} );
	});
	
	var allBTNDel = $$('#servicios .registro');
	allBTNDel.each(function(b){
		var btn_menos = b.getElement(".menos");
		btn_menos.addEvent('click', function(){
			btnMenos.call(b, 'servicios', ['.servicio_titulo input']);
		});
	});
	
	
	




// 	Codigo para iniciar la seccion CLIENTES	
	var listaClientes = new Sortables('#clientes .boxDrag', {
		clone:true,
		onStart: function(e, c){
			c.addClass('cloneDrag');
		},
		onComplete: function(){
			reconteo('#clientes .registro', []);
		}
	});
	
	activeImgBbox('clientes');
	document.id('clientes_clonemas').addEvent('click', function(){
		btnMas('logo', document.id('clientes').getElement('.boxRepeat'), 'clientes', {f:addListItem, o:listaClientes, a:[]});
	});
	
	var allBTNDel = $$('#clientes .registro');
	allBTNDel.each(function(b){
		var btn_menos = b.getElement(".menos");
		btn_menos.addEvent('click', function(){
			btnMenos.call(b, 'clientes', []);
		});
	});
	
	
	
	
	
// 	Codigo para iniciar la seccion PORTAFOLIOS	
	var listaPortafolios = new Sortables('#portafolios .boxDrag', {
		clone:true,
		onStart: function(e, c){
			c.addClass('cloneDrag');
		},
		onComplete: function(){
			reconteo('#portafolios .registro', ['.portafolio_enlace input']);
		}
	});
	var portafoliosAccordion = new Fx.Accordion($$('#portafolios .boxDrag .boxShow'), $$('#portafolios .boxDrag .boxHide'), {
	    display: -1,
	    alwaysHide: true,
	    keepOpen: true
	});
	
	activeImgBbox('portafolios');
	document.id('portafolios_clonemas').addEvent('click', function(){
		btnMas('formPortafolio', document.id('portafolios').getElement('.boxRepeat'), 'portafolios', {f:addListItem, o:listaPortafolios, a:['.portafolio_enlace input']});
	});
	
	var allBTNDel = $$('#portafolios .registro');
	allBTNDel.each(function(b){
		var btn_menos = b.getElement(".menos");
		btn_menos.addEvent('click', function(){
			btnMenos.call(b, 'portafolios', ['.portafolio_enlace input']);
		});
	});
	
	
	
	
	
// 	Codigo para iniciar la seccion NOSOTROS	
	var listaPortafolios = new Sortables('#nosotros .boxDrag', {
		clone:true,
		onStart: function(e, c){
			c.addClass('cloneDrag');
		},
		onComplete: function(){
			reconteo('#nosotros .registro', ['.team_nombre input', '.team_apellido input']);
		}
	});
	var portafoliosAccordion = new Fx.Accordion($$('#nosotros .boxDrag .boxShow'), $$('#nosotros .boxDrag .boxHide'), {
	    display: -1,
	    alwaysHide: true,
	    keepOpen: true
	});
	
	activeImgBbox('nosotros');
	document.id('team_clonemas').addEvent('click', function(){
		btnMas('formNosotros', document.id('nosotros').getElement('.boxRepeat'), 'nosotros', {f:addListItem, o:listaPortafolios, a:['.team_nombre input', '.team_apellido input']});
	});
	
	var allBTNDel = $$('#nosotros .registro');
	allBTNDel.each(function(b){
		var btn_menos = b.getElement(".menos");
		btn_menos.addEvent('click', function(){
			btnMenos.call(b, 'nosotros', ['.team_nombre input', '.team_apellido input']);
		});
	});

	

}











// Pagina General
function general_inicio(){
	//Desactivar el formulario para cobtrolar el envio
	document.id('formulario').addEvent('submit', function(e){
		e.preventDefault();
		e.stop();
		
		validar();
	});	
	
	
	
	//funciones para validar y enviar el formulario
	//validar
	function validar(){
		
		function fin(j){
			//remplazar los input por imagenes cargadas en Nosotros
			var secciones = $$('#general .registro');
			secciones.each(function(s, i){
				if(j.valores.general.fondo[i] !== 'nop' && j.valores.general.fondo[i] !== ''){
					removeInputIMG(s, '.body_fondo .cleanBox', 'imgBlock', j.valores.general.fondo[i],  'fondo', 'general', 'general', 'general');
				}
			});
			reconteo('#nosotros .registro', []);
		}
		
		function error(j){
			
		}
		
		var datos = new FormData(document.id('formulario'));
		db_conect(window.location.pathname+'/do_upload', datos, fin, error);
		
	}
	
	
	
	
	
// 	Codigo para iniciar la seccion GENERAL	
	activeImgBbox('general');
}












// Pagina Portafolios
function portafolios_inicio(){
	//Desactivar el formulario para cobtrolar el envio
	document.id('formulario').addEvent('submit', function(e){
		e.preventDefault();
		e.stop();
		
		validar();
	});	
	
	
	
	//funciones para validar y enviar el formulario
	//validar
	function validar(){
		
		function fin(j){
			//Colocar el ID del. nuevo registro en el Hiden para que se pueda actualizar el mismo registro
			if(document.id('idRegistro').value === ''){
				document.id('idRegistro').value = j.valores.registro.id;
			}
			
			var contenedor = $$('#portafolios .contenedor');
			//remplazar los input por imagenes cargadas el fondo de los registros
			if(j.valores.base.video_portada[0] !== 'nop' && j.valores.base.video_portada[0] !== ''){
				removeInputIMG(contenedor[0], '.video_portada.cleanBox', 'imgBlock', j.valores.base.video_portada[0],  'video_portada', 'portafolios', 'base', 'portafolios/registros');
				var hiden = $$('.video_portada.cleanBox input[type="hidden"]');
				hiden[0].name = hiden[0].getProperty('data-conteovalin') + '0' + hiden[0].getProperty('data-conteovalfin');
			}
			
			//remplazar los input por imagenes cargadas el fondo de los registros
			if(j.valores.registro.fondo[0] !== 'nop' && j.valores.registro.fondo[0] !== ''){
				removeInputIMG(contenedor[0], '.registro_fondo.cleanBox', 'imgBlock', j.valores.registro.fondo[0],  'fondo', 'portafolios', 'registro', 'portafolios/registros');
				var hiden = $$('.registro_fondo.cleanBox input[type="hidden"]');
				hiden[0].name = hiden[0].getProperty('data-conteovalin') + '0' + hiden[0].getProperty('data-conteovalfin');
			}
			
			//remplazar los input por imagenes cargadas en Registros Bloques
			var secciones = $$('#portafolios .registro');
			secciones.each(function(s, i){
				if(j.valores.bloque.fondo[i] !== 'nop' && j.valores.bloque.fondo[i] !== ''){
					removeInputIMG(s, '.bloque_fondo .cleanBox', 'imgBlock', j.valores.bloque.fondo[i],  'fondo', 'portafolios', 'bloque', 'portafolios/registros');
				}
			});
			reconteo('#portafolios .registro', []);
			
			
			
			//remplazar los input por imagenes cargadas en informes
			var secciones = $$('#informes .registro');
			secciones.each(function(s, i){
				if(j.valores.informe.icono[i] !== 'nop' && j.valores.informe.icono[i] !== ''){
					removeInputIMG(s, '.informe_icono .cleanBox', 'imgBlock', j.valores.informe.icono[i],  'icono', 'informes', 'informe', 'portafolios/registros');
				}
			});
			reconteo('#informes .registro', []);
			
			
			//remplazar los input por imagenes cargadas en Clientes
			var secciones = $$('#clientes .registro');
			secciones.each(function(s, i){
				if(j.valores.cliente.logo[i] !== 'nop' && j.valores.cliente.logo[i] !== ''){
					removeInputIMG(s, '.cliente_logo.cleanBox', 'imgBlock', j.valores.cliente.logo[i],  'logo', 'clientes', 'cliente', 'portafolios/registros');
				}
				if(j.valores.cliente.fondo[i] !== 'nop' && j.valores.cliente.fondo[i] !== ''){
					removeInputIMG(s, '.cliente_fondo.cleanBox', 'imgBlock', j.valores.cliente.fondo[i],  'fondo', 'clientes', 'cliente', 'portafolios/registros');
				}
			});
			reconteo('#clientes .registro', []);
			
			
		}
		
		function error(j){
			
		}
		
		var texts = $$('#portafolios textarea');
		texts.each(function(t){
			var valor = t.value;
			t.value = valor.replace(/\"/gi, '\'');
		});
			
		var datos = new FormData(document.id('formulario'));
		db_conect(baseDir+'/admin/portafolios/do_upload', datos, fin, error);
		
	}
	
	
	
	
		
	
// 	Codigo para iniciar la seccion PORTAFOLIOS	
	activeImgBbox('portafolios');
	document.id('bloque_clonemas').addEvent('click', function(){
		btnMas('formRegistro', document.id('portafolios').getElement('.boxRepeat'), 'portafolios', {});
	});

	var allBTNDel = $$('#portafolios .registro');
	allBTNDel.each(function(b){
		var btn_menos = b.getElement(".menos");
		btn_menos.addEvent('click', function(){
			btnMenos.call(b, 'portafolios');
		});
	});
	




// 	Codigo para iniciar la seccion informes
	activeImgBbox('informes');
	document.id('informe_clonemas').addEvent('click', function(){
		btnMas('formInforme', document.id('informes').getElement('.boxRepeat'), 'informes',  {});
	});
	
	var allBTNDel = $$('#informes .registro');
	allBTNDel.each(function(b){
		var btn_menos = b.getElement(".menos");
		btn_menos.addEvent('click', function(){
			btnMenos.call(b, 'informes');
		});
	});
	




// 	Codigo para iniciar la seccion CLIENTES	
	activeImgBbox('clientes');
	document.id('clientes_clonemas').addEvent('click', function(){
		btnMas('logo', document.id('clientes').getElement('.boxRepeat'), 'clientes', {});
	});
	
	var allBTNDel = $$('#clientes .registro');
	allBTNDel.each(function(b){
		var btn_menos = b.getElement(".menos");
		btn_menos.addEvent('click', function(){
			btnMenos.call(b, 'clientes');
		});
	});


		


}














// Pagina servicios
function servicios_inicio(){
	//Desactivar el formulario para cobtrolar el envio
	document.id('formulario').addEvent('submit', function(e){
		e.preventDefault();
		e.stop();
		
		validar();
	});	
	
	
	
	//funciones para validar y enviar el formulario
	//validar
	function validar(){
		
		function fin(j){
			//Colocar el ID del. nuevo registro en el Hiden para que se pueda actualizar el mismo registro
			if(document.id('idRegistro').value === ''){
				document.id('idRegistro').value = j.valores.registro.id;
			}
			
			
			var contenedor = $$('#servicios .contenedor');
			//remplazar los input por imagenes cargadas el fondo de los registros
			if(j.valores.base.video_portada[0] !== 'nop' && j.valores.base.video_portada[0] !== ''){
				removeInputIMG(contenedor[0], '.video_portada.cleanBox', 'imgBlock', j.valores.base.video_portada[0],  'video_portada', 'servicios', 'base', 'servicios/registros');
				var hiden = $$('.video_portada.cleanBox input[type="hidden"]');
				hiden[0].name = hiden[0].getProperty('data-conteovalin') + '0' + hiden[0].getProperty('data-conteovalfin');
			}
			
			
			//remplazar los input por imagenes cargadas en Registros Bloques
			var secciones = $$('#servicios .registro');
			secciones.each(function(s, i){
				if(j.valores.bloque.fondo[i] !== 'nop' && j.valores.bloque.fondo[i] !== ''){
					removeInputIMG(s, '.bloque_fondo .cleanBox', 'imgBlock', j.valores.bloque.fondo[i],  'fondo', 'servicios', 'bloque', 'servicios/registros');
				}
			});
			reconteo('#servicios .registro', []);
			
			
			//remplazar los input por imagenes cargadas en Galeria
			var secciones = $$('#galeria .registro');
			secciones.each(function(s, i){
				if(j.valores.galeria.foto[i] !== 'nop' && j.valores.galeria.foto[i] !== ''){
					removeInputIMG(s, '.galeria_foto.cleanBox', 'imgBlock', j.valores.galeria.foto[i],  'foto', 'servicios', 'galeria', 'servicios/registros');
				}
			});
			reconteo('#galeria .registro', []);
			
		}
		
		function error(j){
			
		}
		
		var texts = $$('#servicios textarea');
		texts.each(function(t){
			var valor = t.value;
			t.value = valor.replace(/\"/gi, '\'');
		});
			
		var datos = new FormData(document.id('formulario'));
		db_conect(baseDir+'/admin/servicios/do_upload', datos, fin, error);
		
	}
	
	
	
	
		
	
// 	Codigo para iniciar la seccion servicios
	activeImgBbox('servicios');
	document.id('bloque_clonemas').addEvent('click', function(){
		btnMas('formRegistro', document.id('servicios').getElement('.boxRepeat'), 'servicios', {});
	});

	var allBTNDel = $$('#servicios .registro');
	allBTNDel.each(function(b){
		var btn_menos = b.getElement(".menos");
		btn_menos.addEvent('click', function(){
			btnMenos.call(b, 'servicios');
		});
	});
	
	
	
	
	
// 	Codigo para iniciar la seccion Galeria	
	activeImgBbox('galeria');
	document.id('galeria_clonemas').addEvent('click', function(){
		btnMas('foto', document.id('galeria').getElement('.boxRepeat'), 'galeria', {});
	});
	
	var allBTNDel = $$('#galeria .registro');
	allBTNDel.each(function(b){
		var btn_menos = b.getElement(".menos");
		btn_menos.addEvent('click', function(){
			btnMenos.call(b, 'galeria');
		});
	});
	
	


}















// Pagina Vacantes
function vacantes_inicio(){
	//Desactivar el formulario para cobtrolar el envio
	document.id('formulario').addEvent('submit', function(e){
		e.preventDefault();
		e.stop();
		
		validar();
	});	
	
	
	
	//funciones para validar y enviar el formulario
	//validar
	function validar(){
		
		function fin(j){
			//remplazar los input por imagenes cargadas en vacantes
			
			var contenedor = $$('#vacantes .contenedor');
			//remplazar los input por imagenes cargadas el fondo de los registros
			if(j.valores.base.video_portada[0] !== 'nop' && j.valores.base.video_portada[0] !== ''){
				removeInputIMG(contenedor[0], '.video_portada.cleanBox', 'imgBlock', j.valores.base.video_portada[0],  'video_portada', 'servicios', 'base', 'vacantes');
				var hiden = $$('.video_portada.cleanBox input[type="hidden"]');
				hiden[0].name = hiden[0].getProperty('data-conteovalin') + '0' + hiden[0].getProperty('data-conteovalfin');
			}
			
			
			var secciones = $$('#vacantes .registro');
			secciones.each(function(s, i){
				if(j.valores.vacante.foto[i] !== 'nop' && j.valores.vacante.foto[i] !== ''){
					removeInputIMG(s, '.vacante_foto .cleanBox', 'imgBlock', j.valores.vacante.foto[i],  'foto', 'vacantes', 'vacante', 'vacantes');
				}
			});
			reconteo('#vacantes .registro', []);
			
		}
		
		function error(j){
			
		}
		
		var datos = new FormData(document.id('formulario'));
		db_conect(window.location.pathname+'/do_upload', datos, fin, error);
		
	}
	
	
	
	
	
// 	Codigo para iniciar la seccion vacantes
	activeImgBbox('vacantes');
	document.id('vacante_clonemas').addEvent('click', function(){
		btnMas('formvacante', document.id('vacantes').getElement('.boxRepeat'), 'vacantes', {});
	});
	
	var allBTNDel = $$('#vacantes .registro');
	allBTNDel.each(function(b){
		var btn_menos = b.getElement(".menos");
		btn_menos.addEvent('click', function(){
			btnMenos.call(b, 'vacantes');
		});
	});
	


}


























//--- Eventos a ejecutar cuando el DOM este listo _____________________________________________________________________________________
window.addEvent('domready', function(){
	if(typeof pageActual !== 'undefined'){
		if(pageActual !== ''){
			switch(pageActual){
				case 'home':
					home_inicio();
				break;
				
				case 'general':
					general_inicio();
				break;
				
				case 'registro_portafolios':
					portafolios_inicio();
					runListaReg('portafolios');
				break;
				
				case 'registro_servicios':
					servicios_inicio();
					runListaReg('servicios');
				break;
				
				case 'bolsa_trabajo':
					vacantes_inicio();
				break;
			}
		}
	}
	
});


//--- Eventos a ejecutar cuando la pagina este cargada _____________________________________________________________________________________
window.addEvent('load', function(){
	
});








