function rmLink(link) {
	var container = document.getElementById(link);
	container.removeAttribute("href");
}
function show_hide(tab,id,x) {		
	var item = document.getElementById(id);
	var tab = document.getElementById(tab);
	var x;
	switch(x) {
		case "y":
		var value = item.style.display = '';
		item.style.display = value;
		tab.classList.add('active');
		break;
		case "n":
		var value = item.style.display = 'none';
		item.style.display = value;
		//item.className = "";
		tab.classList.remove('active');
	}
}