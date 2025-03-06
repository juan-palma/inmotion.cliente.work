var idaglGV = {};
var idasc = {};

//Seccion de VARIABLES: _____________________________________________________________________________________
idaglGV.elementos = {};
idaglGV.validar = {};



// Variable para dar de alta la lista de validaciones en el archivo del usuario.
//idaglGV.validar[n].lista = [];
//var idavlist = id.validar.lista;




function idaVariables(o){
	var n = o.formulario.id;
	var vd = idaglGV.validar['"'+ n +'"'] = {};
	
	vd.lista = o.lista;
	vd.campos = [];
	vd.validos = [];
	vd.form = {};
	vd.form.parametros = o;
	vd.form.elementos = {};
	
	vd.form.el = o.formulario;
	
	//Seccion de ATAJOS: _____________________________________________________________________________________
	var sc = idasc[n] = {};
	
	idasc[n].lista = vd.lista;
	idasc[n].form = vd.form;
	idasc[n].param = vd.form.parametros;
	idasc[n].vcampos = vd.campos;
	
	
}














/*
var id = idaglGV;
//var el = id.elementos;

// De validacion 
var idavlist = id.validar.lista;
var iform = id.validar.form;
var lisform = id.validar.form.parametros;
var vcampos = id.validar.campos;
*/





//Valores Generales y mensajes por default de diferentes secciones.

var idaglGV_def = {
	msn: {
		validar:{
			nulo: 'Este campo es obligatorio, no puede ir vacío,\n\nVerifique por favor.',
			texto: 'Este campo únicamente admite caracteres Alfanuméricos\n\nVerifique por favor.',
			telefono: 'El numero telefónico que introdujo, no es correcto\n\nVerifique por favor.',
			correo: 'El correo que introdujo no es un correo valido\n\nVerifique por favor.',
			limite:{
				estandar:'La cantidad de caracteres es incorrecto.',
				rango:'El valor que introdujo esta fuera del rango permitido.',
				maximo:'El valor que introdujo supera el rango de caracteres permitidos.',
				minimo:'El valor que introdujo es inferior el rango de caracteres permitidos.',
				unico:'El valor que introdujo no cuenta con la longitud adecuada.'
			},
			send:{
				novalid:'Alguno de los campos tiene un error o está incompleto.\n\nFavor de verificar su información.',
				nosend:'',
				ready:''
			}
		}
	},
	exp_reg: {
		texto:{
			exp: /^[\s]\s*|[^\r\n\w\s\xD0\xD1\x21\xA1\xC1\xC9\xCD\xD3\xDA\xF1\xE1\xE9\xED\xF3\xFA\x23\x24\x25\x2D\x27\x28\x29\x2C\x2F\x3A\x40\x5F\x60.]/,
			condicion: false
		},
		numero: {
			exp:/[^\d\s.]/,
			condicion: false
		},
		telefono: {
			exp: /[^\d\s\x28\x29-]/,
			condicion: false
		},
		correo: {
			exp: /^[_a-zA-Z0-9-]+(\.[_a-zA-Z0-9-]+)*@[a-zA-Z0-9-]+(\.[a-zA-Z0-9-]+)*(\.[a-zA-Z]{2,6})$/,
			condicion: true
		},
		pass: {
			exp: /^[\s]\s*|[\s]\s+|[^\w\s\xF1.-]/,
			condicion: false
		},
		moneda: {
			exp: /[^\d.]/,
			condicion: false
		},
		nulo: {
			exp:/^[\s]\s*/,
			condicion: true
		}
	},
	parametros: {
		autotexto: {
			por: 'name'
		},
		valid:{
			retraso: 50,
			validar:{
				por:'name'
			},
			funciones:{
				por:'name'
			},
			error:{
				por:'name'
			},
			alerta:{
				status: true,
				por:'name'
			},
			nulo:{
				status: false,
				por: 'name'
			},
			limite:{
				por:'name',
				invertir:false
			},
			color:{
				bueno: false,
				malo: true
			}
		}
	}
};




// funcion para aleatoreos unicos UUDI
//function b(a){return a?(a^Math.random()*16>>a/4).toString(16):([1e7]+-1e3+-4e3+-8e3+-1e11).replace(/[108]/g,b)}



