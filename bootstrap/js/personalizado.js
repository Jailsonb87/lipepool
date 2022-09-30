$(document).ready(function(){
	$('a[data-confirm]').click(function(ev){
		var href = $(this).attr('href');
		if(!$('#confirm-delete').length){
			$('body').append('\
                <div class="modal fade" id="confirm-delete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">\n\
                    <div class="modal-dialog">\n\
                        <div class="modal-content">\n\
                            <div class="modal-header bg-danger text-white">EXCLUIR ITEM<button type="button" class="close" data-dismiss="modal" aria-label="Close">\n\
                                <span aria-hidden="true">&times;</span>\n\
                                    </button></div>\n\
                                        <div class="modal-body">Tem certeza de que deseja excluir o item selecionado?\n\
                                        </div>\n\
                                        <div class="modal-footer">\n\
                                    <button type="button" class="btn btn-success" data-dismiss="modal">Cancelar</button>\n\
                                <a class="btn btn-danger text-white" id="dataComfirmOK">Apagar</a>\n\
                            </div>\n\
                        </div>\n\
                    </div>\n\
                </div>');
		}
		$('#dataComfirmOK').attr('href', href);
        $('#confirm-delete').modal({show: true});
		return false;
		
	});
});