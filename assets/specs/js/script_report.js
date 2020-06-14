function openPopupPropriedades(obj) {
	var data = $(obj).serialize();
	var url = BASE_URL+"/reports/propriedades_pdf?"+data;
	window.open(url, "propriedades_rep", "width=800,height=600");
	return false;
}