//*** Funcion para investigar si el valor es un objeto o un texto *****************  *****************  *****************  *****************
function ida_tipo(el){
	var element;
	if(typeOf(el) === 'element' || typeOf(el) === 'elements'){
		element = el;
	} else if(typeOf(el) === 'string'){
		if(document.id(el)){
			element = document.id(el);
		} else{
			console.warn('No se encuentra un elemento con el valor introducido');
			return false;
		}
	} else{
		console.warn('No es un objeto valido el que envía en la función');
		return false;
	}
	
	return element;
}








// Funciones de validacion. _____________________________________________________________________________________
function reset(){
	if(this.idago.multivalidRun >= this.idago.validNum){
		this.idago.multivalidRun = 0;
		this.idago.multivalid = true;
	} else{
		this.idago.multivalidRun++;
	}
}

function idaFV_noaplica(f, def){
	var ob = this;
	var por = def;
	if(f.por){ por = f.por; }
	
	var aplica = false;
	
	if(typeOf(f.valores) !== 'object'){
		if(typeOf(f.valores) !== 'array'){
			f.valores = [f.valores];
		}
			
		aplica = f.valores.some(function(item){
			return item == ob[por];
		});
	} else{
		if(f.valores[this[por]]){
			aplica = true;
		}
	}
	
	return !aplica;
}

function idaFV_nulo(o){
	var nulo = idaglGV_def.parametros.valid.nulo.status;
	var msn = idaglGV_def.msn.validar.nulo;
	
	try{
		if(o.nulo){
			if(o.nulo.status){ nulo = o.nulo.status; }
			
			if(typeOf(o.nulo.valores) === 'object'){
				var por = idaglGV_def.parametros.valid.nulo.por;
				if(o.nulo.por){ por = o.nulo.por; }
				if(o.nulo.valores[this[por]]){
					nulo = o.nulo.valores[this[por]];
				}
			}
			
			if(o.nulo.error){ msn = o.nulo.error; }

		}
	}
	catch(e){ console.warn(e); }
		
	if(this.value === '' && nulo === true){
		return {nulo: 'valido'};
	} else if(this.value === '' && nulo === false){
		return {nulo:'invalido', msn:msn};
	} else{
		return {nulo:'no_aplica'};
	}
	
}





function idaFV_expresiones(v){
	var ex = idaglGV_def.exp_reg[v.parametro];
	var resultado = ex.exp.test(this.value);
	var msn = '';
	
	if(resultado !== ex.condicion){
		if(!v.error || v.error === ''){
			v.error = idaglGV_def.msn.validar[v.parametro];
		}
		
		msn = v.error;
		
		if(typeOf(v.errorpersonal) === 'object'){
			var por = idaglGV_def.parametros.valid.error.por;
			if(v.errorpersonal.por){ por = v.errorpersonal.por; }
			if(v.errorpersonal.valores[this[por]]){
				msn = v.errorpersonal.valores[this[por]];
			}
		}
		
		return {valor:false, msn:msn};
	} else{
		return {valor: true};	
	}
}


function idaFV_limite(v){
	var msn = idaglGV_def.msn.validar.limite.estandar;
	
	function msnF(de){
		var msn = idaglGV_def.msn.validar.limite[de];
		if(v.error){
			msn = v.error;
		}
		
		if(typeOf(v.errorpersonal) === 'object'){
			var por = idaglGV_def.parametros.valid.limite.por;
			if(v.errorpersonal.por){ por = v.errorpersonal.por; }
			if(v.errorpersonal.valores[this[por]]){
				msn = v.errorpersonal.valores[this[por]];
			}
		}
		return msn;
	}
		
	if(v.valor.min && v.valor.max){
		msn = msnF.bind(this, 'rango').apply();
		if(this.value.length <= v.valor.max && this.value.length >= v.valor.min){ return {valor: true}; } else{ return {valor:false, msn:msn}; }
	} else if(v.valor.min){
		msn = msnF.bind(this, 'minimo').apply();
		if(this.value.length < v.valor.min){ return {valor:false, msn:msn}; } else{ return {valor: true}; }
	} else if(v.valor.max){
		msn = msnF.bind(this, 'maximo').apply();
		if(this.value.length > v.valor.max){ return {valor:false, msn:msn}; } else{ return {valor: true}; }
	} else if(v.valor.unico){
		msn = msnF.bind(this, 'unico').apply();
		
		var invertir = idaglGV_def.parametros.valid.limite.invertir;
		if(v.valor.invertir){ invertir = v.valor.invertir; }
		
			
		if(invertir){
			if(this.value.length == v.valor.unico){ return {valor: true}; } else{ return {valor:false, msn:msn}; }
		} else{
			if(this.value.length == v.valor.unico){ return {valor:false, msn:msn}; } else{ return {valor: true}; }
		}
	}
}









