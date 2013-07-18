function toggleVisible(id,id2) {
		var item = document.getElementById(id);
		var value = item.style.display ? '' : 'none';
		item.style.display = value;	
		var item2 = document.getElementById(id2);
		if (item2.src = '/sites/all/themes/kuali/images/tinybutton-hide.gif'){
			item2.src = '/sites/all/themes/kuali/images/tinybutton-show.gif';
		}
		if (item.style.display == ''){
			item2.src = '/sites/all/themes/kuali/images/tinybutton-hide.gif';
		}
}