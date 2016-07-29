function notSupported(){
	alert("Currently not avaliable.");
}

function accessDenied(){
	alert("Access denied: you haven't permissions.");
}

function doForm( method, url, parameters) {
    var form = document.createElement("form");
    form.setAttribute("method", method);
    form.setAttribute("action", url);
    for(var parameter in parameters) {
        var hidden = document.createElement("input");
        hidden.setAttribute("type", "hidden");
        hidden.setAttribute("name", parameter);
        hidden.setAttribute("value", parameters[parameter]);
        form.appendChild(hidden);
    }
    document.body.appendChild(form);
    form.submit();
}

/* La funzione che segue controlla mediante espressioni regolari la correttezza dei campi inseriti. 
	Non può agire sullo stato del submit perché non ha una visione globale dello stato della form; ad esempio se per attivare il submit potrebbero essere
	due check di questo tipo.
	Per poter risolvere questo problema, in eventuali sviluppi futuri, tale funzione ritornerà un valore booleano relativo allo stato di questo check.
*/
// Espressioni regolari notevoli:
	// data (anno bisestile corretto) /^(((0[1-9]|[12]\d|3[01])\/(0[13578]|1[02])\/(\d{4}))|((0[1-9]|[12]\d|30)\/(0[13456789]|1[012])\/(\d{4}))|((0[1-9]|1\d|2[0-8])\/02\/(\d{4}))|(29\/02\/((\d{2})(0[48]|[2468][048]|[13579][26]|00))))$/
	// email: /^[a-zA-Z0-9._-]+\@[a-z._-]+\.[a-z]{2,4}$/
	// double (e.g.: un prezzo ): /^[0-9]+(\.[0-9]+)?$/

function checkWithRegExp(regExpr, object, containerID, spanID){
	var ok;
	if( object.value.search(regExpr) == -1 ) {
		document.getElementById(containerID).className = "form-group input-group has-error has-feedback";
		document.getElementById(spanID).className = "form-control-feedback glyphicon glyphicon-remove";
		ok = false;
	} else {
		document.getElementById(containerID).className = "form-group input-group has-success has-feedback";
		document.getElementById(spanID).className = "form-control-feedback glyphicon glyphicon-ok";
		ok = true;
	}
	return ok;
}