// Funciones _____________________________________________________________________________________

function idaF_mayusculas(){
	this.addEvent('change', function(){
		this.value = this.value.toUpperCase();
	});
}


function idaF_autotexto(f){
	var autotexto = '';
	
	if(f.valor || f.valor !== ''){ autotexto = f.valor; }
	
	if(f.soloen){
		var por = idaglGV_def.parametros.valid.funciones.por;
		if(f.soloen.por){ por = f.soloen.por; }
		autotexto = f.soloen.valores[this[por]];
	}
	
	this.idago.autotexto = autotexto;
	
	this.addEvents({
		'focus': function(){
			if(this.value == this.idago.autotexto){
				this.value = "";
				this.removeClass('ida_input_text_default');
			}
		},
		'blur': function(){
			if(this.value === ""){
				this.addClass('ida_input_text_default');
				(function(){
					this.value = this.idago.autotexto;
				}).delay(((this.validNum+1) * idaglGV_def.parametros.valid.retraso), this);
			}
		}
	});
	
	if(!this.autofocus){
		(function(){
			this.focus();
			this.blur();
		}).delay(idaglGV_def.parametros.valid.retraso, this);
	}
	
}


function idaF_soloalfabetico(){
	this.addEvent('keydown', function(event){
		var expreg = /[^a-zA-Z]/g;
		if(expreg.test(event.key)){
			return false;
		}
	});
}


function idaF_solonumerico(){
	this.addEvent('keydown', function(event){
		if(event.shift === true || event.alt === true || event.control === true){ return false; }
		var expreg = /[^\d]/;
		if(expreg.test(event.key) && event.code != 9 && event.code != 8 && event.code != 127 && event.code != 37 && event.code != 39 && event.code != 46){
			return false;
		}
	});
}














// Controladores y ejecutores _____________________________________________________________________________________

function idaV_validar(){
	var o = {
		ob:this,
		p:''
	};
	
	o = Object.append(o, arguments[0]);
	o.ob = ida_tipo(o.ob);
		
	if(!o.ob.idago.multivalid){
		reset.bind(o.ob).apply();
		return false;
	}
	
	if(!o.p.validar){ return false; }
	
	
	if(typeOf(o.p.validar) !== 'array' && typeOf(o.p.validar) === 'object'){
		o.p.validar = [o.p.validar];
	} else if(typeOf(o.p.validar) !== 'array' && typeOf(o.f) !== 'object') { 
		console.warn('El valor para validaciones de alguna de las listas de validar que el usuario coloco, no es correcta.');
		return false;
	}
	
	var govalid = true;
	var absoluto = true;
	var msn = "";
	
	try{
		var nuloRes = idaFV_nulo.bind(o.ob, o.p).apply();
				
		if(nuloRes.nulo === 'valido'){
			govalid = false;
		} else if(nuloRes.nulo === 'invalido'){
			govalid = false;
			absoluto = false;
			msn = nuloRes.msn;
		}
	}
	catch(e){ console.warn(e); }

	if(govalid === true){
		o.p.validar.each(function(v){
			if(typeOf(v) !== 'object'){ console.warn('El valor de las validaciones de alguna de las listas de validación que el usuario coloco, no es valido.'); return false; }
			
			if(typeOf(v.soloen) === 'object'){
				if(idaFV_noaplica.bind(o.ob, v.soloen, idaglGV_def.parametros.valid.validar.por).apply()){
					return false;
				}
			}
			
			var res = '';
			switch(v.parametro){
				case 'texto':
				case 'numero':
				case 'telefono':
				case 'correo':
				case 'pass':
				case 'moneda':
					res = idaFV_expresiones.bind(o.ob, v).apply();
					if(!res.valor){ absoluto = false; msn += res.msn+'\n'; }
				break;
				
				case 'limite':
					res = idaFV_limite.bind(o.ob, v).apply();
					if(!res.valor){ absoluto = false; msn += res.msn+'\n'; }
				break;
			}
		});
	}
	
	
	// Saber si se alarta el error de este campo al usuario
	var alerta = idaglGV_def.parametros.valid.alerta.status;
	var Fcustom = false;
	
	try{
		if(o.p.alerta){
			if(o.p.alerta.status){ alerta = o.p.alerta.status; }
			
			if(o.p.alerta.valores && typeOf(o.p.alerta.valores) === 'object'){
				var por = idaglGV_def.parametros.valid.alerta.por;
				if(o.p.alerta.por){ por = o.p.alerta.por; }
				if(o.p.alerta.valores[o.ob[por]]){
					alerta = o.p.alerta.valores[o.ob[por]];
				}
			}
		}
		
		if(o.p.custom){
			if(o.p.custom && typeOf(o.p.custom) === 'function'){
				Fcustom = o.p.custom;
			} else{
				console.warn('El parametro que se envia en custom debe de ser una funcion valida, sin ejecutar');
			}
		}
	}
	catch(e){ console.warn(e); }
	
	var color = {};
	color.bueno = idaglGV_def.parametros.valid.color.bueno;
	color.malo = idaglGV_def.parametros.valid.color.malo;
	
	if(o.p.color){
		if(o.p.color.bueno){ color.bueno = o.p.color.bueno; }
		if(o.p.color.malo){ color.malo = o.p.color.malo; }
	}
	
	if(absoluto === false){
		o.ob.idago.validado = false;
		o.ob.idago.multivalid = false;
		o.ob.removeClass('ida_Valid');
		if(color.malo === true){ o.ob.addClass('ida_noValid'); }
		if(alerta){ alert(msn); }
	} else{
		o.ob.idago.validado = true;
		o.ob.idago.multivalid = true;
		o.ob.removeClass('ida_noValid');
		
		if(color.bueno === true){ o.ob.addClass('ida_Valid'); }
	}
	
	if(Fcustom !== false){ Fcustom.apply(o.ob, [msn]); }
	reset.bind(o.ob).apply();
}





function idaV_funciones(){
	var o = {
		ob:'',
		f:''
	};
	
	o = Object.append(o, arguments[0]);
	o.ob = ida_tipo(o.ob);
	
	if(!o.f){ return false; }
	
	if(typeOf(o.f) !== 'array' && typeOf(o.f) === 'object'){
		o.f = [o.f];
	} else if(typeOf(o.f) !== 'array' && typeOf(o.f) !== 'object') { 
		console.warn('El valor de funciones de alguna de las listas de validación que el usuario coloco, no es valido.');
		return false;
	}
	
	
	o.f.each(function(f){
		if(typeOf(f) !== 'object'){ console.warn('El valor de funciones de alguna de las listas de validación no es valido.'); return false; }
		
		if(typeOf(f.soloen) === 'object'){
			if(idaFV_noaplica.bind(o.ob, f.soloen, idaglGV_def.parametros.valid.funciones.por).apply()){
				return false;
			}
		}
		
		switch(f.nombre){
			case 'custom':
				f.valor.bind(o.ob, f).apply();
			break;
			
			case 'autotexto':
				idaF_autotexto.bind(o.ob, f).apply();
			break;
			
			case 'mayusculas':
				idaF_mayusculas.bind(o.ob, f).apply();
			break;
			
			case 'soloalfabetico':
				idaF_soloalfabetico.bind(o.ob).apply();
			break;
			
			case 'solonumerico':
				idaF_solonumerico.bind(o.ob).apply();
			break;
		}
	});
}


function idaV_send(o){
	var n = o.formulario.id;
	var d = idasc[n];
	var f = d.form.el;
	var s = d.form.status;
	
	if(o.submit === false){ return false; }
	
	s = true;
	
	f.addEvent('submit', function(e){
		e.preventDefault();
		e.stop();
		
		if(s === false){ return false; }
		
		f.focus();
		s = false;
		
		(function(){
			var camposValidos = d.vcampos.every(function(item){
				return item.idago.validado === true;
			});
			
			var userFun = false;
			var userCondicion = false;
			var userIntervencion = false;
			var userBind = false;
			var novalid = idaglGV_def.msn.validar.send.novalid;
			var funcion;
			
			if(d.param.error){
				if(d.param.error.campos){ novalid = d.param.error.campos; }
			}
			
			if(typeOf(d.param.funcion) === 'function'){ userFun = true; }
			if(typeOf(d.param.condicion) === 'function'){ userCondicion = true; }
			if(typeOf(d.param.intervencion) === 'function'){ userIntervencion = true; }
			if(d.param.bind){ if(ida_tipo(d.param.bind)){ userBind = true; } }
			
			
			/* Funcion que interviene y cancela la validacion de campos, la alerta de envio y el envio del formulario
			si el usuario requiere filtrar, caneclar o intervenir en este proceso. */
			if(userIntervencion){
				funcion = d.param.intervencion.bind(e);
				
				if(!funcion()){
					s = true;
					return false;
				}
			}
						
			if(camposValidos){
				/* funcion que se ejecuta a la par del resto de procedimiento del envio del formulario.
				no detiene el proceso solo se manda a llamar la funcion junto con todo el proceso de envio del formulario */
				if(userFun){
					if(userBind){
						d.param.funcion.bind(d.param.bind, ['valido']).apply();
					} else{
						d.param.funcion.apply(e, ['valido']);
					}
				}
				
				var cumplido = true;
				// funcion que condiciona si el proceso de envio se termina de completar o se cancela por la funcion del usuario.
				if(userCondicion){
					if(userBind){
						funcion = d.param.condicion.bind(d.param.bind, ['valido', f]);
					} else{
						funcion = d.param.condicion.bind(e, ['valido', f]);
					}
					cumplido = (funcion()) ? true : false ;
				}
				
				if(cumplido === true){
					f.submit();
				} else{
					s = true;
				}
				
			} else{
				if(userFun){
					if(userBind){
						d.param.funcion.bind(d.param.bind, ['error']).apply();
					} else{
						d.param.funcion.apply(e, ['error']);
					}
				}
				
				s = true;
				alert(novalid);
			}
			
			
		}).delay((idaglGV_def.parametros.valid.retraso * 3));
	});
}





// FUNCION DE ARRANQUE PARA COLOCAR LAS VALIDACIONES Y EJECUDTAR LAS FUNCIONES SEGUN LA LISTA DEL USUARIO
function idaV_inicio(){
	var o = {
		formulario:'',
		lista:[],
		funcion:false,
		condicion:false,
		intervencion: false,
		bind:false,
		error:false,
		submit:true,
		add:false,
		addTarger:''
	};
	
	o = Object.append(o, arguments[0]);
	o.formulario = ida_tipo(o.formulario);
	
	if(o.add === false){
		idaVariables(o);
		idaV_send(o);
	}
	
	var n = o.formulario.id;
	
	o.lista.each(function(l, indexl){
		var inputs = [];
		
		if(l.por === 'id'){
			inputs[0] = document.id(l.objeto);
		} else{
			if(o.add === false){
				inputs = o.formulario.getElements('*[data-validar='+l.objeto+']');
			} else{
				var elAdd = o.addTarger = ida_tipo(o.addTarger);
				inputs = elAdd.getElements('*[data-validar='+l.objeto+']');
			}
		}
		
		inputs.each(function(i, indexi){
			i.idago = {};
			i.idago.codigo = indexl+'-'+indexi;
			i.idago.validado = false;
			
			try{
				var nuloRes = idaFV_nulo.bind(i, l).apply();
						
				if(nuloRes.nulo === 'valido'){
					i.idago.validado = true;
				}
			}
			catch(e){}
			
			i.idago.multivalid = true;
			i.idago.multivalidRun = 0;
			if(i.idago.validNum){ i.idago.validNum++; } else{ i.idago.validNum = 0; }
			
			idasc[n].vcampos.include(i);
			
			i.addEvent('change', function(){ idaV_validar.delay((this.idago.validNum * idaglGV_def.parametros.valid.retraso), this, {p:l}); });
			
			idaV_funciones({ob:i, f:l.funciones});
			
		});
	});
}



